<?php
/**
 * Widget Muffin Clients
 *
 * @package Bretheon
 * @author Muffin group
 * @link http://muffingroup.com
 */

class Mfn_clients_Widget extends WP_Widget {

	
	/* ---------------------------------------------------------------------------
	 * Constructor
	 * --------------------------------------------------------------------------- */
	function __construct() {
		
		$widget_ops = array( 'classname' => 'widget_mfn_clients', 'description' => __( 'Use this widget on pages to display Clients Slider.', 'mfn-opts' ) );
		
		parent::__construct( 'widget_mfn_clients', __( 'Muffin Clients Slider', 'mfn-opts' ), $widget_ops );
		
		$this->alt_option_name = 'widget_mfn_clients';
	}
	
	
	/* ---------------------------------------------------------------------------
	 * Outputs the HTML for this widget.
	 * --------------------------------------------------------------------------- */
	function widget( $args, $instance ) {

		if ( ! isset( $args['widget_id'] ) ) $args['widget_id'] = null;
		extract( $args, EXTR_SKIP );

		echo $before_widget;
		
		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base);
		if( $title ) echo $before_title . $title . $after_title;

		$args = array(
			'post_type' => 'client',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'ASC',
		);
		
		$query = new WP_Query();
		$query->query( $args );
		
		$output = '';
		if ($query->have_posts())
		{
			$output .= '<ul class="clients-slider">';
			while ($query->have_posts())
			{
				$query->the_post();
				$output .= '<li>';
				$link = get_post_meta(get_the_ID(), 'mfn-post-link', true);
				if( $link ) $output .= '<a href="'. $link .'" title="'. the_title(false, false, false) .'" target="_blank">';
				$output .= get_the_post_thumbnail( null, '190x110', array('class'=>'scale-with-grid' ) );
				if( $link ) $output .= '</a>';
				$output .= '</li>';
			}
			$output .= '</ul>'."\n";
		}
		wp_reset_query();

		echo $output;

		echo $after_widget;
	}


	/* ---------------------------------------------------------------------------
	 * Deals with the settings when they are saved by the admin.
	 * --------------------------------------------------------------------------- */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;	
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

	
	/* ---------------------------------------------------------------------------
	 * Displays the form for this widget on the Widgets page of the WP Admin area.
	 * --------------------------------------------------------------------------- */
	function form( $instance ) {		
		$title = isset( $instance['title']) ? esc_attr( $instance['title'] ) : '';
		?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'mfn-opts' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>			
		<?php
	}
}
?>