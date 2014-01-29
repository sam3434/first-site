<?php 
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
	// 	"Января",
	// 	"Февраля",
	// 	"Марта",
	// 	"Апреля",
	// 	"Мая",
	// 	"Июня",
	// 	"Июля",
	// 	"Августа",
	// 	"Сентября",
	// 	"Октября",
	// 	"Ноября",
	// 	"Декабря"
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
 ?>