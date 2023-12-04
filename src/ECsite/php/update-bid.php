<?php
require 'db-connect.php';
$request_body = file_get_contents('php://input'); //送信されてきたbodyを取得(JSON形式）
$data = json_decode($request_body,true); 

$productId = $data["productId"];
$bitPrice = $data["bitPrice"];
$username = $data["username"];
// データベース接続とクエリの実行
$pdo = new PDO($connect, USER, PASS);
    $sql = "UPDATE auction SET finish_user = ?, currentprice = ? WHERE product_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1,$username);
    $stmt->bindParam(2,$bitPrice);
    $stmt->bindParam(3,$productId);

    if ($stmt->execute()) {
        $response = true;
    } else {
        $response = false;
    }
// JSON形式で商品データを出力
header('Content-Type: application/json');
echo json_encode($response);
?>