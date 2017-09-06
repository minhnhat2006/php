jQuery(document).ready(function($){
    var header = $('.post-header-bg');

    $(window).scroll(function () {
        if ($(this).scrollTop() > 46) {
            header.addClass("header-fixed");
        } else {
            header.removeClass("header-fixed");
        }
    });
});