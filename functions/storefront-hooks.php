<?php
defined('ABSPATH') or die;

// Changes default text to toggle menu
add_filter( 'storefront_menu_toggle_text', 'remove_default_text_toggle_menu' );

// Adds hero before content
add_action('storefront_before_content', 'add_fullwidth_hero_under_header', 1);
add_action('storefront_homepage', 'add_gallery_images', 1);
// add_action('storefront_before_content', 'add_product_categories', 2);
add_action('storefront_before_content', 'add_product_categories_nav', 2);
add_action('storefront_before_content', 'add_banner');

add_action( 'init', 'remove_default_sorting_storefront' );

add_action( 'wp', 'storefront_remove_sidebar_shop_page' );

add_action( 'init', 'remove_actions_parent_theme', 1);

add_action( 'wp', 'storefront_remove_title_from_home_homepage_template' );


// * @hooked storefront_homepage_content      - 10
// 			 * @hooked storefront_product_categories    - 20
// 			 * @hooked storefront_recent_products       - 30
// 			 * @hooked storefront_featured_products     - 40
// 			 * @hooked storefront_popular_products      - 50
// 			 * @hooked storefront_on_sale_products      - 60
// 			 * @hooked storefront_best_selling_products - 70
// 			 */