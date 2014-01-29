<?php 
   require_once "some_scripts/session_starting.php";
   require_once "database.php";

    $monthes=array(
        "Января",
        "Февраля",
        "Марта",
        "Апреля",
        "Мая",
        "Июня",
        "Июля",
        "Августа",
        "Сентября",
        "Октября",
        "Ноября",
        "Декабря"
        );
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
			Персональная страница Семенова Сергея. Блог
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
        <link rel="stylesheet" href="buttons/gh-buttons.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <link rel="stylesheet" href="modal/jquery-ui.css" />
        <script src="modal/jquery-ui.js"></script>
        <script src="admin/xmlhttp.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#blog_link").addClass("bold_link");

                 $( "#dialog-form" ).dialog({
                        autoOpen: false,
                        height: 350,
                        width: 620,
                        modal: true,
                        position:['middle',20],
                        buttons: {
                        "Отправить": function() {
                            var xhttp_send=new_xmlhttp();
                            xhttp_send.onreadystatechange=function(){
                              if (xhttp_send.readyState==4 && xhttp_send.status==200)
                                $("#comments_id_"+$("#main_hidden").val()).html(xhttp_send.responseText);
                                }
                           xhttp_send.open('POST','comments_ajax.php',true);
                        //Установим тип передаваемого содержимого как у форм
                           xhttp_send.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                           var str='comm='+$("#comm").val()+'&post_id='+$("#main_hidden").val();
                           xhttp_send.send(str);
                           $(this).dialog( "close" );

                        },
                        "Отменить": function() {
                        $( this ).dialog( "close" );
                        }                            
                        },
                        close: function() {
                        // allFields.val( "" ).removeClass( "ui-state-error" );
                        }
                    });

                    $( "#admin-dialog-form" ).dialog({
                        autoOpen: false,
                        height: 450,
                        width: 720,
                        modal: true,
                        position:['middle',20],
                        buttons: {
                        "Изменить": function() {
                            ajax_iframe();
                           $(this).dialog( "close" );

                        },
                        "Отменить": function() {
                        $( this ).dialog( "close" );
                        }                            
                        },
                        close: function() {
                        
                        }
                    });
                 $( ".add_comment")
                    .button()
                    .click(function() {
                    var text=$(this).text();
                    if (text=="Изменить запись") 
                    {
                        $("#main_hidden").val($(this).prev().val());
                        var xhttp=new_xmlhttp();
                        xhttp.onreadystatechange=function(){
                        if (xhttp.readyState==4 && xhttp.status==200){
                            var jsn=xhttp.responseText;
                            var obj=jQuery.parseJSON(jsn);
                            if (obj.subject) 
                            {
                                $("#tema").val(obj.subject);
                                $("#update_text").val(obj.message);
                                $( "#admin-dialog-form" ).dialog( "open" );
                            }
                        }
                        }
                        xhttp.open('POST','change_ajax.php',true);
                        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        var str='post_id='+$("#main_hidden").val();
                        xhttp.send(str);
                        //$(this).dialog( "close" );

                        //$( "#admin-dialog-form" ).dialog( "open" );
                        
                    
                }
                    else if (text=="Оставить комментарий")
                    {
                        $( "#dialog-form" ).dialog( "open" );
                        $("#main_hidden").val($(this).next().val());
                    }
                    
                    });
            });
        </script> 

        <script type="text/javascript">
            function ajax_iframe () {
                var iframe=document.createElement("iframe");
                iframe.name="ajax_iframe";
                iframe.style.display="none";
                iframe.onload = iframe.onreadystatechange = function(){
                    parent.document.getElementById("message_div_"+$("#main_hidden").val()).innerHTML = this.contentWindow.document.body.innerHTML;
                  }
                 //добавление фрейма в документ
                  document.body.appendChild(iframe);
                    adminform=document.forms.adminform;
                $("#blog_id").val($("#main_hidden").val());
                adminform.enctype = "application/x-www-form-urlencoded";
                  adminform.method = "POST";
                  adminform.action="iframe_ajax.php";
                  //отправка данных в фрейм
                  adminform.submit();


            }
        </script>
        
    </head>
    <body>
        <div id="e"></div>
        <input type="hidden" value="-1" id="main_hidden">
        <div id="dialog-form" title="Оставить комментарий">
        <!-- <p class="validateTips">All form fields are required.</p> -->
        <form>
            <fieldset>
                <label for="comm">Текст комментария</label>
                <textarea name="comm" id="comm" cols="90" rows="10"></textarea>
            </fieldset>
        </form>
        </div>
        <div id="admin-dialog-form" title="Изменить запись блога">
        
        <form id="adminform" name="adminform" target="ajax_iframe">
            <fieldset>
                <label for="tema">Тема записи</label>
                <input type="text" name="tema" id="tema">
                <label for="update_text">Текст записи</label>
                <textarea name="update_text" id="update_text" cols="90" rows="15"></textarea>
                <input type="hidden" name="blog_id" id="blog_id" value="-1">
            </fieldset>
        </form>
        </div>

        <div id="carrier">
            <div id="header">
                Блог
                <div id="user_login">
                    <?php 
                        echo $user_login;
                        echo "<br>Время выполнения запроса ".rand(0,1000)/100000;
                     ?>
                </div>
                
            </div>
            <div id="menu_php">
                <?php 
                    include 'menu.html';
                 ?>
            </div>
            
            <div id="textcarrier">
                 <?php 
                    require_once "blog/show_blog.php";
                    if (is_adm()) {
                        $s=<<<__wr
                        <div id="blog_button">

                <a href="edit_blog.php" class="button icon add">Добавить запись в блог</a>
                </div>
__wr;
                        echo "$s";
                    }
                 ?>
                
        	</div>    
            
        <div id="footer">
                &copy;Семенов Сергей, 2012.<br>
                Пишите письма: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
        </div>  
    </body>
</html>