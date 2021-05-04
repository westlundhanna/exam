<?php
defined('ABSPATH') or die;

// Changes default text to toggle menu
add_filter( 'storefront_menu_toggle_text', 'remove_default_text_toggle_menu' );

// Adds hero before content
add_action('storefront_before_content', 'add_fullwidth_hero_under_header', 1);

// Title before thumbnail
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail' );

// Adds short description to product archive
add_action( 'woocommerce_after_shop_loop_item_title', 'woo_add_short_description' );

// Adds acf value with artist name to products
add_action('woocommerce_after_shop_loop_item_title', 'woo_add_artist_acf_to_products', 1);

add_action( 'wp', 'storefront_remove_sidebar_shop_page' );

// Removes excerpt from single product and replaces with full description
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'the_content', 10 );

// Removes product tabs from single product
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

// Removes product meta from single product
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );




// Function containing hooks that triggers for specific product category
add_action( 'wp', 'product_category_specific_hooks' );   
function product_category_specific_hooks(){

    wc_get_product();
 
     if ( has_term( 'canvas', 'product_cat') ):
        // adds menu to single product
        add_action('woocommerce_single_product_summary','add_nav_to_single_product_form', 20);
        // Adds form on single product page
        add_action('woocommerce_single_product_summary', 'add_form_to_single_product', 10);
        // Filter hook for cf7 form on single product page for canvas
        add_filter( 'wpcf7_form_tag', 'add_select_size_to_order_form', 10, 2);
        // Removes add to cart button
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

     endif;

}

