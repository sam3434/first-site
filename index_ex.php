<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		input{
			margin-bottom: 20px;
		}
		img{
			/*margin: 40px;
			margin-bottom: 0px;*/
			padding: 5px;
		}

		.arrow{
			margin-top: 30px;
			cursor:pointer;
		}

		span{
			position: relative;
			bottom: 15px;
		}
	</style>
	<script type="text/javascript" src="jquery-1.9.0.min.js">

	</script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			var _n = 6;
			$('#go').click(function (e) {
				//alert(1)
				
				$.getJSON("ajax_ex.php", {n: _n}, function(o){
					//
					images = new Array(o.length);
					index = 0;
					for (var i = 0; i < images.length; i++) {
					    images[i] = new Image();
					    images[i].src = "foto/"+o[i];
					}
					document.getElementById("imggo").src = images[0].src;
					document.getElementById("imggo").style.border = "#000 1px solid";
					$('#text').html("‘ото 1 из "+_n);

				});
			});

			$('#left').click(function (e) {
				if (index>0)
					index--;
				document.getElementById("imggo").src = images[index].src;
				$('#text').html("‘ото "+(index+1)+" из "+images.length);

			});

			$('#right').click(function (e) {
				if (index<images.length)
					index++;
				//alert(index)
				document.getElementById("imggo").src = images[index].src;
				$('#text').html("‘ото "+(index+1)+" из "+images.length);

			});
		});


	</script>
	<?php 
		$server = "localhost";
		$user = "root";
		$pass = "";
		$s = mysql_connect($server, $user, $pass);

		// $query = "create database ex";
		// mysql_query($query);
		// echo mysql_error();
		mysql_select_db("ex");

		// $query = "CREATE TABLE IF NOT EXISTS foto(
		// 			id int unsigned NOT NULL auto_increment, 
		// 			name varchar(256),
		// 			decl varchar(256),
		// 			file_name varchar(256),
		// 			date_beg datetime,
		// 			primary key(id)) engine=myisam";
		
		// $query = "INSERT INTO foto(name, decl, file_name, date_beg) 
		// 				values('1', '1', '001sevastopolMin.jpg', now())";
		// mysql_query($query);

		// $query = "INSERT INTO foto(name, decl, file_name, date_beg) 
		// 				values('2', '2', '005GrafPristanMin.jpg', now())";
		// mysql_query($query);

		// $query = "INSERT INTO foto(name, decl, file_name, date_beg) 
		// 				values('3', '3', '007PamNaximovuMin.jpg', now())";
		// mysql_query($query);

		// $query = "INSERT INTO foto(name, decl, file_name, date_beg) 
		// 				values('4', '4', '00000703Min.jpg', now())";
		// mysql_query($query);

		// $query = "INSERT INTO foto(name, decl, file_name, date_beg) 
		// 				values('5', '5', '1360095524GrotPuchkinaMin.jpg', now())";
		// mysql_query($query);

		// $query = "INSERT INTO foto(name, decl, file_name, date_beg) 
		// 				values('6', '6', '1360095648hersonmMin.jpg', now())";
		// mysql_query($query);

		// $query = "INSERT INTO foto(name, decl, file_name, date_beg) 
		// 				values('7', '7', '1360096032001sevastopolMin.jpg', now())";
		// mysql_query($query);
		
		//echo mysql_error();
		$n = 5;


	 ?>
</head>
<body>
	<input type="button" value="Go" id="go"> <br>
	<div>
	<img src="" alt="" id="imggo"> <br>
	<img src="icons/arrow_left.png" alt="" class="arrow" id="left">
	<span id="text"></span>
	<img src="icons/arrow_right.png" alt="" class="arrow" id="right">
	</div>

</body>
</html>