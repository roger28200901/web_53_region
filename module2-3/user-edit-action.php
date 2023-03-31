<?php
	include('config.php');
	
	mysqli_query($mysqli,"UPDATE `users` SET `username` = '$_POST[username]', `password` = '$_POST[password]', `name` = '$_POST[name]', `power` = '$_POST[power]' WHERE `users`.`id` = $_POST[id];");
	alert('修改成功');
	href('back.php');
?>