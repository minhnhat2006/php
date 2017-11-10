<?php
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Property_List_Table extends WP_List_Table {

	private $_wp_query_args;

	public function set_wp_query_args($wp_query_args) {
		$this->_wp_query_args = $wp_query_args;
	}

	private function __build_items_from_wp_query_args() {
		$per_page = $this->get_items_per_page('properties_per_page', 15);
		$current_page = $this->get_pagenum();
		$this->_wp_query_args['posts_per_page'] = $per_page;
		$this->_wp_query_args['paged'] = $current_page;
		$s = isset( $_POST['s'] ) ? $_POST['s'] : '';
        if ( ! empty( $s ) ) {
            $wp_query_args['s'] = $s;
        }

		$query = new WP_Query( $this->_wp_query_args );
        $total_items = $query->found_posts;
        $items       = $query->posts;
        $this->set_pagination_args( array(
            'total_items' => $total_items,
            'per_page'    => $per_page
        ) );
        $this->found_data = $items;
        $this->items      = $items;		
	}

	function get_columns() {
		$columns = array(
			'cb'        => '<input type="checkbox" />',
			'post_title' => __('Title', MY_THEME),
			'post_date'      => __('Date', MY_THEME),
		);
		if (isset($this->_args['show_check']) && !$this->_args['show_check'])
			unset($columns['cb']);
		return $columns;
	}

	function get_sortable_columns() {
		$sortable_columns = array(
			'post_title'  => array('post_title',false),
			'post_date'   => array('post_date',false)
		);
		return $sortable_columns;
	}

	function usort_reorder( $a, $b ) {
		// If no sort, default to post_title
		$orderby = ( ! empty( $_GET['orderby'] ) ) ? filter_input( INPUT_GET, 'orderby', FILTER_SANITIZE_STRIPPED ) : 'post_title';
		// If no order, default to asc
		$order = ( ! empty($_GET['order'] ) ) ? filter_input( INPUT_GET, 'order', FILTER_SANITIZE_STRIPPED ) : 'asc';
		// Determine sort order
		$result = strcmp( $a->$orderby, $b->$orderby );
		// Send final sort direction to usort
		return ( $order === 'asc' ) ? $result : -$result;
	}

	function prepare_items() {
		$columns = $this->get_columns();
		$hidden = array();
		$sortable = $this->get_sortable_columns();
		$this->_column_headers = $this->get_column_info();// array($columns, $hidden, $sortable);

		if (!empty($this->_wp_query_args)) {
			$this->__build_items_from_wp_query_args();
		}

		usort( $this->items, array( &$this, 'usort_reorder' ) );
	}

	function column_default( $item, $column_name ) {
		switch( $column_name ) { 
			case 'post_title':
			case 'post_date':
				return $item->$column_name;
			default:
				return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
		}
	}

	function column_cb($item) {
		return sprintf(
			'<input type="checkbox" name="property[]" value="%s" />', $item->ID
		);    
	}

	function column_post_title($item) {
		$actions = array();

		if (isset($this->_args['show_pickup']) && $this->_args['show_pickup'])
			$actions['pick'] = sprintf('<a href="?page=%s&action=%s&property=%s">Pick</a>',$_REQUEST['page'],'pick',$item->ID);

		if (isset($this->_args['show_remove']) && $this->_args['show_remove'])
			$actions['remove'] = sprintf('<a href="?page=%s&action=%s&property=%s">Remove</a>',$_REQUEST['page'],'remove',$item->ID);

		return sprintf('%1$s %2$s', $item->post_title, $this->row_actions($actions) );
	}

	public function get_bulk_actions() {
		if (isset($this->_args['show_pickup']) && $this->_args['show_pickup'])
			$actions = array(
				'pick'    => __('Pick', MY_THEME)
			);
		else
			$actions = array();
		return $actions;
	}

	public function process_bulk_action() {
        if ( isset( $_POST['_wpnonce'] ) && ! empty( $_POST['_wpnonce'] ) ) {
            $nonce  = filter_input( INPUT_POST, '_wpnonce', FILTER_SANITIZE_STRING );
            $action = 'bulk-' . $this->_args['plural'];
            if ( ! wp_verify_nonce( $nonce, $action ) ) {
                wp_die( 'Security check failed!', MY_THEME );
            }
        }

        $action = $this->current_action();
 
        switch ( $action ) {
            case 'pick':
            	if (isset($this->_args['show_pickup']) && $this->_args['show_pickup']) {
            		$properties = isset( $_POST['property'] ) ? filter_input( INPUT_POST, 'property', FILTER_DEFAULT , FILTER_REQUIRE_ARRAY ) : '';

	            	if (empty($properties)) {
	            		$properties = isset( $_GET['property'] ) ? filter_input( INPUT_GET, 'property', FILTER_SANITIZE_STRIPPED ) : '';
	            	}

	            	if(is_array($properties)) {
	            		$properties = implode(',', $properties);
	            	}

					$options = get_option('pickup_properties');
					$options_properties = $options['pickup'];

					if(empty($options_properties)) {
						$options_properties = $properties;
					} else {
						$options_properties .= ',' . $properties;
					}

	                update_option('pickup_properties', array('pickup' => $options_properties));
            	}
                break;

            case 'remove':
            	if (isset($this->_args['show_remove']) && $this->_args['show_remove']) {
	            	$properties = isset( $_GET['property'] ) ? filter_input( INPUT_GET, 'property', FILTER_SANITIZE_STRIPPED ) : '';

	            	if (empty($properties)) {
	            		$properties = isset( $_POST['property'] ) ? filter_input( INPUT_POST, 'property', FILTER_DEFAULT , FILTER_REQUIRE_ARRAY ) : '';
	            	}

	            	if(is_string($properties)) {
	            		$properties = explode(',', $properties);
	            	}

					$options = get_option('pickup_properties');
					$options_properties = $options['pickup'];

					if(!empty($options_properties)) {
						$options_properties = explode(',', $options_properties);
						$new_options_properties = array_diff($options_properties, $properties);

						if (empty($new_options_properties)) {
							$new_options_properties = '';
						} else {
							$new_options_properties = implode(',', $new_options_properties);
						}

						update_option('pickup_properties', array('pickup' => $new_options_properties));
					}
				}
            	break;
        }
    }

	public function no_items() {
		_e( 'No properties found.' );
	}
}