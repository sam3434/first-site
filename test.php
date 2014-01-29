<?php 
	require_once "some_scripts/session_starting.php";
	require_once "database.php";
	if ($_SERVER['REQUEST_METHOD']=="POST") {
		$krammer=$_POST['ans21'];
		$fio=$_POST['fio'];
		$math=$_POST['ans31'];
		$check=$_POST['ans11'];
		$group=$_POST['group'];
		$msg="";
		
		if ($krammer=="") {
			$msg.="Поле второго вопроса не заполнено<br />";
		}
		if ($fio=="") {
			$msg.="ФИО не заполнено<br />";
		}
		if (count($check)<3) {
			$msg.="Менее трех ответов в первом вопросе<br />";
		}
		if (!preg_match("/^([а-яА-Я]+)( )([а-яА-Я]+)( )([а-яА-Я]+)$/",$fio)) {
			$msg.="Ошибка в написании ФИО<br />";
		}
		if ($msg!="")
			$msg="Ошибка!<br />".$msg;
		else {

			$ans1="";
			foreach ($check as $value) {
				$ans1.=$value;
			}
			$db=db_connect();
			$date=date('d.m.Y');
			db_create_t();
			db_insert($fio,$group,$ans1,$krammer,$math,$date);
			mysql_close($db);
			header ('Location: results.php');  // перенаправление на нужную страницу
   			exit();    // прерываем работу скрипта, чтобы забыл о прошлом
		}
	}

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
            Персональная страница Семенова Сергея. Тест по численным методам
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
		<script src="foo.js"></script>
    </head>
    <body  onload="win=new PopupWindow(200,100,'as','awewrwerew');">
        <div id="carrier">
            <div id="header">
                Тест
                <div id="user_login">
                    <?php 
                        echo $user_login;
                     ?>
                </div>
            </div>
            <div id="text"  style="margin-left:240px;">
				<!-- <form method="post" action="mailto:sam3434@mail.ru" onsubmit="learn(this);return false;" name="myform"> -->
				<?php 
					if ($msg!="") {
						echo "<div id='error'>$msg</div>";
					}
				 ?>
				
				<form method="post" action="test.php" name="myform">
					<fieldset>
						<legend>Тест по дисциплине</legend>
						<table class="tab">
							<tr>
								<td>
									Какие существуют методы решения СЛАУ?
								</td>
								<td>
									<input type="checkbox" name="ans11[]" value="1">Матричный метод<br>
									<input type="checkbox" name="ans11[]" value="2">Кубический метод<br>
									<input type="checkbox" name="ans11[]" value="3">Метод Гаусса<br>
									<input type="checkbox" name="ans11[]" value="4">Метод Лейбница<br>
								</td>
							</tr>
							<tr>
								<td>
									Кто придумал метод Крамера?
								</td>
								<td>
									<input type="text" name="ans21" size="25">
								</td>
							</tr>	
							<tr>
								<td>
									Выберите пункт, который не является основным направлением в вычислительной математике
								</td>
								<td>
									<select name="ans31">
										<optgroup label="Математическое программирование">
											<option value="11">
												Интерполяция
											</option>
											<option value="12">
												Инфраполяция
											</option>
											<option value="13">
												Аппроксимация
											</option>
										</optgroup>
										<optgroup label="Теория игр">
											<option value="21">
												Минимаксные игры
											</option>
										</optgroup>
										<optgroup label="Алгебра">
											<option value="31">
												Обращение матриц
											</option>
											<option value="32">
												СЛАУ
											</option>
											<option value="33">
												Поиск векторов матриц
											</option>
										</optgroup>
									</select>
								</td>
							</tr>
							
						</table>
					</fieldset>
					<fieldset>
						<legend>Контактные данные</legend>
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
										Выберите свою группу
									</td>
									<td>
										<select name="group">
											<optgroup label="Первый курс">
												<option value="11">
													И-11
												</option>
												<option value="12">
													И-12
												</option>
												<option value="13">
													И-13
												</option>											
											</optgroup>
											<optgroup label="Второй курс">
												<option value="21">
													И-21
												</option>
												<option value="22">
													И-22
												</option>
												<option value="23">
													И-23
												</option>											
											</optgroup>
											<optgroup label="Третий курс">
												<option value="31" selected="selected">
													И-31
												</option>
												<option value="32">
													И-32
												</option>
												<option value="33">
													И-33
												</option>											
											</optgroup>
										</select>
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
					</fieldset>
				</form>
			</div>
            
            <div id="footer">
                &copy;Семенов Сергей, 2012.<br>
                Пишите письма: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
            </div>
        </div>   
		<div id="div3" onmousedown="down(this.parentNode,event);"></div>		
    </body>
</html>