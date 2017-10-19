<body>
	<?php require('./pages/components/offcanvas.php');?>
	<div class="container" id="mainContent">
		<div class="page-header">
			<h1>用户管理 <small>用户列表</small></h1>
		</div>
		<p class="lead">
			您可以从这里对用户进行编辑和管理。
		</p>
		<ul class="nav nav-pills nav-justified">
			<li><a href="./user_edit.php">添加用户</a></li>
			<li><a href="./user_import.php">批量导入用户</a></li>
		</ul>
		<br/>
		<div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nick</th>
						<th>School</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach($usersList as $row) {
					echo "<tr>";
					echo "<td>".$row['user_id']."</td>";
					echo "<td>".$row['nick']."</td>";
					echo "<td>".$row['school']."</td>";
					echo "<td><a href='./user_edit.php?user_id={$row['user_id']}'>".L_EDIT."</a></td>";
					echo "</tr>";
					//var_dump($row);
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</body>