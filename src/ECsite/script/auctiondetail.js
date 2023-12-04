new Vue({
    el: '#app',
    data: {
        bitPrice: 0, 
        productData: productData, 
        productId: 0,
        UserName: Username,
    },
    methods: {
        formatTime: formatTime,

        bitprice() {
            if (this.bitPrice > this.productData.currentprice) {
                axios.post('update-bid.php', {
                    productId: this.productData.product_id,
                    bitPrice: this.bitPrice,
                    username: this.UserName
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
