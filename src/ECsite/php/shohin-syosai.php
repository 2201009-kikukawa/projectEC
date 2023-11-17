<?php
    function displayStars($rating) {
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
            echo '□'; // 未評価のマーク
        }
    }
?>    
<?php
require 'menu.php';
require 'db-connect.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $pdo = new PDO($connect, USER, PASS);

    $productQuery = $pdo->prepare('SELECT * FROM product WHERE product_id = ?');
    $productQuery->execute([$product_id]);
    $product = $productQuery->fetch();

    if ($product) {
        echo '<p><img alt="image" src="../image/', $product['picture'], '"></p>';
        echo '<form action="cart-show.php" method="post">';
        echo '<p>商品名</p>';
        echo "<p>{$product['product_name']}</p>";
        echo "<p>{$product['price']} 円</p>";
        echo '<p>商品説明</p>';
        echo "<p>{$product['product_data']}</p>";

        $reviewQuery = $pdo->prepare('SELECT AVG(review_value) AS average_rating, COUNT(*) AS total_reviews FROM review WHERE product_id = ?');
        $reviewQuery->execute([$product_id]);
        $reviews = $reviewQuery->fetch();
        
        if ($reviews && $reviews['average_rating'] !== null && $reviews['total_reviews'] !== null) {
            echo 'レビュー ';
            $averageRating = round($reviews['average_rating'], 2);
            displayStars($averageRating);
            echo ' 投稿数: '.$reviews['total_reviews'];
        
            $reviewDetailsQuery = $pdo->prepare('SELECT * FROM review WHERE product_id = ?');
            $reviewDetailsQuery->execute([$product_id]);
            $reviewDetails = $reviewDetailsQuery->fetchAll();
        
            foreach ($reviewDetails as $review) {
                echo '<p><strong>ユーザー名:</strong>', $review['account_name'], '</p>';
                echo '<p><strong>評価:</strong>', $review['review_value'], '</p>';
                echo '<p><strong>投稿日:</strong>', $review['review_date'], '</p>';
                echo '<p>', $review['review_text'], '</p>';
            }
        } else {
            echo 'レビュー情報がありません。';
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
