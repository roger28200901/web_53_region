<?php
	include('config.php');
	$id = $_GET['id'];
	$results = mysqli_query($mysqli,"select * from `layouts` where `id` = $id");
	$set = mysqli_fetch_array($results);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>版型修改</title>
</head>
<link href="style.css" type="text/css" rel="stylesheet" />
<body>
	<div class="main" style="text-align:center">
    	<h3>修改版型</h3>
        <input type="button" value="返回" onclick="location.href='layout-index.php'">
    	<form method="post" action="layout-edit-action.php">
        		<input type="hidden" value="<?=$set['id']?>" name="id">
        		版型名稱<input type="text" name="layout_name" value="<?=$set['layout_name']?>">
                <p>
                預設版型
                <select id="default">
                	<?php
						$data = mysqli_query($mysqli,"select * from `layouts`");
						while($row = mysqli_fetch_array($data))
						{
					?>
                    	<option value="<?=$row['layout_path']?>" <?=$set['layout_path'] == $row['layout_path'] ? 'selected' : ''?>><?=$row['layout_name']?></option>
                    <?php		
						}
					?>
                </select>
                <p>
        	背景顏色<input type="color" id="bc">
            字體顏色<input type="color" id="c">
            <input type="hidden" name="html">
            <input type="submit" value="修改版型">
        </form>
        <div id="show" style="position:relative; left:70px;">
        </div>
    </div>
    <script src="jquery-3.2.1.js">
	</script>
    <script src="jquery-ui.js">
	</script>
    <script>
	var $obj = null;
		$('#default').on('change',function(){
			$.ajax({
				url:$(this).val(),
				success: function(data)
				{
					var html = data;
					$('#show').html(html);
					$('#article *').draggable({
						containment:'#article'	
					})	
					$obj = $('#article');
					$obj.css('border','1px solid red');
				}	
			})	
		}).change();
		$('form').submit(function(){
			if( $('[name=layout_name]').val() == "")
			{
				alert('請輸入版型名稱');
				return false;	
			}	
			$('show *').css('border','');
			$obj.css('border','');
			var html = $('#show').html();
			$('[name=html]').val(html);
		})
		
		$(document).on('click','#show *',function(e){
				e.stopPropagation();
				
				$obj = $(this);
				console.log($obj)
				$('#show *').css('border','')
				$obj.css('border','1px solid red');
		})
		
		$('#bc').on('change',function(){
			$obj.css('background-color',$(this).val());	
		})
		
		$('#c').on('change',function(){
			$obj.css('color',$(this).val());	
		})
	</script>
</body>
</html>