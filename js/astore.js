(function ($) {
    initBottomBar();
    initListProducts();
    searchEvent();
})(jQuery)

/**
 * load website event
 * 
 * @return void
 */
function initListProducts() {
    anime({
        targets: 'li.product',
        translateY: [50, 0],
        delay: anime.stagger(100) 
    })
}

/**
 * Search event on header
 * 
 * @return void
 */
function searchEvent() {
    const search = document.getElementById('headerSearch');
    search.addEventListener('input', function (evt) {
        searchResults = document.getElementsByClassName('search-result')[0].style.display = "block";
        anime({
            targets: '.search-products',
            height: [0, 240],
            easing: 'easeInOutExpo',
            duration: 500,
        })
        anime({
            targets: '.search-products li',
            opacity: [0, 1],
            delay: anime.stagger(100, {start: 400})
        })
    })
    search.addEventListener('focusout', function () {
        anime({
            targets: '.search-products',
            height: [240, 0],
            easing: 'easeInOutExpo',
        })
        anime({
            targets: '.search-products li',
            opacity: [1, 0],
            delay: anime.stagger(100, {from: 'last'})
        })
        setTimeout(() => {
            searchResults = document.getElementsByClassName('search-result')[0].style.display = "none";
        }, 1000);
    })
}

/**
 * Bottom bar event
 * 
 * @return void
 */
function initBottomBar() {
    anime({
        targets: '.fixed-bar',
        bottom: [-80, 0],
        delay: 1000,
        easing: 'easeInOutExpo'
    })
    const fixedButton = document.querySelectorAll('.fixed-bar a');
    
    fixedButton.forEach((item) => {
        item.addEventListener('click', (evt) => {
            const x = evt.target.offsetLeft;
            fixedButton.forEach((btn) => {
                btn.classList.remove('active');
                evt.target.classList.add('active');
                anime({
                    targets: '.effect',
                    left: `${x}px`,
                    duration: 600,
                })
            });
        })
    })
}