<?php
defined('ABSPATH') or die;

add_filter( 'wp_nav_menu_main-menu_items', 'woo_custom_cart_icon', 5, 2 );

// Adds short description to product archive
add_action( 'woocommerce_after_shop_loop_item_title', 'woo_add_short_description' );

// Short description filter for where to display it 
add_filter( 'woocommerce_short_description', 'woo_short_description_filter', 10, 1 ); 

// Removes excerpt from single product and replaces with full description
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'the_content', 10 );

// Removes product tabs from single product
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

// Removes product meta from single product
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// Product tabs
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
add_filter( 'woocommerce_product_additional_information_heading', 'woo_change_additional_information_header' );
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );

// Product filter
add_filter( 'query_vars', 'product_filterby_query_var' );
add_action( 'custom_wc_products_sort', 'product_wc_filterby' );
add_action( 'pre_get_posts', 'product_wc_filterby', 11, 1 );
add_action('woocommerce_before_shop_loop', 'add_filter_template_part', 10);


// Products belonging to a category that has a true checkbox value will have a custom order form
add_action( 'wp', 'woo_custom_order_form' );

// Product categories that has a true checkbox value will have a custom template on archive page
add_action( 'wp', 'woo_custom_template' );  

add_action( 'woocommerce_sale_flash', 'add_discount_to_sale_badge', 25 );




