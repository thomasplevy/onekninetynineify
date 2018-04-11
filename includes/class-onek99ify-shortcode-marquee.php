<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class OneK99ify_Shortcode_Marquee {

	public function __construct() {

		add_shortcode( 'marquee', array( $this, 'content' ) );

	}

	function content( $atts, $content = '' ) {

		// $atts = shortcode_atts( array(), $atts, 'marquee' );

		return sprintf( '<div class="onek99-marquee">%s</div>', wpautop( $content ) );

	}

}

return new OneK99ify_Shortcode_Marquee();
