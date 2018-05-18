<?php
/**
 * Functions
 * @since    [version]
 * @version  [version]
 */
defined( 'ABSPATH' ) || exit;

/**
 * Retrieve plugin options
 * @param    string     $option   option key
 * @param    mixed      $default  default value
 * @return   mixed
 * @since    [version]
 * @version  [version]
 */
function onek99ify_option( $option, $default = '' ) {

	$options = get_option( 'onek99ify_mod', array() );
	if ( ! isset( $options[ $option ] ) ) {
		return $default;
	}

	return $options[ $option ];

}
