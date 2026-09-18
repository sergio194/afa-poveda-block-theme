<?php
/**
 * Title: Sobre nosotros — Documentos y estatutos
 * Slug: afa-poveda/sobre-documentos
 * Categories: text, afa-poveda
 * Keywords: estatutos, documentos, pdf
 * Description: Rejilla 2×2 de documentos. Sustituye el enlace por la URL del PDF en Medios.
 *
 * @package afa-poveda
 */

$pdf = esc_url( get_theme_file_uri( 'assets/icons/icon-pdf.svg' ) );

$docs = array(
	array(
		'label' => __( 'Qué es una AFA', 'afa-poveda' ),
		'file'  => 'QUE_ES_UNA_AFA.pdf',
	),
	array(
		'label' => __( 'Estatutos de nuestra AFA', 'afa-poveda' ),
		'file'  => 'ESTATUTOS_DE_NUESTRA_AFA.pdf',
	),
	array(
		'label' => __( 'Manual de procedimientos', 'afa-poveda' ),
		'file'  => 'MANUAL_DE_PROCEDIMIENTOS.pdf',
	),
	array(
		'label' => __( 'Parte de disciplina', 'afa-poveda' ),
		'file'  => 'PARTE_DE_DISCIPLINA.pdf',
	),
);

$render_doc = static function ( $doc, $pdf ) {
	?>
<!-- wp:group {"className":"afa-docs__item","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}},"backgroundColor":"surface-high","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group afa-docs__item has-surface-high-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"url":"<?php echo esc_url( $pdf ); ?>","width":"28px","height":"28px","sizeSlug":"full","linkDestination":"none","className":"afa-docs__icon"} -->
<figure class="wp-block-image size-full is-resized afa-docs__icon"><img src="<?php echo esc_url( $pdf ); ?>" alt="" style="width:28px;height:28px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
<p style="font-weight:600"><a href="#"><?php echo esc_html( $doc['label'] ); ?></a> <span class="afa-docs__filename has-contrast-muted-color has-text-color has-small-font-size"><?php echo esc_html( $doc['file'] ); ?></span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
	<?php
};
?>
<!-- wp:group {"align":"wide","className":"afa-docs","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide afa-docs"><!-- wp:heading {"fontSize":"xx-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-heading-font-family has-xx-large-font-size"><?php esc_html_e( 'Documentos y Estatutos', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns {"className":"afa-docs__grid","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns afa-docs__grid"><!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-column">
<?php $render_doc( $docs[0], $pdf ); ?>
<?php $render_doc( $docs[2], $pdf ); ?>
</div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-column">
<?php $render_doc( $docs[1], $pdf ); ?>
<?php $render_doc( $docs[3], $pdf ); ?>
</div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
