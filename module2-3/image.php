<?php
header("Content-type:image/png");
$img = imagecreate(50, 50);
imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
imagettftext($img, 24, 0, 18, 30, $black, '../kaiu.ttf', $_GET['text']);
imagepng($img);
imagedestroy($img);
