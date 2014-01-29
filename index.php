<?php 
    require_once "some_scripts/session_starting.php";
    if (isset($_POST['hide']))  {
        unset($_SESSION['login']);
        unset($_SESSION['admin']);
        $user_login="";
        session_destroy();
    }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
			Персональная страница Семенова Сергея. Главная страница
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#index_link").addClass("bold_link");
                $("#book_form input,#book_form textarea").focus(function(event) {
                    $(this).css('background', '#f2efdf');
                });

                $("#book_form input,#book_form textarea").blur(function(event) {
                    $(this).css('background', '#fff');
                });

                $('#ajax_form').submit(function(event) {
                    $('#ajax_message3').load("index_ajax.php", { login: $('#login').val(), password: $('#password').val() } ,function(){
                        var text=$('#ajax_message3').html();
                        if (text=="") {
                            document.location.href="index.php";
                        };
                    });
                    return false;
                });
            });
        </script>   
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                Главная страница
                <div id="user_login">
                    <?php 
                        echo $user_login;
                     ?>
                </div>
            </div>
            <div id="menu_php">
                <?php 
                    include 'menu.html';
                 ?>
            </div>
            
            <div id="text">
                <!-- <h2>Лабораторная работа 1</h2>
                <table>
                    <tr>
                        <td>
                            <img src="my_foto.jpg" alt="Моя фотография" id="foto">
                        </td>
                        <td align="center" valign="top">
                            <span style="font-family:Courier;font-size:18px;">
                                Семенов Сергей Игоревич<br>
                                Группа И-41д                         
                            </span>
                        </td>
                    </tr>
                </table> -->
                <?php 
                echo "<div id='authoriz'>";
                    if (!is_autho()) {
                        $s=<<<__write
                        
                    <form action="index.php" method="post" class="my_form" id="ajax_form">
                    <h2 id="send_message">Зайти на сайт</h2>
                    <div id="ajax_message3" class="error_user"></div>
                    <table id="book_form" style="margin:0 auto">
                        <tr>
                            <td>Логин</td>
                            <td><input type="text" name="login" size="40" id="login"></td>
                        </tr>
                        <tr>
                            <td>Пароль</td>
                            <td><input type="password" name="password" size="40" id="password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Войти" style="float:left;">
                                <a href="register.php" id="load">
                                    <input type="button" value="Регистрация">
                                </a>
                                
                            </td>
                        </tr>
                    </table>
                </form>
            
             
__write;
                    echo "$s";
                    }
                    else {
                        if (isset($_SESSION['login'])) {
                            $user_name=" пользователь ".$_SESSION['login'];
                        }
                        else {
                            $user_name=" администратор ".$_SESSION['admin'];
                        }   
                        $s=<<<__writes
                        <form action="index.php" method="post" class="my_form">
                            <label for="">Привет, $user_name!</label>
                            <input type="hidden" name="hide">
                            <input type="submit" value="Выйти">
                        </form>
__writes;
                    echo "$s";
                    }
                    echo "</div>";
                 ?>
                <!-- <div id="authoriz">
                    <form action="index.php" method="post" class="my_form" id="ajax_form">
                    <h2 id="send_message">Зайти на сайт</h2>
                    <table id="book_form" style="margin:0 auto">
                        <tr>
                            <td>Логин</td>
                            <td><input type="text" name="login" size="40" id="login"></td>
                        </tr>
                        <tr>
                            <td>Пароль</td>
                            <td><input type="password" name="password" size="40" id="password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Войти" style="float:left;">
                                <a href="register.php" id="load">
                                    <input type="button" value="Регистрация">
                                </a>
                                
                            </td>
                        </tr>
                    </table>
                </form>
            
            </div>  -->   

                </div>
                
            </div>
            <div id="footer">
                &copy;Семенов Сергей, 2012.<br>
                Пишите письма: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
            </div>
    </body>
</html>
