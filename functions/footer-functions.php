<?php

defined('ABSPATH') or die;

function storefront_remove_footer_credit () {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    add_action( 'storefront_footer', 'custom_storefront_credit', 20 );
}

function custom_storefront_credit() {
    ?>
    <div class="site-info">
        © <?php echo get_bloginfo( 'name' ) . ' ' . get_the_date( 'Y' ); ?>
    </div><!-- .site-info -->
    <?php
}