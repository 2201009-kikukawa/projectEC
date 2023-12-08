<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$request_body = file_get_contents('php://input');
$date = json_decode($request_body, true);
require 'db-connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['cart'])) {
    $pdo = new PDO($connect, USER, PASS);
    $errorMessages = array();
    $productIds = array();

    foreach ($_SESSION['cart'] as $product_id => $cartItem) {
        $stmt = $pdo->prepare("SELECT * FROM product WHERE product_id = :id");
        $stmt->bindParam(':id', $product_id);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $date['counts'][$product_id];

        if ($count > $product['inventory']) {
            $errorMessages[] = "{$cartItem['name']} の在庫が不足しているため、該当の商品を削除しました。画面を更新してください";
            $productIds[] = $product_id;
            unset($_SESSION['cart'][$product_id]);
        }
    }

    header('Content-Type: application/json');
    echo json_encode(['errorMessages' => $errorMessages, 'productIds' => $productIds]);  // 修正: 配列の名前を変更
}
?>
