<?php

global $show_admin_bar;
$show_admin_bar = false;

function storefront_enqueue_parent_theme_style() {
    wp_enqueue_style( 'storefront-parent-style', get_template_directory_uri().'/style.css' );
    wp_dequeue_style( 'storefront-child-style' );
    wp_enqueue_style( 'storefront-simple-style', get_stylesheet_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'storefront_enqueue_parent_theme_style', 99 );

// Button "Comppare" in single product page
if ( get_option('yith_woocompare_compare_button_in_product_page') == 'yes' ) {
	global $yith_woocompare;
	remove_action( 'woocommerce_single_product_summary', array( $yith_woocompare->obj, 'add_compare_link' ), 35 );
	add_action( 'woocommerce_single_product_summary', array( $yith_woocompare->obj, 'add_compare_link' ), 31 );
}

require("inc/header.php");