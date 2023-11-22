<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php include("./menu.php"); ?>
<?php
$pdo = new PDO($connect, USER, PASS);

$sql = $pdo->prepare('insert into product values(null,?,?,?,?,null,?,?,?,?,?)');
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
  <h3>登録が完了しました</h3>
  <form action="admin-top" method="POST"> <!-- フォームのアクションを適切なファイルに指定する -->
    <button type="submit" class="button-input">画面TOPへ戻る</button>
  </form>
  </div>
</body>

</html>