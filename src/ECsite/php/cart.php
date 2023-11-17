<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="../css/cart.css">
</head>
<body>
    <h1>カート一覧</h1>
    
  <div id="app">
  <input type="hidden" name="price" id="price" :value="price">
  <p>小計: {{ total }}</p>
  <hr>
    <p calss="syohin">まぐろ</p>
    <img src="../image/肉.png" alt="">
    <p class="stsumeis">活きがよくおいしい</p>
    
    <p>￥: {{ price }}</p>
    <div class="count-container">
  <button class="button" @click="decrement">-</button>
  <p class="count-display">個数: {{ count }}</p>
  <button class="button" @click="increment">+</button>
</div>
   
    
    <hr>
  
    <button onclick="window.location.href='./'" class="">お買い物に戻る</button>
    <input type="submit" value="会計">
    
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="../script/cart.js"></script>
</body>
</html>
