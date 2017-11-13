<?php
    the_post();

    if (is_front_page()) {
        echo get_the_content();
    } else {
        get_header();
        the_content();
        get_footer();
    }
