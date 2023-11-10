new Vue({
    el: '#app',
    data: {
        bitPrice: 0, // 入札金額を保持
        productData: productData, // 商品データをVue.jsのデータとして追加
        productId: 0,
    },
    methods: {
        formatTime(timeInSeconds) {
            const hours = Math.floor(timeInSeconds / 3600);
            const minutes = Math.floor((timeInSeconds % 3600) / 60);
            const seconds = timeInSeconds % 60;

            const formattedTime = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

            return formattedTime;
        },
        bitprice() {
            if (this.bitPrice > this.productData.currentprice) {                console.log('aaa');
                axios.post('update-bid.php', {
                    productId: this.productData.product_id,
                    bitPrice: this.bitPrice
                })
                .then(response => {
                    if (response) {
                        alert('入札が完了しました。');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }
                })
                .catch(error => {
                    console.error(error);
                });
            } else {
                alert('入札金額は現在の金額より高くする必要があります。');
            }
        },
    }
});
