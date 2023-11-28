<?php
session_start();
$request_body = file_get_contents('php://input');
$date = json_decode($request_body,true);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($date['productId'])) {
    $productId = $date['productId'];

    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'カート内でアイテムが見つかりません。']);
    }
} else {
    echo json_encode(['success' => false, 'message' => '無効なリクエストです。']);
}
?>
