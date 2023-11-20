function validateForm() {
    var productName = document.getElementById("product_name").value;
    var productNameError = document.getElementById("productNameError");

    // 商品名が50文字以上の場合にエラーメッセージを表示
    if (productName.length > 50) {
        productNameError.innerHTML = "商品名は50文字以下で入力してください。";
        productNameError.style.color = "red";
        return false; // エラーがあるためフォームを送信しない
    } else {
        productNameError.innerHTML = ""; // エラーメッセージをクリア
    }

    // 他のバリデーションロジックをここに追加

    return true; // エラーがない場合にフォームを送信
}
