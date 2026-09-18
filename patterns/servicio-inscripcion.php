<?php
/**
 * Title: Servicio — Inscripción
 * Slug: afa-poveda/servicio-inscripcion
 * Categories: call-to-action, afa-poveda
 * Keywords: inscripción, precio, comedor
 * Description: Tarjeta de precios, horario y CTA de inscripción (enlace configurable).
 *
 * @package afa-poveda
 */

$clock = esc_url( get_theme_file_uri( 'assets/icons/icon-clock.svg' ) );
?>
<!-- wp:group {"className":"afa-servicio-inscripcion","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group afa-servicio-inscripcion has-primary-background-color has-background" style="border-radius:16px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"level":2,"textColor":"base","fontSize":"x-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-base-color has-text-color has-heading-font-family has-x-large-font-size"><?php esc_html_e( 'Inscripción', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"afa-servicio-inscripcion__price","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group afa-servicio-inscripcion__price"><!-- wp:paragraph {"textColor":"base","fontSize":"small","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.04em"}}} -->
<p class="has-base-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.04em;text-transform:uppercase"><?php esc_html_e( 'Precio socios AFA', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"base","fontSize":"xx-large","fontFamily":"heading","style":{"typography":{"fontWeight":"700"}}} -->
<p class="has-base-color has-text-color has-heading-font-family has-xx-large-font-size" style="font-weight:700"><?php esc_html_e( '4,85€ / día', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"afa-servicio-inscripcion__badge","backgroundColor":"soft-green","textColor":"green","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"border":{"radius":"9999px"},"typography":{"fontWeight":"700"}},"fontSize":"small"} -->
<p class="afa-servicio-inscripcion__badge has-green-color has-soft-green-background-color has-text-color has-background has-small-font-size" style="border-radius:9999px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30);font-weight:700"><?php esc_html_e( '-15% dto.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"textColor":"base","fontSize":"small","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.04em"}}} -->
<p class="has-base-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.04em;text-transform:uppercase"><?php esc_html_e( 'Precio no socios', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"base","fontSize":"large","style":{"typography":{"fontWeight":"700"}}} -->
<p class="has-base-color has-text-color has-large-font-size" style="font-weight:700"><?php esc_html_e( '5,70€ / día', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"afa-servicio-inscripcion__hours","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group afa-servicio-inscripcion__hours"><!-- wp:image {"url":"<?php echo esc_url( $clock ); ?>","width":"20px","height":"20px","sizeSlug":"full","linkDestination":"none","className":"afa-servicio-inscripcion__clock"} -->
<figure class="wp-block-image size-full is-resized afa-servicio-inscripcion__clock"><img src="<?php echo esc_url( $clock ); ?>" alt="" style="width:20px;height:20px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-small-font-size"><?php esc_html_e( 'Horario de Servicio 12:30h — 14:30h', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"afa-servicio-inscripcion__cta"} -->
<div class="wp-block-buttons afa-servicio-inscripcion__cta"><!-- wp:button {"backgroundColor":"base","textColor":"primary","width":100} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-primary-color has-base-background-color has-text-color has-background wp-element-button" href="/contacto/"><?php esc_html_e( 'Inscribirse Ahora', 'afa-poveda' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"textColor":"base","fontSize":"small","className":"afa-servicio-inscripcion__note"} -->
<p class="afa-servicio-inscripcion__note has-base-color has-text-color has-small-font-size"><?php esc_html_e( 'Matrícula abierta para el curso actual.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
