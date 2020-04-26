<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <link rel="stylesheet" href="../plugins/bootstrap.css">
    <link rel="stylesheet" href="/calendar_homework/calendar.CSS">
</head>
<!-- 變數區域 -->
<?php
date_default_timezone_set("Asia/Taipei");
if(isset($_GET['Ym'])){   
    $today_temp = date('Y-m-d H:i:s', ($_GET['Ym']));
    $year_temp= date("Y",($_GET['Ym']));
    $month_temp= date("m",($_GET['Ym'])); 
}else{
    $today_temp = date('Y-m-d H:i:s');
    $year_temp=date("Y");
    $month_temp=date("m");  
}
// $year_tmp=$year;
// $month_tmp=$month;
$year=$year_temp;
$month=$month_temp; 
$today = $today_temp;

// echo "年" . $year . "<br>" ;
// echo "月" . $month . "<br>" ;
// echo "今日" . $today;


$time="$year-$month-1";
$time_end=("+1 month -1 day".date($time));
$week=date("w",strtotime($time));
$month_day=date("j",strtotime($time_end));
?>

<body>
    
    <div class="container shadow">
    <div class="row">
        <div class="col-5"><img class="img-fluid " src="../img/7385ba5b398d51d97b83837512c7bd71_s.jpg" alt=""></div>
        <div class="col-7 push_all">
            <table class="calender shadow">
            <thead>
            <tr><th colspan='2'>
            <a href="calendar_index.php?Ym=<?=strtotime($today .'-1 month');?>">上一月</a></th><th colspan='3'>
            <span>
                <?php echo $year . "年" . $month . "月份"?>
            </span></th><th colspan='2'>
            <a href="calendar_index.php?Ym=<?=strtotime($today .'+1 month');?>">下一月</a>
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
            </thead>
            <tbody>
        <?php
        for($i=0;$i<6;$i++){
            echo "<tr>";
            for($j=0;$j<7;$j++){
                if($i == 0 && $j < $week){
                    echo "<td>";
                    echo "</td>";
                }else{
                    if(($i*7+$j-$week)>=$month_day){
                        if(($month_day+$week)%7 == 0){
                            $j++;
                        }
                        if(($i*7+$j)<35){
                            echo "<td>";
                            echo "</td>";      
                        }
                    }else if(($j+1)%7 == 1 or ($j+1)%7 == 0 ){
                        echo "<td class='hd'>";
                        echo $i*7+$j-$week+1;
                        echo "</td>";
                    }
                    else{
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
            </tbody>
        </div>
    </div>
    </div>
</body>
</html>