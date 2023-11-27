<?php
/**
 * This file adds functions to the Crosswinds Framework Child Starter Theme for WordPress.
 *
 * @package Crosswinds Framework Child Starter Theme
 * @author  Jacob Martella Web Development
 * @license GNU General Public License v2 or later
 * @link    https://crosswindsframework.com/downloads/journal-notes
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
				get_theme_file_uri( 'assets/css/editor/editor-style.min.css' )
			)
		);

		// Disable loading core block inline styles.
		add_filter( 'should_load_separate_core_block_assets', '__return_false' );

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );
	}
}
add_action( 'after_setup_theme', 'journal_notes_setup' );

/**
 * Enqueues the main stylesheet for the theme.
 *
 * @since 1.0
 * 
 */
add_action( 'wp_enqueue_scripts', 'journal_notes_enqueue_style_sheet', 99 );
function journal_notes_enqueue_style_sheet() {
	wp_enqueue_style( 'journal-notes', get_stylesheet_directory_uri() . '/assets/css/global.min.css', array(), wp_get_theme()->get( 'Version' ) );
}

/**
 * Loads all of the block styles for the theme.
 *
 * @since 1.0
 */
function journal_notes_load_block_styles() {
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
}
journal_notes_load_block_styles();

/**
 * Removes all of the Crosswinds Framework core patterns not used in the theme.
 *
 * @since 1.0
 */
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
		'error-header-base-centered',
		'error-header-base-left',
		'error-header-contrast-centered',
		'error-header-contrast-left',
		'search-header-base-centered',
		'search-header-base-left',
		'search-header-contrast-centered',
		'search-header-contrast-left',
		''
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

// Create the admin section
add_action( 'crosswinds_framework_theme_settings', function(){
	include get_stylesheet_directory() . '/admin/journal-notes-admin-settings.php';
} );

/**
 * Removes the default text for the sections on the admin page.
 *
 * @since 1.0
 */
function journal_notes_remove_actions() {
	remove_action( 'crosswinds_framework_admin_intro', 'crosswinds_framework_admin_intro' );
	remove_action( 'crosswinds_framework_admin_report_issue_section', 'crosswinds_framework_report_an_issue' );
	remove_action( 'crosswinds_framework_admin_feature_request_section', 'crosswinds_framework_feature_request' );
	remove_action( 'crosswinds_framework_admin_review_section', 'crosswinds_framework_leave_a_review' );
	remove_action( 'crosswinds_framework_admin_documentation_section', 'crosswinds_framework_view_documentation' );
}
add_action('init' , 'journal_notes_remove_actions' , 15 );

/**
 * Creates the intro section for the admin page.
 *
 * @since 1.0
 * 
 */
function journal_notes_admin_intro() {
	?>
	<p><?php esc_html_e( 'Welcome to Journal Notes and the Crosswinds Framework! With the power of this theme as well as the Crosswinds Blocks plugin, you can quickly create an amazing blog. On this page you\'ll be able to set up the blocks plugin to your liking, add your theme license, set up the theme for your website and find links to manage your account, read through documentation and so much more. You\'ll be able to create an amazing blog in no time!', 'journal-notes' ); ?></p>
	<?php
}
add_action( 'crosswinds_framework_admin_intro', 'journal_notes_admin_intro' );

/**
 * Creates the "Report an Issue" section text for the admin page.
 *
 * @since 1.0
 * 
 */
function journal_notes_report_an_issue() {
	?>
	<div class="options-section">
		<h2><?php esc_html_e( 'Report an Issue', 'journal-notes' ); ?></h2>
		<p><?php esc_html_e( 'If you come across an issue with Journal Notes, the Crosswinds Framework or Crosswinds Blocks, please report the issue as a GitHub issue at the link below. Thank you!', 'journal-notes' ); ?></p>
		<a class="button cf-button-primary" href="https://github.com/JMWebDevelopment/journal-notes/issues/new/choose"><?php esc_html_e( 'Report an Issue', 'journal-notes' ); ?></a>
	</div>
	<?php
}
add_action( 'crosswinds_framework_admin_report_issue_section', 'journal_notes_report_an_issue' );

/**
 * Creates the "Suggest a Feature" section text for the admin page.
 *
 * @since 1.0
 * 
 */
function journal_notes_feature_request() {
	?>
	<div class="options-section">
		<h2><?php esc_html_e( 'Suggest a Feature', 'journal-notes' ); ?></h2>
		<p><?php esc_html_e( 'New ideas are always welcome! If you have an idea for a new feature for Journal Notes, the Crosswinds Framework and/or Crosswinds Block, you can submit it as a GitHub issue at the link below! Thank you!', 'journal-notes' ); ?></p>
		<a class="button cf-button-primary" href="https://github.com/JMWebDevelopment/journal-notes/issues/new/choose"><?php esc_html_e( 'Suggest a Feature', 'journal-notes' ); ?></a>
	</div>
	<?php
}
add_action( 'crosswinds_framework_admin_feature_request_section', 'journal_notes_feature_request' );

/**
 * Creates the "View Documentation" section text for the admin page.
 *
 * @since 1.0
 * 
 */
function journal_notes_view_documentation() {
	?>
	<div class="options-section">
		<h2><?php esc_html_e( 'Check Out the Documentation', 'journal-notes' ); ?></h2>
		<p><?php esc_html_e( 'Learn how you can get started using Journal Notes and the Crosswinds Framework for your website by visiting the documentation at the link below.', 'journal-notes' ); ?></p>
		<a class="button cf-button-primary" href="https://crosswindsframework.com/docs/journal-notes"><?php esc_html_e( 'View Documentation', 'journal-notes' ); ?></a>
	</div>
	<?php
}
add_action( 'crosswinds_framework_admin_documentation_section', 'journal_notes_view_documentation' );
