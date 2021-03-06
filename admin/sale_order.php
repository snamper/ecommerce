<?php

/**
 * ECSHOP 商品销售排行
 * ============================================================================
 * * 版权所有 2005-2016 上海商创网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecmoban.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: sale_order.php 17217 2011-01-19 06:29:08Z liubo $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . 'includes/lib_order.php');
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/admin/statistic.php');
$smarty->assign('lang', $_LANG);


//ecmoban模板堂 --zhuo start
$adminru = get_admin_ru_id();
if($adminru['ru_id'] == 0){
        $smarty->assign('priv_ru',   1);
}else{
        $smarty->assign('priv_ru',   0);
}
//ecmoban模板堂 --zhuo end

if (isset($_REQUEST['act']) && ($_REQUEST['act'] == 'query' ||  $_REQUEST['act'] == 'download'))
{
    /* 检查权限 */
    check_authz_json('sale_order_stats');
    if (strstr($_REQUEST['start_date'], '-') === false)
    {
        $_REQUEST['start_date'] = local_date('Y-m-d', $_REQUEST['start_date']);
        $_REQUEST['end_date'] = local_date('Y-m-d', $_REQUEST['end_date']);
    }

    /* 下载报表 */
    if ($_REQUEST['act'] == 'download')
    {
        $goods_order_data = get_sales_order($adminru['ru_id'], false);
        $goods_order_data = $goods_order_data['sales_order_data'];

        $filename = $_REQUEST['start_date'] . '_' . $_REQUEST['end_date'] .'sale_order';

        header("Content-type: application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=$filename.xls");

        $data  = "$_LANG[sell_stats]\t\n";
        $data .= "$_LANG[order_by]\t$_LANG[goods_name]\t$_LANG[goods_steps_name]\t$_LANG[goods_sn]\t$_LANG[sell_amount]\t$_LANG[sell_sum]\t$_LANG[percent_count]\n";

        foreach ($goods_order_data AS $k => $row)
        {
            $order_by = $k + 1;
            $data .= "$order_by\t$row[goods_name]\t$row[ru_name]\t$row[goods_sn]\t$row[goods_num]\t$row[turnover]\t$row[wvera_price]\n";
        }

        if (EC_CHARSET == 'utf-8')
        {
            echo ecs_iconv(EC_CHARSET, 'GB2312', $data);
        }
        else
        {
            echo $data;
        }
        exit;
    }
    $goods_order_data = get_sales_order($adminru['ru_id']);
    $smarty->assign('sales_order_data', $goods_order_data['sales_order_data']);
    $smarty->assign('filter',       $goods_order_data['filter']);
    $smarty->assign('record_count', $goods_order_data['record_count']);
    $smarty->assign('page_count',   $goods_order_data['page_count']);
    $smarty->assign('sale_list',   true);

    $sort_flag  = sort_flag($goods_order_data['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result($smarty->fetch('library/sale_order.lbi'), '', array('filter' => $goods_order_data['filter'], 'page_count' => $goods_order_data['page_count']));
}

/*------------------------------------------------------ */
//--排行统计需要的函数
/*------------------------------------------------------ */
/**
 * 取得销售排行数据信息
 * @param   bool  $is_pagination  是否分页
 * @return  array   销售排行数据
 */
function get_sales_order($ru_id, $is_pagination = true)
{
	global $start_date, $end_date;
    $filter['start_date'] = empty($_REQUEST['start_date']) ? $start_date : local_strtotime($_REQUEST['start_date']);
    $filter['end_date'] = empty($_REQUEST['end_date']) ? $end_date : local_strtotime($_REQUEST['end_date']);
    $filter['sort_by'] = empty($_REQUEST['sort_by']) ? 'goods_num' : trim($_REQUEST['sort_by']);
    $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);

    $where = $where_record = " WHERE og.order_id = oi.order_id ". order_query_sql('finished', 'oi.');

    if ($filter['start_date'])
    {
        $where .= " AND oi.add_time >= '" . $filter['start_date'] . "'";
    }
    if ($filter['end_date'])
    {
        $where .= " AND oi.add_time <= '" . $filter['end_date'] . "'";
    }
    
    //ecmoban模板堂 --zhuo start
    $leftJoin = '';
    if($ru_id > 0){
        $where .= " AND og.ru_id = '$ru_id'";
    }
    //ecmoban模板堂 --zhuo end

    $sql = "SELECT COUNT(distinct(og.goods_id)) FROM " .
           $GLOBALS['ecs']->table('order_info') . ' AS oi,'.
           $GLOBALS['ecs']->table('order_goods') . ' AS og '.
           $where;
    $filter['record_count'] = $GLOBALS['db']->getOne($sql);

    /* 分页大小 */
    $filter = page_and_size($filter);

    $sql = "SELECT og.goods_id, og.goods_sn, og.goods_name, oi.order_status, " .
           "SUM(og.goods_number) AS goods_num, SUM(og.goods_number * og.goods_price) AS turnover, og.ru_id ".
           "FROM ".$GLOBALS['ecs']->table('order_goods')." AS og, " .
           $GLOBALS['ecs']->table('order_info')." AS oi  " . $leftJoin .$where .
           " GROUP BY og.goods_id ".
           ' ORDER BY ' . $filter['sort_by'] . ' ' . $filter['sort_order'] ;
    if ($is_pagination)
    {
        $sql .= " LIMIT " . $filter['start'] . ', ' . $filter['page_size'];
    }

    $sales_order_data = $GLOBALS['db']->getAll($sql);

    foreach ($sales_order_data as $key => $item)
    {
        $sales_order_data[$key]['wvera_price'] = price_format($item['goods_num'] ? $item['turnover'] / $item['goods_num'] : 0);
        $sales_order_data[$key]['short_name']  = sub_str($item['goods_name'], 30, true);
        $sales_order_data[$key]['turnover']    = price_format($item['turnover']);
        $sales_order_data[$key]['taxis']       = $key + 1;
        $sales_order_data[$key]['ru_name'] = get_shop_name($item['ru_id'], 1); //ecmoban模板堂 --zhuo
    }

    $arr = array('sales_order_data' => $sales_order_data, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);

    return $arr;
}

?>