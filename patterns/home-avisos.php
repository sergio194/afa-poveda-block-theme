<?php
/**
 * Title: Portada — Actualidad y Avisos
 * Slug: afa-poveda/home-avisos
 * Categories: posts, afa-poveda
 * Keywords: avisos, destacados, actualidad
 * Description: Sticky en dos columnas (Figma): destacado con imagen a la izquierda; hasta dos avisos de texto a la derecha.
 *
 * @package afa-poveda
 */
?>
<!-- wp:group {"align":"wide","className":"afa-home-avisos","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide afa-home-avisos"><!-- wp:group {"className":"afa-home-section-head","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group afa-home-section-head"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"fontSize":"xx-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-heading-font-family has-xx-large-font-size"><?php esc_html_e( 'Actualidad y Avisos', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"contrast-muted"} -->
<p class="has-contrast-muted-color has-text-color"><?php esc_html_e( 'Mantente al día con lo que sucede en el colegio.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"afa-home-section-head__link","style":{"typography":{"fontWeight":"700","letterSpacing":"0.05em"}},"textColor":"primary","fontSize":"small"} -->
<p class="afa-home-section-head__link has-primary-color has-text-color has-small-font-size" style="font-weight:700;letter-spacing:0.05em"><a href="/noticias/"><?php esc_html_e( 'Ver todo', 'afa-poveda' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"verticalAlignment":"stretch","className":"afa-home-avisos__cols","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns are-vertically-aligned-stretch afa-home-avisos__cols"><!-- wp:column {"verticalAlignment":"stretch","width":"58%","className":"afa-home-avisos__feature"} -->
<div class="wp-block-column is-vertically-aligned-stretch afa-home-avisos__feature" style="flex-basis:58%"><!-- wp:query {"queryId":31,"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<!-- wp:group {"className":"afa-home-aviso-card afa-home-aviso-card--feature is-style-afa-card","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group afa-home-aviso-card afa-home-aviso-card--feature is-style-afa-card"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","className":"afa-home-aviso-card__media"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:post-terms {"term":"category","className":"afa-home-aviso-card__chip"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"x-large"} /-->

<!-- wp:post-excerpt {"moreText":"","excerptLength":28} /-->

<!-- wp:read-more {"content":"Más información","className":"afa-home-aviso-card__more"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:group {"className":"afa-home-avisos__empty"} -->
<div class="wp-block-group afa-home-avisos__empty"></div>
<!-- /wp:group -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"stretch","width":"42%","className":"afa-home-avisos__side"} -->
<div class="wp-block-column is-vertically-aligned-stretch afa-home-avisos__side" style="flex-basis:42%"><!-- wp:query {"queryId":32,"query":{"perPage":2,"pages":0,"offset":1,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false}} -->
<div class="wp-block-query afa-home-avisos__side-query"><!-- wp:post-template {"className":"afa-home-avisos__side-list","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"default"}} -->
<!-- wp:group {"className":"afa-home-aviso-card afa-home-aviso-card--side is-style-afa-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group afa-home-aviso-card afa-home-aviso-card--side is-style-afa-card"><!-- wp:post-terms {"term":"category","className":"afa-home-aviso-card__chip"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"large"} /-->

<!-- wp:post-excerpt {"moreText":"","excerptLength":18} /-->

<!-- wp:read-more {"content":"Más información","className":"afa-home-aviso-card__more"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:group {"className":"afa-home-avisos__empty"} -->
<div class="wp-block-group afa-home-avisos__empty"></div>
<!-- /wp:group -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
