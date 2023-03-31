<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>後台管理</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<script src="jquery-3.2.1.js">
</script>
<script>
	// 設置倒數計時器
	var countDownDate = new Date().getTime() + 30000;
	var countDownFive = new Date().getTime() + 5000;
	var x = counter();

	function counter() {
		console.log('yes')
		setInterval(function() {

			var now = new Date().getTime();

			var distance = countDownDate - now;

			// 計算剩餘時間
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);

			// 在頁面上顯示倒數計時器
			document.getElementById("timer").innerHTML = "剩餘時間: " + seconds + " 秒";

			// 如果時間結束，顯示對話框
			if (distance < 0) {
				clearInterval(x);
				var distance2 = countDownFive - now

				var modal = document.getElementById("myModal");
				// When the user clicks the button, open the modal 
				modal.style.display = "block";

				var span = document.getElementsByClassName("close")[0];
				// When the user clicks on <span> (x), close the modal
				span.onclick = function() {
					modal.style.display = "none";
				}
				var response = null;
				$('#btn-yes').on('click', function() {
					response = true;
					countDownDate = new Date().getTime() + 30000;
					modal.style.display = "none";
					counter();
				})
				$('#btn-no').on('click', function() {
					response = false;
					location.href = 'logout.php'
					modal.style.display = "none";
				})
			}
		}, 1000)
	}
</script>

<body>

	<!-- The Modal -->
	<div id="myModal" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<span class="close">&times;</span>
			<p>是否繼續操作</p>
			<button id="btn-yes">YES</button>
			<button id="btn-no">NO</button>
		</div>

	</div>
	<?php
	include('config.php');
	if (!$_SESSION['login']) {
		alert('尚未登入');
		href('index.php');
	}
	$id = $_SESSION['user_id'];
	$data = mysqli_query($mysqli, "select * from `users` where `id` = $id");
	$user = mysqli_fetch_array($data);
	?>
	<div class="main" style="text-align:center;">
		<h1><?= $user['power'] ? '一般會員' : '管理者' ?>專區</h1>
		<div id="timer"></div>
		<input type="button" value="回到上一頁" onclick="location.href='index.php'">
		<?php
		if ($user['power'] == 1) {
		?>
			<input type="button" value="登出" onclick="location.href='logout.php'">
		<?php
		} else {
		?>
			<input type="button" value="登出" onclick="location.href='logout.php'">
			<input type="button" value="登入/登出紀錄" onclick="location.href='logs.php'">
			<input type="button" value="新增會員" onclick="$('#add').slideToggle(500);$('#show').slideToggle(500)">
			<div id="add" hidden style="text-align:center; width:50%; margin:0 auto; border:1px solid #CCC; border-radius:8px;">
				<b>新增會員</b>
				<form method="post" id="add-f" action="user-add-action.php">
					帳號<input type="text" name="username">
					<p>
						密碼<input type="password" name="password">
					<p>
						姓名<input type="text" name="name">
					<p>
						權限
					<p>
						管理者<input type="radio" name="power" value="0">

						一般使用者<input type="radio" name="power" value="1" checked="checked">
					<p>
						<input type="submit" value="新增會員">
						<input type="reset" value="清除">
				</form>
			</div>
			<script>
				$('#add-f').submit(function() {
					if (
						$('[name=username]').val() == "" ||
						$('[name=password]').val() == "" ||
						$('[name=name]').val() == ""
					) {
						alert('尚有欄位未填寫');
						return false;
					}
				})
			</script>

			<div id="show">

				<form method="get">
					查詢
					<input type="text" name="keyword" placeholder="請輸入關鍵字">
					排序
					<select name="orderby">
						<option value="username" <?= $_GET['orderby'] == 'username' ? 'selected' : '' ?>>帳號</option>
						<option value="name" <?= $_GET['orderby'] == 'name' ? 'selected' : '' ?>>姓名</option>
						<option value="id" <?= $_GET['orderby'] == 'id' ? 'selected' : '' ?>>使用者編號</option>
					</select>
					<select name="sort">
						<option value="asc">升冪</option>
						<option value="desc" <?= $_GET['sort'] == 'desc' ? 'selected' : '' ?>>降冪</option>
					</select>
					<input type="submit" value="查詢">
				</form>
				<hr>
				<table>
					<tr>
						<th>使用者編號</th>
						<th>帳號</th>
						<th>密碼</th>
						<th>姓名</th>
						<th>權限</th>
						<th>操作</th>
					</tr>
					<?php
					if (isset($_GET['keyword'])) {
						$sql = "SELECT * FROM `users` WHERE `username` LIKE '%$_GET[keyword]%' ORDER BY `users`.`$_GET[orderby]` $_GET[sort]";
					} else {
						$sql = "select * from `users`";
					}
					$results = mysqli_query($mysqli, $sql);
					while ($row = mysqli_fetch_array($results)) {
					?>
						<tr>
							<td><?= sprintf("%03d", $row['id'] - 1) ?></td>
							<td><?= $row['username'] ?></td>
							<td><?= $row['password'] ?></td>
							<td><?= $row['name'] ?></td>
							<td><?= $row['power'] ? '一般使用者' : '管理者' ?></td>
							<td>
								<?php
								if ($row['id'] == 1) {
									echo "admin管理者不可編輯";
								} else {
								?>
									<input type="button" value="修改" onclick="location.href='user-edit.php?id=<?= $row['id'] ?>'">
									<input type="button" value="刪除" onclick="location.href='user-delete.php?id=<?= $row['id'] ?>'">
								<?php
								}
								?>
							</td>
						</tr>
					<?php
					}
					?>
				</table>
			</div>

		<?php
		}

		?>
	</div>
</body>

</html>