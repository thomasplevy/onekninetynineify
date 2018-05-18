<?php
/**
 * Functions
 * @since    0.0.1
 * @version  0.0.1
 */
defined( 'ABSPATH' ) || exit;

/**
 * Retrieve plugin options
 * @param    string     $option   option key
 * @param    mixed      $default  default value
 * @return   mixed
 * @since    0.0.1
 * @version  0.0.1
 */
function onek99ify_option( $option, $default = '' ) {

	$options = get_option( 'onek99ify_mod', array() );
	if ( ! isset( $options[ $option ] ) ) {
		return $default;
	}

	return $options[ $option ];

}
