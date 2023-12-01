<?php session_start();

// ログアウト処理
unset($_SESSION['member']);

// ログアウトメッセージを表示してトップページにリダイレクト
echo '<script>';
echo 'alert("ログアウトしました");';
echo 'window.location.href = "top.php";';
echo '</script>';
?>