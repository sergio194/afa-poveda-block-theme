<?php
/**
 * Title: Hazte Socio — Hero
 * Slug: afa-poveda/hazte-hero
 * Categories: featured, afa-poveda
 * Keywords: socio, hazte, hero
 * Description: Eyebrow, titular Hazte Socia/o, CTAs e ilustración del hero.
 *
 * @package afa-poveda
 */

$illu = esc_url( get_theme_file_uri( 'assets/icons/hazte-hero-illustration.svg' ) );
?>
<!-- wp:columns {"align":"wide","className":"afa-hazte-hero","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide afa-hazte-hero"><!-- wp:column {"width":"50%","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:paragraph {"backgroundColor":"soft-green","textColor":"green","className":"is-style-afa-eyebrow afa-hazte-hero__eyebrow","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":"9999px"}}} -->
<p class="is-style-afa-eyebrow afa-hazte-hero__eyebrow has-green-color has-soft-green-background-color has-text-color has-background" style="border-radius:9999px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--40)"><?php esc_html_e( 'Únete a nuestra familia', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"fontSize":"huge","fontFamily":"heading"} -->
<h1 class="wp-block-heading has-heading-font-family has-huge-font-size"><?php esc_html_e( 'Hazte Socia/o', 'afa-poveda' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"contrast-muted","fontSize":"large"} -->
<p class="has-contrast-muted-color has-text-color has-large-font-size"><?php esc_html_e( 'La AFA es el punto de encuentro de las familias del CEIP Padre Poveda: una asociación sin ánimo de lucro que mejora la vida escolar con servicios, fiestas y participación.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#pertenecer"><?php esc_html_e( 'Formulario de inscripción', 'afa-poveda' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#que-hacemos"><?php esc_html_e( 'Saber más', 'afa-poveda' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:image {"url":"<?php echo esc_url( $illu ); ?>","sizeSlug":"full","linkDestination":"none","className":"afa-hazte-hero__media"} -->
<figure class="wp-block-image size-full afa-hazte-hero__media"><img src="<?php echo esc_url( $illu ); ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
