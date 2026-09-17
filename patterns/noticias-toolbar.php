<?php
/**
 * Title: Noticias — Filtros y búsqueda
 * Slug: afa-poveda/noticias-toolbar
 * Categories: posts, afa-poveda
 * Keywords: categorias, filtros, buscar, noticias
 * Description: Buscador y desplegable de categorías; enlace «Todas» solo fuera del archivo completo.
 * Template Types: home, archive, search, index
 *
 * @package afa-poveda
 */
?>
<!-- wp:group {"align":"wide","className":"afa-news-toolbar","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide afa-news-toolbar" style="margin-bottom:var(--wp--preset--spacing--50)"><!-- wp:search {"label":"<?php echo esc_attr__( 'Buscar noticias', 'afa-poveda' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr__( 'Buscar noticias…', 'afa-poveda' ); ?>","buttonText":"<?php echo esc_attr__( 'Buscar', 'afa-poveda' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"className":"afa-news-toolbar__search"} /-->

<!-- wp:group {"className":"afa-news-toolbar__filters","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group afa-news-toolbar__filters"><!-- wp:paragraph {"className":"afa-news-toolbar__all"} -->
<p class="afa-news-toolbar__all"><a href="/noticias/"><?php esc_html_e( 'Todas las noticias', 'afa-poveda' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:categories {"displayAsDropdown":true,"showHierarchy":false,"showPostCounts":false,"showLabel":true,"label":"<?php echo esc_attr__( 'Categoría', 'afa-poveda' ); ?>","className":"afa-news-cats"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
