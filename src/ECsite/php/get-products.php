<?php
require 'db-connect.php';

// データベース接続とクエリの実行
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->query('SELECT p.*, COUNT(r.review_id) AS review_count, s.shop_name FROM product p LEFT JOIN review r ON p.product_id = r.product_id LEFT JOIN shop s ON p.shop_id = s.shop_id WHERE p.productflag = 0 GROUP BY p.product_id');
$products = $sql->fetchAll(PDO::FETCH_ASSOC);

// JSON形式で商品データを出力
header('Content-Type: application/json');
echo json_encode($products);
?>
