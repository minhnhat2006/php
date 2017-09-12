<?php

// Polylang Shortcode - https://wordpress.org/plugins/polylang/
// Add this code in your functions.php
// Put shortcode [polylang] to post/page for display flags

function polylang_shortcode() {
	ob_start();
	pll_the_languages(array('show_flags'=>1,'show_names'=>1));
	$flags = ob_get_clean();
	return $flags;
}
add_shortcode( 'polylang', 'polylang_shortcode' );


add_filter( 'wp_nav_menu_items', 'single_custom_menu_item', 10, 2 );

function single_custom_menu_item ( $items, $args ) {

    if ($args->theme_location == 'primary') {
        $items .= do_shortcode('[polylang]');

        $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page">' .do_shortcode("[woocs show_flags=0 width='100px' txt_type='code']") . '</li>';
    }

    return $items;
}