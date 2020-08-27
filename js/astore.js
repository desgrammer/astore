(function ($) {
    initBottomBar();
    initListProducts();
})(jQuery)

function initListProducts() {
    anime({
        targets: 'li.product',
        translateY: [50, 0],
        delay: anime.stagger(100) 
    })
}

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