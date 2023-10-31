// 月のオプションを生成
const monthSelect = document.getElementById("month");
for (let i = 1; i <= 12; i++) {
  const option = document.createElement("option");
  option.value = i;
  option.text = i;
  monthSelect.appendChild(option);
}

// 年のオプションを生成
const daySelect = document.getElementById("day");
for (let i = 2023; i <= 2040; i++) {
  const option = document.createElement("option");
  option.value = i;
  option.text = i;
  daySelect.appendChild(option);
}

document.addEventListener("DOMContentLoaded", function () {
  // 編集ボタンをクリックした際の処理
  var editButtons = document.querySelectorAll(".button-edit");
  editButtons.forEach(function (button, index) {
    button.addEventListener("click", function (event) {
      event.preventDefault(); // ボタンのデフォルトの動作を防ぎます
      var inputFields = document.querySelectorAll(".form-input");
      if (index < inputFields.length) {
        inputFields[index].focus(); // クリックされたボタンに対応する入力フィールドにフォーカスを移します
      }
    });
  });

  // 会員情報を登録するボタンをクリックした際の処理
  var submitButton = document.querySelector(".button-input");
  submitButton.addEventListener("click", function (event) {
    // ここにフォームの送信処理を記述するか、フォームのaction属性を設定しておくとフォームが送信されます
  });
});
