<?php
/*
 Shortcode: site-url
*/

function sc_site_url($params) {

	$path = isset($params['path']) ? $params['path'] : '';

	return site_url($path);
}
add_shortcode( 'site-url', 'sc_site_url' );

/*
 Shortcode: theme-file-url
*/

function sc_theme_file_url($params) {

	$path = isset($params['path']) ? $params['path'] : '';

	return get_theme_file_uri($path);
}
add_shortcode( 'theme-file-url', 'sc_theme_file_url' );
