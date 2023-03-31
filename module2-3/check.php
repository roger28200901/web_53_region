<?php
include('config.php');
$arr = array();
for ($i = 0; $i < 4; $i++) {

	$str = substr($_SESSION['code'], $i, 1);

	array_push($arr, $str);
}

if ($_POST['rule'] == 0) {
	sort($arr);
} else {
	rsort($arr);
}
$check = $arr[0] . $arr[1] . $arr[2] . $arr[3];


if ($_POST['code'] != $check) {
	$_SESSION['error']++;
	$_SESSION['message'] = "圖形驗證碼錯誤" . $check;
	header("location:error.php");
	exit();
}

$check2 = explode(',', $_POST['code2']);
$answer_check2 = 0;
if ($_POST['rule2'] == 0) {
	// 水平線 
	$line1 = array(1, 2, 3);
	$line2 = array(4, 5, 6);
	$line3 = array(7, 8, 9);
	$diff1 = array_diff($line1, $check2);
	$diff2 = array_diff($line2, $check2);
	$diff3 = array_diff($line3, $check2);

	$answer_check2 = (int)empty($diff2) || (int)empty($diff1) || (int)empty($diff3);
} else if ($_POST['rule2'] == 1) {
	// 垂直線 
	$line1 = array(1, 4, 7);
	$line2 = array(2, 5, 8);
	$line3 = array(3, 6, 9);
	$diff1 = array_diff($line1, $check2);
	$diff2 = array_diff($line2, $check2);
	$diff3 = array_diff($line3, $check2);

	$answer_check2 = (int)empty($diff2) || (int)empty($diff1) || (int)empty($diff3);
} else if ($_POST['rule2'] == 2) {
	// 左上斜右下
	$line1 = array(1, 5, 9);
	$diff1 = array_diff($line1, $check2);
	$answer_check2 = (int)empty($diff1);
} else {
	// 右上斜左下
	$line1 = array(3, 5, 7);

	$diff1 = array_diff($line1, $check2);
	$answer_check2 = (int)empty($diff1);
}

if ($answer_check2 != 1 || count($check2) > 3) {
	$_SESSION['error']++;
	$_SESSION['message'] = "第二層驗證錯誤";
	header("location:error.php");
	exit();
}


echo $answer_check2;
$data = mysqli_query($mysqli, "select * from `users` where `username` = '$_POST[username]'");
if (!$user = mysqli_fetch_array($data)) {
	$_SESSION['error']++;
	$_SESSION['message'] = "帳號錯誤";
	header("location:error.php");
	exit();
}
if ($_POST['password'] != $user['password']) {
	$_SESSION['error']++;
	$_SESSION['message'] = "密碼錯誤";
	header("location:error.php");
	exit();
}
session_unset();
$_SESSION['login'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['power'] = $user['power'];
mysqli_query($mysqli, "INSERT INTO `logs` (`username`, `name`, `action`, `time`) VALUES ('$user[username]', '$user[name]', '登入', CURRENT_TIMESTAMP);"); // login
alert('登入成功');
href('index.php');
