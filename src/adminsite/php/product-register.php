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
            <div class="container">
                <div class="container-left">
                    <h3 class="required">商品名</h3>
                    <input type="text" name="product_name" class="form-input" required />
                    <br>
                    <h3 class="required">魚の種類</h3>
                    <select>
                        <option value="1">魚種別</option>
                        <option value="2">貝類・魚卵</option>
                        <option value="3">加工品</option>
                    </select>
                    <h5>更に詳しく</h5>
                    <select>
                        <option value="1">マグロ</option>
                        <option value="2">サーモン</option>
                        <option value="3">イカ</option>
                        <option value="4">イクラ</option>
                        <option value="5">うに</option>
                        <option value="6">とびっこ</option>
                        <option value="7">魚の缶詰</option>
                        <option value="8">干しもの</option>
                        <option value="9">調理済み食品</option>
                    </select>
                    <br>
                    <h3 class="required">出品先選択</h3>
                    <select>
                        <option value="1">オークション商品</option>
                        <option value="2">一般商品</option>
                    </select>
                </div>

                <div class="container-right">
                    <h3 class="required">商品の詳細記入欄</h3>
                    <textarea name="explanation" rows="6" cols="60"></textarea>
                    <br>
                    <h3 class="required">価格</h3>
                    <input type="text" name="price" class="form-input-price" required />
                    <br>
                    <h3 class="required">個数</h3>
                    <input type="text" name="number" class="form-input-number" required />
                </div>
            </div>
            <br>
            <div class="image">
                <h3 class="required">画像の添付</h3>
                <input type="file" id="image" name="image" class="" accept="image/*">
            </div>

            <button type="submit" class="button-input">登録</button>
            <!-- jsの読み込み -->
            <script src="../script/product-register.js"></script>
            <script src="../script/validate/product-register-validate.js"></script>
        </div>
    </form>
</body>

</html>