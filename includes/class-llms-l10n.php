<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Localize JS strings
 * This file should not be edited directly
 * It is compiled automatically via the gulp task `js:pot`
 * See the lifterlms-lib-tasks package for more information
 * @since    1.0.0
 * @version  0.0.0
 */
class LLMS_l10n {

	/**
	 * Constructor
	 * @since    1.0.0
	 * @version  1.0.0
	 */
	public function __construct() {
		add_filter( 'lifterlms_js_l10n', array( $this, 'get_strings' ) );
	}

	/**
	 * Get strings to be passed to LifterLMS l10n class
	 * @param    array  $strings  existing strings from core / 3rd parties
	 * @return   array
	 * @since    1.0.0
	 * @version  0.0.0
	 */
	public function get_strings( $strings ) {

		return array_merge( $strings, array(

		) );

	}

}

return new LLMS_l10n();
