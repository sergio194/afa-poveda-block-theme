<?php
/**
 * Title: Servicio — Documentación
 * Slug: afa-poveda/servicio-documentacion
 * Categories: text, afa-poveda
 * Keywords: documentos, reglamento, becas
 * Description: Lista de documentos del servicio. Sustituye # por URLs de medios.
 *
 * @package afa-poveda
 */

$folder = esc_url( get_theme_file_uri( 'assets/icons/icon-folder.svg' ) );
$pdf    = esc_url( get_theme_file_uri( 'assets/icons/icon-pdf.svg' ) );

$docs = array(
	__( 'Reglamento del Comedor', 'afa-poveda' ),
	__( 'Protocolo de Emergencias', 'afa-poveda' ),
	__( 'Formulario de Becas', 'afa-poveda' ),
);
?>
<!-- wp:group {"className":"afa-servicio-docs","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"backgroundColor":"surface-container","layout":{"type":"constrained"}} -->
<div class="wp-block-group afa-servicio-docs has-surface-container-background-color has-background" style="border-radius:16px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"url":"<?php echo esc_url( $folder ); ?>","width":"24px","height":"24px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $folder ); ?>" alt="" style="width:24px;height:24px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"fontSize":"large","fontFamily":"heading"} -->
<h3 class="wp-block-heading has-heading-font-family has-large-font-size"><?php esc_html_e( 'Documentación', 'afa-poveda' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<?php foreach ( $docs as $label ) : ?>
<!-- wp:group {"className":"afa-servicio-docs__item","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group afa-servicio-docs__item"><!-- wp:image {"url":"<?php echo esc_url( $pdf ); ?>","width":"20px","height":"20px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $pdf ); ?>" alt="" style="width:20px;height:20px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
<p style="font-weight:600"><a href="#"><?php echo esc_html( $label ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group -->
