</main>

<footer class="footer">
    <div class="container">
        <div class="row">
            <?php
            wp_nav_menu(
                array(
                    'theme_location'    => 'footer',
                    'container'         => 'div',
                    'container_class'   => 'footer__menu col-sm-12 col-md-2',
                    'menu_class'        => 'footer__menu__list',
                    'depth'             => 0,
                )
            );
            ?>

            <div class="footer__address col-sm-12 col-md-10">
                <strong class="footer__address__subject">홍익대학교 산업디자인과</strong>
                <address>서울시 마포구 와우산로 94 홍익대학교 조형관 904호 | <a href="tel:+8223201215">02 320 1215</a> | <a href="mailto:hiid@hongik.ac.kr">hiid@hongik.ac.kr</a></address>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
<script>
    $(document).ready(function() {
        var wrapper = $('.dropdown-menu-wrapper');
        wrapper.css({
            'height': wrapper.closest('.dropdown-menu').outerHeight()
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>
