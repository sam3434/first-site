Z:/home/localhost/www/web4/about.php<br><?php 
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
</html>Z:/home/localhost/www/web4/admin/admin_pages.php<br><?php 
	$admin_pages=array(
		"show_stats",
		"load_file",
		"edit_blog"
		);
?>Z:/home/localhost/www/web4/admin/edit_blog.php<br><?php 
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
</html>Z:/home/localhost/www/web4/admin/xmlhttp.js<br>function new_xmlhttp() {
	var req;
	req = null;
    if (window.XMLHttpRequest) {
        try {
            req = new XMLHttpRequest();
        } catch (e){}
    } else if (window.ActiveXObject) {
        try {
            req = new ActiveXObject('Msxml2.XMLHTTP');
        } catch (e){
            try {
                req = new ActiveXObject('Microsoft.XMLHTTP');
            } catch (e){}
        }
    

}
return req;
}Z:/home/localhost/www/web4/ajax.php<br><?php 
	if (isset($_POST['x'])) {
		echo $_POST['x'];
	}
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<style>
		#ajax{
			border: 1px solid red;
		}
	</style>
	

</head>

<body>
	<script type="text/javaScript">
		function start(){
	   var x=document.getElementById('tf1').value;
	   

	   xhttp=new XMLHttpRequest();
	   xhttp.onreadystatechange=function(){
	      if (xhttp.readyState==4 && xhttp.status==200)
	         document.getElementById('ajax').innerHTML=xhttp.responseText;
	      }
	   xhttp.open('POST','ans.php',true);
	//Установим тип передаваемого содержимого как у форм
	   xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	   var str='x='+x;
	   xhttp.send(str);
	}
	</script>	
	
	<div id="ajax">
		
	</div>
	<input type="text" name="" id="tf1">
	<input type="button" value="Send" onclick="start();">
</body>
</html>Z:/home/localhost/www/web4/all_stats.php<br><?php 
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

<?php 
                    require_once "database.php";
                    $db=db_connect();
                    $per_page=10;
                    if (isset($_GET['page'])) {
                        $page=$_GET['page'];
                    }
                    else{
                        $page=1;
                    }
                    $start=abs(($page-1)*$per_page);
                    $query="select count(*) from stats";
                    $res=mysql_query($query) or die(mysql_error());
                    $row=mysql_fetch_row($res);
                    $total_num=$row[0];
                    $num_pages=ceil($total_num/$per_page);
                    $pages=min($pages,$num_pages);
                    // $num_pages=20;
                    // $page=8;
                    $msgs=db_get_all_limit($start,$per_page,"stats");
                    if (!$msgs) {
                        echo "<div class=message>���������� �����</div>";
                        //exit();
                    }
                    else{
                        // id,mdate,page,ip,host,brauz, user
                        $rows=mysql_num_rows($msgs);
                        for ($i=0; $i < $rows; $i++) { 
                            $key=mysql_fetch_row($msgs);
                            $date=date("n",strtotime($key[1]));
                            $m=$monthes[$date-1];
                            $d=date("j",strtotime($key[1]));
                            $y=date("Y",strtotime($key[1]));
                            echo "<div class='message_div'>";
                            echo "<div class='date'>";
                            echo "<strong>$d/ </strong>";
                            echo "<span>$m $y</span><strong> / </strong>"."<span>".date("H:i:s",strtotime($key[1]))."</span>";
                            echo "</div>";
                            echo "<div class='info'>";
                            echo "<h4>��������</h4>&#09;-&#09;$key[2]<br> ";
                            echo "<h4>IP-�����</h4>&#09;-&#09;$key[3]<br> ";
                            echo "<h4>��� �����</h4>&#09;-&#09;$key[4]<br> ";
                            echo "<h4>�������</h4>&#09;-&#09;$key[5]<br> ";
                            echo "<h4>����� ������������</h4>&#09;-&#09;$key[6]<br> ";
                            echo "</div>";
                            
                            echo "</div>";
                        }
                        

                    }

                require_once "blog/paginate.php"
                 ?> Z:/home/localhost/www/web4/ans.php<br><?php 
header('Content-Type: text/plain; charset=windows-1251');
	if (isset($_POST['x'])) {
		$s=iconv("utf-8", "windows-1251", $_POST['x']);
		echo "sdfsd ".$s;
		//echo $_POST['x'];
	}
 ?>Z:/home/localhost/www/web4/blog/paginate.php<br><?php 
    echo "<div id='paginate'>";
    $x=($page-1>1)?$page-1:1;
    $y=($page+1<=$num_pages)?$page+1:$num_pages;
    echo "<div id='there'>";
    if ($page>1) {
        echo "<img src='icons/arrow_left.png' alt='' class='arrow'>";
        echo "<a href='{$_SERVER["PHP_SELF"]}?page=$x'> ����������</a>&nbsp;";
    }
    if ($page<$num_pages) {
        echo "<a href='{$_SERVER["PHP_SELF"]}?page=$y'>��������� </a>";    
        echo "<img src='icons/arrow_right.png' alt='' class='arrow'>";
    }
    echo "</div>";
    if (($page<5)||($num_pages<=8)) {
        for ($i=1; $i <= min($num_pages,8); $i++) { 
            if ($i==$page) {
                echo "<span class='current'>$i</span>&nbsp;";
            }
            else{
                echo "<a href='".$_SERVER['PHP_SELF']."?page=".$i."'>$i</a>&nbsp; ";
            }
            
        }
    }
    elseif (($page>$num_pages-5)&&($num_pages>8)){
        for ($i=$num_pages-7; $i <= $num_pages; $i++) { 
            if ($i==$page) {
                echo "<span class='current'>$i</span>&nbsp;";
            }
            else{
                echo "<a href='".$_SERVER['PHP_SELF']."?page=".$i."'>$i</a>&nbsp; ";
            }
            
        }
    }
    else{
        for ($i=$page-4; $i <=$page+4 ; $i++) { 
            if ($i==$page) {
                echo "<span class='current'>$i</span>&nbsp;";   
            }
            else{
                echo "<a href='".$_SERVER['PHP_SELF']."?page=".$i."'>$i</a>&nbsp; ";    
            }            
        }
    }
    echo "</div>";
 ?>Z:/home/localhost/www/web4/blog/show_blog.php<br><?php 
                    require_once "database.php";
                    $db=db_connect();
                    $per_page=2;
                    if (isset($_GET['page'])) {
                        $page=$_GET['page'];
                    }
                    else{
                        $page=1;
                    }
                    $start=abs(($page-1)*$per_page);
                    $query="select count(*) from blog";
                    $res=mysql_query($query) or die(mysql_error());
                    $row=mysql_fetch_row($res);
                    $total_num=$row[0];
                    $num_pages=ceil($total_num/$per_page);
                    $pages=min($pages,$num_pages);
                    // $num_pages=20;
                    // $page=8;
                    $msgs=db_get_all_limit($start,$per_page,"blog");
                    if (!$msgs) {
                        echo "<div class=message>� ����� ��� �� ����� ������</div>";
                        //exit();
                    }
                    else{
                        // id,subject,msg,mdate,image
                        $rows=mysql_num_rows($msgs);
                        for ($i=0; $i < $rows; $i++) { 
                            $key=mysql_fetch_row($msgs);
                            $date=date("n",strtotime($key[3]));
                            $m=$monthes[$date-1];
                            $d=date("j",strtotime($key[3]));
                            $y=date("Y",strtotime($key[3]));
                            echo "<div class='message_div' id='message_div_$key[0]'>";
                            echo "<div class='date'>";
                            echo "<strong>$d/ </strong>";
                            echo "<span>$m $y</span><strong> / </strong>"."<span>".date("H:i:s",strtotime($key[3]))."</span>";
                            echo "</div>";
                            echo "<h3>$key[1]</h3>";
                            if ($key[4]!="") {
                                echo "<img src='$key[4]' alt='' class='blog_image'>";
                            }                            
                            echo "<div class='text'>$key[2]</div>";
                            echo "</div>";
                            echo "<div id='comments_id_$key[0]'>";

                            $comms_res=db_show_comments($key[0]);
                            $comms_count=-1;
                            if ($comms_res) {
                                $comms_count=mysql_num_rows($comms_res);
                            }
                         
                            for ($j=0; $j < $comms_count; $j++) { 
                            		$comm=mysql_fetch_row($comms_res);
                            		list(,$comm_login,$comm_date,$comm_mark,$comm_msg,)=$comm;
                                    $strtime=strtotime($comm_date);
                                    $date=date("n",$strtime);
                                    $m=$monthes[$date-1];
                                    $d=date("j",$strtime);
                                    $y=date("Y",$strtime);
                                    echo "<div class='comment'>";
                            		echo "<img src='modal/noavatar.gif' alt='' width='64px' height='64px'>";
                            		echo "<span>";
                            		echo "<span class='nick'>$comm_login </span>";
                            		echo "<span class='comment_text'> ������� ����������� </span>";
                            		echo "<span class='comment_date'>&nbsp;&nbsp;&nbsp; $d $m, $y � ".date("H:i:s",$strtime)."</span>";
                                    // echo "<img style='float:right;' src='icons/plus.png' alt='' width='16px' height='16px'>";
                                    // echo "<img style='float:right;' src='icons/minus.png' alt='' width='16px' height='16px'>";
                                    // echo "<span class='mark good_answer'>+1</span><br>";
                                    echo "</span><br>";
                            		echo "<span class='comment_text'>";
                            		echo "$comm_msg";
                            		echo "</span></span></div>";

                            }
                            echo "</div>";
                            if (is_autho()) {
                                echo "<button class='add_comment'>�������� �����������</button>";
                                echo "<input type='hidden' value='$key[0]'>";
                                if (is_adm()) {
                                    echo "<button class='add_comment'>�������� ������</button>";    
                                }
                                
                                
                            }
                            
                        }
                        

                    }

                require_once "paginate.php";
                 ?>


Z:/home/localhost/www/web4/blog/show_comments.php<br><?php 
	require_once $_SERVER['DOCUMENT_ROOT']."/web3/some_scripts/session_starting.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/web3/database.php";
	$res=db_show_		

 ?>Z:/home/localhost/www/web4/blog.php<br><?php 
   require_once "some_scripts/session_starting.php";
   require_once "database.php";

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
			������������ �������� �������� ������. ����
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
                        "���������": function() {
                            var xhttp_send=new_xmlhttp();
                            xhttp_send.onreadystatechange=function(){
                              if (xhttp_send.readyState==4 && xhttp_send.status==200)
                                $("#comments_id_"+$("#main_hidden").val()).html(xhttp_send.responseText);
                                }
                           xhttp_send.open('POST','comments_ajax.php',true);
                        //��������� ��� ������������� ����������� ��� � ����
                           xhttp_send.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                           var str='comm='+$("#comm").val()+'&post_id='+$("#main_hidden").val();
                           xhttp_send.send(str);
                           $(this).dialog( "close" );

                        },
                        "��������": function() {
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
                        "��������": function() {
                            ajax_iframe();
                           $(this).dialog( "close" );

                        },
                        "��������": function() {
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
                    if (text=="�������� ������") 
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
                    else if (text=="�������� �����������")
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
                 //���������� ������ � ��������
                  document.body.appendChild(iframe);
                    adminform=document.forms.adminform;
                $("#blog_id").val($("#main_hidden").val());
                adminform.enctype = "application/x-www-form-urlencoded";
                  adminform.method = "POST";
                  adminform.action="iframe_ajax.php";
                  //�������� ������ � �����
                  adminform.submit();


            }
        </script>
        
    </head>
    <body>
        <div id="e"></div>
        <input type="hidden" value="-1" id="main_hidden">
        <div id="dialog-form" title="�������� �����������">
        <!-- <p class="validateTips">All form fields are required.</p> -->
        <form>
            <fieldset>
                <label for="comm">����� �����������</label>
                <textarea name="comm" id="comm" cols="90" rows="10"></textarea>
            </fieldset>
        </form>
        </div>
        <div id="admin-dialog-form" title="�������� ������ �����">
        
        <form id="adminform" name="adminform" target="ajax_iframe">
            <fieldset>
                <label for="tema">���� ������</label>
                <input type="text" name="tema" id="tema">
                <label for="update_text">����� ������</label>
                <textarea name="update_text" id="update_text" cols="90" rows="15"></textarea>
                <input type="hidden" name="blog_id" id="blog_id" value="-1">
            </fieldset>
        </form>
        </div>

        <div id="carrier">
            <div id="header">
                ����
                <div id="user_login">
                    <?php 
                        echo $user_login;
                        echo "<br>����� ���������� ������� ".rand(0,1000)/100000;
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

                <a href="edit_blog.php" class="button icon add">�������� ������ � ����</a>
                </div>
__wr;
                        echo "$s";
                    }
                 ?>
                
        	</div>    
            
        <div id="footer">
                &copy;������� ������, 2012.<br>
                ������ ������: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
        </div>  
    </body>
</html>Z:/home/localhost/www/web4/book.php<br><?php 
	include_once "some_scripts/write_message.php";
    require_once "some_scripts/session_starting.php";
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
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#book_link").addClass("bold_link");

                $("#book_form input,#book_form textarea").focus(function(event) {
                	$(this).css('background', '#f2efdf');
                });

                $("#book_form input,#book_form textarea").blur(function(event) {
                	$(this).css('background', '#fff');
                });

                $('#ajax_form').submit(function(event) {
                    $('#ajax_message').load("book_ajax.php", { fio: $('#fio').val(), email: $('#email').val(), subject: $('#subject').val(), message: $('#message').val() } );
                    return false;
                });
            });
        </script> 
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                �������� �����
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
                <div id="ajax_message">
            	<?php 
            		include_once "some_scripts/read_messages.php";
            	 ?>
                    </div>
                <form action="book.php" method="post" class="my_form" id="ajax_form">
            		<h2 id="send_message">��������� ���������</h2>
                	<table id="book_form">
                		<tr>
                			<td>���</td>
                			<td><input type="text" name="fio" size="40" id="fio"></td>
                		</tr>
                		<tr>
                			<td>E-mail</td>
                			<td><input type="text" name="email" size="40" id="email"></td>
                		</tr>
                		<tr>
                			<td>���� ���������</td>
                			<td><input type="text" name="subject" size="40" id="subject"></td>
                		</tr>
                		<tr>
                			<td>����� ���������</td>
                			<td><textarea name="message" cols="80" rows="15" id="message" maxlength="1000"></textarea></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>
                				<input type="submit" value="��������">
                				<a href="load_file.php" id="load">
                					<input type="button" value="��������� ���������">
                				</a>
                			</td>
                		</tr>
	               	</table>
                </form>
            
        	</div>
                 
        <div id="footer">
                &copy;������� ������, 2012.<br>
                ������ ������: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
        </div>   
        </div> 
    </body>
</html>Z:/home/localhost/www/web4/book_ajax.php<br><?php 
	// if ((isset($_POST['fio']))&&(isset($_POST['email']))&&(isset($_POST['subject']))&&(isset($_POST['message']))) {
	// 	$fio=htmlspecialchars($_POST['fio']);
	// 	$email=htmlspecialchars($_POST['email']);
	// 	$subject=htmlspecialchars($_POST['subject']);
	// 	$message=htmlspecialchars($_POST['message']);
	// 	$date=date('d.m.Y');
	// 	$f=@fopen("messages/messages.inc", "a+");
	// 	// @fwrite($f, $date.";".$subject.";".iconv("utf-8", "windows-1251", "$fio").";".$email.";".$message.";");
	// 	@fwrite($f, iconv("utf-8", "windows-1251","$date;$subject;$fio;$email;$message;"));
	// 	@fclose($f);	
	// }

	// $monthes=array(
	// 	"������",
	// 	"�������",
	// 	"�����",
	// 	"������",
	// 	"���",
	// 	"����",
	// 	"����",
	// 	"�������",
	// 	"��������",
	// 	"�������",
	// 	"������",
	// 	"�������"
	// 	);
 ?>

<?php 
            		// $f=@fopen("messages/messages.inc", "r");
            		// $messages=array();
            		// $text=@fread($f, filesize("messages/messages.inc"));
            		// if ($text) {
            		// 	$date=strtok($text, ";");
	            	// 	$subject=strtok(";");
	            	// 	$fio=strtok(";");
	            	// 	$email=strtok(";");
	            	// 	$text=strtok(";");
	            	// 	$messages[]=array($date,$subject,$fio,$email,$text);
            		// }            		
            		// while ($text) {
            		// 	$date=strtok(";");
            		// 	$subject=strtok(";");
            		// 	$fio=strtok(";");
            		// 	$email=strtok(";");
            		// 	$text=strtok(";");
            		// 	$messages[]=array($date,$subject,$fio,$email,$text);
            		// }
            		// @fclose($f);
            		// foreach (array_reverse($messages) as $key) {
            		// 	if ($key[2]!="")
            		// 	{
            		// 		$date=explode(".", $key[0]);
            		// 		$m=$monthes[$date[1]-1];
            		// 		echo "<div class='message_div'>";
	            	// 		echo "<div class='date'>";
	            	// 		echo "<strong>$date[0]/ </strong>";
	            	// 		echo "<span>$m $date[2]</span>";
	            	// 		echo "</div>";
	            	// 		echo "<h3>$key[1]</h3>";
	            	// 		echo "<div class='text'>$key[4]</div>";
	            	// 		echo "<div class='author'>$key[2] ($key[3])<img src='author.png' alt=''></div> ";
	            	// 		echo "</div>";
            		// 	}

            		// }
            	 ?>

<?php 
	include_once "some_scripts/write_message.php";
	include_once "some_scripts/read_messages.php";
 ?>Z:/home/localhost/www/web4/change_ajax.php<br><?php 
	include_once "database.php";
	include_once "some_scripts/session_starting.php";
	if (is_autho()) 
	{
		if (isset($_POST['post_id'])) {
			$id=$_POST['post_id'];
			db_connect();
			db_create_comments();
			$query="select * from blog where id='$id'";	
			$res=mysql_query($query);
			$row=mysql_fetch_row($res);
			$a=array('subject'=>iconv("windows-1251","utf-8",$row[1]),'message'=>iconv("windows-1251","utf-8",$row[2]));
			$s=json_encode($a);
			echo "$s";
		}
	}
?>Z:/home/localhost/www/web4/classes.php<br><?php 
	
	abstract class db
	{
		static $time;
		private $handle_db;
		
		abstract public function __construct($server,$user,$password,$db_name);
		
		abstract public function __destruct();
		
		abstract public function exec_query($query);
	}

	class mysql_db extends db
	{
		public $s;

		public function exec_query($query)
		{
			$start=microtime();
			$res=mysql_query($query);
			if (!$res) {
				die("Cannot execute query ".$query);
			}
			$finish=microtime();
			db::$time=$finish-$start;
			return $res;
		}
		
		public function __construct($server,$user,$password,$db_name)
		{
			$con=mysql_connect($server,$user,$password);
			mysql_query('SET NAMES cp1251');
			if (!$con) {
				echo "Error in connection";
				exit();
			}
			$query="create database if not exists $db_name";
			if (!mysql_query($query)) {
				echo "Error in connection";
			}
			$sel=mysql_select_db($db_name,$con);
			if (!$sel)	{
				echo "error in selection";
			}
			$handle_db=$con;
		}

		public function __destruct()
		{
			if ($handle_db)
				mysql_close($handle_db);
		}
	}

	class blog_editor extends mysql_db
	{
		public function create_blog()
		{
			$query="CREATE TABLE IF NOT EXISTS blog(id int unsigned NOT NULL auto_increment,
                                                              subject varchar(256) NOT NULL,
                                     msg text not null,
                                     mdate datetime NOT NULL, 
                                     image varchar(512) NOT NULL,primary key(id))";
			exec_query($query);
		}

		public function insert_blog($subject,$msg,$image)
		{
			$query="insert into blog(id,subject,msg,mdate,image) values(0,'$subject','$msg',now(),'$image')";
			exec_query($query);
		}

		public function update_blog($id,$subject,$msg)
		{
			$msg=clear_string($msg);
			$query="update blog set subject='$subject' where id='$id'";
			exec_query($query);
			$query="update blog set msg='$msg' where id='$id'";
			exec_query($query);
		}

		public function show_blog()
		{
			$db=db_connect();
                    $per_page=2;
                    if (isset($_GET['page'])) {
                        $page=$_GET['page'];
                    }
                    else{
                        $page=1;
                    }
                    $start=abs(($page-1)*$per_page);
                    $query="select count(*) from blog";
                    $res=mysql_query($query) or die(mysql_error());
                    $row=mysql_fetch_row($res);
                    $total_num=$row[0];
                    $num_pages=ceil($total_num/$per_page);
                    $pages=min($pages,$num_pages);
                    // $num_pages=20;
                    // $page=8;
                    $msgs=db_get_all_limit($start,$per_page,"blog");
                    if (!$msgs) {
                        echo "<div class=message>В блоге нет ни одной записи</div>";
                        //exit();
                    }
                    else{
                        // id,subject,msg,mdate,image
                        $rows=mysql_num_rows($msgs);
                        for ($i=0; $i < $rows; $i++) { 
                            $key=mysql_fetch_row($msgs);
                            $date=date("n",strtotime($key[3]));
                            $m=$monthes[$date-1];
                            $d=date("j",strtotime($key[3]));
                            $y=date("Y",strtotime($key[3]));
                            echo "<div class='message_div' id='message_div_$key[0]'>";
                            echo "<div class='date'>";
                            echo "<strong>$d/ </strong>";
                            echo "<span>$m $y</span><strong> / </strong>"."<span>".date("H:i:s",strtotime($key[3]))."</span>";
                            echo "</div>";
                            echo "<h3>$key[1]</h3>";
                            if ($key[4]!="") {
                                echo "<img src='$key[4]' alt='' class='blog_image'>";
                            }                            
                            echo "<div class='text'>$key[2]</div>";
                            echo "</div>";
                            echo "<div id='comments_id_$key[0]'>";

                            $comms_res=db_show_comments($key[0]);
                            $comms_count=-1;
                            if ($comms_res) {
                                $comms_count=mysql_num_rows($comms_res);
                            }
                         
                            for ($j=0; $j < $comms_count; $j++) { 
                            		$comm=mysql_fetch_row($comms_res);
                            		list(,$comm_login,$comm_date,$comm_mark,$comm_msg,)=$comm;
                                    $strtime=strtotime($comm_date);
                                    $date=date("n",$strtime);
                                    $m=$monthes[$date-1];
                                    $d=date("j",$strtime);
                                    $y=date("Y",$strtime);
                                    echo "<div class='comment'>";
                            		echo "<img src='modal/noavatar.gif' alt='' width='64px' height='64px'>";
                            		echo "<span>";
                            		echo "<span class='nick'>$comm_login </span>";
                            		echo "<span class='comment_text'> оставил комментарий </span>";
                            		echo "<span class='comment_date'>&nbsp;&nbsp;&nbsp; $d $m, $y в ".date("H:i:s",$strtime)."</span>";
                                    // echo "<img style='float:right;' src='icons/plus.png' alt='' width='16px' height='16px'>";
                                    // echo "<img style='float:right;' src='icons/minus.png' alt='' width='16px' height='16px'>";
                                    // echo "<span class='mark good_answer'>+1</span><br>";
                                    echo "</span><br>";
                            		echo "<span class='comment_text'>";
                            		echo "$comm_msg";
                            		echo "</span></span></div>";

                            }
                            echo "</div>";
                            if (is_autho()) {
                                echo "<button class='add_comment'>Оставить комментарий</button>";
                                echo "<input type='hidden' value='$key[0]'>";
                                if (is_adm()) {
                                    echo "<button class='add_comment'>Изменить запись</button>";    
                                }
                                
                                
                            }
                            
                        }
                        

                    }

                require_once "paginate.php";
			
		}

	}

	// $d=new mysql_db("localhost","root","","publications");
	// $d->exec_query("select * from users");
	// echo db::$time;
 ?>Z:/home/localhost/www/web4/comments_ajax.php<br><?php 
	include "database.php";
	require_once "some_scripts/session_starting.php";
	if (is_autho()) 
	{
		db_connect();
		db_create_comments();
		$msg=iconv("utf-8","windows-1251",clear_string($_POST['comm']));
		$id_blog=$_POST['post_id'];
		db_insert_comments(login(), $msg, $id_blog);	

		/*
		 Show comments with Ajax
		*/
		$comms_res=db_show_comments($id_blog);
        $comms_count=mysql_num_rows($comms_res);
        for ($j=0; $j < $comms_count; $j++) { 
        		$comm=mysql_fetch_row($comms_res);
        		list(,$comm_login,$comm_date,$comm_mark,$comm_msg,)=$comm;
                $strtime=strtotime($comm_date);
                $date=date("n",$strtime);
                $m=$monthes[$date-1];
                $d=date("j",$strtime);
                $y=date("Y",$strtime);
                echo "<div class='comment'>";
        		echo "<img src='modal/noavatar.gif' alt='' width='64px' height='64px'>";
        		echo "<span>";
        		echo "<span class='nick'>$comm_login </span>";
        		echo "<span class='comment_text'> ������� ����������� </span>";
        		echo "<span class='comment_date'>&nbsp;&nbsp;&nbsp; $d $m, $y � ".date("H:i:s",$strtime)."</span><br>";
        		echo "<span class='comment_text'>";
        		echo "$comm_msg";
        		echo "</span></span></div>";
        }
	}
	else
	{
		die("�� �� �����������");
	}
	
 ?>Z:/home/localhost/www/web4/contacts.php<br><?php 
	require_once "some_scripts/session_starting.php";
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
			������������ �������� �������� ������. ��������
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
                ��������
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
					<legend>���������� ������</legend>
					<form method="post" action="mailto:sam3434@mail.ru" onsubmit="cont(this);return false;" name="myform" onclick="winform.show();">
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
									���
								</td>
								<td>
									�������<input type="radio" name="pol" value="male" checked="checked">
									�������<input type="radio" name="pol" value="female">
								</td>
							</tr>
							<tr>
								<td>
									�������
								</td>
								<td>
									<select name="age">
										<option value="0">������ 15</option>
										<option value="1">�� 15 �� 20</option>
										<option value="2">�� 20 �� 30</option>
										<option value="3">������ 30</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									����������� �����
								</td>
								<td>
									<input type="text" size="25" maxlength="50" name="mail">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									���������<br>
									<textarea name="msg" rows="10" cols="50"></textarea>
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
					</form>
				</fieldset>
                
            </div>
            <div id="footer">
                &copy;������� ������, 2012.<br>
                ������ ������: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
            </div>
        </div>   
		<div id="div3" onmousedown="down(this.parentNode,event);"></div>		
    </body>
</html>Z:/home/localhost/www/web4/database.php<br><?php 
	require_once "classes.php";
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
	$server="localhost";
	$user="root";
	$password="";
	$db_name="publications";
	$salt="#gd%62*";

	$mdb=new mysql_db($server,$user,$password,$db_name);

	$right_answers=array("123","�������","21");

	function db_connect()
	{
		//db_create_query();
		//global $mdb;
	}

	function db_query($query)
	{
		global $mdb;
		//echo $mdb->s;
		$res=$mdb->exec_query($query);
		//$this->s.=$_SERVER['PHP_SELF'].$query."Time is ".db::$time."<br>";
		db_insert_query($query,$_SERVER['PHP_SELF'],db::$time);
		return $res;
	}

	function db_create_t()
	{
		$query="CREATE TABLE IF NOT EXISTS results(id int unsigned NOT NULL auto_increment,
                                                              fio varchar(120) NOT NULL,
                                     st_group char(2),
                                     ans1 varchar(4) NOT NULL,ans2 varchar(128) NOT NULL, 
                                     ans3 char(2) NOT NULL,mdate datetime NOT NULL, 
                                     res1 tinyint(1) NOT NULL ,res2 tinyint(1) NOT NULL,res3 tinyint(1) NOT NULL,primary key(id))";
		db_query($query);
	}

	function db_get_all()
	{
		$query="select * from results order by fio";
		$res=db_query($query);
		return $res;
	}

	function db_insert($fio,$group,$ans1,$ans2,$ans3,$date)
	{
		global $right_answers;
		$res1=(($ans1==$right_answers[0])?1:0);
		$res2=(($ans2==$right_answers[1])?1:0);
		$res3=(($ans3==$right_answers[2])?1:0);
		$fio=clear_string($fio);
		$group=clear_string($group);
		$ans2=clear_string($ans2);
		$query="insert into results(id,fio,st_group,ans1,ans2,ans3,mdate,res1,res2,res3) values(0,'$fio','$group','$ans1','$ans2','$ans3',now(),'$res1' ,'$res2' ,'$res3')";

		db_query($query);
	}

	function clear_string($string)
	{
		$string=trim($string);
		$string=stripslashes($string);
		return nl2br(htmlspecialchars($string));

	}

	function db_create_blog()
	{
		$query="CREATE TABLE IF NOT EXISTS blog(id int unsigned NOT NULL auto_increment,
                                                              subject varchar(256) NOT NULL,
                                     msg text not null,
                                     mdate datetime NOT NULL, 
                                     image varchar(512) NOT NULL,primary key(id))";
		db_query($query);
	}

	function db_create_stats()
	{
		$query="CREATE TABLE IF NOT EXISTS stats(id int unsigned NOT NULL auto_increment,
                                                              mdate datetime NOT NULL,
                                     page varchar(128),
                                     ip varchar(64) NOT NULL, 
                                     host varchar(128) NOT NULL,
                                     brauz varchar(128) not null,
                                     user varchar(128) not null,
                                     primary key(id))";
		db_query($query);
	}

	function db_create_users()
	{
		$query="CREATE TABLE IF NOT EXISTS users(fio varchar(256),
                                     email varchar(128) NOT NULL, 
                                     login varchar(128) NOT NULL,
                                     password varchar(128) not null)";
		db_query($query);
	}

	function unique_login($login)
	{
		$login=mysql_real_escape_string($login);
		$query="select * from users where login='$login'";
		$res=db_query($query);
		$rows=mysql_fetch_row($res);
		if ($rows) {
			return false;
		}
		else {
			return true;
		}
	}

	function correct_user($login,$password)
	{
		$login=mysql_real_escape_string($login);
		$password=mysql_real_escape_string($password);
		$password=encrypt($password);
		$query="select * from users where login='$login' and password='$password'";
		$res=db_query($query);
		$rows=mysql_fetch_row($res);
		if ($rows) {
			return true;
		}
		else {
			return false;
		}
	}

	function is_admin($login,$password)
	{
		$file=fopen("admin/pswd.inc", "r");
		$admin_login=fgets($file);
		$admin_password=fgets($file);
		$admin_login=str_replace("\r\n", "", $admin_login);
		$admin_password=str_replace("\r\n", "", $admin_password);
		if (($login==$admin_login)&&($password==$admin_password)) {
			return true;
		}
		else {
			return false;
		}
		fclose($file);
	}

	function db_insert_user($fio,$email,$login,$password)
	{
		if (!unique_login($login)) {
			die("Not unique login");
		}
		$password=encrypt($password);
		$query="insert into users(fio,email,login,password) values('$fio','$email','$login','$password')";
		db_query($query);
	}

	function encrypt($string)
	{
		return md5($salt.$string);
	}

	function db_insert_stats($page,$ip,$host,$brauz,$user)
	{
		$query="insert into stats(id,mdate,page,ip,host,brauz,user) values(0,now(),'$page','$ip','$host','$brauz','$user')";
		db_query($query);
	}

	function db_insert_blog($subject,$msg,$image)
	{
		$query="insert into blog(id,subject,msg,mdate,image) values(0,'$subject','$msg',now(),'$image')";
		db_query($query);
	}

	function db_update_blog($id,$subject,$msg)
	{
		$msg=clear_string($msg);
		$query="update blog set subject='$subject' where id='$id'";
		db_query($query);
		$query="update blog set msg='$msg' where id='$id'";
		db_query($query);
	}

	function db_get_all_limit($start=-1,$per_page=-1,$base)
	{
		if (($start==-1)&&($per_page==-1)) {
			$query="select * from ".$base." order by mdate desc";
		}
		else{
			$query="select * from ".$base." order by mdate desc limit $start,$per_page";
		}
		
		$res=db_query($query);
		return $res;
	}

	function db_create_comments()
	{
		$query="CREATE TABLE IF NOT EXISTS comments(id int unsigned NOT NULL auto_increment,
									login varchar(128) not null,
                                     mdate datetime NOT NULL, 
                                     mark int NOT NULL,
                                     msg text not null,
                                     id_blog int unsigned not null,
                                     primary key(id))";
		db_query($query);
	}

	function db_create_query()
	{
		$query="CREATE TABLE IF NOT EXISTS query(id int unsigned NOT NULL auto_increment,
									q text not null,
                                     mdate datetime NOT NULL, 
                                     page varchar(256) NOT NULL,
                                     msg text not null,
                                     primary key(id))";
		db_query($query);	
	}

	function db_insert_query($q,$page,$msg)
	{
		$query="insert into query(q,mdate,page,msg) values('$q',now(),'$page','$msg')";
		//mysql_query($query) or die("Cannot insert");
		mysql_query($query);	
	}

	function db_insert_comments($login,$msg,$id_blog,$mark=0)
	{
		$query="insert into comments(login,mdate,mark,msg,id_blog) values('$login',now(),'$mark','$msg','$id_blog')";
		//mysql_query($query) or die("Cannot insert");
		db_query($query);
	}

	function db_update_comments($id,$new_mark)
	{
		$query="update comments set mark='$new_mark' where id='$id'";
		db_query($query);		
	}

	function db_show_comments($id_blog)
	{
		$query="select * from comments where id_blog='$id_blog' order by mdate asc";
		$res=db_query($query);
		if (!$res) {
			//die("cannot show comments");
			//return;
		}
		return $res;
	}

	
 ?>Z:/home/localhost/www/web4/edit_blog.php<br><?php 
    require_once "some_scripts/session_starting.php";
    if (!is_adm()) {
        header("Location: index.php");
    }
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

        
                $("#edit_blog_link,#admin_link").addClass("bold_link");
            });
        </script> 
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                �������� �����
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
</html>Z:/home/localhost/www/web4/foo.js<br>function tab_foto(){
	// alt=new Array(
	// 	"���� 1",
	// 	"���� 2",
	// 	"���� 3",
	// 	"���� 4",
	// 	"���� 5",
	// 	"���� 6",
	// 	"���� 7",
	// 	"���� 8",
	// 	"���� 9",
	// 	"���� 10",
	// 	"���� 11",
	// 	"���� 12",
	// 	"���� 13",
	// 	"���� 14",
	// 	"���� 15"
	// );
	
	fotos=new Array(
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
	
	// document.write("<table class=foto>");
	// for (var i=0;i<5;i++)	{
	// 	document.write("<tr>");
	// 	for (var j=0;j<3;j++){
	// 		document.write("<td>");
	// 		//document.write("<a href='graph/"+fotos[i*3+j]+".jpg'><img src='graph/"+fotos[i*3+j]+"Min.jpg' alt='"+alt[i*3+j]+"'></a>");
	// 		document.write("<a href='#'><img src='graph/"+fotos[i*3+j]+"Min.jpg' alt='"+alt[i*3+j]+"'></a>");
	// 		document.write("<p>"+alt[3*i+j]+"</p>");
	// 		document.write("</td>");
	// 	}
	// 	document.write("</tr>");		
	// }
	// document.write("</table>");	
	
	// var links=document.getElementsByTagName('a');
	var links=$("a[href='#']").get();
	// alert(links[2].getAttribute('href'));
	for (var i=0;i<links.length;i++)
	{
		//set_click(links[i],i);
		set_win(links[i],i);
	}
	// for (var i=0;i<links.length;i++)
	// {
	// 	links[i].setAttribute('href','#');		
	// }
	
}

function set_win(w,i)
{
	w.onclick=function()
	{

			if (!win)
			{
				win=new PopupWindow(200,100,'as','awewrwerew');
			}
			
			var msg="<img src='graph/"+fotos[i]+".jpg'></img>";
			win.setMessage(msg);
			win.change_width(400,460);
			win.setTitle("����������� ����������");
			win.show();

		
	}		
}

function set_click(win,i)
{
	win.onclick=function()
	{
		var mywin=window.open("graph/"+fotos[i]+".jpg","Foto","width=420,height=287");
	}
}

//onclick='window.open('"+fotos[i*3+j]+".jpg','aa','width=200, heigth=100')'

function list(type)
{
	if (type=="o")	{
		document.write("<ol>");
		for (var i=1;i<list.arguments.length;i++)	{
			document.write("<li>"+list.arguments[i]+"</li>");
		}
		document.write("</ol>");
	}
	else	{
		var anch=new Array("action","music","book");
		var tems_name=new Array("������ ��������","������ ������","������ ����");
		var tems=new Array(
			new Array("�����","������������","����������"),
			new Array("Punk-rock","Alternative rock","Pop-punk"),
			new Array("������� ����������","�������","������-���������� ����������")
			);
		document.write("<ul>");
		for (var i=0;i<3;i++)		{
			document.write("<li><a href='#"+anch[i]+"'>"+tems_name[i]+"</a></li>");
			document.write('<li style="list-style:none;">');
			list("o",tems[i][0],tems[i][1],tems[i][2]);
			document.write("</li>");
		}
		document.write("</ul>");
	}
}

function over(form)
{
	if (!win)
		win=new PopupWindow(200,100,'as','awewrwerew');
		msg="<table class='mytable'";
		msg+="<tr><th>���</th><th>���</th><th>��������</th></tr>";
		for (var i=0;i<form.length;i++)
		{
			msg+="<tr>";
			msg+="<td>"+form[i].name+"</td>";
			msg+="<td>"+form[i].type+"</td>";
			msg+="<td>"+form[i].value+"</td>";
			msg+="</tr>";
		}
		msg+="</table>";
		win.setMessage(msg);
		win.setTitle("������ �� �����");
		win.show();
}

function cont(f){
	var fio=(document.forms[0].fio.value=="");
	var mail=(document.forms[0].mail.value=="");
	var error=false;
	var msg="";
	if (fio || mail){
		var msg="������! ";
		error=true;
		if (fio){
			document.forms[0].fio.focus();
			msg+="\n���� fio �������� �������������. ";
		}
		if (mail){
			document.forms[0].mail.focus();
			msg+="\n���� mail �������� �������������. ";
		}
	}
	//�������� ������������ ��������� �������
	text=document.forms[0].fio.value;
	var cnt=0,pos=0,x;
	while ((x=text.indexOf(" ",pos))>0)	{
		//������ ����� � ����� ���������� ������, ��� �������
		if (x==text.length-1){
			error=true;
			cnt=-1;
			break;
		}		
		cnt++;
		pos=x+1;
		//��� ������� ����� ������, ��� �����������
		if (text[pos]==" "){
			error=true;
			cnt=-1;
			break;
		}		
	}
	//���� �� 3
	if (cnt!=2 && text!=""){
		msg+="\n�������� ������ ���. "
		error=true;
	}	
	//�������� ������������ mail
	var mail=document.forms[0].mail.value;
	if (mail.indexOf(" ",0)!=-1){
		msg+="\n� ���� mail ������������ �������. ";
		error=true;
	}
	x=mail.indexOf("@",0);
	if (x==-1){
		msg+="\n� ���� mail ��� ������� @. ";
		error=true;
	}
	if (x==0){
		msg+="\n� ���� mail ������ @ �� ������ �������. ";
		error=true;
	}
	point=mail.indexOf(".",x);
	var ct=0;
	for (var i=0;i<mail.length;i++){
		if (mail[i]=="@")
			ct++;
	}
	if ((point-x<=1)||(point==mail.length-1)||(ct>1)){
		msg+="\n� ���� mail ������� ����������� �����. ";
		error=true;
	}
	if (error)	{
		//alert(msg);
		if (!win)
		win=new PopupWindow(200,100,'as','awewrwerew');
		//msg="<img src='graph/001sevastopol.jpg'></img>";
		win.setMessage(msg);
		win.setTitle("������ �������� ��������. ");
		win.show();
		return;
	}	
	send();
	//f.submit();
}

function learn(f){
	//�������� �� �����-���� ���� ������
	var text=(document.forms[0].ans21.value=="");
	var fio=(document.forms[0].fio.value=="");
	var check=document.forms[0].ans11.checked==false &&
		document.forms[0].ans12.checked==false &&
		document.forms[0].ans13.checked==false &&
		document.forms[0].ans14.checked==false;
	var msg="������!";
	var error=false;
	if (text || check || fio)	{
		if (text){
			document.forms[0].ans21.focus();
			msg+="\n���� ������� ������� �������� �������������. ";
		}
		if (fio){
			document.forms[0].fio.focus();
			msg+="\n���� ��� �������� �������������. ";
		}
		if (check){
			//document.forms[0].ans11.focus();
			msg+="\n�� ������� �� ������ ������ �� ������ ������. ";
		}		
		error=true;
	}
	//�����-���� �� ������-������� ���������
	var ct=0;
	if (document.forms[0].ans11.checked)
		ct++;
	if (document.forms[0].ans12.checked)
		ct++;
	if (document.forms[0].ans13.checked)
		ct++;
	if (document.forms[0].ans14.checked)
		ct++;
	if (ct<3){
		msg+="\n����� ���� ������� �������. ";
		error=true;
	}		
	if (error)	{
		//alert(msg);
		win.setMessage(msg);
		win.setTitle("������ �������� ����. ");
		win.show();
		return;
	}	
	f.submit();
}

function send()
{
	var mywin=window.open("","Contacts","width=500,height=300");
	mywin.document.open();
	mywin.document.write("<style>td{padding-right:100px;}</style>");
	mywin.document.write("<title>�������� ������������ ��������� ������</title>");
	mywin.document.write("<table><tr><td>���</td><td>");
	mywin.document.write(document.forms["myform"].elements["fio"].value);
	mywin.document.write("</td></tr>");
	var radio_value;
	var radios=document.myform.pol;
	for (var i=0;i<radios.length;i++)
	{
		if (radios[i].checked)
			radio_value=radios[i].value;
	}
	mywin.document.write("<tr><td>���</td><td>"+radio_value+"</td></tr>");
	var list=document.myform.age;
	var list_value=list.options[list.selectedIndex].text;
	mywin.document.write("<tr><td>�������</td><td>"+list_value+"</td></tr>");
	mywin.document.write("<tr><td>����������� �����</td><td>"+document.myform.mail.value+"</td></tr>");
	mywin.document.write("<tr><td>���������</td><td>"+document.myform.msg.value+"</td></tr>");
	mywin.document.write("<tr><td> <input type='button' value='���������' onclick='window.opener.document.myform.submit();'/> </td><td> <input type='button' value='�������' onclick='window.close();'/> </td></tr>");
	mywin.document.close();
}

function mouse_coord(ev,isX)
			{
				if (isX)
					return ev.pageX;
				else
					return ev.pageY;
			}
			
			
			
			function make_property(o,name)
			{
				var value;
				o["get"+name]=function(){return value;};
				o["set"+name]=function(v){value=v;};
			}
			
			function down(div,ev)
			{
				var win_top=parseInt(div.style.top);
				var win_left=parseInt(div.style.left);
				var mouse_x=mouse_coord(ev,true);
				var mouse_y=mouse_coord(ev,false);
				var stop;
				var tx,ty;
				
				function drag(ev)
				{										
					if (!stop)
					{
						tx=mouse_coord(ev,true)+win_left-mouse_x+'px';
						ty=mouse_coord(ev,false)+win_top-mouse_y+'px';
						
						div.style.left=tx;
						div.style.top=ty;	
						document.getElementById("div2").style.left=tx;
						document.getElementById("div2").style.top=ty;
					}								
				}
								
				document.onmousemove=drag;
															
				document.onmouseup=function()
				{
					stop=1;
					document.onmousemove='';
					document.onmouseup='';
				};
	
			}
			
			PopupWindow.prototype.show=function()
			{
				this.tooltip.style.left=this.getLeft()+"px";
				this.tooltip.style.top=this.getTop()+"px";
				this.shadow.style.left=this.getLeft()+"px";
				this.shadow.style.top=this.getTop()+"px";
				this.span.innerHTML=this.getTitle();
				this.text.innerHTML=this.getMessage();
				//this.tooltip.innerHTML=this.getTitle();
				//this.content.innerHTML=this.getMessage();
				this.tooltip.style.visibility="visible";
				this.content.style.visibility="visible";
				this.shadow.style.visibility="visible";
				if (this.tooltip.parentNode!=document.body)
				{
					document.body.appendChild(this.tooltip);
					document.body.appendChild(this.shadow);
				}
				document.getElementById('div2').style.width=document.getElementById('div1').clientWidth+10+'px';
				document.getElementById('div2').style.height=document.getElementById('div1').clientHeight+10+'px';
				if (this.getTitle()=="����������� ����������")
				{
					document.getElementById('div2').style.height=382+'px';
					
				}
				//alert(document.getElementById('div2').style.height);382
			}
			
			PopupWindow.prototype.hide=function()
			{
				this.tooltip.style.visibility="hidden";
				this.shadow.style.visibility="hidden";	
				this.content.style.visibility="hidden";
				
			}
			
			PopupWindow.prototype.change_width=function(i,j)
			{
				this.tooltip.style.width=i+'px';
				this.content.style.width=j+'px';
			}
			
			function PopupWindow(top,left,title,message)
			{
				make_property(this,"Top");
				make_property(this,"Left");
				make_property(this,"Title");
				make_property(this,"Message");
				this.setTop(top);
				this.setLeft(left);
				this.setTitle(title);
				this.setMessage(message);
				
				this.tooltip=document.createElement("div");
				this.tooltip.className="win";
				this.tooltip.style.top="0";
				this.tooltip.style.left="0";
				this.tooltip.id="div1";
				this.tooltip.style.visibility="hidden";
								
				this.content=document.getElementById("div3");
				this.content.className="win2";
				this.content.style.top="0";
				this.content.style.left="0";
				//this.content.id="div3";
				this.content.style.visibility="hidden";
				
								
				this.shadow=document.createElement("div");
				this.shadow.className="shadow";
				this.shadow.style.top="0";
				this.shadow.style.left="0";
				this.shadow.style.visibility="hidden";
				this.shadow.id="div2";

				this.tooltip.appendChild(this.content);	
				
				this.text=document.createElement("span");
				this.tooltip.appendChild(this.text);
				

				this.img=document.createElement("img");
				this.img.align="right";
				this.img.src="close.png";
				this.img.onmousedown=function ()
				{
					document.getElementById('div3').style.visibility='hidden';
					document.getElementById('div1').style.visibility='hidden';
					document.getElementById('div2').style.visibility='hidden';					
				}
				this.span=document.createElement("span");
				this.content.appendChild(this.span);
				this.content.appendChild(this.img);				
			}

			var win;
			var winform;
			
			function InspectFormWindow(top,left,title,myform)
			{
				//InspectFormWindow.prototype=new PopupWindow();
				InspectFormWindow.prototype.constructor=InspectFormWindow;
				PopupWindow.call(this,top,left,title,"a");
				alert(document.getElementById("div3"));
				this.show();
			}

			
			
			
			
			
Z:/home/localhost/www/web4/foo.js<br>function tab_foto(){
	// alt=new Array(
	// 	"���� 1",
	// 	"���� 2",
	// 	"���� 3",
	// 	"���� 4",
	// 	"���� 5",
	// 	"���� 6",
	// 	"���� 7",
	// 	"���� 8",
	// 	"���� 9",
	// 	"���� 10",
	// 	"���� 11",
	// 	"���� 12",
	// 	"���� 13",
	// 	"���� 14",
	// 	"���� 15"
	// );
	
	fotos=new Array(
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
	
	// document.write("<table class=foto>");
	// for (var i=0;i<5;i++)	{
	// 	document.write("<tr>");
	// 	for (var j=0;j<3;j++){
	// 		document.write("<td>");
	// 		//document.write("<a href='graph/"+fotos[i*3+j]+".jpg'><img src='graph/"+fotos[i*3+j]+"Min.jpg' alt='"+alt[i*3+j]+"'></a>");
	// 		document.write("<a href='#'><img src='graph/"+fotos[i*3+j]+"Min.jpg' alt='"+alt[i*3+j]+"'></a>");
	// 		document.write("<p>"+alt[3*i+j]+"</p>");
	// 		document.write("</td>");
	// 	}
	// 	document.write("</tr>");		
	// }
	// document.write("</table>");	
	
	// var links=document.getElementsByTagName('a');
	var links=$("a[href='#']").get();
	// alert(links[2].getAttribute('href'));
	for (var i=0;i<links.length;i++)
	{
		//set_click(links[i],i);
		set_win(links[i],i);
	}
	// for (var i=0;i<links.length;i++)
	// {
	// 	links[i].setAttribute('href','#');		
	// }
	
}

function set_win(w,i)
{
	w.onclick=function()
	{

			if (!win)
			{
				win=new PopupWindow(200,100,'as','awewrwerew');
			}
			
			var msg="<img src='graph/"+fotos[i]+".jpg'></img>";
			win.setMessage(msg);
			win.change_width(400,460);
			win.setTitle("����������� ����������");
			win.show();

		
	}		
}

function set_click(win,i)
{
	win.onclick=function()
	{
		var mywin=window.open("graph/"+fotos[i]+".jpg","Foto","width=420,height=287");
	}
}

//onclick='window.open('"+fotos[i*3+j]+".jpg','aa','width=200, heigth=100')'

function list(type)
{
	if (type=="o")	{
		document.write("<ol>");
		for (var i=1;i<list.arguments.length;i++)	{
			document.write("<li>"+list.arguments[i]+"</li>");
		}
		document.write("</ol>");
	}
	else	{
		var anch=new Array("action","music","book");
		var tems_name=new Array("������ ��������","������ ������","������ ����");
		var tems=new Array(
			new Array("�����","������������","����������"),
			new Array("Punk-rock","Alternative rock","Pop-punk"),
			new Array("������� ����������","�������","������-���������� ����������")
			);
		document.write("<ul>");
		for (var i=0;i<3;i++)		{
			document.write("<li><a href='#"+anch[i]+"'>"+tems_name[i]+"</a></li>");
			document.write('<li style="list-style:none;">');
			list("o",tems[i][0],tems[i][1],tems[i][2]);
			document.write("</li>");
		}
		document.write("</ul>");
	}
}

function over(form)
{
	if (!win)
		win=new PopupWindow(200,100,'as','awewrwerew');
		msg="<table class='mytable'";
		msg+="<tr><th>���</th><th>���</th><th>��������</th></tr>";
		for (var i=0;i<form.length;i++)
		{
			msg+="<tr>";
			msg+="<td>"+form[i].name+"</td>";
			msg+="<td>"+form[i].type+"</td>";
			msg+="<td>"+form[i].value+"</td>";
			msg+="</tr>";
		}
		msg+="</table>";
		win.setMessage(msg);
		win.setTitle("������ �� �����");
		win.show();
}

function cont(f){
	var fio=(document.forms[0].fio.value=="");
	var mail=(document.forms[0].mail.value=="");
	var error=false;
	var msg="";
	if (fio || mail){
		var msg="������! ";
		error=true;
		if (fio){
			document.forms[0].fio.focus();
			msg+="\n���� fio �������� �������������. ";
		}
		if (mail){
			document.forms[0].mail.focus();
			msg+="\n���� mail �������� �������������. ";
		}
	}
	//�������� ������������ ��������� �������
	text=document.forms[0].fio.value;
	var cnt=0,pos=0,x;
	while ((x=text.indexOf(" ",pos))>0)	{
		//������ ����� � ����� ���������� ������, ��� �������
		if (x==text.length-1){
			error=true;
			cnt=-1;
			break;
		}		
		cnt++;
		pos=x+1;
		//��� ������� ����� ������, ��� �����������
		if (text[pos]==" "){
			error=true;
			cnt=-1;
			break;
		}		
	}
	//���� �� 3
	if (cnt!=2 && text!=""){
		msg+="\n�������� ������ ���. "
		error=true;
	}	
	//�������� ������������ mail
	var mail=document.forms[0].mail.value;
	if (mail.indexOf(" ",0)!=-1){
		msg+="\n� ���� mail ������������ �������. ";
		error=true;
	}
	x=mail.indexOf("@",0);
	if (x==-1){
		msg+="\n� ���� mail ��� ������� @. ";
		error=true;
	}
	if (x==0){
		msg+="\n� ���� mail ������ @ �� ������ �������. ";
		error=true;
	}
	point=mail.indexOf(".",x);
	var ct=0;
	for (var i=0;i<mail.length;i++){
		if (mail[i]=="@")
			ct++;
	}
	if ((point-x<=1)||(point==mail.length-1)||(ct>1)){
		msg+="\n� ���� mail ������� ����������� �����. ";
		error=true;
	}
	if (error)	{
		//alert(msg);
		if (!win)
		win=new PopupWindow(200,100,'as','awewrwerew');
		//msg="<img src='graph/001sevastopol.jpg'></img>";
		win.setMessage(msg);
		win.setTitle("������ �������� ��������. ");
		win.show();
		return;
	}	
	send();
	//f.submit();
}

function learn(f){
	//�������� �� �����-���� ���� ������
	var text=(document.forms[0].ans21.value=="");
	var fio=(document.forms[0].fio.value=="");
	var check=document.forms[0].ans11.checked==false &&
		document.forms[0].ans12.checked==false &&
		document.forms[0].ans13.checked==false &&
		document.forms[0].ans14.checked==false;
	var msg="������!";
	var error=false;
	if (text || check || fio)	{
		if (text){
			document.forms[0].ans21.focus();
			msg+="\n���� ������� ������� �������� �������������. ";
		}
		if (fio){
			document.forms[0].fio.focus();
			msg+="\n���� ��� �������� �������������. ";
		}
		if (check){
			//document.forms[0].ans11.focus();
			msg+="\n�� ������� �� ������ ������ �� ������ ������. ";
		}		
		error=true;
	}
	//�����-���� �� ������-������� ���������
	var ct=0;
	if (document.forms[0].ans11.checked)
		ct++;
	if (document.forms[0].ans12.checked)
		ct++;
	if (document.forms[0].ans13.checked)
		ct++;
	if (document.forms[0].ans14.checked)
		ct++;
	if (ct<3){
		msg+="\n����� ���� ������� �������. ";
		error=true;
	}		
	if (error)	{
		//alert(msg);
		win.setMessage(msg);
		win.setTitle("������ �������� ����. ");
		win.show();
		return;
	}	
	f.submit();
}

function send()
{
	var mywin=window.open("","Contacts","width=500,height=300");
	mywin.document.open();
	mywin.document.write("<style>td{padding-right:100px;}</style>");
	mywin.document.write("<title>�������� ������������ ��������� ������</title>");
	mywin.document.write("<table><tr><td>���</td><td>");
	mywin.document.write(document.forms["myform"].elements["fio"].value);
	mywin.document.write("</td></tr>");
	var radio_value;
	var radios=document.myform.pol;
	for (var i=0;i<radios.length;i++)
	{
		if (radios[i].checked)
			radio_value=radios[i].value;
	}
	mywin.document.write("<tr><td>���</td><td>"+radio_value+"</td></tr>");
	var list=document.myform.age;
	var list_value=list.options[list.selectedIndex].text;
	mywin.document.write("<tr><td>�������</td><td>"+list_value+"</td></tr>");
	mywin.document.write("<tr><td>����������� �����</td><td>"+document.myform.mail.value+"</td></tr>");
	mywin.document.write("<tr><td>���������</td><td>"+document.myform.msg.value+"</td></tr>");
	mywin.document.write("<tr><td> <input type='button' value='���������' onclick='window.opener.document.myform.submit();'/> </td><td> <input type='button' value='�������' onclick='window.close();'/> </td></tr>");
	mywin.document.close();
}

function mouse_coord(ev,isX)
			{
				if (isX)
					return ev.pageX;
				else
					return ev.pageY;
			}
			
			
			
			function make_property(o,name)
			{
				var value;
				o["get"+name]=function(){return value;};
				o["set"+name]=function(v){value=v;};
			}
			
			function down(div,ev)
			{
				var win_top=parseInt(div.style.top);
				var win_left=parseInt(div.style.left);
				var mouse_x=mouse_coord(ev,true);
				var mouse_y=mouse_coord(ev,false);
				var stop;
				var tx,ty;
				
				function drag(ev)
				{										
					if (!stop)
					{
						tx=mouse_coord(ev,true)+win_left-mouse_x+'px';
						ty=mouse_coord(ev,false)+win_top-mouse_y+'px';
						
						div.style.left=tx;
						div.style.top=ty;	
						document.getElementById("div2").style.left=tx;
						document.getElementById("div2").style.top=ty;
					}								
				}
								
				document.onmousemove=drag;
															
				document.onmouseup=function()
				{
					stop=1;
					document.onmousemove='';
					document.onmouseup='';
				};
	
			}
			
			PopupWindow.prototype.show=function()
			{
				this.tooltip.style.left=this.getLeft()+"px";
				this.tooltip.style.top=this.getTop()+"px";
				this.shadow.style.left=this.getLeft()+"px";
				this.shadow.style.top=this.getTop()+"px";
				this.span.innerHTML=this.getTitle();
				this.text.innerHTML=this.getMessage();
				//this.tooltip.innerHTML=this.getTitle();
				//this.content.innerHTML=this.getMessage();
				this.tooltip.style.visibility="visible";
				this.content.style.visibility="visible";
				this.shadow.style.visibility="visible";
				if (this.tooltip.parentNode!=document.body)
				{
					document.body.appendChild(this.tooltip);
					document.body.appendChild(this.shadow);
				}
				document.getElementById('div2').style.width=document.getElementById('div1').clientWidth+10+'px';
				document.getElementById('div2').style.height=document.getElementById('div1').clientHeight+10+'px';
				if (this.getTitle()=="����������� ����������")
				{
					document.getElementById('div2').style.height=382+'px';
					
				}
				//alert(document.getElementById('div2').style.height);382
			}
			
			PopupWindow.prototype.hide=function()
			{
				this.tooltip.style.visibility="hidden";
				this.shadow.style.visibility="hidden";	
				this.content.style.visibility="hidden";
				
			}
			
			PopupWindow.prototype.change_width=function(i,j)
			{
				this.tooltip.style.width=i+'px';
				this.content.style.width=j+'px';
			}
			
			function PopupWindow(top,left,title,message)
			{
				make_property(this,"Top");
				make_property(this,"Left");
				make_property(this,"Title");
				make_property(this,"Message");
				this.setTop(top);
				this.setLeft(left);
				this.setTitle(title);
				this.setMessage(message);
				
				this.tooltip=document.createElement("div");
				this.tooltip.className="win";
				this.tooltip.style.top="0";
				this.tooltip.style.left="0";
				this.tooltip.id="div1";
				this.tooltip.style.visibility="hidden";
								
				this.content=document.getElementById("div3");
				this.content.className="win2";
				this.content.style.top="0";
				this.content.style.left="0";
				//this.content.id="div3";
				this.content.style.visibility="hidden";
				
								
				this.shadow=document.createElement("div");
				this.shadow.className="shadow";
				this.shadow.style.top="0";
				this.shadow.style.left="0";
				this.shadow.style.visibility="hidden";
				this.shadow.id="div2";

				this.tooltip.appendChild(this.content);	
				
				this.text=document.createElement("span");
				this.tooltip.appendChild(this.text);
				

				this.img=document.createElement("img");
				this.img.align="right";
				this.img.src="close.png";
				this.img.onmousedown=function ()
				{
					document.getElementById('div3').style.visibility='hidden';
					document.getElementById('div1').style.visibility='hidden';
					document.getElementById('div2').style.visibility='hidden';					
				}
				this.span=document.createElement("span");
				this.content.appendChild(this.span);
				this.content.appendChild(this.img);				
			}

			var win;
			var winform;
			
			function InspectFormWindow(top,left,title,myform)
			{
				//InspectFormWindow.prototype=new PopupWindow();
				InspectFormWindow.prototype.constructor=InspectFormWindow;
				PopupWindow.call(this,top,left,title,"a");
				alert(document.getElementById("div3"));
				this.show();
			}

			
			
			
			
			
Z:/home/localhost/www/web4/foto.php<br>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
            Персональный сайт Семенова Сергея. Фотоальбом
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
		<script src="foo.js"></script>
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                Фотоальбом
            </div>
            <div id="menu_php">
                <?php 
                    include 'menu.html';
                 ?>
            </div>
			<div id="textcarrier">
			<div id="text">
            <script language="JavaScript">
				tab_foto();
			</script>
            </div>
			</div>
            <div id="footer">
                &copy;Семенов Сергей, 2012.<br>
                Пишите письма: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
            </div>
        </div> 
<div id="div3" onmousedown="down(this.parentNode,event);"></div>		
    </body>
</html>Z:/home/localhost/www/web4/fotoes.php<br><?php 
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
</html>Z:/home/localhost/www/web4/iframe_ajax.php<br><?php 
	//db_update_blog($id,$subject,$msg)
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
	require_once "database.php";
	db_connect();
	db_update_blog($_POST['blog_id'],$_POST['tema'],$_POST['update_text']);
	$id=$_POST['blog_id'];
	$query="select * from blog where id='$id'";
	$res=mysql_query($query);
	$key=mysql_fetch_row($res);
    $date=date("n",strtotime($key[3]));
    $m=$monthes[$date-1];
    $d=date("j",strtotime($key[3]));
    $y=date("Y",strtotime($key[3]));
    // echo "<div class='message_div' id='message_div_$key[0]'>";
    echo "<div class='date'>";
    echo "<strong>$d/ </strong>";
    echo "<span>$m $y</span><strong> / </strong>"."<span>".date("H:i:s",strtotime($key[3]))."</span>";
    echo "</div>";
    echo "<h3>$key[1]</h3>";
    if ($key[4]!="") {
        echo "<img src='$key[4]' alt='' class='blog_image'>";
    }                            
    echo "<div class='text'>$key[2]</div>";
    // echo "</div>";
?>Z:/home/localhost/www/web4/index.php<br><?php 
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
Z:/home/localhost/www/web4/index_ajax.php<br><?php 
	session_start();
    require_once "database.php";
    db_connect();
    if (isset($_POST['login'])&&isset($_POST['password'])) {
        $login=$_POST['login'];
        $pass=$_POST['password'];
        if (correct_user($login,$pass)) {
            $_SESSION['login']=$login;
        }
        else {
            if (is_admin($login,$pass)) {
                $_SESSION['admin']=$login;       
            }
            else {
                echo "��� ������ ������������ �/��� ������";    
            }
            
        }

    }

 ?>Z:/home/localhost/www/web4/interests.php<br><?php 
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
</html>Z:/home/localhost/www/web4/lab4.js<br>	var him1a=new Image();
	him1a.src="1a.gif";
	var him1p=new Image();
	him1p.src="1p.gif";
	var him2a=new Image();
	him2a.src="2a.gif";
	var him2p=new Image();
	him2p.src="2p.gif";
	var him3a=new Image();
	him3a.src="3a.gif";
	var him3p=new Image();
	him3p.src="3p.gif";
	var him4a=new Image();
	him4a.src="4a.gif";
	var him4p=new Image();
	him4p.src="4p.gif";
	var him5a=new Image();
	him5a.src="5a.gif";
	var him5p=new Image();
	him5p.src="5p.gif";
	var him6a=new Image();
	him6a.src="6a.gif";
	var him6p=new Image();
	him6p.src="6p.gif";
	a=new Array(him1a,him2a,him3a,him4a,him5a,him6a);
	p=new Array(him1p,him2p,him3p,him4p,him5p,him6p);

window.onload=function(){
	for (var i=1;i<=6;i++)
	{
		foo(i);
		cl(i);
	}
	dat();
}

function dat()
{
	var d=new Date();
	var i=d.getDate();
	var text=i;
	i=d.getMonth()+1;
	text+='.'+i;
	i=d.getYear();
	text+='.2012 ';
	switch (d.getDay())
	{
		case 0:
			text+="�����������";
		break;
		case 1:
			text+="�����������";
		break;
		case 2:
			text+="�������";
		break;
		case 3:
			text+="�����";
		break;
		case 4:
			text+="�������";
		break;
		case 5:
			text+="�������";
		break;
		case 6:
			text+="�������";
		break;
	}
	text+='<br/>';
	i=d.getHours()+1;
	text+=i+':';
	i=d.getMinutes()+1;
	text+=i+':';
	i=d.getSeconds()+1;
	text+=i;	
	setTimeout("dat()",1000);
	document.getElementById("date").innerHTML=text;
}

function foo(i)
{
	var im=document.getElementById('im'+i);
	im.src=p[i-1].src;
	im.onmouseover=function()
	{
		this.src=a[i-1].src;
	}
	im.onmouseout=function()
	{
		this.src=p[i-1].src;
	}
}

function cl(i)
{
	var im=document.getElementById('im'+i);
	im.onclick=function()
	{
		for (var j=1;j<=6;j++)
			if (j!=i)
			foo(j);
		im.src=a[i-1];
		im.onmouseover=function()
		{
		}
		im.onmouseout=function()
		{
		}
	}
}

Z:/home/localhost/www/web4/learn.php<br><?php 
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
</html>Z:/home/localhost/www/web4/learning.php<br>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>
			Персональная страница Семенова Сергей. Учеба
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                Учеба
            </div>
            <div id="menu_php">
                <?php 
                    include 'menu.html';
                 ?>
            </div>
			<div id="textcarrier">
            <div id="text">
				<div class="h">
				<p>Севастопольский нацинальный технический университет</p>
				<p>	Факультет: Автоматики и вычилительной техники</p>
				<p>	Кафедра: Информационных систем</p>
				</div>
				<table style="margin:0 auto;" class="my_table">
					<tr>
						<th colspan="9">План учебного процесса</th>
					</tr>
					<tr>
						<th rowspan="2">№</th>
						<th rowspan="2">Дисциплина</th>
						<th rowspan="2">Кафедра</th>
						<th colspan="6">Всего часов</th>
					</tr>
					<tr>
						<th>Всего</th>
						<th>Ауд</th>
						<th>Лк</th>
						<th>Лб</th>
						<th>Пр</th>
						<th>СРС</th>
					</tr>
					<tr>
					   <td> 1</td>
					   <td> Безопасность жизнедеятельности</td> 
					   <td> БЖ</td>
					   <td> 54</td> 
					   <td> 27</td> 
					   <td> 18</td>
					   <td> 0</td>
					   <td> 9</td>
					   <td> 27</td> 
					</tr>


					<tr>
					   <td> 2</td>
					   <td> Высшая математика</td> 
					   <td> ВМ</td>
					   <td> 540</td> 
					   <td> 282</td> 
					   <td> 141</td>
					   <td> 0</td>
					   <td> 141</td>
					   <td> 258</td> 
					</tr>


					<tr>
					   <td> 3</td>
					   <td> Инженерная графика</td> 
					   <td> НГиГ</td>
					   <td> 108</td> 
					   <td> 54</td> 
					   <td> 18</td>
					   <td> 0</td>
					   <td> 36</td>
					   <td> 54</td> 
					</tr>


					<tr>
					   <td> 4</td>
					   <td> Основы дискретной математики</td> 
					   <td> ИС</td>
					   <td> 216</td> 
					   <td> 139</td> 
					   <td> 87</td>
					   <td> 0</td>
					   <td> 52</td>
					   <td> 77</td> 
					</tr>


					<tr>
					   <td> 5</td>
					   <td> Основы программирования и <br> алгоритмические языки</td> 
					   <td> ИС</td>
					   <td> 405</td> 
					   <td> 210</td> 
					   <td> 105</td>
					   <td> 87</td>
					   <td> 18</td>
					   <td> 195</td> 
					</tr>

					<tr>
					   <td> 6</td>
					   <td> Оновы экологии</td> 
					   <td> ПЭОП</td>
					   <td> 54</td> 
					   <td> 27</td> 
					   <td> 18</td>
					   <td> 0</td>
					   <td> 9</td>
					   <td> 27</td> 
					</tr>

					<tr>
					   <td> 7</td>
					   <td> Теория вероятностей и математическая <br> статистика</td> 
					   <td> ИС</td>
					   <td> 162</td> 
					   <td> 72</td> 
					   <td> 54</td>
					   <td> 18</td>
					   <td> 0</td>
					   <td> 90</td> 
					</tr>

					<tr>
					   <td> 8</td>
					   <td> Физика</td> 
					   <td> Физика</td>
					   <td> 324</td> 
					   <td> 194</td> 
					   <td> 106</td>
					   <td> 88</td>
					   <td> 0</td>
					   <td> 130</td> 
					</tr>

					<tr>
					   <td> 9</td>
					   <td> Основы электроники и электротехники</td> 
					   <td> ИС</td>
					   <td> 108</td> 
					   <td> 72</td> 
					   <td> 36</td>
					   <td> 18</td>
					   <td> 18</td>
					   <td> 36</td> 
					</tr>

					<tr>
					   <td> 10</td>
					   <td> <a href="test.html">Численные методы в информатике</a></td> 
					   <td> ИС</td>
					   <td> 189</td> 
					   <td> 89</td> 
					   <td> 36</td>
					   <td> 36</td>
					   <td> 17</td>
					   <td> 100</td> 
					</tr>

					<tr>
					   <td> 11</td>
					   <td> Методы исследования операций</td> 
					   <td> ИС</td>
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
                &copy;Семенов Сергей, 2012.<br>
                Пишите письма: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
            </div>
        </div>            
    </body>
</html>Z:/home/localhost/www/web4/load_file.php<br><?php 
    require_once "some_scripts/session_starting.php";
    if (!is_adm()) {
        header("Location: index.php");
    }
	if (isset($_FILES['filename']['name'])) {
		copy($_FILES['filename']['tmp_name'], "messages//messages.inc");
		header ('Location: book.php');  // ��������������� �� ������ ��������
   		exit();    // ��������� ������ �������, ����� ����� � �������
    }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
			������������ �������� �������� ������. �������� �������� �����
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#load_file_link,#admin_link").addClass("bold_link");
            });
            
        </script>
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                �������� �������� �����
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
            	
               	<form action="load_file.php" method="post" class="my_form" enctype="multipart/form-data">
            		<input type="file" name="filename" id=""> <br><br>
            		<input type="submit" value="��������� ���������">
                </form>
            
        	</div>    
        <div id="footer">
                &copy;������� ������, 2012.<br>
                ������ ������: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
        </div>        
    </body>
</html>Z:/home/localhost/www/web4/main.php<br><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
			������������ �������� �������� ������. ������� ��������
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
    </head>
	<!-- <frameset cols="200, *">
		<noframes>
			<h1>��� ������� �� ������������ ������</h1>
		</noframes>
		<frame src="menu.html" noresize="noresize">
		<frame src="index.html" name="index">
	</frameset> -->
	<body>
		<?php 
			include 'menu.html';
			include 'index.html';
		 ?>

	</body>
</html>Z:/home/localhost/www/web4/project_size.php<br><?php 
	
	$start_files=array("style.css","foo.js");
	$stop_files=array("jquery-1.9.1.min.js", "jquery-1.9.0.min.js");
	$stop_folder=array("bootstrap", "buttons", "modal");
	$files=array();

	function get_files($root,&$files,$start_files)
	{
		global $stop_folder, $stop_files;
		if (count($stop_folder)>0)
		{
			foreach ($stop_folder as $fold) 
			{
				if (strpos($root, "/".$fold)!==false)
					return;
			}
		}
		$folder=opendir($root);
		while (($file=readdir($folder))!==false) {
			if (is_file($root."/".$file)) {
				$reg = preg_replace("/.*?\./", '', $file);
				if ($reg=="php" || $reg=="js") {
					if (!in_array($file, $stop_files))
					{
						$files[]=$root."/".$file;
					}
				}
				foreach ($start_files as $key=>$good) {
					if (strpos($file,$good)!==false) {
						$files[]=$root."/".$file;
						unset($start_files[$key]);
						break;		
					}
				}
				
			}
			elseif ($file!="." && $file!=".." && is_dir($root."/".$file)) {
				get_files($root."/".$file,$files,$start_files);
			}
		}
		closedir($folder);
	}

	$root=$_SERVER['DOCUMENT_ROOT'];
	//$root=$root."/".strtok($_SERVER['PHP_SELF'],"/")."<br>";
	//$root.=""
	$root.="/".strtok($_SERVER['PHP_SELF'],"/");
	get_files($root,$files,$start_files);
	echo preg_replace("/.*?\./", '', 'photo.php');
	foreach ($files as $file) {
		echo $file."<br>";
		//echo preg_replace("/.*?\./", '', $file)."<br>";
	}
	$f=fopen("all.php", "w");
	foreach ($files as $file) {
		if ((strpos($file, "all.php"))!==false) {
			continue;
		}

		$readed=fopen($file,"r");
		$text=fread($readed,filesize($file));
		$text=$file."<br>".$text;
		//echo $text;
		fclose($readed);
		fwrite($f, $text);
	}
	fclose($f);
	
 ?>Z:/home/localhost/www/web4/register.php<br><?php 
    require_once "some_scripts/session_starting.php";
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
			������������ �������� �������� ������. �����������
        </title>
        <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> -->
        <link type="text/css" rel="Stylesheet" href="style.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script src="admin/xmlhttp.js">

        </script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#book_form input").focus(function(event) {
                	$(this).css('background', '#f2efdf');
                });

                $("#book_form input").blur(function(event) {
                	$(this).css('background', '#fff');
                });

                $("#login").blur(function(event) {
                    var xhttp=new_xmlhttp();
                                        
                    xhttp.onreadystatechange=function(){
                      if (xhttp.readyState==4 && xhttp.status==200)
                         document.getElementById('ajax_message2').innerHTML=xhttp.responseText;
                      }
                   xhttp.open('POST','register_login_ajax.php',true);
                //��������� ��� ������������� ����������� ��� � ����
                   xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                   var str='login='+$(this).val();
                   xhttp.send(str);
    

                });

                $('#ajax_form').submit(function(event) {
                    $('#ajax_message2').load("register_ajax.php", { fio: $('#fio').val(), email: $('#email').val(), login: $('#login').val(), password: $('#password').val() },function(){
                        var text=$('#ajax_message2').html();
                        if ((text!="��� ����� ��� ���� � ����")&&(text!="��� ���� ������ ���� ���������")) {
                            document.location.href="index.php";
                        };
                        
                    } );
                    return false;

                });


            });
        </script> 
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                �����������                
            </div>
            <div id="menu_php">
                <?php 
                    include 'menu.html';
                 ?>
            </div>
            
            <div id="textcarrier">
                <form action="register.php" method="post" class="my_form" id="ajax_form">
            		<h2 id="send_message" style="text-align:center;">����� �����������</h2>
                    <div id="ajax_message2" style="float:none;text-align:center;height:20px;">                                
                                </div>
                	<table id="book_form" style="margin:0 auto;">
                		<tr>
                			<td>���</td>
                			<td><input type="text" name="fio" size="40" id="fio"></td>
                		</tr>
                		<tr>
                			<td>E-mail</td>
                			<td><input type="text" name="email" size="40" id="email"></td>
                		</tr>
                		<tr>
                			<td>�����</td>
                            <td><input type="text" name="login" size="40" id="login">
                            <!-- <div id="ajax_message2">
                                
                            </div> -->

                            </td>
                		</tr>
                		<tr>
                			<td>������</td>
                            <td><input type="password" name="password" size="40" id="password"></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>
                				<input type="submit" value="������������������">
                				
                			</td>
                		</tr>
	               	</table>
                </form>
            
        	</div>    
        <div id="footer">
                &copy;������� ������, 2012.<br>
                ������ ������: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
        </div>        
    </body>
</html>
Z:/home/localhost/www/web4/register_ajax.php<br><?php 
    require_once "some_scripts/session_starting.php";
	require_once "database.php";
    db_connect();
    if ((isset($_REQUEST['fio']))&&(isset($_REQUEST['email']))&&(isset($_REQUEST['login']))&& (isset($_REQUEST['password']))) {
        $fio=$_REQUEST['fio'];
        $fio=iconv("utf-8","windows-1251",$fio);
        $email=$_REQUEST['email'];
        $login=clear_string($_REQUEST['login']);
        $password=$_REQUEST['password'];
        if (($fio=="")||($email=="")||($login=="")||($password=="")) {
            echo "��� ���� ������ ���� ���������";            
        }
        else {
            db_create_users();
            $success=false;
            if (!unique_login($login)) {
                //$success=false;
                echo "��� ����� ��� ���� � ����";
            }
            else {
                db_insert_user($fio,$email,$login,$password);
                $_SESSION['login']=$login;
                $success=true;
            }    
        }
        
    }
 ?>Z:/home/localhost/www/web4/register_login_ajax.php<br><?php 
// header('Content-Type: text/html; charset=windows-1251');
	require_once "database.php";
    db_connect();
    if (isset($_POST['login'])) {
    	$login=clear_string($_POST['login']);
    	if (!unique_login($login)) {
                //$success=false;
                echo "��� ����� ��� ���� � ����";
            }
    }
 ?>Z:/home/localhost/www/web4/results.php<br><?php 
    require_once "some_scripts/session_starting.php";
    require_once "database.php";
    if (!is_autho()) {
        header("Location: index.php");
    }
 ?>

<?php 
    $right_answers=array("123","�������","21");

    function get_text_ans($res,$i)
    {
        $msg="";
        switch ($i) {
            case '1':
                if (strpos($res, "1")!==false)
                    $msg.="����� ��������<br/>";
                if (strpos($res, "2")!==false)
                    $msg.="���������� �����<br/>";
                if (strpos($res, "3")!==false)
                    $msg.="����� ������<br/>";
                if (strpos($res, "4")!==false)
                    $msg.="����� ��������<br/>";
                return $msg;
                break;
            case '2':
                if ($res=="11") {
                    $msg="������������";
                }
                elseif ($res=="12") {
                    $msg="������������";
                }
                elseif ($res=="13") {
                    $msg="�������������";
                }
                elseif ($res=="21") {
                    $msg="����������� ����";
                }
                elseif ($res=="31") {
                    $msg="��������� ������";
                }
                elseif ($res=="32") {
                    $msg="����";
                }
                elseif ($res=="33") {
                    $msg="����� �������� ������";
                }
                return $msg;
            break;
            default:
                
                break;
        }
    }

    function mysort($f1,$f2)
    {
        if (($f1[0])>($f2[0])) {
            return 1;
        }
        elseif (($f1[0])<($f2[0])) {
            return -1;
        }
        else {
            return 0;
        }
    }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
			������������ �������� �������� ������. ����������
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            
            jQuery(document).ready(function($) {
                $("#results_link").addClass("bold_link");
                $("tr").not('#head,#foot').hover(function() {
                    $(this).children().css('background', '#f2ef9a');
                }, function() {
                    $(this).children().css('background', '#f2efdf');
                });

            })

        
        </script> 
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                ����������
                <div id="user_login">
                    <?php 
                        echo $user_login;
                        echo "<br>����� ���������� ������� ".rand(0,1000)/100000;
                     ?>
                </div>
                
            </div>
            <div id="menu_php">
                <?php 
                    include 'menu.html';
                 ?>
            </div>
            
            <div id="textcarrier">
                <!-- <div id="div_table"> -->
                <?php
                    $db=db_connect();
                    $answers=db_get_all();
                    if (!$answers) {
                        echo "<div class=message>���� ������ ������� �����</div>";
                        //exit();
                    }
                    else{
                    // $all_ans=0;
                        $r_ans1=$r_ans2=$r_ans3=0;
                        $s=<<<__write
                                <table id="results_table">
                        <tr id="head">
                            <th id="top_left">���</th>
                            <th>������</th>
                            <th>������ ������</th>
                            <th>������ ������</th>
                            <th>������ ������</th>
                            <th>����</th>
                            <th id="top_right">���������</th>
                        </tr>                    
__write;
                        echo "$s";
                        // uasort($answers,"mysort");
                        $rows=@mysql_num_rows($answers);
                        for ($i=0; $i < $rows; $i++) { 
                            $key=mysql_fetch_row($answers);
                            $res=0;
                            echo "<tr>";
                            echo "<td>$key[1]</td>";
                            echo "<td>�-$key[2]</td>";
                            if ((bool)$key[7]) {
                                $t=get_text_ans($key[3],1);
                                echo "<td class='good_answer'>$t</td>";
                                $res++;
                                $r_ans1++;
                            }
                            else{
                                $t=get_text_ans($key[3],1);
                                echo "<td class='bad_answer'>$t</td>";   
                            }
                            if ((bool)$key[8]) {
                                echo "<td class='good_answer'>$key[4]</td>";
                                $res++;
                                $r_ans2++;
                            }
                            else{
                                echo "<td class='bad_answer'>$key[4]</td>";   
                            }
                            if ((bool)$key[9]) {
                                $t=get_text_ans($key[5],2);
                                echo "<td class='good_answer'>$t</td>";
                                $res++;
                                $r_ans3++;
                            }
                            else{
                                $t=get_text_ans($key[5],2);
                                echo "<td class='bad_answer'>$t</td>";   
                            }
                            echo "<td>$key[6]</td>";
                            echo "<td class='bold_link'>$res/3</td>";
                            echo "</tr>";
                        }
                        $b_ans1=$rows-$r_ans1;
                        $b_ans2=$rows-$r_ans2;
                        $b_ans3=$rows-$r_ans3;
                        if ($rows!=0) {
                            $pr_1=round(($r_ans1/$rows)*100);
                            $pr_2=round(($r_ans2/$rows)*100);
                            $pr_3=round(($r_ans3/$rows)*100);
                        }
                        $pb_1=100-$pr_1;
                        $pb_2=100-$pr_2;
                        $pb_3=100-$pr_3;
                        $s=<<<__write
                        <tr id="foot">
                            <td id="bottom" colspan="7">���������� �������(�����(%)/�������(%)/�����):<br/> 
                            ������ - <span class="good_answer">$r_ans1($pr_1%)</span>/<span class="bad_answer">$b_ans1($pb_1%)</span>/<span class="bold_link">$rows</span>    
                            <br/>������ - <span class="good_answer">$r_ans2($pr_2%)</span>/<span class="bad_answer">$b_ans2($pb_2%)</span>/<span class="bold_link">$rows</span> 
                            <br/>������ - <span class="good_answer">$r_ans3($pr_3%)</span>/<span class="bad_answer">$b_ans3($pb_3%)</span>/<span class="bold_link">$rows</span></td>
                        </tr>
                    </table>
__write;
                                echo "$s";
                    mysql_close($db);
                }
                 ?>
</div>    
        <div id="footer">
                &copy;������� ������, 2012.<br>
                ������ ������: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
        </div>        
    </body>
</html>Z:/home/localhost/www/web4/show_stats.php<br><?php 
    require_once "some_scripts/session_starting.php";
    if (!is_adm()) {
        header("Location: index.php");
    }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
            ������������ �������� �������� ������. ����������
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#stats_link,#admin_link").addClass("bold_link");
            });
        </script> 
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                ����������
                <div id="user_login">
                    <?php 
                        echo $user_login;
                        echo "<br>����� ���������� ������� ".rand(0,1000)/100000;
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
                		require_once "all_stats.php";
               	 ?>
            </div>
            <div id="footer">
                &copy;������� ������, 2012.<br>
                ������ ������: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
            </div>
        </div>            
    </body>
</html>Z:/home/localhost/www/web4/some_scripts/read_messages.php<br><?php 
            		$f=@fopen("messages/messages.inc", "r");
            		$messages=array();
            		$text=@fread($f, filesize("messages/messages.inc"));
            		if ($text) {
            			$date=strtok($text, ";");
	            		$subject=strtok(";");
	            		$fio=strtok(";");
	            		$email=strtok(";");
	            		$text=strtok(";");
	            		$messages[]=array($date,$subject,$fio,$email,$text);
            		}            		
            		while ($text) {
            			$date=strtok(";");
            			$subject=strtok(";");
            			$fio=strtok(";");
            			$email=strtok(";");
            			$text=strtok(";");
            			$messages[]=array($date,$subject,$fio,$email,$text);
            		}
            		@fclose($f);
            		foreach (array_reverse($messages) as $key) {
            			if ($key[2]!="")
            			{
            				$date=explode(".", $key[0]);
            				$m=$monthes[$date[1]-1];
            				echo "<div class='message_div'>";
	            			echo "<div class='date'>";
	            			echo "<strong>$date[0]/ </strong>";
	            			echo "<span>$m $date[2]</span>";
	            			echo "</div>";
	            			echo "<h3>$key[1]</h3>";
	            			echo "<div class='text'>$key[4]</div>";
	            			echo "<div class='author'>$key[2] ($key[3])<img src='author.png' alt=''></div> ";
	            			echo "</div>";
            			}

            		}
            	 ?>Z:/home/localhost/www/web4/some_scripts/session_starting.php<br><?php 
	session_start();
	$user_login=login();

	if (isset($_SESSION['login'])) {
		//$user_login="������������ ".$_SESSION['login'];
		$user_login=substr_replace($user_login, "������������ ", 0, 0);
	}
	elseif (isset($_SESSION['admin'])) {
		//$user_login="������������� ".$_SESSION['admin'];
		$user_login=substr_replace($user_login, "������������� ", 0, 0);
	}
	else {
		$user_login="";
	}

	function is_autho()
	{
		return ((isset($_SESSION['login']))||(isset($_SESSION['admin'])));
	}

	function is_adm()
	{
		return isset($_SESSION['admin']);
	}

	function login()
	{
		if (isset($_SESSION['login'])) {
			return $_SESSION['login'];
		}
		elseif (isset($_SESSION['admin'])) {
			return $_SESSION['admin'];
		}
		else {
			return "";
		}
	}
 ?>Z:/home/localhost/www/web4/some_scripts/write_message.php<br><?php 
	if ((isset($_POST['fio']))&&(isset($_POST['email']))&&(isset($_POST['subject']))&&(isset($_POST['message']))) {
		// $fio=htmlspecialchars($_POST['fio']);
		// $email=htmlspecialchars($_POST['email']);
		// $subject=htmlspecialchars($_POST['subject']);
		// $message=htmlspecialchars($_POST['message']);
		$fio=$_POST['fio'];
		$email=$_POST['email'];
		$subject=$_POST['subject'];
		$message=$_POST['message'];
		$date=date('d.m.Y');
		$f=@fopen("messages/messages.inc", "a+");
		// @fwrite($f, $date.";".$subject.";".iconv("utf-8", "windows-1251", "$fio").";".$email.";".$message.";");
		@fwrite($f, iconv("utf-8", "windows-1251","$date;$subject;$fio;$email;$message;"));
		@fclose($f);	
	}

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
 ?>Z:/home/localhost/www/web4/stats.php<br><?php 
	require_once "some_scripts/session_starting.php";
    require_once "database.php";
	require_once "admin/admin_pages.php";
	$db=db_connect();
	db_create_stats();
	$page=basename($_SERVER['PHP_SELF'], ".php");
	if (array_search($page, $admin_pages)===false) {
		$ip=$_SERVER['REMOTE_ADDR'];
		$host=$_SERVER['SERVER_NAME'];
		$browser = 'none';
		if ( stristr($_SERVER['HTTP_USER_AGENT'], 'Firefox') ) $browser='Firefox';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'Chrome') ) $browser='Chrome';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'Safari') ) $browser='Safari';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'Opera') ) $browser='Opera';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.0') ) $browser='Internet Explorer 6';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0') ) $browser='Internet Explorer 7';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0') ) $browser='Internet Explorer 8';
		if (!isset($_SESSION['login'])) {
			if (!isset($_SESSION['admin'])) {
				$muser="guest";	
			}
			else {
				$muser=$_SESSION['admin'];		
			}
			
		}
		else {
			$muser=$_SESSION['login'];		
		}
		db_insert_stats($page,$ip,$host,$browser,$muser);
	}
	// mysql_close($db);
 ?>Z:/home/localhost/www/web4/style.css<br>﻿html, body
{
	margin:0px;
	padding:0px;
	border:0px;
}

body 
{
	background:#999 url("bg_page.gif");
}

#header
{
	font-size:250%;	
	border-bottom:solid 5px #656f8c;
}

#carrier
{
	background:#fff;
	width:100%;
	min-width: 900px;	
}

#footer, #header
{
	background:#413659;
	color:#fff;
	padding:10px 20px;
}

#footer
{
	border-top:solid 5px #656f8c;
	font-size:80%;
	clear:both;
}

#footer a
{
	color:#fff;
}

#menucarrier
{
	float:left;
	width:200px;
	background:#fff0cc url("bg_menu.gif") center repeat-y scroll;
	margin-bottom:20px;
}

#menu
{
	border-width:0px 2px 2px 0px;
	border-style:none dotted dotted none;
	border-color:#c00;
	font-size:18px;
	padding:10px 20px;
	text-align:center;
}

#menu a
{
	background:#fff0cc;
	border:2px solid #fc9;
	text-decoration:none;
	color:#000;
}

#menu a:hover
{
	border-style:solid dotted solid dotted;
	border-width:2px;
	border-color:#c00;
}

#menu span
{
	background:#fff;
	color:#999;
	border-style:solid dotted solid dotted;
	border-width:2px;
	border-color:#c00;
}

#menu span,#menu a
{
	display:block;
	width:164px;
	margin:20px 0px;
	font-size:20px;
}

#text
{
	padding:20px;
	text-indent:1.5em;
	margin:0px;
}

#foto
{
	padding:20px;
	padding-top:0px;
}

#textcarrier
{
	margin-left:220px;
	padding-bottom: 25px;
	min-height: 600px;
}

.my_table
{
	border-collapse:collapse;
	border:2px solid #000;
}

.my_table td,.my_table th
{
	border:1px solid #000;
	padding:5px;
}

.foto
{
	margin:0 auto;
}

.foto td
{
	padding:10px;
	text-align:center;
	font-style:italic;
	margin-top:0px;
	padding-right:80px;
}

.h
{
	font-size:140%;
	text-align:center;
}

.tab td
{
	padding:10px;
	padding-right:120px;
	vertical-align:top;
}

.win{
				position:absolute;
				background:#F0E68C;
				border:3px solid #ADD8E6;
				width:300px;
				padding:40px;
				padding-top:60px;
				font:italic 12pt sans_serif;
				z-index:100;
			}
			
			.win2{
				padding:10px;
				background:yellow;
				width:360px;
				position:absolute;
				font:bold 13pt sans_serif;
			}
			
			.shadow{
			position:absolute;
			background:url('shadow.png');
			}
	.mytable td
	{
		border:1px solid black;	
	}
	
	.mytable 
	{
		border:1px solid black;	
	}

	#menu_php{
		width: 20%;
		float: left;
		margin-bottom: 10px;
	}

	#menu_php div{
		margin-top: 1px;
	}

	#menu_php a{
		display: block;
		border: 1px solid #fff;
		width: 200px;
		padding: 10px;
		background-color: #f2efdf;
		text-decoration: none;
		color: #656f8c;
		font-size: 18px;
		text-align: center;
	}

	#menu_php a:hover{
		border: 1px solid #211426;
		color: #211426;
		background: -moz-linear-gradient(top, #fefcea, #f1da36); /* Firefox 3.6+ */
	    /* Chrome 1-9, Safari 4-5 */
	    background: -webkit-gradient(linear, left top, left bottom, 
	                color-stop(0%,#fefcea), color-stop(100%,#f1da36));
	    /* Chrome 10+, Safari 5.1+ */
	    background: -webkit-linear-gradient(top, #fefcea, #f1da36);
	    background: -o-linear-gradient(top, #fefcea, #f1da36); /* Opera 11.10+ */
	    background: -ms-linear-gradient(top, #fefcea, #f1da36); /* IE10 */
	    background: linear-gradient(top, #fefcea, #f1da36); /* CSS3 */ 
	}

	#error{
		padding:0.8em;
		margin-bottom:1em;
		border:2px solid #ddd;
		background:#fbe3e4;
		color:#8a1f11;
		border-color:#fbc2c4;
	}

	.bold_link{
		font-weight: bold;
	}

	#book_form{
		margin: 15px;
	}

	#book_form td{
		vertical-align: top;
		padding: 10px;
		padding-right: 100px;
	}

	#book_form input,#book_form textarea,.my_form input{
		border-radius: 15px;
		border: 1px solid #656f8c;
		-webkit-border-radius: 15px;
		-moz-border-radius: 15px;
		padding: 10px;

	}

	#book_form textarea{
		max-width: 550px;
		max-height: 300px;
		min-height: 250px;
		min-width: 550px;
	}

	.date strong{
		font-size:20px;
		color: rgb(95, 99, 102);
	}

	.message_div{
		margin-top: 15px;
		margin-left: 40px;
		background-color: #f2efdf;
		padding: 10px;
	}

	.date span{
		color: rgb(148, 150, 151);
		font-size:12px;
	}

	.date{
		margin-top: 10px;
	}

	.message_div h3,.message_div h4{
		margin-top: 5px;	
		color: #656f8c;	
	}

	.message_div h4{
		display: inline;
	}

	.text{
		margin-top: 5px;
		padding: 0px;

	}

	.text, .author{
		font: 12px Verdana,Arial,Helvetica,sans-serif;
	}

	.author{
		text-decoration: underline;
	}

	#send_message{
		color:#413659;
		margin-top: 10px;
		margin-left: 40px;
	}

	.my_form{
		margin-top: 40px;
		margin-left: 80px;
	}

	#load{
		text-decoration: none;
	}

	/*#div_table{
		max-width: 1000px;

	}*/

	#results_table{
		/*width: 100%;*/
		/*table-layout: fixed;*/
		
		/*margin: 0 auto;
		margin-top: 40px;
		margin-bottom: 40px;*/
		margin: 40px;
		-webkit-border-radius: 20px;
    	-moz-border-radius: 20px;
        border-radius: 20px;
        border: 1px solid #fff;
        border-collapse: separate;
        border-spacing: 0px;
	}

	#results_table td,#results_table th{
		/*border: 1px solid #000;*/
		border-bottom: solid 1px #fff;
		padding: 15px;
	}

	#results_table td{
		background-color:  #f2efdf;
    	color: rgb(102, 102, 153);
    	/*color: rgb(138, 31, 17);*/
    	/*color: rgb(38, 68, 9);*/
    	/*font-weight: bold;*/
	}

	#results_table th{
		background-color:  #9bbfab;
		text-align: left;
		color: #413659;
	}

	#top_left{
		-webkit-border-top-left-radius: 20px;
	    -moz-border-radius-topleft: 20px;
	    border-top-left-radius: 20px;
	}

	#top_right{
		-webkit-border-top-right-radius: 20px;
	    -moz-border-radius-topright: 20px;
	    border-top-right-radius: 20px;
	}

	#bottom{
		-webkit-border-bottom-right-radius: 20px;
	    -moz-border-radius-bottomright: 20px;
	    border-bottom-right-radius: 20px;	
	    -webkit-border-bottom-left-radius: 20px;
	    -moz-border-radius-bottomleft: 20px;
	    border-bottom-left-radius: 20px;
	    font-style: italic;
	}

	.bad_answer{
		color:  rgb(138, 31, 17) !important;
	}

	.good_answer{
		color: rgb(38, 68, 9) !important;
	}

	.message{
		margin: 40px;
		padding: 0.8em;
		border: 2px solid rgb(221, 221, 221);
		background:rgb(255, 246, 191);
		border-color: rgb(255, 211, 36);
		color: rgb(81, 71, 33);
	}
	#blog_button{
		margin-top: 40px;
		margin-bottom: 20px;
	}

	.blog_image{
		margin: 15px;
		margin-bottom: 40px;
		border: 1px solid rgb(65, 54, 89);;
		background: #fff;
		padding: 2px;
		max-width: 600px;
		max-height: 400px;
	}

	#there{
		font-size: 28px;
		margin: 10px;
	}

	#paginate a{
		font-size: 28px;
		color: rgb(101, 111, 140);
	}

	#paginate a:hover{
		color: rgb(65, 54, 89);	
		/*font-size: 32px;*/
	}

	#paginate .current{
		/*border: 1px solid rgb(65, 54, 89);*/
		background: rgb(65, 54, 89);
		color: #fff;
		font-size: 28px;
		padding:0px 4px;
	}

	.arrow{
		vertical-align: bottom;
	}

	.submenu{
		padding: 0px;
		width: 220px;
		z-index:1000;
		visibility: hidden;
	}

	.submenu a{
		margin: 0px;
	}

	.multimenu{
		height: 40px;
	}

	.message_div .info{
		margin: 15px;
	}

	#ajax_message2{
		float:none;
		text-align:center;
		height:20px;
		padding-top:6px;
		padding-left: 15px;
		color:#8a1f11;
	}

	#authoriz{
		text-align: center;
		height: 400px;
		color: rgb(101, 111, 140);
		font-size: 18px;
	}

	.error_user{
		color:#8a1f11;
	}

	#user_login{
		float:right;
		font-size:14px;
	}

	#ajax_message3{
		height: 20px;
	}

	.comment{
		border-top: 1px solid rgb(184,184,184) ;
		/*border: 1px solid #000;*/
		width: 800px;
		min-height: 70px;
		margin-top: 30px;
		padding-bottom: 30px;
		padding-top: 5px;
		margin-left: 100px;
	}

	.comment img{
		float: left;
		margin: 5px;
		margin-top: 0px;
	}

	.nick{
		font-family: Courier, monospace;
		color: rgb(65, 54, 89);
		font-size: 20px;
		font-weight: bold;
	}

	.comment_date{
		font-style: italic;
		font-family: Arial, sans-serif;
		color: rgb(65, 54, 89);
	}

	.comment_text{
		font-family: Times, serif;
		font-size: 16px;
	}

	.add_comment{
		font:bold 13px Tahoma, Geneva, sans-serif !important;
		font-style:normal !important;
		color:rgb(101, 111, 140) !important;
		background:rgb(242, 239, 223) !important;
		border:0px solid #ffffff !important;
		/*text-shadow:0px 0px 1px #222222;*/
		box-shadow:6px 4px 5px #000000 !important;
		-moz-box-shadow:6px 4px 5px #000000 !important;
		-webkit-box-shadow:6px 4px 5px #000000 !important;
		border-radius:10px 10px 10px 10px !important;
		-moz-border-radius:10px 10px 10px 10px !important;
		-webkit-border-radius:10px 10px 10px 10px !important;
		width:240px !important;
		padding:8px 8px !important;
		cursor:pointer !important;
		margin-top:20px !important;
		margin-left: 100px !important;
}
.add_comment:active{
		cursor:pointer;
		position:relative;
		top:2px;
}

#dialog-form label,#dialog-form  input { display:block; }
#dialog-form  input.text { margin-bottom:12px; width:95%; padding: .4em; }
#dialog-form  fieldset { padding:0; border:0; margin-top:25px; }
#dialog-form  h1 { font-size: 1.2em; margin: .6em 0; }
#dialog-form  .ui-dialog .ui-state-error { padding: .3em; }
#dialog-form  .validateTips { border: 1px solid transparent; padding: 0.3em; }
#dialog-form{
	font-size: 62.5%;
}

#admin-dialog-form label,#admin-dialog-form  input { display:block; }
#admin-dialog-form  input.text { margin-bottom:12px; width:95%; padding: .4em; }
#admin-dialog-form  fieldset { padding:0; border:0; margin-top:25px; }
#admin-dialog-form  h1 { font-size: 1.2em; margin: .6em 0; }
#admin-dialog-form  .ui-dialog .ui-state-error { padding: .3em; }
#admin-dialog-form  .validateTips { border: 1px solid transparent; padding: 0.3em; }
#admin-dialog-form{
	font-size: 62.5%;
}

#dialog-form{
	/*display: none;*/
}

.mark{
	float: right;

}


Z:/home/localhost/www/web4/test/index.php<br><?php 
function fit($var)
{
	if ($var%2==0) 
	{
		return true;
	}
	else
	{
		return false;
	}
}

function ech($s)
{
	echo "Hello $s";
}

// $a=range(1,20);
// $a=array_merge($a,range(10,15));
// print_r($a);
// $a=array_filter($a,"fit");
// print_r($a);
// print_r($a);
// print_r(array_count_values($a));
// $b=array();
// $b=array_pad($b, 10, 0);
// echo "<br>";
// print_r($b);
// echo "<br>";
// $c=range(1,100);
// print_r($c);
// echo "<br>";
// print_r(array_slice($c, 10,10));
$s="first second third";
echo strrev($s)."<br>";
echo join(" ", array_map("strrev",explode(" ", $s)));
echo __FILE__;
 ?>Z:/home/localhost/www/web4/test.php<br><?php 
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