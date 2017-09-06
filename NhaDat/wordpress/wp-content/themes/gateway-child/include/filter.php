<?php

// array of filters (field key => field name)
$GLOBALS['my_query_filters'] = array( 
	'field_1'	=> 'khuvuc',
	'field_2'	=> 'loaibds',
	'field_3'	=> 'sophongngu',
	//'field_4'	=> 'sophongtam',
	//'field_5'	=> 'price',
);


function filter_pre_get_posts( $query ) {

	$FILTER_MAP = array( 
		'khuvuc'		=> 'diadiem',
		'sophongngu'	=> 'socan',
		//'sophongtam'	=> 'sophongtam',
		//'price'			=> 'price',
	);

	$OPERATOR_MAP = array( 
		'khuvuc'		=> 'LIKE',
		'sophongngu'	=> '>=',
		//'sophongtam'	=> 'sophongtam',
		//'price'			=> 'price',
	);

	// bail early if is in admin
	if( is_admin() ) return;
	
	// loop over filters
	foreach( $GLOBALS['my_query_filters'] as $key => $name ) {
		// continue if not found in url
		if(empty($_GET[ $name ])) {
			continue;
		}

		// get the value for this filter
		// eg: http://www.website.com/events?city=melbourne,sydney
		$value = $_GET[ $name ];

		if ($name == 'loaibds') {
			$query->set("post_type", $value . "-post");
		
		} else {
			$key = $FILTER_MAP[$name];
			$compare = $OPERATOR_MAP[$name];

			// append meta query
	    	$meta_query[] = array(
	            'key'		=> $key,
	            'value'		=> $value,
	            'compare'	=> $compare,

	        );
		}
	} 

	// update meta query
	$query->set("meta_query", $meta_query);
}