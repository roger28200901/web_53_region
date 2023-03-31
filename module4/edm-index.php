<?php
	include('config.php');	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>電子報管理</title>
<link href="../module2-3/style.css" rel="stylesheet"  type="text/css" />
</head>
<body>
	<div class="main" style="text-align:center">
    <h1>電子報管理</h1>
    	<input type="button" value="返回" onclick="location.href='index.php'">
        <input type="button" value="新增電子報" onclick="location.href='edm-add.php'">       
   
    <table>
    	<tr>
        	<th>電子報編號</th>
            <th>電子報名稱</th>
            <th>版型名稱</th>
            <th>標題</th>
            <th>操作</th>
        </tr>
    <?php
		$data = mysqli_query($mysqli,"select * from `edms`");
		while($edm = mysqli_fetch_array($data))
		{		
	?>
    	<tr>
        	<td><?=$edm['id']?></td>
            <td><?=$edm['edm_name']?></td>
            <td><?=$edm['layout_name']?></td>
            <td><?=$edm['title']?></td>
            <td>
                	<input type="button" value="瀏覽" onclick="location.href='edm-view.php?id=<?=$edm['id']?>'">
                    <input type="button" value="修改" onclick="location.href='edm-edit.php?id=<?=$edm['id']?>'">
                    <input type="button" value="刪除" onclick="location.href='edm-delete.php?id=<?=$edm['id']?>'">
            </td>
        </tr>
    <?php
		}
	?>
    </table>
     </div>
</body>
</html>