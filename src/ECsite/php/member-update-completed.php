<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
$password_hash = password_hash($_POST['register_pass'], PASSWORD_DEFAULT);

$pdo = new PDO($connect, USER, PASS);
$id=4;
$register_birthdate = $_POST['register_birthdate']; // フォームからの日付の値

// 日付のフォーマットを変更
$birthdate_formatted = date('Y-m-d', strtotime($register_birthdate));

$sql = $pdo->prepare('update menber set mell=?, PASSWORD=?, account_name=?,birthday=?, gender=?, post_num=?,address=?,payment_id=? where menber_id=?');
$sql->execute([
    $_POST['register_mell'], $password_hash,
    $_POST['register_account_name'],$birthdate_formatted,
    $_POST['gender'], $_POST['register-postcode'],
    $_POST['register_address'],$_POST['credit'],$id
]);
$_SESSION['menber']=[
    'id'=>$id, 'mell'=>$_POST['register_mell'],
    'password'=>$password_hash,'account_name'=>$_POST['register_account_name'],
    'birthday'=>$_POST['register_birthdate'],'gender'=>$_POST['gender'],
    'post_num'=>$_POST['register-postcode'],'address'=>$_POST['register_address'],
    'payment_id'=>$_POST['credit'],
    'credit_number'=>"", 'month'=>"",
    'year'=>"",'securitycode'=>""];

// 会員IDを取得
$member_id = $pdo->lastInsertId();

if ($_POST['credit'] == 1) { // "クレジットカード・デビットカード" が選択されているか確認
$month = $_POST['month']; // フォームから選択された月の値
$year = $_POST['year'];   // フォームから選択された年の値

// 有効期限を年月の形式で文字列として結合
$expiration_date = "{$year}-{$month}-28"; // 仮に日付を28日として設定

// 文字列をDATE型に変換
$expiration_date = date('Y-m-d', strtotime($expiration_date));



$sql = $pdo->prepare('update credit set credit_number=?, lifetime=?, securitycode=? where menber_id=?');
$sql->execute([
    $_POST['credit_name'],$expiration_date,
    $_POST['securitycord'],$member_id
]);

$_SESSION['menber']=[
    'id'=>$id, 'mell'=>$_POST['register_mell'],
    'password'=>$password_hash,'account_name'=>$_POST['register_account_name'],
    'birthday'=>$_POST['register_birthdate'],'gender'=>$_POST['gender'],
    'post_num'=>$_POST['register-postcode'],'address'=>$_POST['register_address'],
    'payment_id'=>$_POST['credit'],
    'credit_number'=>$_POST['credit_name'], 'month'=>$month,
    'year'=>$year,'securitycode'=>$_POST['securitycord']];
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <!-- cssの読み込み -->
    <link rel="stylesheet" href="../css/member-update-completed.css" />
    <title>会員情報更新画面</title>
</head>

<body>
    <!-- ヘッダーの読み込み -->
    <?php include("./menu.php"); ?>
    <form action="top.php" method="post">
        <div class="contents-container">
            <h1>更新完了</h1>
            <h3>アカウント情報が更新されました</h3>
            <button type="submit" class="button-input">サイトTOPへ戻る</button>
            <img src="../image/umi2.png" alt="umi2" class="img">
        </div>
    </form>
</body>

</html>