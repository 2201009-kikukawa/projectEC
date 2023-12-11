new Vue({
    el: '#app',
    data: {
        selectedSort: '1',
        products: [],
        filteredProducts: [],
        searchdate: jsonData,
        currentPage: 1,
        itemsPerPage: 8,
        paginatedProducts: [],
        totalPages: 0
    },
    methods: {
        updatesort() {
            if (this.selectedSort === '1') {
                // 新着順
                this.filteredProducts.sort((a, b) => a.registerdate > b.registerdate ? -1 : 1);
            } else if (this.selectedSort === '2') {
                // レビュー数順
                this.filteredProducts.sort((a, b) => a.review_count > b.review_count ? -1 : 1);
            } else if (this.selectedSort === '3') {
                // 売れ筋順
                this.filteredProducts.sort((a, b) => a.today_sales > b.today_sales ? -1 : 1);
            }
            
            this.updateTotalPages();
            this.updatePaginatedProducts();
        },
        allshow() {
            axios.get('../php/get-products.php')
                .then(response => {
                    this.products = response.data;
                    this.filteredProducts = this.products;

                    this.updateTotalPages();
                    this.updatePaginatedProducts();
                })
                .catch(error => {
                    console.error('データの取得に失敗しました', error);
                });
        },
        productsearch(subclassId) {
            axios.get('../php/get-products.php')
                .then(response => {
                    this.products = response.data;
                    if (subclassId === null) {
                        // 全ての商品を表示
                        this.filteredProducts = this.products;
                    } else {
                        // 特定のサブクラスに絞り込み
                        this.filteredProducts = this.products.filter(product => product.subclass_id === subclassId);
                    }
                    this.currentPage = 1;
                    
                    this.updateTotalPages();
                    this.updatePaginatedProducts();
                })
                .catch(error => {
                    console.error('データの取得に失敗しました', error);
                });
        },
        searchform() {
            if (Object.values(this.searchdate).some(value => value !== '')) {
                axios.post('get-searchproduct.php', {
                        shibori1: this.searchdate.shibori1,
                        shibori2: this.searchdate.shibori2,
                        shibori3: this.searchdate.shibori3,
                        shibori4: this.searchdate.shibori4,
                        shibori5: this.searchdate.shibori5,
                        shibori6: this.searchdate.shibori6,
                        shibori7: this.searchdate.shibori7,
                        key: this.searchdate.key
                    })
                    .then(response => {
                        this.products = response.data;
                        this.filteredProducts = this.products;
                        this.currentPage = 1;
                        
                        this.updateTotalPages();
                        this.updatePaginatedProducts();
                    })
                    .catch(error => {
                        console.error('データの取得に失敗しました', error);
                    });
            } else {
                axios.get('../php/get-products.php')
                    .then(response => {
                        this.products = response.data;
                        this.filteredProducts = this.products;

                        this.updateTotalPages();
                        this.updatePaginatedProducts();
                    })
                    .catch(error => {
                        console.error('データの取得に失敗しました', error);
                    });
            }
        },
        showLoginAlert() {
            alert('オークション機能を使う場合はログインしてください。');
        },
        updatePaginatedProducts() {
            const startIndex = (this.currentPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            this.paginatedProducts = this.filteredProducts.slice(startIndex, endIndex);
        },
        updateTotalPages() {
            this.totalPages = Math.ceil(this.filteredProducts.length / this.itemsPerPage);
        },
        prevPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
                this.updatePaginatedProducts();
            }
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
                this.updatePaginatedProducts();
            }
        },
    },
    mounted() {
        this.searchform();
    },
    computed: {
        sortedProducts() {
            const sorted = [...this.filteredProducts];
            if (this.selectedSort === '1') {
                // 新着順
                return sorted.sort((a, b) => a.registerdate > b.registerdate ? -1 : 1);
            } else if (this.selectedSort === '2') {
                // レビュー数順
                return sorted.sort((a, b) => a.review_count > b.review_count ? -1 : 1);
            } else if (this.selectedSort === '3') {
                // 売れ筋順
                return sorted.sort((a, b) => a.today_sales > b.today_sales ? -1 : 1);
            }
        }
    },
});
