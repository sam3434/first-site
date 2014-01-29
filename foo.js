function tab_foto(){
	// alt=new Array(
	// 	"Фото 1",
	// 	"Фото 2",
	// 	"Фото 3",
	// 	"Фото 4",
	// 	"Фото 5",
	// 	"Фото 6",
	// 	"Фото 7",
	// 	"Фото 8",
	// 	"Фото 9",
	// 	"Фото 10",
	// 	"Фото 11",
	// 	"Фото 12",
	// 	"Фото 13",
	// 	"Фото 14",
	// 	"Фото 15"
	// );
	
	fotos=new Array(
		"001sevastopol",
		"005GrafPristan",
		"007PamNaximovu",
		"00000703",
		"balaklava",
		"chufut-kale",
		"foto_43(VladXers)",
		"GrotPuchkina",
		"hcolon",
		"Hersones",
		"hersonm",
		"krepChe",
		"massan01",
		"PamZatKor",
		"park3"
	);
	
	// document.write("<table class=foto>");
	// for (var i=0;i<5;i++)	{
	// 	document.write("<tr>");
	// 	for (var j=0;j<3;j++){
	// 		document.write("<td>");
	// 		//document.write("<a href='graph/"+fotos[i*3+j]+".jpg'><img src='graph/"+fotos[i*3+j]+"Min.jpg' alt='"+alt[i*3+j]+"'></a>");
	// 		document.write("<a href='#'><img src='graph/"+fotos[i*3+j]+"Min.jpg' alt='"+alt[i*3+j]+"'></a>");
	// 		document.write("<p>"+alt[3*i+j]+"</p>");
	// 		document.write("</td>");
	// 	}
	// 	document.write("</tr>");		
	// }
	// document.write("</table>");	
	
	// var links=document.getElementsByTagName('a');
	var links=$("a[href='#']").get();
	// alert(links[2].getAttribute('href'));
	for (var i=0;i<links.length;i++)
	{
		//set_click(links[i],i);
		set_win(links[i],i);
	}
	// for (var i=0;i<links.length;i++)
	// {
	// 	links[i].setAttribute('href','#');		
	// }
	
}

function set_win(w,i)
{
	w.onclick=function()
	{

			if (!win)
			{
				win=new PopupWindow(200,100,'as','awewrwerew');
			}
			
			var msg="<img src='graph/"+fotos[i]+".jpg'></img>";
			win.setMessage(msg);
			win.change_width(400,460);
			win.setTitle("Увеличенная фотография");
			win.show();

		
	}		
}

function set_click(win,i)
{
	win.onclick=function()
	{
		var mywin=window.open("graph/"+fotos[i]+".jpg","Foto","width=420,height=287");
	}
}

//onclick='window.open('"+fotos[i*3+j]+".jpg','aa','width=200, heigth=100')'

function list(type)
{
	if (type=="o")	{
		document.write("<ol>");
		for (var i=1;i<list.arguments.length;i++)	{
			document.write("<li>"+list.arguments[i]+"</li>");
		}
		document.write("</ol>");
	}
	else	{
		var anch=new Array("action","music","book");
		var tems_name=new Array("Список сериалов","Список музыки","Список книг");
		var tems=new Array(
			new Array("Драма","Криминальные","Фантастика"),
			new Array("Punk-rock","Alternative rock","Pop-punk"),
			new Array("Научная фантастика","Фентези","Научно-популярная литература")
			);
		document.write("<ul>");
		for (var i=0;i<3;i++)		{
			document.write("<li><a href='#"+anch[i]+"'>"+tems_name[i]+"</a></li>");
			document.write('<li style="list-style:none;">');
			list("o",tems[i][0],tems[i][1],tems[i][2]);
			document.write("</li>");
		}
		document.write("</ul>");
	}
}

function over(form)
{
	if (!win)
		win=new PopupWindow(200,100,'as','awewrwerew');
		msg="<table class='mytable'";
		msg+="<tr><th>Имя</th><th>Тип</th><th>Значение</th></tr>";
		for (var i=0;i<form.length;i++)
		{
			msg+="<tr>";
			msg+="<td>"+form[i].name+"</td>";
			msg+="<td>"+form[i].type+"</td>";
			msg+="<td>"+form[i].value+"</td>";
			msg+="</tr>";
		}
		msg+="</table>";
		win.setMessage(msg);
		win.setTitle("Данные по форме");
		win.show();
}

function cont(f){
	var fio=(document.forms[0].fio.value=="");
	var mail=(document.forms[0].mail.value=="");
	var error=false;
	var msg="";
	if (fio || mail){
		var msg="Ошибка! ";
		error=true;
		if (fio){
			document.forms[0].fio.focus();
			msg+="\nПоле fio осталось незаполненным. ";
		}
		if (mail){
			document.forms[0].mail.focus();
			msg+="\nПоле mail осталось незаполненным. ";
		}
	}
	//проверка корректности введенной фамилии
	text=document.forms[0].fio.value;
	var cnt=0,pos=0,x;
	while ((x=text.indexOf(" ",pos))>0)	{
		//пробел стоит в конце введенного текста, что неверно
		if (x==text.length-1){
			error=true;
			cnt=-1;
			break;
		}		
		cnt++;
		pos=x+1;
		//два пробела стоят подряд, что неправильно
		if (text[pos]==" "){
			error=true;
			cnt=-1;
			break;
		}		
	}
	//слов не 3
	if (cnt!=2 && text!=""){
		msg+="\nНеверный формат ФИО. "
		error=true;
	}	
	//проверка корректности mail
	var mail=document.forms[0].mail.value;
	if (mail.indexOf(" ",0)!=-1){
		msg+="\nВ поле mail присутствуют пробелы. ";
		error=true;
	}
	x=mail.indexOf("@",0);
	if (x==-1){
		msg+="\nВ поле mail нет символа @. ";
		error=true;
	}
	if (x==0){
		msg+="\nВ поле mail символ @ на первой позиции. ";
		error=true;
	}
	point=mail.indexOf(".",x);
	var ct=0;
	for (var i=0;i<mail.length;i++){
		if (mail[i]=="@")
			ct++;
	}
	if ((point-x<=1)||(point==mail.length-1)||(ct>1)){
		msg+="\nВ поле mail неверно расположена точка. ";
		error=true;
	}
	if (error)	{
		//alert(msg);
		if (!win)
		win=new PopupWindow(200,100,'as','awewrwerew');
		//msg="<img src='graph/001sevastopol.jpg'></img>";
		win.setMessage(msg);
		win.setTitle("Ошибка страницы Контакты. ");
		win.show();
		return;
	}	
	send();
	//f.submit();
}

function learn(f){
	//Является ли какое-либо поле пустым
	var text=(document.forms[0].ans21.value=="");
	var fio=(document.forms[0].fio.value=="");
	var check=document.forms[0].ans11.checked==false &&
		document.forms[0].ans12.checked==false &&
		document.forms[0].ans13.checked==false &&
		document.forms[0].ans14.checked==false;
	var msg="Ошибка!";
	var error=false;
	if (text || check || fio)	{
		if (text){
			document.forms[0].ans21.focus();
			msg+="\nПоле второго вопроса осталось незаполненным. ";
		}
		if (fio){
			document.forms[0].fio.focus();
			msg+="\nПоле ФИО осталось незаполненным. ";
		}
		if (check){
			//document.forms[0].ans11.focus();
			msg+="\nНе выбрано ни одного ответа на первый вопрос. ";
		}		
		error=true;
	}
	//какая-либо из ошибок-выводим сообшение
	var ct=0;
	if (document.forms[0].ans11.checked)
		ct++;
	if (document.forms[0].ans12.checked)
		ct++;
	if (document.forms[0].ans13.checked)
		ct++;
	if (document.forms[0].ans14.checked)
		ct++;
	if (ct<3){
		msg+="\nМенее трех ответов выбрано. ";
		error=true;
	}		
	if (error)	{
		//alert(msg);
		win.setMessage(msg);
		win.setTitle("Ошибка страницы Тест. ");
		win.show();
		return;
	}	
	f.submit();
}

function send()
{
	var mywin=window.open("","Contacts","width=500,height=300");
	mywin.document.open();
	mywin.document.write("<style>td{padding-right:100px;}</style>");
	mywin.document.write("<title>Проверка правильности введенных данных</title>");
	mywin.document.write("<table><tr><td>ФИО</td><td>");
	mywin.document.write(document.forms["myform"].elements["fio"].value);
	mywin.document.write("</td></tr>");
	var radio_value;
	var radios=document.myform.pol;
	for (var i=0;i<radios.length;i++)
	{
		if (radios[i].checked)
			radio_value=radios[i].value;
	}
	mywin.document.write("<tr><td>Пол</td><td>"+radio_value+"</td></tr>");
	var list=document.myform.age;
	var list_value=list.options[list.selectedIndex].text;
	mywin.document.write("<tr><td>Возраст</td><td>"+list_value+"</td></tr>");
	mywin.document.write("<tr><td>Электронная почта</td><td>"+document.myform.mail.value+"</td></tr>");
	mywin.document.write("<tr><td>Сообщение</td><td>"+document.myform.msg.value+"</td></tr>");
	mywin.document.write("<tr><td> <input type='button' value='Отправить' onclick='window.opener.document.myform.submit();'/> </td><td> <input type='button' value='Закрыть' onclick='window.close();'/> </td></tr>");
	mywin.document.close();
}

function mouse_coord(ev,isX)
			{
				if (isX)
					return ev.pageX;
				else
					return ev.pageY;
			}
			
			
			
			function make_property(o,name)
			{
				var value;
				o["get"+name]=function(){return value;};
				o["set"+name]=function(v){value=v;};
			}
			
			function down(div,ev)
			{
				var win_top=parseInt(div.style.top);
				var win_left=parseInt(div.style.left);
				var mouse_x=mouse_coord(ev,true);
				var mouse_y=mouse_coord(ev,false);
				var stop;
				var tx,ty;
				
				function drag(ev)
				{										
					if (!stop)
					{
						tx=mouse_coord(ev,true)+win_left-mouse_x+'px';
						ty=mouse_coord(ev,false)+win_top-mouse_y+'px';
						
						div.style.left=tx;
						div.style.top=ty;	
						document.getElementById("div2").style.left=tx;
						document.getElementById("div2").style.top=ty;
					}								
				}
								
				document.onmousemove=drag;
															
				document.onmouseup=function()
				{
					stop=1;
					document.onmousemove='';
					document.onmouseup='';
				};
	
			}
			
			PopupWindow.prototype.show=function()
			{
				this.tooltip.style.left=this.getLeft()+"px";
				this.tooltip.style.top=this.getTop()+"px";
				this.shadow.style.left=this.getLeft()+"px";
				this.shadow.style.top=this.getTop()+"px";
				this.span.innerHTML=this.getTitle();
				this.text.innerHTML=this.getMessage();
				//this.tooltip.innerHTML=this.getTitle();
				//this.content.innerHTML=this.getMessage();
				this.tooltip.style.visibility="visible";
				this.content.style.visibility="visible";
				this.shadow.style.visibility="visible";
				if (this.tooltip.parentNode!=document.body)
				{
					document.body.appendChild(this.tooltip);
					document.body.appendChild(this.shadow);
				}
				document.getElementById('div2').style.width=document.getElementById('div1').clientWidth+10+'px';
				document.getElementById('div2').style.height=document.getElementById('div1').clientHeight+10+'px';
				if (this.getTitle()=="Увеличенная фотография")
				{
					document.getElementById('div2').style.height=382+'px';
					
				}
				//alert(document.getElementById('div2').style.height);382
			}
			
			PopupWindow.prototype.hide=function()
			{
				this.tooltip.style.visibility="hidden";
				this.shadow.style.visibility="hidden";	
				this.content.style.visibility="hidden";
				
			}
			
			PopupWindow.prototype.change_width=function(i,j)
			{
				this.tooltip.style.width=i+'px';
				this.content.style.width=j+'px';
			}
			
			function PopupWindow(top,left,title,message)
			{
				make_property(this,"Top");
				make_property(this,"Left");
				make_property(this,"Title");
				make_property(this,"Message");
				this.setTop(top);
				this.setLeft(left);
				this.setTitle(title);
				this.setMessage(message);
				
				this.tooltip=document.createElement("div");
				this.tooltip.className="win";
				this.tooltip.style.top="0";
				this.tooltip.style.left="0";
				this.tooltip.id="div1";
				this.tooltip.style.visibility="hidden";
								
				this.content=document.getElementById("div3");
				this.content.className="win2";
				this.content.style.top="0";
				this.content.style.left="0";
				//this.content.id="div3";
				this.content.style.visibility="hidden";
				
								
				this.shadow=document.createElement("div");
				this.shadow.className="shadow";
				this.shadow.style.top="0";
				this.shadow.style.left="0";
				this.shadow.style.visibility="hidden";
				this.shadow.id="div2";

				this.tooltip.appendChild(this.content);	
				
				this.text=document.createElement("span");
				this.tooltip.appendChild(this.text);
				

				this.img=document.createElement("img");
				this.img.align="right";
				this.img.src="close.png";
				this.img.onmousedown=function ()
				{
					document.getElementById('div3').style.visibility='hidden';
					document.getElementById('div1').style.visibility='hidden';
					document.getElementById('div2').style.visibility='hidden';					
				}
				this.span=document.createElement("span");
				this.content.appendChild(this.span);
				this.content.appendChild(this.img);				
			}

			var win;
			var winform;
			
			function InspectFormWindow(top,left,title,myform)
			{
				//InspectFormWindow.prototype=new PopupWindow();
				InspectFormWindow.prototype.constructor=InspectFormWindow;
				PopupWindow.call(this,top,left,title,"a");
				alert(document.getElementById("div3"));
				this.show();
			}

			
			
			
			
			
