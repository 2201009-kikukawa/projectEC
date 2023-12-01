<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
$image = $product_name = $price = $product_data = '';

$image = $_SESSION['product']['image'];
$product_name = $_SESSION['product']['product_name'];
$price = $_SESSION['product']['price'];
$product_data = $_SESSION['product']['product_data'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <!-- cssの読み込み -->
    <link rel="stylesheet" href="../css/post-review.css" />
    <title>レビュー投稿画面</title>
</head>

<body>

    <!-- ヘッダーの読み込み -->
    <?php include("./menu.php"); ?>
    <div class="contents-container">
        <form id="reviewForm" action="post-review-completed.php" method="post" onsubmit="return validateForm()">
            <h1>レビュー投稿</h1>
            <div class="required_item">
                <h3 class="required">必須項目</h3>
            </div>
            <hr>
            <br>
            <?php
            echo '<div class="contents-container-sub">';
            echo '<img alt="image" class="image" src="../image/', $image, '">';
            echo '<div class="name-price">';
            echo '<div class="name">';
            echo $product_name;
            echo '</div>';
            echo '<div class="price">';
            echo $price."円";
            echo '</div>';
            echo '</div>';
            echo '<div class="explanation">';
            echo $product_data;
            echo '</div>';
            echo '</div>';
            ?>

            <br>
            <hr>
            <p class="recommend">おすすめ度</p>
            <div class="rating-stars">
                <input type="radio" name="rating" id="star1" value="1" />
                <label for="star1"></label>
                <input type="radio" name="rating" id="star2" value="2" />
                <label for="star2"></label>
                <input type="radio" name="rating" id="star3" value="3" />
                <label for="star3"></label>
                <input type="radio" name="rating" id="star4" value="4" />
                <label for="star4"></label>
                <input type="radio" name="rating" id="star5" value="5" />
                <label for="star5"></label>
            </div>
            <p id="rating-error" class="error"></p>
            <p class="reviewP">レビュー本文</p>
            全角1000文字以下
            <textarea id="review" name="review" rows="12" cols="50" oninput="validateReviewLength()"></textarea>
            <p id="review-length-error" class="error"></p>


            <div class="button-container">
                <button type="button" class="button-back" onClick="history.go(-1)">戻る</button>
                <button type="submit" class="button-post">投稿する</button>
            </div>
        </form>
    </div>
    <!-- jsの読み込み -->
    <script src="../script/post-review.js"></script>
    <script src="../script/validate/post-review-validate.js"></script>
</body>

</html>