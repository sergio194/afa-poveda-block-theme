<?php
/**
 * Title: Servicios — Rejilla de fichas
 * Slug: afa-poveda/servicios-grid
 * Categories: featured, afa-poveda
 * Keywords: servicios, fichas, comedor
 * Description: Seis fichas homogéneas del hub Servicios. Sustituye imágenes y enlaces desde el editor.
 *
 * @package afa-poveda
 */

$icon_comedor = esc_url( get_theme_file_uri( 'assets/icons/icon-comedor.svg' ) );
$icon_extra   = esc_url( get_theme_file_uri( 'assets/icons/icon-extraescolares.svg' ) );
$icon_cal     = esc_url( get_theme_file_uri( 'assets/icons/icon-calendario.svg' ) );
$icon_vol     = esc_url( get_theme_file_uri( 'assets/icons/icon-voluntarios.svg' ) );

$cards = array(
	array(
		'tag'   => __( 'Nutrición', 'afa-poveda' ),
		'tag_c' => 'afa-servicio-card__tag--nutricion',
		'title' => __( 'Comedor Escolar', 'afa-poveda' ),
		'desc'  => __( 'Menús equilibrados, productos de proximidad y atención a alérgenos para el mediodía.', 'afa-poveda' ),
		'meta'  => __( 'Diario', 'afa-poveda' ),
		'icon'  => $icon_comedor,
		'href'  => '/servicios/comedor-escolar/',
	),
	array(
		'tag'   => __( 'Aprendizaje', 'afa-poveda' ),
		'tag_c' => 'afa-servicio-card__tag--aprendizaje',
		'title' => __( 'Biblioteca y Apoyo', 'afa-poveda' ),
		'desc'  => __( 'Espacio de estudio, préstamo de libros y refuerzo escolar por las tardes.', 'afa-poveda' ),
		'meta'  => __( 'Tarde', 'afa-poveda' ),
		'icon'  => $icon_extra,
		'href'  => '/servicios/biblioteca-y-apoyo/',
	),
	array(
		'tag'   => __( 'Conciliación', 'afa-poveda' ),
		'tag_c' => 'afa-servicio-card__tag--conciliacion',
		'title' => __( 'Primeros del Cole', 'afa-poveda' ),
		'desc'  => __( 'Acogida temprana con juegos y acompañamiento antes del inicio de clases.', 'afa-poveda' ),
		'meta'  => __( 'Mañana', 'afa-poveda' ),
		'icon'  => $icon_cal,
		'href'  => '/servicios/primeros-del-cole/',
	),
	array(
		'tag'   => __( 'Extraescolares', 'afa-poveda' ),
		'tag_c' => 'afa-servicio-card__tag--extra',
		'title' => __( 'Música y Arte', 'afa-poveda' ),
		'desc'  => __( 'Talleres creativos y musicales para potenciar la expresión artística.', 'afa-poveda' ),
		'meta'  => __( 'Semanal', 'afa-poveda' ),
		'icon'  => $icon_extra,
		'href'  => '/servicios/musica-y-arte/',
	),
	array(
		'tag'   => __( 'Deporte', 'afa-poveda' ),
		'tag_c' => 'afa-servicio-card__tag--deporte',
		'title' => __( 'Deporte Escolar', 'afa-poveda' ),
		'desc'  => __( 'Actividad física, valores de equipo y competición saludable en el colegio.', 'afa-poveda' ),
		'meta'  => __( 'Competición', 'afa-poveda' ),
		'icon'  => $icon_vol,
		'href'  => '/servicios/deporte-escolar/',
	),
	array(
		'tag'   => __( 'Familia', 'afa-poveda' ),
		'tag_c' => 'afa-servicio-card__tag--familia',
		'title' => __( 'Escuela de Familias', 'afa-poveda' ),
		'desc'  => __( 'Charlas y encuentros para acompañar la crianza y la vida escolar.', 'afa-poveda' ),
		'meta'  => __( 'Mensual', 'afa-poveda' ),
		'icon'  => $icon_vol,
		'href'  => '/servicios/escuela-de-familias/',
	),
);

$render_card = static function ( $card ) {
	$tag_class = 'afa-servicio-card__tag ' . $card['tag_c'];
	?>
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"afa-servicio-card is-style-afa-card","style":{"border":{"radius":"12px"},"spacing":{"blockGap":"0"}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group afa-servicio-card is-style-afa-card has-base-background-color has-background" style="border-radius:12px"><!-- wp:group {"className":"afa-servicio-card__media","layout":{"type":"default"}} -->
<div class="wp-block-group afa-servicio-card__media"><!-- wp:paragraph {"className":"<?php echo esc_attr( $tag_class ); ?>","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"border":{"radius":"9999px"},"typography":{"fontWeight":"600"}},"textColor":"base","fontSize":"small"} -->
<p class="<?php echo esc_attr( $tag_class ); ?> has-base-color has-text-color has-small-font-size" style="border-radius:9999px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30);font-weight:600"><?php echo esc_html( $card['tag'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"afa-servicio-card__body","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group afa-servicio-card__body" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"level":3,"fontSize":"large","fontFamily":"heading"} -->
<h3 class="wp-block-heading has-heading-font-family has-large-font-size"><?php echo esc_html( $card['title'] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"contrast-muted"} -->
<p class="has-contrast-muted-color has-text-color"><?php echo esc_html( $card['desc'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"afa-servicio-card__footer","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group afa-servicio-card__footer"><!-- wp:group {"className":"afa-servicio-card__meta","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group afa-servicio-card__meta"><!-- wp:image {"url":"<?php echo esc_url( $card['icon'] ); ?>","width":"18px","height":"18px","sizeSlug":"full","linkDestination":"none","className":"afa-servicio-card__meta-icon"} -->
<figure class="wp-block-image size-full is-resized afa-servicio-card__meta-icon"><img src="<?php echo esc_url( $card['icon'] ); ?>" alt="" style="width:18px;height:18px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"textColor":"primary","fontSize":"small","style":{"typography":{"fontWeight":"600"}}} -->
<p class="has-primary-color has-text-color has-small-font-size" style="font-weight:600"><?php echo esc_html( $card['meta'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"afa-servicio-card__more","textColor":"primary","fontSize":"small","style":{"typography":{"fontWeight":"600"}}} -->
<p class="afa-servicio-card__more has-primary-color has-text-color has-small-font-size" style="font-weight:600"><a href="<?php echo esc_url( $card['href'] ); ?>"><?php esc_html_e( 'Ver más', 'afa-poveda' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->
	<?php
};
?>
<!-- wp:group {"align":"wide","className":"afa-servicios-grid","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide afa-servicios-grid"><!-- wp:columns {"className":"afa-servicios-grid__row","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns afa-servicios-grid__row">
<?php
$render_card( $cards[0] );
$render_card( $cards[1] );
$render_card( $cards[2] );
?>
</div>
<!-- /wp:columns -->

<!-- wp:columns {"className":"afa-servicios-grid__row","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns afa-servicios-grid__row">
<?php
$render_card( $cards[3] );
$render_card( $cards[4] );
$render_card( $cards[5] );
?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
