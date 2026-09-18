<?php
/**
 * Title: Servicio — Hero detalle
 * Slug: afa-poveda/servicio-hero
 * Categories: featured, afa-poveda
 * Keywords: comedor, hero, servicio
 * Description: Cover del detalle de servicio con badge, título y subtítulo.
 *
 * @package afa-poveda
 */
?>
<!-- wp:cover {"dimRatio":55,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","contentPosition":"bottom left","isDark":true,"align":"full","className":"afa-servicio-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}}} -->
<div class="wp-block-cover alignfull afa-servicio-hero has-custom-content-position is-position-bottom-left is-dark" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--60);min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-55 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"afa-servicio-hero__content","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
<div class="wp-block-group afa-servicio-hero__content"><!-- wp:paragraph {"backgroundColor":"soft-green","textColor":"green","className":"afa-servicio-hero__badge","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":"9999px"},"typography":{"fontWeight":"600"}},"fontSize":"small"} -->
<p class="afa-servicio-hero__badge has-green-color has-soft-green-background-color has-text-color has-background has-small-font-size" style="border-radius:9999px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--40);font-weight:600"><?php esc_html_e( 'Servicio Destacado', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textColor":"base","fontSize":"huge","fontFamily":"heading"} -->
<h1 class="wp-block-heading has-base-color has-text-color has-heading-font-family has-huge-font-size"><?php esc_html_e( 'Comedor Escolar', 'afa-poveda' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"base","fontSize":"large"} -->
<p class="has-base-color has-text-color has-large-font-size"><?php esc_html_e( 'Nutrición equilibrada, educación en la mesa y productos de proximidad para nuestros hijos e hijas.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
