<?php

function my_acf_google_map_api( $api ){
	$api['key'] = GG_API_KEY;
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');