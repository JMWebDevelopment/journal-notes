<?php
/**
 * This file adds functions to the Crosswinds Framework Child Starter Theme for WordPress.
 *
 * @package Crosswinds Framework Child Starter Theme
 * @author  Jacob Martella Web Development
 * @license GNU General Public License v2 or later
 * @link    https://jacobmartella.com/
 */

if ( ! function_exists( 'journal_notes_setup' ) ) {
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
	function journal_notes_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'journal-notes', get_stylesheet_directory_uri() . '/languages' );

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
add_action( 'after_setup_theme', 'journal_notes_setup' );

// Enqueue style sheet.
add_action( 'wp_enqueue_scripts', 'journal_notes_enqueue_style_sheet', 99 );
function journal_notes_enqueue_style_sheet() {
	wp_enqueue_style( 'journal-notes', get_stylesheet_directory_uri() . '/assets/css/global.min.css', array(), wp_get_theme()->get( 'Version' ) );
}

function journal_notes_search_title() {
	if ( isset( $_GET['s'] ) ) {
		$search_term = sanitize_text_field( wp_unslash( $_GET['s'] ) );
		/* translators: %s: Search term. */
		return isset( $search_term ) ? sprintf( esc_html__( 'Search results for "%s"', 'journal-notes' ), esc_html( $search_term ) ) : __( 'Search results', 'journal-notes' );
	}
}

// Include block styles.
register_block_style(
	'core/group',
	array(
		'name'  => 'full-height',
		'label' => __( 'Full-height', 'journal-notes' ),
	)
);

register_block_style(
	'core/button',
	array(
		'name'  => 'journal-notes-line-button',
		'label' => __( 'Underlined', 'journal-notes' ),
	)
);
register_block_style(
	'core/button',
	array(
		'name'  => 'journal-notes-no-background',
		'label' => __( 'No Background', 'journal-notes' ),
	)
);

$list_styles = array(
	array(
		'name'  => 'journal-notes-list-chevron-right',
		'label' => __( 'Chevron Right', 'journal-notes' ),
	),
	array(
		'name'  => 'journal-notes-list-check',
		'label' => __( 'Checkmark', 'journal-notes' ),
	),
	array(
		'name'  => 'journal-notes-list-dash',
		'label' => __( 'Dash', 'journal-notes' ),
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
		'label' => __( 'Normal', 'journal-notes' ),
		'inline_style' => '',
		'is_default'   => true,
	),
	array(
		'name'  => 'round-edges',
		'label' => __( 'Round Edges', 'journal-notes' ),
		'inline_style' => '.is-style-round-edges {
			border-radius: 12px;
			overflow: hidden;
		}',
	),
	array(
		'name'  => 'primary-soft-drop-shadow',
		'label' => __( 'Primary Soft Drop Shadow', 'journal-notes' ),
		'inline_style' => '.is-style-primary-soft-drop-shadow {
			box-shadow: 0 5px 20px 0 var(--wp--preset--color--primary)
		}',
	),
	array(
		'name'  => 'primary-hard-drop-shadow',
		'label' => __( 'Primary Hard Drop Shadow', 'journal-notes' ),
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

// Remove unneeded patterns from Crosswinds.
function journal_notes_remove_core_patterns() {
	$core_block_patterns = array(
		'archive-content-left-sidebar',
		'archive-content-no-sidebar',
		'archive-content-right-sidebar',
		'header-base-mobile-menu',
		'header-contrast-mobile-menu',
		'header-base-regular-menu',
		'header-base-social-menu',
		'header-contrast-regular-menu',
		'header-contrast-social-menu',
		'footer-contrast-call-to-action',
		'footer-contrast-copyright-menu',
		'footer-contrast-large',
		'footer-contrast-no-nav',
		'footer-contrast-small',
		'footer-contrast-x-large',
		'footer-neutral-call-to-action',
		'footer-neutral-copyright-menu',
		'footer-neutral-large',
		'footer-neutral-no-nav',
		'footer-neutral-small',
		'footer-neutral-x-large',
		'page-header-base-centered',
		'page-header-base-left',
		'page-header-contrast-centered',
		'page-header-contrast-left',
		'query-pattern-grid',
		'query-pattern-list-columns',
		'query-pattern-list',
	);

	foreach ( $core_block_patterns as $core_block_pattern ) {
		unregister_block_pattern( 'crosswinds-framework/' . $core_block_pattern );
	}
}
add_action( 'init', 'journal_notes_remove_core_patterns' );

//* Enable all blocks that are required to run the theme.
add_filter( 'crosswinds_blocks_enable_single-content_block', function(){
	return true;
} );
