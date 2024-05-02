<?php
/**
 * Internalization class
 *
 * This class is responsible for loading the plugin text domain for translation.
 *
 * @package Apollo
 * @subpackage Core
 * @since 1.0.0
 */

namespace Apollo\Core;

class Internalization {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public static function load() {

		\load_plugin_textdomain(
			'apollo',
			false,
			APOLLO_FILE . '/languages/'
		);

	}

}
