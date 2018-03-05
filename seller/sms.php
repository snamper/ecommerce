<?php
/**
 * ECSHOP 商家短信管理
 * ============================================================================
 * 版权所有 2005-2016 上海商创网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecmoban.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: yehuaixiao $
 * $Id: order.php 17219 2011-01-27 10:49:19Z yehuaixiao $
 */


define('IN_ECS', true);
require (dirname(__FILE__) . '/includes/init.php');
$mobile = $_POST['mobile'] + 0;
$mobile_code = $_POST['mobile_code'] + 0;
$security_code = $_POST['seccode'] + 0;
$username = !empty($_POST['username']) ? trim($_POST['username']) : '';
$sms_value = isset($_POST['sms_value']) ? trim($_POST['sms_value']) : '';

if ($_GET['act'] == 'check')
{
	if (($mobile != $_SESSION['sms_mobile']) || ($mobile_code != $_SESSION['sms_mobile_code']))
	{
		die(json_encode(array('msg' => '手机验证码输入错误。')));
	}
	else {
		die(json_encode(array('code' => '2')));
	}
}

if ($_GET['act'] == 'send')
{
	if (empty($mobile)) {
		die(json_encode(array('msg' => '手机号码不能为空')));
	}

	$preg = '/^1[0-9]{10}$/';

	if (!preg_match($preg, $mobile))
	{
		die(json_encode(array('msg' => '手机号码不正确，请重新输入')));
	}

	if ($_SESSION['sms_security_code'] != $security_code)
	{
		die(json_encode(array('msg' => 'you are lost.')));
	}

	if ($_SESSION['sms_mobile'])
	{
		if (local_strtotime(read_file($mobile)) > (gmtime() - 60) )
		{
			die(json_encode(array('msg' => '获取验证码太过频繁，一分钟之内只能获取一次。')));
		}
	}

	$sql = 'select user_id,user_name from ' . $ecs->table('users') . " where mobile_phone='" . $mobile . "'";
	$row = $db->getRow($sql);

	if ($_GET['flag'] == 'register')
	{
		if (!empty($row['user_id']))
		{
			die(json_encode(array('msg' => '手机已存在,请重新输入')));
		}
	}
	elseif ($_GET['flag'] == 'forget')
	{
		if (empty($row['user_id'])) {
			die(json_encode(array('msg' => '手机号码不存在\n无法通过该号码找回密码')));
		}
	}

	$mobile_code = random(4, 1);

	if ($GLOBALS['_CFG']['sms_type'] == 0)
	{
		$message = '您的验证码是：' . $mobile_code . '，请不要把验证码泄露给其他人，如非本人操作，可不用理会';
	}
	else {
		$message = array('mobile_code' => $mobile_code, 'user_name' => $username, 'sms_value' => $sms_value);
	}

	include (ROOT_PATH . 'includes/cls_sms.php');
	$sms = new sms();
	$sms_error = '';
	$send_result = $sms->send($mobile, $message, '', 1, '', '', $sms_error, $mobile_code);
	write_file($mobile, 'sms/' . date('Y-m-d H:i:s'));
	if (isset($send_result) && $send_result) {
		$_SESSION['sms_mobile'] = $mobile;
		$_SESSION['sms_mobile_code'] = $mobile_code;
		//$_SESSION['temp_user_id'] = $row['user_id'];
		//$_SESSION['temp_user_name'] = $row['user_name'];
		$sms_security_code = rand(1000, 9999);
		$_SESSION['sms_security_code'] = $sms_security_code;
		die(json_encode(array('code' => 2, 'flag' => htmlspecialchars($_GET['flag']), 'sms_security_code' => $sms_security_code)));
	}
	else
	{
		if (empty($username))
		{
			$error = 1;
			$sms_error = '请填写用户名';
		}

		die(json_encode(array('msg' => $sms_error, 'error' => $error)));
	}
}
function random($length = 6, $numeric = 0)
{
	(PHP_VERSION < '4.2.0') && mt_srand((double) microtime() * 1000000);

	if ($numeric)
	{
		$hash = sprintf('%0' . $length . 'd', mt_rand(0, pow(10, $length) - 1));
	}
	else
	{
		$hash = '';
		$chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
		$max = strlen($chars) - 1;

		for ($i = 0; $i < $length; $i++) {
			$hash .= $chars[mt_rand(0, $max)];
		}
	}

	return $hash;
}

function write_file($file_name, $content)
{
	mkdirs('sms/' . date('Ymd'));
	$filename = 'sms/' . date('Ymd') . '/' . $file_name . '.log';
	$Ts = fopen($filename, 'a+');
	fputs($Ts, '\r\n' . $content);
	fclose($Ts);
}

function mkdirs($dir, $mode = 511)
{
	if (is_dir($dir) || @mkdir($dir, $mode))
	{
		return true;
	}

	if (!mkdirs(dirname($dir), $mode))
	{
		return false;
	}

	return @mkdir($dir, $mode);
}

function read_file($file_name)
{
	$content = '';
	$filename = 'sms/' . date('Ymd') . '/' . $file_name . '.log';

	if (function_exists('file_get_contents'))
	{
		@$content = file_get_contents($filename);
	}
	else if (@$fp = fopen($filename, 'r'))
	{
		@$content = fread($fp, filesize($filename));
		@fclose($fp);
	}

	$content = explode('\r\n', $content);
	return end($content);
}
?>
