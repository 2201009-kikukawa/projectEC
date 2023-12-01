<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ComingSoon</title>
    <link rel="stylesheet" href="../css/ComingSoon.css">
</head>
<body>
    <?php require 'menu.php'?>
    <?php require 'umianime.php'; ?>
    <div class = "comingarea">
        <div class ="comingsoon">ComingSoon</div>
        <div class ="comingsoon2">このページは近日公開予定です。</div>
        <div class ="link"><a href="top.php" class ="alink">トップページに戻る</a></div>
    </div>
</body>
</html>