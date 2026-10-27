<?php
/**
 * Title: Calendario — Mes
 * Slug: afa-poveda/calendario-mes
 * Categories: featured, afa-poveda
 * Keywords: calendario, eventos, mes
 * Description: Calendario mensual con leyenda (bloque del plugin; requiere The Events Calendar). Sin el plugin muestra un aviso.
 *
 * @package afa-poveda
 */

$plugin_activo = function_exists( 'afa_padre_poveda_core_contract_version' );
?>
<!-- wp:group {"className":"afa-calendario__mes","layout":{"type":"default"}} -->
<div class="wp-block-group afa-calendario__mes"><?php if ( $plugin_activo ) : ?><!-- wp:afa-padre-poveda/eventos-calendario /--><?php else : ?><!-- wp:paragraph {"textColor":"contrast-muted"} -->
<p class="has-contrast-muted-color has-text-color"><?php esc_html_e( 'El calendario estará disponible próximamente.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --><?php endif; ?></div>
<!-- /wp:group -->
