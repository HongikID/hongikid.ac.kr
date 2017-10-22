<?php

if ( ! isset( $content_width ) ) {
    $content_width = 968;
}

if (! function_exists('hiid_theme_setup')) :
    function hiid_theme_setup() {
        register_nav_menus( array(
            'header'   => __( 'Header', 'hiid' ),
            'footer' => __( 'Footer', 'hiid' )
        ) );
    }
endif;

add_action( 'after_setup_theme', 'hiid_theme_setup' );

require_once('bs4navwalker.php');
