<?php
defined( 'ABSPATH' ) || exit;

/**
 * Spinning at symbol widget nonsens
 * @since    0.0.2
 * @version  0.0.2
 */
class Onek99ify_Widget_Email extends WP_Widget {

	/**
	 * Constructor
	 * @since    0.0.2
	 * @version  0.0.2
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'onek99ify_email',
			'description' => __( 'Highlight your email address in style!', 'onekninetynineify' ),
		);
		parent::__construct( 'onek99ify_email', __( 'Contact Me', 'onekninetynineify' ), $widget_ops );
	}

	/**
	 * Setup widget output
	 * @param    [type]     $args      [description]
	 * @param    [type]     $instance  [description]
	 * @return   [type]
	 * @since    0.0.2
	 * @version  0.0.2
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		$symbols = '';
		foreach( range( -8, 8 ) as $i ) {
			$symbols .= '<span class="symbol" style="transform:translateZ(' . $i . 'px);">@</span>';
		}
		?>
		<a class="onek99-contact" href="<?php echo esc_url( 'mailto:' . $instance['email'] ); ?>">
			<div class="onek99-contact-at"><?php echo $symbols; ?></div>
			<h4 class="onek99-contact-text"><?php _e( 'Contact Me!', 'onekninetynineify' ); ?></h4>
		</a>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Contact Me!', 'onekninetynineify' );
		$email = ! empty( $instance['email'] ) ? $instance['email'] : get_option( 'admin_email' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'onekninetynineify' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_attr_e( 'Email Address:', 'onekninetynineify' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
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
		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? sanitize_email( $new_instance['email'] ) : '';
		return $instance;
	}

}
