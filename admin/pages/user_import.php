<!DOCTYPE html>
<html>
<head>
	<?php require_once('../include/admin_head.inc.php'); ?>
	<title><?php echo LA_NEWS_MAN." - {$OJ_NAME}";?></title>
</head>	
<body>
	<?php require('./pages/components/offcanvas.php');?>
	<div class="container" id="mainContent">
		<div class="page-header">
			<h1>用户管理 <small>导入用户</small></h1>
		</div>

		<p> 导入格式如下：	学号* | 密码* | 姓名 | 班级 | Email <br />
		例如：221701001 | 123456 | 某某某 | 数计学院2017级软件工程1班 | a@b.com <br />
		分隔符可以是：Tab, 空格, | , 分号 四种情况。<br />
		其中 姓名 | 班级 | Email 是可选的。<br />
		如果是竞赛，密码可以是身份证号或电话号码后六位。
		</p>

		<form method="post" action="../api/user_import.php">
			<div class="form-group">
    			<label for="user_list">导入用户数据:</label>
				<textarea class="form-control" placeholder="" name="user_list" ></textarea>
  			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">导入</button>
			</div>
		</form>
	</div>
</body>
</html>