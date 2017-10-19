<?php
	session_start();
	$ON_ADMIN_PAGE="Yap";
	require_once("../include/setting_oj.inc.php");
	require_once("../include/login_functions.php");
	require_once("../include/user_check_functions.php");
	require_once("../include/common_functions.inc.php");
	
	if (!havePrivilege("PAGE_EDITOR")){
		echo "<a href='../loginpage.php'>Please Login First!</a>";
		exit(1);
	}

	$arr_user = explode("\n", $_POST['user_list']);
	$arr_err  = array();
	foreach ($arr_user as $user) {
		$user = trim($user);
		if (empty($user))
			continue;
		//$arr_data = explode('|', $user);
		$arr_data = multiexplode(array(",","\t","|"," "),$user);
		foreach ($arr_data as &$data)
		{
			$data = trim($data);
		}
		$user_id = $arr_data[0];
		$password = pwGen($arr_data[1]);
		$nick = '';
		$school   = '';
		$email    = '';

		if (isset($arr_data[2]))
			$nick = $arr_data[2];
		if (isset($arr_data[3]))
			$school = $arr_data[3];
		if (isset($arr_data[4]))
			$email = $arr_data[4];

		$ip=$_SERVER['REMOTE_ADDR'];

		if (!isUseridExist($user_id,$pdo)) {
			$sql=$pdo->prepare("INSERT INTO `users` 
				(`user_id`,`email`,`ip`,`accesstime`,`password`,`reg_time`,`nick`,`school`)
				VALUES(?,?,?,NOW(),?,NOW(),?,?)");
			$sql->execute(array($user_id,$email,$ip,$password,$nick,$school));
		}
	}
	
	echo "success";
	echo "<script language='javascript'>\n";
	echo "window.location.replace('../admin/user_list.php');\n";
	echo "</script>";
?>