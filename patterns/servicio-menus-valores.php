<?php
/**
 * Title: Servicio — Menús y valores nutricionales
 * Slug: afa-poveda/servicio-menus-valores
 * Categories: text, afa-poveda
 * Keywords: menú, pdf, nutrición
 * Description: Descargas de menú y composición media diaria. Sustituye # por URLs de medios.
 *
 * @package afa-poveda
 */

$pdf = esc_url( get_theme_file_uri( 'assets/icons/icon-pdf.svg' ) );
?>
<!-- wp:group {"className":"afa-servicio-menus","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group afa-servicio-menus has-base-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"fontSize":"x-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-heading-font-family has-x-large-font-size"><?php esc_html_e( 'Valores Nutricionales y Menú', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"afa-servicio-download","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}},"backgroundColor":"surface-container"} -->
<div class="wp-block-group afa-servicio-download has-surface-container-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"url":"<?php echo esc_url( $pdf ); ?>","width":"28px","height":"28px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $pdf ); ?>" alt="" style="width:28px;height:28px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
<p style="font-weight:600"><?php esc_html_e( 'Menú Basal — Mes en curso', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"contrast-muted","fontSize":"small"} -->
<p class="has-contrast-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'PDF · Sustituye el enlace por el archivo en Medios', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"textColor":"primary","style":{"typography":{"fontWeight":"600"}},"fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size" style="font-weight:600"><a href="#"><?php esc_html_e( 'Descargar', 'afa-poveda' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"afa-servicio-download","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}},"backgroundColor":"surface-container"} -->
<div class="wp-block-group afa-servicio-download has-surface-container-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"url":"<?php echo esc_url( $pdf ); ?>","width":"28px","height":"28px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $pdf ); ?>" alt="" style="width:28px;height:28px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
<p style="font-weight:600"><?php esc_html_e( 'Menú Alérgenos — Mes en curso', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"contrast-muted","fontSize":"small"} -->
<p class="has-contrast-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'PDF · Sustituye el enlace por el archivo en Medios', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"textColor":"primary","style":{"typography":{"fontWeight":"600"}},"fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size" style="font-weight:600"><a href="#"><?php esc_html_e( 'Descargar', 'afa-poveda' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"fontSize":"large","fontFamily":"heading"} -->
<h3 class="wp-block-heading has-heading-font-family has-large-font-size"><?php esc_html_e( 'Composición Media Diaria', 'afa-poveda' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:columns {"className":"afa-servicio-stats","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns afa-servicio-stats"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"afa-servicio-stat afa-servicio-stat--kcal","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|20"}},"backgroundColor":"surface-container","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group afa-servicio-stat afa-servicio-stat--kcal has-surface-container-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30)"><!-- wp:paragraph {"align":"center","className":"afa-servicio-stat__value","style":{"typography":{"fontWeight":"700"}},"fontSize":"x-large"} -->
<p class="has-text-align-center afa-servicio-stat__value has-x-large-font-size" style="font-weight:700"><?php esc_html_e( '750', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","textColor":"contrast-muted","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.04em","textTransform":"uppercase"}}} -->
<p class="has-text-align-center has-contrast-muted-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.04em;text-transform:uppercase"><?php esc_html_e( 'KCAL', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"afa-servicio-stat afa-servicio-stat--protein","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|20"}},"backgroundColor":"surface-container","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group afa-servicio-stat afa-servicio-stat--protein has-surface-container-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30)"><!-- wp:paragraph {"align":"center","className":"afa-servicio-stat__value","style":{"typography":{"fontWeight":"700"}},"fontSize":"x-large"} -->
<p class="has-text-align-center afa-servicio-stat__value has-x-large-font-size" style="font-weight:700"><?php esc_html_e( '35g', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","textColor":"contrast-muted","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.04em","textTransform":"uppercase"}}} -->
<p class="has-text-align-center has-contrast-muted-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.04em;text-transform:uppercase"><?php esc_html_e( 'Proteína', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"afa-servicio-stat afa-servicio-stat--hc","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|20"}},"backgroundColor":"surface-container","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group afa-servicio-stat afa-servicio-stat--hc has-surface-container-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30)"><!-- wp:paragraph {"align":"center","className":"afa-servicio-stat__value","style":{"typography":{"fontWeight":"700"}},"fontSize":"x-large"} -->
<p class="has-text-align-center afa-servicio-stat__value has-x-large-font-size" style="font-weight:700"><?php esc_html_e( '90g', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","textColor":"contrast-muted","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.04em","textTransform":"uppercase"}}} -->
<p class="has-text-align-center has-contrast-muted-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.04em;text-transform:uppercase"><?php esc_html_e( 'HC', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"afa-servicio-stat afa-servicio-stat--fat","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|20"}},"backgroundColor":"surface-container","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group afa-servicio-stat afa-servicio-stat--fat has-surface-container-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30)"><!-- wp:paragraph {"align":"center","className":"afa-servicio-stat__value","style":{"typography":{"fontWeight":"700"}},"fontSize":"x-large"} -->
<p class="has-text-align-center afa-servicio-stat__value has-x-large-font-size" style="font-weight:700"><?php esc_html_e( '15g', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","textColor":"contrast-muted","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.04em","textTransform":"uppercase"}}} -->
<p class="has-text-align-center has-contrast-muted-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.04em;text-transform:uppercase"><?php esc_html_e( 'Grasas', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
