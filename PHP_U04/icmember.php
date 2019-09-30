<?php
require __DIR__. '/_connect_db.php';
$pname = 'icmember';


//------計算加總↓
$d_sql = "SELECT * FROM icmember ";
$today = date("Y-m-d");
$d_sql.='WHERE `IC_create_at` like "'.$today.'%"';
$stmtToday = $pdo->query($d_sql);
$rr = $stmtToday->fetchAll(PDO::FETCH_ASSOC);
$count = count($rr);


// $getDate= date("Y-m-d");
// $d_sql = "SELECT COUNT(1) * FROM ICmember where IC_creat_at like $getDate";
// $d_sql = "SELECT COUNT(1) * FROM ICmember where IC_creat_at like $getDate";


//-------------分頁功能↓

$per_page = 8; //每頁有幾筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // 第幾頁
$t_sql = "SELECT COUNT(1) FROM icmember";
$total_rows = $pdo->query($t_sql)->fetch()[0]; //總筆數
$total_pages = ceil($total_rows/$per_page); //總頁數




// 限定頁碼範圍
if ($page<1) {
    header('Location: icmember.php');
    exit;
}
if ($page>$total_pages) {
    header('Location: icmember.php?page='. $total_pages);
    exit;
}

//-------------分頁功能↑



$sql = sprintf(
  "SELECT * FROM icmember ORDER BY IC_sid DESC LIMIT %s, %s",
  ($page-1)*$per_page,
  $per_page
);
$stmt = $pdo->query($sql);
?>

<?php include __DIR__. '/head.php' ?>
<?php include __DIR__. '/_nav.php'; ?>

<style>


section{
  font-family:"微軟正黑體";
}

#container{
  width:90%;
  margin:0 auto;
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

.fa-trash-alt{
  color:#fff;
  font-size:14px;
}

.fa-eye{
  color:#fff;
  font-size:14px;
}

th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
  text-align:center;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
  text-align:center;
}


.th1{
  width:6%;
}
.th2{
  width:16%;
}
.th3{
  width:16%;
}
.th4{
  width:6%;
}
.th5{
  width:11%;
}
.th6{
  width:8%;
}

.th7{
  width:8%;
}

.create_time{
  width:18%;
  text-align:center;
}

.th9{
  width:5%;
}
.th10{
  width:6%;
}






/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

section{
  margin: 50px;
}

/* follow me template */
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


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}

</style>


<section>
<div id="container">
  <!--for demo wrap-->
  今日新增網紅：<?= $count; ?>&nbsp 人<br>
  總計網紅：<?= $total_rows; ?> &nbsp 人
  <!-- &nbsp &nbsp &nbsp &nbsp -->
  <br>
  <br>
  <div class="tbl-header">

    <table cellpadding="0" cellspacing="0" border="0">
    
      <thead>
        <tr>
          <th class="th1">id</th>
          <th class="th2">帳號</th>
          <th class="th3">名稱</th>
          <th class="th4">性別</th>
          <th class="th5">擅長社群</th>
          <th class="th6">最低接案金額</th>
          <th class="th7">經手業配數</th>
          <th class="create_time">註冊時間</th>
          <th class="th9">刪除</th>
          <th class="th10">查看</th>
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
        <td class="th1"><?= $row['IC_sid'] ?></td>
        <td class="th2"><?= $row['IC_email'] ?></td>
        <td class="th3"><?= $row['IC_name'] ?></td>
        <td class="th4"><?= $row['IC_gender'] ?></td>
        <td class="th5"><?= $row['IC_media'] ?></td>
        <td class="th6"><?= $row['IC_price'] ?></td>
        <td class="th7"><?= $row['IC_case'] ?></td>
        <td class="create_time"><?= $row['IC_create_at'] ?></td>
        <td class="th9">
          <a href="javascript:del_it(<?= $row['IC_sid'] ?>)">
          <i class="far fa-trash-alt ext-center"></i></a>
        </td>
        <td class="th10">
          <a href="ic_edit.php?IC_sid=<?= $row['IC_sid'] ?>">
          <i class="far fa-eye"></i></a>
        </td>
     </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
  </div>
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
        function del_it(IC_sid){
            if(confirm('你確定要刪除編號為 '+IC_sid+' 的資料嗎?')){
                location.href = 'ic_delete.php?IC_sid=' + IC_sid;
            }
        }
    </script>

