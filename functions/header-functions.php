<?php
defined('ABSPATH') or die;

// removes "menu" text next to hamburger menu
function remove_default_text_toggle_menu( $text ) {
    $text = __( ' ' );
    return $text;
}

// Append cart item (and cart count) to end of main menu.

function woo_custom_cart_icon( $items, $args ) {
	$cart_item_count = WC()->cart->get_cart_contents_count();
	$cart_count_span = '';
	if ( $cart_item_count ) {
		$cart_count_span = '<span class="count">'.$cart_item_count.'</span>';
	}
	$cart_link = '<li class="cart menu-item menu-item-type-post_type menu-item-object-page"><a href="' . get_permalink( wc_get_page_id( 'cart' ) ) . '"><span class="dashicons dashicons-cart"></span>'.$cart_count_span.'</a></li>';

	$items = $items . $cart_link;

	return $items;
}
