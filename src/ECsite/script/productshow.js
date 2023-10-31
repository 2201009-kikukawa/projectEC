// Vue.jsコンポーネント内
new Vue({
    el: '#app',
    data: {
        selectedSort: '1', // デフォルトの選択肢
        products: [],
        filteredProducts: ''
    },
    methods: {
        updatesort(){
            if (this.selectedSort === '1') {
             // 新着順
                return this.products.sort((a, b) => a.registerdate > b.registerdate ? -1 : 1);
            } else if (this.selectedSort === '2') {
                // レビュー数順
                return this.products.sort((a, b) => a.review_count > b.review_count ? -1 : 1);
            } else if (this.selectedSort === '3') {
                // 売れ筋順
                return this.products.sort((a, b) => a.today_sales > b.today_sales ? -1 : 1);
            }
        },
        allshow(){
            axios.get('../php/get-products.php')
            .then(response => {
                this.products = response.data;
            })
            .catch(error => {
                console.error('データの取得に失敗しました', error);
            });
        },
        productsearch(subclassId) {
            if (subclassId === null) {
                // 全ての商品を表示
                this.filteredProducts = this.products;
            } else {
                // 特定のサブクラスに絞り込み
                this.filteredProducts = this.products.filter(product => product.subclass_id === subclassId);
            }
        this.products = this.filteredProducts;
        }
    },
    computed: {
        sortedProducts: function () {
            if (this.selectedSort === '1') {
                // 新着順
                return this.products.sort((a, b) => a.registerdate > b.registerdate ? -1 : 1);
            } else if (this.selectedSort === '2') {
                // レビュー数順
                return this.products.sort((a, b) => a.review_count > b.review_count ? -1 : 1);
            } else if (this.selectedSort === '3') {
                // 売れ筋順
                return this.products.sort((a, b) => a.today_sales > b.today_sales ? -1 : 1);
            }
        }
    },
    created: function () {
        axios.get('../php/get-products.php')
        .then(response => {
            this.products = response.data;
        })
        .catch(error => {
            console.error('データの取得に失敗しました', error);
        });
    }
});