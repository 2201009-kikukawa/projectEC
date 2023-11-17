// post-review-validate.js

// 以前のエラーメッセージの初期化
function resetErrors() {
    var ratingError = document.getElementById("rating-error");
    var reviewLengthError = document.getElementById("review-length-error");

    ratingError.innerHTML = "";
    ratingError.style.color = "";

    reviewLengthError.innerHTML = "";
}

// おすすめ度のバリデーション
function validateRating() {
    resetErrors(); // 以前のエラーメッセージの初期化

    var ratingError = document.getElementById("rating-error");
    var ratingSelected = false;
    var ratingInputs = document.getElementsByName("rating");

    for (var i = 0; i < ratingInputs.length; i++) {
        if (ratingInputs[i].checked) {
            ratingSelected = true;
            break;
        }
    }

    if (!ratingSelected) {
        ratingError.innerHTML = "おすすめ度を選択してください。";
        ratingError.style.color = "red";
        return false;
    }

    return true;
}

// レビュー本文の文字数制限のバリデーション
function validateReviewLength() {
    resetErrors(); // 以前のエラーメッセージの初期化

    var review = document.getElementById("review").value;
    var maxLength = 1000;
    var reviewLengthError = document.getElementById("review-length-error");

    if (review.length > maxLength) {
        reviewLengthError.innerHTML = "レビュー本文は1000文字以下にしてください。";
        reviewLengthError.style.color = "red";
        return false;
    }

    return true;
}

// フォーム全体のバリデーション
function validateForm() {
    return validateRating() && validateReviewLength();
}

// おすすめ度ラジオボタンがクリックされたときにエラーメッセージをクリア
var ratingInputs = document.getElementsByName("rating");
for (var i = 0; i < ratingInputs.length; i++) {
    ratingInputs[i].addEventListener("click", function () {
        resetErrors(); // 以前のエラーメッセージの初期化
    });
}
