<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>オークション終了画面</title>
    <link rel="stylesheet" href="../css/auctionfinish.css">
</head>
<body>
    <?php require 'get-auctiondetail.php' ?>
    <?php require 'umianime.php'?>

    
</body>
</html>