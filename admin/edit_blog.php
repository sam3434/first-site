<?php 
    $monthes=array(
        "������",
        "�������",
        "�����",
        "������",
        "���",
        "����",
        "����",
        "�������",
        "��������",
        "�������",
        "������",
        "�������"
        );
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
			������������ �������� �������� ������. �������� �����
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
        <link rel="stylesheet" href="buttons/gh-buttons.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                
                $("#book_form input,#book_form textarea").focus(function(event) {
                    $(this).css('background', '#f2efdf');
                });

                $("#book_form input,#book_form textarea").blur(function(event) {
                    $(this).css('background', '#fff');
                });

            });
        </script> 
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                �������� �����
                
            </div>
            <div id="menu_php">
                <?php 
                    include 'menu.html';
                 ?>
            </div>
            
            <div id="textcarrier">
                <form action="edit_blog.php" method="post" class="my_form" id="ajax_form"  enctype="multipart/form-data">
                    <h2 id="send_message">�������� ������ � ����</h2>
                    <table id="book_form">
                        <tr>
                        <td>���� ������</td>
                            <td><input type="text" name="subject" size="40" id="subject"></td>
                        </tr>
                        <tr>
                            <td>����� ������</td>
                            <td><textarea name="message" cols="80" rows="15" id="message"></textarea></td>
                        </tr>
                        <tr>
                            <td>�����������</td>
                            <td>
                                <input type="file" name="filename">

                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="�������� ������">
                            </td>
                        </tr>
                    </table>
                </form>
                
                <?php 
                    require_once "database.php";
                    
                    if ((isset($_POST['subject']))&&(isset($_POST['message']))) {
                        $db=db_connect();
                        db_create_blog();
                        if ($_FILES['filename']['name']!="") {
                            $dest="graph//".time().$_FILES['filename']['name'];
                            copy($_FILES['filename']['tmp_name'], $dest);
                        }
                        $subject=clear_string($_POST['subject']);
                        $msg=clear_string($_POST['message']);
                        db_insert_blog($subject,$msg,$dest);
                        mysql_close($db);
                    }

                    require_once "blog/show_blog.php";
                 ?>
                                                 
        	</div>    
        <div id="footer">
                &copy;������� ������, 2012.<br>
                ������ ������: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
        </div>        
    </body>
</html>