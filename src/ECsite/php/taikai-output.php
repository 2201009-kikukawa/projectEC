<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require 'db-connect.php';
require 'menu.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('SELECT * FROM member WHERE member_id = :id');
    $sql->bindParam(':id', $_SESSION['member']['id']);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);

    if ($row && password_verify($password, $row['PASSWORD'])) {
        $sqlDeleteCredit = $pdo->prepare('DELETE FROM credit WHERE member_id = :id');
        $sqlDeleteCredit->bindParam(':id', $_SESSION['member']['id']);
        $sqlDeleteCredit->execute();

        $sqlDeleteMember = $pdo->prepare('DELETE FROM member WHERE member_id = :id');
        $sqlDeleteMember->bindParam(':id', $_SESSION['member']['id']);
        $sqlDeleteMember->execute();

        echo '<link rel="stylesheet" href="../css/kanryou.css">';
        echo '<div class="center-content">';

        if ($sqlDeleteCredit && $sqlDeleteMember) {
            echo '<h1>退会完了</h1>';
            echo '<p>アカウントは正常に削除されました。ご利用ありがとうございました。</p>';
            echo '<button onclick="location.href=\'./top.php\'" class="button-input">サイトTOPへ戻る</button>';
            unset($_SESSION['member']);
        } else {
            echo '<p>削除に失敗しました。</p>';
        }

        echo '</div>';
        echo '<img src="../image/umi2.png" class="gazou">';
    } else {
        echo '<script>alert("削除に失敗しました。");</script>';
        echo '<script>history.back();</script>';
    }
}
?>
