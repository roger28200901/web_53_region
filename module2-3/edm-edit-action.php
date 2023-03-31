<?php
	include('config.php');
	if(isset($_FILES['image']['tmp_name']))
	{
		$image = "images/".$_FILES['image']['name'];	
		move_uploaded_file($_FILES['image']['tmp_name'],$image);
	} else {
		$image = "";	
	}
	mysqli_query($mysqli,"UPDATE `edms` SET `edm_name` = '$_POST[edm_name]', `layout_name` = '$_POST[layout_name]', `title` = '$_POST[title]', `content` = '$_POST[content]', `image` = '$image',`link` = '$_POST[link]' WHERE `edms`.`id` = $_POST[id];");
	alert('修改電子報成功');
	href('edm-index.php');
?>