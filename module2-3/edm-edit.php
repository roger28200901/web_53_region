<?php
include('config.php');
$id = $_GET['id'];
$results = mysqli_query($mysqli, "select * from `edms` where `id` = $id");
$edm = mysqli_fetch_array($results);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>咖啡商品修改</title>
</head>
<script src="jquery-3.2.1.js">
</script>
<link href="style.css" rel="stylesheet" type="text/css" />

<body>
	<div class="main" style="text-align:center">
		<h1>電子報修改</h1>
		<input type="button" value="返回" onclick="location.href='index.php'">
		<p>
		<div id="step1" hidden>
			步驟一、選擇預設版型
			<p>
			<form method="post" action="edm-edit-action.php" enctype="multipart/form-data">
				<input type="hidden" value="<?= $edm['id'] ?>" name="id">
				<select name="layout_name">
					<?php
					$data = mysqli_query($mysqli, "select * from `layouts`");
					while ($row = mysqli_fetch_array($data)) {
					?>
						<option value="<?= $row['layout_name'] ?>" <?= $edm['layout_name'] == $row['layout_name'] ? 'selected' : '' ?>><?= $row['layout_name'] ?></option>
					<?php
					}
					?>
				</select>
		</div>
		<div id="step2" hidden>
			步驟二、填寫資訊
			<p>
				商品名稱<input placeholder="必填" type="text" name="edm_name" value="<?= $edm['edm_name'] ?>">
			<p>
				價錢<input placeholder="必填" type="text" name="title" value="<?= $edm['title'] ?>">
			<p>
				內容
				<textarea name="content" placeholder="必填"><?= $edm['content'] ?></textarea>
			<p>
				圖片
				<input type="file" name="image" accept=".jpg,.jpeg,.png,.gif">
			<p>
				相關連結
				<input type="text" name="link" value="<?= $edm['link'] ?>">
			<p>
				<input type="submit" value="修改商品">

				</form>
		</div>
		<a id="last" hidden>上一步</a>
		<a id="next">下一步</a>
	</div>
	<script>
		var show = 0;
		$('#next').on('click', function() {
			show++;
			if (show >= 2) {
				show = 2;
				$('#next').hide();
			}
			$('[id^=step]').hide();
			$('#step' + show).toggle(500);
			if (show >= 1) {
				$('#last').show();
			} else {
				$('#last').hide();
			}
		})
		$('#last').on('click', function() {
			$('#step' + show).toggle(500);
			show--;
			if (show <= 0) {
				$('#last').hide();
			}
			$('#step' + show).toggle(500);

			if (show <= 2) {
				$('#next').show();
			} else {
				$('#next').hide();
			}
		})
		$('form').submit(function() {
			if (
				$('[name=edm_name]').val() == "" ||
				$('[name=title]').val() == "" ||
				$('[name=content]').val() == ""
			) {
				alert('尚有欄位未填寫');
				return false;
			}
		})
	</script>
</body>

</html>