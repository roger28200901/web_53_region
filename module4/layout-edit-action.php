<?php
	include('config.php');
	$path = "layouts/" . uniqid(time()). ".html";
	file_put_contents($path,$_POST['html']);
	mysqli_query($mysqli,"UPDATE `layouts` SET `layout_name` = '$_POST[layout_name]', `layout_path` = '$path' WHERE `layouts`.`id` = $_POST[id];");
	alert('修改版型成功');
	href('layout-index.php');
?>