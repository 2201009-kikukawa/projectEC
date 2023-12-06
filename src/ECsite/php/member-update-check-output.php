<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
require 'db-connect.php';

$pdo = new PDO($connect, USER, PASS);

$username = $_SESSION['member']['account_name'];
$password = $_POST['password'];

if (isset($username) && isset($password)) {
    $query = $pdo->prepare('SELECT * FROM member WHERE account_name = ?');
    $query->execute([$username]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $storedPassword = $result['PASSWORD'];
    }

    if (password_verify($password, $storedPassword)) {
        header("Location:member-update.php");
        exit();
    } else {
        echo '<script>';
        echo 'alert("パスワードが間違っています");';
        echo 'window.location.href = "member-update-check-input.php";'; // 間違った場合は前のページに戻る
        echo '</script>';
    }
} else {
    echo '<script>';
    echo 'alert("パスワードが入力されていません");';
    echo 'window.location.href = "member-update-check-input.php";'; // パスワードが入力されていない場合も前のページに戻る
    echo '</script>';
}
?>
