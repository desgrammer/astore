(function ($) {
    $.ajaxSetup({
        cache: true
    });
    $.getScript('https://connect.facebook.net/en_US/sdk.js', function () {
        FB.getLoginStatus((response) => {
            if (response.status != 'connected') {
                FB.login((response) => {
                    console.log(response);
                })
            }
        });
    });
})(jQuery)