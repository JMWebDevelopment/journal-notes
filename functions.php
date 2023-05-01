<?php
/**
 * This file adds functions to the Crosswinds Framework Child Starter Theme for WordPress.
 *
 * @package Crosswinds Framework Child Starter Theme
 * @author  Jacob Martella Web Development
 * @license GNU General Public License v2 or later
 * @link    https://jacobmartella.com/
 */

if ( ! function_exists( 'crosswinds_framework_child_starter_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 0.8.0
	 *
	 * @return void
	 */
	function crosswinds_framework_child_starter_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'crosswinds-framework-child-starter', get_stylesheet_directory_uri() . '/languages' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles and fonts.
		add_editor_style(
			array(
				'./assets/css/editor-styles.min.css',
			)
		);

		// Disable loading core block inline styles.
		add_filter( 'should_load_separate_core_block_assets', '__return_false' );

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );
	}
}
add_action( 'after_setup_theme', 'crosswinds_framework_child_starter_setup' );

// Enqueue style sheet.
add_action( 'wp_enqueue_scripts', 'crosswinds_framework_child_starter_enqueue_style_sheet', 99 );
function crosswinds_framework_child_starter_enqueue_style_sheet() {
	wp_enqueue_style( 'crosswinds-framework-child-starter', get_stylesheet_directory_uri() . '/assets/css/global.min.css', array(), wp_get_theme()->get( 'Version' ) );
}

function crosswinds_framework_child_starter_search_title() {
	if ( isset( $_GET['s'] ) ) {
		$search_term = sanitize_text_field( wp_unslash( $_GET['s'] ) );
		/* translators: %s: Search term. */
		return isset( $search_term ) ? sprintf( esc_html__( 'Search results for "%s"', 'crosswinds-framework-child-starter' ), esc_html( $search_term ) ) : __( 'Search results', 'crosswinds-framework-child-starter' );
	}
}

// Include block styles.
register_block_style(
	'core/group',
	array(
		'name'  => 'full-height',
		'label' => __( 'Full-height', 'crosswinds-framework-child-starter' ),
	)
);

register_block_style(
	'core/button',
	array(
		'name'  => 'journal-notes-line-button',
		'label' => __( 'Underlined', 'crosswinds-framework-child-starter' ),
	)
);
register_block_style(
	'core/button',
	array(
		'name'  => 'journal-notes-no-background',
		'label' => __( 'No Background', 'crosswinds-framework-child-starter' ),
	)
);

$list_styles = array(
	array(
		'name'  => 'journal-notes-list-chevron-right',
		'label' => __( 'Chevron Right', 'crosswinds-framework-child-starter' ),
	),
	array(
		'name'  => 'journal-notes-list-check',
		'label' => __( 'Checkmark', 'crosswinds-framework-child-starter' ),
	),
	array(
		'name'  => 'journal-notes-list-dash',
		'label' => __( 'Dash', 'crosswinds-framework-child-starter' ),
	)
);
foreach ( $list_styles as $style ) {
	register_block_style(
		'core/list',
		$style
	);
}

// Include block patterns.
/**
 * Registers block patterns, categories, and type.
 *
 * @since 1.0.0
 */
function crosswinds_framework_child_starter_register_block_patterns() {

	if ( function_exists( 'register_block_pattern_category_type' ) ) {
		register_block_pattern_category_type(
			'crosswinds-framework-child-starter',
			array(
				'label' => __( 'JM Web Dev FSE Starter Theme', 'crosswinds-framework-child-starter' ),
			)
		);
	}

	$block_pattern_categories = array(
		'crosswinds-framework-child-starter-404'  => array(
			'label'         => __( '404', 'crosswinds-framework-child-starter' ),
			'categoryTypes' => array( 'crosswinds-framework-child-starter' ),
		),
		'crosswinds-framework-child-starter-footer'  => array(
			'label'         => __( 'Footer', 'crosswinds-framework-child-starter' ),
			'categoryTypes' => array( 'crosswinds-framework-child-starter' ),
		),
		'crosswinds-framework-child-starter-header'  => array(
			'label'         => __( 'Header', 'crosswinds-framework-child-starter' ),
			'categoryTypes' => array( 'crosswinds-framework-child-starter' ),
		),
		'crosswinds-framework-child-starter-search'  => array(
			'label'         => __( 'Search', 'crosswinds-framework-child-starter' ),
			'categoryTypes' => array( 'crosswinds-framework-child-starter' ),
		),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since 0.8.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'crosswinds_framework_child_starter_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		register_block_pattern_category( $name, $properties );
	}
}
add_action( 'init', 'crosswinds_framework_child_starter_register_block_patterns', 9 );

// Load the functionality to require certain plugins.
include get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';

function crosswinds_framework_child_starter_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'The Icon Block',
			'slug'      => 'icon-block',
			'required'  => true,
		),
	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'default_path' => '',                      // Default absolute path to pre-packaged plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'crosswinds_framework_child_starter_register_required_plugins' );
