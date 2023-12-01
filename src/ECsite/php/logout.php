<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php 

// ログアウト処理
unset($_SESSION['member']);

// ログアウトメッセージを表示してトップページにリダイレクト
echo '<script>';
echo 'alert("ログアウトしました");';
echo 'window.location.href = "top.php";';
echo '</script>';
?>