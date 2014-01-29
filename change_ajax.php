<?php 
	include_once "database.php";
	include_once "some_scripts/session_starting.php";
	if (is_autho()) 
	{
		if (isset($_POST['post_id'])) {
			$id=$_POST['post_id'];
			db_connect();
			db_create_comments();
			$query="select * from blog where id='$id'";	
			$res=mysql_query($query);
			$row=mysql_fetch_row($res);
			$a=array('subject'=>iconv("windows-1251","utf-8",$row[1]),'message'=>iconv("windows-1251","utf-8",$row[2]));
			$s=json_encode($a);
			echo "$s";
		}
	}
?>