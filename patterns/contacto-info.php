<?php
/**
 * Title: Contacto — Información
 * Slug: afa-poveda/contacto-info
 * Categories: featured, afa-poveda
 * Keywords: contacto, dirección, horario, vocalías
 * Description: Tarjeta «Información de contacto» con dirección, email, horario de atención y vocalías. Todo el texto es editable.
 *
 * @package afa-poveda
 */
?>
<!-- wp:group {"className":"afa-contacto__card afa-contacto__info","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"backgroundColor":"surface-container","layout":{"type":"default"}} -->
<div class="wp-block-group afa-contacto__card afa-contacto__info has-surface-container-background-color has-background"><!-- wp:heading {"level":2,"fontSize":"x-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-heading-font-family has-x-large-font-size"><?php esc_html_e( 'Información de contacto', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"afa-contacto__dato afa-contacto__dato--pin","layout":{"type":"default"}} -->
<div class="wp-block-group afa-contacto__dato afa-contacto__dato--pin"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
<p style="font-weight:600"><?php esc_html_e( 'Dirección', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Calle de Alfonso XII, 58, 28014 Madrid', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"afa-contacto__dato afa-contacto__dato--mail","layout":{"type":"default"}} -->
<div class="wp-block-group afa-contacto__dato afa-contacto__dato--mail"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
<p style="font-weight:600"><?php esc_html_e( 'Email', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="mailto:info@afapadrepoveda.org">info@afapadrepoveda.org</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"afa-contacto__dato afa-contacto__dato--reloj","layout":{"type":"default"}} -->
<div class="wp-block-group afa-contacto__dato afa-contacto__dato--reloj"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
<p style="font-weight:600"><?php esc_html_e( 'Horario de atención', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><?php esc_html_e( 'Lunes y martes: 16:00 - 17:15', 'afa-poveda' ); ?><br><?php esc_html_e( 'Viernes: 16:00 - 17:30', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-wide"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:group {"className":"afa-contacto__vocalias","layout":{"type":"default"}} -->
<div class="wp-block-group afa-contacto__vocalias"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
<p style="font-weight:600"><?php esc_html_e( 'Vocalías específicas', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"afa-contacto__pills","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group afa-contacto__pills"><!-- wp:paragraph {"className":"afa-contacto__pill","fontSize":"small"} -->
<p class="afa-contacto__pill has-small-font-size"><?php esc_html_e( 'Comedor', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"afa-contacto__pill","fontSize":"small"} -->
<p class="afa-contacto__pill has-small-font-size"><?php esc_html_e( 'Extraescolares', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"afa-contacto__pill","fontSize":"small"} -->
<p class="afa-contacto__pill has-small-font-size"><?php esc_html_e( 'Inclusión', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"afa-contacto__pill","fontSize":"small"} -->
<p class="afa-contacto__pill has-small-font-size"><?php esc_html_e( 'Cultura', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
