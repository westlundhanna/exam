<?php

defined('ABSPATH') or die;
// Registers theme scripts
function register_theme_assets() {
    $assets_uri = get_stylesheet_directory_uri() . '/assets-src';

    wp_register_script('theme-script', $assets_uri . '/js/theme-script.js', array( 'jquery-migrate' ), null );
    wp_enqueue_script('theme-script');
    wp_enqueue_style('dashicons');

}
add_action( 'wp_enqueue_scripts', 'register_theme_assets' );