<?php
/**
 * Title: Noticias — Migas de detalle
 * Slug: afa-poveda/noticias-crumbs
 * Categories: posts, afa-poveda
 * Keywords: migas, breadcrumbs, noticia
 * Description: Inicio › Noticias › título de la entrada actual (no es H1).
 * Template Types: single
 * Inserter: no
 *
 * @package afa-poveda
 */
?>
<!-- wp:group {"align":"wide","className":"afa-news-crumbs","style":{"spacing":{"blockGap":"0","margin":{"bottom":"var:preset|spacing|40"}}},"textColor":"contrast-muted","fontSize":"small","layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide afa-news-crumbs has-contrast-muted-color has-text-color has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--40)"><!-- wp:paragraph -->
<p><a href="/"><?php esc_html_e( 'Inicio', 'afa-poveda' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="/noticias/"><?php esc_html_e( 'Noticias', 'afa-poveda' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:post-title {"level":0,"isLink":false,"className":"afa-news-crumbs__current"} /--></div>
<!-- /wp:group -->
