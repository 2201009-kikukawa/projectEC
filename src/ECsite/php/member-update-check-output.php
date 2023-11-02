<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from customer where password = ?');
    $sql->execute([$_POST['password']]); 
    $row = $sql->fetch();

    if ($row) {
        $_SESSION['customer'] = [
            'id' => $row['id'], 'name' => $row['name'],
            'address' => $row['address'], 'login' => $row['login'],
            'password' => $row['password']
        ];
        echo '<link rel="stylesheet" href="../css/kanryou.css">';
        echo '<div class="center-content">';
        echo '<h1>退会完了</h1>';
        echo '<p>アカウントは正常に削除されました</br>ご利用ありがとうございました</p>';
        echo '<button onclick="location.href=\'./top.php\'" class="button-input">サイトTOPへ戻る</button>';
        echo '</div>';
        echo '<img src="../image/umi2.png" class="gazou">'; 
    } else {
        echo '<link rel="stylesheet" href="../css/kanryou.css">';
        echo '<div class="center-content">';
        echo '<p>パスワードが違います</p>';
        echo '</div>';
        echo '<img src="../image/umi2.png" class="gazou">'; 
    }
}
?>
<?php require 'footer.php'; ?>