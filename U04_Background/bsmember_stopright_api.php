<?php
require __DIR__. '/_connect_db.php';

  $entityBody = file_get_contents('php://input');
  // 4是php內建接收檔案的語法
  $bdata = json_decode($entityBody, true);
  // 將接收到的字串轉回JSON
  $sid = $bdata['sid'];
  // 取出JSON中{"sid":"?"}的數值?
  $status = $bdata['status'];
  if ($status == "啟用中") {
    $sqlPUT = "UPDATE `bsmember` SET `BS_status`= '停權' WHERE BS_sid= $sid ";
    $stmt3 = $pdo->query($sqlPUT);
    $result=[
        'message'=>'已停權該用戶'
    ];
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
  } else {
    $sqlPUT = "UPDATE `bsmember` SET `BS_status`= '啟用中' WHERE BS_sid= $sid ";
    $stmt3 = $pdo->query($sqlPUT);
    $result=[
        'message'=>'已將該用戶啟用'
    ];
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
  }

  // 回傳會變成字串


?>
