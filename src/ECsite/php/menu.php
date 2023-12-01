<link rel="stylesheet" href="../css/menu.css">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<div class="footer">
  <div style="color: #FFA500; font-family: Inter; font-size: 32px; font-weight: bold; -webkit-text-stroke-width: 0.5px;
    -webkit-text-stroke-color: black;" onclick="redirectToTop()">
    鮮魚Online🐟
  </div>
  <script>
    // ロゴをクリックしたらtop.phpにリダイレクトする関数
    function redirectToTop() {
      window.location.href = "top.php";
    }
  </script>
  <div class="menu">
    <div class="menu-right">
    <?php
    // ユーザーがログインしているかどうかを確認
    if (isset($_SESSION['member'])) {
        // ログインしている場合はログアウトリンクを表示
        echo '<a href="logout.php" class="btn_06">ログアウト</a>';
    } else {
        // ログインしていない場合はログイン・会員登録リンクを表示
        echo '<a href="login-input" class="btn_06">ログイン・会員登録</a>';
    }
    ?>

    <a href="shohin-shibori.php" style="display: flex; align-items: center; text-decoration: none; flex-direction: column;">
        <img src="../image/kensaku.png" alt="検索" style="width: 25px; margin-bottom: 5px;">
        検索
      </a>
      <a href="notice.php" style="display: flex; align-items: center; text-decoration: none; flex-direction: column;">
      <img src="../image/beru.png" alt="通知" style="width: 25px; margin-bottom: 5px;">
        通知
      </a>
      <a href="cart-show.php" style="display: flex; align-items: center; text-decoration: none; flex-direction: column;">
      <img src="../image/cart.png" alt="カート" style="width: 25px; margin-bottom: 5px;">
      カート
      </a>
      <a href="mypage.php" style="display: flex; align-items: center; text-decoration: none; flex-direction: column;">
      <img src="../image/my.png" alt="検索" style="width: 25px; margin-bottom: 5px;">
        マイページ
      </a>
     
    </div>
  </div>
</div>
