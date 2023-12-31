<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <!-- cssの読み込み -->
    <link rel="stylesheet" href="../css/post-review-completed.css" />
    <title>レビュー投稿完了画面</title>
</head>

<body>
<?php require 'post-review-completed-output.php'?>
    <!-- ヘッダーの読み込み -->
    <?php include("./menu.php"); ?>
    <form action="shohin-syosai.php?id=<?php echo $product_id; ?>" method="post">
        <div class="contents-container">
            <h1>レビューを投稿しました</h1>
            <h3>レビューありがとうございました</h3>
            <button type="submit" class="button-input">注文詳細に戻る</button>
            <img src="../image/umi2.png" alt="umi2" class="img">
        </div>
    </form>
</body>

</html>