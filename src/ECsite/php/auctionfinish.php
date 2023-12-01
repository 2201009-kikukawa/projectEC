<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>オークション終了画面</title>
    <link rel="stylesheet" href="../css/auctionfinish.css">
</head>

<body>
    <!-- ヘッダーの読み込み -->
    <?php include("./menu.php"); ?>
    <?php require 'get-auctiondetail.php' ?>
    <?php
    echo '<div class="contents-container">';
    echo '<div class="contents-container-sub">';
    echo '<img alt="image" class="image" src="../image/', $product['picture'], '">';
    echo '<div class="product-info">';
    echo "<p class='item'>{$product['product_name']}</p>";
    echo "<p class='item'>{$product['currentprice']} 円</p>";
    echo '</div>';
    echo '</div>';
    echo '</div>';
    ?>


</body>

</html>