<?php

require 'db-connect.php'; // データベース接続

// カートに商品を追加
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // 商品情報をデータベースから取得
    $stmt = $pdo->prepare("SELECT * FROM product WHERE product_id = ?");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch();

    if ($product) {
        if (!isset($_SESSION['product'][$product_id])) {
            $_SESSION['product'][$product_id] = array(
                'name' => $product['product_name'], 
                'price' => $product['price'], 
                'count' => $quantity
            );
        } else {
            $_SESSION['product'][$product_id]['count'] += $quantity;
        }
    }
}else{
    echo 'エラー';
}

// カートの内容を表示
echo '<div id="cart-app">';
if (!empty($_SESSION['product'])) {
    echo '<table>';
    echo '<tr><th>商品番号</th><th>商品名</th><th>価格</th><th>個数</th><th>小計</th><th>操作</th></tr>';
    foreach ($_SESSION['product'] as $id => $product) {
        echo "<tr>";
        echo "<td>", htmlspecialchars($id), "</td>";
        echo "<td>", htmlspecialchars($product['name']), "</td>";
        echo "<td>", htmlspecialchars($product['price']), "</td>";
        echo "<td><button @click=\"decrement('$id')\">-</button> {{ counts['$id'] }} <button @click=\"increment('$id')\">+</button></td>";
        echo "<td>{{ counts['$id'] * {$product['price']} }}</td>";
        echo "<td><a href=\"cart-delete.php?id=", htmlspecialchars($id), "\">削除</a></td>";
        echo "</tr>";
    }
    echo '</table>';
} else {
    echo 'カートに商品がありません。';
}
echo '</div>';
?>