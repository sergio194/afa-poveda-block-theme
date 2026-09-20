<?php
/**
 * Title: Hazte Socio — Cómo pertenecer
 * Slug: afa-poveda/hazte-pertenecer
 * Categories: call-to-action, afa-poveda
 * Keywords: cuota, formulario, socio
 * Description: Cuota, beneficios y hueco para el formulario del plugin. Sustituye el fallback por el bloque del plugin de formularios.
 *
 * @package afa-poveda
 */

/*
 * La junta debe sustituir el contenido de .afa-hazte-form por el bloque/shortcode
 * del plugin de formularios (campos: Nombre tutor/a, DNI/NIE, Email, privacidad).
 * No añadir <form> HTML ni inputs decorativos que no envían.
 */
?>
<!-- wp:group {"align":"wide","anchor":"pertenecer","className":"afa-hazte-pertenecer","style":{"border":{"radius":"16px"},"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide afa-hazte-pertenecer" id="pertenecer" style="border-radius:16px"><!-- wp:columns {"className":"afa-hazte-pertenecer__cols","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
<div class="wp-block-columns afa-hazte-pertenecer__cols"><!-- wp:column {"width":"50%","className":"afa-hazte-pertenecer__cuota","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"backgroundColor":"primary"} -->
<div class="wp-block-column afa-hazte-pertenecer__cuota has-primary-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50);flex-basis:50%"><!-- wp:heading {"textColor":"base","fontSize":"xx-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-base-color has-text-color has-heading-font-family has-xx-large-font-size"><?php esc_html_e( '¿Cómo pertenecer?', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"base","fontSize":"x-large","fontFamily":"heading","style":{"typography":{"fontWeight":"700"}}} -->
<p class="has-base-color has-text-color has-heading-font-family has-x-large-font-size" style="font-weight:700"><?php esc_html_e( '45€ CUOTA ANUAL POR FAMILIA', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"afa-hazte-pertenecer__beneficio","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group afa-hazte-pertenecer__beneficio"><!-- wp:icon {"icon":"afa-poveda/check-line","textColor":"base","className":"afa-hazte-pertenecer__check","style":{"dimensions":{"width":"20px"}}} /-->

<!-- wp:paragraph {"textColor":"base"} -->
<p class="has-base-color has-text-color"><?php esc_html_e( 'Acceso a extraescolares subvencionadas.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"afa-hazte-pertenecer__beneficio","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group afa-hazte-pertenecer__beneficio"><!-- wp:icon {"icon":"afa-poveda/check-line","textColor":"base","className":"afa-hazte-pertenecer__check","style":{"dimensions":{"width":"20px"}}} /-->

<!-- wp:paragraph {"textColor":"base"} -->
<p class="has-base-color has-text-color"><?php esc_html_e( 'Descuentos en eventos y excursiones.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"afa-hazte-pertenecer__beneficio","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group afa-hazte-pertenecer__beneficio"><!-- wp:icon {"icon":"afa-poveda/check-line","textColor":"base","className":"afa-hazte-pertenecer__check","style":{"dimensions":{"width":"20px"}}} /-->

<!-- wp:paragraph {"textColor":"base"} -->
<p class="has-base-color has-text-color"><?php esc_html_e( 'Prioridad en ludoteca y servicios de conciliación.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%","className":"afa-hazte-form","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"backgroundColor":"base"} -->
<div class="wp-block-column afa-hazte-form has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50);flex-basis:50%"><!-- wp:heading {"level":3,"fontSize":"large","fontFamily":"heading"} -->
<h3 class="wp-block-heading has-heading-font-family has-large-font-size"><?php esc_html_e( 'Solicitud de alta', 'afa-poveda' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"contrast-muted"} -->
<p class="has-contrast-muted-color has-text-color"><?php esc_html_e( 'El formulario de inscripción se activa con el plugin de formularios del sitio. Mientras tanto, puedes escribirnos desde Contacto.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contacto/"><?php esc_html_e( 'Ir a Contacto', 'afa-poveda' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"textColor":"contrast-muted","fontSize":"small"} -->
<p class="has-contrast-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'Tras enviar la solicitud recibirás por email las instrucciones de pago y la información del carnet digital.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
