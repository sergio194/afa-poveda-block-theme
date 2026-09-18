<?php
/**
 * Title: Servicio — Preguntas frecuentes
 * Slug: afa-poveda/servicio-faq
 * Categories: text, afa-poveda
 * Keywords: faq, comedor, preguntas
 * Description: Acordeón de FAQ del detalle de servicio con bloques Details nativos.
 *
 * @package afa-poveda
 */
?>
<!-- wp:group {"className":"afa-servicio-faq","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group afa-servicio-faq has-base-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"fontSize":"x-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-heading-font-family has-x-large-font-size"><?php esc_html_e( 'Preguntas Frecuentes', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:details {"showContent":true,"className":"afa-servicio-faq__item"} -->
<details class="wp-block-details afa-servicio-faq__item" open><summary><?php esc_html_e( '¿Cómo comunico una alergia puntual?', 'afa-poveda' ); ?></summary><!-- wp:paragraph {"textColor":"contrast-muted"} -->
<p class="has-contrast-muted-color has-text-color"><?php esc_html_e( 'Avísanos a través de la plataforma de comedor antes de las 9:30 h del mismo día. La cocina adaptará el menú siempre que sea posible.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"afa-servicio-faq__item"} -->
<details class="wp-block-details afa-servicio-faq__item"><summary><?php esc_html_e( '¿Se puede contratar el servicio por días sueltos?', 'afa-poveda' ); ?></summary><!-- wp:paragraph {"textColor":"contrast-muted"} -->
<p class="has-contrast-muted-color has-text-color"><?php esc_html_e( 'Sí, según disponibilidad y previa reserva. Consulta las condiciones de contratación en la documentación del servicio.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"afa-servicio-faq__item"} -->
<details class="wp-block-details afa-servicio-faq__item"><summary><?php esc_html_e( '¿Qué empresa gestiona el servicio?', 'afa-poveda' ); ?></summary><!-- wp:paragraph {"textColor":"contrast-muted"} -->
<p class="has-contrast-muted-color has-text-color"><?php esc_html_e( 'El servicio lo gestiona una empresa de restauración escolar contratada por la AFA. Los datos de contacto actualizados están en la documentación.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details --></div>
<!-- /wp:group -->
