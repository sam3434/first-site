<?php
if (isset ($_REQUEST['text']))
	
echo "<form method='post'>";
for ($i=0; $i<5; $i++)
	echo "<input type='checkbox' onClick='test()'></input>";
echo "</form>";
?>

<script type="text/javascript">

function test()
{
var d = new Array();
j=0;
var b = document.GetElementsByTagName('input');
for (var i=0; i<b.length(); i++)
	if  (b[i].type='checkbox')
		if (b[i].value=true)
			{
			d[j]=1;
			j++;
			}
		else
			{
			d[j]=0;
			j++;
			}
addscript(d);
}


function addscript(x)
{
var b = document.createElement('script');
b.type='text/javascript';
b.src='<?=$_SERVER["PHP_SELF"]?>?text='+x;
document.body.appendChild(b);
}

</script>
