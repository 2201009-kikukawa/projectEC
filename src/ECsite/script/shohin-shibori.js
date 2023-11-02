let searchUi = ".search_ui"; // 絞り込み検索条件設定エリア
let listItem = ".item"; // 検索対象アイテム
let hideItem = "hide_item"; // 対象外アイテムに付与されるclass名
let checkBox = 'input[name="size"]'; //チェックボックスのnameを指定

// 絞り込み条件の変更
$(function () {
  $(document).on("change", searchUi + " input", function () {
    search_filter();
  });
});

function search_filter() {
  // 非表示状態を解除
  $(listItem).removeClass(hideItem);
  for (let i = 0; i < $(searchUi).length; i++) {
    let name = $(searchUi).eq(i).find("input").attr("name");
    // チェックされた検索条件を取得
    let searchData = get_selected_input_items(name);
    // チェック項目無し or 全てを選択している場合
    if (searchData.length === 0 || searchData[0] === "") {
      continue;
    }
    // リスト内の各アイテムをチェック
    for (let j = 0; j < $(listItem).length; j++) {
      // アイテムに設定している項目を取得
      let itemData = get_setting_values_in_item($(listItem).eq(j), name);
      // 絞り込み対象かどうかを調べる
      let check = array_match_check(itemData, searchData);
      if (!check) {
        $(listItem).eq(j).addClass(hideItem);
      }
    }
  }
}

// チェックの入った値の一覧を取得する
function get_selected_input_items(name) {
  let searchData = [];
  $("[name=" + name + "]:checked").each(function () {
    searchData.push($(this).val());
  });
  return searchData;
}

// リスト内のアイテムに設定している値の一覧を取得する
function get_setting_values_in_item(target, data) {
  let itemData = target.data(data);
  if (!Array.isArray(itemData)) {
    itemData = [itemData];
  }
  return itemData;
}

// 2つの配列内で一致する文字列があるかどうかを調べる
function array_match_check(arr1, arr2) {
  // 絞り込み対象かどうかを調べる
  let arrCheck = false;
  for (let i = 0; i < arr1.length; i++) {
    if (arr2.indexOf(arr1[i]) >= 0) {
      arrCheck = true;
      break;
    }
  }
  return arrCheck;
}

// 全サイズ選択解除
$(function () {
  $("#checkAll").on("click", function () {
    $(".size_sort").prop("checked", this.checked);
  });
  $(".size_sort").on("click", function () {
    if ($("#sizeBox :checked").length == $("#sizeBox :input").length) {
      $("#checkAll").prop("checked", "checked");
    } else {
      $("#checkAll").prop("checked", false);
    }
  });
});
