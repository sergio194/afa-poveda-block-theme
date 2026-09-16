<?php
/**
 * Title: Pie de página
 * Slug: afa-poveda/footer
 * Categories: footer, afa-poveda
 * Block Types: core/template-part/footer
 * Inserter: no
 * Description: Pie con marca, enlaces legales, contacto y copyright con el año actual.
 *
 * @package afa-poveda
 */
?>
<!-- wp:group {"tagName":"footer","className":"afa-footer","style":{"border":{"top":{"color":"var:preset|color|outline","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"backgroundColor":"surface-high","textColor":"contrast-muted","layout":{"type":"constrained"}} -->
<footer class="wp-block-group afa-footer has-contrast-muted-color has-surface-high-background-color has-text-color has-background" style="border-top-color:var(--wp--preset--color--outline);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:columns {"align":"wide","className":"afa-footer__cols","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns alignwide afa-footer__cols"><!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"afa-footer__brand","style":{"typography":{"fontWeight":"700","lineHeight":"1.3"}},"textColor":"contrast","fontSize":"x-large","fontFamily":"heading"} -->
<p class="afa-footer__brand has-contrast-color has-text-color has-heading-font-family has-x-large-font-size" style="font-weight:700;line-height:1.3"><?php esc_html_e( 'AFA Padre Poveda', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"afa-footer__tagline"} -->
<p class="afa-footer__tagline"><?php esc_html_e( 'Trabajando por una educación de calidad y una comunidad escolar unida.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"primary","iconColorValue":"#005bbf","size":"has-normal-icon-size","className":"afa-footer__social is-style-logos-only","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color afa-footer__social is-style-logos-only"><!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"mailto:info@afapadrepoveda.org","service":"mail"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-column"><!-- wp:heading {"level":2,"className":"is-style-afa-eyebrow"} -->
<h2 class="wp-block-heading is-style-afa-eyebrow"><?php esc_html_e( 'Enlaces rápidos', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"afa-footer__legal","layout":{"type":"default"}} -->
<div class="wp-block-group afa-footer__legal"><!-- wp:list {"className":"afa-plain-list"} -->
<ul class="wp-block-list afa-plain-list"><!-- wp:list-item -->
<li><a href="/aviso-legal/"><?php esc_html_e( 'Aviso legal', 'afa-poveda' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="/privacidad/"><?php esc_html_e( 'Privacidad', 'afa-poveda' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="/cookies/"><?php esc_html_e( 'Cookies', 'afa-poveda' ); ?></a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-column"><!-- wp:heading {"level":2,"className":"is-style-afa-eyebrow"} -->
<h2 class="wp-block-heading is-style-afa-eyebrow"><?php esc_html_e( 'Contacto', 'afa-poveda' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"afa-footer__contact","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"default"}} -->
<div class="wp-block-group afa-footer__contact"><!-- wp:paragraph {"className":"afa-icon afa-icon--pin"} -->
<p class="afa-icon afa-icon--pin">Calle de Alfonso XII, 58, 28014 Madrid</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"afa-icon afa-icon--mail"} -->
<p class="afa-icon afa-icon--mail"><a href="mailto:info@afapadrepoveda.org">info@afapadrepoveda.org</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"align":"wide","style":{"border":{"top":{"color":"var:preset|color|outline","style":"solid","width":"1px"}},"spacing":{"margin":{"top":"var:preset|spacing|60"},"padding":{"top":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide" style="border-top-color:var(--wp--preset--color--outline);border-top-style:solid;border-top-width:1px;margin-top:var(--wp--preset--spacing--60);padding-top:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"className":"afa-footer__copy","fontSize":"small"} -->
<p class="afa-footer__copy has-small-font-size">© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php esc_html_e( 'Asociación de Familias de Alumnos del CEIP Padre Poveda. Todos los derechos reservados.', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></footer>
<!-- /wp:group -->
