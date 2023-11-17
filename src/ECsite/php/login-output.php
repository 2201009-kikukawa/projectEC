<?php
require 'db-connect.php'; 

$account = $_POST['name'];
$pass = $_POST['pass'];

try {
    $pdo = new PDO($connect, USER, PASS);

    $sql = $pdo->prepare('SELECT * FROM member WHERE account_name = ?');
    $sql->execute([$account]);

    $row = $sql->fetch(PDO::FETCH_ASSOC);//データベースにアクセスできるかのエラーチェック

    if ($row && password_verify($pass, $row['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['name'] = $account;

        header('top.php');//ログインできた場合トップページに遷移
    } else {
        echo 'パスワードまたはログインが間違っています。';
    }
} catch (PDOException $e) {
    echo 'データベースエラー: ' . $e->getMessage();
}
?>