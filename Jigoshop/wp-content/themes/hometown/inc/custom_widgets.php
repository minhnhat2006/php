<?php

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'Custom_Text_Widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

class Custom_Text_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(

			// Base ID of your widget
			'Custom_Text_Widget', 

			// Widget name will appear in UI
			__('Custom Text Widget', MY_THEME), 

			// Widget description
			array( 'description' => __( 'Display text/html content', MY_THEME ) ) 
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$content = apply_filters( 'widget_content', $instance['content'] );
		$content = do_shortcode($content);

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		if ( ! empty( $content ) )
			echo $content;

		echo $args['after_widget'];
	}

	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = '';
		}

		if ( isset( $instance[ 'content' ] ) ) {
			$content = $instance[ 'content' ];
		}
		else {
			$content = '';
		}

		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Content:' ); ?></label> 
			<textarea class="widefat code" rows="16" cols="20" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>"><?php echo esc_attr( $content ); ?></textarea>
		</p>
		<?php 
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['content'] = ( ! empty( $new_instance['content'] ) ) ? $new_instance['content'] : '';
		return $instance;
	}
}