<?php require 'menu.php'; ?>
<link rel="stylesheet" href="../css/shohin-shibori.css">
<link rel="stylesheet" href="../script/shohin-shibori.js">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<div class="centered-search">
  <form method="get" action="#" class="search_container">
    <input type="text" size="25" placeholder="キーワード検索">
    <input type="submit" value="&#xf002">
  </form>
</div>
<div class="wrapper">
    <h2>絞り込み検索</h2>
   
    <div class="search_area">
        
      <form id="selectForm">
     <span id="sizeBox">
            <label>
              <input type="checkbox" name="shibori" value="ア行" class="checkbox_input size_sort">
              <span class="checkbox_parts">ア行</span></label>
            <label>
              <input type="checkbox" name="shibori" value="イ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">ハ行</span></label>
            <label>
              <input type="checkbox" name="shibori" value="1000円未満" class="checkbox_input size_sort">
              <span class="checkbox_parts"> 1000円未満</span></label>
            <label>
              <input type="checkbox" name="shibori" value="カ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">カ行</span></label>
            <label>
              <input type="checkbox" name="shibori" value="マ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">マ行</span></label>
            <label>
              <input type="checkbox" name="shibori" value="1000円以上5000円未満" class="checkbox_input size_sort">
              <span class="checkbox_parts"> 1000円以上5000円未満</span></label>
            <label>
              <input type="checkbox" name="shibori" value="サ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">サ行</span></label>
            <label>
              <input type="checkbox" name="shibori" value="ヤ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">ヤ行</span></label>
            <label>
              <input type="checkbox" name="shibori" value="5000円以上" class="checkbox_input size_sort">
              <span class="checkbox_parts"> 5000円以上</span></label>
            <label>
              <input type="checkbox" name="shibori" value="タ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">タ行</span></label>
            <label>
              <input type="checkbox" name="shibori" value="ラ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">ラ行</span></label>
            <label>
              <input type="checkbox" name="shibori" value="海水魚" class="checkbox_input size_sort">
              <span class="checkbox_parts"> 海水魚</span></label>
              <label>
              <input type="checkbox" name="shibori" value="ナ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">ナ行</span></label>
            <label>
              <input type="checkbox" name="shibori" value="ワ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">ワ行</span></label>
            <label>
              <input type="checkbox" name="shibori" value="貝類・加工品" class="checkbox_input size_sort">
              <span class="checkbox_parts"> 貝類・加工品</span></label>
          </span>
          
            <input type="reset" name="shibori" value="絞り込み項目をリセット">
            <input type="submit" name="shibori" value="検索">
        </div>
      </form>
    </div>