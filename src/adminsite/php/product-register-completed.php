<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<?php require 'db-connect.php'; ?>
<?php
$pdo = new PDO($connect, USER, PASS);

// 商品情報をデータベースに挿入
$sql = $pdo->prepare('insert into product values(null,?,?,?,?,?,CURRENT_TIMESTAMP,?,?,?,?)');
$sql->execute([
    $_POST['product_name'], $_POST['explanation'],
    $_POST['price'], 0,
    $_POST['number'],
    $_FILES['image']['name'], // アップロードされたファイルの名前を使用
    $_POST['product_type'],
    $_SESSION['shop']['shop_id'], $_POST['subclass']
]);

// 新しく挿入された商品の product_id を取得
$newProductId = $pdo->lastInsertId();

if($_POST['product_type'] == 1){
  $sql = $pdo->prepare('insert into auction values(null,?,?,?,?,?,?,?)');
  $sql->execute([
    $newProductId,$_POST['price'],
    $_POST['price'],'10:00:00',
    '10:23:00', 'テスト',
    $_SESSION['shop']['shop_id']
  ]);
}

// 画像のアップロード
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $targetDir = "../../ECsite/image/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);

    // 拡張子を取得
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // 許可されている拡張子
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $allowedExtensions)) {
        // ファイルを移動
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
    } else {
        echo "許可されていないファイル形式です。";
    }
} else {
    echo "ファイルのアップロードに失敗しました。";
}
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
    <form action="product-register.php" method="POST">
        <button type="submit" class="button-input">新規商品登録へ戻る</button>
    </form>
</body>

</html>
