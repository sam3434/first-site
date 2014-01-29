<?php 
	require_once "some_scripts/session_starting.php";
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
            ������������ ���� �������� ������. ����������
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script src="foo.js">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#fotoes_link").addClass("bold_link");
            });
        </script> 

        </script>
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                ����������
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
            	<?php 
            		$alt=array("���� 1",
								"���� 2",
								"���� 3",
								"���� 4",
								"���� 5",
								"���� 6",
								"���� 7",
								"���� 8",
								"���� 9",
								"���� 10",
								"���� 11",
								"���� 12",
								"���� 13",
								"���� 14",
								"���� 15"
							);
            		$fotos=array(
									"001sevastopol",
									"005GrafPristan",
									"007PamNaximovu",
									"00000703",
									"balaklava",
									"chufut-kale",
									"foto_43(VladXers)",
									"GrotPuchkina",
									"hcolon",
									"Hersones",
									"hersonm",
									"krepChe",
									"massan01",
									"PamZatKor",
									"park3"
								);
            		build_table();

					function build_table()
					{
						global $alt,$fotos;
						echo "<table class=foto>";
						for ($i=0; $i < 5; $i++) { 
							echo "<tr>";
							for ($j=0; $j < 3; $j++) { 
								echo "<td>";
								echo "<a href='#'><img src='graph/".$fotos[$i*3+$j]."Min.jpg' alt='".$alt[$i*3+$j]."'></a>";
								echo "<p>".$alt[3*$i+$j]."</p>";
								echo "</td>";
							}
						echo "</tr>";
						}
						echo "</table>";
					}

					
	
            	 ?>

            	 <script language="JavaScript">
					tab_foto();
				</script>     
            </div>
			</div>
            <div id="footer">
                &copy;������� ������, 2012.<br>
                ������ ������: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
            </div>
        </div> 
<div id="div3" onmousedown="down(this.parentNode,event);"></div>		
    </body>
</html>