<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <!-- cssの読み込み -->
    <link rel="stylesheet" href="../../css/member-register-completed.css" />
    <title>会員登録完了画面</title>
</head>

<body>
    <!-- ヘッダーの読み込み -->
    <?php include("./menu.php"); ?>
    <form action="top.php" method="post">
        <div class="contents-container">
            <h1>登録完了</h1>
            <h3>アカウントが登録されました<br>
                さっそく商品を見てみましょう！</h3>
            <button type="submit" class="button-input">ホームへ</button>
            <img src="../../image/umi2.png" alt="umi2" class="img">
        </div>
    </form>
</body>

</html>