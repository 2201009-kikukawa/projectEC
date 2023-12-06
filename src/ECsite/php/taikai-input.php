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

<form action="taikai-output.php" method="post" onsubmit="return confirmAccountDeletion()">
    <div class="contents-container">
        <input type="password" name="password" class="form-input" required /><br>
        <button type="submit" class="button-input">アカウント削除</button>
    </div>
</form>

<script>
function confirmAccountDeletion() {
    <?php
    if (isset($_SESSION['member'])) {
        echo 'return confirm("アカウントを削除しますか？");';
    } else {
        echo 'alert("アカウントを削除するにはログインしてください");';
        echo 'return false;'; // PHPから直接 false を返すように修正
    }
    ?>
}
</script>
