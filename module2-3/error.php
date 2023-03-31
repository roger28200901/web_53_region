<?php
include('config.php');
if ($_SESSION['error'] < 3) {
	alert($_SESSION['message']);
	href('login.php');
} else {
	alert($_SESSION['message']);
	session_unset();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>錯誤頁面</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="main" style="text-align:center">
		<h1>連續錯誤3次</h1>
		<input type="button" value="返回" onclick="location.href='login.php'">
	</div>
</body>

</html>