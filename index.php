<?php 
    require_once "some_scripts/session_starting.php";
    if (isset($_POST['hide']))  {
        unset($_SESSION['login']);
        unset($_SESSION['admin']);
        $user_login="";
        session_destroy();
    }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
			������������ �������� �������� ������. ������� ��������
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#index_link").addClass("bold_link");
                $("#book_form input,#book_form textarea").focus(function(event) {
                    $(this).css('background', '#f2efdf');
                });

                $("#book_form input,#book_form textarea").blur(function(event) {
                    $(this).css('background', '#fff');
                });

                $('#ajax_form').submit(function(event) {
                    $('#ajax_message3').load("index_ajax.php", { login: $('#login').val(), password: $('#password').val() } ,function(){
                        var text=$('#ajax_message3').html();
                        if (text=="") {
                            document.location.href="index.php";
                        };
                    });
                    return false;
                });
            });
        </script>   
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                ������� ��������
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
            
            <div id="text">
                <!-- <h2>������������ ������ 1</h2>
                <table>
                    <tr>
                        <td>
                            <img src="my_foto.jpg" alt="��� ����������" id="foto">
                        </td>
                        <td align="center" valign="top">
                            <span style="font-family:Courier;font-size:18px;">
                                ������� ������ ��������<br>
                                ������ �-41�                         
                            </span>
                        </td>
                    </tr>
                </table> -->
                <?php 
                echo "<div id='authoriz'>";
                    if (!is_autho()) {
                        $s=<<<__write
                        
                    <form action="index.php" method="post" class="my_form" id="ajax_form">
                    <h2 id="send_message">����� �� ����</h2>
                    <div id="ajax_message3" class="error_user"></div>
                    <table id="book_form" style="margin:0 auto">
                        <tr>
                            <td>�����</td>
                            <td><input type="text" name="login" size="40" id="login"></td>
                        </tr>
                        <tr>
                            <td>������</td>
                            <td><input type="password" name="password" size="40" id="password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="�����" style="float:left;">
                                <a href="register.php" id="load">
                                    <input type="button" value="�����������">
                                </a>
                                
                            </td>
                        </tr>
                    </table>
                </form>
            
             
__write;
                    echo "$s";
                    }
                    else {
                        if (isset($_SESSION['login'])) {
                            $user_name=" ������������ ".$_SESSION['login'];
                        }
                        else {
                            $user_name=" ������������� ".$_SESSION['admin'];
                        }   
                        $s=<<<__writes
                        <form action="index.php" method="post" class="my_form">
                            <label for="">������, $user_name!</label>
                            <input type="hidden" name="hide">
                            <input type="submit" value="�����">
                        </form>
__writes;
                    echo "$s";
                    }
                    echo "</div>";
                 ?>
                <!-- <div id="authoriz">
                    <form action="index.php" method="post" class="my_form" id="ajax_form">
                    <h2 id="send_message">����� �� ����</h2>
                    <table id="book_form" style="margin:0 auto">
                        <tr>
                            <td>�����</td>
                            <td><input type="text" name="login" size="40" id="login"></td>
                        </tr>
                        <tr>
                            <td>������</td>
                            <td><input type="password" name="password" size="40" id="password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="�����" style="float:left;">
                                <a href="register.php" id="load">
                                    <input type="button" value="�����������">
                                </a>
                                
                            </td>
                        </tr>
                    </table>
                </form>
            
            </div>  -->   

                </div>
                
            </div>
            <div id="footer">
                &copy;������� ������, 2012.<br>
                ������ ������: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
            </div>
    </body>
</html>
