<?php
defined( 'ABSPATH' ) || exit;

/**
 * Mouse Trails are so slick
 * @since    [version]
 * @version  [version]
 */
class OneK99ify_Mouse_Trail {

	/**
	 * Constructor
	 * @since    [version]
	 * @version  [version]
	 */
	public function __construct() {

		add_filter( 'body_class', array( $this, 'body_class' ) );

	}

	/**
	 * Add mouse trail classes to the body class attr
	 * @param    array     $classes  existing classes
	 * @return   array
	 * @since    [version]
	 * @version  [version]
	 */
	public function body_class( $classes ) {

		if ( onek99ify_option( 'mouse_trail_status', false ) ) {
			array_push( $classes, 'onek99-mousetrail' );
			array_push( $classes, 'onek99-trail-type--' . onek99ify_option( 'mouse_trail_shape', 'star' ) );
		}

		return $classes;

	}

}

return new OneK99ify_Mouse_Trail();
