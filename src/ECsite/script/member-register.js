// 月のオプションを生成
const monthSelect = document.getElementById('month');
for (let i = 1; i <= 12; i++) {
    const option = document.createElement('option');
    option.value = i;
    option.text = i ;
    monthSelect.appendChild(option);
}

// 日のオプションを生成
const daySelect = document.getElementById('day');
for (let i = 1; i <= 31; i++) {
    const option = document.createElement('option');
    option.value = i;
    option.text = i ;
    daySelect.appendChild(option);
}
