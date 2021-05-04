<?php
defined('ABSPATH') or die;

require_once __DIR__ . '/hooks.php';
require_once __DIR__ . '/woocommerce-functions.php';
require_once __DIR__ . '/template-functions.php';
require_once __DIR__ . '/header-functions.php';
require_once __DIR__ . '/enqueues.php';
require_once __DIR__ . '/form-functions.php';

// Function to register Wordpress menus
function wp_register_menus() {
    register_nav_menus(
      array(
        'single-product-form' => __( 'Single Product Form' ),
      )
    );
  }
add_action( 'init', 'wp_register_menus' );