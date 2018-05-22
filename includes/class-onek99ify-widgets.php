<?php
defined( 'ABSPATH' ) || exit;

/**
 * Register Widgets
 */
class OneK99ify_Widgets {

	public function __construct() {
		add_action( 'widgets_init', array( $this, 'register' ) );
	}

	public function register() {
		register_widget( 'Onek99ify_Widget_Email' );
	}


}

return new OneK99ify_Widgets;
