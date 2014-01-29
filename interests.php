<?php 
    require_once "some_scripts/session_starting.php";
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
            ������������ �������� �������� ������. ��� ��������
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
		<script src="foo.js"></script>
		<script type="text/javascript" src="jquery-1.9.0.min.js"></script>
		<script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#interests_link").addClass("bold_link");
            });
        </script> 
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                ��� ��������
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
                <h2>������ ���� ���������</h2>
                <!-- 
				<script language="JavaScript">	
					list("u");
				</script>
				 -->
				 <?php 
				 	build_list("u");

					function build_list($type)
					{
						if ($type=="o") {
							echo "<ol>";
							$ar=func_get_args($i);
							for ($i=1; $i < func_num_args(); $i++) { 
								echo "<li>".$ar[$i]."</li>";
							}
							echo "</ol>";
						}
						else{
							
							$anch=array("action","music","book");
							$tems_name=array("������ ��������","������ ������","������ ����");
							$tem1=array("�����","������������","����������");
							$tem2=array("Punk-rock","Alternative rock","Pop-punk");
							$tem3=array("������� ����������","�������","������-���������� ����������");
							$tems=array($tem1,$tem2,$tem3);
							echo "<ul>";
							for ($i=0; $i < 3; $i++) { 
								echo "<li><a href='#".$anch[$i]."'>".$tems_name[$i]."</a></li>";
								echo "<li style=list-style:none;'>";
								build_list("o",$tems[$i][0],$tems[$i][1],$tems[$i][2]);
								echo "</li>";
							}
							echo "</ul>";

						}
					}
				  ?>
				<table>
					<tr>
						<td valign="top">
						<a name="action">������ ��������</a>
						</td>
						<td>
						<br>Lost<br>House<br> Six feet under<br> The shield<br> 4400<br> Breaking Bad<br> Dexter<br> Supernatural<br> Friday Night Lights<br> 24<br> 
						</td>
					</tr>	
					<tr>
						<td valign="top">
						<a name="music">������ ������</a>
						</td>
						<td>
						<br>Green Day<br>Sum 41<br>Simple Plan<br>BFS<br>Yellowcard<br>TFK<br>We the kings<br>Motion City Soundtack<br>Offspring<br>Bad religion<br> 
						Tha Main<br>Unwritten Law<br>Gob<br>Zebrahead<br>Rise Against<br>A Rocket to the moon<br>Three days grace<br>Nickelback<br>Alkaline Trio<br>
						</td>
					</tr>	
					<tr>
						<td valign="top">
						<a name="book">������ ����</a>
						</td>
						<td>
						<br>������ ���������<br>���� ����������<br>���� ��������������<br>���� ��������� �������<br>������ �����<br>������� ����� �����<br>������� Vita Nostra<br>���������� ������ 40 ��������<br>���� ������� ����<br>�������� ��������<br> 
						</td>
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