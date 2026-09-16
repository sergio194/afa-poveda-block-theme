<?php
/**
 * AFA Padre Poveda — funciones del tema.
 *
 * El sistema de diseño vive en theme.json. Aquí solo se carga la hoja
 * de estilos complementaria y la categoría de patterns.
 *
 * @package afa-poveda
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Carga style.css en el front y en el editor.
 */
function afa_poveda_setup() {
	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'afa_poveda_setup' );

function afa_poveda_enqueue_styles() {
	wp_enqueue_style(
		'afa-poveda-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'afa_poveda_enqueue_styles' );

/**
 * Categoría propia para los patterns del tema.
 */
function afa_poveda_pattern_categories() {
	register_block_pattern_category(
		'afa-poveda',
		array( 'label' => __( 'AFA Padre Poveda', 'afa-poveda' ) )
	);
}
add_action( 'init', 'afa_poveda_pattern_categories' );

/**
 * Colección de iconos del tema para el bloque core/icon (WP ≥ 7.1).
 * Aparecen en el listado del editor junto a los de WordPress.
 */
function afa_poveda_register_icons() {
	if ( ! function_exists( 'wp_register_icon_collection' ) || ! function_exists( 'wp_register_icon' ) ) {
		return;
	}

	wp_register_icon_collection(
		'afa-poveda',
		array(
			'label'       => __( 'AFA Padre Poveda', 'afa-poveda' ),
			'description' => __( 'Iconos de accesos de la portada y la web de la AFA.', 'afa-poveda' ),
		)
	);

	$icons_dir = get_template_directory() . '/assets/icons/';
	$icons     = array(
		'comedor'        => __( 'Comedor', 'afa-poveda' ),
		'extraescolares' => __( 'Extraescolares', 'afa-poveda' ),
		'calendario'     => __( 'Calendario', 'afa-poveda' ),
		'voluntarios'    => __( 'Voluntarios', 'afa-poveda' ),
	);

	foreach ( $icons as $slug => $label ) {
		wp_register_icon(
			'afa-poveda/' . $slug,
			array(
				'label'     => $label,
				'file_path' => $icons_dir . 'icon-' . $slug . '.svg',
			)
		);
	}
}
add_action( 'init', 'afa_poveda_register_icons' );
