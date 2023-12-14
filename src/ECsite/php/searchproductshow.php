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
    <?php
        $shibori1 = $shibori2 = $shibori3 = $shibori4 = $shibori5 = $shibori6 = $shibori7 = '';
        $key = "";
        if (!empty($_POST['shibori1'])) {
            $shibori1 = $_POST['shibori1'];
        }
        if (!empty($_POST['shibori2'])) {
            $shibori2 = $_POST['shibori2'];
        }
        if (!empty($_POST['shibori3'])) {
            $shibori3 = $_POST['shibori3'];
        }
        if (!empty($_POST['shibori4'])) {
            $shibori4 = $_POST['shibori4'];
        }
        if (!empty($_POST['shibori5'])) {
            $shibori5 = $_POST['shibori5'];
        }
        if (!empty($_POST['shibori6'])) {
            $shibori6 = $_POST['shibori6'];
        }
        if (!empty($_POST['shibori7'])) {
            $shibori7 = $_POST['shibori7'];
        }
        if(!empty($_POST['key'])){
            $key = $_POST['key'];
        }
        $filteredVariables = array_filter(compact('shibori1', 'shibori2', 'shibori3', 'shibori4', 'shibori5', 'shibori6', 'shibori7','key'), function ($value) {
            return true;
        });
        $jsonData = json_encode($filteredVariables);
    ?>
    <script>
        var flag = false;
        var urlParams = new URLSearchParams(window.location.search);
        var idFromUrl = urlParams.get('id');
        
        if (idFromUrl !== null) {
            flag = true;
        } 
        
        var jsonData = <?php echo $jsonData ?>; 
    </script>
    <div class="content" id="app">
        <header>
            <div class="pagetxt">一般商品</div>
            <div class="pagination" v-if="totalPages >= 2">
                    <button @click="prevPage" :disabled="currentPage === 1">前のページ</button>
                    <span>{{ currentPage }} / {{ totalPages }}</span>
                    <button @click="nextPage" :disabled="currentPage === totalPages">次のページ</button>
            </div>

            <div class="buttons">

            <?php
                if (isset($_SESSION['member'])) {
                    echo '<button type="submit" class="auctionbutton"><a href="auctionshow.php" class="auctiontxt">オークションに切り替える</a></button>';
                } else {
                    echo '<button type="button" class="auctionbutton" @click="showLoginAlert"><a href="#" class="auctiontxt">オークションに切り替える</a></button>';
                }
            ?>

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
                        <li><a href="#" @click="productsearch(0)">白身</a></li>
                        <li><a href="#" @click="productsearch(1)">赤身</a></li>
                        <li><a href="#" @click="productsearch(2)">甲殻類</a></li>
                    </ul>
                    <div class="menuitem">貝類・魚卵</div>
                    <ul>
                        <li><a href="#" @click="productsearch(3)">魚卵</a></li>
                        <li><a href="#" @click="productsearch(4)">貝</a></li>
                        <li><a href="#" @click="productsearch(5)">海藻</a></li>
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
                <div v-for="product in paginatedProducts" :key="product.id" class="mainitem">
                    <a :href="'shohin-syosai.php?id=' + product.product_id">
                        <div class="itemimg">
                            <img :src="'../image/' + product.picture" alt="魚の写真" class="product-image" style="height:100px; width: 170px;">
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
    <script src="../script/searchproductshow.js"></script>
</body>
</html>
