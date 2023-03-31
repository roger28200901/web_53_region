<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>登入前台</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<div class="main" style="justify-content:space-between">
		<img src="../logo.jpeg" style="text-align:center;" alt="">
		<div id="right" style="width:100%; text-align:center;">
			<h2>咖啡商品展示系統</h2>
			<form action="check.php" method="post">
				　帳　　號:<input type="text" name="username">
				<p>
					　密　　碼:<input type="password" name="password">
				<p>
					圖形驗證碼:<input type="text" name="code">
					<input type="hidden" name="rule">
				<p>
				<div>
					<img id="code0">
					<img id="code1">
					<img id="code2">
					<img id="code3">
				</div>
				<div id="r">
				</div>
				<p>
					<input type="button" value="重新產生" id="recode">
					<input id="submit-btn" type="submit" value="登入">
					<input type="reset" value="清除">
				<p>
				<h2>
					驗證規則:
					<b id="rule2-text">Test</b>
				</h2>
				<div class="nine-block-container">
					<input type="hidden" name="code2">
					<input type="hidden" name="rule2">
					<div class="nine-block" data-number="1">

					</div>
					<div class="nine-block" data-number="2">

					</div>
					<div class="nine-block" data-number="3">

					</div>
					<div class="nine-block" data-number="4">

					</div>
					<div class="nine-block" data-number="5">

					</div>
					<div class="nine-block" data-number="6">

					</div>
					<div class="nine-block" data-number="7">

					</div>
					<div class="nine-block" data-number="8">

					</div>
					<div class="nine-block" data-number="9">

					</div>
				</div>

		</div>

	</div>
	</p>
	</form>
	</div>
	</div>
	<script src="jquery-3.2.1.js">
	</script>
	<script>
		$('#submit-btn').on('click', function() {
			let code2 = []
			$('.check').each(function() {
				code2.push($(this).attr('data-number'))
			})
			$('[name=code2]').val(code2.join(','));
			$('[name=rule2]').val(rule2);
		});
		$('#recode').on('click', function() {
			$.ajax({
				url: 'recode.php',
				success: function(data) {
					for (var i = 0; i < 4; i++) {
						$('#code' + i).attr({
							'data-id': data.charAt(i),
							'src': 'image.php?text=' + data.charAt(i)
						});
					}
					var rule = Math.round(Math.random());
					if (rule == 0) {
						$('#r').text('ASCII 由小到大');
					} else {
						$('#r').text('ASCII 由大到小');
					}
					$('[name=rule]').val(rule);
				}
			})
			recode2();
		}).click();
		var val;
		var rule2;

		function recode2() {
			rule2 = Math.round(Math.random() * 4);
			if (rule2 == 0) {
				$('#rule2-text').text('水平線')
			} else if (rule2 == 1) {
				$('#rule2-text').text('垂直線')
			} else if (rule2 == 2) {
				$('#rule2-text').text('左上右下斜線')
			} else {
				$('#rule2-text').text('右上左下斜線')
			}
		}
		recode2();

		$('img').on('dragstart', function() {
			val = $(this).attr('data-id');
		})
		$('[name=code]').on('drop', function(e) {
			e.preventDefault();
			$(this).val($(this).val() + val);
			val = "";
		})
		$('.nine-block').on('click', function(el) {
			if ($(this).hasClass('check')) {
				$(this).removeClass('check')
			} else {
				$(this).addClass('check')
			}
		})
	</script>
</body>

</html>