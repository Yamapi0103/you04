<?php
require __DIR__. '/_connect_db.php';

$pname = 'bsmember';

$sql = sprintf("SELECT * FROM `bsmember` WHERE 1");
$stmt = $pdo->query($sql);
?>

<?php include __DIR__. '/head.php' ?>
<?php include __DIR__. '/_nav.php'; ?>


<style>
body {
  font-family: "微軟正黑體";
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
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
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
.tbl-content a {
  text-decoration: none;
  display: block;
  background: #ccc;
  border-radius: 2px;
  text-align: center;
  padding: 2px 0;
  width: 40px;
  color: black!important;
}
.tbl-content a:hover {
  background: #bbb;
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

/* highchart */
#stopRight {
  color: white;
}

</style>

<section>
  <!--for demo wrap-->
  <p>廠商黑名單，每日登入，每日新增，每周新增</p>
  <h3>廠商會員資料清單</h3>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>會員編號</th>
          <th>廠商名稱</th>
          <th>廠商類型</th>
          <th>廠商電話</th>
          <th>會員email</th>
          <th>會員帳號狀態</th>
          <th>停權</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
      <?php
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)):
            //上面將右邊指定給row，執行一次就是把該次結果給row，如果不是0不是空值就是true，就會繼續往下跑
      ?>
        <tr>
          <td><?= $row['BS_sid'] ?></td>
          <td><?= $row['BS_name'] ?></td>
          <td><?= $row['BS_type'] ?></td>
          <td><?= $row['BS_phone'] ?></td>
          <td><?= $row['BS_email'] ?></td>
          <td><?= $row['BS_status'] ?></td>
          <td><a href="javascript:stopRight(<?= $row['BS_sid'] ?>, '<?= $row['BS_status'] ?>')" id='stopRight'>
              <?= ($row['BS_status'] == '啟用中')? '停權' : "啟用" ?>
              </a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</section>

<script>

function stopRight(sid, status) {
  fetch('bsmember_stopright_api.php', {
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

</script>
<!-- follow me template -->
