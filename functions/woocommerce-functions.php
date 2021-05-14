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

    return $tabs;
}

/**
 * Rename tab
 */

function woo_rename_tabs( $tabs ) {
    $tabs['additional_information']['title'] = __( 'Egenskaper' );     // Rename the additional information tab

    return $tabs;
}

function woo_change_additional_information_header() {
	return __( 'Egenskaper', 'Egenskaper' );

}

/**
* Add a custom product data tab
*/

function woo_new_product_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['technical_tab'] = array(
		'title' 	=> __( 'Teknik', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_tech_tab_content'
    );

	return $tabs;

}
function woo_tech_tab_content() {
	echo '<h2>Teknik</h2>';	
     if(have_rows('produkttabbar')): 
          while(have_rows('produkttabbar')): the_row();
               if(get_row_layout() == 'tekniktabb'): 
                    the_sub_field('teknik');
               endif;
          endwhile;
     endif;
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

function woo_short_description_filter( $post_post_excerpt ) { 
     $queried_object = get_queried_object(); 
     $taxonomy = $queried_object->taxonomy;
     $term_id = $queried_object->term_id;  

     $checked = get_field('sidmall', $taxonomy . '_' . $term_id);
     if( !$checked  ) {
          return false;
     } else {
          return $post_post_excerpt; 
     }    
}