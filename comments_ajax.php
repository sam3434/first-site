<?php 
	include "database.php";
	require_once "some_scripts/session_starting.php";
	if (is_autho()) 
	{
		db_connect();
		db_create_comments();
		$msg=iconv("utf-8","windows-1251",clear_string($_POST['comm']));
		$id_blog=$_POST['post_id'];
		db_insert_comments(login(), $msg, $id_blog);	

		/*
		 Show comments with Ajax
		*/
		$comms_res=db_show_comments($id_blog);
        $comms_count=mysql_num_rows($comms_res);
        for ($j=0; $j < $comms_count; $j++) { 
        		$comm=mysql_fetch_row($comms_res);
        		list(,$comm_login,$comm_date,$comm_mark,$comm_msg,)=$comm;
                $strtime=strtotime($comm_date);
                $date=date("n",$strtime);
                $m=$monthes[$date-1];
                $d=date("j",$strtime);
                $y=date("Y",$strtime);
                echo "<div class='comment'>";
        		echo "<img src='modal/noavatar.gif' alt='' width='64px' height='64px'>";
        		echo "<span>";
        		echo "<span class='nick'>$comm_login </span>";
        		echo "<span class='comment_text'> оставил комментарий </span>";
        		echo "<span class='comment_date'>&nbsp;&nbsp;&nbsp; $d $m, $y в ".date("H:i:s",$strtime)."</span><br>";
        		echo "<span class='comment_text'>";
        		echo "$comm_msg";
        		echo "</span></span></div>";
        }
	}
	else
	{
		die("Ты не авторизован");
	}
	
 ?>