<?php 

defined('ABSPATH') or die;

function add_form_to_single_product() { 
    
    echo do_shortcode('[contact-form-7 id="109" title="order-form-canvas"]');

} 
function add_variations_to_order_form($scanned_tag, $replace) {
    global $product;
    
    if( $scanned_tag['name'] != 'cf7-dropdown-size' )
        return $scanned_tag; 
            
        if($product->is_type('variable')){
            foreach($product->get_available_variations() as $variation ){
                $variation_id = $variation['variation_id'];
                $active_price = floatval($variation['display_price']);
                $attributes = array();
                foreach( $variation['attributes'] as $key => $value ){
                    $taxonomy = str_replace('attribute_', '', $key );
                    $taxonomy_label = get_taxonomy( $taxonomy )->labels->singular_name;
                    $term_name = get_term_by( 'slug', $value, $taxonomy )->name;
                    $attributes[] = $taxonomy_label.': '.$term_name;

                    $scanned_tag['raw_values'][] = $term_name . $active_price;
                    $scanned_tag['labels'][] = $term_name . $active_price;
                }
            }
        }
        $pipes = new WPCF7_Pipes($scanned_tag['raw_values']);
        $scanned_tag['values'] = $pipes->collect_befores();
        $scanned_tag['pipes'] = $pipes;
        return $scanned_tag;
}
add_filter('wpcf7_autop_or_not', '__return_false');
