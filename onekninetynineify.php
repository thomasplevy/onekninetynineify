<?php
/**
 * Plugin Name: One Thousand Nine Hundred and Ninety-Nineify
 * Plugin URI: https://github.com/thomasplevy/onekninetynineify
 * Description: Do you remember the good-old days of AOL Hometown, Yahoo Geocities, and Angelfire by whoever the heck made Angelfire? Do you think back fondly on hours spent finding the coolest combination of fore- and background colors for your instant messenger profile? Do you ever wonder why no one talks about how Slack actually is a more advanced version of a CompuServe chatroom? If you answered with a resounding ~-~-~- YES -~-~-~ to any of these questions you may just need to install One Thousand Nine Hundred and Ninety-Nineify for your next WordPress site so that you can experience all the parts of the greatest era on the internet presented in modern, semantic, HTML5, Javascript, and CSS3. Welcome back all those glorious scrolling marquees, animated cursor icons (with tails!), rotating menu items, and so much more.
 * Version: 1.0.0
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
	public $version = '1.0.0';

	/**
	 * Singleton instance of the class
	 * @var     obj
	 */
	private static $_instance = null;

	/**
	 * Singleton Instance of the OneK99ify class
	 * @return   obj  instance of the OneK99ify class
	 * @since    1.0.0
	 * @version  1.0.0
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
	 * @since    1.0.0
	 * @version  1.0.0
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
	 * @since    1.0.0
	 * @version  1.0.0
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
	 * @since    1.0.0
	 * @version  1.0.0
	 */
	private function includes() {

		require_once ONEK99IFY_PLUGIN_DIR . 'includes/functions-onek99ify.php';

		require_once ONEK99IFY_PLUGIN_DIR . 'includes/class-onek99ify-assets.php';
		require_once ONEK99IFY_PLUGIN_DIR . 'includes/class-onek99ify-customizer.php';
		require_once ONEK99IFY_PLUGIN_DIR . 'includes/class-onek99ify-mouse-trail.php';
		require_once ONEK99IFY_PLUGIN_DIR . 'includes/class-onek99ify-shortcode-marquee.php';

	}

	/**
	 * Include all required files and classes
	 * @return  void
	 * @since    1.0.0
	 * @version  1.0.0
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
	 * @since    1.0.0
	 * @version  1.0.0
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
 * @since    1.0.0
 * @version  1.0.0
 */
function OneK99ify() {
	return OneK99ify::instance();
}

return OneK99ify();
