<?php
/**
 * Title: Calendario — Columna lateral
 * Slug: afa-poveda/calendario-lateral
 * Categories: featured, afa-poveda
 * Keywords: calendario, próximos eventos, destacado, pdf
 * Description: Próximos eventos, tarjeta destacada editable y botón de descarga del calendario en PDF.
 *
 * @package afa-poveda
 */

$plugin_activo = function_exists( 'afa_padre_poveda_core_contract_version' );
?>
<?php if ( $plugin_activo ) : ?>
<!-- wp:group {"className":"afa-calendario__proximos","layout":{"type":"default"}} -->
<div class="wp-block-group afa-calendario__proximos"><!-- wp:afa-padre-poveda/eventos-proximos /--></div>
<!-- /wp:group -->
<?php endif; ?>

<!-- wp:group {"className":"afa-calendario__destacado","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|20"},"border":{"radius":"12px"}},"backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group afa-calendario__destacado has-base-color has-contrast-background-color has-text-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"fontSize":"x-small","style":{"typography":{"fontWeight":"700","textTransform":"uppercase"}}} -->
<p class="has-x-small-font-size" style="font-weight:700;text-transform:uppercase"><?php esc_html_e( 'Destacado', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2,"textColor":"base","fontSize":"x-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-base-color has-text-color has-heading-font-family has-x-large-font-size"><?php esc_html_e( 'Inscripciones Extraescolares', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"base"} -->
<p class="has-base-color has-text-color"><a href="/extraescolares/"><?php esc_html_e( 'Abierto el plazo para nuevas actividades.', 'afa-poveda' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<?php if ( $plugin_activo ) : ?>

<!-- wp:afa-padre-poveda/eventos-pdf /-->
<?php endif; ?>
