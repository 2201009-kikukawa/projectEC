<?php
session_start(); // セッションを開始
require 'menu.php';

// カート内の商品の合計金額を計算する関数
function calculateTotal($cart) {
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['count'];
    }
    return $total;
}

// カート内の商品を削除する
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    unset($_SESSION['product'][$id]);
}

// カート内の商品情報を取得
$cart = isset($_SESSION['product_id']) ? $_SESSION['product_id'] : [];
$total = calculateTotal($cart);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>カート一覧</title>
  <link rel="stylesheet" href="../css/cart.css">
</head>
<body>
    <h1>カート一覧</h1>

    <?php if (!empty($cart)): ?>
        <table>
            <tr>
                
                <th>商品番号</th>
                <th>商品画像</th>
                <th>商品名</th>
                <th>価格</th>
                <th>商品説明</th>
                <th>数量</th>
                <th>小計</th>
                <th>操作</th>
            </tr>
            <?php foreach ($cart as $id => $product): ?>
                <tr>
                    <td><?= htmlspecialchars($id) ?></td>
                    <td><?= htmlspecialchars($product['picture']) ?></td>
                    <td><?= htmlspecialchars($product['product_name']) ?></td>
                    <td><?= htmlspecialchars($product['price']) ?></td>
                    <td><?= htmlspecialchars($product['product_date']) ?></td>
                    <td><?= htmlspecialchars($product['count']) ?></td>
                    <td><?= htmlspecialchars($product['price'] * $product['count']) ?></td>
                    <td><a href="?action=delete&id=<?= htmlspecialchars($id) ?>">削除</a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="5">合計金額: <?= htmlspecialchars($total) ?></td>
            </tr>
        </table>
        <a href=".php">お買い物に戻る</a>
        <a href=".php">会計</a>
    <?php else: ?>
        <p>カートに商品がありません。</p>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="../script/cart.js"></script>
</body>
</html>