<?php 
	//db_update_blog($id,$subject,$msg)
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
?>