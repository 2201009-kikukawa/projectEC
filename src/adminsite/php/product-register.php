<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <!-- cssの読み込み -->
    <link rel="stylesheet" href="../css/product-register.css" />
    <title>新規商品登録画面</title>
</head>

<body>

    <!-- ヘッダーの読み込み -->

<form action="product-register-completed.php" method="post">
        <div class="contents-container">
            <h1>新規商品登録</h1>
            <div class="required_item">
                <h3 class="required">必須項目</h3>
            </div>
            <h2 class="required">商品名</h2>
            <input type="text" name="register_mell" class="form-input" id="email" required />
            <span class="error" id="email-error" style="color: red;"></span>
            
            <button type="submit" class="button-input">登録</button>
            <!-- jsの読み込み -->
            <script src="../script/member-register.js"></script>
            <script src="../script/validate/member-register-validate.js"></script>
        </div>
    </form>
</body>

</html>