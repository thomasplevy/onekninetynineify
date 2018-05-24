<?php
/**
 * Plugin Name: One Thousand Nine Hundred and Ninety-Nineify
 * Plugin URI: https://github.com/thomasplevy/onekninetynineify
 * Description: This plugin's got its JNCO pockets full of all tools you'll need to make the coolest site on the web!
 * Version: 0.0.2
 * Author: The Guy Who May Have Ruined Your Website in 2017
 * Author URI: https://github.com/thomasplevy
 * Text Domain: onekninetynineify
 * Domain Path: /i18n
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Restrict direct access
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'OneK99ify' ) ) :

final class OneK99ify {

	/**
	 * Current version of the plugin
	 * @var string
	 */
	public $version = '0.0.2';

	/**
	 * Singleton instance of the class
	 * @var     obj
	 */
	private static $_instance = null;

	/**
	 * Singleton Instance of the OneK99ify class
	 * @return   obj  instance of the OneK99ify class
	 * @since    0.0.1
	 * @version  0.0.1
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;

	}

	/**
	 * Constructor
	 * @return   void
	 * @since    0.0.1
	 * @version  0.0.1
	 */
	private function __construct() {

		// define plugin constants
		$this->define_constants();

		add_action( 'init', array( $this, 'load_textdomain' ), 0 );

		// get started
		add_action( 'plugins_loaded', array( $this, 'init' ) );

	}

	/**
	 * Define all constants used by the plugin
	 * @return   void
	 * @since    0.0.1
	 * @version  0.0.1
	 */
	private function define_constants() {

		if ( ! defined( 'ONEK99IFY_PLUGIN_FILE' ) ) {
			define( 'ONEK99IFY_PLUGIN_FILE', __FILE__ );
		}


		if ( ! defined( 'ONEK99IFY_PLUGIN_DIR' ) ) {
			define( 'ONEK99IFY_PLUGIN_DIR', WP_PLUGIN_DIR . "/" . plugin_basename( dirname(__FILE__) ) . '/' );
		}

		if ( ! defined( 'ONEK99IFY_VERSION' ) ) {
			define( 'ONEK99IFY_VERSION', $this->version );
		}

	}

	/**
	 * Include files and instantiate classes
	 * @return  void
	 * @since    0.0.1
	 * @version  0.0.1
	 */
	private function includes() {

		require_once ONEK99IFY_PLUGIN_DIR . 'includes/functions-onek99ify.php';

		require_once ONEK99IFY_PLUGIN_DIR . 'includes/class-onek99ify-assets.php';
		require_once ONEK99IFY_PLUGIN_DIR . 'includes/class-onek99ify-customizer.php';
		require_once ONEK99IFY_PLUGIN_DIR . 'includes/class-onek99ify-mouse-trail.php';
		require_once ONEK99IFY_PLUGIN_DIR . 'includes/class-onek99ify-shortcode-marquee.php';
		require_once ONEK99IFY_PLUGIN_DIR . 'includes/class-onek99ify-stats.php';
		require_once ONEK99IFY_PLUGIN_DIR . 'includes/class-onek99ify-widget-email.php';
		require_once ONEK99IFY_PLUGIN_DIR . 'includes/class-onek99ify-widget-stats.php';
		require_once ONEK99IFY_PLUGIN_DIR . 'includes/class-onek99ify-widgets.php';

	}

	/**
	 * Include all required files and classes
	 * @return  void
	 * @since    0.0.1
	 * @version  0.0.1
	 */
	public function init() {

		$this->includes();

	}

	/**
	 * Load l10n files
	 * The first loaded file takes priority
	 *
	 * Files can be found in the following order:
	 * 		WP_LANG_DIR/lifterlms/onekninetynineify-LOCALE.mo
	 * 		WP_LANG_DIR/plugins/onekninetynineify-LOCALE.mo
	 *
	 * @return   void
	 * @since    0.0.1
	 * @version  0.0.1
	 */
	public function load_textdomain() {

		// load locale
		$locale = apply_filters( 'plugin_locale', get_locale(), 'onekninetynineify' );

		// load a lifterlms specific locale file if one exists
		load_textdomain( 'onekninetynineify', WP_LANG_DIR . '/lifterlms/onekninetynineify-' . $locale . '.mo' );

		// load localization files
		load_plugin_textdomain( 'onekninetynineify', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

	}

}
endif;

/**
 * Main Plugin Instance
 * @since    0.0.1
 * @version  0.0.1
 */
function OneK99ify() {
	return OneK99ify::instance();
}

return OneK99ify();
