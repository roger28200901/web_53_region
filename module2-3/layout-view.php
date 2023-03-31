<?php
	include('config.php');
	$id = $_GET['id'];
	$data = mysqli_query($mysqli,"select * from `layouts` where `id` = $id");
	$lay = mysqli_fetch_array($data);
	$html = file_get_contents($lay['layout_path'],true);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>版型瀏覽</title>
</head>
<link href="style.css" rel="stylesheet"  type="text/css" />
<body>
	<div class="main">
    <center>
    <h1>版型瀏覽</h1>
    <input type="button" value="返回" onclick="location.href='layout-index.php'">
    	<h1>Source Code</h1>
        <div id="code" style="border:1px solid black; margin-bottom:20px;">
        
        </div>
 	</center>
        <div id="show">
        	<?=$html?>
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