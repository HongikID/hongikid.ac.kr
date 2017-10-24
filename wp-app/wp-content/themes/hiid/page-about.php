<?php
get_header();
the_post();
$data = json_decode(get_the_content(), true);
?>
<div class="about">
    <div class="about__welcome">
        <div id="about__welcome__canvas" class="about__welcome__canvas accent-bg">
        </div>

        <div id="about__welcome__logo--dark" class="about__welcome__logo about__welcome__logo--dark"></div>
        <div id="about__welcome__logo--light" class="about__welcome__logo about__welcome__logo--light"></div>

    </div>
    <div style="background-color: white; height: 100vh;"></div>
</div>
<script>
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
</script>
<?php
get_footer();
?>
