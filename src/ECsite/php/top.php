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


<div class="centered-search">
  <form method="post" action="searchproductshow.php" class="search_container">
    <input type="text" size="10" name="key" placeholder="キーワード検索">
    <input type="submit" value="&#xf002">
  </form>
</div>

<div class="slideshow-container">
    <div class="mySlides fade">
        <img src="../image/umi1.png" style="width:300px">
    </div>

    <div class="mySlides fade">
        <img src="../image/肉.png" style="width:300px">
    </div>

    <div class="mySlides fade">
        <img src="../image/my.png" style="width:300px">
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>


<script src="../script/top.js"></script>

</body>
</html>

