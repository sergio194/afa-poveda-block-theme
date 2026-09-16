<?php
/**
 * Title: Sobre nosotros — Utilidad y comisiones
 * Slug: afa-poveda/sobre-utilidad-comisiones
 * Categories: text, afa-poveda
 * Keywords: comisiones, utilidad, participación
 * Description: Utilidad de la AFA (lista) y comisiones como etiquetas.
 *
 * @package afa-poveda
 */

$comisiones = array(
	__( 'Extraescolares', 'afa-poveda' ),
	__( 'Becas', 'afa-poveda' ),
	__( 'Comedor', 'afa-poveda' ),
	__( 'Huerto', 'afa-poveda' ),
	__( 'Fiestas', 'afa-poveda' ),
	__( 'Informática', 'afa-poveda' ),
	__( 'Lotería', 'afa-poveda' ),
);
?>
<!-- wp:columns {"align":"wide","className":"afa-sobre-utilidad","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns alignwide afa-sobre-utilidad"><!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"radius":"16px"}},"backgroundColor":"primary-soft"} -->
<div class="wp-block-column has-primary-soft-background-color has-background" style="border-radius:16px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"level":3,"textColor":"primary","fontSize":"x-large","fontFamily":"heading"} -->
<h3 class="wp-block-heading has-primary-color has-text-color has-heading-font-family has-x-large-font-size"><?php esc_html_e( 'Utilidad de la AFA', 'afa-poveda' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:list {"className":"afa-sobre-utilidad__list"} -->
<ul class="wp-block-list afa-sobre-utilidad__list"><!-- wp:list-item -->
<li><?php esc_html_e( 'Fomenta la participación de las familias.', 'afa-poveda' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Promueve la intervención en el funcionamiento del centro.', 'afa-poveda' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Coordina con el equipo directivo propuestas.', 'afa-poveda' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Representa a la comunidad en las instituciones oficiales.', 'afa-poveda' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"afa-comisiones","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"radius":"16px"}},"backgroundColor":"soft-green"} -->
<div class="wp-block-column afa-comisiones has-soft-green-background-color has-background" style="border-radius:16px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"level":3,"textColor":"green","fontSize":"x-large","fontFamily":"heading"} -->
<h3 class="wp-block-heading has-green-color has-text-color has-heading-font-family has-x-large-font-size"><?php esc_html_e( 'Comisiones', 'afa-poveda' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:group {"className":"afa-comisiones__pills","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group afa-comisiones__pills">
<?php foreach ( $comisiones as $nombre ) : ?>
<!-- wp:paragraph {"className":"afa-comision-pill","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.02em"}},"textColor":"base","fontSize":"small"} -->
<p class="afa-comision-pill has-base-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.02em;text-transform:uppercase"><?php echo esc_html( $nombre ); ?></p>
<!-- /wp:paragraph -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
