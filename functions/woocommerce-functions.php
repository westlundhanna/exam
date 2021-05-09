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
 * Adds acf value Konstnär to products
 */ 
function woo_add_artist_acf_to_products() {
     if(get_field('konstnar')) { ?>
          <p class="artist-name"><?php the_field('konstnar'); ?></p>
     <?php
     }
}

/**
 * Adds acf value Kampanj to products
 */ 

function woo_add_campaign_acf_to_products() {
     if(get_field('kampanj')) { ?>
          <p class="campaign-text"><?php the_field('kampanj'); ?></p>
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
function add_product_categories_nav() {
     ?>
          <nav id="product-cat-nav-menu" role="navigation">
              <?php
                  wp_nav_menu( array( 
                      'theme_location' => 'product-categories', 
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

function woo_add_read_more() {
     global $product;
     if ( $product ) {
         $url = esc_url( $product->get_permalink() );
         echo '<a rel="nofollow" href="' . $url . '" class="read-more"><button class="read-more__button">Läs mer</button></a>';
     }
 }

 /**
  * Removes sorting div after shop loop
  */
 function remove_default_sorting_storefront() {
     remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
   }
 
