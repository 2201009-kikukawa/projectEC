new Vue({
    el: '#app',
    data: {
        products: [],
    },
    created: function () {
        axios.get('../php/get-productranking.php')
        .then(response => {
            this.products = response.data;
        })
        .catch(error => {
            console.error('データの取得に失敗しました', error);
        });
    }
  });