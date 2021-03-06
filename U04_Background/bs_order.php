<?php
require __DIR__. '/_connect_db.php';

$pname = 'bs_order';

$per_page = 5;
$page = isset($_GET['page'])?intval($_GET['page']):1;

$t_sql = "SELECT COUNT(1) FROM bs_order";
$total_rows = $pdo->query($t_sql)->fetch()[0]; //stmt->fetch()  拿到索引和關聯
$total_pages = ceil($total_rows/$per_page);

// 限定頁碼範圍
if($page<1){
  header('Location: bs_order.php');
  exit;
}
if($page>$total_pages) {
  header('Location: bs_order.php?page='. $total_pages);
  exit;
}
$sql = sprintf("SELECT * FROM bs_order ORDER BY BO_sid DESC LIMIT %s, %s",($page-1)*$per_page,$per_page);
$stmt = $pdo->query($sql);

// echo $thisMonthPoint;
?>

<?php include __DIR__. '/head.php' ?>
<?php include __DIR__. '/_nav.php'; ?>

<link rel="stylesheet" type="text/css" href="tableStyle.css">

<section>
  <!--for demo wrap-->
  <h3>訂單管理</h3>
<?php 
// echo "今日購買金額:".$todayPoint."\t"."\t";
// echo "本月購買金額:".$thisMonthPoint;
?>
開始:
<input type="date" id="start" name="trip-start"
       value="2018-12-03" min="2018-01-01" max="2018-12-31">
結束:
<input type="date" id="end" name="trip-start"
       value="2018-12-08" min="2018-01-01" max="2018-12-31">
       
<div id="chart"></div>

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
      <?php while($r = $stmt->fetch(PDO::FETCH_ASSOC)): 
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
      <?php  endwhile;         ?>
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

  <script>
  //一進來就會顯示圖表

    var start = $("#start").val();
    var end = $("#end").val();
    window.addEventListener("load",function(){
      lineChart(start,end)
    })
    

//選擇新的時間點會觸發lineChart()重新畫圖表
    $("input").on("change ",function(){
      console.log($(this).val())
      var start = $("#start").val();
      var end = $("#end").val();
      console.log(start,end)
      lineChart(start,end)
    })

    //eg: Sat Dec 08 2018 01:13:25 GMT+0800 (台北標準時間) ==> 2018-12-8
    function timeFormat(date){
      return date.getFullYear()+"-"+((date.getMonth()+1)<10?"0"+(date.getMonth()+1):(date.getMonth()+1))+"-"+(date.getDate()<10?"0"+date.getDate():date.getDate());
    }
    function lineChart(start,end){
      if(start>end){
        alert("開始時間不能大於結束時間")
        return
      }
      let startDay = new Date(start)
      console.log("startDay:"+startDay)
      //算開始到結束日期一共幾天
      let totalDays = new Date(end) - new Date(start);
      totalDays = totalDays/24/60/60/1000; //毫秒轉天數
      totalDays+=1;
      console.log("共"+totalDays+"天")
      let xArray = [timeFormat(startDay)]

      // console.log(xArray)
      for(let i=1;i<totalDays;i++){
        let nextDay = new Date(start);
        nextDay.setDate(startDay.getDate()+i)
        // console.log(nextDay)
        xArray.push(timeFormat(nextDay))
      }
      // console.log(xArray)
        let xDate = []
        $.get('get_bs_order_data.php', {x:xArray}, function(data){
          console.log(data)
            xDate = data.slice(1,-1);  //data回傳"[0,4400,1950,1750]"=> 只取 "0,4400,1950,1750"部分
            console.log(xDate)
            array = xDate.split(","); // array = ["0","4400","1950","1750"]
            console.log(array)
            for(let i=0;i<array.length;i++)
            array[i]=parseInt(array[i]) //array =[0,4400,1950,1750]
            console.log(array)
          var chart = c3.generate({
          data: {
            x: 'x',
          xFormat: '%Y-%m-%d', // 'xFormat' can be used as custom format of 'x'
            columns: [
              ['x', ...xArray],
              ['BO_amount',...array],
              // ['data2', 50, 20, 10, 40, 15, 25]
              // ['x', '2013-01-01', '2013-01-02', '2013-01-03', '2013-01-04', '2013-01-05', '2013-01-06'],
              // ['x', '20130101', '20130102', '20130103', '20130104', '20130105', '20130106'],
                // ['data1', 30, 200, 100, 400, 150, 250],
                // ['data2', 130, 340, 200, 500, 250, 350]
            ]
        },
        axis: {
            x: {
                type: 'timeseries',
                tick: {
                    format: '%Y-%m-%d'
                }
            }
        }
    });
        })
        
      
      
    } 
  



// chart.hide(['data2', 'data3']);
  </script>


