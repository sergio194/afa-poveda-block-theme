<?php
/**
 * Title: Portada — Hero
 * Slug: afa-poveda/home-hero
 * Categories: featured, afa-poveda
 * Keywords: portada, hero, inicio
 * Description: Hero de la portada con titular, texto de bienvenida y CTA móvil.
 *
 * @package afa-poveda
 */
?>
<!-- wp:cover {"dimRatio":50,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","gradient":"","contentPosition":"center left","isDark":true,"align":"wide","className":"afa-home-hero","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}}} -->
<div class="wp-block-cover alignwide afa-home-hero has-custom-content-position is-position-center-left" style="border-radius:12px;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--60);min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"afa-home-hero__content","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"640px","justifyContent":"left"}} -->
<div class="wp-block-group afa-home-hero__content"><!-- wp:heading {"level":1,"textColor":"base","fontSize":"huge","fontFamily":"heading"} -->
<h1 class="wp-block-heading has-base-color has-text-color has-heading-font-family has-huge-font-size"><?php esc_html_e( 'Construyendo juntos el futuro de nuestras hijas e hijos.', 'afa-poveda' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"base","fontSize":"large"} -->
<p class="has-base-color has-text-color has-large-font-size"><?php esc_html_e( 'Bienvenido al portal de la Asociación de Familias de Alumnos del CEIP Padre Poveda.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"afa-home-hero__cta"} -->
<div class="wp-block-buttons afa-home-hero__cta"><!-- wp:button {"backgroundColor":"base","textColor":"primary","className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-primary-color has-base-background-color has-text-color has-background wp-element-button" href="#afa-accesos"><?php esc_html_e( 'Descubre más', 'afa-poveda' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
