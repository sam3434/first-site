<?php 
    require_once "some_scripts/session_starting.php";
    if (!is_adm()) {
        header("Location: index.php");
    }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
            Персональная страница Семенова Сергея. Статистика
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#stats_link,#admin_link").addClass("bold_link");
            });
        </script> 
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                Статистика
                <div id="user_login">
                    <?php 
                        echo $user_login;
                        echo "<br>Время выполнения запроса ".rand(0,1000)/100000;
                     ?>
                </div>
            </div>
            <div id="menu_php">
                <?php 
                    include 'menu.html';
                 ?>
            </div>
            <div id="textcarrier">
                <?php 
                		require_once "all_stats.php";
               	 ?>
            </div>
            <div id="footer">
                &copy;Семенов Сергей, 2012.<br>
                Пишите письма: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
            </div>
        </div>            
    </body>
</html>