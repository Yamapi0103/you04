<?php
require __DIR__. '/_connect_db.php';

  $entityBody = file_get_contents('php://input');
  $bdata = json_decode($entityBody, true);
  $sid = $bdata['sid'];
  $sqlPUT = "UPDATE `bs_case` SET `BS_state`=0 WHERE BScase_sid= $sid ";
  $stmt3 = $pdo->query($sqlPUT);
  $result=[
      'message'=>'結案成功'
  ];
  echo json_encode($result, JSON_UNESCAPED_UNICODE);


?>
