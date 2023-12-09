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
    <?php
    $picture = $name = $currentprice = $member_name = $account_name = '';
    $picture = $_SESSION['product_auction']['picture'];
    $name = $_SESSION['product_auction']['name'];
    $currentprice = $_SESSION['product_auction']['price'];
    $member_name = $_SESSION['member']['account_name'];
    $account_name = $_SESSION['product_auction']['account_name'];

    if ($member_name == $account_name) {
        echo '<div class="contents-container">';
        echo '<form action="orderinfomation.php" method="post">';
        echo '<div class="contents-container-sub">';
        echo '<img alt="image" class="image" src="../image/', $picture, '">';
        echo '<div class="product-info">';
        echo '<P class="subtitle">商品名</P>';
        echo "<p class='item'>{$name}</p>";
        echo '<p class="subtitle">価格</p>';
        echo "<p class='item'>{$currentprice} 円</p>";
        echo '</div>';
        echo '</div>';
        echo "<p class='bid'>ご落札おめでとうございます！</p>";
        echo '<p class="text">上記の商品のご落札が確定しました。</p>';
        echo "<p class='text'>注文フォームの入力をお願いいたします。</p>";
        echo '<input type="submit" class="button-form" value="注文フォームへ">';
        echo '</form>';
        echo '</div>';
    } else {
        echo '<div class="contents-container">';
        echo '<form action="auctionshow.php" method="post">';
        echo '<div class="contents-container-sub">';
        echo '<img alt="image" class="image" src="../image/', $picture, '">';
        echo '<div class="product-info">';
        echo '<P class="subtitle">商品名</P>';
        echo "<p class='item'>{$name}</p>";
        echo '<p class="subtitle">価格</p>';
        echo "<p class='item'>{$currentprice} 円</p>";
        echo '</div>';
        echo '</div>';
        echo "<p class='bid'>残念ながら上記の商品をご落札できませんでした。</p>";
        echo '<p class="text">他の商品もご検討ください。</p>';
        echo '<input type="submit" class="button-form" value="商品一覧へ戻る">';
        echo '</form>';
        echo '</div>';
    }
    ?>


</body>

</html>