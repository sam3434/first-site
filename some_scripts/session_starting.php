<?php 
	session_start();
	$user_login=login();

	if (isset($_SESSION['login'])) {
		//$user_login="������������ ".$_SESSION['login'];
		$user_login=substr_replace($user_login, "������������ ", 0, 0);
	}
	elseif (isset($_SESSION['admin'])) {
		//$user_login="������������� ".$_SESSION['admin'];
		$user_login=substr_replace($user_login, "������������� ", 0, 0);
	}
	else {
		$user_login="";
	}

	function is_autho()
	{
		return ((isset($_SESSION['login']))||(isset($_SESSION['admin'])));
	}

	function is_adm()
	{
		return isset($_SESSION['admin']);
	}

	function login()
	{
		if (isset($_SESSION['login'])) {
			return $_SESSION['login'];
		}
		elseif (isset($_SESSION['admin'])) {
			return $_SESSION['admin'];
		}
		else {
			return "";
		}
	}
 ?>