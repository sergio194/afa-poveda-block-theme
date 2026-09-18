<?php
/**
 * Title: Servicio — Alimentación saludable
 * Slug: afa-poveda/servicio-alimentacion
 * Categories: text, afa-poveda
 * Keywords: comedor, nutrición, alérgenos
 * Description: Texto y dos puntos destacados del detalle de comedor.
 *
 * @package afa-poveda
 */

$leaf  = esc_url( get_theme_file_uri( 'assets/icons/icon-leaf.svg' ) );
$check = esc_url( get_theme_file_uri( 'assets/icons/icon-check.svg' ) );
?>
<!-- wp:group {"className":"afa-servicio-alimentacion","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group afa-servicio-alimentacion has-base-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"textColor":"primary","fontSize":"x-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-primary-color has-text-color has-heading-font-family has-x-large-font-size"><?php esc_html_e( 'Alimentación Saludable', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"contrast-muted"} -->
<p class="has-contrast-muted-color has-text-color"><?php esc_html_e( 'El comedor es una extensión del proyecto educativo. Menús elaborados por nutricionistas con productos frescos, de temporada y de proximidad, para que comer también sea aprender.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"className":"afa-servicio-features","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns afa-servicio-features"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"afa-servicio-feature","style":{"border":{"radius":"12px","width":"1px","color":"var:preset|color|outline"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group afa-servicio-feature" style="border-color:var(--wp--preset--color--outline);border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"url":"<?php echo esc_url( $leaf ); ?>","width":"28px","height":"28px","sizeSlug":"full","linkDestination":"none","className":"afa-servicio-feature__icon"} -->
<figure class="wp-block-image size-full is-resized afa-servicio-feature__icon"><img src="<?php echo esc_url( $leaf ); ?>" alt="" style="width:28px;height:28px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"fontSize":"medium","fontFamily":"heading"} -->
<h3 class="wp-block-heading has-heading-font-family has-medium-font-size"><?php esc_html_e( '100% Equilibrado', 'afa-poveda' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"contrast-muted","fontSize":"small"} -->
<p class="has-contrast-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'Aporte calórico adaptado a las etapas de crecimiento de infantil y primaria.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"afa-servicio-feature","style":{"border":{"radius":"12px","width":"1px","color":"var:preset|color|outline"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group afa-servicio-feature" style="border-color:var(--wp--preset--color--outline);border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"url":"<?php echo esc_url( $check ); ?>","width":"28px","height":"28px","sizeSlug":"full","linkDestination":"none","className":"afa-servicio-feature__icon"} -->
<figure class="wp-block-image size-full is-resized afa-servicio-feature__icon"><img src="<?php echo esc_url( $check ); ?>" alt="" style="width:28px;height:28px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"fontSize":"medium","fontFamily":"heading"} -->
<h3 class="wp-block-heading has-heading-font-family has-medium-font-size"><?php esc_html_e( 'Control de Alérgenos', 'afa-poveda' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"contrast-muted","fontSize":"small"} -->
<p class="has-contrast-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'Protocolos estrictos para celiaquía e intolerancias, comunicados a la cocina a diario.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
