<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>一般商品一覧</title>
    <link rel="stylesheet" href="../css/productshow.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
    <?php require 'menu.php'?>
    <div class="content" id="app">
        <header>
            <div class="pagetxt">一般商品</div>

            <div class="buttons">
                <button type="submit" class="auctionbutton"><a href="auctionshow.php" class="auctiontxt">オークションに切り替える</a></button>
                <button type="button" class="allshow" @click="allshow"><div class="allshowtxt">すべて</div></button>

                <select v-model="selectedSort" class="sort" @change="updatesort">
                    <option value="1">新着順</option>
                    <option value="2">レビュー数順</option>
                    <option value="3">売れ筋順</option>
                </select>
            </div>
        </header>

        <div class="container">
            <aside class="sidebar">
                <div class="sidemenu">
                <div class="menuitem">魚種別</div>
                    <ul>
                        <li><a href="#" @click="productsearch(0)">マグロ</a></li>
                        <li><a href="#" @click="productsearch(1)">サーモン</a></li>
                        <li><a href="#" @click="productsearch(2)">イカ</a></li>
                    </ul>
                    <div class="menuitem">貝類・魚卵</div>
                    <ul>
                        <li><a href="#" @click="productsearch(3)">イクラ</a></li>
                        <li><a href="#" @click="productsearch(4)">うに</a></li>
                        <li><a href="#" @click="productsearch(5)">とびっこ</a></li>
                    </ul>
                    <div class="menuitem">加工品</div>
                    <ul>
                        <li><a href="#" @click="productsearch(6)">魚の缶詰</a></li>
                        <li><a href="#" @click="productsearch(7)">干しもの</a></li>
                        <li><a href="#" @click="productsearch(8)">調理済み食品</a></li>
                    </ul>
                </div>
            </aside>

            <main>
                <div v-for="product in sortedProducts" :key="product.id" class="mainitem">
                    <a :href="'shohin-syosai.php?id=' + product.product_id">
                        <div class="itemimg">
                            <img :src="'../image/' + product.picture" alt="魚の写真" style="height:100px; width: 170px;">
                        </div>

                        <div class="mainitemtxt">
                            <div class="shopname">{{ product.shop_name }}</div>
                            <div class="itemname">{{ product.product_name }}</div>
                            <div class="price">{{ product.price }}円</div>
                        </div>
                    </a>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="../script/productshow.js"></script>
</body>
</html>