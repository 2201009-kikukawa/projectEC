<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
$product_id = $menber_id = '';
$product_id = $_SESSION['product']['id'];
$menber_id = $_SESSION['member']['id'];
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('insert into review values(null,?,?,?,?,NOW())');
$sql->execute([
    $product_id, $menber_id,
    $_POST['raring'],$_POST['review']
]);
?>