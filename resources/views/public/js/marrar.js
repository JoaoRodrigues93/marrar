/**
 * Created by Nelson Alexandrino on 23/07/2015.
 */

$(document).ready(function () {

    $(window).scroll(function () {
        var n = $(window).scrollTop();

        n !=0 && n > 0?
            $('.headerNav').css({'position': 'fixed'}) :
            $('.headerNav').css({'position': 'absolute'});
    });

    $(window).scroll(function () {
        var n = $(window).scrollTop();
        n >= 20 ?
            ($('.headerNav').css({
                'background': '#2C97DE', 'padding-top': '4px', 'opacity': '0.96',
                'box-shadow': '0 7px 7px -7px #666'
            })) :
            ($('.headerNav').css({'background': 'transparent', 'padding-top': '25px', 'box-shadow': 'none'}));
    });

    if (window.addEventListener) window.addEventListener('DOMMouseScroll', wheel, false);
    window.onmousewheel = document.onmousewheel = wheel;

    function wheel(event) {
        var delta = 0;
        if (event.wheelDelta) delta = event.wheelDelta / 120;
        else if (event.detail) delta = -event.detail / 3;

        handle(delta);
        if (event.preventDefault) event.preventDefault();
        event.returnValue = false;
    }

    function handle(delta) {
        var time = 400;
        var distance = 532;

        $('html, body').stop().animate({
            scrollTop: $(window).scrollTop() - (distance * delta)
        }, time);
    }
});


$(document).ready(function () {
    $('a.scrolar').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });
});

$(document).ready(function () {
    $('a.scrolarAprender').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 200)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });
});

