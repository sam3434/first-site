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
			$msg.="���� ������� ������� �� ���������<br />";
		}
		if ($fio=="") {
			$msg.="��� �� ���������<br />";
		}
		if (count($check)<3) {
			$msg.="����� ���� ������� � ������ �������<br />";
		}
		if (!preg_match("/^([�-��-�]+)( )([�-��-�]+)( )([�-��-�]+)$/",$fio)) {
			$msg.="������ � ��������� ���<br />";
		}
		if ($msg!="")
			$msg="������!<br />".$msg;
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
			header ('Location: results.php');  // ��������������� �� ������ ��������
   			exit();    // ��������� ������ �������, ����� ����� � �������
		}
	}

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
            ������������ �������� �������� ������. ���� �� ��������� �������
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
		<script src="foo.js"></script>
    </head>
    <body  onload="win=new PopupWindow(200,100,'as','awewrwerew');">
        <div id="carrier">
            <div id="header">
                ����
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
						<legend>���� �� ����������</legend>
						<table class="tab">
							<tr>
								<td>
									����� ���������� ������ ������� ����?
								</td>
								<td>
									<input type="checkbox" name="ans11[]" value="1">��������� �����<br>
									<input type="checkbox" name="ans11[]" value="2">���������� �����<br>
									<input type="checkbox" name="ans11[]" value="3">����� ������<br>
									<input type="checkbox" name="ans11[]" value="4">����� ��������<br>
								</td>
							</tr>
							<tr>
								<td>
									��� �������� ����� �������?
								</td>
								<td>
									<input type="text" name="ans21" size="25">
								</td>
							</tr>	
							<tr>
								<td>
									�������� �����, ������� �� �������� �������� ������������ � �������������� ����������
								</td>
								<td>
									<select name="ans31">
										<optgroup label="�������������� ����������������">
											<option value="11">
												������������
											</option>
											<option value="12">
												������������
											</option>
											<option value="13">
												�������������
											</option>
										</optgroup>
										<optgroup label="������ ���">
											<option value="21">
												����������� ����
											</option>
										</optgroup>
										<optgroup label="�������">
											<option value="31">
												��������� ������
											</option>
											<option value="32">
												����
											</option>
											<option value="33">
												����� �������� ������
											</option>
										</optgroup>
									</select>
								</td>
							</tr>
							
						</table>
					</fieldset>
					<fieldset>
						<legend>���������� ������</legend>
							<table class="tab">
								<tr>
									<td>
										���
									</td>
									<td>
										<input type="text" size="25" maxlength="50" name="fio">
									</td>
								</tr>
								<tr>
									<td>
										�������� ���� ������
									</td>
									<td>
										<select name="group">
											<optgroup label="������ ����">
												<option value="11">
													�-11
												</option>
												<option value="12">
													�-12
												</option>
												<option value="13">
													�-13
												</option>											
											</optgroup>
											<optgroup label="������ ����">
												<option value="21">
													�-21
												</option>
												<option value="22">
													�-22
												</option>
												<option value="23">
													�-23
												</option>											
											</optgroup>
											<optgroup label="������ ����">
												<option value="31" selected="selected">
													�-31
												</option>
												<option value="32">
													�-32
												</option>
												<option value="33">
													�-33
												</option>											
											</optgroup>
										</select>
									</td>
								</tr>	
								<tr>
									<td>
										<input type="submit" value="��������� ������">
									</td>
									<td>
										<input type="reset" value="�������� �����">
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="button" value="�������� ������ �� �����" onclick="over(document.myform);">
									</td>
								</tr>								
							</table>
					</fieldset>
				</form>
			</div>
            
            <div id="footer">
                &copy;������� ������, 2012.<br>
                ������ ������: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
            </div>
        </div>   
		<div id="div3" onmousedown="down(this.parentNode,event);"></div>		
    </body>
</html>