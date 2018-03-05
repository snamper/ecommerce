<?php   

define('IN_ECS', true);
 
require(dirname(__FILE__) . '/includes/init.php');

if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0){
	
	$filename120 = "data/images_user/" . $_SESSION['user_id'] . "_120.jpg"; 
	$filename48 = "data/images_user/" . $_SESSION['user_id'] . "_48.jpg"; 
	$filename24 = "data/images_user/" . $_SESSION['user_id'] . "_24.jpg";   
	$somecontent1 = base64_decode($_POST['png1']);   
	$somecontent2 = base64_decode($_POST['png2']);  
	$somecontent3 = base64_decode($_POST['png3']);  
	
	get_oss_add_file(array($filename120, $filename48, $filename24));
	
	$parent['user_picture'] = $filename120;
	$GLOBALS['db']->autoExecute($GLOBALS['ecs']->table('users'), $parent, 'UPDATE', "user_id = '" .$_SESSION['user_id']. "'");
	
	if ($handle = fopen($filename120, "w+")) {   
		if (!fwrite($handle, $somecontent1) == FALSE) {   
		 fclose($handle);  
		}  
	}  
	if ($handle = fopen($filename48, "w+")) {   
		if (!fwrite($handle, $somecontent2) == FALSE) {   
		 fclose($handle);  
		}  
	} 
	if ($handle = fopen($filename24, "w+")) {   
		if (!fwrite($handle, $somecontent3) == FALSE) {   
		 fclose($handle);  
		}  
	}
	echo "success=上传成功"; 
}else{
	echo "success=上传失败"; 
}
?>