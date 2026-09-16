<?php
/**
 * Title: Suscripción a noticias
 * Slug: afa-poveda/newsletter
 * Categories: call-to-action, afa-poveda
 * Keywords: newsletter, suscripción, email
 * Description: Tarjeta destacada para invitar a suscribirse a las noticias de la AFA.
 *
 * El formulario real lo pondrá el plugin de newsletter elegido (ver spec 003).
 * Mientras tanto, el botón enlaza a la página de suscripción.
 *
 * @package afa-poveda
 */
?>
<!-- wp:group {"className":"is-style-afa-card-accent","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-afa-card-accent"><!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"600"}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size" style="font-weight:600"><?php esc_html_e( 'Suscríbete', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><?php esc_html_e( 'Recibe las noticias de nuestra comunidad directamente en tu email.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:button {"width":100} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="/newsletter/"><?php esc_html_e( 'Suscríbete', 'afa-poveda' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
