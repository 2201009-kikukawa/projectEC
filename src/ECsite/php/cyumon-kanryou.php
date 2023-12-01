<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <!-- cssの読み込み -->
    <link rel="stylesheet" href="../css/cyumon-kanryou.css" />
    <title>注文完了画面</title>
</head>
<body>
    <!-- ヘッダーの読み込み -->
    <?php include("./menu.php"); ?>
    <form action="top.php" method="post">
        <div class="contents-container">
          <center>
            <br><h1>ありがとうございました</h1>
            <br><h1>注文を確定しました</h1>
            <input type="text" id="meihi" name="meihi" placeholder="商品名：xxxxxxxxxx" 
            "お届け日：xxxx年xx月xx日" required>
            <br><button type="submit" class="button-input">ホームへ</button>
            </center>
          </div>
      </form>
</body>
</html>