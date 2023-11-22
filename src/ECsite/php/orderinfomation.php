<!DOCTYPE html>
<html>
<head>
    <title>OI</title>
    <link rel="stylesheet" href="../css/orderinfomation.css">
</head>
<body>
<div class="contents-container">
    <?php include("./menu.php"); ?>
    <center>
        <h3>注文情報入力</h3>
    </center>
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
            <button type="submit" class="button-input">戻る</button>
            <button type="submit" class="button-input">確定</button>
        </div>
    </center>
    </form>
    </div>
</div>
</body>
</html>
