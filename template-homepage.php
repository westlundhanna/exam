<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: New Homepage
 *
 * @package storefront
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

        <?php
			if(get_field('sale_flash')):
				get_template_part('./template-parts/section-sale-flashes'); 
			endif;
			if(get_field('kategorier')):
				get_template_part('./template-parts/section-product-categories');
			endif;
			
			
					
		?>
		

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
