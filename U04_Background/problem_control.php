<?php
require __DIR__. '/_connect_db.php';
$pname = 'problem_control.php';



//計算問題數量
$d_sql = "SELECT * FROM contact_us";
$today = date("Y-m-d");
$d_sql.= ' WHERE `cu_time` LIKE "'.$today.'%"';

$stmtToday = $pdo->query($d_sql);
$rr = $stmtToday -> fetchAll(PDO::FETCH_ASSOC);
$count = count($rr);


//-------------分頁功能↓

$per_page = 10; //每頁有幾筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // 第幾頁
$t_sql = "SELECT COUNT(1) FROM icmember";
$total_rows = $pdo->query($t_sql)->fetch()[0]; //總筆數
$total_pages = ceil($total_rows/$per_page); //總頁數

// 限定頁碼範圍
if ($page<1) {
    header('Location: problem_control.php');
    exit;
}
if ($page>$total_pages) {
    header('Location: problem_control.php?page='. $total_pages);
    exit;
}
//-------------分頁功能↑

$sql = sprintf(
  "SELECT * FROM contact_us ORDER BY sid DESC LIMIT %s, %s",
  ($page-1)*$per_page,
  $per_page
);
$stmt = $pdo->query($sql);

$bs_sql = 
  "SELECT COUNT(*) FROM `contact_us` WHERE `cu_usertype` LIKE '%廠商%' ";
  $bs_stmt = $pdo->query($bs_sql);
  $bs = $bs_stmt->fetch(PDO::FETCH_NUM)[0];
  //echo json_encode($bs, JSON_UNESCAPED_UNICODE);

$ic_sql = 
  "SELECT COUNT(*) FROM `contact_us` WHERE `cu_usertype` LIKE '%網紅%' ";
  $ic_stmt = $pdo->query($ic_sql);
  $ic = $ic_stmt->fetch(PDO::FETCH_NUM)[0];
  // echo json_encode([
  //   'vender' => $bs,
  //   'yts' => $ic

  // ], JSON_UNESCAPED_UNICODE);

$solve_sql =
    "SELECT COUNT(*) FROM `contact_us` WHERE `status` LIKE '%1%'";
    $solve_stmt = $pdo->query($solve_sql);
    $solve = $solve_stmt->fetch(PDO::FETCH_NUM)[0];

$unsolve_sql =
    "SELECT COUNT(*) FROM `contact_us` WHERE `status` LIKE '%0%'";
    $unsolve_stmt = $pdo->query($unsolve_sql);
    $unsolve = $unsolve_stmt->fetch(PDO::FETCH_NUM)[0];

?>

<?php include __DIR__. '/head.php'; ?>
<?php include __DIR__. '/_nav.php'; ?>


<style>
  .{
    font-family:"微軟正黑體";
  }

  h1{
    font-size: 30px;
    color: #fff;
    text-transform: uppercase;
    font-weight: 300;
    text-align: center;
    margin-bottom: 15px;
  }
  table{
    width:100%;
    table-layout: fixed;
  }
  .tbl-header{
    background-color: rgba(255,255,255,0.3);
  }
  .tbl-content{
    /* height:300px;  */
    /* overflow-x:auto;  */
    /* margin-top: 0px; */
    border: 1px solid rgba(255,255,255,0.3);
  }
  th{
    padding: 20px 15px;
    text-align: left;
    font-weight: 500;
    font-size: 12px;
    color: #fff;
    text-transform: uppercase;
  }
  td{
    padding: 15px;
    text-align: left;
    vertical-align:middle;
    font-weight: 300;
    font-size: 12px;
    color: #fff;
    border-bottom: solid 1px rgba(255,255,255,0.1);
  }

  @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

  section{
    margin: 50px;
  }

  .made-with-love {
    margin-top: 40px;
    padding: 10px;
    clear: left;
    text-align: center;
    font-size: 10px;
    font-family: arial;
    color: #fff;
  }
  .made-with-love i {
    font-style: normal;
    color: #F50057;
    font-size: 14px;
    position: relative;
    top: 2px;
  }
  .made-with-love a {
    color: #fff;
    text-decoration: none;
  }
  .made-with-love a:hover {
    text-decoration: underline;
  }

  .table_page{
    background:#444;
  }


  ::-webkit-scrollbar {
      width: 6px;
  } 
  ::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
  } 
  ::-webkit-scrollbar-thumb {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
  }

  .color_white{
    color:#fff;
  }
</style>



<section>
<div id="chart"></div>
  <div>
今日問題回報：<?= $count; ?>&nbsp 人
</div>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>問題編號</th>
          <th>聯絡人</th>
          <th>聯絡人身份</th>
          <th>回報問題</th>
          <th>發布日期</th>
          <th>問題狀態</th>
          <th></th>
        </tr>	
      </thead>
    </table>
  </div>

  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
    <tbody>
  <?php
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
  ?>
      <tr>
        <td><?= $row['sid'] ?></td>
        <td><?= $row['cu_name'] ?></td>
        <td><?= $row['cu_usertype'] ?></td>
        <td><?= $row['cu_content'] ?></td>
        <td><?= $row['cu_time'] ?></td>
        <td><?php if($row['status']==0){
                  echo "尚未回覆";
                  }else{
                  echo "回覆完成";
                  }  ?></td>
        <td><a href="javascript:problem_close(<?= $row['sid'] ?>, '<?= $row['status'] ?>')" style="font-size: 2em; color: white;"><i class="fas fa-clipboard-check"></i></a>
            <!--  -->
            </td>
     </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    

  </div>
  <nav class="table_page" aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item <?= $page==1 ? 'disabled' : ''; ?>"><a class="page-link" href="?page=1">&lt;&lt;</a></li>
            <li class="page-item <?= $page==1 ? 'disabled' : ''; ?>"><a class="page-link" href="?page=<?= $page-1 ?>">&lt;</a></li>
            <li class="page-item"><a class="page-link"><?= $page. '/'. $total_pages ?></a></li>
            <li class="page-item <?= $page==$total_pages ? 'disabled' : ''; ?>"><a class="page-link" href="?page=<?= $page+1 ?>">&gt;</a></li>
            <li class="page-item <?= $page==$total_pages ? 'disabled' : ''; ?>"><a class="page-link" href="?page=<?= $total_pages ?>">&gt;&gt;</a></li>
        </ul>
    </nav>
    
</section>

<script>
//-----------結案api---------------//
function problem_close(sid, status){
  fetch('problem_control_solve.php', {
              method: 'PUT',
              body: JSON.stringify({'sid':sid, 'status':status}),
              // 把JSON轉成字串傳送出去
              headers: new Headers({
                  'Content-Type': 'application/json'
              })
      })
      .then(res => res.json())
      // 將回傳的字串轉回JSON
      .then(data => {
        alert(data.message);
        location.reload();
      })
}
//---------------end closure api-------------------//


// function delete_report(sid){
//   fetch(,{
//     method:'DELETE',
//     body: JSON.stringify({'sid'}),
//     header: new Header({
//       'Content-Type': 'application/json'
//     })
//   })
// }


//-------------Pie Chart-----------//
var json =<?= json_encode([
    'categories' => ["廠商","網紅"],
    'count' => [$bs, $ic]
  ], JSON_UNESCAPED_UNICODE);?>;


var pieJson = {};
  json.categories.forEach(function (categories, index) {
  pieJson[categories] = json.count[index];
});

console.log(pieJson)

var solve_json=<?= json_encode([
    'categories' => ["已結案","未結案"],
    'count' => [$solve, $unsolve]
  ], JSON_UNESCAPED_UNICODE);?>

var pieJson_solve = {};
  solve_json.categories.forEach(function (categories, index) {
  pieJson_solve[categories] = solve_json.count[index];
});

console.log(pieJson_solve)

var chart = c3.generate({
  data: {
    json: pieJson,
    type : 'pie',
    onclick: function (d, i) { console.log("onclick", d, i); },
    onmouseover: function (d, i) { console.log("onmouseover", d, i); },
    onmouseout: function (d, i) { console.log("onmouseout", d, i); }
  }
  
});
setTimeout(function () {
  var chart = c3.generate({
    data: {
      json:pieJson_solve,
      type : 'pie',
    }
  });
}, 4000);
//-----------------end pie chart-----------------------//
</script>