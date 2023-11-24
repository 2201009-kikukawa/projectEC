<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OI</title>
    <link rel="stylesheet" href="../css/orderinfomation.css">
</head>
<body>
    <?php include("./menu.php"); ?>
    <div class="contents-container">
        <center>
            <h2>注文情報入力</h2>
        </center>
        <form action="submit_form.php" method="post"> <!-- フォームを追加 -->
            <center>
                <label for="saki">お届け先</label><br><br>
                <input type="text" id="saki" name="saki" required><br><br>
                
                <label for="houhou">支払い方法</label><br><br>
                <select id="houhou" name="houhou" required>
                    <option value="credit_card">クレジットカード</option>
                    <option value="bank_transfer">銀行振込</option>
                    <!-- 追加の支払い方法をここに追加 -->
                </select><br><br>
                <label for="hi">お届け日</label><br><br>
                <input type="text" id="hi" name="hi" placeholder="年/月/日" required><br><br>

                <div class="button-container">
                    <button type="submit" class="button-post">戻る</button>
                    <button type="submit" class="button-back">確定</button>
                </div>
            </center>
        </form> <!-- フォームを追加 -->
    </div>
</body>
</html>
