<!DOCTYPE html>
<html>
<head>
	<?php require_once('../include/admin_head.inc.php'); ?>
	<title>用户编辑</title>
</head>	
<body>
	<?php require('./pages/components/offcanvas.php');?>
	<div class="container" id="mainContent">
		<div class="page-header">
			<h1>用户管理 <small>添加用户</small></h1>
		</div>
		<p class="lead">
			<?php echo $page_helper;?>
		</p>
		<form method="POST" class="form-horizontal" action="../api/user_add.php">
		    <label>用户ID:</label>
			<input type="text" class="form-control" name="user_id" placeholder="Enter User Id" value="<?php echo $user_id;?>" />
			<label>Nickname:</label>
			<input type="text" class="form-control" name="nick" placeholder="Nick name" value="<?php echo $nick;?>" />
			<label>School:</label>
			<input type="text" class="form-control" name="school" placeholder="School" value="<?php echo $school;?>" />
			<label>Email:</label>
			<input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email;?>" />
			<label class="control-label"><?php echo L_PSW;?></label>
			<input
					name="password" 
					class="form-control" 
					placeholder="(*) <?php echo L_PSW;?>" 
					type="password"
					minlength="6"
					data-validation-minlength-message="<?php echo L_PSW_DV_MSG;?>"
					required
				>
				<label class="control-label"><?php echo L_PSW_AGAIN;?></label>
				<input 
					name="password_again" 
					class="form-control" 
					data-validation-match-match="password" 
					data-validation-match-message = "<?php echo L_PSW2_DV_MSG;?>"
					placeholder="(*) <?php echo L_PSW_AGAIN;?>" 
					type="password"
				>
			<br />
			<button type="submit" class="btn btn-primary"><?php echo L_SUBMIT;?></button>
		</form>
	</div>

</body>
</html>