<?php 
function fit($var)
{
	if ($var%2==0) 
	{
		return true;
	}
	else
	{
		return false;
	}
}

function ech($s)
{
	echo "Hello $s";
}

// $a=range(1,20);
// $a=array_merge($a,range(10,15));
// print_r($a);
// $a=array_filter($a,"fit");
// print_r($a);
// print_r($a);
// print_r(array_count_values($a));
// $b=array();
// $b=array_pad($b, 10, 0);
// echo "<br>";
// print_r($b);
// echo "<br>";
// $c=range(1,100);
// print_r($c);
// echo "<br>";
// print_r(array_slice($c, 10,10));
$s="first second third";
echo strrev($s)."<br>";
echo join(" ", array_map("strrev",explode(" ", $s)));
echo __FILE__;
 ?>