<?php
require 'db-connect.php';

$currentTimestamp = time();
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare("SELECT p.*, a.*,
    CASE
    WHEN UNIX_TIMESTAMP(a.finishtime) > :currentTimestamp THEN UNIX_TIMESTAMP(a.finishtime) - :currentTimestamp
    ELSE 0
    END AS remaining_time
    FROM product p
    LEFT JOIN auction a ON p.product_id = a.product_id
    WHERE p.product_id = :id");
$sql->bindParam(':id', $productId);
$sql->bindParam(':currentTimestamp', $currentTimestamp);
$sql->execute();
$product = $sql->fetch(PDO::FETCH_ASSOC);
?>
