<?php 
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
</html>