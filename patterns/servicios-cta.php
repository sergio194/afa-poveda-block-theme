<?php
/**
 * Title: Servicios — CTA dudas
 * Slug: afa-poveda/servicios-cta
 * Categories: call-to-action, afa-poveda
 * Keywords: servicios, contacto, faq
 * Description: Banner final del listado con acceso a contacto y preguntas frecuentes.
 *
 * @package afa-poveda
 */
?>
<!-- wp:group {"align":"wide","className":"afa-servicios-cta","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"backgroundColor":"primary","layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
<div class="wp-block-group alignwide afa-servicios-cta has-primary-background-color has-background" style="border-radius:16px;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"textColor":"base","fontSize":"xx-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-base-color has-text-color has-heading-font-family has-xx-large-font-size"><?php esc_html_e( '¿Tienes alguna duda sobre los servicios?', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"base"} -->
<p class="has-base-color has-text-color"><?php esc_html_e( 'Estamos aquí para ayudarte a que el curso escolar sea más fácil para todos.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"afa-servicios-cta__buttons","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-buttons afa-servicios-cta__buttons"><!-- wp:button {"backgroundColor":"base","textColor":"primary","className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-primary-color has-base-background-color has-text-color has-background wp-element-button" href="/contacto/"><?php esc_html_e( 'Contactar ahora', 'afa-poveda' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline afa-servicios-cta__btn-outline","textColor":"base"} -->
<div class="wp-block-button is-style-outline afa-servicios-cta__btn-outline"><a class="wp-block-button__link has-base-color has-text-color wp-element-button" href="/contacto/"><?php esc_html_e( 'Preguntas frecuentes', 'afa-poveda' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
