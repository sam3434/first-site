<?php 
    require_once "some_scripts/session_starting.php";
	require_once "database.php";
    db_connect();
    if ((isset($_REQUEST['fio']))&&(isset($_REQUEST['email']))&&(isset($_REQUEST['login']))&& (isset($_REQUEST['password']))) {
        $fio=$_REQUEST['fio'];
        $fio=iconv("utf-8","windows-1251",$fio);
        $email=$_REQUEST['email'];
        $login=clear_string($_REQUEST['login']);
        $password=$_REQUEST['password'];
        if (($fio=="")||($email=="")||($login=="")||($password=="")) {
            echo "Все поля должны быть заполнены";            
        }
        else {
            db_create_users();
            $success=false;
            if (!unique_login($login)) {
                //$success=false;
                echo "Ваш логин уже есть в базе";
            }
            else {
                db_insert_user($fio,$email,$login,$password);
                $_SESSION['login']=$login;
                $success=true;
            }    
        }
        
    }
 ?>