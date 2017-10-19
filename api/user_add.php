<?php
	session_start();
	$ON_ADMIN_PAGE="Yap";
	require_once("../include/setting_oj.inc.php");
	require_once("../include/login_functions.php");
	require_once("../include/user_check_functions.php");

	if (!havePrivilege("PAGE_EDITOR")){
		echo "<a href='../loginpage.php'>Please Login First!</a>";
		exit(1);
	}
	
	if (!isset($_POST['user_id'])) {
		echo "Not Got an User Id";
		exit(0);
	}
	
	$user_id=trim($_POST['user_id']);
	$user_nick=$_POST['nick'];
	$user_pwd=$_POST['password'];
	$user_pwdII=$_POST['password_again'];
	$user_school=$_POST['school'];
	$user_email=$_POST['email'];
	$user_ip=$_SERVER['REMOTE_ADDR'];
	if (get_magic_quotes_gpc ()) {
		$user_id= stripslashes ($user_id);
		$user_nick= stripslashes ($user_nick);
		$user_pwd= stripslashes ($user_pwd);
	}
	
	$password=pwGen($user_pwd);
	
	if (isUseridExist($user_id,$pdo)) {
		exit("User Exist!");
	}

	$sql=$pdo->prepare("INSERT INTO `users` 
	(`user_id`,`email`,`ip`,`accesstime`,`password`,`reg_time`,`nick`,`school`)
	VALUES(?,?,?,NOW(),?,NOW(),?,?)");
	$sql->execute(array($user_id,$user_email,$user_ip,$password,$user_nick,$user_school));

	echo "success";
	echo "<script language='javascript'>\n";
	echo "window.location.replace('../admin/user_list.php');\n";
	echo "</script>";
?>
