<?php
error_reporting(4);
$mysqli = new mysqli('localhost', 'admin', '1234', '07');
mysqli_query($mysqli, "set names utf8");
session_start();
date_default_timezone_set('Asia/Taipei');
function alert($msg)
{
	echo "<script>alert('$msg')</script>";
}
function href($msg)
{
	echo "<script>location.href='$msg'</script>";
}
