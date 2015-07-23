/**
 * Created by Nelson Alexandrino on 23/07/2015.
 */
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop()>100) {
            $('.headerNav').css('opacity', 0.7);
        } else {
            $('.headerNav').css('opacity', 1);
        }
    });
});

/*
$(document).ready(function(){
    $(window).scroll(function(){
            if($(this).scrollTop()>100){
                $('.logo').css({
                    height: "1.6875em",
                    width: "18em"
                });
                $('.headerNav').css({
                    height: "5em"
                });

            } else {
                $('.logo').css({
                    height: "3.6875em",
                    width: "20em"
                });
                $('.headerNav').css({
                    height: "7em"
                });
            }
        }

    );
});*/
