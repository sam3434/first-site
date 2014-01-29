<?php 
header('Content-Type: text/plain; charset=windows-1251');
	if (isset($_POST['x'])) {
		$s=iconv("utf-8", "windows-1251", $_POST['x']);
		echo "sdfsd ".$s;
		//echo $_POST['x'];
	}
 ?>