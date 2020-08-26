(function () {
    new Glide('.glide', {
        type: 'carousel',
        peek: {
            before: 200,
            after: 200
        },
        breakpoints: {
            767: {
                perView: 1,
                peek: {
                    before: 30,
                    after: 30
                }
            }
        }
    }).mount();
})(jQuery);