<?php session_start(); $ON_ADMIN_PAGE="Yap"; ?>
<!DOCTYPE html>
<html>
	<head>
		<?php require_once('../include/admin_head.inc.php'); ?>
		<title>用户管理</title>
	</head>	
	
<?php
	//Vars
	require_once('../include/setting_oj.inc.php');
	//Prepares
	$sql=$pdo->prepare("SELECT * FROM `users` ORDER BY `reg_time` ASC");
	$sql->execute();
	$usersList=$sql->fetchAll(PDO::FETCH_ASSOC);
	//Page Includes
	require("./pages/user_list.php");
?>
	
</html>