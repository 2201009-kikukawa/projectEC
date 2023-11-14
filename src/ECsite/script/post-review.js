document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.rating-stars input');
  
    stars.forEach(function (star) {
      star.addEventListener('change', function () {
        const rating = this.value;
        console.log('Selected rating:', rating);
        // ここで評価をサーバーに送信するなどの処理を行うことができます
      });
    });
  });