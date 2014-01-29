<?php 
    require_once "some_scripts/session_starting.php";
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
            Персональная страница Семенова Сергея. Обо мне
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#about_link").addClass("bold_link");
            });
        </script> 
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                Обо мне
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
            <div id="textcarrier">
                <div id="text">
                    <p>Позвольте представиться. Меня зовут Семенов Сергей (в интернете использую ник - sam). Я студент 4 курса кафедры "Информационных Систем" факультета "АВТ".</p>
                    <p>Родился я в городе Бахчисарай в 1992 году. В период с 3 до 7 лет посещал детский сад №1. После учился в школе-гимназии 1 моего города</p>
                    <p>После школы поступил в Севастопольский национально-технический университет, где получил новые знания в сфере компьютерных технологий.</p>
                </div>
            </div>
            <div id="footer">
                &copy;Семенов Сергей, 2012.<br>
                Пишите письма: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
            </div>
        </div>            
    </body>
</html>