<?php
/**
 *
 * Plugin Main Class
 *
 * This class is responsible for initializing the admin side of the plugin.
 *
 * @package Apollo
 * @subpackage Admin
 * @since 1.0.0
 */

namespace Apollo\Public;

class Init {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The Instance
	 *
	 * @since 1.0.0
	 * @access   protected
	 * @var boolean
	 */
	private static $_instance = null;

	public function __construct() {

		// Define the version and name of the plugin.
		$this->version     = ( defined( 'APOLLO_VERSION' ) ) ? APOLLO_VERSION : '1.0.0';
		$this->plugin_name = ( defined( 'APOLLO_NAME' ) ) ? APOLLO_NAME : 'apollo';

		// Load the plugin styles and scripts.
		add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );

	}

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
	}

	/**
	 * Enqueue styles for the public area.
	 *
	 * @return void
	 */
	public function styles() {
		wp_enqueue_style( $this->plugin_name, APOLLO_PLUGIN_URL . 'dist/css/public.css', array(), $this->version, 'all' );
	}

	/**
	 * Enqueue scripts for the public area.
	 *
	 * @return void
	 */
	public function scripts() {
		wp_enqueue_script( $this->plugin_name, APOLLO_PLUGIN_URL . 'dist/js/public.js', array(), $this->version, true );

	}
}
