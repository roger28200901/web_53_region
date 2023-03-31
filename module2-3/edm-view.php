<?php
include('config.php');
$id = $_GET['id'];
$data = mysqli_query($mysqli, "select * from `edms` where `id` = $id");
$edm = mysqli_fetch_array($data);
$r = mysqli_query($mysqli, "select * from `layouts` where `layout_name` = '$edm[layout_name]'");
$lay = mysqli_fetch_array($r);
$html = file_get_contents($lay['layout_path'], true);
$html = str_replace(['Time', 'Name', 'Cost', 'Content', 'images/', '###', 'Link'], [$edm['time'], $edm['edm_name'], $edm['title'], $edm['content'], $edm['image'], $edm['link'], $edm['link']], $html);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>電子報瀏覽</title>
</head>
<link href="style.css" rel="stylesheet" type="text/css" />

<body>
	<div class="main">
		<center>
			<h1>電子報瀏覽</h1>
			<input type="button" value="返回" onclick="location.href='edm-index.php'">
		</center>
		<div id="show">
			<?= $html ?>
		</div>
	</div>
	<script src="../module2-3/jquery-3.2.1.js">
	</script>
	<script>
		var html = $('#show').html();
		$('#code').text(html);
	</script>

</body>

</html>