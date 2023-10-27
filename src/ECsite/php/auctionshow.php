<?php require 'db-connect.php' ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>オークション商品一覧</title>
        <link rel="stylesheet" href="../../css/auctionshow.css">
    </head>
    <body>
        <?php require 'menu.php'?>
        <div class="continer">
        <header>
            <div class="pagetxt">オークション商品</div>
            
            <div class="buttons">  
                <button type="submit" class="auctionbutton"><a href="productshow.php" class="auctiontxt">一般商品に切り替える</a></button>
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
            <?php
            $pdo = new PDO($connect,USER,PASS);
            $sql = $pdo->query('SELECT * FROM product WHERE productflag = 1');
            foreach($sql as $row){
            require 'shopsearch.php';
            echo '<a href="#">';
               echo '<div class="mainitem">';
                   echo '<div class="itemimg">';
                        echo '<img src="../../image/',$row['picyure'],'" alt="魚の写真" style="height:100px; width: 170px;">';
                   echo '</div><br>';

                    echo '<div class="mainitemtxt">';
                       echo '<div class="shopname">',$shopname,'</div>';
                       echo '<div class="itemname">',$row['product_name'],'</div>';
                       echo '<div class="price">',$row['price'],'円</div>';
                    echo '</div>';
               echo '</div>';
           echo '</a>';
            }
            ?>
            </main>
        </div>
        </div>
    </body>
</html>