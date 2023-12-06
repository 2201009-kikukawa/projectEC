<?php
session_start();

// ログインしているかを確認
$loggedIn = isset($_SESSION["member"]);

// フォームから送信された情報を受け取り、セッションに保存する
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_SESSION['deliveryDate'] = $_POST['deliveryDate'];
}

if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id => $cartItem) {
        $name = $cartItem['name'];//商品名
        $price = $cartItem['price'];//価格
        $count = $cartItem['count'];//個数
        $picture = $cartItem['picture'];//画像パス
        $text = $cartItem['text'];//商品説明文
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // カートをクリアする
    unset($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- ... ここにheadタグ内の残りのコードを追加 -->
</head>
<body>
    <?php include("./menu.php"); ?>
    <form action="top.php" method="post">
        <div class="contents-container">
            <center>
                <br><h1>ありがとうございました</h1>
                <br><h1>注文を確定しました</h1>
                <!-- 商品名とお届け日を表示 -->
                <p>商品名: <?php echo htmlspecialchars($name); ?></p>
                <p>お届け日: <?php echo isset($_SESSION['deliveryDate']) ? htmlspecialchars($_SESSION['deliveryDate']) : ''; ?></p>
                <br><button type="submit" class="button-input">ホームへ</button>
            </center>
        </div>
    </form>
</body>
</html>