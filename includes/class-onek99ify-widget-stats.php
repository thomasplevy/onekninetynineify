<?php
defined( 'ABSPATH' ) || exit;

/**
 * Statcounter widget
 * @since    0.0.3
 * @version  0.0.3
 */
class Onek99ify_Widget_Stats extends WP_Widget {

	/**
	 * Constructor
	 * @since    0.0.3
	 * @version  0.0.3
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'onek99ify_stats',
			'description' => __( 'Show your visitors how many visitors have visited your homepage!', 'onekninetynineify' ),
		);
		parent::__construct( 'onek99ify_stats', __( 'Stat Counter Widget', 'onekninetynineify' ), $widget_ops );
	}

	/**
	 * Setup widget output
	 * @param    [type]     $args      [description]
	 * @param    [type]     $instance  [description]
	 * @return   [type]
	 * @since    0.0.3
	 * @version  0.0.3
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		$visits = sprintf( '%07d', OneK99ify_Stats::get_visits() );
		?>
		<div class="onek99-stats">
			<?php foreach( str_split( $visits ) as $char ) : ?><span><?php echo $char; ?></span><?php endforeach; ?>
		</div>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Visits to my page', 'onekninetynineify' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'onekninetynineify' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		return $instance;
	}

}
