<?php 
    require_once "some_scripts/session_starting.php";
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
			Персональная страница Семенова Сергея. Регистрация
        </title>
        <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> -->
        <link type="text/css" rel="Stylesheet" href="style.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script src="admin/xmlhttp.js">

        </script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#book_form input").focus(function(event) {
                	$(this).css('background', '#f2efdf');
                });

                $("#book_form input").blur(function(event) {
                	$(this).css('background', '#fff');
                });

                $("#login").blur(function(event) {
                    var xhttp=new_xmlhttp();
                                        
                    xhttp.onreadystatechange=function(){
                      if (xhttp.readyState==4 && xhttp.status==200)
                         document.getElementById('ajax_message2').innerHTML=xhttp.responseText;
                      }
                   xhttp.open('POST','register_login_ajax.php',true);
                //Установим тип передаваемого содержимого как у форм
                   xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                   var str='login='+$(this).val();
                   xhttp.send(str);
    

                });

                $('#ajax_form').submit(function(event) {
                    $('#ajax_message2').load("register_ajax.php", { fio: $('#fio').val(), email: $('#email').val(), login: $('#login').val(), password: $('#password').val() },function(){
                        var text=$('#ajax_message2').html();
                        if ((text!="Ваш логин уже есть в базе")&&(text!="Все поля должны быть заполнены")) {
                            document.location.href="index.php";
                        };
                        
                    } );
                    return false;

                });


            });
        </script> 
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                Регистрация                
            </div>
            <div id="menu_php">
                <?php 
                    include 'menu.html';
                 ?>
            </div>
            
            <div id="textcarrier">
                <form action="register.php" method="post" class="my_form" id="ajax_form">
            		<h2 id="send_message" style="text-align:center;">Форма регистрации</h2>
                    <div id="ajax_message2" style="float:none;text-align:center;height:20px;">                                
                                </div>
                	<table id="book_form" style="margin:0 auto;">
                		<tr>
                			<td>ФИО</td>
                			<td><input type="text" name="fio" size="40" id="fio"></td>
                		</tr>
                		<tr>
                			<td>E-mail</td>
                			<td><input type="text" name="email" size="40" id="email"></td>
                		</tr>
                		<tr>
                			<td>Логин</td>
                            <td><input type="text" name="login" size="40" id="login">
                            <!-- <div id="ajax_message2">
                                
                            </div> -->

                            </td>
                		</tr>
                		<tr>
                			<td>Пароль</td>
                            <td><input type="password" name="password" size="40" id="password"></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>
                				<input type="submit" value="Зарегистрироваться">
                				
                			</td>
                		</tr>
	               	</table>
                </form>
            
        	</div>    
        <div id="footer">
                &copy;Семенов Сергей, 2012.<br>
                Пишите письма: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
        </div>        
    </body>
</html>
