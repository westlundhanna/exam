<?php

defined('ABSPATH') or die;

/**
 * Adds short description to archive product category page
 */ 

function woo_add_short_description() {
     global $product;
 
     ?>
     <div class="product-short-description">
          <?php echo apply_filters( 'woocommerce_short_description', $product->get_short_description() ) ?>
     </div>
     <?php
     
}

/**
 * Adds acf value to products
 */ 
function woo_add_artist_acf_to_products() {
     if(get_field('konstnar')) { ?>
          <p class="artist-name"><?php the_field('konstnar'); ?></p>
     <?php
     }
}

/**
 * Adds menu to single product
 */ 
function add_nav_to_single_product_form() {
?>
     <nav id="single-product-menu" role="navigation">
         <?php
             wp_nav_menu( array( 
                 'theme_location' => 'single-product-form', 
                 'container_class' => '' ) ); 
             ?>
     </nav>
<?php
}

/**
 * Remove product data tabs
 */

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );
    unset( $tabs['reviews'] );
    unset( $tabs['additional_information'] );

    return $tabs;
}

