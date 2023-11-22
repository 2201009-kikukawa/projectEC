<!DOCTYPE html>
<html>

<head>
  <title>Login Form</title>
  <link rel="stylesheet" href="../css/login-input-admin.css">
</head>

<body>
  <?php include("./menu.php"); ?>
  <form action="login-output-admin.php" method="POST">
    <h1>鮮魚Online</h1>
    <h3>管理者ログインページ</h3>
    <div class="form-input">
      <div class="form-input-account">
        <label for="name">ログインID:</label>
        <input type="text" class="account_name" id="name" name="login_id" required><br>
      </div>
      <div class="form-input-password">
        <label for="pass">パスワード:</label>
        <input type="password" class="password" id="pass" name="pass" required>
      </div>
      <button type="submit" class="button-input">ログイン</button>
    </div>
    <img src="../image/umi2.png" alt="umi2" class="img">
  </form>
</body>

</html>