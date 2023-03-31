<?php
	include('config.php');	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>版型管理</title>
<link href="../module2-3/style.css" rel="stylesheet"  type="text/css" />
</head>
<body>
	<div class="main" style="text-align:center">
    <h1>版型管理</h1>
    	<input type="button" value="返回" onclick="location.href='index.php'">
        <input type="button" value="新增版型" onclick="location.href='layout-add.php'">       
   
    <table>
    	<tr>
        	<th>版型編號</th>
            <th>版型名稱</th>
            <th>版型路徑</th>
            <th>操作</th>
        </tr>
    <?php
		$data = mysqli_query($mysqli,"select * from `layouts`");
		while($lay = mysqli_fetch_array($data))
		{		
	?>
    	<tr>
        	<td><?=$lay['id']?></td>
            <td><?=$lay['layout_name']?></td>
            <td><?=$lay['layout_path']?></td>
            <td>
            	<?php
					if($lay['id'] <=3 )
					{
						echo "預設版型不可編輯";
				?>
                	<input type="button" value="瀏覽" onclick="location.href='layout-view.php?id=<?=$lay['id']?>'">
                <?php
					} else {
				?>
                	<input type="button" value="瀏覽" onclick="location.href='layout-view.php?id=<?=$lay['id']?>'">
                    <input type="button" value="修改" onclick="location.href='layout-edit.php?id=<?=$lay['id']?>'">
                    <input type="button" value="刪除" onclick="location.href='layout-delete.php?id=<?=$lay['id']?>'">
                <?php
					}
				?>
            </td>
        </tr>
    <?php
		}
	?>
    </table>
     </div>
</body>
</html>