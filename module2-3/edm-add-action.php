<?php
include('config.php');
if (isset($_FILES['image']['tmp_name'])) {
	$image = "images/" . $_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], $image);
} else {
	$image = "";
}
mysqli_query($mysqli, "INSERT INTO `edms` (`id`, `edm_name`, `layout_name`, `title`, `content`, `image`, `link`) VALUES (NULL, '$_POST[edm_name]', '$_POST[layout_name]', '$_POST[title]', '$_POST[content]', '$image', '$_POST[link]');");
alert('新增電子報成功');
href('edm-index.php');
