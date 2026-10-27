<?php
/**
 * Title: Evento — Contenido de la ficha
 * Slug: afa-poveda/evento-contenido
 * Categories: featured, afa-poveda
 * Keywords: evento, detalles, qué nos espera
 * Description: Para pegar en el contenido de un evento: texto «¿Qué nos espera?» y tarjeta de detalles clave del plugin.
 * Post Types: tribe_events
 *
 * @package afa-poveda
 */

$plugin_activo = function_exists( 'afa_padre_poveda_core_contract_version' );
?>
<!-- wp:heading {"level":2,"textColor":"primary","fontSize":"xx-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-primary-color has-text-color has-heading-font-family has-xx-large-font-size"><?php esc_html_e( '¿Qué nos espera?', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Describe aquí el evento: programa, recorrido, qué llevar…', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->
<?php if ( $plugin_activo ) : ?>

<!-- wp:afa-padre-poveda/evento-detalles /-->
<?php endif; ?>
