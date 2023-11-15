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
        <form action="post-review-completed.php" method="post">
            <h1>レビュー投稿</h1>
            <div class="required_item">
                <h3 class="required">必須項目</h3>
            </div>
            <hr>
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
            <p class="reviewP">レビュー本文</p>
            全角1000文字以下
            <textarea id="review" name="review" rows="12" cols="50"></textarea>


            <div class="button-container">
                <button type="button" class="button-back" onClick="history.go(-1)">戻る</button>
                <button type="submit" class="button-post">投稿する</button>
            </div>
            <!-- jsの読み込み -->
            <script src="../script/post-review.js"></script>
            <script src="../script/validate/post-review-validate.js"></script>
        </form>
    </div>
</body>

</html>