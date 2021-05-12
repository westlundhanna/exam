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

function add_gallery_images() {
	get_template_part('./template-parts/gallery');
}
function add_product_categories() {
	get_template_part('./template-parts/section-product-categories');
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

function remove_actions_parent_theme() {
	remove_action('homepage', 'storefront_product_categories', 20 );
	remove_action('homepage', 'storefront_recent_products', 30 );
	remove_action('homepage', 'storefront_featured_products', 40 );
	remove_action('homepage', 'storefront_popular_products', 50 );
	remove_action('homepage', 'storefront_on_sale_products', 60 );
	remove_action('homepage', 'storefront_best_selling_products', 70 );
};

function storefront_remove_title_from_home_homepage_template() {
	remove_action( 'storefront_homepage', 'storefront_homepage_header', 10 );
}

function add_banner() {
	$term_id = get_queried_object()->term_id;
    $post_id = 'product_cat_'.$term_id;
	if(get_field('banner', $post_id) || get_field('banner')) {
	?>
	<div class="banner">
		<?php 
		if(is_product_category()) {
			the_field('banner', $post_id);
		} else {
			the_field('banner'); 
		}
		?>
	</div>
	<?php
	}
	
}