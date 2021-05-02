<?php
defined('ABSPATH') or die;

function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

// load theme function
if(file_exists( $file = get_stylesheet_directory() . '/functions/theme-functions.php' )) {
    require_once $file;
}