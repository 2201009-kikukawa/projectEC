<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<?php
$productId = $_GET['id'];
require 'get-auctiondetail.php';
$productdate = json_encode($product); // 商品データを JSON にエンコードし変数に格納
$Username = json_encode($_SESSION['member']['account_name']);
?>
<script>
    var productData = <?php echo $productdate ?>;
    var Username = <?php echo $Username?>;

    function formatTime(timeInSeconds) {
        const hours = Math.floor(timeInSeconds / 3600);
        const minutes = Math.floor((timeInSeconds % 3600) / 60);
        const seconds = timeInSeconds % 60;

        const formattedTime = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

        return formattedTime;
    }
</script>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>オークション商品説明と入札</title>
    <link rel="stylesheet" href="../css/auctiondetail.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    <header>
        <?php require 'menu.php' ?>
    </header>

    <div class="content" id="app">
        <div class="headeritem">
            <div class="time">
                <span>終了まで{{ formatTime(<?php echo $product['remaining_time'] ?>) }}</span>
            </div>
            <div class="listlinkbutton">
                <a href="#" class="listlink">入札商品リスト</a>
            </div>
        </div>

        <hr>

        <div class="maincontiner">
            <div class="mainitem1">
                <div class="imgarea">
                    <img src="../image/<?php echo $product['picture'] ?>" class="imgitem">
                </div><br>
                <div class="textarea">
                    <div class="textitem"><?php echo $product['product_data'] ?></div>
                </div>
            </div>
            <div class="mainitem2">
                <div class="informationarea">
                    <div class="productname"><?php echo $product['product_name'] ?></div><br>
                    <div class="menbername">最終落札者：<?php echo $product['finish_user'] ?></div>
                </div><br>
                <div class="pricearea">
                    <div class="notice">
                        <div class="finishtxt">終了時間をお知らせする</div><button class="noticebutton"><img class="belimg" src="../image/beru.png"></button><br>
                    </div>
                    <div class="currentpricetxt">現在の金額</div><br>
                    <div class="currentprice"><?php echo $product['currentprice'] ?>円</div><br>
                    <div class="bitpricetxt">入札金額</div><br>
                    <div class="bitpricearea">
                        <input type="number" class="bitprice" v-model="bitPrice">円
                    </div><br>
                    <div class="bitbutton">
                        <a href="#" class="bitbuttontxt" @click="bitprice">入札</a>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="returnbutton">
                <a href="auctionshow.php" class="returnbuttontxt">戻る</a>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="../script/auctiondetail.js"></script>
</body>

</html>

<script>
    var productData = <?php echo $productdate ?>;
    var remainingTime = <?php echo json_encode($product['remaining_time']); ?>;

    var intervalId = setInterval(function() {
        var formattedTime = formatTime(remainingTime);

        if (formattedTime === '00:00:00') {
            clearInterval(intervalId);
            window.location.href = 'auctionfinish.php';
        }

        remainingTime -= 1000;
    }, 1000);
</script>

<?php
// セッションのunset処理
unset($_SESSION['product_auction']);

$_SESSION['product_auction'] = [
    'price' => $product['currentprice'],
    'name' => $product['product_name'],
    'picture' => $product['picture'],
    'account_name' => $product['finish_user']
];
?>