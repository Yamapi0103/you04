<?php
$db_host = 'localhost';
$db_name = 'U04';
$db_user = 'root';
$db_pass = '';

$dsn = sprintf('mysql:dbname=%s;host=%s', $db_name, $db_host);

// 不是預設的 3306 請設定 port number
// mysql:host=localhost;port=3307;dbname=testdb
try {
    $pdo = new PDO($dsn, $db_user, $db_pass);

    // 連線使用的編碼設定
    $pdo->query("SET NAMES utf8");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $ex) {
    echo 'Connection failed:'. $ex->getMessage();
}

if(! isset($_SESSION)){
    session_start();
}