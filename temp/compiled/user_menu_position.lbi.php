<?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
<div class="mui-mbar-tabs">
	<div class="quick_link_mian">
        <div class="quick_links_panel">
            <div id="quick_links" class="quick_links">
            	<ul>
                    <li>
                        <a href="user.php"><i class="setting"></i></a>
                        <div class="ibar_login_box status_login">
                            <div class="avatar_box">
                                <p class="avatar_imgbox">
                                    <?php if ($this->_var['info']['user_picture']): ?>
                                    <img src="<?php echo $this->_var['info']['user_picture']; ?>" width="100" height="100" />
                                    <?php else: ?>
                                    <img src="themes/ecmoban_dsc/images/touxiang.jpg" width="100" height="100"/>
                                    <?php endif; ?>
                                </p>
                                <ul class="user_info">
                                    <li>用户名：<?php echo empty($this->_var['info']['nick_name']) ? '暂无' : $this->_var['info']['nick_name']; ?></li>
                                    <li>级&nbsp;别：<?php echo empty($this->_var['info']['rank_name']) ? '暂无' : $this->_var['info']['rank_name']; ?></li>
                                </ul>
                            </div>
                            <div class="login_btnbox">
                                <a href="user.php?act=order_list" class="login_order">我的订单</a>
                                <a href="user.php?act=collection_list" class="login_favorite">我的收藏</a>
                            </div>
                            <i class="icon_arrow_white"></i>
                        </div>
                    </li>
                    
                    <li id="shopCart">
                        <a href="javascript:void(0);" class="cart_list">
                            <i class="message"></i>
                            <div class="span">购物车</div>
                            <span class="cart_num"><?php echo empty($this->_var['cart_info']['number']) ? '0' : $this->_var['cart_info']['number']; ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="mpbtn_order"><i class="chongzhi"></i></a>
                        <div class="mp_tooltip">
                            <font id="mpbtn_money" style="font-size:12px; cursor:pointer;">我的订单</font>
                            <i class="icon_arrow_right_black"></i>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="mpbtn_yhq"><i class="yhq"></i></a>
                        <div class="mp_tooltip">
                            <font id="mpbtn_money" style="font-size:12px; cursor:pointer;">优惠券</font>
                            <i class="icon_arrow_right_black"></i>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="mpbtn_total"><i class="view"></i></a>
                        <div class="mp_tooltip" style=" visibility:hidden;">
                            <font id="mpbtn_myMoney" style="font-size:12px; cursor:pointer;">我的资产</font>
                            <i class="icon_arrow_right_black"></i>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="mpbtn_history"><i class="zuji"></i></a>
                        <div class="mp_tooltip">
                            <font id="mpbtn_histroy" style="font-size:12px; cursor:pointer;">我的足迹</font>
                            <i class="icon_arrow_right_black"></i>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="mpbtn_collection"><i class="wdsc"></i></a>
                        <div class="mp_tooltip">
                            <font id="mpbtn_wdsc" style="font-size:12px; cursor:pointer;">我的收藏</font>
                            <i class="icon_arrow_right_black"></i>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="mpbtn_email"><i class="email"></i></a>
                        <div class="mp_tooltip">
                            <font id="mpbtn_email" style="font-size:12px; cursor:pointer;">邮箱订阅</font>
                            <i class="icon_arrow_right_black"></i>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="quick_toggle">
            	<ul>
                    <li>
                        
                        <?php if ($this->_var['kf_im_switch']): ?>

                        <a id="IM" IM_type="dsc" onclick="openWin(this)" href="javascript:;"><i class="kfzx"></i></a>
                        <?php else: ?>
                            <?php if ($this->_var['basic_info']['kf_type'] == 1): ?>
                            <a href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $this->_var['basic_info']['kf_ww']; ?>&siteid=cntaobao&status=1&charset=utf-8" class="seller-btn" target="_blank"><i class="icon" style="left: 10px;top: 10px;"></i>联系客服</a>
                            <?php else: ?>
                            <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->_var['basic_info']['kf_qq']; ?>&site=qq&menu=yes" class="seller-btn" target="_blank"><i class="icon" style="left: 10px;top: 10px;"></i>联系客服</a>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="mp_tooltip">客服中心<i class="icon_arrow_right_black"></i></div>
                        
                    </li>
                    <li class="returnTop">
                        <a href="javascript:void(0);" class="return_top"><i class="top"></i></a>
                    </li>
                </ul>

            </div>
        </div>
        <div id="quick_links_pop" class="quick_links_pop"></div>
    </div>
</div>
<div class="email_sub">
	<div class="attached_bg"></div>
	<div class="w1200">
        <div class="email_sub_btn">
            <input type="input" id="user_email" name="user_email" autocomplete="off" placeholder="请输入您的邮箱帐号">
            <a href="javascript:void(0);" onClick="add_email_list();" class="emp_btn">订阅</a>
        </div>
    </div>
</div>
<script type="text/javascript">
	<?php if (! $this->_var['user_id']): ?>
		$(".quick_links li").find("a").click(function(){
			var $this = $(this);
			if(!$this.hasClass('cart_list') && !$this.hasClass('mpbtn_history') && !$this.hasClass('mpbtn_email'))
			{
				$.notLogin("get_ajax_content.php?act=get_login_dialog",'');
				return false;
			}
		});
	<?php endif; ?>
	
	//移动图标出现文字
	$(".quick_links_panel li").mouseenter(function(){
		$(this).children(".mp_tooltip").stop().animate({left:-92,queue:true});
		$(this).children(".mp_tooltip").css("visibility","visible");
		$(this).children(".ibar_login_box").css("display","block");
	});
	$(".quick_links_panel li").mouseleave(function(){
		$(this).children(".mp_tooltip").css("visibility","hidden");
		$(this).children(".mp_tooltip").stop().animate({left:-121,queue:true});
		$(this).children(".ibar_login_box").css("display","none");
	});
	$(".quick_toggle li").mouseover(function(){
		$(this).children(".mp_qrcode").show();
	});
	$(".quick_toggle li").mouseleave(function(){
		$(this).children(".mp_qrcode").hide();
	});
	
	$(".mpbtn_email").click(function(){
		var obj = $(".email_sub");
		if(obj.hasClass("show")){
			obj.removeClass("show");
		}else{
			obj.addClass("show");
		}
	});
	
	//判断浏览器下滚还是上滚
	$(document).ready(function(){
		var p=0,t=0;
		var obj = $(".email_sub");
		$(window).scroll(function(e){
			p = $(this).scrollTop();
			if(t<=p){
				if(obj.hasClass("show")){
					obj.addClass("show");
				}
			}else{
				obj.removeClass("show");
			}
			setTimeout(function(){t = p;},0);		
		});
	});

	
	
	function openWin(obj) {
	   if($(obj).attr('IM_type') != 'dsc'){
		   var goods_id = '&goods_id='+$(obj).attr('goods_id');
	   }else{
		   var goods_id = '';
	   }
		var url='online.php?act=service'+goods_id                   //转向网页的地址;
		var name='webcall';                         //网页名称，可为空;
		var iWidth=700;                          //弹出窗口的宽度;
		var iHeight=500;                         //弹出窗口的高度;
		//获得窗口的垂直位置
		var iTop = (window.screen.availHeight - 30 - iHeight) / 2;
		//获得窗口的水平位置
		var iLeft = (window.screen.availWidth - 10 - iWidth) / 2;
		window.open(url, name, 'height=' + iHeight + ',,innerHeight=' + iHeight + ',width=' + iWidth + ',innerWidth=' + iWidth + ',top=' + iTop + ',left=' + iLeft + ',status=no,toolbar=no,menubar=no,location=no,resizable=no,scrollbars=0,titlebar=no');
	}
	
	
var email = document.getElementById('user_email');
function add_email_list()
{
  if (check_email())
  {
    Ajax.call('user.php?act=email_list&job=add&email=' + email.value, '', rep_add_email_list, 'GET', 'TEXT');
  }
}
function rep_add_email_list(text)
{
  get_email(text);
}	

function check_email()
{
  if (Utils.isEmail(email.value))
  {
    return true;
  }
  else
  {
    get_email('<?php echo $this->_var['lang']['email_invalid']; ?>');
    return false;
  }
}

function get_email(text){
	var ok_title = "确定";
	var cl_title = "取消";
	var title = '提示信息';
	var width = 455; 
	var height = 58;
	var divId = "email_div";
	
	var content = '<div id="' + divId + '">' +
						'<div class="tip-box icon-box">' +
							'<span class="warn-icon m-icon"></span>' +
							'<div class="item-fore">' +
								'<h3 class="ftx-04">' + text + '</h3>' + 
							'</div>' +
						'</div>' +
					'</div>';
	
	pb({
		id:divId,
		title:title,
		width:width,
		height:height,
		ok_title:ok_title, 	//按钮名称
		cl_title:cl_title, 	//按钮名称
		content:content, 	//调取内容
		drag:false,
		foot:true,
		onOk:function(){              
		},
		onCancel:function(){
		}
	});
	
	$('.pb-ok').addClass('color_df3134');
	$('#' + divId + ' .pb-ct .item-fore').css({
		'height' : '58px'
	});
	
	if(text.length <= 15){
		$('#' + divId + ' .pb-ct .item-fore').css({
			"padding-top" : '10px'
		});
	}
}
</script>


