<?php
/**
 * Plugin Name: Static Blocks
 * Description: Block Editor plugin generated by create-block-plugin – build step required.
 * Version: 1.0.0
 * Plugin URI: https://wordpress.org/plugins/
 * Author: blockhandbook
 * Author URI: https://blockhandbook.com/
 * Domain Path: /languages
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Tested up to: 5.5
 * Requires at least: 5.0
 * Requires PHP: 7.0
 * Text Domain: static-blocks
 *
 * @package StaticBlocks
 */

namespace StaticBlocks;

require __DIR__ . '/vendor/autoload.php';

define( 'STATIC_BLOCKS_PLUGIN_VERSION', '1.0.0' );
define( 'STATIC_BLOCKS_PLUGIN_SLUG', 'static-blocks' );
define( 'STATIC_BLOCKS_PLUGIN_SLUG_SNAKE_CASE', 'static_blocks' );
define( 'STATIC_BLOCKS_PLUGIN_SLUG_CAMEL_CASE', 'staticBlocks' );
define( 'STATIC_BLOCKS_PLUGIN_TEXTDOMAIN', 'static-blocks' );
define( 'STATIC_BLOCKS_PLUGIN_FILE', __FILE__ );
define( 'STATIC_BLOCKS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'STATIC_BLOCKS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );


if ( ! class_exists( 'Plugin' ) ) {
	/**
	 * Plugin Class.
	 *
	 * @since 1.0.0
	 */
	class Plugin {

		/**
		 * Class instance.
		 *
		 * @var Plugin
		 */
		private static $instance = null;

		/**
		 * Theme constructor.
		 * Called immediately when you instantiate a class.
		 * Really good article on setting up constructors for WP classes.
		 * https://carlalexander.ca/designing-class-wordpress-hooks/
		 */
		private function __construct() {

		}

		/**
		 * Return Plugin Instance.
		 *
		 * @return object\Plugin
		 */
		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Load the plugin.
		 *
		 * @return void
		 */
		public static function load() {

			// You can find these classes in the includes/ directory.
			LoadTranslations::register();
			RegisterBlocks::register();

		}
	}
}

Plugin::load();
