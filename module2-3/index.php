<?php
include('config.php');
// 每頁顯示的商品數量
$items_per_page = 4;

// 獲取商品總數量
$query = "SELECT COUNT(*) FROM `edms`";
$results = mysqli_query($mysqli, $query);
$total_items = mysqli_fetch_array($results)[0];

// 計算總頁數
$total_pages = ceil($total_items / $items_per_page);

// 獲取當前頁數，預設為第1頁
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// 確保當前頁數在合法範圍內
if ($current_page < 1) {
	$current_page = 1;
} elseif ($current_page > $total_pages) {
	$current_page = $total_pages;
}

// 計算當前頁的商品起始索引和結束索引
$start_index = ($current_page - 1) * $items_per_page;
$end_index = $start_index + $items_per_page;

// 獲取當前頁的商品列表
$query = "SELECT * FROM `edms` LIMIT $start_index, $items_per_page";
$results = mysqli_query($mysqli, $query);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>咖啡商品展示系統-上架商品</title>
</head>
<link href="style.css" rel="stylesheet" type="text/css" />
<script>
	function warning() {
		if (confirm("確認是否進入電子報精靈?")) {
			alert('進入教學');
			alert('依照步驟操作!')
			location.href = 'edm-teach.php';
		}
	}
</script>
<style>
	.pagination {
		margin-top: 20px;
		display: flex;
		justify-content: center;
		align-items: center;
		font-size: 16px;
	}

	.pagination ul {
		list-style: none;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.pagination li {
		margin: 0 10px;
		display: inline-block;
	}

	.pagination li a {
		display: block;
		padding: 5px 10px;
		background-color: #F4F4F4;
		color: #666;
		border-radius: 5px;
	}

	.pagination li a:hover,
	.pagination li.active a {
		background-color: #FFB800;
		color: #FFF;
		cursor: pointer;
	}
</style>

<body>

	<div class="main" style="text-align:center">
		<h1>咖啡商品展示系統-上架商品</h1>

		<input type="button" value="返回" onclick="location.href='../index.php'">
		<input type="button" value="咖啡商品上架-製作精靈" onclick="warning()">
		<input type="button" value="上架商品" onclick="location.href='edm-index.php'">
		<input type="button" value="版型管理" onclick="location.href='layout-index.php'">
		<?php
		if ($_SESSION['login']) {
			if ($_SESSION['power'] == 0) {
		?>
				<input type="button" value="會員管理" onclick="location.href='back.php'">
		<?php
			}
		}
		?>
		<hr>
		<div class="pagination">
			<ul>
				<?php if ($current_page != 1) : ?>
					<li><a href="?page=<?php echo $prev_page; ?>">&laquo;</a></li>
				<?php endif; ?>

				<?php for ($i = 1; $i <= $total_pages; $i++) : ?>
					<?php if ($i == $current_page) : ?>
						<li class="active"><a href="#"><?php echo $i; ?></a></li>
					<?php else : ?>
						<li><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php endif; ?>
				<?php endfor; ?>

				<?php if ($current_page != $total_pages) : ?>
					<li><a href="?page=<?php echo $next_page; ?>">&raquo;</a></li>
				<?php endif; ?>
			</ul>
		</div>


		<div class="edm-container" style="display: flex; width:100%; flex-wrap:wrap;">
			<?php
			while ($edm = mysqli_fetch_array($results)) {
				$r = mysqli_query($mysqli, "select * from `layouts` where `layout_name` = '$edm[layout_name]'");
				$lay = mysqli_fetch_array($r);
				$html = file_get_contents($lay['layout_path'], true);
				$html = str_replace(['Time', 'Name', 'Cost', 'Content', 'images/', '###', 'Link'], [$edm['time'], $edm['edm_name'], $edm['title'], $edm['content'], $edm['image'], $edm['link'], $edm['link']], $html);
			?>
				<div id="<?= $edm['id'] ?>">
					<?= $html ?>
				</div>
			<?php
			}
			?>
		</div>
	</div>


</body>

</html>