document.addEventListener('DOMContentLoaded', function () {
    const previous = document.getElementById('previous');
    const next = document.getElementById('next');
    
    previous.addEventListener('click', function (event) {
        event.preventDefault();
        var page = this.dataset.page;
        if (page > 1) {
            page--;
            window.location.href = 'http://localhost/pagination_php_study/index.php?page=' + page;            
        }
    });

    next.addEventListener('click', function (event) {
        event.preventDefault();
        var page = this.dataset.page;
        var page_nums = this.dataset.page_nums;
        if (page !== page_nums) {
            page++;
            window.location.href = 'http://localhost/pagination_php_study/index.php?page=' + page;
        }        
    });
});
