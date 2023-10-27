<?php session_start(); ?>
<?php require 'menu.php'; ?>
<?php require 'db-connect.php'; ?>

<?php
    $pdo = new ec ($connect,USER,PASS);

    if($pdo->connect_error){
        die("データベース接続エラー: ".$pdo->connect_error);
    }

    $sql=$pdo->prepare('select*from product where id=?');
    $result = $pdo->query($sql);

    if($result->num_rows > 0){
        while ($row=$result->fetch_assoc()){
            $product_name = $row["product_name"];
            $price = $row["price"];
            $product_data = $row["product_data"];

        }
    }else{
        echo "データが見つかりませんでした";
    }

    $pdo->close();
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>商品詳細ページ</title>
</head>
<body>
    <main>
        <section class="product-details">
            <h1><?php echo $product_name; ?></h1>
            <p class = "price">価格: <?php echo $price; ?>円</p>
            <p><?php echo $product_data; ?></p>
            <button id="addToCartBtn">カートに追加</button>
</section>
</main>
</body>
</html>
