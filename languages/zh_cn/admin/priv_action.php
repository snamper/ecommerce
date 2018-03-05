<?php

/**
 * ECSHOP 权限名称语言文件
 * ============================================================================
 * * 版权所有 2005-2016 上海商创网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecmoban.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: priv_action.php 17217 2011-01-19 06:29:08Z liubo $
*/
/* 权限管理的一级分组 */
$_LANG['goods'] = '商品管理';
$_LANG['goods_storage'] = '库存管理';
$_LANG['cms_manage'] = '文章管理';
$_LANG['users_manage'] = '会员管理';
$_LANG['priv_manage'] = '权限管理';
$_LANG['sys_manage'] = '系统设置';
$_LANG['order_manage'] = '订单管理';
$_LANG['promotion'] = '促销管理';
$_LANG['email'] = '邮件管理';
$_LANG['templates_manage'] = '模板管理';
$_LANG['db_manage'] = '数据库管理';
$_LANG['sms_manage'] = '短信管理';
$_LANG['stats'] = '报表统计'; //ecmoban模板堂 --zhuo

//商品管理部分的权限
$_LANG['goods_manage'] = '商品添加/编辑';
$_LANG['remove_back'] = '商品删除/恢复';
$_LANG['cat_manage'] = '分类添加/编辑';
$_LANG['cat_drop'] = '分类转移/删除';
$_LANG['attr_manage'] = '商品属性管理';
$_LANG['brand_manage'] = '商品品牌管理';
$_LANG['comment_priv'] = '用户评论管理';
$_LANG['goods_type'] = '商品类型';
$_LANG['tag_manage'] = '标签管理';
$_LANG['goods_auto'] = '商品自动上下架';
$_LANG['discuss_circle'] = '网友讨论圈'; //ecmoban模板堂 --zhuo
$_LANG['single_manage'] = '用户晒单管理'; //ecmoban模板堂 --zhuo
$_LANG['single_edit_delete'] = '用户晒单编辑/删除'; //ecmoban模板堂 --zhuo
$_LANG['topic_manage'] = '专题管理';
$_LANG['virualcard'] = '虚拟卡管理';
$_LANG['picture_batch'] = '图片批量处理';
$_LANG['goods_export'] = '商品批量导出';
$_LANG['goods_batch'] = '商品批量上传/修改';
$_LANG['gen_goods_script'] = '生成商品代码';
$_LANG['suppliers_goods'] = '供货商商品管理';
$_LANG['storage_put'] = '库存入库';
$_LANG['storage_out'] = '库存出库';

//文章管理部分的权限
$_LANG['article_cat'] = '文章分类管理';
$_LANG['article_manage'] = '文章内容管理';
$_LANG['shopinfo_manage'] = '网店信息管理';
$_LANG['shophelp_manage'] = '网店帮助管理';
$_LANG['vote_priv'] = '在线调查管理';
$_LANG['article_auto'] = '文章自动发布';

//会员信息管理
$_LANG['integrate_users'] = '会员数据整合';
$_LANG['sync_users'] = '同步会员数据';
$_LANG['users_manages'] = '会员添加/编辑';
$_LANG['users_drop'] = '会员删除';
$_LANG['user_rank'] = '会员等级管理';
$_LANG['feedback_priv'] = '会员留言管理';
$_LANG['surplus_manage'] = '会员余额管理';
$_LANG['account_manage'] = '会员账户管理';
$_LANG['baitiao_manage'] = '会员白条管理';//@author bylu 权限语言-会员白条管理;
$_LANG['users_real_manage'] = '用户实名管理';

//权限管理部分的权限
$_LANG['admin_drop'] = '删除管理员';
$_LANG['allot_priv'] = '分派权限';
$_LANG['logs_manage'] = '管理日志列表';
$_LANG['logs_drop'] = '删除管理日志';
$_LANG['template_manage'] = '模板管理';
$_LANG['agency_manage'] = '办事处管理';
$_LANG['suppliers_manage'] = '供货商管理';
$_LANG['role_manage'] = '角色管理';

//系统设置部分权限
$_LANG['shop_config'] = '商店设置';
$_LANG['shop_authorized'] = '授权证书';
$_LANG['webcollect_manage'] = '网罗天下管理';
$_LANG['ship_manage'] = '配送方式管理';
$_LANG['payment'] = '支付方式管理';
$_LANG['shiparea_manage'] = '配送区域管理';
$_LANG['area_list'] = '地区列表管理';
$_LANG['friendlink'] = '友情链接管理';
$_LANG['partnerlink'] = '合作伙伴管理';
$_LANG['db_backup'] = '数据库备份';
$_LANG['db_renew'] = '数据库恢复';
$_LANG['flash_manage'] = '首页主广告管理'; //Flash 播放器管理
$_LANG['navigator'] = '自定义导航栏';
$_LANG['cron'] = '计划任务';
$_LANG['affiliate'] = '推荐设置';
$_LANG['affiliate_ck'] = '分成管理';
$_LANG['sitemap'] = '站点地图管理';
$_LANG['file_check'] = '文件校验';
$_LANG['file_priv'] = '文件权限检验';
$_LANG['reg_fields'] = '会员注册项管理';
$_LANG['website'] = '第三方登录插件管理';
$_LANG['oss_configure'] = '阿里云OSS配置';
$_LANG['api'] = '接口对接';

//订单管理部分权限
$_LANG['order_os_remove'] = '订单删除';
$_LANG['order_os_edit'] = '编辑订单状态';
$_LANG['order_ps_edit'] = '编辑付款状态';
$_LANG['order_ss_edit'] = '编辑发货状态';
$_LANG['order_edit'] = '添加编辑订单';
$_LANG['order_view'] = '查看未完成订单';
$_LANG['order_view_finished'] = '查看已完成订单';
$_LANG['repay_manage'] = '退款申请管理';
$_LANG['booking'] = '缺货登记管理';
$_LANG['sale_order_stats'] = '订单销售统计';
$_LANG['client_flow_stats'] = '客户流量统计';
$_LANG['delivery_view'] = '查看发货单';
$_LANG['back_view'] = '查看退货单';
$_LANG['order_detection'] = '检测已发货订单';

//ecmoban模板堂 --zhuo start
$_LANG['batch_add_order'] = '批量添加订单';
$_LANG['order_back_cause'] = '退货原因列表';
$_LANG['order_back_apply'] = '退换货申请列表';
$_LANG['order_print'] = '订单打印';
$_LANG['comment_edit_delete'] = '用户评论编辑/删除';
//ecmoban模板堂 --zhuo end

//促销管理
$_LANG['snatch_manage'] = '夺宝奇兵';
$_LANG['bonus_manage'] = '红包管理';
$_LANG['coupons_manage'] = '优惠券管理'; //bylu
$_LANG['card_manage'] = '祝福贺卡';
$_LANG['goods_pack'] = '商品包装';
$_LANG['ad_manage'] = '广告管理';
$_LANG['gift_manage'] = '赠品管理';
$_LANG['auction'] = '拍卖活动';
$_LANG['group_by'] = '团购活动';
$_LANG['favourable'] = '优惠活动';
$_LANG['whole_sale'] = '批发管理';
$_LANG['package_manage'] = '超值礼包';
$_LANG['exchange_goods'] = '积分商城商品';
$_LANG['presale'] = '预售活动';
$_LANG['coupons_manage'] = '优惠券管理';

//邮件管理
$_LANG['attention_list'] = '关注管理';
$_LANG['email_list'] = '邮件订阅管理';
$_LANG['magazine_list'] = '杂志管理';
$_LANG['view_sendlist'] = '邮件队列管理';

//模板管理
$_LANG['template_select'] = '模板选择';
$_LANG['template_setup']  = '模板设置';
$_LANG['library_manage']  = '库项目管理';
$_LANG['lang_edit']       = '语言项编辑';
$_LANG['backup_setting']  = '模板设置备份';
$_LANG['mail_template']  = '邮件模板管理';

//数据库管理
$_LANG['db_backup']    = '数据备份';
$_LANG['db_renew']     = '数据恢复';
$_LANG['db_optimize']  = '数据表优化';
$_LANG['sql_query']    = 'SQL查询';
$_LANG['convert']      = '转换数据';
$_LANG['table_prefix'] = '修改表前缀';
$_LANG['transfer_config'] = '源站点信息设置';
$_LANG['transfer_choose'] = '迁移数据';

//短信管理
$_LANG['my_info']         = '账号信息';
$_LANG['sms_send']        = '发送短信';
$_LANG['sms_charge']      = '短信充值';
$_LANG['send_history']    = '发送记录';
$_LANG['charge_history']  = '充值记录 ';

//商家入驻管理部分的权限 ecmoban模板堂 --zhuo start
$_LANG['merchants'] = '商家入驻'; 
$_LANG['merchants_setps']         = '商家申请流程管理';
$_LANG['merchants_setps_drop']    = '商家流程信息删除';
$_LANG['users_merchants']         = '商家列表管理';
$_LANG['users_merchants_drop']    = '商家信息删除';
$_LANG['users_merchants_priv']    = '入驻商家默认权限管理';
$_LANG['client_searchengine']    = '搜索引擎';
$_LANG['client_report_guest']    = '客户统计';
$_LANG['users_flow_stats']    = '流量分析';
$_LANG['warehouse_manage']    = '仓库管理';
$_LANG['region_area']    = '区域管理';
$_LANG['merchants_commission']    = '订单佣金结算';
$_LANG['merchants_percent']    = '设置商家佣金';
$_LANG['merchants_brand']    = '商家品牌';
$_LANG['merch_virualcard']    = '更改加密串';
$_LANG['seller_dimain']    = '二级域名管理';//by kong
$_LANG['seller_grade']    = '商家等级/标准管理';
$_LANG['seller_apply']    = '等级入驻管理';
$_LANG['seller_account'] = '商家账户管理';
$_LANG['shipping_date_list']    = '指定配送时间';
$_LANG['create_seller_grade']    = '入驻商家评分';

$_LANG['ectouch']    = '手机端管理';
$_LANG['oauth_admin'] = '授权登录';
$_LANG['touch_nav_admin'] = '导航管理';
$_LANG['touch_ad'] = '广告管理';
$_LANG['touch_ad_position'] = '广告位管理';
$_LANG['cloud'] = '云服务中心';
$_LANG['cloud_services'] = '资源专区';
//ecmoban模板堂 --zhuo end

/*by kong start*/

$_LANG['admin_manage'] = '管理员添加/编辑';
$_LANG['seller_manage'] = '商家管理员添加/编辑';
$_LANG['seller_allot'] = '商家权限分配';
$_LANG['seller_drop'] = ' 删除商家管理员';

//店铺设置管理
$_LANG['seller_store_setup'] = '店铺设置管理';
$_LANG['seller_store_informa']='店铺基本信息设置';
$_LANG['seller_store_other']='店铺其他设置';
/*by kong end*/

//众筹权限 by wu
$_LANG['zc_manage'] = '众筹管理';
$_LANG['zc_project_manage'] = '众筹项目管理';
$_LANG['zc_category_manage'] = '众筹分类管理';
$_LANG['zc_initiator_manage'] = '众筹发起人管理';
$_LANG['zc_topic_manage'] = '众筹话题管理';

$_LANG['offline_store'] = '门店列表';
$_LANG['stores'] = '门店管理';
$_LANG['ectouch'] = '手机端管理';
$_LANG['oauth_admin'] = '授权登录';
$_LANG['touch_nav_admin'] = '导航管理';
$_LANG['touch_ad'] = '广告管理';
$_LANG['touch_ad_position'] = '广告位管理';
/*微信通*/
$_LANG['wechat'] = '微信通管理';
$_LANG['wechat_admin'] = '公众号设置';
$_LANG['mass_message'] = '群发消息';
$_LANG['auto_reply'] = '自动回复';
$_LANG['menu'] = '自定义菜单';
$_LANG['fans'] = '粉丝管理';
$_LANG['media'] = '素材管理';
$_LANG['qrcode'] = '二维码管理';
$_LANG['share'] = '扫码引荐';
$_LANG['extend'] = '功能扩展';
$_LANG['template'] = '消息提醒';
/*微分销*/
$_LANG['drp'] = '微分销管理';
$_LANG['drp_config'] = '店铺设置';
$_LANG['drp_shop'] = '分销商管理';
$_LANG['drp_list'] = '分销排行';
$_LANG['drp_order_list'] = '分销订单操作';
$_LANG['drp_set_config'] = '分销比例设置';
?>