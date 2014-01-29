<?php 
	session_start();
    require_once "database.php";
    db_connect();
    if (isset($_POST['login'])&&isset($_POST['password'])) {
        $login=$_POST['login'];
        $pass=$_POST['password'];
        if (correct_user($login,$pass)) {
            $_SESSION['login']=$login;
        }
        else {
            if (is_admin($login,$pass)) {
                $_SESSION['admin']=$login;       
            }
            else {
                echo "Нет такого пользователя и/или пароля";    
            }
            
        }

    }

 ?>