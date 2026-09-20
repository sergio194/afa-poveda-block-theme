<?php
/**
 * Title: Hazte Socio — Dudas
 * Slug: afa-poveda/hazte-dudas
 * Categories: text, afa-poveda
 * Keywords: email, contacto, dudas
 * Description: Bloque de contacto por correo. Icono con el bloque Icono; edita el mailto desde el editor.
 *
 * @package afa-poveda
 */
?>
<!-- wp:group {"align":"wide","className":"afa-hazte-dudas","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group alignwide afa-hazte-dudas" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:icon {"icon":"afa-poveda/mail","textColor":"primary","align":"center","style":{"dimensions":{"width":"40px"}}} /-->

<!-- wp:heading {"textAlign":"center","level":2,"fontSize":"x-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-font-family has-x-large-font-size"><?php esc_html_e( '¿Tienes dudas?', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"primary","style":{"typography":{"fontWeight":"600"}}} -->
<p class="has-text-align-center has-primary-color has-text-color" style="font-weight:600"><a href="mailto:info@afapadrepoveda.org"><?php esc_html_e( 'Escríbenos a info@afapadrepoveda.org', 'afa-poveda' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","textColor":"contrast-muted"} -->
<p class="has-text-align-center has-contrast-muted-color has-text-color"><?php esc_html_e( 'Estamos aquí para escucharte y construir juntos el mejor cole posible.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
