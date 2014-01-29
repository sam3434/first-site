<?php 
    require_once "some_scripts/session_starting.php";
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>
			������������ �������� �������� ������. �����
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#learn_link").addClass("bold_link");
            });
        </script> 
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                �����
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
				<div class="h">
				<p>��������������� ����������� ����������� �����������</p>
				<p>	���������: ���������� � ������������� �������</p>
				<p>	�������: �������������� ������</p>
				</div>
				
				<table style="margin:0 auto;" class="my_table">
					<tr>
						<th colspan="9">���� �������� ��������</th>
					</tr>
					<tr>
						<th rowspan="2">�</th>
						<th rowspan="2">����������</th>
						<th rowspan="2">�������</th>
						<th colspan="6">����� �����</th>
					</tr>
					<tr>
						<th>�����</th>
						<th>���</th>
						<th>��</th>
						<th>��</th>
						<th>��</th>
						<th>���</th>
					</tr>
					<tr>
					   <td> 1</td>
					   <td> ������������ �����������������</td> 
					   <td> ��</td>
					   <td> 54</td> 
					   <td> 27</td> 
					   <td> 18</td>
					   <td> 0</td>
					   <td> 9</td>
					   <td> 27</td> 
					</tr>


					<tr>
					   <td> 2</td>
					   <td> ������ ����������</td> 
					   <td> ��</td>
					   <td> 540</td> 
					   <td> 282</td> 
					   <td> 141</td>
					   <td> 0</td>
					   <td> 141</td>
					   <td> 258</td> 
					</tr>


					<tr>
					   <td> 3</td>
					   <td> ���������� �������</td> 
					   <td> ����</td>
					   <td> 108</td> 
					   <td> 54</td> 
					   <td> 18</td>
					   <td> 0</td>
					   <td> 36</td>
					   <td> 54</td> 
					</tr>


					<tr>
					   <td> 4</td>
					   <td> ������ ���������� ����������</td> 
					   <td> ��</td>
					   <td> 216</td> 
					   <td> 139</td> 
					   <td> 87</td>
					   <td> 0</td>
					   <td> 52</td>
					   <td> 77</td> 
					</tr>


					<tr>
					   <td> 5</td>
					   <td> ������ ���������������� � <br> ��������������� �����</td> 
					   <td> ��</td>
					   <td> 405</td> 
					   <td> 210</td> 
					   <td> 105</td>
					   <td> 87</td>
					   <td> 18</td>
					   <td> 195</td> 
					</tr>

					<tr>
					   <td> 6</td>
					   <td> ����� ��������</td> 
					   <td> ����</td>
					   <td> 54</td> 
					   <td> 27</td> 
					   <td> 18</td>
					   <td> 0</td>
					   <td> 9</td>
					   <td> 27</td> 
					</tr>

					<tr>
					   <td> 7</td>
					   <td> ������ ������������ � �������������� <br> ����������</td> 
					   <td> ��</td>
					   <td> 162</td> 
					   <td> 72</td> 
					   <td> 54</td>
					   <td> 18</td>
					   <td> 0</td>
					   <td> 90</td> 
					</tr>

					<tr>
					   <td> 8</td>
					   <td> ������</td> 
					   <td> ������</td>
					   <td> 324</td> 
					   <td> 194</td> 
					   <td> 106</td>
					   <td> 88</td>
					   <td> 0</td>
					   <td> 130</td> 
					</tr>

					<tr>
					   <td> 9</td>
					   <td> ������ ����������� � ��������������</td> 
					   <td> ��</td>
					   <td> 108</td> 
					   <td> 72</td> 
					   <td> 36</td>
					   <td> 18</td>
					   <td> 18</td>
					   <td> 36</td> 
					</tr>

					<tr>
					   <td> 10</td>
					   <td> <a href="test.php">��������� ������ � �����������</a></td> 
					   <td> ��</td>
					   <td> 189</td> 
					   <td> 89</td> 
					   <td> 36</td>
					   <td> 36</td>
					   <td> 17</td>
					   <td> 100</td> 
					</tr>

					<tr>
					   <td> 11</td>
					   <td> ������ ������������ ��������</td> 
					   <td> ��</td>
					   <td> 216</td> 
					   <td> 104</td> 
					   <td> 52</td>
					   <td> 35</td>
					   <td> 17</td>
					   <td> 112</td> 
					</tr>					
				</table>
            </div>
			</div>
            <div id="footer">
                &copy;������� ������, 2012.<br>
                ������ ������: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
            </div>
        </div>            
    </body>
</html>