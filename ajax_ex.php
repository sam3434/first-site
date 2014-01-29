<?php 
	if (isset($_GET['n']))
	{
		$n = intval($_GET['n']);
		$server = "localhost";
		$user = "root";
		$pass = "";
		$s = mysql_connect($server, $user, $pass);
		mysql_select_db("ex");
		$query = "select * from foto order by date_beg limit $n";
		$res = mysql_query($query);
		$ar = array();
		while ($row=mysql_fetch_assoc($res))
		{
			$ar[] = $row['file_name'];
		}
		echo json_encode($ar);
	}
 ?>