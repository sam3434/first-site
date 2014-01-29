<?php 
	
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
 ?>