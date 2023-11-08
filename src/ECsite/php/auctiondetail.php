<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="UTF-8">
        <title>オークション商品説明と入札</title>
        <link rel="stylesheet" href="../css/auctiondetail.css">
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </head>
    <body>
        <header>
            <?php require 'menu.php'?>
        </header>

        <div class="content">
            <div class="headeritem">
                <div class ="time">残り時間の表示</div>
                <div class ="listlinkbutton">
                    <a href="#" class="listlink">入札商品リスト</a>
                </div>
            </div>

            <hr>

            <div class="maincontiner">
                <div class="mainitem1">
                    <div class="imgarea">
                        <img class="imgitem"src="../image/肉.png">
                    </div><br>
                    <div class="textarea">
                        <div class="textitem">食用とされる動物の筋肉，臓器，脂肪の総称。 畜肉，鳥肉，鯨肉その他，魚介などに大別されるが，魚介は除外される場合が多い。 太古から重要な蛋白源，カロリー源として摂取され，特に蛋白源としては植物性のそれより栄養的吸収が容易なため，必須食品の構成成分として大きな比重を占めてきた。</div>
                    </div>
                </div>
                <div class="mainitem2">
                    <div class="informationarea">
                        <div class="productname">新鮮な肉（とれたて！）</div><br>
                        <div class="menbername">現在の落札者</div>
                    </div><br>
                    <div class="pricearea">
                        <div class="notice">
                            <div class="finishtxt">終了時間をお知らせする</div><button class="noticebutton"><img class="belimg" src="../image/beru.png"></button><br>
                        </div>
                        <div class="currentpricetxt">現在の金額</div><br>
                        <div class="currentprice">10000円</div><br>
                        <div class="bitpricetxt">入札金額</div><br>
                        <div class="bitpricearea">
                            <input type="number" class="bitprice">円
                        </div><br>
                        <div class="bitbutton">
                            <a href="#" class="bitbuttontxt">入札</a>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <div class="returnbutton">
                    <a href="#" class="returnbuttontxt">戻る</a>
                </div>
            </footer>

        </div>
    </body>
</html>