<?php
	include('config.php');
	$id = $_GET['id'];
	mysqli_query($mysqli,"DELETE FROM `users` WHERE `users`.`id` = $id");
	alert('刪除成功');
	href('back.php');
?>