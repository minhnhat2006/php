<?php

function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyCJpzyHl0i5MPWjmn2l_DIQveO5tfzVnQo';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');