<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function onek99ify_option( $option, $default = '' ) {

	$options = get_option( 'onek99ify_mod', array() );
	if ( ! isset( $options[ $option ] ) ) {
		return $default;
	}

	return $options[ $option ];

}
