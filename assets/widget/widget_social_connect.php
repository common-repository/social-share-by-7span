<?php
/**
 * Widget API: WP_Widget_Social_Connect class
 *
 */

/**
 * Core class used to implement a Social Connect widget.
 */
class WP_Widget_Social_Connect extends WP_Widget {

	/**
	 * Sets up a new Social Connect widget instance.
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_social_connect',
			'description'                 => __( 'Add social share/follow buttons.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'social_connect', __( 'Social Connect' ), $widget_ops );
	}

	/**
	 * Outputs the content for the current Social Connect widget instance.
	 */
	public function widget( $args, $instance ) {

		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Social Connect' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$c = ! empty( $instance['count'] ) ? '1' : '0';
		
		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$cat_args = array(
			'show_count'   => $c,
		);
		$counter = 'true';
		if($c == 0){
			$counter = 'false';
		}
		echo do_shortcode("[website_social_connect show_counts='".$counter."']");

		echo $args['after_widget'];
	}

	/**
	 * Handles updating settings for the current Social Connect widget instance.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                 = $old_instance;
		$instance['title']        = sanitize_text_field( $new_instance['title'] );
		$instance['count']        = ! empty( $new_instance['count'] ) ? 1 : 0;
		
		return $instance;
	}

	/**
	 * Outputs the settings form for the Social Connect widget.
	 *
	 */
	public function form( $instance ) {
		//Defaults
		$instance     = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$count        = isset( $instance['count'] ) ? (bool) $instance['count'] : false;
	
		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" /></p>
		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>"<?php checked( $count ); ?> />
		<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Show Counts' ); ?></label><br /></p>
	
		<?php
	}
	
}
// Register the widget.
function ss7s_register_social_connect_widget() { 
	register_widget( 'WP_Widget_Social_Connect' );
}

add_action( 'widgets_init', 'ss7s_register_social_connect_widget' );

	
