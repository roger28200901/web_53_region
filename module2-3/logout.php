<?php
	include('config.php');
	$data = mysqli_query($mysqli,"select * from `users` where `id` = $_SESSION[user_id]");
	$user = mysqli_fetch_array($data);
	mysqli_query($mysqli,"INSERT INTO `logs` (`username`, `name`, `action`, `time`) VALUES ('$user[username]', '$user[name]', '登出', CURRENT_TIMESTAMP);");
	session_unset();
	alert('登出成功');
	href('login.php');
