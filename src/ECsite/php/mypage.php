<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php require 'menu.php'; ?>
<link rel="stylesheet" href="../css/mypage.css">
<h1>マイページ</h1>

<div class="my-buttons">
    <button onclick="window.location.href='./top.php'" class="top-button">トップへ</button>
    <button onclick="window.location.href='ComingSoon.php'" class="my-button">注文履歴</button>
    <button onclick="window.location.href='./member-update-check-input.php'" class="my-button">会員情報更新</button>
    <button onclick="window.location.href='./taikai-input.php'" class="my-button">退会</button>
</div>
