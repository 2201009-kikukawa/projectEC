document.addEventListener('DOMContentLoaded', function () {
new Vue({
    el: '#app',
    data: {
      count: 0,
      price: 100
    },
    computed: {
      total: function() {
        return this.count * this.price;
      }
    },
    methods: {
      increment: function() {
        this.count += 1;
      },
      decrement: function() {
        if (this.count > 0) {
          this.count -= 1;
        }
      }
    }
  });
});