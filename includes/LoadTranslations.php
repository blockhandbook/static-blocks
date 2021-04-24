<?php
/**
 * Load translated strings for our plugin.
 *
 * @package StaticBlocks
 */

namespace StaticBlocks;

/**
 * Load plugin translations.
 *
 * @since 1.0.0
 */
class LoadTranslations {

	/**
	 * Register class with appropriate WordPress hooks
	 */
	public static function register() {
		$instance = new self();
		add_action( 'init', array( $instance, 'load_script_translations' ), 99 );
		add_action( 'plugins_loaded', array( $instance, 'load_php_translations' ) );
	}

	/**
	 * Load translations in javascript files.
	 *
	 * @return void
	 */
	public function load_script_translations() {

		/**
		 * Loads translated strings written in JavaScript.
		 *
		 * @since 1.0.0
		 */
		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations(
				STATIC_BLOCKS_PLUGIN_SLUG . '-block-editor',
				STATIC_BLOCKS_PLUGIN_SLUG,
				STATIC_BLOCKS_PLUGIN_PATH . 'languages'
			);
		}
	}

	/**
	 * Load translations in php files.
	 *
	 * @return void
	 */
	public function load_php_translations() {

		// Load translated strings written in PHP.
		// Reference: http://clivern.com/how-to-internationalize-your-wordpress-plugin/.
		load_plugin_textdomain(
			STATIC_BLOCKS_PLUGIN_TEXTDOMAIN,
			false,
			STATIC_BLOCKS_PLUGIN_SLUG . '/languages'
		);
	}
}
