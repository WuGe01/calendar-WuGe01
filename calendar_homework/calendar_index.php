<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <link rel="stylesheet" href="../plugins/bootstrap.css">
    <style>
        .calender{
            text-align: center;
            width: 30vw;
            height: 50vh;
            margin: 25vh auto;
            font-family: 'Microsoft JhengHei',Arial, Helvetica, sans-serif;
        }
        table,th,td{
            border:1px solid #ccc;
            }
        .hd{
            color: hotpink;
        }   
    </style>  
</head>
<!-- 變數區域 -->
<?php
date_default_timezone_set("Asia/Taipei");

if(isset($_GET['Mth'])){
    $month=$_GET["Mth"];
    echo "001";
    $year=date("Y");
}else{
    $month=date("m");
    $year=date("Y");  
}
$time="$year-$month-1";
$time_end=("+1 month -1 day".date($time));
$week=date("w",strtotime($time));
$month_day=date("j",strtotime($time_end));
?>

<body>
    <table class="calender">
    <tr><th colspan='7'>
    <a href="index.php?month=<?=$Mth-1;?>">上一月</a> 
    <span>
     <?php  echo $year . "年" . $month . "月份" ?>
    </span>
    <a href="index.php?month=<?=$Mth+1;?>">下一月</a>
    </th></tr>
    <tr>
        <th class='hd'>日</th>
        <th>一</th>
        <th>二</th>
        <th>三</th>
        <th>四</th>
        <th>五</th>
        <th class='hd'>六</th>
    </tr>

<?php
for($i=0;$i<=floor(($week+$month_day)/7);$i++){
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
            }else if(($j+1)%7 == 1 or ($j+1)%7 == 0 ){
                echo "<td class='hd'>";
                echo $i*7+$j-$week+1;
                echo "</td>";
            }else{
                echo "<td>";
                echo $i*7+$j-$week+1;
                echo "</td>";
            }
        }
    }
    echo "</tr>";
 }


?>

    </table>
</body>
</html>