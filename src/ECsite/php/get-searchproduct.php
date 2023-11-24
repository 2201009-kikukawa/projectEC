<?php
require 'db-connect.php';

$pdo = new PDO($connect, USER, PASS);

$product = array();
$request_body = file_get_contents('php://input');
$date = json_decode($request_body,true);
$key = !empty($date['key']) ? $date['key'] : "";

if (!empty($date['shibori1'])) {
    $sql = $pdo->query("SELECT p.*, COUNT(r.review_id) AS review_count, s.shop_name FROM product p LEFT JOIN review r ON p.product_id = r.product_id LEFT JOIN shop s ON p.shop_id = s.shop_id WHERE p.productflag = 0 AND price < 1000 GROUP BY p.product_id");
    $product += $sql->fetchAll(PDO::FETCH_ASSOC);
}

if (!empty($date['shibori2'])) {
    $sql = $pdo->query("SELECT p.*, COUNT(r.review_id) AS review_count, s.shop_name FROM product p LEFT JOIN review r ON p.product_id = r.product_id LEFT JOIN shop s ON p.shop_id = s.shop_id WHERE p.productflag = 0 AND price >= 1000 AND price < 5000 GROUP BY p.product_id");
    $product += $sql->fetchAll(PDO::FETCH_ASSOC);
}

if (!empty($date['shibori3'])) {
    $sql = $pdo->query("SELECT p.*, COUNT(r.review_id) AS review_count, s.shop_name FROM product p LEFT JOIN review r ON p.product_id = r.product_id LEFT JOIN shop s ON p.shop_id = s.shop_id WHERE p.productflag = 0 AND price >= 5000 AND price < 10000 GROUP BY p.product_id");
    $product += $sql->fetchAll(PDO::FETCH_ASSOC);
}

if (!empty($date['shibori4'])) {
    $sql = $pdo->query("SELECT p.*, COUNT(r.review_id) AS review_count, s.shop_name FROM product p LEFT JOIN review r ON p.product_id = r.product_id LEFT JOIN shop s ON p.shop_id = s.shop_id WHERE p.productflag = 0 AND price >= 10000 GROUP BY p.product_id");
    $product += $sql->fetchAll(PDO::FETCH_ASSOC);
}

if (!empty($date['shibori5'])) {
    $shibori5 = $date['shibori5'];
    $sql = $pdo->prepare('SELECT * FROM subclass WHERE mainclass_id = 0');
    $subclassData = $sql->fetchAll(PDO::FETCH_ASSOC);
    $sql = $pdo->prepare("SELECT p.*, COUNT(r.review_id) AS review_count, s.shop_name FROM product p LEFT JOIN review r ON p.product_id = r.product_id LEFT JOIN shop s ON p.shop_id = s.shop_id WHERE p.productflag = 0 AND p.subclass_id = :subClassData GROUP BY p.product_id");
    foreach($subclassData as $row){
        $sql->bindParam(':subclassData', $row['subclass_id']);
        $sql->execute();
        $product +=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (!empty($date['shibori6'])) {
    $sql = $pdo->prepare('SELECT * FROM subclass WHERE mainclass_id = 1');
    $subclassData = $sql->fetchAll(PDO::FETCH_ASSOC);
    $sql = $pdo->prepare("SELECT p.*, COUNT(r.review_id) AS review_count, s.shop_name FROM product p LEFT JOIN review r ON p.product_id = r.product_id LEFT JOIN shop s ON p.shop_id = s.shop_id WHERE p.productflag = 0 AND p.subclass_id = :subClassData GROUP BY p.product_id");
    foreach($subclassData as $row){
        $sql->bindParam(':subclassData', $row['subclass_id']);
        $sql->execute();
        $product += $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (!empty($date['shibori7'])) {
    $sql = $pdo->prepare('SELECT * FROM subclass WHERE mainclass_id = 2');
    $subclassData = $sql->fetchAll(PDO::FETCH_ASSOC);
    $sql = $pdo->prepare("SELECT p.*, COUNT(r.review_id) AS review_count, s.shop_name FROM product p LEFT JOIN review r ON p.product_id = r.product_id LEFT JOIN shop s ON p.shop_id = s.shop_id WHERE p.productflag = 0 AND p.subclass_id = :subClassData GROUP BY p.product_id");
    foreach($subclassData as $row){
        $sql->bindParam(':subclassData', $row['subclass_id']);
        $sql->execute();
        $product += $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (!empty($key)) {
    $sql = $pdo->prepare("SELECT p.*, COUNT(r.review_id) AS review_count, s.shop_name 
                         FROM product p 
                         LEFT JOIN review r ON p.product_id = r.product_id 
                         LEFT JOIN shop s ON p.shop_id = s.shop_id 
                         WHERE p.productflag = 0 
                         AND (p.product_name LIKE :key OR s.shop_name LIKE :key)
                         GROUP BY p.product_id");
    $keyParam = '%' . $key . '%';
    $sql->bindParam(':key', $keyParam, PDO::PARAM_STR);
    $sql->execute();
    $product += $sql->fetchAll(PDO::FETCH_ASSOC);
}

// 商品データを JSON 形式で出力
$product = array_merge($product);
header('Content-Type: application/json');
echo json_encode($product);
?>
