<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>電子報製作</title>
</head>
<link href="style.css" rel="stylesheet" type="text/css" />
<script>
	function warning()
	{
		if(confirm("確認是否進入電子報精靈?"))
		{
			alert('進入教學');
			alert('依照步驟操作!')
			location.href='edm-teach.php';
		}
	}
</script>
<body>
	<div class="main" style="text-align:center">
    	<h1>電子報製作</h1>
        <input type="button" value="返回" onclick="location.href='../index.php'">
        <input type="button" value="電子報製作精靈" onclick="warning()">
        <input type="button" value="電子報管理" onclick="location.href='edm-index.php'">
        <input type="button" value="版型管理" onclick="location.href='layout-index.php'">
    </div>
</body>
</html>