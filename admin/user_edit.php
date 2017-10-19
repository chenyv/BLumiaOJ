<?php 
	session_start(); $ON_ADMIN_PAGE="Yap";
	//Vars
	require_once('../include/setting_oj.inc.php');
	require_once("../include/user_check_functions.php");
	
	//Privilege Check
	if (!havePrivilege("PAGE_EDITOR")) {
		exit("403");
	}
	
	//Prepares
	if (isset($_GET['user_id'])) {
		//check nid if exist
		$user_id = $_GET['user_id'];
		$sql=$pdo->prepare("SELECT * FROM `users` WHERE `user_id`=?");
		$sql->execute(array($user_id));
		$userInfo = $sql->fetch(PDO::FETCH_ASSOC);
		$page_helper = LA_U_ARE_EDITING." [". L_USER . ":{$user_id}]";
		$email = $userInfo['email'];
		$nick = $userInfo['nick'];
		$school = $userInfo['school'];
		
		//Page Includes
		require("./pages/user_edit.php");
	} else {
		//new
		$user_id = "";
		$email = "";
		$nick = "";
		$school = "";
		$page_helper = "正在新建用户";
		$new = true;

		//Page Includes
		require("./pages/user_add.php");	
	}

?>
