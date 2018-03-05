

<?php if ($this->_var['fittings']): ?>
<div class="fitting-suit">
    <ul class="fitting-tab">
    	<?php $_from = $this->_var['fittings_tab_index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'tab_item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['tab_item']):
?> 
        <?php if ($this->_var['key'] == 1): ?>
        <li class="on"><?php echo $this->_var['comboTab'][$this->_var['key']]; ?></li>
        <?php else: ?>
        <li><?php echo $this->_var['comboTab'][$this->_var['key']]; ?></li>
        <?php endif; ?> 
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </ul>
    <div class="fitting-list">
    	<?php $_from = $this->_var['fittings_tab_index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'tab_item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['tab_item']):
?>
        <form name="m_goods_<?php echo $this->_var['key']; ?>" method="post" action="" onSubmit="return false;">
        <div class="fitting-item">
            <div class="master">
                <div class="p-img"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" width="130" height="130"/></div>
                <div class="p-name"><?php echo $this->_var['goods']['goods_name']; ?></div>
                <input class="m_goods_<?php echo $this->_var['key']; ?>" stock="<?php echo $this->_var['goods']['group_number']; ?>" style="display:none" />
                <div class="p-price ECS_fittings_interval"></div>
                <div class="icon icon-add"></div>
            </div>
            <div class="fitting-content">
                <a href="javascript:void(0);" class="fitting-prev"></a>
                <a href="javascript:void(0);" class="fitting-next"></a>
                <div class="fitting-wrap">
                    <ul>
                    	<?php $_from = $this->_var['fittings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_list');$this->_foreach['no'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['no']['total'] > 0):
    foreach ($_from AS $this->_var['goods_list']):
        $this->_foreach['no']['iteration']++;
?> 
                        <?php if ($this->_var['goods_list']['group_id'] == $this->_var['key']): ?>
                        <li id="<?php echo $this->_var['goods_list']['goods_id']; ?>_<?php echo $this->_var['key']; ?>">
                            <div class="p-img"><img src="<?php echo $this->_var['goods_list']['goods_thumb']; ?>" width="112" height="112" /></div>
                            <div class="p-name"><a href="<?php echo $this->_var['goods_list']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods_list']['goods_name']); ?>"><?php echo $this->_var['goods_list']['goods_name']; ?></a></div>
                            <div class="hang">
                                <span class="hang-label">套餐价：</span><div class="p-price">￥<?php echo $this->_var['goods_list']['fittings_price_ori']; ?></div>
                            </div>
                            <div class="p-youhui">已优惠<?php echo $this->_var['goods_list']['spare_price']; ?></div>
                            <label rev="<?php echo $this->_var['goods_list']['goods_id']; ?>" style="display:none;"><input class="m_goods_list m_goods_<?php echo $this->_var['key']; ?> m_goods_list_m_goods_<?php echo $this->_var['key']; ?>_<?php echo $this->_var['goods_list']['goods_id']; ?>" item="m_goods_<?php echo $this->_var['key']; ?>" type="checkbox" value="<?php echo $this->_var['goods_list']['goods_id']; ?>" data="<?php echo $this->_var['goods_list']['fittings_price_ori']; ?>" spare="<?php echo $this->_var['goods_list']['spare_price_ori']; ?>" stock="<?php echo $this->_var['goods']['group_number']; ?>" name="goods_list_<?php echo $this->_var['goods_list']['goods_id']; ?>_<?php echo $this->_var['key']; ?>" /></label>
                            <i class="icon checked-icon"></i>
                        </li>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
            </div>
            <div class="fitting-sett">
                <div class="fitting-num">
                	搭配买共省<br/>
                    <font id="m_goods_save_<?php echo $this->_var['key']; ?>" name="combo_savePrice[]"></font>
                </div>
                <div class="fitting-total">
                    <span class="label">搭配价：</span><br />
                    <div class="p-price" id="m_goods_<?php echo $this->_var['key']; ?>" name="combo_shopPrice[]"></div>
                    <span class="label">参考价：</span><br />
                    <div class="p-price" name="combo_markPrice[]" id="m_goods_reference_<?php echo $this->_var['key']; ?>"></div>
                    <div class="input_combo_stock fl" style="position:relative;">
                    	<div id="combo_stock_number" class="hide">限购<font id="stock_number">23</font>套</div>
                        购买：<input type="text" class="combo_stock" name="m_goods_<?php echo $this->_var['key']; ?>_number" id="mGoods_number" value="1" size="1" style="text-align:center" />&nbsp;&nbsp;套
                    </div>
                    <a rev='m_goods_<?php echo $this->_var['key']; ?>_<?php echo $this->_var['goods_id']; ?>_<?php echo $this->_var['region_id']; ?>_<?php echo $this->_var['area_id']; ?>' href="javascript:void(0);" class="btn ncs_buy">立即购买></a>
                </div>
            </div>
        </div>
        </form>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </div>
    
</div>
<?php endif; ?> 
 

<script type="text/javascript">
var btn_buy = "确定";
var is_cancel = "取消";
var select_spe = "请选择商品属性";
var select_base = '请选择套餐基本件';
var select_shop = '请选择套餐商品';
var data_not_complete = '数据格式不完整';
var understock = '库存不足，请选择其他商品';

jQuery(function($){
	//组合套餐tab切换
	var _tab = $('#cn_b h2');
	var _con = $('#cn_h blockquote');
	var _index = 0;
	_con.eq(0).show().siblings('blockquote').hide();
	_tab.css('cursor','pointer');
	_tab.click(function(){
		_index = _tab.index(this);
		_tab.eq(_index).removeClass('h2bg').siblings('h2').addClass('h2bg');
		_con.eq(_index).show().siblings('blockquote').hide();
	})
	//变更选购的配件
	$('.m_goods_list').click(function(){
		if($(this).prop('checked')){
			ec_group_addToCart($(this).attr('item'), $(this).val(),<?php echo $this->_var['goods']['goods_id']; ?>, <?php echo $this->_var['region_id']; ?>, <?php echo $this->_var['area_id']; ?>, ''); //新增配件(组,配件,主件)
		}else{
			ec_group_delInCart($(this).attr('item'), $(this).val(),<?php echo $this->_var['goods']['goods_id']; ?>, <?php echo $this->_var['region_id']; ?>, <?php echo $this->_var['area_id']; ?>, ''); //删除基本件(组,配件,主件)
			//display_Price($(this).attr('item'),$(this).attr('item').charAt($(this).attr('item').length-1));
		}
	})
	//可以购买套餐的最大数量
	$(".combo_stock").keyup(function(){
		var group = $(this).parents('form').attr('name');
		getMaxStock(group, 1);//根据套餐获取该套餐允许购买的最大数
	});
	
	//设置配件初始未选状态
	$(".m_goods_list").each(function(i){
	    this.checked = false;
	 });
	 
	 $(document).click(function(){
		$("#combo_stock_number").attr('class', 'hide');
	})
})

//允许购买套餐的最大数量
function getMaxStock(group, type){
	var obj = $('input[name="'+group+'_number"]');
	var original = parseInt(Number(obj.val()));
	var stock = $("."+group).eq(0).attr('stock');
	
	//是否是数字
	if(isNaN(original)){
		original = 1;
		obj.val(original);
	}
	$("."+group).each(function(index){
		if($("."+group).eq(index).prop('checked')){
			var item_stock = parseInt($("."+group).eq(index).attr('stock'));
			stock = (stock > item_stock)?item_stock:stock;//取最小值
		}
	});
	//更新
	original = (original < 1)?1:original;
	
	if(stock > 0){
		//stock = (stock < 1)?1:stock;
		if(original > stock){
			$('#stock_number').html(stock);
			$('#combo_stock_number').attr('class', 'show');
			obj.val(stock);
		}
	}else{
		original = (original >= 100)?100:original;
		obj.val(original);
	}
	
	
	var number = obj.val();
	if(type == 2){
		var str = group;
		str = str.split('_');
		var group_result = str[0] +"_" + str[1] +"_" + str[2];
		$('input[name="' + group_result + '_number"]').val(number);
	}
}

//统计套餐价格
function display_Price(_item,indexTab){
	var _size = $('.'+_item).size();
	var _amount_shop_price = 0;
	var _amount_spare_price = 0;
	indexTab = indexTab - 1;
	for(i=0; i<_size; i++){
		obj = $('.'+_item).eq(i);
		if(obj.prop('checked')){
			_amount_shop_price += parseFloat(obj.attr('data')); //原件合计
			_amount_spare_price += parseFloat(obj.attr('spare')); //优惠合计
		}
	}
	var tip_spare = $('.tip_spare:eq('+indexTab+')');//节省文本
	if(_amount_spare_price > 0){//省钱显示提示信息
		tip_spare.show();
		tip_spare.children('strong').text(_amount_spare_price);
	}else{
		tip_spare.hide();
	}
	//显示总价
	$('.combo_price:eq('+indexTab+')').text(_amount_shop_price);
}

//处理添加商品到购物车
function ec_group_addToCart(group,goodsId,parentId, warehouse_id, area_id, add_group, fitt_goods){
  var goods        = new Object();
  var spec_arr     = new Array();
  var fittings_arr = new Array();
  var number       = 1;
  var quick		   = 0;
  var group_item   = goodsId;
  var goods_attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);  //获取主件商品属性
  
  goods.goods_attr   	= goods_attr;
  goods.quick    		= quick;
  goods.spec     		= spec_arr;
  goods.goods_id 		= goodsId;
  goods.warehouse_id 	= warehouse_id;
  goods.area_id 		= area_id;
  goods.number   		= number;
  goods.parent   		= parentId;
  goods.group 			= group + '_' + parentId;//组名
  goods.add_group 		= add_group;
  
  if(fitt_goods){
  	  goods.fitt_goods 		= fitt_goods;
  }

  Ajax.call('flow.php?step=add_to_cart_combo', 'goods=' + $.toJSON(goods), ec_group_addToCartResponse, 'POST', 'JSON'); //兼容jQuery by mike
}

//处理添加商品到购物车的反馈信息
function ec_group_addToCartResponse(result)
{
  if (result.error > 0)
  {
    // 如果需要缺货登记，跳转
    if (result.error == 2)
    {
		var add_cart_divId = 'flow_add_cart';
		var content = '<div id="flow_add_cart">' + 
						'<div class="tip-box icon-box">' +
							'<span class="warn-icon m-icon"></span>' + 
							'<div class="item-fore">' +
								'<h3 class="rem ftx-04">' + result.message + '</h3>' +
							'</div>' +
						'</div>' +
					'</div>';
		pb({
			id:add_cart_divId,
			title:'标题',
			width:455,
			height:58,
			content:content, 	//调取内容
			drag:false,
			foot:false
		});
		
		$('#' + add_cart_divId + ' .item-fore').css({
			'padding-top' : '12px'
		});
	  cancel_checkboxed(result.group, result.goods_id);//取消checkbox
    }
    // 没选规格，弹出属性选择框
    else if (result.error == 6)
    {
      ec_group_openSpeDiv(result.message, result.group, result.goods_id, result.parent, result.warehouse_id, result.area_id, result.goods_attr);
    }
    else
    {
      var add_cart_divId = 'flow_add_cart';
		var content = '<div id="flow_add_cart">' + 
						'<div class="tip-box icon-box">' +
							'<span class="warn-icon m-icon"></span>' + 
							'<div class="item-fore">' +
								'<h3 class="rem ftx-04">' + result.message + '</h3>' +
							'</div>' +
						'</div>' +
					'</div>';
		pb({
			id:add_cart_divId,
			title:'标题',
			width:455,
			height:58,
			content:content, 	//调取内容
			drag:false,
			foot:false
		});
		
		$('#' + add_cart_divId + ' .item-fore').css({
		'padding-top' : '12px'
		});
		
	  cancel_checkboxed(result.group, result.goods_id);//取消checkbox
    }
  }
  else
  {
	$("#m_goods_" + result.groupId).html(result.fittings_minMax);
	$("#m_goods_save_" + result.groupId).html(result.save_minMaxPrice);
	$("#m_goods_reference_" + result.groupId).html(result.market_minMax);
	
	if(result.add_group != ''){
		
		if(result.add_group){
			get_cart_combo_open_list(result.add_group, result.fitt_goods);
		}else{
			get_cart_combo_open_list(result.add_group);
		}
	}
  }
}

//处理删除购物车中的商品
function ec_group_delInCart(group,goodsId,parentId, warehouse_id, area_id){
  var goods        = new Object();
  var group_item   = (typeof(parentId) == "undefined") ? goodsId : parseInt(parentId);

  goods.goods_id = goodsId;
  goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);
  goods.group = group + '_' + group_item;//组名
  goods.goods_attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);  //获取主件商品属性
  goods.warehouse_id = warehouse_id;
  goods.area_id = area_id;

  Ajax.call('flow.php?step=del_in_cart_combo', 'goods=' + $.toJSON(goods), ec_group_delInCartResponse, 'POST', 'JSON'); //兼容jQuery by mike
}

//处理删除购物车中的商品的反馈信息
function ec_group_delInCartResponse(result)
{
	var group = result.group;
	if (result.error > 0){
		var add_cart_divId = 'flow_add_cart';
		var content = '<div id="flow_add_cart">' + 
						'<div class="tip-box icon-box">' +
							'<span class="warn-icon m-icon"></span>' + 
							'<div class="item-fore">' +
								'<h3 class="rem ftx-04">' + data_not_complete + '</h3>' +
							'</div>' +
						'</div>' +
					'</div>';
		pb({
			id:add_cart_divId,
			title:'标题',
			width:455,
			height:58,
			content:content, 	//调取内容
			drag:false,
			foot:false
		});
		
		$('#' + add_cart_divId + ' .item-fore').css({
			'padding-top' : '12px'
		});
	}else if(result.parent == 0){
		$('.'+group).attr("checked",false);
	}
	
	$("#m_goods_" + result.groupId).html(result.fittings_minMax);
	$("#m_goods_save_" + result.groupId).html(result.save_minMaxPrice);
	$("#m_goods_reference_" + result.groupId).html(result.market_minMax);
}

//生成属性选择层
function ec_group_openSpeDiv(message, group, goods_id, parent, warehouse_id, area_id, goods_attr) 
{
  var _id = "speDiv";
  var m = "mask";
  if (docEle(_id)) document.removeChild(docEle(_id));
  if (docEle(m)) document.removeChild(docEle(m));
  //计算上卷元素值
  var scrollPos; 
  if (typeof window.pageYOffset != 'undefined') 
  { 
    scrollPos = window.pageYOffset; 
  } 
  else if (typeof document.compatMode != 'undefined' && document.compatMode != 'BackCompat') 
  { 
    scrollPos = document.documentElement.scrollTop; 
  } 
  else if (typeof document.body != 'undefined') 
  { 
    scrollPos = document.body.scrollTop; 
  }

  var i = 0;
  var sel_obj = document.getElementsByTagName('select');
  while (sel_obj[i])
  {
    sel_obj[i].style.visibility = "hidden";
    i++;
  }

  // 新激活图层
  var newDiv = document.createElement("div");
  newDiv.id = _id;
  newDiv.style.position = "absolute";
  newDiv.style.zIndex = "10000";
  newDiv.style.width = "300px";
  newDiv.style.height = "260px";
  newDiv.style.top = (parseInt(scrollPos + 200)) + "px";
  newDiv.style.left = (parseInt(document.body.offsetWidth) - 200) / 2 + "px"; // 屏幕居中
  newDiv.style.overflow = "auto"; 
  newDiv.style.background = "#FFF";
  newDiv.style.border = "3px solid #59B0FF";
  newDiv.style.padding = "5px";

  //生成层内内容
  newDiv.innerHTML = '<h4 style="font-size:14; margin:15 0 0 15;">' + select_spe + "</h4>";

  for (var spec = 0; spec < message.length; spec++)
  {
      newDiv.innerHTML += '<hr style="color: #EBEBED; height:1px;"><h6 style="text-align:left; background:#ffffff; margin-left:15px;">' +  message[spec]['name'] + '</h6>';

      if (message[spec]['attr_type'] == 1)
      {
		if(message[spec]['is_checked'] == 1){ //属性组中有默认选择的
			for (var val_arr = 0; val_arr < message[spec]['values'].length; val_arr++)
			{
			  if (message[spec]['values'][val_arr]['checked'] == 1)
			  {
				newDiv.innerHTML += "<input style='margin-left:15px;' type='radio' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' checked /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + '</font> [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';      
			  }
			  else
			  {
				newDiv.innerHTML += "<input style='margin-left:15px;' type='radio' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + '</font> [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';      
			  }
			} 
		}else{
			for (var val_arr = 0; val_arr < message[spec]['values'].length; val_arr++)
			{
			  
			  if (val_arr == 0)
			  {
				newDiv.innerHTML += "<input style='margin-left:15px;' type='radio' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' checked /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + '</font> [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';      
			  }
			  else
			  {
				newDiv.innerHTML += "<input style='margin-left:15px;' type='radio' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + '</font> [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';      
			  }
			} 
		}  
        
        newDiv.innerHTML += "<input type='hidden' name='spec_list' value='" + val_arr + "' />";
      }
      else
      {
        for (var val_arr = 0; val_arr < message[spec]['values'].length; val_arr++)
        {
          newDiv.innerHTML += "<input style='margin-left:15px;' type='checkbox' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + ' [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';     
        }
        newDiv.innerHTML += "<input type='hidden' name='spec_list' value='" + val_arr + "' />";
      }
  }
  
  newDiv.innerHTML += "<br /><center>[<a href='javascript:ec_group_submit_div(\"" + group + "\"," + goods_id + "," + parent + "," + warehouse_id + "," + area_id + ",\"" + goods_attr + "\"" + ")' class='f6' >" + btn_buy + "</a>]&nbsp;&nbsp;[<a href='javascript:ec_group_cancel_div(\"" + group + "\"," + goods_id + ")' class='f6' >" + is_cancel + "</a>]</center>";
  document.body.appendChild(newDiv);


  // mask图层
  var newMask = document.createElement("div");
  newMask.id = m;
  newMask.style.position = "absolute";
  newMask.style.zIndex = "9999";
  newMask.style.width = document.body.scrollWidth + "px";
  newMask.style.height = document.body.scrollHeight + "px";
  newMask.style.top = "0px";
  newMask.style.left = "0px";
  newMask.style.background = "#FFF";
  newMask.style.filter = "alpha(opacity=30)";
  newMask.style.opacity = "0.40";
  document.body.appendChild(newMask);
} 

//获取选择属性后，再次提交到购物车
function ec_group_submit_div(group, goods_id, parentId, warehouse_id, area_id, goods_attr) 
{
  var goods        = new Object();
  var spec_arr     = new Array();
  var fittings_arr = new Array();
  var number       = 1;
  var input_arr      = document.getElementById('speDiv').getElementsByTagName('input'); //by mike
  var quick		   = 1;

  var spec_arr = new Array();
  var j = 0;

  for (i = 0; i < input_arr.length; i ++ )
  {
    var prefix = input_arr[i].name.substr(0, 5);

    if (prefix == 'spec_' && (
      ((input_arr[i].type == 'radio' || input_arr[i].type == 'checkbox') && input_arr[i].checked)))
    {
      spec_arr[j] = input_arr[i].value;
      j++ ;
    }
  }
  
  goods.goods_attr  = goods_attr;
  goods.quick    = quick;
  goods.spec     = spec_arr;
  goods.goods_id = goods_id;
  goods.number   = number;
  goods.warehouse_id   = warehouse_id;
  goods.area_id   = area_id;
  goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);
  goods.group    = group;//组名

  Ajax.call('flow.php?step=add_to_cart_combo', 'goods=' + $.toJSON(goods), ec_group_addToCartResponse, 'POST', 'JSON'); //兼容jQuery by mike

  document.body.removeChild(docEle('speDiv'));
  document.body.removeChild(docEle('mask'));

  var i = 0;
  var sel_obj = document.getElementsByTagName('select');
  while (sel_obj[i])
  {
    sel_obj[i].style.visibility = "";
    i++;
  }

}

//关闭mask和新图层的同时取消选择
function ec_group_cancel_div(group, goods_id){
  document.body.removeChild(docEle('speDiv'));
  document.body.removeChild(docEle('mask'));

  var i = 0;
  var sel_obj = document.getElementsByTagName('select');
  while (sel_obj[i])
  {
    sel_obj[i].style.visibility = "";
    i++;
  }
  cancel_checkboxed(group, goods_id);//取消checkbox
}

/*
*套餐提交到购物车 by mike
*/
function addMultiToCart(group,goodsId,warehouse_id,area_id){
	var goods     = new Object();
	var number    = $('input[name="'+group+'_number"]').val();

	goods.group = group;
	goods.goods_id = goodsId;
	goods.warehouse_id = warehouse_id;
	goods.area_id = area_id;
	goods.number = (number < 1) ? 1:number;
	
	//判断是否勾选套餐
	if(!$("."+group).is(':checked')){
		
		var add_cart_divId = 'flow_add_cart';
		var content = '<div id="flow_add_cart">' + 
						'<div class="tip-box icon-box">' +
							'<span class="warn-icon m-icon"></span>' + 
							'<div class="item-fore">' +
								'<h3 class="rem ftx-04">' + select_shop + '</h3>' +
							'</div>' +
						'</div>' +
					'</div>';
		pb({
			id:add_cart_divId,
			title:'标题',
			width:455,
			height:58,
			content:content, 	//调取内容
			drag:false,
			foot:false
		});
		
		$('#' + add_cart_divId + ' .item-fore').css({
		'padding-top' : '12px'
		});
		
		return location.reload();	
	}
	
	var i_add = 0; 
	var y_add;

	$('.tm-combo-item .tm-meta').each(function(i) {
		var t = $(this);
		t.find('.fitt_input').each(function(j) {
			var f = $(this);
			f.find('.tb-txt').each(function(y) {
                var b = $(this);
				if(b.find(':radio').is(':checked')){
					y_add = j + 1;
					var goods_id = b.parent().parent().parent().parent().attr('rev');
					$('.fitt_jq_' + goods_id).val(y_add);
				}
            });
		});
		
		var group_fitt_input = t.find('.fitt_input').size(); //每一组属性的长度
		var t_goods_id = t.attr('rev');
		var t_input = $('.fitt_jq_' + t_goods_id).val();
		var goods_stock = $('.tm-stock_' + t_goods_id).html();
		
		if(group_fitt_input != t_input){
			t.parent().addClass('hover');
		}else{
			
			if(goods_stock < 1 || goods_stock == ''){
				t.parent().addClass('hover');
				$('.tm-stock_title_' + t_goods_id).html('<font style="color:#F00;">(该商品暂无库存，无法购买!)</font>');
			}else{
				t.parent().removeClass('hover');
			}
		}
    });
	
	var group_hover = $('.J_ComboDialog').find('.hover').size();
	if(group_hover < 1){
		Ajax.call('flow.php?step=add_to_cart_group', 'goods=' + $.toJSON(goods), addMultiToCartResponse, 'POST', 'JSON'); //兼容jQuery by mike
	}else{
		$('.tm-combo-notice').show();
	}
}

//回调
function addMultiToCartResponse(result){
	if(result.error > 0){
		
		var add_cart_divId = 'flow_add_cart';
		var content = '<div id="flow_add_cart">' + 
						'<div class="tip-box icon-box">' +
							'<span class="warn-icon m-icon"></span>' + 
							'<div class="item-fore">' +
								'<h3 class="rem ftx-04">' + result.message + '</h3>' +
							'</div>' +
						'</div>' +
					'</div>';
		pb({
			id:add_cart_divId,
			title:'标题',
			width:455,
			height:58,
			content:content, 	//调取内容
			drag:false,
			foot:false
		});
		
		$('#' + add_cart_divId + ' .item-fore').css({
		'padding-top' : '12px'
		});
	}else{
		window.location.href = 'flow.php';
	}
}

//取消选项
function cancel_checkboxed(group, goods_id){
	//取消选择
	group = group.substr(0,group.lastIndexOf("_"));
	$("."+group).each(function(index){
		if($("."+group).eq(index).val()==goods_id){
			$("."+group).eq(index).attr("checked",false);			  
		}
	});
}
</script>