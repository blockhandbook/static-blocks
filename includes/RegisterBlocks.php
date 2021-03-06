<?php
/**
 * Register block scripts and styles.
 *
 * @package StaticBlocks
 */

namespace StaticBlocks;

/**
 * Register blocks.
 *
 * @since 1.0.0
 */
class RegisterBlocks {

	/**
	 * Register class with appropriate WordPress hooks
	 */
	public static function register() {
		$instance = new self();
		add_action( 'init', array( $instance, 'register_blocks' ) );
	}

	/**
	 * Registers scripts and styles so they can be enqueued through Gutenberg. IMPORTANT - Registers scripts and styles for server rendered ( dynamic ) blocks as well.
	 *
	 * @return void
	 */
	public function register_blocks() {

		if ( ! function_exists( 'register_block_type' ) ) {
			// Gutenberg is not active.
			return;
		}

		// Register block specific frontend & backend styles.
		wp_register_style(
			STATIC_BLOCKS_PLUGIN_SLUG . '-block',
			STATIC_BLOCKS_PLUGIN_URL . 'build/style-index.css',
			array(),
			STATIC_BLOCKS_PLUGIN_VERSION
		);

		// Register editor-only block styles.
		wp_register_style(
			STATIC_BLOCKS_PLUGIN_SLUG . '-block-editor',
			STATIC_BLOCKS_PLUGIN_URL . 'build/index.css',
			array( 'wp-edit-blocks' ),
			STATIC_BLOCKS_PLUGIN_VERSION
		);

		// Register editor-only block scripts.
		// Dynamically load dependencies using index.build.asset.php generated by @wordpress/dependency-extraction-webpack-plugin.
		$script_asset_path = STATIC_BLOCKS_PLUGIN_PATH . 'build/index.asset.php';
		if ( ! file_exists( $script_asset_path ) ) {
			throw new \Error(
				'You need to run `npm start` or `npm run build` for the "static-blocks" blocks first.'
			);
		}

		$script_asset = require $script_asset_path;

		wp_register_script(
			STATIC_BLOCKS_PLUGIN_SLUG . '-block-editor',
			STATIC_BLOCKS_PLUGIN_URL . 'build/index.js',
			$script_asset['dependencies'],
			$script_asset['version'],
			true
		);

		$blocks            = array();
		$block_directories = scandir( STATIC_BLOCKS_PLUGIN_PATH . 'src/blocks/' );
		// Using scandir picks up . & .. in linux environments, here we're cleaning the array of $block_directories.
		$block_directories = array_diff( $block_directories, array( '..', '.', '.DS_Store' ) );

		// Automatically register blocks.
		// Do not register dynamic block's here, this is done directly in dynamic block .php file.
		foreach ( $block_directories as $block ) {
			$dynamic_block = false;

			foreach ( glob( STATIC_BLOCKS_PLUGIN_PATH . "src/blocks/$block/*.php" ) as $block_file ) {
				$dynamic_block = true;
			};

			if ( $dynamic_block ) {
				continue;
			}
			$blocks[] = STATIC_BLOCKS_PLUGIN_SLUG . "/$block";
		};

		// Loop through $blocks array and register blocks.
		// For reference: https://developer.wordpress.org/block-editor/tutorials/block-tutorial/writing-your-first-block-type/.
		foreach ( $blocks as $block ) {
			register_block_type(
				$block,
				array(
					'style'         => STATIC_BLOCKS_PLUGIN_SLUG . '-block',
					'editor_style'  => STATIC_BLOCKS_PLUGIN_SLUG . '-block-editor',
					'editor_script' => STATIC_BLOCKS_PLUGIN_SLUG . '-block-editor',
				)
			);
		}
	}
}
