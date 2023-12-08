<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'db-connect.php';

$pdo = new PDO($connect, USER, PASS);
    $sql = "INSERT INTO orderhistory (member_id, total_price, delivery_date, delivery_address)
            VALUES (:member_id, :total_price, :delivery_date, :delivery_address)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':member_id', $member_id);
    $stmt->bindParam(':total_price', $total_price);
    $stmt->bindParam(':delivery_date', $delivery_date);
    $stmt->bindParam(':delivery_address', $delivery_address);

$member_id = isset($_SESSION['member']['id']) ? $_SESSION['member']['id'] : '';
$total = 0;
foreach ($orderData['products'] as $product) {
    $product_price = $product['price'];
    $product_count = $product['count'];
    $total += $product_price * $product_count;
}

$total_price = $total;
$delivery_date = $orderdate['deliveryDate'];
$delivery_address =  $orderdate['saki'] ;
$stmt->execute();
?>
