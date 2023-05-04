<?php
/**
 * Title: Default Post Navigation
 * Slug: journal-notes/post-navigation
 * Categories: crosswinds-framework-post-content
 * Viewport Width: 800
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem"}}},"className":"post-navigation-section","layout":{"type":"constrained"}} -->
<div class="wp-block-group post-navigation-section" style="padding-top:2rem;padding-bottom:2rem"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:crosswinds-blocks/previous-post -->
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"className":"post-cover"} -->
<div class="wp-block-cover post-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:post-title {"textAlign":"center","textColor":"base","fontSize":"large"} /-->

<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group has-base-color has-text-color has-link-color"><!-- wp:post-date {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"Regular","fontFamily":"body"} /-->

<!-- wp:post-terms {"term":"category","textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"Regular","fontFamily":"body"} /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<!-- /wp:crosswinds-blocks/previous-post --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:crosswinds-blocks/next-post -->
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"className":"post-cover"} -->
<div class="wp-block-cover post-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:post-title {"textAlign":"center","textColor":"base","fontSize":"large"} /-->

<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group has-base-color has-text-color has-link-color"><!-- wp:post-date {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"Regular","fontFamily":"body"} /-->

<!-- wp:post-terms {"term":"category","textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"Regular","fontFamily":"body"} /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<!-- /wp:crosswinds-blocks/next-post --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
