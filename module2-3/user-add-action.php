<?php
	include('config.php');
	$data = mysqli_query($mysqli,"select * from `users` where `username` = '$_POST[username]'");
	if(mysqli_num_rows($data) > 0)
	{
	alert('此帳號已有人使用');
	href('back.php');
	exit();
	}
	mysqli_query($mysqli,"INSERT INTO `users` (`id`, `username`, `password`, `name`, `power`) VALUES (NULL, '$_POST[username]', '$_POST[password]', '$_POST[name]', '$_POST[power]');");
	alert('新增成功');
	href('back.php');
?>