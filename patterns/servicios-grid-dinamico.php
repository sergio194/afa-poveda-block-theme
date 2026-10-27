<?php
/**
 * Title: Servicios — Rejilla desde contenido
 * Slug: afa-poveda/servicios-grid-dinamico
 * Categories: featured, afa-poveda
 * Keywords: servicios, fichas, listado, dinámico
 * Description: Una ficha por cada servicio publicado (tipo Servicio del plugin). Alternativa dinámica a «Servicios — Rejilla de fichas».
 *
 * @package afa-poveda
 */

$icon = esc_url( get_theme_file_uri( 'assets/icons/icon-clock.svg' ) );
?>
<!-- wp:group {"align":"wide","className":"afa-servicios-grid afa-servicios-query","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide afa-servicios-grid afa-servicios-query"><!-- wp:query {"queryId":12,"query":{"perPage":12,"pages":0,"offset":0,"postType":"afa_servicio","order":"asc","orderBy":"title","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"className":"afa-servicio-card is-style-afa-card","style":{"border":{"radius":"12px"},"spacing":{"blockGap":"0"}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group afa-servicio-card is-style-afa-card has-base-background-color has-background" style="border-radius:12px"><!-- wp:group {"className":"afa-servicio-card__media","layout":{"type":"default"}} -->
<div class="wp-block-group afa-servicio-card__media"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"auto"} /-->

<!-- wp:afa-padre-poveda/servicio-etiqueta {"mostrar":"categoria","className":"afa-servicio-card__tag afa-servicio-card__tag--cpt"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"className":"afa-servicio-card__body","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group afa-servicio-card__body" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:post-title {"level":3,"isLink":true,"fontSize":"large","fontFamily":"heading"} /-->

<!-- wp:post-excerpt {"excerptLength":24,"textColor":"contrast-muted"} /-->

<!-- wp:group {"className":"afa-servicio-card__footer","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group afa-servicio-card__footer"><!-- wp:group {"className":"afa-servicio-card__meta","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group afa-servicio-card__meta"><!-- wp:image {"url":"<?php echo esc_url( $icon ); ?>","width":"18px","height":"18px","sizeSlug":"full","linkDestination":"none","className":"afa-servicio-card__meta-icon"} -->
<figure class="wp-block-image size-full is-resized afa-servicio-card__meta-icon"><img src="<?php echo esc_url( $icon ); ?>" alt="" style="width:18px;height:18px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"afa_servicio_frecuencia"}}}},"className":"afa-servicio-card__freq","textColor":"primary","fontSize":"small","style":{"typography":{"fontWeight":"600"}}} -->
<p class="afa-servicio-card__freq has-primary-color has-text-color has-small-font-size" style="font-weight:600"></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:read-more {"content":"<?php echo esc_attr( __( 'Ver más', 'afa-poveda' ) ); ?>","className":"afa-servicio-card__more","textColor":"primary","fontSize":"small","style":{"typography":{"fontWeight":"600"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"textColor":"contrast-muted"} -->
<p class="has-contrast-muted-color has-text-color"><?php esc_html_e( 'Aún no hay servicios publicados.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
