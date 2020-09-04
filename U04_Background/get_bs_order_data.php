<?php
require __DIR__. '/_connect_db.php';

if(!isset($_GET['x']))
{
    echo "nothing";
    exit;
}
    $xArray = $_GET['x'];
    
    // echo var_dump($xArray);
    $xdata = [];

    $sql = "SELECT * FROM bs_order "; 

    //算日所得
    for($i =0;$i<count($xArray);$i++){
        
        $today = date($xArray[$i]);

        $sqlToday=$sql.'WHERE `BO_date` like "'.$today.'%"';

        $stmtToday = $pdo->query($sqlToday);
        $tt = $stmtToday->fetchAll(PDO::FETCH_ASSOC);

        $todayPoint=0;
        foreach($tt as $t){
          $todayPoint += $t['BO_amount'];
        }
        $xdata[$i]=$todayPoint;
    }
    
    echo json_encode($xdata, JSON_UNESCAPED_UNICODE);

    
// //算該月所得
// $thisMonth = date("Y-m");
// // echo $thisMonth;
// $sqlThisMonth=$sql.'WHERE `BO_date` like "'.$thisMonth.'%"';
// // echo $sqlThisMonth."<br>";
// $stmtThisMonth = $pdo->query($sqlThisMonth);
// $mm = $stmtThisMonth->fetchAll(PDO::FETCH_ASSOC);
// // echo var_dump($mm);
// $thisMonthPoint=0;
// foreach($mm as $m){
//   $thisMonthPoint += $m['BO_amount'];
// }
?>