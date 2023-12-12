// 商品名のバリデーション
const productNameField = document.querySelector('input[name="product_name"]');
const productNameError = document.getElementById('productNameError');

productNameField.addEventListener('input', function () {
    const productNameValue = productNameField.value.trim();

    if (productNameValue.length > 50) {
        productNameError.textContent = '商品名は50文字以内で入力してください';
    } else {
        productNameError.textContent = '';
    }
    validateForm();
});

// 商品の詳細記入欄のバリデーション
const explanationField = document.querySelector('textarea[name="explanation"]');
const explanationError = document.getElementById('explanationError');

explanationField.addEventListener('input', function () {
    const explanationValue = explanationField.value.trim();

    if (explanationValue.length > 300) {
        explanationError.textContent = '商品の詳細は300文字以内で入力してください';
    } else {
        explanationError.textContent = '';
    }
    validateForm();
});

// 価格のバリデーション
const priceField = document.querySelector('input[name="price"]');
const priceError = document.getElementById('priceError');

priceField.addEventListener('input', function () {
    const priceValue = priceField.value.trim();

    // 半角数字の正規表現を追加
    const isNumeric = /^[0-9]+$/;

    if (!isNumeric.test(priceValue)) {
        priceError.textContent = '半角数字で入力してください';
    } else if (priceValue.length > 10) {
        priceError.textContent = '価格は10桁以内で入力してください';
    } else {
        priceError.textContent = '';
    }
    validateForm();
});

// 個数のバリデーション
const numberField = document.querySelector('input[name="number"]');
const numberError = document.getElementById('numberError');

numberField.addEventListener('input', function () {
    const numberValue = numberField.value.trim();

    // 半角数字の正規表現を追加
    const isNumeric = /^[0-9]+$/;

    if (!isNumeric.test(numberValue)) {
        numberError.textContent = '半角数字で入力してください';
    } else if (numberValue.length > 10) {
        numberError.textContent = '個数は10桁以内で入力してください';
    } else {
        numberError.textContent = '';
    }
    validateForm();
});


function validateImage() {
    const imageField = document.getElementById('image');
    const imageError = document.getElementById('imageError');
    const imageValue = imageField.value;

    // 画像が添付されていない場合
    if (!imageValue) {
        imageError.textContent = '画像を添付してください';
        event.preventDefault(); // フォーム送信をキャンセル
    } else {
        // 画像が添付されている場合はエラーメッセージをクリア
        imageError.textContent = '';
    }
}

// 送信ボタンがクリックされたときのフォーム全体のバリデーション
const submitButton = document.querySelector('button[type="submit"]');
submitButton.addEventListener('click', function (event) {
    validateForm();

    const form = document.querySelector('form');
    const errorFields = form.querySelectorAll('.error-message');

    // エラーフィールドが1つでもあればフォーム送信をブロック
    for (const errorField of errorFields) {
        if (errorField.textContent !== '') {
            event.preventDefault(); // フォーム送信をキャンセル
            break;
        }
    }
});



