<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
$pdo = new PDO($connect, USER, PASS);

$sql = $pdo->prepare('insert into product values(null,?,?,?,?,?,CURRENT_TIMESTAMP,?,?,?,?)');
$sql->execute([
  $_POST['product_name'], $_POST['explanation'],
  $_POST['price'], 0,
  $_POST['number'],
  $_POST['image'],$_POST['product_type'],
  $_SESSION['shop']['shop_id'],$_POST['subclass']
]);
?>

<!DOCTYPE html>
<html>

<head>
  <title>新規商品登録画面</title>
  <link rel="stylesheet" href="../css/product-register-completed.css">
</head>

<body>
<?php include("./menu.php"); ?>
  <h3>登録が完了しました</h3>
  <form action="product-register.php" method="POST"> <!-- フォームのアクションを適切なファイルに指定する -->
    <button type="submit" class="button-input">新規商品登録へ戻る</button>
  </form>
  </div>
</body>

</html>