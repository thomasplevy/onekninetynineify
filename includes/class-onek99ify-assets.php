<?php
defined( 'ABSPATH' ) || exit;

/**
 * Enqueue Scripts & Styles
 * @since    0.0.1
 * @version  0.0.1
 */
class OneK99ify_Assets {

	/**
	 * Minified file suffix to append
	 * When WP_DEBUG is enabled, unminified assets will be served
	 * @var  boolean
	 */
	private $minify = '.min';

	public function __construct() {

		$this->minify = ( ! defined( 'WP_DEBUG' ) || WP_DEBUG == false ) ? '.min' : '';
		add_action( 'wp', array( $this, 'init' ) );

		// blocks
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_blocks' ) );

		// customizer
		add_action( 'customize_preview_init', array( $this, 'enqueue_customizer' ) );

	}

	/**
	 * Register, enqueue, & localize frontend scripts
	 * @return   void
	 * @since    0.0.1
	 * @version  0.0.1
	 */
	public function enqueue() {

		wp_register_style( 'oneK99ify', plugins_url( '/assets/css/oneK99ify' . $this->minify . '.css', ONEK99IFY_PLUGIN_FILE ), array(), ONEK99IFY_VERSION, 'screen' );
		wp_enqueue_style( 'oneK99ify' );

		wp_register_script( 'oneK99ify', plugins_url( 'assets/js/oneK99ify' . $this->minify . '.js', ONEK99IFY_PLUGIN_FILE ), array(), ONEK99IFY_VERSION, true );
		wp_enqueue_script( 'oneK99ify' );

	}

	public function enqueue_blocks() {

		wp_register_script( 'oneK99ify-blocks', plugins_url( 'assets/js/oneK99ify-blocks' . $this->minify . '.js', ONEK99IFY_PLUGIN_FILE ), array( 'wp-hooks' ), ONEK99IFY_VERSION );
		wp_enqueue_script( 'oneK99ify-blocks' );

	}

	public function enqueue_customizer() {

		wp_register_script( 'oneK99ify-customizer', plugins_url( 'assets/js/oneK99ify-customizer' . $this->minify . '.js', ONEK99IFY_PLUGIN_FILE ), array( 'jquery', 'customize-preview' ), ONEK99IFY_VERSION, true );
		wp_enqueue_script( 'oneK99ify-customizer' );

	}

	/**
	 * Get started
	 * @return   void
	 * @since    0.0.1
	 * @version  0.0.1
	 */
	public function init() {

		if ( is_admin() ) {
			return;
		}

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );

	}

}
return new OneK99ify_Assets();
