<?php 
    require_once "some_scripts/session_starting.php";
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
            ������������ �������� �������� ������. ��� ���
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
                ��� ���
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
                    <p>��������� �������������. ���� ����� ������� ������ (� ��������� ��������� ��� - sam). � ������� 4 ����� ������� "�������������� ������" ���������� "���".</p>
                    <p>������� � � ������ ���������� � 1992 ����. � ������ � 3 �� 7 ��� ������� ������� ��� �1. ����� ������ � �����-�������� 1 ����� ������</p>
                    <p>����� ����� �������� � ��������������� �����������-����������� �����������, ��� ������� ����� ������ � ����� ������������ ����������.</p>
                </div>
            </div>
            <div id="footer">
                &copy;������� ������, 2012.<br>
                ������ ������: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
            </div>
        </div>            
    </body>
</html>