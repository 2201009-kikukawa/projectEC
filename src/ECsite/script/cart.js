new Vue({
    el: '#app',
    data: {
        cart: cartData,
    },
    methods: {
        plusmethod: function (id) {
            if (this.cart[id].count < this.cart[id].inventory) {
                this.cart[id].count++;
            }
        },
        minusmethod: function (id) {
            if (this.cart[id].count > 1) {
                this.cart[id].count--;
            }
        },
        remove: function (id) {
            axios.post('remove-from-cart.php', {
                productId: id
            })
            .then(response => {
                Vue.delete(this.cart, id);
            })
            .catch(error => {
                console.error('カートからアイテムを削除する際にエラーが発生しました:', error);
            });
        },
        calculateTotal: function () {
            return Object.values(this.cart).reduce((total, item) => total + (item.price * item.count), 0);
        }
    }
});

