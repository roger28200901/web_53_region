<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登入/出紀錄</title>
</head>
<link href="style.css" rel="stylesheet" type="text/css" />

<body>
	<div class="main" style="text-align:center">
    	<input type="button" value="返回" onclick="history.back(-1)">
        <p>
        <table>
        	<tr>
            	<th>帳號</th>
                <th>姓名</th>
                <th>狀態</th>
                <th>時間</th>
            </tr>
            <?php
				include('config.php');
				$data = mysqli_query($mysqli,"select * from `logs`");
				while($row = mysqli_fetch_array($data))
				{
			?>	
            	<tr>
                	<td><?=$row['username']?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['action']?></td>
                    <td><?=$row['time']?></td>
                </tr>
            <?php	
				}
			?>
        </table>
    </div>
</body>
</html>