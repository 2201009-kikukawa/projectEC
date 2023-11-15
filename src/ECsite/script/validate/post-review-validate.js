function validateForm() {
    // おすすめ度が選択されているか確認
    var ratingSelected = false;
    var ratingOptions = document.getElementsByName("rating");

    for (var i = 0; i < ratingOptions.length; i++) {
        if (ratingOptions[i].checked) {
            ratingSelected = true;
            break;
        }
    }

    // おすすめ度が選択されていない場合、アラートを表示してフォームの送信を防ぐ
    if (!ratingSelected) {
        alert("おすすめ度を選択してください。");
        return false;
    }

    // おすすめ度が選択されている場合、フォームの送信を継続
    return true;
}
