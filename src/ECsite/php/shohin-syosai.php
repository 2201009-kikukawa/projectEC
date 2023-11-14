<?php require 'menu.php'; ?>
<?php require 'db-connect.php'; ?>

<?php
// 1. URLパラメータ 'product_id' の存在を確認

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // 2. データベース接続を確立
    $pdo = new PDO($connect, USER, PASS);

    // 3. 商品情報を取得
    $productQuery = $pdo->prepare('SELECT * FROM product WHERE id = ?');
    $productQuery->execute([$product_id]);
    $product = $productQuery->fetch();

    if ($product) {
        // 商品情報を表示
        echo '<p><img alt="image" src="image/', $product['id'], '.jpg"></p>';
        echo '<form action="cart-show.php" method="post">';
        echo '<p>商品名</p>';
        echo "<p>{$product['product_name']}</p>";
        echo "<p>{$product['price']} 円</p>";
        echo "<p>出荷予定日: {$product['delivery_date']}</p>";
        echo '<p>商品説明</p>';
        echo "<p>{$product['product_data']}</p>";

        // 4. 商品のレビュー情報を取得
        $reviewQuery = $pdo->prepare('SELECT * FROM reviews WHERE product_id = ?');
        $reviewQuery->execute([$product_id]);
        $reviews = $reviewQuery->fetchAll();

        foreach ($reviews as $review) {
            echo '<p><strong>ユーザー名:</strong>', $review['account_name'], '</p>';
            echo '<p><strong>評価:</strong>', $review['review_value'], '</p>';
            echo '<p><strong>投稿日 ', $review['review_date'], '</p>';
            echo '<p>', $review['review_text'], '</p>';
        }

        echo '<p><input type="submit" value="カートに入れる"></p>';
        echo '<input type="button" value="戻る" onClick="history.go(-1)">';
        echo '</form>';
    } else {
        echo "商品が見つかりません。";
    }
} else {
    echo "商品 ID が指定されていません。";
}
?>
