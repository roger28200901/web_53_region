<?php
	include('config.php');
	$id = $_GET['id'];
	$data = mysqli_query($mysqli,"select * from `users` where `id` = $id");
	$user = mysqli_fetch_array($data);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改頁面</title>
</head>
<link href="style.css" rel="stylesheet" type="text/css" />

<body>
	<div class="main" style="text-align:center">
    		<input type="button" value="返回" onclick="history.back(-1)">
            <p>
        <b>修改會員</b>
                <form method="post" id="add-f" action="user-edit-action.php">
                	<input type="hidden" value="<?=$user['id']?>" name="id">
                    帳號<input type="text" name="username" value="<?=$user['username']?>">
                    <p>
                    密碼<input type="password" name="password" value="<?=$user['password']?>">
                    <p>
                    姓名<input type="text" name="name" value="<?=$user['name']?>">
                    <p>
                    權限
                    <p>
                    管理者<input type="radio" name="power" value="0" <?=$user['power'] ? '' : 'checked'?>>
                    
                    一般使用者<input type="radio" name="power" value="1" <?=$user['power'] ? 'checked' : ''?>>
                    <p>
                    <input type="submit" value="修改會員">
                    <input type="reset" value="清除">
                </form>
    </div>
</body>
</html>