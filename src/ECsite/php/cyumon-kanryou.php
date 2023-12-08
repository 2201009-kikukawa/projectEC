<?php
session_start();
require 'db-connect.php';
// ログインしているかを確認
$loggedIn = isset($_SESSION["member"]);
$productname = array();
$pdo = new PDO($connect,USER,PASS);
// フォームから送信された情報を受け取り、セッションに保存する
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $orderdate = array();
  $_SESSION['deliveryDate'] = $_POST['deliveryDate'];
  $_SESSION['saki'] = $_POST['saki'];

  $orderdate['deliveryDate'] = $_SESSION['deliveryDate'];
  $orderdate['saki'] = $_SESSION['saki'];
}

if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id => $cartItem) {
        $orderData['products'][] = array(
            'name' => $cartItem['name'],
            'price' => $cartItem['price'],
            'count' => $cartItem['count'],
            'picture' => $cartItem['picture'],
            'text' => $cartItem['text']
        );
        $productname[] = $cartItem['name'];

        $sql = "UPDATE product SET today_sales = today_sales + :count, inventory = inventory - :count WHERE product_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':count', $cartItem['count']);
        $stmt->bindParam(':id', $product_id);
        $stmt->execute();
    }
    require 'orderinsert.php';
}

unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
    <title>オークション終了画面</title>
    <link rel="stylesheet" href="../css/cyumon-kanryou.css">
</head>
<body>
    <?php include("./menu.php"); ?>
    <form action="top.php" method="post">
        <div class="contents-container">
            <center>
                <br><h1>ありがとうございました</h1>
                <br><h1>注文を確定しました</h1>
                <!-- 商品名とお届け日を表示 -->
                <?php foreach ($productname as $productName): ?>
                    <p>商品名: <?php echo htmlspecialchars($productName); ?></p>
                <?php endforeach; ?>
                <p>お届け日: <?php echo isset($_SESSION['deliveryDate']) ? htmlspecialchars($_SESSION['deliveryDate']) : ''; ?></p>
                <br><button type="submit" class="button-input">ホームへ</button>
            </center>
        </div>
    </form>
</body>
</html>