<?php
/**
 * Title: Noticias — Rejilla
 * Slug: afa-poveda/noticias-grid
 * Categories: query, afa-poveda
 * Keywords: noticias, grid, archivo
 * Description: Bucle heredado del archivo (6 por página vía Lectura) en fichas 3×2.
 * Template Types: home, archive, search, index
 *
 * @package afa-poveda
 */
?>
<!-- wp:query {"queryId":41,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":true},"align":"wide","className":"afa-news-grid"} -->
<div class="wp-block-query alignwide afa-news-grid"><!-- wp:post-template {"className":"afa-news-grid__list","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"className":"afa-news-card is-style-afa-card","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group afa-news-card is-style-afa-card"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","sizeSlug":"afa-news-card","className":"afa-news-card__media"} /-->

<!-- wp:group {"className":"afa-news-card__body","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group afa-news-card__body" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"className":"afa-news-card__meta","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group afa-news-card__meta"><!-- wp:post-terms {"term":"category","className":"afa-news-card__cat"} /-->

<!-- wp:post-date {"style":{"typography":{"fontWeight":"600"}},"textColor":"primary","fontSize":"small"} /--></div>
<!-- /wp:group -->

<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"large","fontFamily":"heading"} /-->

<!-- wp:post-excerpt {"moreText":"","excerptLength":18} /-->

<!-- wp:read-more {"content":"Leer más","className":"afa-news-card__more"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"paginationArrow":"arrow","showLabel":false,"className":"afa-news-pagination","layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:group {"className":"afa-news-empty","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group afa-news-empty"><!-- wp:paragraph -->
<p><?php esc_html_e( 'No hay noticias que mostrar todavía.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="/noticias/"><?php esc_html_e( 'Ver todas las noticias', 'afa-poveda' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->
