<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="../css/login-output.css">
</head>

<body>
    <?php include("./menu.php"); ?>
</body>

</html>
<?php
unset($_SESSION['member']);
$pdo = new PDO($connect, USER, PASS);

$sql = $pdo->prepare('select * from member where account_name=:name');
$sql -> bindParam(':name',$_POST['name']);
$sql->execute();
$row = $sql->fetch();
$password_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);

if ($row && password_verify($_POST['pass'], $row['PASSWORD'])) {
    $_SESSION['member'] = [
        'id' => $row['member_id'],
        'mell' => $row['mell'],
        'password' => $row['PASSWORD'],
        'account_name' => $row['account_name'],
        'birthday' => $row['birthday'],
        'gender' => $row['gender'],
        'post_num' => $row['post_num'],
        'address' => $row['address'],
        'payment_id' => $row['payment_id']
    ];
    // ログイン成功時の処理
    echo '<script>window.location.href = "top.php";</script>';
    exit(); // リダイレクトしたらスクリプトの実行を終了
} else {
    echo 'ログイン名またはパスワードが違います。';
}
?>