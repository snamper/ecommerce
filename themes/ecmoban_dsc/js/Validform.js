$.Validform = function(a,b,c){
	var a = $(a),
		b = $(b),
		c = $(c),
		it = a.find(".form-item"),
		input = it.find('input'),
		i_error = '<i class="i-error"></i>',
		val = '',
		error,
		tc = 6,
		return_user = 0,
		return_pwd = 0,
		return_mobile = 0,
		return_captcha = 0,
		return_mobile_code = 0,	
		valid;
	
	input.focus(function(){
		var def = $(this).data("default");
		valid = $(this).data('valid');
		error = $("[data-valid='"+valid+"']").parent().next().find('span');
		if($(this).val() == ''){
			error.html(def);
			error.removeClass();
			error.parent().prev().removeClass("form-item-error");
		}
	});
	input.blur(function(){
		var _this = $(this);
		valid = _this.data('valid');
		val = _this.val();
		error = $("[data-valid='"+valid+"']").parent().next().find('span');
		switch(valid){
			case 'username':
			nameValid(val,error);
			break;
			
			case 'password':
			passwordValid(val,error,0);
			break;
			
			case 'password2':
			confirmPasswordValid(val,error);
			break;
			
			case 'tel':
			phoneValid(val,error);
			break;
			
			case 'captcha':
			codeValid(val,error);
			break;
			
			case 'tel_code':
			telcodeValid(val,error);
			break;
			
			default:
			return true;
		}
	});
	
	input.keyup(function(){
		var _this = $(this);
		valid = _this.data('valid');
		val = _this.val();
		error = $("[data-valid='"+valid+"']").parent().next().find('span');
		
		if($(this).data('valid')=='password'){
			passwordValid(val,error,1);
		}
	});
	
	//用户名验证
	nameValid = function(val,error){
		if(val == ''){
			//验证用户名是否为空
			error.parent().prev().addClass("form-item-error").removeClass("form-item-valid");
			error.removeClass().addClass("error");
			error.html(i_error + "请输入用户名");
			return false;
		}else if(!/^[a-zA-Z0-9_]{6,20}$/.test(val)){
			//验证用户名长度6-20字符之间
			error.parent().prev().addClass("form-item-error").removeClass("form-item-valid");
			error.removeClass().addClass("error");
			error.html(i_error+'长度在6-20个字符之间');
			return false;
		}else if(/^[0-9]*$/.test(val)){
			//验证用户名不能为存数字
			error.parent().prev().addClass("form-item-error").removeClass("form-item-valid");
			error.removeClass().addClass("error");
			error.html(i_error+'用户名不能全部为数字');
			return false;
		}else{
			Ajax.call('user.php?act=is_user', 'username=' + val, function(data){
				if (data.result == "false"){ 
					error.parent().prev().removeClass("form-item-error").addClass("form-item-valid");
					error.html('');
					return_user = 0;
				}else{
					error.parent().prev().addClass("form-item-error").removeClass("form-item-valid");
					error.removeClass().addClass("error");
					error.html(i_error+'用户名已经存在,请重新输入');
					return_user = 1;
					return false;
				}
			} , 'GET', 'JSON', true, true);	
		}
	}
	
	//判断用户名是否存在
	/*exisUsername = function(val,error){
		var obj = error.parent().prev();
		if(val == "s123456"){
			obj.addClass("form-item-error");
			obj.find(".suggest-container").show();
			obj.css("z-index","15");
		}else{
			obj.removeClass("form-item-error");
			obj.find(".suggest-container").hide();
		}
	}*/
	
	//密码验证和密码强度验证
	passwordValid = function(val,error,state){
		var m=0,Modes=0;
		if(state == 0){
			if(val == ''){
				error.parent().prev().addClass("form-item-error").removeClass("form-item-valid");
				error.removeClass().addClass("error");
        		error.html(i_error + "请输入密码");
        	}else if(val.length < 6){
				error.parent().prev().addClass("form-item-error").removeClass("form-item-valid");
				error.removeClass().addClass("error");
            	error.html(i_error+'长度在6-20个字符之间');
			}
		}else{
            var Modes = 0;
            for (i=0; i<val.length; i++)
            {
				var charType = 0;
				var t = val.charCodeAt(i);
			if (t>=48 && t <=57){
				charType = 1;//数字
			}else if (t>=65 && t <=90){
				charType = 2;//大写
			}
			else if (t>=97 && t <=122)
				charType = 4;//小写
			else
				charType = 4;
				Modes |= charType;
			}
			
			for (i=0;i<4;i++){
				if (Modes & 1) m++;
				Modes>>>=1;
			}
			if (val.length<=4){
				m = 1;
			}
        }
		
		
        if(m>0){
			error.removeClass().addClass("strength");
			
            if( m == 1 && val.length >5){
				error.parent().prev().removeClass("form-item-error").addClass("form-item-valid");
			    error.html("<i class='i-pwd-weak'></i>有被盗风险，建议使用字母、数字和符号两种及以上组合");
            }
            if(m == 2){
				error.parent().prev().removeClass("form-item-error").addClass("form-item-valid");
				error.html("<i class='i-pwd-medium'></i>安全强度适中，可以使用三种以上的组合来提高安全强度");
            }   
            if(m == 3){
				error.parent().prev().removeClass("form-item-error").addClass("form-item-valid");
				error.html("<i class='i-pwd-strong'></i>您的密码很安全");
            }
        }
	}
	
	//确认密码验证
	confirmPasswordValid = function(val,error){
		var pwd = $("[data-valid='password']").val();
		error.parent().prev().addClass("form-item-error").removeClass("form-item-valid");
		error.removeClass().addClass("error");
		if(val == ''){
			//验证确认密码是否为空
			error.html(i_error + "确认密码不能为空");
			return false;
		}else if(val != pwd){
			//验证确认密码和密码是否一致
			error.html(i_error+'两次密码输入不一致');
			return_pwd = 1;
			return false;
		}else{
			error.parent().prev().removeClass("form-item-error").addClass("form-item-valid");
			error.html('');
			return_pwd = 0;
		}
	}
	
	phoneValid = function(val,error){
		if(val == ''){
			//验证手机号是否为空
			error.parent().prev().addClass("form-item-error").removeClass("form-item-valid");
			error.removeClass().addClass("error");
			error.html(i_error + "请输入手机号码");
			return false;
		}else if(!(Utils.isPhone(val))){
			//验证手机格式
			error.parent().prev().addClass("form-item-error").removeClass("form-item-valid");
			error.removeClass().addClass("error");
			error.html(i_error+'格式不正确');
			return false;
		}else{
			Ajax.call('user.php?act=check_phone', 'mobile_phone=' + val, function(result){
				if ( result.replace(/\r\n/g,'') == 'ok' ){
					error.parent().prev().removeClass("form-item-error").addClass("form-item-valid");
					error.html('');
					$("#zphone").attr("onclick","sendSms();");
					return_mobile = 0;
					return false;
				}else{
					//验证验证码是否正确
					error.parent().prev().addClass("form-item-error").removeClass("form-item-valid");
					error.removeClass().addClass("error");
					error.html(i_error+'手机号已被注册');
					return_mobile = 1;
					return false;
				}
			} , 'GET', 'TEXT', true, true);	
		}
	}
	
	codeValid = function(val,error){
		if(val == ''){
			error.parent().prev().addClass("form-item-error").removeClass("form-item-valid");
			error.removeClass().addClass("error");
			//验证验证码是否为空
			error.html(i_error + "请输入验证码");
			return false;
		}else{
			Ajax.call('user.php?act=is_register_captcha', 'captcha=' + val, function(res){
				if (res.result == "false"){
					//验证验证码是否正确
					error.parent().prev().addClass("form-item-error").removeClass("form-item-valid");
					error.removeClass().addClass("error");
					error.html(i_error+'验证码错误');
					return_captcha = 1;
					return false;
				}else{
					error.parent().prev().removeClass("form-item-error").addClass("form-item-valid");
					error.html('');
					return_captcha = 0;
					return false;
				}
			} , 'GET', 'JSON', true, true);	
		}
	}
	
	telcodeValid = function(val,error){
		if(val == ''){
			//验证手机验证码是否为空
			error.parent().prev().addClass("form-item-error").removeClass("form-item-valid");
			error.removeClass().addClass("error");
			error.html(i_error + "请输入手机验证码");
			return false;
		}else{
			Ajax.call('user.php?act=is_mobile_code', 'mobile_code=' + val, function(data){
				if (data.result == "ok"){ 
					error.parent().prev().removeClass("form-item-error").addClass("form-item-valid");
					error.html('');
					return_mobile_code = 0;
				}else{
					error.parent().prev().addClass("form-item-error").removeClass("form-item-valid");
					error.removeClass().addClass("error");
					error.html(i_error+'手机验证码错误');
					return_mobile_code = 1;
					return false;
				}
			} , 'GET', 'JSON', true, true);	
		}
	}
	
	c.click(function(){
		var i = 0;
		var b;
		var is_captcha = $("form[name='formUser'] :input[name='is_captcha']").val();
		var is_code = $("form[name='formUser'] :input[name='is_code']").val();
		input.each(function(index,ele){
			var input_val = $(this).val();
			val = $(this).val();
			valid = $(this).data('valid');
			error = $("[data-valid='"+valid+"']").parent().next().find('span');

			if(input_val == ""){
				switch(index){
					case 0:
					nameValid(val,error);
					return false;
					break;
					
					case 1:
					passwordValid(val,error,0);
					return false;
					break;
					
					case 2:
					confirmPasswordValid(val,error);
					return false;
					break;
					
					case 3:
					phoneValid(val,error);
					return false;
					break;
					
					case 4:
					if(is_captcha == 1){
						codeValid(val,error);
					}
					return false;
					break;
					
					case 5:
					if(is_code == 1){
						telcodeValid(val,error);
					}
					return false;
					break;
					
					default:
					return true;
				}
			}else{
				i++;
			}
		});
		
		if(is_captcha == 0){
			tc -= 1;
		}
		
		if(is_code == 0){
			tc -= 1;
		}

		if(i == tc && (return_user == 0 && return_pwd == 0 && return_mobile == 0 && return_captcha == 0 && return_mobile_code == 0)){
			a.submit();
		}else{
			tc = 6; //初始化个数
		}
	});
}