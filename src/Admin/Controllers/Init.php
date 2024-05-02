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

namespace Apollo\Admin;

use Apollo\Core\Helpers;

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

		// Add the plugin admin menu.
		add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );

		// Add the settings action link to the plugins page.
		add_filter( 'plugin_action_links_' . APOLLO_PLUGIN_BASE, array( $this, 'add_action_links' ) );

		// Load the plugin styles and scripts.
		add_action( 'admin_enqueue_scripts', array( $this, 'styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'scripts' ) );

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
	 * Enqueue styles for the admin area.
	 *
	 * @return void
	 */
	public function styles() {
		if ( $this->is_plugin_admin() === false ) {
			return;
		}

		wp_enqueue_style( $this->plugin_name, APOLLO_PLUGIN_URL . 'dist/css/admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Enqueue scripts for the admin area.
	 *
	 * @return void
	 */
	public function scripts() {
		if ( $this->is_plugin_admin() === false ) {
			return;
		}
		wp_enqueue_script( $this->plugin_name, APOLLO_PLUGIN_URL . 'dist/js/admin.js', array(), $this->version, true );

	}

	/**
	 * Check if the current page is the plugin admin page.
	 *
	 * @return bool
	 */
	public function is_plugin_admin() {
		return \str_contains( \get_current_screen()->base, 'apollo' );
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {
		$this->menu_factory( __( 'Apollo Welcome', 'apollo' ), 'apollo', 'display_plugin_setup_page' );
	}

	/**
	 * Summary of menu_factory
	 * @param mixed $title
	 * @param mixed $slug
	 * @param mixed $template
	 * @param mixed $type
	 * @param mixed $priority
	 * @return void
	 */
	public function menu_factory(
		$title,
		$slug,
		$template,
		$type = 'page',
		$sub = 'apollo',
		$priority = '99'
	) {
		switch ( $type ) {
			case 'page':
				\add_options_page(
					$title,
					$title,
					'manage_options',
					$slug,
					array(
						$this,
						$template
					),
					$priority
				);
				break;
			case 'sub':
				\add_submenu_page(
					$sub,
					$title,
					$title,
					'manage_options',
					$slug,
					array(
						$this,
						$template
					),
					$priority
				);
				break;
			case 'menu':
				\add_menu_page(
					$title,
					$title,
					'manage_options',
					$slug,
					array(
						$this,
						$template
					),
					$priority
				);
				break;
		}
	}

	/**
	 * Add settings action link to the plugins page.
	 * @param mixed $links
	 * @return string[]
	 */
	public function add_action_links( $links ) {

		$actions[] = '<a href="' . esc_url( get_admin_url( null, 'options-general.php?page=apollo' ) ) . '"> ' . __( 'Settings', 'apollo' ) . '</a>';

		return array_merge( $actions, $links );

	}

	/**
	 * Display the plugin setup page.
	 * @return void
	 */
	public function display_plugin_setup_page() {
		Helpers::get_template( 'settings', 'admin' );
	}
}
