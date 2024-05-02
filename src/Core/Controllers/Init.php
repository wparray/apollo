<?php
/**
 *
 * Plugin Main Class
 *
 * This class is responsible for initializing the plugin.
 *
 * @package Apollo
 * @subpackage Core
 * @since 1.0.0
 */


namespace Apollo\Core;

use Apollo;

final class Init {
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
		$this->version     = ( defined( 'APOLLO_VERSION' ) ) ? APOLLO_VERSION : '1.0.0';
		$this->plugin_name = ( defined( 'APOLLO_NAME' ) ) ? APOLLO_NAME : 'apollo';
	}

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance->run();

	}

	public function run() {
		Apollo\Admin\Init::instance();
		Apollo\Public\Init::instance();
	}

}
