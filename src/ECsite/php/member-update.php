<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<?php
$id = $mell = $password = $account_name = $birthday = $gender = $post_num = $address = $payment_id = $credit_number = $month = $year = $securitycode = '';
if (isset($_SESSION['member'])) {
    $id = $_SESSION['member']['id'];
    $mell = $_SESSION['member']['mell'];
    $password = $_SESSION['member']['password'];
    $account_name = $_SESSION['member']['account_name'];
    $birthday = $_SESSION['member']['birthday'];
    $gender = $_SESSION['member']['gender'];
    $post_num = $_SESSION['member']['post_num'];
    $address = $_SESSION['member']['address'];
    $payment_id = $_SESSION['member']['payment_id'];
    $credit_number = $_SESSION['member']['credit_number'];
    $month = $_SESSION['member']['month'];
    $year = $_SESSION['member']['year'];
    $securitycode = $_SESSION['member']['securitycode'];
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <!-- cssの読み込み -->
    <link rel="stylesheet" href="../css/member-update.css" />
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>会員情報更新画面</title>
</head>

<script>
    function pushHideButton() {
        var txtPass = document.getElementById("password");
        var btnEye = document.getElementById("buttonEye");
        if (txtPass.type === "text") {
            txtPass.type = "password";
            btnEye.className = "fa fa-eye";
        } else {
            txtPass.type = "text";
            btnEye.className = "fa fa-eye-slash";
        }
    }
</script>

<body>

    <!-- ヘッダーの読み込み -->
    <?php include("./menu.php"); ?>
    <form action="member-update-completed.php" method="post">
        <div class="contents-container">
            <h1>会員情報</h1>
            <div class="required_item">
                <h3 class="required">必須項目</h3>
            </div>
            <h2 class="required">メールアドレス</h2>
            <div class="input-edit">
                <input type="text" name="register_mell" class="form-input" id="email" required value="<?php echo $mell; ?>" />
                <button type="button" class="button-edit">編集</button>
            </div>
            <span class="error" id="email-error" style="color: red;"></span>
            <h2 class="required">パスワード</h2>
            <div class="input-edit">
                <input type="password" name="register_pass" class="form-input" id="password" required />
                <span id="buttonEye" class="fa fa-eye" onclick="pushHideButton()"></span>
                <button type="button" class="button-edit">編集</button>
            </div>
            <span class="error" id="password-error" style="color: red;"></span>
            <h2 class="required">アカウント名</h2>
            <div class="input-edit">
                <input type="text" name="register_account_name" class="form-input" id="account-name" required value="<?php echo $account_name; ?>" />
                <button type="button" class="button-edit">編集</button>
            </div>
            <span class="error" id="account-name-error" style="color: red;"></span>
            <h2 class="required">生年月日</h2>
            <div class="input-edit">
                <input type="text" name="register_birthdate" class="form-input" id="birthdate" required value="<?php echo $birthday; ?>" />
                <button type="button" class="button-edit">編集</button>
            </div>
            <span class="error" id="birthdate-error" style="color: red;"></span>
            <h2 class="required">性別</h2>
            <input type="radio" name="gender" value="1" <?php echo ($gender == '1') ? 'checked' : ''; ?> />女性<br />
            <input type="radio" name="gender" value="2" <?php echo ($gender == '2') ? 'checked' : ''; ?> />男性<br />
            <input type="radio" name="gender" value="3" <?php echo ($gender == '3') ? 'checked' : ''; ?> />その他<br />
            <span class="error" id="gender-error" style="color: red;"></span>
            <h2 class="required">郵便番号</h2>
            <div class="input-edit">
                <input type="text" name="register-postcode" class="form-input" id="postcode" required value="<?php echo $post_num; ?>" />
                <button type="button" class="button-edit">編集</button>
            </div>
            <span class="error" id="postcode-error" style="color: red;"></span>
            <h2 class="required">住所</h2>
            <div class="input-edit">
                <input type="text" name="register_address" class="form-input" id="address" required value="<?php echo $address; ?>" />
                <button type="button" class="button-edit">編集</button>
            </div>
            <span class="error" id="address-error" style="color: red;"></span>
            <h3 class="required">お支払方法の登録</h3>
            <input type="radio" name="credit" value="1" class="custom-radio" <?php echo ($payment_id == '1') ? 'checked' : ''; ?> />クレジットカード・デビットカード<br />
            <input type="radio" name="credit" value="2" class="custom-radio" <?php echo ($payment_id == '2') ? 'checked' : ''; ?> />コンビニ払い<br />
            <input type="radio" name="credit" value="3" class="custom-radio" <?php echo ($payment_id == '3') ? 'checked' : ''; ?> />携帯払い<br />
            <span class="error" id="payment-error" style="color: red;"></span>
            <h2>クレジットを登録されたお客様</h2>
            クレジットカード・デビットカード
            <input type="text" name="credit_name" class="credit_debit-input" id="credit-card-number" value="<?php echo $credit_number; ?>" />
            <span class="error" id="credit-card-number-error" style="color: red;"></span>
            <br><br>
            クレジットカード有効期間
            <select id="month" name="month" class="credit-input"></select>月
            <select id="year" name="year" class="credit-input"></select>年<br /><br>
            セキュリティコード
            <input type="text" name="securitycord" class="credit-input" id="security-code" value="<?php echo $securitycode; ?>" />
            <span class="error" id="security-code-error" style="color: red;"></span>
            <br>
            <button type="submit" class="button-input">会員情報を登録する</button>
            <!-- jsの読み込み -->
            <script src="../script/member-update.js"></script>
            <script src="../script/validate/member-update-validate.js"></script>
        </div>
    </form>
</body>

</html>