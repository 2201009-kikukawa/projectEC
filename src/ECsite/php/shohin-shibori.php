<?php require 'menu.php'; ?>
<link rel="stylesheet" href="../css/shohin-shibori.css">
<link rel="stylesheet" href="../script/shohin-shibori.js">

<div class="wrapper">
    <h2>絞り込み検索</h2>
    <!-- 絞込み検索UI start -->
    <div class="search_area">
        
      <form id="selectForm">
        <div class="search_ui category_search_box">
       
        <div class="search_ui size_search_box pc"> <span id="sizeBox">
            <label>
              <input type="checkbox" name="size" value="ア行" class="checkbox_input size_sort">
              <span class="checkbox_parts">ア行</span></label>
            <label>
              <input type="checkbox" name="size" value="イ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">ハ行</span></label>
            <label>
              <input type="checkbox" name="size" value="1000円未満" class="checkbox_input size_sort">
              <span class="checkbox_parts"> 1000円未満</span></label>
            <label>
              <input type="checkbox" name="size" value="カ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">カ行</span></label>
            <label>
              <input type="checkbox" name="size" value="マ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">マ行</span></label>
            <label>
              <input type="checkbox" name="size" value="1000円以上5000円未満" class="checkbox_input size_sort">
              <span class="checkbox_parts"> 1000円以上5000円未満</span></label>
            <label>
              <input type="checkbox" name="size" value="サ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">サ行</span></label>
            <label>
              <input type="checkbox" name="size" value="ヤ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">ヤ行</span></label>
            <label>
              <input type="checkbox" name="size" value="5000円以上" class="checkbox_input size_sort">
              <span class="checkbox_parts"> 5000円以上</span></label>
            <label>
              <input type="checkbox" name="size" value="タ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">タ行</span></label>
            <label>
              <input type="checkbox" name="size" value="ラ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">ラ行</span></label>
            <label>
              <input type="checkbox" name="size" value="海水魚" class="checkbox_input size_sort">
              <span class="checkbox_parts"> 海水魚</span></label>
              <label>
              <input type="checkbox" name="size" value="ナ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">ナ行</span></label>
            <label>
              <input type="checkbox" name="size" value="ワ行" class="checkbox_input size_sort">
              <span class="checkbox_parts">ワ行</span></label>
            <label>
              <input type="checkbox" name="size" value="貝類・加工品" class="checkbox_input size_sort">
              <span class="checkbox_parts"> 貝類・加工品</span></label>
          </span>
        
        </div>
      </form>
    </div>
  
    <form action="sample.php" method="POST">
    <p>好きな色（複数回答可）: 
        <input type="checkbox" name="colors[]" value="white">白
        <input type="checkbox" name="colors[]" value="black">黒
        <input type="checkbox" name="colors[]" value="red">赤
        <input type="checkbox" name="colors[]" value="blue">青
        <input type="checkbox" name="colors[]" value="green">緑
    </p>
    <p><input type="submit" value="送信"></p>
</form>

<div>
  <input type="checkbox" id="checkbox1">
  <label for="checkbox1">チェックボックス1</label>
</div>
<div>
  <input type="checkbox" id="checkbox2">
  <label for="checkbox2">チェックボックス2</label>
</div>
<div>
  <input type="checkbox" id="checkbox3">
  <label for="checkbox3">チェックボックス3</label>
</div>