<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<link rel="stylesheet" href="../css/cyumon-kanryou.css">
<div class="container">
  <div class="box" id="box1">
    <div class="arrow"></div>
   
<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from customer where password = ?');
    $sql->execute([$_POST['password']]); 
    $row = $sql->fetch();

    if ($row) {
        $_SESSION['customer'] = [
            'id' => $row['id'], 'name' => $row['name'],
            'address' => $row['address'], 'login' => $row['login'],
            'password' => $row['password']
        ];
        echo '<link rel="stylesheet" href="../css/kanryou.css">';
        echo '<div class="centesr-content">';
        echo '<h2>ありがとうございます。<br>注文を確定しました</h2>';
        echo '<div class="container">';
        echo '<div class="box" id="box1">';
          echo '<div class="arrow"></div>';
          echo '<div class="text">商品名：', '魚','</div>';
          echo '<div class="text">お届け日：',' 2022-11-11','</div>';
        echo '</div>';
       
       
      echo '</div>';
        echo '<button onclick="location.href=\'./top.php\'" class="button-input">ホームへ</button>';
        echo '</div>';
      
    } else {
        echo '<link rel="stylesheet" href="../css/kanryou.css">';
        echo '<div class="center-content">';
        echo '<p>注文情報が入力されていません</p>';
        echo '</div>';
        echo '<img src="../image/umi2.png" class="gazou">'; 
    }
}


?>


  </div>
</div>