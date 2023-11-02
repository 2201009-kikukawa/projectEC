<?php
require 'db-connect.php';

// 現在のUNIXタイムスタンプを取得
$currentTimestamp = time();

// データベース接続とクエリの実行
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->query("SELECT p.*, a.currentprice, a.finishtime, s.shop_name,
                   CASE
                     WHEN a.finishtime > $currentTimestamp THEN a.finishtime - $currentTimestamp
                     ELSE 0
                   END AS remaining_time
                   FROM product p
                   LEFT JOIN auction a ON p.product_id = a.product_id
                   LEFT JOIN shop s ON p.shop_id = s.shop_id
                   WHERE p.productflag = 1");
$products = $sql->fetchAll(PDO::FETCH_ASSOC);

// JSON形式で商品データを出力
header('Content-Type: application/json');
echo json_encode($products);
?>
