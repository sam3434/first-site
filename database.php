<?php 
	require_once "classes.php";
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
	$server="localhost";
	$user="root";
	$password="";
	$db_name="publications";
	$salt="#gd%62*";

	$mdb=new mysql_db($server,$user,$password,$db_name);

	$right_answers=array("123","Краммер","21");

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

	
 ?>