<?php
$shopid = $row['shop_id'];
$sql2 = $pdo->prepare('SELECT * FROM shop WHERE shop_id = ?');
$sql2->execute([$shopid]);

// データを取得し、変数に代入
$shopData = $sql2->fetch(PDO::FETCH_ASSOC);

$shopname = $shopData['shop_name'];
$mail = $shopData['mail'];
$shopperson = $shopData['shop_person'];
?>
