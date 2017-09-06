<?php

function send_contact_us_message( $fullname, $phone = "", $email = "", $message = "" ) {
	
	$user_data = array( 'ID' => $user_id, 'user_url' => $user_url, 'description' => $user_desc );
	$user_id = wp_update_user($user_data);

	if ( is_wp_error( $user_id ) ) {
		return false;
	}

	return true;
}