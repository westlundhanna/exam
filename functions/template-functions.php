<?php
defined('ABSPATH') or die;

function add_fullwidth_hero_under_header() {
    if( have_rows('hero') ):
		while ( have_rows('hero') ) : the_row();
			if( get_row_layout() == 'hero' ): 
				get_template_part('./template-parts/section-hero');  
			endif;
		endwhile;
	endif;  
}

function storefront_remove_sidebar_shop_page() {

	if ( is_shop() || is_tax( 'product_cat' ) || get_post_type() == 'product' ) {

		 remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
		 add_filter( 'body_class', 'storefront_remove_sidebar_class_body', 10 );
	}
}

function storefront_remove_sidebar_class_body( $wp_classes ) {

	$wp_classes[] = 'page-template-template-fullwidth-php';
	return $wp_classes;
}