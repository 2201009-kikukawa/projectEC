// メールアドレスのバリデーション
const emailField = document.getElementById('email');
const emailError = document.getElementById('email-error');

emailField.addEventListener('input', function () {
    const emailValue = emailField.value.trim();
    const emailPattern = /^\S+@\S+\.\S+$/; // 基本的なメールアドレスのパターン

    if (emailValue === '') {
        emailError.textContent = 'メールアドレスを入力してください';
    } else if (!emailPattern.test(emailValue)) {
        emailError.textContent = '有効なメールアドレスを入力してください';
    } else if (emailValue.length > 50) {
        emailError.textContent = 'メールアドレスは50文字以内で入力してください';
    } else {
        emailError.textContent = '';
    }
    validateForm();
});

// パスワードのバリデーション
const passwordField = document.getElementById('password');
const passwordError = document.getElementById('password-error');

passwordField.addEventListener('input', function () {
    const passwordValue = passwordField.value;

    if (passwordValue === '') {
        passwordError.textContent = 'パスワードを入力してください。';
    } else if (passwordValue.length < 8) {
        passwordError.textContent = 'パスワードは8文字以上である必要があります。';
    } else if (passwordValue.length > 32) {
        passwordError.textContent = 'パスワードは32文字以内である必要があります。';
    } else {
        passwordError.textContent = '';
    }
    validateForm();
});

// アカウント名のバリデーション
const accountNameField = document.getElementById('account-name');
const accountNameError = document.getElementById('account-name-error');

accountNameField.addEventListener('input', function () {
    const accountNameValue = accountNameField.value;

    if (accountNameValue === '') {
        accountNameError.textContent = 'アカウント名を入力してください。';
    } else if (accountNameValue.length > 50) {
        accountNameError.textContent = 'アカウント名は50文字以内で入力してください。';
    } else {
        accountNameError.textContent = '';
    }
    validateForm();
});

// 生年月日のバリデーション
const birthdateField = document.getElementById('birthdate');
const birthdateError = document.getElementById('birthdate-error');

birthdateField.addEventListener('input', function () {
    const birthdateValue = birthdateField.value;

    if (birthdateValue === '') {
        birthdateError.textContent = '生年月日を入力してください.';
    } else if (!/^\d{8}$/.test(birthdateValue)) {
        birthdateError.textContent = '生年月日は8桁の数字で入力してください.';
    } else {
        birthdateError.textContent = '';
    }
    validateForm();
});

// 郵便番号のバリデーション
const postcodeField = document.getElementById('postcode');
const postcodeError = document.getElementById('postcode-error');

postcodeField.addEventListener('input', function () {
    const postcodeValue = postcodeField.value;

    if (postcodeValue === '') {
        postcodeError.textContent = '郵便番号を入力してください.';
    } else if (!/^\d{7}$/.test(postcodeValue)) {
        postcodeError.textContent = '郵便番号は7桁の数字で入力してください.';
    } else {
        postcodeError.textContent = '';
    }
    validateForm();
});

// 住所のバリデーション
const addressField = document.getElementById('address');
const addressError = document.getElementById('address-error');

addressField.addEventListener('input', function () {
    const addressValue = addressField.value;

    if (addressValue === '') {
        addressError.textContent = '住所を入力してください.';
    } else if (addressValue.length > 100) {
        addressError.textContent = '住所は100文字以内で入力してください.';
    } else {
        addressError.textContent = '';
    }
    validateForm();
});

// クレジットカード番号のバリデーション
const creditCardNumberField = document.getElementById('credit-card-number');
const creditCardNumberError = document.getElementById('credit-card-number-error');

creditCardNumberField.addEventListener('input', function () {
    const creditCardNumberValue = creditCardNumberField.value;

    if (creditCardNumberValue !== '' && !/^\d{16}$/.test(creditCardNumberValue)) {
        creditCardNumberError.textContent = 'クレジットカード番号は数字で16桁で入力してください.';
    } else {
        creditCardNumberError.textContent = '';
    }
    validateForm();
});

// セキュリティコードのバリデーション
const securityCodeField = document.getElementById('security-code');
const securityCodeError = document.getElementById('security-code-error');

securityCodeField.addEventListener('input', function () {
    const securityCodeValue = securityCodeField.value;

    if (securityCodeValue !== '' && !/^\d{3}$/.test(securityCodeValue)) {
        securityCodeError.textContent = 'セキュリティコードは3桁の数字で入力してください.';
    } else {
        securityCodeError.textContent = '';
    }
    validateForm();
});

// 性別のラジオボタンのバリデーション
function validateGender() {
    const genderRadios = document.getElementsByName('gender');
    let genderSelected = false;

    for (const radio of genderRadios) {
        if (radio.checked) {
            genderSelected = true;
            break;
        }
    }

    const genderError = document.getElementById('gender-error');
    if (!genderSelected) {
        genderError.textContent = '性別を選択してください';
    } else {
        genderError.textContent = ''; // ラジオボタンが選択されている場合、エラーメッセージをクリア
    }
    validateForm();
}

// 性別のラジオボタンの変更を監視
const genderRadios = document.getElementsByName('gender');
for (const radio of genderRadios) {
    radio.addEventListener('change', function () {
        validateGender();
    });
}

// お支払方法のラジオボタンのバリデーション
function validatePaymentMethod() {
    const paymentRadios = document.getElementsByName('credit');
    let paymentSelected = false;

    for (const radio of paymentRadios) {
        if (radio.checked) {
            paymentSelected = true;
            break;
        }
    }

    const paymentError = document.getElementById('payment-error');
    if (!paymentSelected) {
        paymentError.textContent = 'お支払方法を選択してください';
    } else {
        paymentError.textContent = ''; // ラジオボタンが選択されている場合、エラーメッセージをクリア
    }
    validateForm();
}

// お支払方法のラジオボタンの変更を監視
const paymentRadios = document.getElementsByName('credit');
for (const radio of paymentRadios) {
    radio.addEventListener('change', function () {
        validatePaymentMethod();
    });
}

// フォーム全体のバリデーションを行う関数
function validateForm() {
    const form = document.querySelector('form');
    const errorFields = form.querySelectorAll('.error');

    // エラーフィールドが1つでもあればフォーム送信をブロック
    for (const errorField of errorFields) {
        if (errorField.textContent !== '') {
            form.querySelector('button').disabled = true;
            return;
        }
    }

    // すべてのフィールドが正常な場合、フォーム送信を許可
    form.querySelector('button').disabled = false;
}

// 送信ボタンがクリックされたときのフォーム全体のバリデーション
const submitButton = document.querySelector('button[type="submit"]');
submitButton.addEventListener('click', function (event) {
    validateForm();
    validateGender(); // 性別のラジオボタンのバリデーションを実行
    validatePaymentMethod(); // お支払方法のラジオボタンのバリデーションを実行

    const form = document.querySelector('form');
    const errorFields = form.querySelectorAll('.error');

    // エラーフィールドが1つでもあればフォーム送信をブロック
    for (const errorField of errorFields) {
        if (errorField.textContent !== '') {
            event.preventDefault(); // フォーム送信をキャンセル
        }
    }
});


