<?php session_start(); ?>
<?php include("./menu.php"); ?>
<?php require 'db-connect.php'; ?>
<?php
unset($_SESSION['member']);
$pdo=new PDO($connect,USER,PASS);

$sql=$pdo->prepare('select * from member where account_name=?');
$sql->execute([$_POST['name']]);
$row = $sql->fetch();

if ($row && password_verify($_POST['pass'],$row['PASSWORD'])) {
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
     header('Location: top.php'); // top.phpにリダイレクト
     exit(); // リダイレクトしたらスクリプトの実行を終了
} else {
    echo 'ログイン名またはパスワードが違います。';
}
?>
