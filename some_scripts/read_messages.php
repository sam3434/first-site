<?php 
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
            	 ?>