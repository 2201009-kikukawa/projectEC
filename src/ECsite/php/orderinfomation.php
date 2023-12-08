<?php
session_start();

// ログインしているかを確認
$loggedIn = isset($_SESSION["member"]);

// フォームから送信された情報を受け取り、セッションに保存する
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['saki'] = $_POST['saki'];
    $_SESSION['houhou'] = $_POST['houhou'];
    $_SESSION['day'] = $_POST['day'];
    $_SESSION['name'] = $_POST['name'];
}

$address = '';
if ($loggedIn && isset($_SESSION['member']['address'])) {
    $address = $_SESSION['member']['address'];
}

// 以前のお届け先情報をログインしている場合に取得してセッションに保存する（仮の例）
if ($loggedIn) {
    $_SESSION['saki'] = isset($_SESSION['saki']) ? $_SESSION['saki'] : '';
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注文情報入力</title>
    <link rel="stylesheet" href="../css/orderinfomation.css">
</head>

<body>
    <?php include("./menu.php"); ?>
    <div class="contents-container">
        <center>
            <h1>注文情報入力</h1>
        </center>
        <form action="cyumon-kanryou.php" method="post">
            <center>
                <h2 for="saki">お届け先</h2>
                <input type="text" id="saki" name="saki" value="<?php echo htmlspecialchars($address); ?>" required>
                <hr>
                <div class="select-arrow">
                    <h2 for="houhou">支払い方法</h2>
                    <select id="houhou" name="houhou" required>
                        <?php
                        if ($loggedIn) {
                            echo '<option value="credit">クレジット払い</option>';
                        }
                        ?>
                        <option value="credit_card">コンビニ払い</option>
                        <option value="bank_transfer">携帯払い</option>
                        <!-- 追加の支払い方法をここに追加 -->
                    </select>
                    <script src="https://cdn.jsdelivr.net/npm/datepicker.js"></script>
                    <hr>
                    <!-- お届け日のinput要素 -->
                    <h2 for="deliveryDate">お届け日（2日後から選択可能）</h2>
                    <div><input type="date" class="date" id="deliveryDate" name="deliveryDate" min="<?php echo date('Y-m-d', strtotime('+2 days')); ?>" required></div>

                    <div class="button-container">
                        <!-- 戻るボタンを常に表示 -->
                        <button type="submit" class="button-post"><a href="cart-show.php" class="button-post">戻る</a></button>
                        <button type="submit" class="button-back">確定</button>
                    </div>
                </div>
            </center>
        </form>
    </div>
</body>

</html>