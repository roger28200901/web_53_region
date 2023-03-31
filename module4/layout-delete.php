<?php
	include('config.php');
	$data = mysqli_query($mysqli,"select * from `layouts` where `id` = $_GET[id]");
	$lay = mysqli_fetch_array($data);
	mysqli_query($mysqli,"DELETE FROM `layouts` WHERE `layouts`.`id` = $_GET[id]");	
	mysqli_query($mysqli,"DELETE FROM `edms` WHERE `edms`.`layout_name` = '$lay[layout_name]'");
	alert('刪除成功');
	href('layout-index.php');
?>