<?php

defined('ABSPATH') or die;


add_filter('woocommerce_attribute_show_in_nav_menus', 'wc_reg_for_menus', 1, 2);

function wc_reg_for_menus( $register, $name = '' ) {
     if ( $name == 'pa_konstnarer' ) $register = true;
     return $register;
}


