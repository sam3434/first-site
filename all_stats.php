<?php 
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
                        echo "<div class=message>Статистика пуста</div>";
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
                            echo "<h4>Страница</h4>&#09;-&#09;$key[2]<br> ";
                            echo "<h4>IP-адрес</h4>&#09;-&#09;$key[3]<br> ";
                            echo "<h4>Имя хоста</h4>&#09;-&#09;$key[4]<br> ";
                            echo "<h4>Браузер</h4>&#09;-&#09;$key[5]<br> ";
                            echo "<h4>Логин пользователя</h4>&#09;-&#09;$key[6]<br> ";
                            echo "</div>";
                            
                            echo "</div>";
                        }
                        

                    }

                require_once "blog/paginate.php"
                 ?> 