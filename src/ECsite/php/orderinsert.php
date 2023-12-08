<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

    $sql = "INSERT INTO orderhistory (member_id, total_price, delivery_date, delivery_address)
            VALUES (:member_id, :total_price, :delivery_date, :delivery_address)";
    $stmt = $pdo->prepare($sql);
    $member_id = isset($_SESSION['member']['id']) ? $_SESSION['member']['id'] : '1';
    $total = 0;
    foreach ($orderData['products'] as $product) {
        $product_price = $product['price'];
        $product_count = $product['count'];
        $total += $product_price * $product_count;
    }

    $total_price = $total;
    $delivery_date = $orderdate['deliveryDate'];
    $delivery_address =  $orderdate['saki'] ;

    $stmt->bindParam(':member_id', $member_id);
    $stmt->bindParam(':total_price', $total_price);
    $stmt->bindParam(':delivery_date', $delivery_date);
    $stmt->bindParam(':delivery_address', $delivery_address);

    $stmt->execute();

    $neworderId = $pdo->lastInsertId();
    $sql = "INSERT INTO orderdetail (order_id,product_id,quantity)
            VALUES(:order_id,:product_id,:quantity)";
    $stmt = $pdo->prepare($sql);
    foreach ($orderData['products'] as $product) {    
        $stmt->bindParam(':order_id', $neworderId);
        $stmt->bindParam(':product_id', $product['id']);
        $stmt->bindParam(':quantity', $product['count']);
    
        $stmt->execute();
    }
    
?>
