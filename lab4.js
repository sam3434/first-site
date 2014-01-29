	var him1a=new Image();
	him1a.src="1a.gif";
	var him1p=new Image();
	him1p.src="1p.gif";
	var him2a=new Image();
	him2a.src="2a.gif";
	var him2p=new Image();
	him2p.src="2p.gif";
	var him3a=new Image();
	him3a.src="3a.gif";
	var him3p=new Image();
	him3p.src="3p.gif";
	var him4a=new Image();
	him4a.src="4a.gif";
	var him4p=new Image();
	him4p.src="4p.gif";
	var him5a=new Image();
	him5a.src="5a.gif";
	var him5p=new Image();
	him5p.src="5p.gif";
	var him6a=new Image();
	him6a.src="6a.gif";
	var him6p=new Image();
	him6p.src="6p.gif";
	a=new Array(him1a,him2a,him3a,him4a,him5a,him6a);
	p=new Array(him1p,him2p,him3p,him4p,him5p,him6p);

window.onload=function(){
	for (var i=1;i<=6;i++)
	{
		foo(i);
		cl(i);
	}
	dat();
}

function dat()
{
	var d=new Date();
	var i=d.getDate();
	var text=i;
	i=d.getMonth()+1;
	text+='.'+i;
	i=d.getYear();
	text+='.2012 ';
	switch (d.getDay())
	{
		case 0:
			text+="Воскресенье";
		break;
		case 1:
			text+="Понедельник";
		break;
		case 2:
			text+="Вторник";
		break;
		case 3:
			text+="Среда";
		break;
		case 4:
			text+="Четверг";
		break;
		case 5:
			text+="Пятница";
		break;
		case 6:
			text+="Суббота";
		break;
	}
	text+='<br/>';
	i=d.getHours()+1;
	text+=i+':';
	i=d.getMinutes()+1;
	text+=i+':';
	i=d.getSeconds()+1;
	text+=i;	
	setTimeout("dat()",1000);
	document.getElementById("date").innerHTML=text;
}

function foo(i)
{
	var im=document.getElementById('im'+i);
	im.src=p[i-1].src;
	im.onmouseover=function()
	{
		this.src=a[i-1].src;
	}
	im.onmouseout=function()
	{
		this.src=p[i-1].src;
	}
}

function cl(i)
{
	var im=document.getElementById('im'+i);
	im.onclick=function()
	{
		for (var j=1;j<=6;j++)
			if (j!=i)
			foo(j);
		im.src=a[i-1];
		im.onmouseover=function()
		{
		}
		im.onmouseout=function()
		{
		}
	}
}

