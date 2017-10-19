<?php 
	session_start(); $ON_ADMIN_PAGE="Yap";
	//Vars
	require_once('../include/setting_oj.inc.php');
	require_once("../include/user_check_functions.php");
	
	//Privilege Check
	if (!havePrivilege("PAGE_EDITOR")) {
		exit("403");
	}
	
	//Page Includes
	require("./pages/user_import.php");
?>
