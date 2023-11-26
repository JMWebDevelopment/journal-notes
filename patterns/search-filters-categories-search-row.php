<?php
/**
 * Title: Widget - Search & Filters - Categories and Search Row
 * Slug: journal-notes/search-filters-categories-search-row
 * Categories: crosswinds-framework-search
 * Viewport Width: 1200
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","right":"var:preset|spacing|xx-small","bottom":"var:preset|spacing|x-small","left":"var:preset|spacing|xx-small"},"blockGap":"var:preset|spacing|xx-small"}},"backgroundColor":"quaternary","className":"search-filters search-filters-categories-search-row","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide search-filters search-filters-categories-search-row has-quaternary-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--xx-small);padding-bottom:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--xx-small)"><!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|xx-small"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group alignwide"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","fontWeight":"600"}},"fontSize":"large","fontFamily":"primary"} -->
<p class="has-primary-font-family has-large-font-size" style="font-style:italic;font-weight:600"><?php _e( 'Filter By:', 'journal-notes' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"5px","right":"20px","bottom":"5px","left":"20px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><?php _e( 'Category 1', 'journal-notes' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"style":{"spacing":{"padding":{"top":"5px","right":"20px","bottom":"5px","left":"20px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><?php _e( 'Category 2', 'journal-notes' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"style":{"spacing":{"padding":{"top":"5px","right":"20px","bottom":"5px","left":"20px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><?php _e( 'Category 3', 'journal-notes' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"style":{"spacing":{"padding":{"top":"5px","right":"20px","bottom":"5px","left":"20px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><?php _e( 'Category 4', 'journal-notes' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"style":{"spacing":{"padding":{"top":"5px","right":"20px","bottom":"5px","left":"20px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><?php _e( 'Category 5', 'journal-notes' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:search {"label":"Search","showLabel":false,"width":100,"widthUnit":"%","buttonText":"Search"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
