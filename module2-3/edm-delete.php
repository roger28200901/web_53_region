<?php
	include('config.php');
	mysqli_query($mysqli,"DELETE FROM `edms` WHERE `edms`.`id` = $_GET[id]");
	alert('刪除成功');
	href('edm-index.php');
?>