<?php
	include('config.php');
	$letters = 4;
	while($letters--)
	{
		$r = rand(1,3);
		switch($r)
		{
			case 1:
				$str .= chr(rand(48,57));
			break;
			
			case 2:
				$str .= chr(rand(65,90));
			break;
			
			case 3:
				$str .= chr(rand(97,122));
			break;
		}
	}
		echo $str;
		$_SESSION['code'] = $str;
		
?>