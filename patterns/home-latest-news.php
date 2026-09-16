<?php
/**
 * Title: Portada — Últimas noticias
 * Slug: afa-poveda/home-latest-news
 * Categories: posts, afa-poveda
 * Keywords: noticias, blog, portada
 * Description: Tres noticias recientes en rejilla igualada (Figma HOME).
 *
 * @package afa-poveda
 */
?>
<!-- wp:group {"align":"wide","className":"afa-home-news","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide afa-home-news"><!-- wp:group {"className":"afa-home-section-head","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group afa-home-section-head"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"fontSize":"xx-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-heading-font-family has-xx-large-font-size"><?php esc_html_e( 'Últimas Noticias', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"contrast-muted"} -->
<p class="has-contrast-muted-color has-text-color"><?php esc_html_e( 'Descubre las novedades de nuestro blog y comunidad.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"afa-home-section-head__link","style":{"typography":{"fontWeight":"700","letterSpacing":"0.05em"}},"textColor":"primary","fontSize":"small"} -->
<p class="afa-home-section-head__link has-primary-color has-text-color has-small-font-size" style="font-weight:700;letter-spacing:0.05em"><a href="/noticias/"><?php esc_html_e( 'Ver noticias', 'afa-poveda' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":22,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"className":"afa-home-news__list","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"className":"afa-home-news-card is-style-afa-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group afa-home-news-card is-style-afa-card"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","className":"afa-home-news-card__media"} /-->

<!-- wp:post-date {"style":{"typography":{"fontWeight":"600","letterSpacing":"0.05em"}},"textColor":"contrast-muted","fontSize":"small"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"x-large"} /-->

<!-- wp:post-excerpt {"moreText":"","excerptLength":18} /-->

<!-- wp:read-more {"content":"Leer más","className":"afa-home-news-card__more"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'No hay noticias que mostrar todavía.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->

<!-- wp:buttons {"className":"afa-home-news__more","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons afa-home-news__more"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/noticias/"><?php esc_html_e( 'Cargar más noticias', 'afa-poveda' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
