<?php
/*
 Shortcode: list-properties
*/

function list_properties($params) {

	$options = get_option( 'pickup_properties' );
	$pickedup_properties = preg_split('/,/',  $options['pickup'], -1, PREG_SPLIT_NO_EMPTY);

	if (empty($pickedup_properties)) {
		return;
	}

	$output = '';

	foreach ($pickedup_properties as $property) {
		global $post;
		$post = get_post($property);
		setup_postdata( $post );
		ob_start();
		$type = isset($params['type']) ? $params['type'] : 'pickup';

		if (empty($type) || $type == 'pickup') {
			include( get_template_directory() . '/template-parts/content-item.php');
		} else if ($type == 'slider') {
			include( get_template_directory() . '/template-parts/content-item-slider.php');
		}

		$output .= ob_get_clean();
	}

	return $output;
}
add_shortcode( 'list-properties', 'list_properties' );
