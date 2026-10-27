<?php
/**
 * Title: Extraescolares — Banner de dudas
 * Slug: afa-poveda/extraescolares-dudas
 * Categories: featured, afa-poveda
 * Keywords: extraescolares, inscripción, dudas, banner
 * Description: Banner azul «¿Tienes dudas sobre las inscripciones?» con dos botones editables.
 *
 * @package afa-poveda
 */
?>
<!-- wp:group {"align":"wide","className":"afa-extra-dudas","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60","right":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"},"border":{"radius":"16px"}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide afa-extra-dudas has-base-color has-primary-background-color has-text-color has-background" style="border-radius:16px;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)"><!-- wp:heading {"level":2,"textColor":"base","fontSize":"x-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-base-color has-text-color has-heading-font-family has-x-large-font-size"><?php esc_html_e( '¿Tienes dudas sobre las inscripciones?', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"base"} -->
<p class="has-base-color has-text-color"><?php esc_html_e( 'Consulta nuestra guía de preguntas frecuentes o contacta directamente con el coordinador de actividades.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"afa-extra-dudas__buttons"} -->
<div class="wp-block-buttons afa-extra-dudas__buttons"><!-- wp:button {"backgroundColor":"base","textColor":"primary"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-base-background-color has-text-color has-background wp-element-button" href="/servicios/"><?php esc_html_e( 'Ver guía de inscripción', 'afa-poveda' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline afa-extra-dudas__btn-outline","textColor":"base"} -->
<div class="wp-block-button is-style-outline afa-extra-dudas__btn-outline"><a class="wp-block-button__link has-base-color has-text-color wp-element-button" href="/contacto/"><?php esc_html_e( 'Contactar con AFA', 'afa-poveda' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
