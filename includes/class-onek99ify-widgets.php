<?php
defined( 'ABSPATH' ) || exit;

/**
 * Register Widgets
 * @since    0.0.2
 * @version  0.0.2
 */
class OneK99ify_Widgets {

	/**
	 * Constructor
	 * @since    0.0.2
	 * @version  0.0.2
	 */
	public function __construct() {
		add_action( 'widgets_init', array( $this, 'register' ) );
	}

	/**
	 * Register Widgets
	 * @return   [type]
	 * @since    0.0.2
	 * @version  0.0.2
	 */
	public function register() {
		register_widget( 'Onek99ify_Widget_Email' );
	}


}

return new OneK99ify_Widgets;
