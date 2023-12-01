<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<?php require 'menu.php'; ?>
<link rel="stylesheet" href="../css/taikai.css">
<h2>退会ページ</h2>
<h1>パスワード確認</h1>
<p>アカウント削除のリクエストを完了するにはアカウントに登録された</br>パスワードを入力してください</p>




<form action="taikai-output.php" method="post">
        <div class="contents-container">
           
           
            <input type="password" name="password" class="form-input" required /><br>
            <button type="submit" class="button-input">アカウント削除</button>
        </div>
    </form>