<?php
/**
 * Title: Sobre nosotros — Hero
 * Slug: afa-poveda/sobre-hero
 * Categories: featured, afa-poveda
 * Keywords: afa, sobre nosotros, hero
 * Description: Hero de la página AFA / Sobre nosotros con titular y subtítulo.
 *
 * @package afa-poveda
 */
?>
<!-- wp:cover {"dimRatio":55,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":360,"minHeightUnit":"px","contentPosition":"center left","isDark":true,"align":"wide","className":"afa-sobre-hero","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}}} -->
<div class="wp-block-cover alignwide afa-sobre-hero has-custom-content-position is-position-center-left" style="border-radius:12px;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--60);min-height:360px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"afa-sobre-hero__content","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
<div class="wp-block-group afa-sobre-hero__content"><!-- wp:heading {"level":1,"textColor":"base","fontSize":"huge","fontFamily":"heading"} -->
<h1 class="wp-block-heading has-base-color has-text-color has-heading-font-family has-huge-font-size"><?php esc_html_e( 'Sobre nosotros', 'afa-poveda' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"base","fontSize":"large"} -->
<p class="has-base-color has-text-color has-large-font-size"><?php esc_html_e( 'Construyendo juntos la mejor educación para nuestros hijos e hijas desde la comunidad de familias.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
