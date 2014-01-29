<?php 
    require_once "some_scripts/session_starting.php";
    if (!is_adm()) {
        header("Location: index.php");
    }
	if (isset($_FILES['filename']['name'])) {
		copy($_FILES['filename']['tmp_name'], "messages//messages.inc");
		header ('Location: book.php');  // перенаправление на нужную страницу
   		exit();    // прерываем работу скрипта, чтобы забыл о прошлом
    }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
			Персональная страница Семенова Сергея. Загрузка гостевой книги
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#load_file_link,#admin_link").addClass("bold_link");
            });
            
        </script>
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                Загрузка гостевой книги
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
            	
               	<form action="load_file.php" method="post" class="my_form" enctype="multipart/form-data">
            		<input type="file" name="filename" id=""> <br><br>
            		<input type="submit" value="Загрузить сообщения">
                </form>
            
        	</div>    
        <div id="footer">
                &copy;Семенов Сергей, 2012.<br>
                Пишите письма: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
        </div>        
    </body>
</html>