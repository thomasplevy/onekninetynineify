<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class OneK99ify_Mouse_Trail {

	public function __construct() {

		add_filter( 'body_class', array( $this, 'body_class' ) );

	}

	public function body_class( $classes ) {

		if ( onek99ify_option( 'mouse_trail_status', false ) ) {
			array_push( $classes, 'onek99-mousetrail' );
			array_push( $classes, 'onek99-trail-type--' . onek99ify_option( 'mouse_trail_shape', 'star' ) );
		}

		return $classes;

	}

}

return new OneK99ify_Mouse_Trail();
