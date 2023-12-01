<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <!-- cssの読み込み -->
    <link rel="stylesheet" href="../css/member-register.css" />
    <title>会員登録画面</title>
</head>

<body>

    <!-- ヘッダーの読み込み -->
    <?php include("./menu.php"); ?>
    <form action="member-register-completed.php" method="post">
        <div class="contents-container">
            <h1>会員登録</h1>
            <div class="required_item">
                <h3 class="required">必須項目</h3>
            </div>
            <h2 class="required">メールアドレス</h2>
            <input type="text" name="register_mell" class="form-input" id="email" required />
            <span class="error" id="email-error" style="color: red;"></span>
            <br>
            <h2 class="required">パスワード</h2>
            <input type="text" name="register_pass" class="form-input" id="password" required />
            <span class="error" id="password-error" style="color: red;"></span>
            <br>
            <h2 class="required">アカウント名</h2>
            <input type="text" name="register_account_name" class="form-input" id="account-name" required />
            <span class="error" id="account-name-error" style="color: red;"></span>
            <br>
            <h2 class="required">生年月日</h2>
            <input type="text" name="register_birthdate" class="form-input" id="birthdate" required />
            <span class="error" id="birthdate-error" style="color: red;"></span>
            <br>
            <h2 class="required">性別</h2>
            <input type="radio" name="gender" value="1" />女性<br />
            <input type="radio" name="gender" value="2" />男性<br />
            <input type="radio" name="gender" value="3" />その他<br />
            <span class="error" id="gender-error" style="color: red;"></span>
            <br>
            <h2 class="required">郵便番号</h2>
            <input type="text" name="register-postcode" class="form-input" id="postcode" required />
            <span class="error" id="postcode-error" style="color: red;"></span>
            <br>
            <h2 class="required">住所</h2>
            <input type="text" name="register_address" class="form-input" id="address" required />
            <span class="error" id="address-error" style="color: red;"></span>
            <br>
            <h3 class="required">お支払方法の登録</h3>
            <input type="radio" name="credit" value="1" class="custom-radio" />クレジットカード・デビットカード<br />
            <input type="radio" name="credit" value="2" class="custom-radio" />コンビニ払い<br />
            <input type="radio" name="credit" value="3" class="custom-radio" />携帯払い<br />
            <span class="error" id="payment-error" style="color: red;"></span>
            <br>
            <h2>クレジットを登録されたお客様</h2>
            クレジットカード・デビットカード
            <input type="text" name="credit_name" class="credit_debit-input" id="credit-card-number"/>
            <span class="error" id="credit-card-number-error" style="color: red;"></span>
            <br><br>
            クレジットカード有効期間
            <select id="month" name="month"class="credit-input"></select>月
            <select id="year" name="year" class="credit-input"></select>年<br /><br>
            セキュリティコード
            <input type="text" name="securitycord" class="credit-input" id="security-code" />
            <span class="error" id="security-code-error" style="color: red;"></span>
            <br>
            <button type="submit" class="button-input">会員情報を登録する</button>
            <!-- jsの読み込み -->
            <script src="../script/member-register.js"></script>
            <script src="../script/validate/member-register-validate.js"></script>
        </div>
    </form>
</body>

</html>