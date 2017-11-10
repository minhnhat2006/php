<?php

if( ! class_exists( 'Property_List_Table' ) ) {
    require_once( ABSPATH . 'wp-content/themes/hometown/admin/class-property-list-table.php' );
}

/*
 Refer: https://codex.wordpress.org/Creating_Options_Pages
*/
class PickupAdminPage {
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct() {
        add_action( is_multisite() ? 'network_admin_menu' : 'admin_menu', array( $this, 'add_theme_page' ) );
        add_action( is_multisite() ? 'network_admin_init' : 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_theme_page() {
        $hook = add_menu_page( __('Pickup Properties', MY_DOMAIN), __('Pickup Properties', MY_DOMAIN), 'manage_options', 'pickup-admin-page', array( $this, 'create_admin_page' ), 'dashicons-tickets', 6  );
        add_action( "load-$hook", array($this, 'add_options') );
    }

	public function add_options() {
		global $propertyListTable;
		$option = 'per_page';
		$args = array(
			'label' => 'Properties',
			'default' => 15,
			'option' => 'properties_per_page'
		);
		add_screen_option( $option, $args );
		$propertyListTable = new Property_List_Table;
	}

    /**
     * Options page callback
     */
    public function create_admin_page() {
        ?>
        <div class="wrap">
            <h1>Pickup properties</h1>
            <h3>Pick up properties from list below</h3>
            <form method="post">
            	<input type="hidden" name="page" value="pickup-admin-page" />
            <?php
            $propertyListTable = new Property_List_Table(array('show_pickup' => 1));
            $propertyListTable->process_bulk_action();
            $pickedupPropertyListTable = new Property_List_Table(array('show_remove' => 1, 'show_check' => 0));
			$pickedupPropertyListTable->process_bulk_action();

            $this->display_properties($propertyListTable);
			?>
			</form>
			<h3>Properties already Picked up</h3>
			<?php
			$this->display_pickup_properties($pickedupPropertyListTable);
			?>
            <form method="post" action="options.php">
            <?php
	            printf(
		            '<input type="hidden" id="pickup" name="pickup_properties[pickup]" value="%s" />',
		            isset( $this->options['pickup'] ) ? esc_attr( $this->options['pickup']) : ''
		        );

                // This prints out all hidden setting fields
                settings_fields( 'pickup-settings-group' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init() {        
        register_setting(
            'pickup-settings-group', // Option group
            'pickup_properties', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_field(
            'pickup_properties', 
            'My Pickup Properties',
            array( $this, 'pickup_properties_callback' ), 
            'pickup-admin-page', 
            'pickup_section_id'
        );      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input ) {
        $new_input = array();
        if( isset( $input['pickup'] ) )
            $new_input['pickup'] = sanitize_text_field( $input['pickup'] );

        return $new_input;
    }

/** 
     * Get the settings option array and print one of its values
     */
    public function display_properties($propertyListTable) {
    	$this->options = get_option( 'pickup_properties' );
        $wp_query_args = array(
        	'post_type'=>'property',
        	'post_status'=>'publish',
        	'post__not_in' => preg_split('/,/',  $this->options['pickup'], -1, PREG_SPLIT_NO_EMPTY)
        );
        $propertyListTable->set_wp_query_args($wp_query_args);
        $propertyListTable->prepare_items();
        $propertyListTable->search_box('Search', 'property_id');
		$propertyListTable->display();
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function display_pickup_properties($propertyListTable) {
    	$this->options = get_option( 'pickup_properties' );
    	$pcikedup_property_ids = preg_split('/,/',  $this->options['pickup'], -1, PREG_SPLIT_NO_EMPTY);
        $propertyListTable->set_wp_query_args(array(
        	'post_type'=>'property',
        	'posts_per_page'=>-1,
        	'post__in'=> empty($pcikedup_property_ids) ? array(-1) : $pcikedup_property_ids,
        ));
        $propertyListTable->prepare_items();
		$propertyListTable->display();
    }
} // end class PickupAdminPage

if( is_admin() ) $my_settings_page = new PickupAdminPage();

add_filter('set-screen-option', 'set_table_per_page_option', 10, 3);
function set_table_per_page_option($status, $option, $value) {
	return $value;
}