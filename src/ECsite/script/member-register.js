// 月のオプションを生成
const monthSelect = document.getElementById('month');
for (let i = 1; i <= 12; i++) {
    const option = document.createElement('option');
    option.value = i;
    option.text = i ;
    monthSelect.appendChild(option);
}

// 年のオプションを生成
const yearSelect = document.getElementById('year');
const currentYear = new Date().getFullYear();
for (let i = currentYear; i <= currentYear + 20; i++) {
    const option = document.createElement('option');
    option.value = i;
    option.text = i ;
    yearSelect.appendChild(option);
}