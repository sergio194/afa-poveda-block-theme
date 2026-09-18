<?php
/**
 * Title: Sobre nosotros — Organigrama
 * Slug: afa-poveda/sobre-organigrama
 * Categories: text, afa-poveda
 * Keywords: junta, organigrama, vocales
 * Description: Organigrama visual de la Junta Directiva (editable cada curso).
 *
 * @package afa-poveda
 */

$avatar = esc_url( get_theme_file_uri( 'assets/icons/avatar-placeholder.svg' ) );
$icon   = esc_url( get_theme_file_uri( 'assets/icons/icon-organigrama.svg' ) );

/**
 * Tarjeta de cargo (avatar + nombre + rol).
 *
 * @param string $name Nombre.
 * @param string $role Rol.
 * @param string $avatar URL del avatar.
 * @param string $modifier Clase BEM opcional (p. ej. vocal).
 */
$afa_org_card = static function ( $name, $role, $avatar, $modifier = '' ) {
	$extra = $modifier ? ' ' . $modifier : '';
	?>
<!-- wp:group {"className":"afa-organigrama__card<?php echo esc_attr( $extra ); ?>","style":{"border":{"radius":"12px","width":"1px","color":"var:preset|color|outline"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}},"backgroundColor":"base","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group afa-organigrama__card<?php echo esc_attr( $extra ); ?> has-border-color has-base-background-color has-background" style="border-color:var(--wp--preset--color--outline);border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:image {"url":"<?php echo esc_url( $avatar ); ?>","width":"48px","height":"48px","sizeSlug":"full","linkDestination":"none","className":"afa-organigrama__avatar"} -->
<figure class="wp-block-image size-full is-resized afa-organigrama__avatar"><img src="<?php echo esc_url( $avatar ); ?>" alt="" style="width:48px;height:48px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}},"fontFamily":"heading"} -->
<p class="has-heading-font-family" style="font-weight:700"><?php echo esc_html( $name ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size"><?php echo esc_html( $role ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
	<?php
};

$presidencia = array(
	array( __( 'Ana García-Reyne', 'afa-poveda' ), __( 'Presidencia', 'afa-poveda' ) ),
	array( __( 'Andrés Redondo', 'afa-poveda' ), __( 'Vicepresidencia', 'afa-poveda' ) ),
);

$secretaria_tesoreria = array(
	array( __( 'María Vázquez', 'afa-poveda' ), __( 'Secretaria', 'afa-poveda' ) ),
	array( __( 'María Fuentes', 'afa-poveda' ), __( 'Tesorera', 'afa-poveda' ) ),
);

$vocales = array(
	__( 'Raquel', 'afa-poveda' ),
	__( 'Charo', 'afa-poveda' ),
	__( 'Ángeles', 'afa-poveda' ),
	__( 'Arancha', 'afa-poveda' ),
	__( 'Eugenia', 'afa-poveda' ),
	__( 'Samantha', 'afa-poveda' ),
	__( 'Judith', 'afa-poveda' ),
	__( 'Pablo', 'afa-poveda' ),
	__( 'Rebeca', 'afa-poveda' ),
	__( 'Patricia', 'afa-poveda' ),
	__( 'María', 'afa-poveda' ),
	__( 'Carol', 'afa-poveda' ),
	__( 'Miguel', 'afa-poveda' ),
	__( 'Lourdes', 'afa-poveda' ),
	__( 'Sara', 'afa-poveda' ),
	__( 'Rocío', 'afa-poveda' ),
);
?>
<!-- wp:group {"align":"wide","className":"afa-organigrama","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50"}},"backgroundColor":"surface-container","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide afa-organigrama has-surface-container-background-color has-background" style="border-radius:16px;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"className":"afa-sobre-heading","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group afa-sobre-heading"><!-- wp:image {"url":"<?php echo esc_url( $icon ); ?>","width":"28px","height":"28px","sizeSlug":"full","linkDestination":"none","className":"afa-sobre-heading__icon"} -->
<figure class="wp-block-image size-full is-resized afa-sobre-heading__icon"><img src="<?php echo esc_url( $icon ); ?>" alt="" style="width:28px;height:28px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"fontSize":"xx-large","fontFamily":"heading"} -->
<h2 class="wp-block-heading has-heading-font-family has-xx-large-font-size"><?php esc_html_e( 'Organigrama', 'afa-poveda' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"textColor":"contrast-muted"} -->
<p class="has-contrast-muted-color has-text-color"><?php esc_html_e( 'La Junta Directiva es el órgano de representación, gestión y administración de la asociación formada durante el curso 2023/24 por:', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"afa-organigrama__label","style":{"typography":{"fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.04em"}},"fontSize":"small"} -->
<p class="afa-organigrama__label has-small-font-size" style="font-weight:700;letter-spacing:0.04em;text-transform:uppercase"><?php esc_html_e( 'Presidencia / Vicepresidencia', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"afa-organigrama__liderazgo","layout":{"type":"grid","columnCount":2}} -->
<div class="wp-block-group afa-organigrama__liderazgo">
<?php foreach ( $presidencia as $persona ) : ?>
	<?php $afa_org_card( $persona[0], $persona[1], $avatar ); ?>
<?php endforeach; ?>
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"afa-organigrama__sec-tes","layout":{"type":"grid","columnCount":2}} -->
<div class="wp-block-group afa-organigrama__sec-tes">
<?php
$labels = array( __( 'Secretaría', 'afa-poveda' ), __( 'Tesorería', 'afa-poveda' ) );
foreach ( $secretaria_tesoreria as $i => $persona ) :
	?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"afa-organigrama__label","style":{"typography":{"fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.04em"}},"fontSize":"small"} -->
<p class="afa-organigrama__label has-small-font-size" style="font-weight:700;letter-spacing:0.04em;text-transform:uppercase"><?php echo esc_html( $labels[ $i ] ); ?></p>
<!-- /wp:paragraph -->
	<?php $afa_org_card( $persona[0], $persona[1], $avatar ); ?>
</div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"afa-organigrama__label","style":{"typography":{"fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.04em"}},"fontSize":"small"} -->
<p class="afa-organigrama__label has-small-font-size" style="font-weight:700;letter-spacing:0.04em;text-transform:uppercase"><?php esc_html_e( 'Vocales', 'afa-poveda' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"afa-organigrama__vocales","layout":{"type":"grid","columnCount":4}} -->
<div class="wp-block-group afa-organigrama__vocales">
<?php foreach ( $vocales as $nombre ) : ?>
	<?php $afa_org_card( $nombre, __( 'Vocal', 'afa-poveda' ), $avatar, 'afa-organigrama__card--vocal' ); ?>
<?php endforeach; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:group -->
