<?php
/*
 Shortcode: ht-menu
*/

function ht_menu($params) {
	ob_start();
	wp_nav_menu($params);

	$output = ob_get_contents();
	ob_end_clean();

	return $output;
}
add_shortcode( 'ht-menu', 'ht_menu' );

/**
 * Filter the CSS class for a nav menu based on a condition.
 *
 * @param array  $classes The CSS classes that are applied to the menu item's <li> element.
 * @param object $item    The current menu item.
 * @return array (maybe) modified nav menu class.
 */
function ht_special_nav_class( $classes, $item ) {
    if ( 'CALL: 012-3456789' == $item->title ) {
        // Notice you can change the conditional from is_single() and $item->title
        $classes[] = "bubble";
    }
    return $classes;
}
add_filter( 'nav_menu_css_class' , 'ht_special_nav_class' , 10, 2 );
