<?php
/**
 * Title: Extraescolar — Aviso «¿Aún no eres socio?»
 * Slug: afa-poveda/extraescolar-socio
 * Categories: featured, afa-poveda
 * Keywords: extraescolar, socio, cuota, ahorro
 * Description: Aviso verde de la ficha de actividad que invita a asociarse. Texto y enlace editables.
 *
 * @package afa-poveda
 */
?>
<!-- wp:group {"className":"afa-extra-socio","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"12px"}},"backgroundColor":"soft-green","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group afa-extra-socio has-contrast-color has-soft-green-background-color has-text-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
<p style="font-weight:600"><?php esc_html_e( '¿Aún no eres socio?', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><?php esc_html_e( 'Hazte socio de la AFA por una cuota anual por familia y ahorra en cada actividad.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small","style":{"typography":{"fontWeight":"700"}}} -->
<p class="has-small-font-size" style="font-weight:700"><a href="/hazte-socio/"><?php esc_html_e( 'Asociarse ahora', 'afa-poveda' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
