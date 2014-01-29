<?php 

if (isset ($_POST['text']))
{
	
	$mystr=$_POST['text'];
	$exnum=0;
	for ($b=strlen($_POST['text']); $b>=0; $b--)
	if ($mystr[$b]=='1')
	$exnum+=pow(2,$b);
	echo $exnum;

}	
//echo "string";
 ?>