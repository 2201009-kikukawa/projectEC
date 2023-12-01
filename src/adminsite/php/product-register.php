<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
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
    <?php include("./menu.php"); ?>
    <form action="product-register-completed.php" method="post" enctype="multipart/form-data">
        <div class="contents-container">
            <h1>新規商品登録</h1>
            <div class="required_item">
                <h3 class="required">必須項目</h3>
            </div>
            <div class="container">
                <div class="container-left">
                    <h3 class="required">商品名</h3>
                    <input type="text" name="product_name" class="form-input" required />
                    <p id="productNameError" class="error-message"></p>
                    <br>
                    <h3 class="required">魚の種類</h3>
                    <select>
                        <option value="0">魚種別</option>
                        <option value="1">貝類・魚卵</option>
                        <option value="2">加工品</option>
                    </select>
                    <h5>更に詳しく</h5>
                    <select name="subclass">
                        <option value="0">白身</option>
                        <option value="1">赤身</option>
                        <option value="2">甲殻類</option>
                        <option value="3">魚卵</option>
                        <option value="4">貝</option>
                        <option value="5">海藻</option>
                        <option value="6">魚の缶詰</option>
                        <option value="7">干しもの</option>
                        <option value="8">調理済み食品</option>
                    </select>
                    <br>
                    <h3 class="required">出品先選択</h3>
                    <select name="product_type">
                        <option value="0">一般商品</option>
                        <option value="1">オークション商品</option>
                    </select>
                </div>

                <div class="container-right">
                    <h3 class="required">商品の詳細記入欄</h3>
                    <textarea name="explanation" rows="6" cols="60" required></textarea>
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
                <label for="image" class="custom-file-upload">
                    ファイルからアップロード
                    <span class="label-text">(画像を選択)</span>
                </label>
                <input type="file" id="image" name="image" class="" accept="image/*" onchange="previewImage(event)">
                <img id="imagePreview" src="#" alt="プレビュー画像" style="display:none; max-width: 300px; margin-top: 10px;">
            </div>

            <button type="submit" class="button-input">登録</button>
            <!-- jsの読み込み -->
            <script src="../script/product-register.js"></script>
        </div>
    </form>
</body>

</html>