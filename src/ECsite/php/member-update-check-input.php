<?php require 'menu.php'; ?>
<link rel="stylesheet" href="../css/member-update-check.css">
<h1>会員情報の更新・確認</h1>
<p>会員情報を更新・確認するにはアカウントに登録された</br>パスワードを入力してください</p>

<form action="member-update-check-output.php" method="post">
        <div class="contents-container">
           
           
            <input type="password" name="password" class="form-input" required /><br>
            <button type="submit" class="button-input">確認</button>
        </div>
    </form>