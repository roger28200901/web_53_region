<?php
include('config.php');
$path = "layouts/" . uniqid(time()) . ".html";
file_put_contents($path, $_POST['html']);
mysqli_query($mysqli, "INSERT INTO `layouts` (`id`, `layout_name`, `layout_path`) VALUES (NULL, '$_POST[layout_name]', '$path');");
alert('新增版型成功');
href('layout-index.php');
