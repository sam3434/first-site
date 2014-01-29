<?php 
	require_once "some_scripts/session_starting.php";
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
			Персональная страница Семенова Сергея. Контакты
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
		<script src="foo.js"></script>
		<script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#contacts_link").addClass("bold_link");
            });
        </script> 
	</head>
    <body  onload="">
        <div id="carrier">
            <div id="header">
                Контакты
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
            <div id="text" style="margin-left:240px;">
				<fieldset>
					<legend>Контактные данные</legend>
					<form method="post" action="mailto:sam3434@mail.ru" onsubmit="cont(this);return false;" name="myform" onclick="winform.show();">
						<table class="tab">
							<tr>
								<td>
									ФИО
								</td>
								<td>
									<input type="text" size="25" maxlength="50" name="fio">
								</td>
							</tr>
							<tr>
								<td>
									Пол
								</td>
								<td>
									Мужской<input type="radio" name="pol" value="male" checked="checked">
									Женский<input type="radio" name="pol" value="female">
								</td>
							</tr>
							<tr>
								<td>
									Возраст
								</td>
								<td>
									<select name="age">
										<option value="0">Меньше 15</option>
										<option value="1">От 15 до 20</option>
										<option value="2">От 20 до 30</option>
										<option value="3">Больше 30</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									Электронная почта
								</td>
								<td>
									<input type="text" size="25" maxlength="50" name="mail">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									Сообщение<br>
									<textarea name="msg" rows="10" cols="50"></textarea>
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" value="Отправить данные">
								</td>
								<td>
									<input type="reset" value="Очистить форму">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="button" value="Показать данные по форме" onclick="over(document.myform);">
								</td>
							</tr>
						</table>
					</form>
				</fieldset>
                
            </div>
            <div id="footer">
                &copy;Семенов Сергей, 2012.<br>
                Пишите письма: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
            </div>
        </div>   
		<div id="div3" onmousedown="down(this.parentNode,event);"></div>		
    </body>
</html>