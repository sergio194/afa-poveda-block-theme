<?php
/**
 * Title: Servicio — Comedor Escolar (página completa)
 * Slug: afa-poveda/servicio-comedor
 * Categories: featured, afa-poveda
 * Keywords: comedor, detalle, inscripción
 * Description: Composición completa del detalle Comedor. Insertar en una página con plantilla «Servicio — Detalle».
 * Block Types: core/post-content
 * Post Types: page
 *
 * @package afa-poveda
 */
?>
<!-- wp:pattern {"slug":"afa-poveda/servicio-hero"} /-->

<!-- wp:group {"align":"wide","className":"afa-servicio-layout","style":{"spacing":{"margin":{"top":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide afa-servicio-layout" style="margin-top:var(--wp--preset--spacing--70)"><!-- wp:columns {"className":"afa-servicio-layout__cols","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns afa-servicio-layout__cols"><!-- wp:column {"width":"65%","className":"afa-servicio-layout__main","style":{"spacing":{"blockGap":"var:preset|spacing|50"}}} -->
<div class="wp-block-column afa-servicio-layout__main" style="flex-basis:65%"><!-- wp:pattern {"slug":"afa-poveda/servicio-alimentacion"} /-->

<!-- wp:pattern {"slug":"afa-poveda/servicio-menus-valores"} /-->

<!-- wp:pattern {"slug":"afa-poveda/servicio-faq"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"35%","className":"afa-servicio-aside","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-column afa-servicio-aside" style="flex-basis:35%"><!-- wp:pattern {"slug":"afa-poveda/servicio-inscripcion"} /-->

<!-- wp:pattern {"slug":"afa-poveda/servicio-documentacion"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
