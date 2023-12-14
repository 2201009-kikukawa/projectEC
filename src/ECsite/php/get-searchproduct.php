<?php
require 'db-connect.php';

$pdo = new PDO($connect, USER, PASS);

$product = array();
$product1 = $product2 = $product3 = $product4 = $product5 = $product6 = $product7 = $product8 = array();
$request_body = file_get_contents('php://input');
$date = json_decode($request_body,true);
$key = !empty($date['key']) ? $date['key'] : "";

if (!empty($date['shibori1'])) {
    $sql = $pdo->query("SELECT p.*, COUNT(r.review_id) AS review_count, s.shop_name FROM product p LEFT JOIN review r ON p.product_id = r.product_id LEFT JOIN shop s ON p.shop_id = s.shop_id WHERE p.productflag = 0 AND price < 1000 GROUP BY p.product_id");
    $product1 = $sql->fetchAll(PDO::FETCH_ASSOC);
}

if (!empty($date['shibori2'])) {
    $sql = $pdo->query("SELECT p.*, COUNT(r.review_id) AS review_count, s.shop_name FROM product p LEFT JOIN review r ON p.product_id = r.product_id LEFT JOIN shop s ON p.shop_id = s.shop_id WHERE p.productflag = 0 AND price >= 1000 AND price < 5000 GROUP BY p.product_id");
    $product2 = $sql->fetchAll(PDO::FETCH_ASSOC);
}

if (!empty($date['shibori3'])) {
    $sql = $pdo->query("SELECT p.*, COUNT(r.review_id) AS review_count, s.shop_name FROM product p LEFT JOIN review r ON p.product_id = r.product_id LEFT JOIN shop s ON p.shop_id = s.shop_id WHERE p.productflag = 0 AND price >= 5000 AND price < 10000 GROUP BY p.product_id");
    $product3 = $sql->fetchAll(PDO::FETCH_ASSOC);
}

if (!empty($date['shibori4'])) {
    $sql = $pdo->query("SELECT p.*, COUNT(r.review_id) AS review_count, s.shop_name FROM product p LEFT JOIN review r ON p.product_id = r.product_id LEFT JOIN shop s ON p.shop_id = s.shop_id WHERE p.productflag = 0 AND price >= 10000 GROUP BY p.product_id");
    $product4 = $sql->fetchAll(PDO::FETCH_ASSOC);
}

if (!empty($date['shibori5'])) {
    $sql = $pdo->prepare('SELECT p.*,COUNT(r.review_id) AS review_count,sh.shop_name FROM product p left join subclass s on p.subclass_id = s.subclass_id left join shop sh on p.shop_id = sh.shop_id left join review r on p.product_id = r.product_id where s.mainclass_id=0 AND p.productflag = 0 GROUP BY p.product_id;');
    $sql->execute();
    $subclassData = $sql->fetchAll(PDO::FETCH_ASSOC);
    $product5 = $subclassData;
}

if (!empty($date['shibori6'])) {
    $sql = $pdo->prepare('SELECT p.*,COUNT(r.review_id) AS review_count,sh.shop_name FROM product p left join subclass s on p.subclass_id = s.subclass_id left join shop sh on p.shop_id = sh.shop_id left join review r on p.product_id = r.product_id where s.mainclass_id=1 AND p.productflag = 0 GROUP BY p.product_id;');
    $sql->execute();
    $subclassData = $sql->fetchAll(PDO::FETCH_ASSOC);
    $product6 = $subclassData;
}

if (!empty($date['shibori7'])) {
    $sql = $pdo->prepare('SELECT p.*,COUNT(r.review_id) AS review_count,sh.shop_name FROM product p left join subclass s on p.subclass_id = s.subclass_id left join shop sh on p.shop_id = sh.shop_id left join review r on p.product_id = r.product_id where s.mainclass_id=2 AND p.productflag = 0 GROUP BY p.product_id;');
    $sql->execute();
    $subclassData = $sql->fetchAll(PDO::FETCH_ASSOC);
    $product7 = $subclassData;
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
    $product8 = $sql->fetchAll(PDO::FETCH_ASSOC);
}

$product = array_merge($product1,$product2,$product3,$product4,$product5,$product6,$product7,$product8);
header('Content-Type: application/json');
echo json_encode($product);
?>
