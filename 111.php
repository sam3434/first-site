<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
define (number, 5);

// if (isset ($_REQUEST['text']))
// {
// 	$mystr=$_REQUEST['text'];
// 	$exnum=0;
// 	for ($b=strlen($_REQUEST['text']); $b>=0; $b--)
// 	if ($mystr[$b]=='1')
// 	$exnum+=pow(2,$b);
// 	echo $exnum;
// }	
echo "<form method='post'>";
for ($i=0; $i<number; $i++)
	echo "<input type='checkbox' onClick='test()' />";
echo "</form>";
?>	

</body>

<script type="text/javascript">
function test()
{

var d = new Array();
j=0;
var s="";

var b = document.getElementsByTagName('input');

for (var i=0; i<b.length; i++)
{
	if  (b[i].type='checkbox')
		if (b[i].checked==true)
			{
				//d[j]=1;
				s+="1";
				j++;
			}
		else
			{
				//d[j]=0;
				s+="0";
				j++;
			}
		}
		//alert(s)
		xhttp=new XMLHttpRequest();
	   xhttp.onreadystatechange=function(){
	      if (xhttp.readyState==4 && xhttp.status==200)
	         //document.getElementById('ajax').innerHTML=xhttp.responseText;
	     alert(xhttp.responseText)
	      }
	   xhttp.open('POST','222.php',true);
	//Установим тип передаваемого содержимого как у форм
	   xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	   //var str='x='+x;
	   xhttp.send('text='+s);

//addscript(d);
}


function addscript(x)
{
var b = document.createElement('script');
b.type='text/javascript';
//b.src='<?=$_SERVER["PHP_SELF"]?>?text='+x.toString();
b.src='222.php'+x.toString();
document.body.appendChild(b);

}

</script>
</html>



