<?php
defined( 'ABSPATH' ) || exit;

/**
 * Register Widgets
 * @since    [version]
 * @version  [version]
 */
class OneK99ify_Widgets {

	/**
	 * Constructor
	 * @since    [version]
	 * @version  [version]
	 */
	public function __construct() {
		add_action( 'widgets_init', array( $this, 'register' ) );
	}

	/**
	 * Register Widgets
	 * @return   [type]
	 * @since    [version]
	 * @version  [version]
	 */
	public function register() {
		register_widget( 'Onek99ify_Widget_Email' );
	}


}

return new OneK99ify_Widgets;
