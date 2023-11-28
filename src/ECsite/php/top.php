<?php require 'menu.php'; ?>
<link rel="stylesheet" href="../css/top.css">

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simple Slideshow</title>
<link rel="stylesheet" href="../css/top.css"> 
</head>
<body>
<!-- アニメーション（umianime.php） -->
<?php require 'umianime.php'; ?>

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

<div class="centered-search">
  <form method="post" action="searchproductshow.php" class="search_container">
    <input type="text" size="10" name="key" placeholder="キーワード検索">
    <input type="submit" value="&#xf002">
  </form>
</div>

<div class="slideshow-container">
    <div class="mySlides fade">
        <img src="../image/sample1" style="width:770px">
    </div>

    <div class="mySlides fade">
        <img src="../image/sample2.png" style="width:770px">
    </div>

    <div class="mySlides fade">
        <img src="../image/sample3" style="width:770px">
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>


<script src="../script/top.js"></script>

</body>
</html>

