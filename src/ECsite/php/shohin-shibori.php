<?php session_start(); ?>
<?php require 'menu.php'; ?>
<link rel="stylesheet" href="../css/shohin-shibori.css">
<link rel="stylesheet" href="../script/shohin-shibori.js">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<div class="centered-search">
  <form method="post" action="searchproductshow.php" class="search_container">
    <input type="text" size="25" name="key" placeholder="キーワード検索">
    <input type="submit" value="&#xf002">
  </form>
</div>
<div class="wrapper">
    <h2>絞り込み検索</h2>
   
    <div class="search_area">
        
      <form action="searchproductshow.php" method="post" id="selectForm">
          <span id="sizeBox1">
            <label>
              <input type="checkbox" name="shibori1" value="1" class="checkbox_input size_sort">
              <span class="checkbox_parts"> 1000円未満</span></label><br>
            <label>
              <input type="checkbox" name="shibori2" value="2" class="checkbox_input size_sort">
              <span class="checkbox_parts"> 1000円以上5000円未満</span></label><br>
            <label>
              <input type="checkbox" name="shibori3" value="3" class="checkbox_input size_sort">
              <span class="checkbox_parts"> 5000円以上10000円未満</span></label><br>
            <label>
              <input type="checkbox" name="shibori4" value="4" class="checkbox_input size_sort">
              <span class="checkbox_parts">10000円以上</span></label><br>
          </span>
          <span id="sizeBox2">
            <label>
              <input type="checkbox" name="shibori5" value="0" class="checkbox_input size_sort">
              <span class="checkbox_parts"> 魚類</span></label><br>
            <label>
              <input type="checkbox" name="shibori6" value="1" class="checkbox_input size_sort">
              <span class="checkbox_parts"> 貝類・魚卵</span></label><br>
            <label>
              <input type="checkbox" name="shibori7" value="2" class="checkbox_input size_sort">
              <span class="checkbox_parts"> 加工品</span></label><br>
          </span>
    </div>
          <div class = buttonarea>
            <input type="reset" name="shibori" class="re-button" value="絞り込み項目をリセット">
            <input type="submit" name="shibori" class="kensaku-button" value="検索">
          </div>
      </form>
</div>
