<?php
defined('ABSPATH') or die;

// removes "menu" text next to hamburger menu
function remove_default_text_toggle_menu( $text ) {
    $text = __( ' ' );
    return $text;
}
