<?php

function update_profile( $user_id, $user_url = "", $user_desc = "", $user_currency = "VND" ) {
	
	$user_data = array( 'ID' => $user_id, 'user_url' => $user_url, 'description' => $user_desc );
	$user_id = wp_update_user($user_data);

	if ( is_wp_error( $user_id ) ) {
		return false;
	}

	$currency = get_cimyFieldValue($user_id, 'CURRENCY');

	if($currency != $user_currency) {

		$user_ids = set_cimyFieldValue($user_id, 'CURRENCY', $user_currency);

		if(empty($user_ids)) {
			return false;
		}
	}

	return true;
}