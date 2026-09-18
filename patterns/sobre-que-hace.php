<?php
/**
 * Title: Sobre nosotros — Qué hace el AFA
 * Slug: afa-poveda/sobre-que-hace
 * Categories: text, afa-poveda
 * Keywords: actividades, afa
 * Description: Listado de actividades que realiza la AFA en dos columnas.
 *
 * @package afa-poveda
 */

$icon = esc_url( get_theme_file_uri( 'assets/icons/icon-actividades.svg' ) );

$actividades = array(
	__( 'Reuniones mensuales con el claustro de profesores y la dirección del centro.', 'afa-poveda' ),
	__( 'Gestión de actividades extraescolares y ludoteca.', 'afa-poveda' ),
	__( 'Organización de fiestas de la comunidad (Feria del Libro, Cabalgata, Huerto).', 'afa-poveda' ),
	__( 'Gestión de becas para familias con necesidades especiales.', 'afa-poveda' ),
	__( 'Representación en el Consejo Escolar y canalización de inquietudes de padres.', 'afa-poveda' ),
	__( 'Promoción de una escuela verde y sostenible.', 'afa-poveda' ),
);

$col_a = array_slice( $actividades, 0, 3 );
$col_b = array_slice( $actividades, 3, 3 );

$render_col = static function ( $items ) {
	echo '<!-- wp:list {"className":"afa-sobre-que-hace__list"} -->' . "\n";
	echo '<ul class="wp-block-list afa-sobre-que-hace__list">';
	foreach ( $items as $item ) {
		echo '<!-- wp:list-item -->' . "\n";
		echo '<li>' . esc_html( $item ) . '</li>' . "\n";
		echo '<!-- /wp:list-item -->' . "\n\n";
	}
	echo '</ul>' . "\n";
	echo '<!-- /wp:list -->';
};
?>
<!-- wp:group {"align":"wide","className":"afa-sobre-que-hace","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide afa-sobre-que-hace"><!-- wp:group {"className":"afa-sobre-heading","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group afa-sobre-heading"><!-- wp:image {"url":"<?php echo esc_url( $icon ); ?>","width":"28px","height":"28px","sizeSlug":"full","linkDestination":"none","className":"afa-sobre-heading__icon"} -->
<figure class="wp-block-image size-full is-resized afa-sobre-heading__icon"><img src="<?php echo esc_url( $icon ); ?>" alt="" style="width:28px;height:28px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"fontSize":"xx-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-heading-font-family has-xx-large-font-size"><?php esc_html_e( '¿Qué hace el AFA?', 'afa-poveda' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column">
<?php $render_col( $col_a ); ?>
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<?php $render_col( $col_b ); ?>
</div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
