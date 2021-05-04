<?php 

defined('ABSPATH') or die;

function add_form_to_single_product() { 
    
    echo do_shortcode('[contact-form-7 id="109" title="order-form-canvas"]');

} 

function add_select_size_to_order_form($scanned_tag, $replace) {
    global $post;
    if( $scanned_tag['name'] != 'cf7-dropdown-size' )
        return $scanned_tag; 
            
            $sizes = get_the_terms($post, 'pa_storlek');
            
            foreach ( $sizes as $size ) {
                $scanned_tag['raw_values'][] = $size->name;
                $scanned_tag['labels'][] = $size->name;
            }
        $pipes = new WPCF7_Pipes($scanned_tag['raw_values']);
        $scanned_tag['values'] = $pipes->collect_befores();
        $scanned_tag['pipes'] = $pipes;
        return $scanned_tag;
}
add_filter('wpcf7_autop_or_not', '__return_false');
