/**
 * Created by Nelson Alexandrino on 23/07/2015.
 */
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop()>100) {
            $('.headerNav').css('background', '#2C97DE');
        } else {
            $('.headerNav').css('background', 'transparent');
        }
    });
});