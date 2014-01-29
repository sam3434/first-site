<?php 
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