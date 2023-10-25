<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>一般商品一覧</title>
        <link rel="stylesheet" href="../../css/productshow.css">
    </head>
    <body>
        <?php require 'menu.php'?>
        <div class="continer">
        <header>
            <div class="pagetxt">一般商品</div>
            
            <div class="buttons">  
                <button type="submit" class="auctionbutton"><div class="auctiontxt">オークションに切り替える</div></button>
                <button type="submit" class="allshow"><div class="allshowtxt">すべて</div></button>
                
                <select name="sort" class="sort">
                    <option value="1"><div class = optiontxt>新着順</div></option>
                    <option value="2"><div class = optiontxt>レビュー数順</div></option>
                    <option value="3"><div class = optiontxt>売れ筋順</div></option>
                </select>
            </div>
        </header>

        <div class="container">
            <aside class="sidebar">
                <div class="sidemenu">
                    <div class="menuitem">魚種別</div>
                    <ul>
                        <li><a href="#">リンク1</a></li>
                        <li><a href="#">リンク2</a></li>
                        <li><a href="#">リンク3</a></li>
                    </ul>
                    <div class="menuitem">貝類・魚卵</div>
                    <ul>
                        <li><a href="#">リンク1</a></li>
                        <li><a href="#">リンク2</a></li>
                        <li><a href="#">リンク3</a></li>
                    </ul>
                    <div class="menuitem">加工品</div>
                    <ul>
                        <li><a href="#">リンク1</a></li>
                        <li><a href="#">リンク2</a></li>
                        <li><a href="#">リンク3</a></li>
                    </ul>
                </div>
            </aside>

            <main>
            <a href="#">
                <div class="mainitem">
                    <div class="itemimg">
                        <img src="../../image/肉.png" alt="魚の写真" style="height:100px; width: 170px;">
                    </div><br>

                    <div class="mainitemtxt">
                        <div class="shopname">お店の名前</div>
                        <div class="itemname">魚の名前</div>
                        <div class="price">価格￥~~~0</div>
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="mainitem">
                    <div class="itemimg">
                        <img src="../../image/肉.png" alt="魚の写真" style="height:100px; width: 170px;">
                    </div><br>

                    <div class="mainitemtxt">
                        <div class="shopname">お店の名前</div>
                        <div class="itemname">魚の名前</div>
                        <div class="price">価格￥~~~0</div>
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="mainitem">
                    <div class="itemimg">
                        <img src="../../image/肉.png" alt="魚の写真" style="height:100px; width: 170px;">
                    </div><br>

                    <div class="mainitemtxt">
                        <div class="shopname">お店の名前</div>
                        <div class="itemname">魚の名前</div>
                        <div class="price">価格￥~~~0</div>
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="mainitem">
                    <div class="itemimg">
                        <img src="../../image/肉.png" alt="魚の写真" style="height:100px; width: 170px;">
                    </div><br>

                    <div class="mainitemtxt">
                        <div class="shopname">お店の名前</div>
                        <div class="itemname">魚の名前</div>
                        <div class="price">価格￥~~~0</div>
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="mainitem">
                    <div class="itemimg">
                        <img src="../../image/肉.png" alt="魚の写真" style="height:100px; width: 170px;">
                    </div><br>

                    <div class="mainitemtxt">
                        <div class="shopname">お店の名前</div>
                        <div class="itemname">魚の名前</div>
                        <div class="price">価格￥~~~0</div>
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="mainitem">
                    <div class="itemimg">
                        <img src="../../image/肉.png" alt="魚の写真" style="height:100px; width: 170px;">
                    </div><br>

                    <div class="mainitemtxt">
                        <div class="shopname">お店の名前</div>
                        <div class="itemname">魚の名前</div>
                        <div class="price">価格￥~~~0</div>
                    </div>
                </div>
            </a>
            </main>
        </div>
        </div>
    </body>
</html>