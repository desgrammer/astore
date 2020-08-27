(function ($) {
    $.ajaxSetup({
        cache: true
    });
    $.getScript('https://connect.facebook.net/id_ID/sdk.js', function () {
        FB.init({
            appId: '356119118729500',
            version: 'v2.7'
        });
    });
})(jQuery)