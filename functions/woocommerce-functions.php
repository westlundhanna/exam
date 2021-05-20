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

/**
* Function to use custom template for product categories archives and which hooks that should run 
* when ACF checkbox value is true 
*/
function woo_custom_template() {
     $queried_object = get_queried_object(); 
     $taxonomy = $queried_object->taxonomy;
     $term_id = $queried_object->term_id;  

     $checked = get_field('sidmall', $taxonomy . '_' . $term_id);

     if(is_product_category() && $checked) {
          remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
          remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 ); 
          remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
          add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 1);
          add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_title', 5);
          add_action( 'woocommerce_after_shop_loop_item_title', 'woo_add_read_more' );
     }
}

/**
* Function to display custom order form on single product page and which hooks that should run, when 
* ACF checkbox value for the product category is true 
*/
function woo_custom_order_form() {
     global $post;
     $terms = get_the_terms( $post->ID, 'product_cat' );

     if($terms) {
          foreach($terms as $term) {
               $term_id = $term->term_id;
               $taxonomy = $term->taxonomy;
          }
     }
          
     $checked_form = get_field('orderform', $taxonomy . '_' . $term_id);

     if(is_product() && $checked_form) {
          // Adds nav button that opens form
          add_action('woocommerce_single_product_summary','add_nav_to_single_product_form', 20);
          // Adds form on single product page
          add_action('woocommerce_single_product_summary', 'add_form_to_single_product', 10);
          // Filter hook for cf7 form on single product page
          add_filter('wpcf7_form_tag', 'add_variations_to_order_form', 10, 2);
          remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
     }
}
 
function add_discount_to_sale_badge() {
   global $product;
   if ( ! $product->is_on_sale() ) return;
   if ( $product->is_type( 'simple' ) ) {
      $max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
   } elseif ( $product->is_type( 'variable' ) ) {
      $max_percentage = 0;
      foreach ( $product->get_children() as $child_id ) {
         $variation = wc_get_product( $child_id );
         $price = $variation->get_regular_price();
         $sale = $variation->get_sale_price();
         if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
         if ( $percentage > $max_percentage ) {
            $max_percentage = $percentage;
         }
      }
   }
   if ( $max_percentage > 0 ) echo "<span class='onsale'>-" . round($max_percentage) . "%</span>"; // If you would like to show -40% off then add text after % sign
}
