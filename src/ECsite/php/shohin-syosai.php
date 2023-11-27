<?php
function displayStars($rating)
{
    $fullStars = floor($rating); // 完全な星の数
    $halfStars = ceil($rating - $fullStars); // 半分の星の数

    // 完全な星を表示
    for ($i = 0; $i < $fullStars; $i++) {
        echo '★';
    }

    // 半分の星を表示
    if ($halfStars > 0) {
        echo '☆';
    }

    // 星がない場合の処理（未評価の可能性）
    $emptyStars = 5 - $fullStars - $halfStars;
    for ($i = 0; $i < $emptyStars; $i++) {
        echo ' '; // 未評価のマーク
    }
}
function calculateAverageRating($reviews)
{
    $totalRating = 0;
    foreach ($reviews as $review) {
        $totalRating += $review['review_value'];
    }
    $averageRating = $totalRating / count($reviews);
    return $averageRating;
}

?>
<?php
require 'menu.php';
require 'db-connect.php';
echo '<link rel="stylesheet" href="../css/shohin-syosai.css">';
echo '<div class="contents-container">';
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $pdo = new PDO($connect, USER, PASS);

    $productQuery = $pdo->prepare('SELECT * FROM product WHERE product_id = ?');
    $productQuery->execute([$product_id]);
    $product = $productQuery->fetch();

    if ($product) {
        echo '<div class="contents-container-sub">';
        echo '<img alt="image" class="image" src="../image/', $product['picture'], '">';
        echo '<div class="product-info">';
        echo '<P class="subtitle">商品名</P>';
        echo "<p class='item'>{$product['product_name']}</p>";
        echo '<p class="subtitle">価格</p>';
        echo "<p class='item'>{$product['price']} 円</p>";
        echo '</div>';
        echo '</div>';
        echo '<p class="subtitle">商品説明</p>';
        echo "<p class='explanation'>{$product['product_data']}</p>";

        // レビュー情報とユーザー名を取得するクエリを実行
        $reviewDetailsQuery = $pdo->prepare(
            '
            SELECT review.*, member.account_name
            FROM review
            JOIN member ON review.member_id = member.member_id
            WHERE review.product_id = ?'
        );

        $reviewDetailsQuery->execute([$product_id]);
        $reviewDetails = $reviewDetailsQuery->fetchAll();

        if ($reviewDetails) {
            $averageRating = calculateAverageRating($reviewDetails); // レビューの平均評価を計算する関数を想定
            echo '<div class="contents-container-sub">';
            echo '<div class="subtitle-review">';
            echo 'レビュー ' . $averageRating . '   ';
            $averageRating . displayStars($averageRating);
            echo ' 投稿数: ' . count($reviewDetails) . '件';
            echo '</div>';
            echo '<form action="post-review.php" method="post">';
            echo '<input type="submit" class="button-input" value="レビューを投稿">';
            echo '</form>';
            echo '</div>';
            echo '<br>';
            echo '<hr>';
            foreach ($reviewDetails as $review) {
                echo '<p><strong>ユーザー名:</strong>', $review['account_name'], '</p>';
                echo '<p><strong>評価: </strong>' . $review['review_value'];
                displayStars($review['review_value']);
                echo '</p>';
                echo '<p><strong>投稿日:</strong>', $review['review_date'], '</p>';
                echo '<p>', $review['review_text'], '</p>';
                echo '<hr>';
            }
        } else {
            echo 'レビュー情報がありません。';
            echo '<form action="post-review.php" method="post">';
            echo '<input type="submit" class="button-input-nothing" value="レビューを投稿">';
            echo '</form>';
        }
    } else {
        echo "商品が見つかりません。";
    }
} else {
    echo "商品 ID が指定されていません。";
}
echo '</div>';
?>
<footer>
    <?php
    echo '<div class="contents-container">';
    echo '<form action="cart-show.php" method="post">';
    echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($product['product_id']) . '">';
    echo '<input type="number" name="quantity" value="1">';
    echo '<input type="submit" class="button-cart" value="カートに入れる">';
    echo '</form>';
    echo '<input type="button" class="button-back" value="戻る" onclick="javascript:history.go(-1)">';
    echo '</div>';
    ?>
</footer>