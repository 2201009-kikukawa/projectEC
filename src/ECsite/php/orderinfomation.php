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
        <form action="submit_form.php" method="post"> 
            <center>
                <label for="saki">お届け先</label><br><br>
                <input type="text" id="saki" name="saki" required><br><br>
                <div class="select-arrow">
                <label for="houhou">支払い方法</label><br><br>
                <select id="houhou" name="houhou" required>
                    <option value="credit_card">コンビニ払い</option>
                    <option value="bank_transfer">携帯払い</option>
                    <?php 
                        if(isset($_SESSION["member"])){
                            echo '<option value="credit">クレジット払い</option>';
                        }
                    ?>
                    <!-- 追加の支払い方法をここに追加 -->
                </select><br><br>
                <label for="hi">お届け日</label><br><br>
                <input type="text" id="hi" name="hi" placeholder="年/月/日" required><br><br>
                <div class="button-container">
                    <button type="submit" class="button-post"><a href="cart.php" class="button-post">戻る</a></button>
                    <button type="submit" class="button-back"><a href="cyumon-kanryou.php" class="button-back">確定</a></button>
                </div>
            </center>
        </form> 
    </div>
</body>
</html>
