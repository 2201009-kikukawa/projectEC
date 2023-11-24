<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="../css/login-output-admin.css">
</head>

<body>
    <?php include("./menu.php"); ?>
</body>

</html>
<?php
unset($_SESSION['shop']);
$pdo = new PDO($connect, USER, PASS);

$sql = $pdo->prepare('select * from shop where login_id = :login_id');
$sql->bindParam(':login_id', $_POST['login_id']);
$sql->execute();
$row = $sql->fetch();

if ($row && $row['password'] == $_POST['pass']) {
    $_SESSION['shop'] = [
        'shop_id' => $row['shop_id'],
        'shop_name' => $row['shop_name'],
        'login_id' => $row['login_id'],
        'password' => $row['password'],
        'mail' => $row['mail'],
        'shop_person' => $row['shop_person']
    ];
    // ログイン成功時の処理
    echo '<script>window.location.href = "product-register.php";</script>';
    exit(); // リダイレクトしたらスクリプトの実行を終了
} else {
    echo 'ログイン名またはパスワードが違います。';
}
?>