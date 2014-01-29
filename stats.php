<?php 
	require_once "some_scripts/session_starting.php";
    require_once "database.php";
	require_once "admin/admin_pages.php";
	$db=db_connect();
	db_create_stats();
	$page=basename($_SERVER['PHP_SELF'], ".php");
	if (array_search($page, $admin_pages)===false) {
		$ip=$_SERVER['REMOTE_ADDR'];
		$host=$_SERVER['SERVER_NAME'];
		$browser = 'none';
		if ( stristr($_SERVER['HTTP_USER_AGENT'], 'Firefox') ) $browser='Firefox';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'Chrome') ) $browser='Chrome';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'Safari') ) $browser='Safari';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'Opera') ) $browser='Opera';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.0') ) $browser='Internet Explorer 6';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0') ) $browser='Internet Explorer 7';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0') ) $browser='Internet Explorer 8';
		if (!isset($_SESSION['login'])) {
			if (!isset($_SESSION['admin'])) {
				$muser="guest";	
			}
			else {
				$muser=$_SESSION['admin'];		
			}
			
		}
		else {
			$muser=$_SESSION['login'];		
		}
		db_insert_stats($page,$ip,$host,$browser,$muser);
	}
	// mysql_close($db);
 ?>