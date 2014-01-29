<?php 
	include_once "some_scripts/write_message.php";
    require_once "some_scripts/session_starting.php";
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
			Персональная страница Семенова Сергея. Гостевая книга
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#book_link").addClass("bold_link");

                $("#book_form input,#book_form textarea").focus(function(event) {
                	$(this).css('background', '#f2efdf');
                });

                $("#book_form input,#book_form textarea").blur(function(event) {
                	$(this).css('background', '#fff');
                });

                $('#ajax_form').submit(function(event) {
                    $('#ajax_message').load("book_ajax.php", { fio: $('#fio').val(), email: $('#email').val(), subject: $('#subject').val(), message: $('#message').val() } );
                    return false;
                });
            });
        </script> 
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                Гостевая книга
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
                <div id="ajax_message">
            	<?php 
            		include_once "some_scripts/read_messages.php";
            	 ?>
                    </div>
                <form action="book.php" method="post" class="my_form" id="ajax_form">
            		<h2 id="send_message">Отправить сообщение</h2>
                	<table id="book_form">
                		<tr>
                			<td>ФИО</td>
                			<td><input type="text" name="fio" size="40" id="fio"></td>
                		</tr>
                		<tr>
                			<td>E-mail</td>
                			<td><input type="text" name="email" size="40" id="email"></td>
                		</tr>
                		<tr>
                			<td>Тема сообщения</td>
                			<td><input type="text" name="subject" size="40" id="subject"></td>
                		</tr>
                		<tr>
                			<td>Текст сообщения</td>
                			<td><textarea name="message" cols="80" rows="15" id="message" maxlength="1000"></textarea></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>
                				<input type="submit" value="Написать">
                				<a href="load_file.php" id="load">
                					<input type="button" value="Загрузить сообщения">
                				</a>
                			</td>
                		</tr>
	               	</table>
                </form>
            
        	</div>
                 
        <div id="footer">
                &copy;Семенов Сергей, 2012.<br>
                Пишите письма: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
        </div>   
        </div> 
    </body>
</html>