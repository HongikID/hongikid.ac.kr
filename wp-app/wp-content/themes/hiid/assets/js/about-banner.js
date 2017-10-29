$(document).ready(function () {
    var threshold = 1;
    var scrollEventTriggered = false;

    function onScrolled() {
        if (!scrollEventTriggered && window.pageYOffset >= threshold) {
            scrollEventTriggered = true;
            $('#about__welcome__canvas').animate({
                top: '0%'
            }, 400);

            $('#about__welcome__logo--light').addClass('triggered');
        }
    }

    // on resize
    window.addEventListener('scroll', onScrolled);
    onScrolled();
});
