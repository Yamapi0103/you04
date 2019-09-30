<?php
require __DIR__. '/_connect_db.php';

if (!isset($_GET['IC_sid'])) {
    //echo 'no sid param!';
    exit;
    //die('Hello');
}
$IC_sid =  intval($_GET['IC_sid']);

$sql = "DELETE FROM `icmember` WHERE IC_sid = $IC_sid";

$stmt = $pdo->query($sql);

//echo $stmt->rowCount();
if (isset($_SERVER['HTTP_REFERER'])) {
    // 從哪裡來, 從哪裡回去
    header('Location: '. $_SERVER['HTTP_REFERER']);
} else {
    header('Location: icmember.php'); // 回到列表頁的第一頁
}
