// Vue.jsコンポーネント内
new Vue({
    el: '#app',
    data: {
        selectedSort: '1', // デフォルトの選択肢
        products: [],
        filteredProducts: ''
    },
    methods: {
        updatesort() {
            if (this.selectedSort === '1') {
                // 新着順
                this.products = this.products.sort((a, b) => a.registerdate > b.registerdate ? -1 : 1);
            } else if (this.selectedSort === '2') {
                // 売れ筋順
                this.products = this.products.sort((a, b) => a.today_sales > b.today_sales ? -1 : 1);
            }
        },
        allshow() {
            axios.get('../php/get-auction.php')
                .then(response => {
                    this.products = response.data;
                    this.updatesort(); // データ取得後にソートを適用
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
        },
        formatTime(timeInSeconds) {
            const hours = Math.floor(timeInSeconds / 3600);
            const minutes = Math.floor((timeInSeconds % 3600) / 60);
            const seconds = timeInSeconds % 60;
            
            // ゼロパディングを適用して h:i:s 形式にフォーマット
            const formattedTime = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            
            return formattedTime;
          }
    },
    computed: {
        sortedProducts: function () {
            if (this.selectedSort === '1') {
                // 新着順
                return this.products.sort((a, b) => a.registerdate > b.registerdate ? -1 : 1);
            } else if (this.selectedSort === '2') {
                // 売れ筋順
                return this.products.sort((a, b) => a.today_sales > b.today_sales ? -1 : 1);
            }
        }
    },
    created: function () {
        this.allshow(); // 初期表示でデータを取得し、新着順にソート
    }
});
