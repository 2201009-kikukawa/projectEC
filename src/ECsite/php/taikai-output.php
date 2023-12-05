<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require 'db-connect.php';
require 'menu.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = new PDO($connect, USER, PASS);

    $sql = $pdo->prepare('DELETE FROM member WHERE member_id = :id');
    $sql->bindParam(':id', $_SESSION['member']['id']);
    $sql->execute();

    echo '<link rel="stylesheet" href="../css/kanryou.css">';
    echo '<div class="center-content">';
    
    if ($sql) {
        echo '<h1>退会完了</h1>';
        echo '<p>アカウントは正常に削除されました。ご利用ありがとうございました。</p>';
        echo '<button onclick="location.href=\'./top.php\'" class="button-input">サイトTOPへ戻る</button>';
        unset($_SESSION['member']);
    } else {
        echo '<p>削除に失敗しました。</p>';
    }

    echo '</div>';
    echo '<img src="../image/umi2.png" class="gazou">';
}
?>

