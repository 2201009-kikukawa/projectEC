<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <!-- cssの読み込み -->
    <link rel="stylesheet" href="../../css/member-register.css" />
    <title>会員登録画面</title>
</head>

<body>
    <!-- ヘッダーの読み込み -->
<?php include("./menu.php"); ?>
    <form action=".php" method="post">
        <div class="contents-container">
            <h1>会員登録</h1>
            <div class="required_item">
                <h3 class="required">必須項目</h3>
            </div>
            <h3 class="required">メールアドレス</h3>
            <input type="text" name="register_mell" class="form-input" required /><br>
            <h3 class="required">パスワード</h3>
            <input type="text" name="register_pass" class="form-input" required /><br>
            <h3 class="required">アカウント名</h3>
            <input type="text" name="register_account_name" class="form-input" required /><br>
            <h3 class="required">生年月日</h3>
            <input type="text" name="register_birthdate" class="form-input" required /><br>
            <h3 class="required">性別</h3>
            <input type="radio" name="gender" value="1" />女性<br />
            <input type="radio" name="gender" value="2" />男性<br />
            <input type="radio" name="gender" value="3" />その他<br /><br>
            <h3 class="required">郵便番号</h3>
            <input type="text" name="register_birthdate" class="form-input" required /><br>
            <h3 class="required">住所</h3>
            <input type="text" name="register_birthdate" class="form-input" required /><br>
            <h3 class="required">お支払方法の登録</h3>
            <div class="custom-radio">
            <input type="radio" name="credit" value="1" />クレジットカード・デビットカード<br />
            <input type="radio" name="credit" value="2" />コンビニ払い<br />
            <input type="radio" name="credit" value="3" />携帯払い<br /><br>
            </div>
            <h3>クレジットを登録されたお客様</h3>
            クレジットカード・デビットカード
            <input type="text" name="credit_name" class="" required /><br /><br>
            クレジットカード有効期間
            <select id="month"></select>月
            <select id="day"></select>日<br /><br>
            セキュリティコード
            <input type="text" name="securitycord" class="" required /><br />
            <button type="submit" class="button-input">会員情報を登録する</button>
            <!-- jsの読み込み -->
            <script src="../script/member-register.js"></script>
        </div>
    </form>
</body>

</html>