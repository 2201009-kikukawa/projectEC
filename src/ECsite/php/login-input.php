<!DOCTYPE html>
<html>

<head>
  <title>Login Form</title>
  <link rel="stylesheet" href="../css/login.css">
</head>

<body>
  <?php include("./menu.php"); ?>
  <form action="login-output.php" method="POST"> <!-- フォームのアクションを適切なファイルに指定する -->
    <h1>鮮魚Online🐟</h1>
    <h3>ログインページ</h3>
    <div class="form-input">
    <label for="name">アカウント名:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="pass">パスワード:</label>
    <input type="password" id="pass" name="pass" required>
    </div>
    <button type="submit" class="button-input">ログイン</button>
    <br><a href="member-register.php">
      新規登録はこちらから
    </a></br>
    <img src="../image/umi2.png" alt="umi2" class="img">
  </form>
</body>

</html>