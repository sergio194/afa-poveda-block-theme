<?php
/**
 * Title: Sobre nosotros — Quiénes somos
 * Slug: afa-poveda/sobre-quienes-somos
 * Categories: text, afa-poveda
 * Keywords: afa, quiénes somos, asociación
 * Description: Texto institucional sobre qué es la AFA.
 *
 * @package afa-poveda
 */

$icon = esc_url( get_theme_file_uri( 'assets/icons/icon-quienes.svg' ) );
?>
<!-- wp:group {"align":"wide","className":"afa-sobre-quienes","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide afa-sobre-quienes"><!-- wp:group {"className":"afa-sobre-heading","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group afa-sobre-heading"><!-- wp:image {"width":"28px","height":"28px","sizeSlug":"full","linkDestination":"none","className":"afa-sobre-heading__icon is-style-default"} -->
<figure class="wp-block-image size-full is-resized afa-sobre-heading__icon"><img src="<?php echo $icon; ?>" alt="" style="width:28px;height:28px" width="28" height="28"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"fontSize":"xx-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-heading-font-family has-xx-large-font-size"><?php esc_html_e( '¿Quiénes somos?', 'afa-poveda' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'La AFA es la asociación de madres y padres de alumnos de la escuela, sin ánimo de lucro, que participa en todos aquellos aspectos relacionados con la educación de nuestras hijas e hijos, para lograr, conjuntamente con el equipo de maestros, una enseñanza de calidad.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Creemos en una escuela más abierta a las familias donde los padres y madres podamos participar de una manera más activa y responsable, siempre respetando y apoyando el trabajo del equipo docente.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Para poder desarrollar mejor nuestras tareas y sacar adelante los diferentes proyectos, se forman diferentes comisiones de trabajo. Estas comisiones están formadas por miembros de la junta y por otros socios de la AFA.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
