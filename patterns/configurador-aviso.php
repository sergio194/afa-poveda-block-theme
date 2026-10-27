<?php
/**
 * Title: Configurador — Aviso de cuotas
 * Slug: afa-poveda/configurador-aviso
 * Categories: featured, afa-poveda
 * Keywords: configurador, cuotas, socios, aviso
 * Description: Aviso verde «Aviso de cuotas» bajo el configurador de semana. Texto editable.
 *
 * @package afa-poveda
 */
?>
<!-- wp:group {"align":"wide","className":"afa-configurador__aviso","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|20"},"border":{"radius":"12px"}},"backgroundColor":"soft-green","textColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide afa-configurador__aviso has-contrast-color has-soft-green-background-color has-text-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}}} -->
<p style="font-weight:700"><?php esc_html_e( 'Aviso de cuotas', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><?php esc_html_e( 'Los precios mostrados son para socios de la AFA. Hazte socio para beneficiarte de las cuotas reducidas.', 'afa-poveda' ); ?> <a href="/hazte-socio/"><?php esc_html_e( 'Hazte socio', 'afa-poveda' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
