<style>
    table{
        border-collapse:collapse;
    }
    table,td,th{
        border: 1px solid #CCC;
        padding:5px;
        text-align:center;
    }
    .caelander{
        display:inline-flex;
        flex-wrap:wrap;
        width:25%;
        height:33%;

    }


</style>

<div>
    <form action="?" method='get'>
    年份<input type="number" name="year">
   <input type="submit" value="產生年曆">
    </form>

</div>


<?php
$a=["日","一","二","三","四","五","六"];
date_default_timezone_set("Asia/Taipei");
// $year=2020;
if(isset($_GET['year'])){
    if(!empty($_GET['year'])){
        $year=$_GET['year'];
    }else{
        $year=date('Y');
    }
}else{
    $year=date('Y');
}
?>

<?php
for($month=1;$month<=12;$month++){
$time="$year-$month-1";
$time_end=("+1 month -1 day".date($time));
$week=date("w",strtotime($time));
$month_day=date("j",strtotime($time_end));
for($i=0;$i<=floor(($week+$month_day)/7);$i++){
    if($i == 0){
        $k=0;
        echo "<div class='caelander'><table>";
        echo "<tr><th colspan='7'>";
        echo $year;
        echo "年";
        echo $month;
        echo "月份</th></tr>";
        echo "<tr>"; 
        for($p=0;$p<7;$p++){
            echo "<th>";
            echo $a[$p];
            echo"</th>";
        }
    }  
    echo "<tr>";
    for($j=0;$j<7;$j++){
        if($i == 0 && $j < $week){
            echo "<td>";
            echo "</td>";
        }else{
            if(($i*7+$j-$week)>=$month_day){
                if(($month_day+$week)%7 == 0){
                    $j++;
                }else{           
                    echo "<td>";
                    echo "</td>";
                }          
            }else{
                echo "<td>";
                echo $i*7+$j-$week+1;
                echo "</td>";
            }
        }
    }
    echo "</tr>";
    if($i+1 == floor(($week+$month_day+7)/7)){echo "</table></div>";}
}
}
?>
