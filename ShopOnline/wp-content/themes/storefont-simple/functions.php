<?php

global $show_admin_bar;
$show_admin_bar = false;

function storefront_enqueue_parent_theme_style() {
    wp_enqueue_style( 'storefront-parent-style', get_template_directory_uri().'/style.css' );
    wp_dequeue_style( 'storefront-style' );
    wp_enqueue_style( 'storefront-simple-style', get_stylesheet_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'storefront_enqueue_parent_theme_style', 99 );

require("inc/header.php");