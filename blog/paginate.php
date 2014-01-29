<?php 
    echo "<div id='paginate'>";
    $x=($page-1>1)?$page-1:1;
    $y=($page+1<=$num_pages)?$page+1:$num_pages;
    echo "<div id='there'>";
    if ($page>1) {
        echo "<img src='icons/arrow_left.png' alt='' class='arrow'>";
        echo "<a href='{$_SERVER["PHP_SELF"]}?page=$x'> Предыдущая</a>&nbsp;";
    }
    if ($page<$num_pages) {
        echo "<a href='{$_SERVER["PHP_SELF"]}?page=$y'>Следующая </a>";    
        echo "<img src='icons/arrow_right.png' alt='' class='arrow'>";
    }
    echo "</div>";
    if (($page<5)||($num_pages<=8)) {
        for ($i=1; $i <= min($num_pages,8); $i++) { 
            if ($i==$page) {
                echo "<span class='current'>$i</span>&nbsp;";
            }
            else{
                echo "<a href='".$_SERVER['PHP_SELF']."?page=".$i."'>$i</a>&nbsp; ";
            }
            
        }
    }
    elseif (($page>$num_pages-5)&&($num_pages>8)){
        for ($i=$num_pages-7; $i <= $num_pages; $i++) { 
            if ($i==$page) {
                echo "<span class='current'>$i</span>&nbsp;";
            }
            else{
                echo "<a href='".$_SERVER['PHP_SELF']."?page=".$i."'>$i</a>&nbsp; ";
            }
            
        }
    }
    else{
        for ($i=$page-4; $i <=$page+4 ; $i++) { 
            if ($i==$page) {
                echo "<span class='current'>$i</span>&nbsp;";   
            }
            else{
                echo "<a href='".$_SERVER['PHP_SELF']."?page=".$i."'>$i</a>&nbsp; ";    
            }            
        }
    }
    echo "</div>";
 ?>