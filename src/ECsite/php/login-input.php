<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
<center><h2><div xmlns="http://www.w3.org/1999/xhtml" style="color: #FFA500; font-family: Inter; font-size: 32px; font-weight: bold;">
    鮮魚Online🐟
  </div></h2></center>
  <center><h3>ログインページ</h3></center>
<form action="login.php" method="POST"> <!-- フォームのアクションを適切なファイルに指定する -->
<center><div style="border: 3px solid; width: 300px;">
    <label for="name">アカウント名:</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="pass">パスワード:</label>
    <input type="password" id="pass" name="pass" required><br><br>
    <input type="submit" value="ログイン" style="background-color:#00bfff;">
    </div></center>
    <center><br><a href="mypage.php">新規登録はこちらから</a></br></center>
</form>
<div style="text-align: right">
<link rel="stylesheet" href="../css/sea.css">
  <img src="../../image/sea.png">
</div>
</div>
</body>
</html>