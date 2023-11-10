<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
$password_hash = password_hash($_POST['register_pass'], PASSWORD_DEFAULT);

$pdo = new PDO($connect, USER, PASS);

$register_birthdate = $_POST['register_birthdate']; // フォームからの日付の値

// 日付のフォーマットを変更
$birthdate_formatted = date('Y-m-d', strtotime($register_birthdate));

$sql = $pdo->prepare('insert into menber values(null,?,?,?,?,?,?,?,?)');
$sql->execute([
    $_POST['register_mell'], $password_hash,
    $_POST['register_account_name'],$birthdate_formatted,
    $_POST['gender'], $_POST['register-postcode'],
    $_POST['register_address'],$_POST['credit']
]);

// 会員IDを取得
$member_id = $pdo->lastInsertId();

if ($_POST['credit'] == 1) { // "クレジットカード・デビットカード" が選択されているか確認
$month = $_POST['month']; // フォームから選択された月の値
$year = $_POST['year'];   // フォームから選択された年の値

// 有効期限を年月の形式で文字列として結合
$expiration_date = "{$year}-{$month}-28"; // 仮に日付を1日として設定

// 文字列をDATE型に変換
$expiration_date = date('Y-m-d', strtotime($expiration_date));



$sql = $pdo->prepare('insert into credit values(null,?,?,?,?)');
$sql->execute([
    $member_id,$_POST['credit_name'],$expiration_date,
    $_POST['securitycord']
]);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <!-- cssの読み込み -->
    <link rel="stylesheet" href="../css/member-register-completed.css" />
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
            <img src="../image/umi2.png" alt="umi2" class="img">
        </div>
    </form>
</body>

</html>