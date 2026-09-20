<?php
/**
 * Title: Hazte Socio — Qué hacemos por el cole
 * Slug: afa-poveda/hazte-que-hacemos
 * Categories: featured, afa-poveda
 * Keywords: cuota, actividades, socio
 * Description: Intro y seis fichas de lo que sostiene la cuota de la AFA. Iconos con el bloque Icono.
 *
 * @package afa-poveda
 */

$items = array(
	array(
		'icon'  => 'afa-poveda/extraescolares',
		'title' => __( 'Extraescolares', 'afa-poveda' ),
		'desc'  => __( 'Gestión y mejora de las actividades extraescolares del colegio.', 'afa-poveda' ),
	),
	array(
		'icon'  => 'afa-poveda/comedor',
		'title' => __( 'Comedor Escolar', 'afa-poveda' ),
		'desc'  => __( 'Seguimiento activo de la calidad del servicio de comedor.', 'afa-poveda' ),
	),
	array(
		'icon'  => 'afa-poveda/carrera',
		'title' => __( 'Carrera Solidaria', 'afa-poveda' ),
		'desc'  => __( 'Organización del evento deportivo solidario anual.', 'afa-poveda' ),
	),
	array(
		'icon'  => 'afa-poveda/libro',
		'title' => __( 'Feria del Libro', 'afa-poveda' ),
		'desc'  => __( 'Promoción de la lectura y colaboración con la biblioteca.', 'afa-poveda' ),
	),
	array(
		'icon'  => 'afa-poveda/ludoteca',
		'title' => __( 'Ludoteca', 'afa-poveda' ),
		'desc'  => __( 'Espacio de cuidado en días no lectivos para conciliar.', 'afa-poveda' ),
	),
	array(
		'icon'  => 'afa-poveda/voz',
		'title' => __( 'Voz y Participación', 'afa-poveda' ),
		'desc'  => __( 'Representación oficial de las familias ante el consejo escolar.', 'afa-poveda' ),
	),
);

$render = static function ( $item ) {
	?>
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"afa-hazte-actividad","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group afa-hazte-actividad has-base-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)"><!-- wp:icon {"icon":"<?php echo esc_attr( $item['icon'] ); ?>","textColor":"primary","style":{"dimensions":{"width":"36px"}}} /-->

<!-- wp:heading {"level":3,"fontSize":"large","fontFamily":"heading"} -->
<h3 class="wp-block-heading has-heading-font-family has-large-font-size"><?php echo esc_html( $item['title'] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"contrast-muted"} -->
<p class="has-contrast-muted-color has-text-color"><?php echo esc_html( $item['desc'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->
	<?php
};
?>
<!-- wp:group {"align":"wide","anchor":"que-hacemos","className":"afa-hazte-que-hacemos","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide afa-hazte-que-hacemos" id="que-hacemos"><!-- wp:heading {"textAlign":"center","fontSize":"xx-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-font-family has-xx-large-font-size"><?php esc_html_e( '¿Qué hacemos por el cole?', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"contrast-muted"} -->
<p class="has-text-align-center has-contrast-muted-color has-text-color"><?php esc_html_e( 'La cuota anual permite a la AFA gestionar y mejorar servicios fundamentales para toda la comunidad escolar.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide","className":"afa-hazte-que-hacemos__row","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns alignwide afa-hazte-que-hacemos__row">
<?php
$render( $items[0] );
$render( $items[1] );
$render( $items[2] );
?>
</div>
<!-- /wp:columns -->

<!-- wp:columns {"align":"wide","className":"afa-hazte-que-hacemos__row","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns alignwide afa-hazte-que-hacemos__row">
<?php
$render( $items[3] );
$render( $items[4] );
$render( $items[5] );
?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
