<?php
defined('ABSPATH') or die;

// changes default text to toggle menu
add_filter( 'storefront_menu_toggle_text', 'remove_default_text_toggle_menu' );


// adds hero before content
add_action('storefront_before_content', 'add_fullwidth_hero_under_header', 1);


