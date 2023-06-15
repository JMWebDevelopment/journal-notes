<?php
/**
 * Title: Default Related Posts
 * Slug: journal-notes/related-posts
 * Categories: crosswinds-framework-post-content
 * Viewport Width: 800
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem"}}},"className":"related-posts-section","layout":{"type":"constrained"}} -->
<div class="wp-block-group related-posts-section" style="padding-top:2rem;padding-bottom:2rem"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center"><?php _e( 'Related Posts', 'journal-notes' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:crosswinds-blocks/related-posts -->
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"isDark":false,"className":"post-cover"} -->
<div class="wp-block-cover is-light post-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:post-title {"textAlign":"center","textColor":"base","fontSize":"max-60"} /-->

<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group has-base-color has-text-color has-link-color"><!-- wp:post-date {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"large","fontFamily":"body"} /-->

<!-- wp:post-terms {"term":"category","textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"large","fontFamily":"body"} /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<!-- /wp:crosswinds-blocks/related-posts --></div>
<!-- /wp:group -->
