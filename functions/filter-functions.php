<?php

defined('ABSPATH') or die;

/**
 * Add some product attribute categories to the list of query vars
 */
function product_filterby_query_var( $query_vars ) {
    $query_vars[] = 'filterby';

    return $query_vars;
}

function add_filter_template_part() {
    get_template_part('/template-parts/custom-product-filter');
}

/**
 * Filter products by category and product attributes
 * Hooks into the main query before launching
 * and manipulates the tax_query based on the value of 'filterby' in url querystring
 */
function product_wc_filterby( WP_Query $query ) {
    if ( ! is_admin() && $query->is_main_query()) {
        
        $filterby = get_query_var('filterby');
        if ( $filterby && is_array($filterby) ) {
            $tax_query = $query->get('tax_query');

            foreach( $filterby as $filter => $value ) {
                $value = preg_replace( '[^,a-z0-9\-_]', '', $value );
                if( empty($value) ) {
                    continue;
                }

                switch( $filter ) {
                    case 'product_cat':
                        $tax_query[] = [
                                'taxonomy' => 'product_cat',
                                'operator' => 'IN',
                                'field' => 'term_id',
                                'terms' => $value
                        ];
                        break;
                    case 'pa_farg':
                        $tax_query[] = [
                                'taxonomy' => 'pa_farg',
                                'operator' => 'IN',
                                'field' => 'term_id',
                                'terms' => $value
                        ];
                        break;
                    case 'pa_storlek':
                        $tax_query[] = [
                                'taxonomy' => 'pa_storlek',
                                'operator' => 'IN',
                                'field' => 'term_id',
                                'terms' => $value
                        ];
                        break;
                    case 'pa_stil':
                        $tax_query[] = [
                                'taxonomy' => 'pa_stil',
                                'operator' => 'IN',
                                'field' => 'term_id',
                                'terms' => $value
                        ];
                        break;
                    default:
                        break;
                }
            }
            $query->set('tax_query', $tax_query );
            
        }
        
    }
}