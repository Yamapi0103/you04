<?php
require __DIR__. '/_connect_db.php';

$pname = 'case_control';
$sqlGET1="SELECT * FROM `bs_case` o JOIN `bsmember` p ON o.BS_sid=p.BS_sid WHERE o.BS_state=1";
$stmt1 = $pdo->query($sqlGET1);
$countOpen = $pdo->query($sqlGET1);

$sqlGET2="SELECT * FROM `bs_case` o JOIN `bsmember` p ON o.BS_sid=p.BS_sid WHERE o.BS_state=0";
$stmt2 = $pdo->query($sqlGET2);
$countClose = $pdo->query($sqlGET2);

//去抓廠商的分類
$sqlGET_chart ="SELECT o.`industry_name` FROM `industry_categories` o JOIN `bs_case` p ON o.id=p.`industry_name`";
$stmt_chart = $pdo->query($sqlGET_chart);
// $data_chart = $stmt_chart->fetch(PDO::FETCH_ASSOC)
$category=[
  "3C用品"=>0,
  "遊戲電競"=>0,
  "時尚"=>0,
  "政府單位"=>0,
  "店家餐廳"=>0,
  "化妝品"=>0,
  "其他"=>0
];
while($data_chart = $stmt_chart->fetch(PDO::FETCH_ASSOC)){
  $category[$data_chart['industry_name']]++;
};
$keys=[];
$values=[];
foreach($category as $key=>$val){
  array_push($keys,$key);
  array_push($values,$val);
};
// echo json_encode($category, JSON_UNESCAPED_UNICODE);






?>

<?php include __DIR__. '/head.php'; ?>
<?php include __DIR__. '/_nav.php'; ?>

<style>

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
#endCase{
  color:white;
  text-decoration:none;
  border:1px solid white;
  background-color:#78869a9e;
  padding:10px;
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
<br>
<br>
<h1>發佈案子的產業別</h1>
<div id="chart"></div>
<section>
  <!--for demo wrap-->
  <h3>已發佈專案管理</h3>
  <p>總案數: 
    <?php
      $dataLength = $countOpen->fetchAll(PDO::FETCH_ASSOC);
      echo count($dataLength);
    ?>
  </p>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>專案名稱</th>
          <th>專案照片</th>
          <th>最低需求人數</th>
          <th>預算</th>
          <th>截止日期</th>
          <th>粉絲數要求</th>
          <th>曝光媒體</th>
          <th>廠商</th>
          <th>廠商產業別</th>
          <th>結案</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <?php while($data_ar = $stmt1->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
          <td><?= $data_ar['BScase_name']?></td>
          <td><?= $data_ar['BScase_photo']?></td>
          <td><?= $data_ar['BScase_ask_people']?></td>
          <td><?= $data_ar['BScase_pay']?></td>
          <td><?= $data_ar['BScase_time_limit']?></td>
          <td><?= $data_ar['BScase_fans']?></td>
          <td><?= $data_ar['BScase_active']?></td>
          <td><?= $data_ar['BS_name']?></td>
          <td><?= $data_ar['industry_name']?></td>
          <td><a href="javascript:endCase(<?= $data_ar['BScase_sid'] ?>)" id='endCase'>結案</a></td>
          
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</section>


<section>
  <!--for demo wrap-->
  <h3>已結案專案管理</h3>
  <p>總案數: 
    <?php
      $dataLength = $countClose->fetchAll(PDO::FETCH_ASSOC);
      echo count($dataLength);
    ?>
  </p>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>專案名稱</th>
          <th>專案照片</th>
          <th>最低需求人數</th>
          <th>預算</th>
          <th>截止日期</th>
          <th>粉絲數要求</th>
          <th>曝光媒體</th>
          <th>廠商</th>
          <th>廠商產業別</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <?php while($data_ar = $stmt2->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
          <td><?= $data_ar['BScase_name']?></td>
          <td><?= $data_ar['BScase_photo']?></td>
          <td><?= $data_ar['BScase_ask_people']?></td>
          <td><?= $data_ar['BScase_pay']?></td>
          <td><?= $data_ar['BScase_time_limit']?></td>
          <td><?= $data_ar['BScase_fans']?></td>
          <td><?= $data_ar['BScase_active']?></td>
          <td><?= $data_ar['BS_name']?></td>
          <td><?= $data_ar['industry_name']?></td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</section>
<script>


function endCase(sid){
//  -------------寫在api
   fetch('case_control_api.php', {
            method: 'PUT',
            body: JSON.stringify({'sid':sid}),
            headers: new Headers({
                'Content-Type': 'application/json'
            })
    })
    .then(res => res.json())
    .then(data => {
      alert(data.message);
      location.reload();
    })  
}

// --------------------發佈專案的產業別
var json =<?= json_encode([
    'categories' => $keys,
    'count' => $values
  ], JSON_UNESCAPED_UNICODE);?>;

var pieJson = {};
  json.categories.forEach(function (categories, index) {
  pieJson[categories] = json.count[index];
});
var chart = c3.generate({
  data: {
    json: pieJson,
    type : 'pie',
  }
});




</script>
