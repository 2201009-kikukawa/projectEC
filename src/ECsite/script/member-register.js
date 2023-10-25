// 月のオプションを生成
const monthSelect = document.getElementById('month');
for (let i = 1; i <= 12; i++) {
    const option = document.createElement('option');
    option.value = i;
    option.text = i ;
    monthSelect.appendChild(option);
}

// 年のオプションを生成
const daySelect = document.getElementById('day');
for (let i = 2023; i <= 2040; i++) {
    const option = document.createElement('option');
    option.value = i;
    option.text = i ;
    daySelect.appendChild(option);
}
