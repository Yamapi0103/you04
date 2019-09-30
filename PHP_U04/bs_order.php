<?php
require __DIR__. '/_connect_db.php';

$pname = 'bs_order';


?>


<?php
$per_page = 5;
$page = isset($_GET['page'])?intval($_GET['page']):1;

$t_sql = "SELECT COUNT(1) FROM bs_order";
$total_rows = $pdo->query($t_sql)->fetch()[0]; //stmt->fetch()  拿到索引和關聯
$total_pages = ceil($total_rows/$per_page);

// 限定頁碼範圍
if ($page<1) {
    header('Location: bs_order.php');
    exit;
}
if ($page>$total_pages) {
    header('Location: bs_order.php?page='. $total_pages);
    exit;
}
$sql = sprintf("SELECT * FROM bs_order ORDER BY BO_sid DESC LIMIT %s, %s", ($page-1)*$per_page, $per_page);
$stmt = $pdo->query($sql);


$sql = "SELECT * FROM bs_order ";

//算今日所得
$today = date("Y-m-d");
// echo $today."<br>";
$sqlToday=$sql.'WHERE `BO_date` like "'.$today.'%"';
// echo $sqlToday."<br>";
$stmtToday = $pdo->query($sqlToday);
$tt = $stmtToday->fetchAll(PDO::FETCH_ASSOC);
// echo var_dump($rr);
$todayPoint=0;
foreach ($tt as $t) {
    $todayPoint += $t['BO_amount'];
}

//算該月所得
$thisMonth = date("Y-m");
// echo $thisMonth;
$sqlThisMonth=$sql.'WHERE `BO_date` like "'.$thisMonth.'%"';
// echo $sqlThisMonth."<br>";
$stmtThisMonth = $pdo->query($sqlThisMonth);
$mm = $stmtThisMonth->fetchAll(PDO::FETCH_ASSOC);
// echo var_dump($mm);
$thisMonthPoint=0;
foreach ($mm as $m) {
    $thisMonthPoint += $m['BO_amount'];
}
// echo $thisMonthPoint;
?>

<?php include __DIR__. '/head.php' ?>
<?php include __DIR__. '/_nav.php'; ?>


<head>
  <link rel="stylesheet" type="text/css" href="tableStyle.css">
</head>

<section>
  <!--for demo wrap-->
  <h3>訂單管理</h3>
<?php
echo "今日購買金額:".$todayPoint."\t"."\t";
echo "本月購買金額:".$thisMonthPoint;
?>
    <table cellpadding="0" cellspacing="0" border="0">
      <thead class="tbl-header">
        <tr>
          <th>BO_sid</th>
          <th>BS_email</th>
          <th>BO_amount</th>
          <th>BO_point</th>
          <th>BO_date</th>
          <th>BO_method</th>
          <!-- <th>BO_rename</th> -->
          <!-- <th>BO_receipt</th> -->
        </tr>
      </thead>
      <tbody class="tbl-content">
      <?php while ($r = $stmt->fetch(PDO::FETCH_ASSOC)):
        ?>
        <tr>
            <td><?= $r['BO_sid'] ?></td>
            <td><?= $r['BS_email'] ?></td>
            <td><?= $r['BO_amount'] ?></td>
            <td><?= $r['BO_point'] ?></td>
            <td><?= $r['BO_date'] ?></td>
            <td><?= $r['BO_method'] ?></td>
            <!-- <td><?= $r['BO_rename'] ?></td> -->
            <!-- <td><?= $r['BO_receipt'] ?></td> -->
        </tr>
        <?php  endwhile;
        ?>
      </tbody>
    </table>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item <?= $page==1?'disabled':''; ?>"><a class="page-link" href="?page=1">&lt;&lt;</a></li>
    <li class="page-item <?= $page==1?'disabled':''; ?>"><a class="page-link" href="?page=<?=$page-1?>">&lt;</a></li>
    <li class="page-item"><a class="page-link"><?= $page.'/'.$total_pages ?></a></li>
    <li class="page-item <?= $page==$total_pages?'disabled':''; ?>"><a class="page-link" href="?page=<?=$page+1?>">&gt;</a></li>
    <li class="page-item <?= $page==$total_pages?'disabled':''; ?>"><a class="page-link" href="?page=<?=$total_pages?>">&gt;&gt;</a></li>
  </ul>
</nav>
</section>
  <script>
    //    var navBar = $("#topNav");
    //    var hdrHeight = $("header").height();
    // $(window).scroll(function() {
    //     console.log(hdrHeight)
    // if( $(this).scrollTop() > hdrHeight+navBar.height()) {
    //     $('table .tbl-header').addClass("tableScrolled");
    // } else {
    //     $('table .tbl-header').removeClass("tableScrolled");
    // }
    // });

  </script>


