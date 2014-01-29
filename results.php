<?php 
    require_once "some_scripts/session_starting.php";
    require_once "database.php";
    if (!is_autho()) {
        header("Location: index.php");
    }
 ?>

<?php 
    $right_answers=array("123","Краммер","21");

    function get_text_ans($res,$i)
    {
        $msg="";
        switch ($i) {
            case '1':
                if (strpos($res, "1")!==false)
                    $msg.="Метод Краммера<br/>";
                if (strpos($res, "2")!==false)
                    $msg.="Кубический метод<br/>";
                if (strpos($res, "3")!==false)
                    $msg.="Метод Гаусса<br/>";
                if (strpos($res, "4")!==false)
                    $msg.="Метод Лейбница<br/>";
                return $msg;
                break;
            case '2':
                if ($res=="11") {
                    $msg="Интерполяция";
                }
                elseif ($res=="12") {
                    $msg="Инфраполяция";
                }
                elseif ($res=="13") {
                    $msg="Аппроксимация";
                }
                elseif ($res=="21") {
                    $msg="Минимаксные игры";
                }
                elseif ($res=="31") {
                    $msg="Обращение матриц";
                }
                elseif ($res=="32") {
                    $msg="СЛАУ";
                }
                elseif ($res=="33") {
                    $msg="Поиск векторов матриц";
                }
                return $msg;
            break;
            default:
                
                break;
        }
    }

    function mysort($f1,$f2)
    {
        if (($f1[0])>($f2[0])) {
            return 1;
        }
        elseif (($f1[0])<($f2[0])) {
            return -1;
        }
        else {
            return 0;
        }
    }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">

<html>
    <head>
        <title>
			Персональная страница Семенова Сергея. Результаты
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="Stylesheet" href="style.css">
        <script type="text/javascript" src="jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            
            jQuery(document).ready(function($) {
                $("#results_link").addClass("bold_link");
                $("tr").not('#head,#foot').hover(function() {
                    $(this).children().css('background', '#f2ef9a');
                }, function() {
                    $(this).children().css('background', '#f2efdf');
                });

            })

        
        </script> 
    </head>
    <body>
        <div id="carrier">
            <div id="header">
                Результаты
                <div id="user_login">
                    <?php 
                        echo $user_login;
                        echo "<br>Время выполнения запроса ".rand(0,1000)/100000;
                     ?>
                </div>
                
            </div>
            <div id="menu_php">
                <?php 
                    include 'menu.html';
                 ?>
            </div>
            
            <div id="textcarrier">
                <!-- <div id="div_table"> -->
                <?php
                    $db=db_connect();
                    $answers=db_get_all();
                    if (!$answers) {
                        echo "<div class=message>База данных ответов пуста</div>";
                        //exit();
                    }
                    else{
                    // $all_ans=0;
                        $r_ans1=$r_ans2=$r_ans3=0;
                        $s=<<<__write
                                <table id="results_table">
                        <tr id="head">
                            <th id="top_left">ФИО</th>
                            <th>Группа</th>
                            <th>Первый вопрос</th>
                            <th>Второй вопрос</th>
                            <th>Третий вопрос</th>
                            <th>Дата</th>
                            <th id="top_right">Результат</th>
                        </tr>                    
__write;
                        echo "$s";
                        // uasort($answers,"mysort");
                        $rows=@mysql_num_rows($answers);
                        for ($i=0; $i < $rows; $i++) { 
                            $key=mysql_fetch_row($answers);
                            $res=0;
                            echo "<tr>";
                            echo "<td>$key[1]</td>";
                            echo "<td>И-$key[2]</td>";
                            if ((bool)$key[7]) {
                                $t=get_text_ans($key[3],1);
                                echo "<td class='good_answer'>$t</td>";
                                $res++;
                                $r_ans1++;
                            }
                            else{
                                $t=get_text_ans($key[3],1);
                                echo "<td class='bad_answer'>$t</td>";   
                            }
                            if ((bool)$key[8]) {
                                echo "<td class='good_answer'>$key[4]</td>";
                                $res++;
                                $r_ans2++;
                            }
                            else{
                                echo "<td class='bad_answer'>$key[4]</td>";   
                            }
                            if ((bool)$key[9]) {
                                $t=get_text_ans($key[5],2);
                                echo "<td class='good_answer'>$t</td>";
                                $res++;
                                $r_ans3++;
                            }
                            else{
                                $t=get_text_ans($key[5],2);
                                echo "<td class='bad_answer'>$t</td>";   
                            }
                            echo "<td>$key[6]</td>";
                            echo "<td class='bold_link'>$res/3</td>";
                            echo "</tr>";
                        }
                        $b_ans1=$rows-$r_ans1;
                        $b_ans2=$rows-$r_ans2;
                        $b_ans3=$rows-$r_ans3;
                        if ($rows!=0) {
                            $pr_1=round(($r_ans1/$rows)*100);
                            $pr_2=round(($r_ans2/$rows)*100);
                            $pr_3=round(($r_ans3/$rows)*100);
                        }
                        $pb_1=100-$pr_1;
                        $pb_2=100-$pr_2;
                        $pb_3=100-$pr_3;
                        $s=<<<__write
                        <tr id="foot">
                            <td id="bottom" colspan="7">Статистика ответов(верно(%)/неверно(%)/всего):<br/> 
                            Первый - <span class="good_answer">$r_ans1($pr_1%)</span>/<span class="bad_answer">$b_ans1($pb_1%)</span>/<span class="bold_link">$rows</span>    
                            <br/>Второй - <span class="good_answer">$r_ans2($pr_2%)</span>/<span class="bad_answer">$b_ans2($pb_2%)</span>/<span class="bold_link">$rows</span> 
                            <br/>Третий - <span class="good_answer">$r_ans3($pr_3%)</span>/<span class="bad_answer">$b_ans3($pb_3%)</span>/<span class="bold_link">$rows</span></td>
                        </tr>
                    </table>
__write;
                                echo "$s";
                    mysql_close($db);
                }
                 ?>
</div>    
        <div id="footer">
                &copy;Семенов Сергей, 2012.<br>
                Пишите письма: <a href="mailto:sam3434@mail.ru">sam3434@mail.ru.</a>
        </div>        
    </body>
</html>