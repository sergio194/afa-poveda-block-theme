<?php
/**
 * Title: Suscripción a noticias (con formulario)
 * Slug: afa-poveda/newsletter-formulario
 * Categories: call-to-action, afa-poveda
 * Keywords: newsletter, suscripción, email, formulario
 * Description: Tarjeta de suscripción con el formulario del plugin (bloque «newsletter»). Sin el plugin el bloque no imprime nada: usar «Suscripción a noticias».
 *
 * @package afa-poveda
 */
?>
<!-- wp:group {"className":"is-style-afa-card-accent afa-newsletter-form","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-afa-card-accent afa-newsletter-form"><!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"600"}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size" style="font-weight:600"><?php esc_html_e( 'Suscríbete', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><?php esc_html_e( 'Recibe las noticias de nuestra comunidad directamente en tu email.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:afa-padre-poveda/newsletter /--></div>
<!-- /wp:group -->
