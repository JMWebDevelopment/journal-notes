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

$block_styles = array(
	array(
		'name'  => 'normal',
		'label' => __( 'Normal', 'crosswinds-framework-child-starter' ),
		'inline_style' => '',
		'is_default'   => true,
	),
	array(
		'name'  => 'round-edges',
		'label' => __( 'Round Edges', 'crosswinds-framework-child-starter' ),
		'inline_style' => '.is-style-round-edges {
			border-radius: 12px;
			overflow: hidden;
		}',
	),
	array(
		'name'  => 'primary-soft-drop-shadow',
		'label' => __( 'Primary Soft Drop Shadow', 'crosswinds-framework-child-starter' ),
		'inline_style' => '.is-style-primary-soft-drop-shadow {
			box-shadow: 0 5px 20px 0 var(--wp--preset--color--primary)
		}',
	),
	array(
		'name'  => 'primary-hard-drop-shadow',
		'label' => __( 'Primary Hard Drop Shadow', 'crosswinds-framework-child-starter' ),
		'inline_style' => '.is-style-primary-hard-drop-shadow {
			box-shadow: 10px 10px 0 0 var(--wp--preset--color--primary)
		}',
	),
);

$blocks = array(
	'core/group',
	'core/columns',
	'core/button',
	'core/image',
	'core/cover',
	'core/table',
	'core/pullquote',
	'core/quote',
	'core/calendar',
	'core/social-links',
);

// Loop through each block to add the block styles to them.
foreach ( $blocks as $block ){

	foreach ( $block_styles as $block_style ) {

		if ( ('core/button' === $block && 'normal' === $block_style['name']) || ( 'core/table' === $block && 'normal' === $block_style['name'] ) || ( 'core/quote' === $block && 'normal' === $block_style['name'] ) || ( 'core/image' === $block && 'normal' === $block_style['name'] ) || ( 'core/cover' === $block && 'normal' === $block_style['name'] ) || ( 'core/calendar' === $block && 'normal' === $block_style['name'] ) ) {
			continue;
		}

		register_block_style(
			$block,
			$block_style
		);
	}
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
		'crosswinds-framework-child-starter-archive'  => array(
			'label'         => __( 'Archive', 'crosswinds-framework-child-starter' ),
			'categoryTypes' => array( 'crosswinds-framework-child-starter' ),
		),
		'crosswinds-framework-child-starter-page'  => array(
			'label'         => __( 'Page Parts', 'crosswinds-framework-child-starter' ),
			'categoryTypes' => array( 'crosswinds-framework-child-starter' ),
		),
		'crosswinds-framework-child-starter-search'  => array(
			'label'         => __( 'Search', 'crosswinds-framework-child-starter' ),
			'categoryTypes' => array( 'crosswinds-framework-child-starter' ),
		),
		'crosswinds-framework-child-starter-search-filters'  => array(
			'label'         => __( 'Search & Filters Sections', 'crosswinds-framework-child-starter' ),
			'categoryTypes' => array( 'crosswinds-framework-child-starter' ),
		),
		'crosswinds-framework-child-starter-sidebar'  => array(
			'label'         => __( 'Sidebar', 'crosswinds-framework-child-starter' ),
			'categoryTypes' => array( 'crosswinds-framework-child-starter' ),
		),
		'crosswinds-framework-child-starter-single-posts'  => array(
			'label'         => __( 'Single Posts', 'crosswinds-framework-child-starter' ),
			'categoryTypes' => array( 'crosswinds-framework-child-starter' ),
		),
		'crosswinds-framework-child-starter-site-titles'  => array(
			'label'         => __( 'Site Titles', 'crosswinds-framework-child-starter' ),
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

// Remove unneeded patterns from Crosswinds.
function crosswinds_framework_child_starter_remove_core_patterns() {
	$core_block_patterns = array(
		'query-pattern-grid',
		'query-pattern-list-columns',
		'query-pattern-list',
		'archive-content-left-sidebar',
		'archive-content-no-sidebar',
		'archive-content-right-sidebar',
		''
	);

	foreach ( $core_block_patterns as $core_block_pattern ) {
		unregister_block_pattern( 'crosswinds-framework/' . $core_block_pattern );
	}
}
add_action( 'init', 'crosswinds_framework_child_starter_remove_core_patterns' );

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

//* Enable all blocks that are required to run the theme.
add_filter( 'crosswinds_blocks_enable_single-content_block', function(){
	return true;
} );
