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
	
	/*
	removexss
	if (get_magic_quotes_gpc ()) {
		$user_id= stripslashes ( $user_id);
		$password= stripslashes ( $password);
	}*/

	if (!get_magic_quotes_gpc()) {
		$user_id 	= addslashes($_POST['user_id']);
		$nick		= addslashes($_POST['nick']);
		$school		= addslashes($_POST['school']);
		$email		= addslashes($_POST['email']);
	  }
	
	
	/* do check work*/
	$sql=$pdo->prepare("SELECT * FROM `users` WHERE `user_id`=?");
	$sql->execute(array($user_id));
	$affected_rows = $sql->rowCount();
	$user_exist = ($affected_rows == 1) ? true : false;
	
	if($user_exist) {
		$sql=$pdo->prepare("UPDATE `users` SET `nick`=?,`school`=?,`email`=? WHERE `user_id`=?");
		$sql->execute(array($nick,$school,$email,$user_id));
		echo "User Modified Successful";
		
	} else {
		echo "User NOT Exist!";
		exit(0);
	}

	echo "success";
	echo "<script language='javascript'>\n";
	echo "window.location.replace('../admin/user_list.php');\n";
	echo "</script>";

?>
