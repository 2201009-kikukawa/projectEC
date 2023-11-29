<?php
require 'db-connect.php';
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo ->query("SELECT p.*,s.shop_name FROM product p LEFT JOIN shop s ON p.shop_id = s.shop_id WHERE p.productflag = 0 ORDER BY p.today_sales DESC LIMIT 3");
$products = $sql->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($products);
?>