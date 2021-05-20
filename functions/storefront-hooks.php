<?php
defined('ABSPATH') or die;

// Changes default text to toggle menu
add_filter( 'storefront_menu_toggle_text', 'remove_default_text_toggle_menu' );

// Adds hero before content
// add_action('storefront_before_content', 'add_fullwidth_hero_under_header', 1);
add_action('storefront_homepage', 'add_gallery_images', 40);
add_action('storefront_page', 'add_gallery_images', 50);
add_action('storefront_homepage', 'add_fullwidth_section', 50);
add_action('storefront_homepage', 'add_products_section', 60);

// add_action('storefront_homepage', 'storefront_homepage_content', 1);
// add_action('storefront_before_content', 'add_product_categories', 2);
// add_action('storefront_before_content', 'add_product_categories_nav', 2);
add_action('storefront_before_content', 'add_banner');

add_action( 'init', 'remove_default_sorting_storefront' );

add_action( 'wp', 'storefront_remove_sidebar_shop_page' );

add_action( 'init', 'remove_actions_parent_theme', 1);

add_action( 'wp', 'storefront_actions' );


