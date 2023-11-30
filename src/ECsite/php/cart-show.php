<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require 'db-connect.php'; // データベース接続

// カートに商品を追加
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // 商品情報をデータベースから取得
    $pdo = new PDO($connect, USER, PASS);
    $stmt = $pdo->prepare("SELECT * FROM product WHERE product_id = :id");
    $stmt->bindParam(':id', $product_id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = array(
                'name' => $product['product_name'],
                'price' => $product['price'],
                'count' => $quantity,
                'picture' => $product['picture'],
                'text' => $product['product_data']
            );
        } else {
            $_SESSION['cart'][$product_id]['count'] += $quantity;
        }
    }
}
?>

<script> 
    if(<?php echo isset($_SESSION['cart'])?>){
        var cartData = <?php echo json_encode($_SESSION['cart'])?>;
    }else{
        var cartData = '';
    }
</script>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>カート一覧</title>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="../css/cart.css">
</head>
<body>
<div class="content" id="app">
    <div class="header"><?php require 'menu.php' ?></div>
    <div class="title">カート一覧</div><br>

    <?php if (empty($_SESSION['cart'])) : ?>
        <hr>
        <div class="no-items-message">カートに商品がありません。</div>
        <hr>
    <?php else : ?>
        <div class="totalprice">小計:{{ calculateTotal() }}</div>
        <hr>
        <div class = "continer" v-for="(item, id) in cart" :key="id">
        <div class = "mainitem">
                <div class = "flex1">
                    <div class = "productarea">
                        <img :src="'../image/' + item.picture" alt="魚の写真" class ="image">
                        <div class = productcontent>
                            <div class = "productname">{{item.name}}</div>
                            <div class = "productprice">￥{{item.price}}</div>
                        </div>
                    </div>
                    <div class = "buttonarea">
                        <div class = "incrementarea">
                            <button type="button" class = "minus" @click="minus(id)">-</button>
                            <div class = "productnum">{{item.count}}</div>
                            <button type="button" class = "plus" @click="plus(id)">+</button>
                        </div>
                        <div class = deletebutton>
                            <button type="button" class = "delete" @click="remove(id)">削除</button>
                        </div>
                    </div>
                </div>
                <div class = "flex2">
                    <div class = textarea>{{item.text}}</div>
                </div>
        </div>
        <hr>
        </div>
    <?php endif; ?>

    <div class="pagerinkarea">
        <div class="changereturn"><a href="searchproductshow.php" class="productlink">お買い物に戻る</a></div><br>
        <div class="changeorder"><a href="orderinfomation.php"class="orderlink">会計</a></div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="../script/cart.js"></script>
</body>
</html>
