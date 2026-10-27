<?php
/**
 * Title: Contacto — Formulario
 * Slug: afa-poveda/contacto-formulario
 * Categories: featured, afa-poveda
 * Keywords: contacto, formulario, mensaje
 * Description: Formulario de contacto del plugin. Sin el plugin activo muestra un texto provisional con el email.
 *
 * @package afa-poveda
 */

$plugin_activo = function_exists( 'afa_padre_poveda_core_contract_version' );
?>
<!-- wp:group {"className":"afa-contacto__card","layout":{"type":"default"}} -->
<div class="wp-block-group afa-contacto__card"><?php if ( $plugin_activo ) : ?><!-- wp:afa-padre-poveda/contacto /--><?php else : ?><!-- wp:paragraph -->
<p><?php esc_html_e( 'Para contactar con la AFA escríbenos a', 'afa-poveda' ); ?> <a href="mailto:info@afapadrepoveda.org">info@afapadrepoveda.org</a>.</p>
<!-- /wp:paragraph --><?php endif; ?></div>
<!-- /wp:group -->
