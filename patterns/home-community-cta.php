<?php
/**
 * Title: Portada — CTA comunidad
 * Slug: afa-poveda/home-community-cta
 * Categories: call-to-action, afa-poveda
 * Keywords: socio, vocalías, comunidad
 * Description: Bloque final de portada para hacerse socio o contactar con las vocalías.
 *
 * @package afa-poveda
 */
?>
<!-- wp:group {"align":"wide","className":"afa-home-cta","style":{"border":{"radius":"24px"},"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"backgroundColor":"surface-container","layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group alignwide afa-home-cta has-surface-container-background-color has-background" style="border-radius:24px;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","fontSize":"xx-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-font-family has-xx-large-font-size"><?php esc_html_e( '¿Quieres participar en la comunidad?', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"contrast-muted"} -->
<p class="has-text-align-center has-contrast-muted-color has-text-color"><?php esc_html_e( 'La AFA la formamos todas las familias. Tu aportación, por pequeña que sea, ayuda a mejorar el día a día de nuestros hijos.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/hazte-socio/"><?php esc_html_e( 'Hazte Socio Ahora', 'afa-poveda' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/contacto/"><?php esc_html_e( 'Contactar con Vocalías', 'afa-poveda' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
