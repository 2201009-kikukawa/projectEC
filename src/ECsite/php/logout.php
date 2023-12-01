<?php
session_start();

// ログアウト処理
unset($_SESSION['member']);
// ログアウト確認メッセージを表示
echo '<script>';
echo 'var confirmLogout = confirm("ログアウトしますか？");';
echo 'if (confirmLogout) {';
echo '  alert("ログアウトしました");';
echo '  window.location.href = "top.php";';
echo '} else {';
echo '  alert("ログアウトをキャンセルしました");';
// ログアウトをキャンセルした場合は直前のページに戻る
echo '  history.back();';
echo '}';
echo '</script>';
?>



