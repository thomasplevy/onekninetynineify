<?php
defined( 'ABSPATH' ) || exit;

/**
 * Stats counter
 * @since    [version]
 * @version  [version]
 */
class OneK99ify_Stats {

	public function init() {

		add_action( 'shutdown', array( __CLASS__, 'record_visit' ) );

	}

	public static function get_visits() {

		return absint( get_option( 'onek99ify_stats', 0 ) );

	}

	public static function record_visit() {

		// obviously we can't count admin panel visits
		if ( is_admin() ) {
			return;
		}

		$visits = self::get_visits();
		update_option( 'onek99ify_stats', $visits + 1 );

	}

}

return OneK99ify_Stats::init();
