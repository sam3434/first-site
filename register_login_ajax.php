<?php 
// header('Content-Type: text/html; charset=windows-1251');
	require_once "database.php";
    db_connect();
    if (isset($_POST['login'])) {
    	$login=clear_string($_POST['login']);
    	if (!unique_login($login)) {
                //$success=false;
                echo "Ваш логин уже есть в базе";
            }
    }
 ?>