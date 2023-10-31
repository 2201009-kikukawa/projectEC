<?php require 'menu.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>会員情報の更新・確認</title>
    </head>
    <body>
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/member-update-check.css">
        <div class="text">
            <h1>会員情報の更新・確認</h1>
            <p>会員情報を更新・確認するにはアカウントに登録されたパスワードを入力してください</p>
        </div>
        <div class="password">
            パスワード：<input type="password" name="password" id="password"><br>
        </div>
        <div class="button">
            <input type="submit" value="確認">
        </div>
    </body>
</html>