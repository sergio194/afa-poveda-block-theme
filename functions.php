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
 * Tamaño afa-news-card: recorte duro 16:9 para fichas del archivo.
 */
function afa_poveda_setup() {
	add_editor_style( 'style.css' );
	add_image_size( 'afa-news-card', 768, 432, true );
}
add_action( 'after_setup_theme', 'afa_poveda_setup' );

/**
 * Etiqueta legible del tamaño de ficha en el mediador.
 *
 * @param string[] $sizes Tamaños registrados.
 * @return string[]
 */
function afa_poveda_image_size_names( $sizes ) {
	$sizes['afa-news-card'] = __( 'Ficha de noticia (16:9)', 'afa-poveda' );
	return $sizes;
}
add_filter( 'image_size_names_choose', 'afa_poveda_image_size_names' );

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
		'carrera'        => __( 'Carrera solidaria', 'afa-poveda' ),
		'libro'          => __( 'Libro / lectura', 'afa-poveda' ),
		'ludoteca'       => __( 'Ludoteca', 'afa-poveda' ),
		'voz'            => __( 'Voz y participación', 'afa-poveda' ),
		'mail'           => __( 'Correo', 'afa-poveda' ),
		'habilidades'    => __( 'Habilidades', 'afa-poveda' ),
		'colaboracion'   => __( 'Colaboración', 'afa-poveda' ),
		'check-line'     => __( 'Check', 'afa-poveda' ),
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

/**
 * Query Loop «noticias relacionadas»: misma categoría, sin la entrada actual.
 *
 * El filtro recibe el bloque post-template (no el Query). La clase va en ambos.
 * `excludeCurrent` (WP 7.1) refuerza la exclusión nativa.
 *
 * @param array    $query Query args del bloque.
 * @param WP_Block $block Bloque (post-template).
 * @return array
 */
function afa_poveda_related_news_query( $query, $block ) {
	$class_name = '';
	if ( ! empty( $block->attributes['className'] ) ) {
		$class_name = $block->attributes['className'];
	} elseif ( ! empty( $block->parsed_block['attrs']['className'] ) ) {
		$class_name = $block->parsed_block['attrs']['className'];
	}

	if ( false === strpos( $class_name, 'afa-related-news' ) ) {
		return $query;
	}

	if ( ! is_singular( 'post' ) ) {
		return $query;
	}

	$post_id = get_queried_object_id();
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}
	if ( ! $post_id ) {
		return $query;
	}

	$excluded = isset( $query['post__not_in'] ) ? (array) $query['post__not_in'] : array();
	$query['post__not_in']        = array_values( array_unique( array_merge( $excluded, array( (int) $post_id ) ) ) );
	$query['ignore_sticky_posts'] = true;

	$categories = wp_get_post_categories( $post_id );
	if ( ! empty( $categories ) ) {
		$query['category__in'] = $categories;
	}

	return $query;
}
add_filter( 'query_loop_block_query_vars', 'afa_poveda_related_news_query', 10, 2 );

/**
 * Destinos de «Compartir noticia» (permalink actual). Sin JS.
 *
 * @param string $block_content HTML del bloque.
 * @param array  $block         Bloque parseado.
 * @return string
 */
function afa_poveda_news_share_urls( $block_content, $block ) {
	if ( empty( $block['blockName'] ) || 'core/social-links' !== $block['blockName'] ) {
		return $block_content;
	}

	$class_name = '';
	if ( ! empty( $block['attrs']['className'] ) ) {
		$class_name = $block['attrs']['className'];
	}
	if ( false === strpos( $class_name, 'afa-news-share__links' ) ) {
		return $block_content;
	}
	if ( ! is_singular( 'post' ) ) {
		return $block_content;
	}

	$url   = get_permalink();
	$title = wp_strip_all_tags( get_the_title() );
	if ( ! $url ) {
		return $block_content;
	}

	$mail = 'mailto:?subject=' . rawurlencode( $title ) . '&body=' . rawurlencode( $url );
	$wa   = 'https://wa.me/?text=' . rawurlencode( $title . ' ' . $url );
	$fb   = 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode( $url );

	$block_content = preg_replace(
		'#(<li[^>]*\bwp-social-link-mail\b[^>]*>\s*<a\b[^>]*href=")[^"]*#',
		'$1' . esc_url( $mail ),
		$block_content,
		1
	);
	$block_content = preg_replace(
		'#(<li[^>]*\bwp-social-link-whatsapp\b[^>]*>\s*<a\b[^>]*href=")[^"]*#',
		'$1' . esc_url( $wa ),
		$block_content,
		1
	);
	$block_content = preg_replace(
		'#(<li[^>]*\bwp-social-link-facebook\b[^>]*>\s*<a\b[^>]*href=")[^"]*#',
		'$1' . esc_url( $fb ),
		$block_content,
		1
	);

	return $block_content;
}
add_filter( 'render_block', 'afa_poveda_news_share_urls', 10, 2 );

/**
 * Marca la píldora de filtro activa según la URL del enlace (lista editable).
 *
 * @param string $block_content HTML del bloque.
 * @param array  $block         Bloque parseado.
 * @return string
 */
function afa_poveda_news_pill_active( $block_content, $block ) {
	if ( empty( $block['blockName'] ) || 'core/paragraph' !== $block['blockName'] ) {
		return $block_content;
	}

	$class_name = isset( $block['attrs']['className'] ) ? $block['attrs']['className'] : '';
	if ( false === strpos( $class_name, 'afa-news-pill' ) ) {
		return $block_content;
	}

	if ( ! preg_match( '/href=("|\')([^"\']+)\1/', $block_content, $matches ) ) {
		return $block_content;
	}

	$href      = $matches[2];
	$href_path = wp_parse_url( $href, PHP_URL_PATH );
	if ( ! is_string( $href_path ) || '' === $href_path ) {
		$href_path = $href;
	}
	$href_path = untrailingslashit( $href_path );

	$active = false;

	if ( is_category() ) {
		$cat_path = wp_parse_url( get_category_link( get_queried_object_id() ), PHP_URL_PATH );
		$active   = is_string( $cat_path ) && untrailingslashit( $cat_path ) === $href_path;
	} elseif ( is_home() && ! is_front_page() ) {
		$posts_page = (int) get_option( 'page_for_posts' );
		$home_path  = $posts_page ? wp_parse_url( get_permalink( $posts_page ), PHP_URL_PATH ) : '/noticias';
		if ( ! is_string( $home_path ) || '' === $home_path ) {
			$home_path = '/noticias';
		}
		$active = untrailingslashit( $home_path ) === $href_path
			|| false !== strpos( $href_path, '/noticias' );
	}

	if ( ! $active ) {
		return $block_content;
	}

	if ( false === strpos( $block_content, 'is-active' ) ) {
		$block_content = preg_replace(
			'/\bafa-news-pill\b/',
			'afa-news-pill is-active',
			$block_content,
			1
		);
	}

	if ( false === strpos( $block_content, 'aria-current=' ) ) {
		$block_content = preg_replace(
			'/<a\b/',
			'<a aria-current="page"',
			$block_content,
			1
		);
	}

	return $block_content;
}
add_filter( 'render_block', 'afa_poveda_news_pill_active', 10, 2 );

/**
 * Texto de la opción vacía del desplegable «Más categorías».
 *
 * @param string $block_content HTML del bloque.
 * @param array  $block         Bloque parseado.
 * @return string
 */
function afa_poveda_news_cats_more_label( $block_content, $block ) {
	if ( empty( $block['blockName'] ) || 'core/categories' !== $block['blockName'] ) {
		return $block_content;
	}

	$class_name = isset( $block['attrs']['className'] ) ? $block['attrs']['className'] : '';
	if ( false === strpos( $class_name, 'afa-news-cats' ) ) {
		return $block_content;
	}

	$label = isset( $block['attrs']['label'] ) && $block['attrs']['label']
		? $block['attrs']['label']
		: __( 'Más categorías', 'afa-poveda' );

	$block_content = str_replace(
		array(
			'>Seleccionar Categoría<',
			'>Select Category<',
		),
		'>' . esc_html( $label ) . '<',
		$block_content
	);

	return $block_content;
}
add_filter( 'render_block', 'afa_poveda_news_cats_more_label', 10, 2 );

/**
 * Fondo difuminado tras la foto de ficha (misma imagen, sin JS).
 *
 * @param string $block_content HTML del bloque.
 * @param array  $block         Bloque parseado.
 * @return string
 */
function afa_poveda_news_card_media_blur( $block_content, $block ) {
	if ( empty( $block['blockName'] ) || 'core/post-featured-image' !== $block['blockName'] ) {
		return $block_content;
	}

	$class_name = '';
	if ( ! empty( $block['attrs']['className'] ) ) {
		$class_name = $block['attrs']['className'];
	}
	if ( false === strpos( $class_name, 'afa-news-card__media' ) ) {
		return $block_content;
	}
	if ( ! $block_content || false === strpos( $block_content, '<img' ) ) {
		return $block_content;
	}
	if ( false !== strpos( $block_content, 'afa-news-card__media-bg' ) ) {
		return $block_content;
	}

	if ( ! preg_match( '/<img\b[^>]*>/i', $block_content, $matches ) ) {
		return $block_content;
	}

	$bg = $matches[0];
	$bg = preg_replace( '/\s(?:alt|aria-hidden|role)=("[^"]*"|\'[^\']*\')/i', '', $bg );
	if ( preg_match( '/\sclass="/i', $bg ) ) {
		$bg = preg_replace( '/\sclass="/i', ' class="afa-news-card__media-bg ', $bg, 1 );
	} else {
		$bg = preg_replace( '/^<img\b/i', '<img class="afa-news-card__media-bg"', $bg, 1 );
	}
	$bg = preg_replace( '/^<img\b/i', '<img alt="" aria-hidden="true"', $bg, 1 );

	return preg_replace( '/(<figure\b[^>]*>)/i', '$1' . $bg, $block_content, 1 );
}
add_filter( 'render_block', 'afa_poveda_news_card_media_blur', 10, 2 );

/**
 * El archivo de noticias no antepone sticky (cuenta fija de 6).
 *
 * @param WP_Query $query Query principal.
 */
function afa_poveda_news_main_query( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( $query->is_home() || $query->is_category() || $query->is_tag() ) {
		$query->set( 'ignore_sticky_posts', true );
	}
}
add_action( 'pre_get_posts', 'afa_poveda_news_main_query' );

/**
 * Nombre accesible distinto en «Leer más» / «Más información» del query loop (AA).
 *
 * @param string $block_content HTML del bloque.
 * @param array  $block         Bloque parseado.
 * @return string
 */
function afa_poveda_read_more_accessible_name( $block_content, $block ) {
	if ( empty( $block['blockName'] ) || 'core/read-more' !== $block['blockName'] ) {
		return $block_content;
	}
	if ( ! $block_content || false === strpos( $block_content, '<a' ) ) {
		return $block_content;
	}
	if ( false !== strpos( $block_content, 'aria-label=' ) ) {
		return $block_content;
	}

	$title = get_the_title();
	if ( ! $title ) {
		return $block_content;
	}

	// El nombre accesible debe contener el texto visible (WCAG 2.5.3): «Ver más: X», no «Leer más: X».
	$visible = ! empty( $block['attrs']['content'] ) ? wp_strip_all_tags( $block['attrs']['content'] ) : '';
	$label   = $visible
		? sprintf(
			/* translators: 1: visible link text, 2: post title */
			__( '%1$s: %2$s', 'afa-poveda' ),
			$visible,
			wp_strip_all_tags( $title )
		)
		: sprintf(
			/* translators: %s: post title */
			__( 'Leer más: %s', 'afa-poveda' ),
			wp_strip_all_tags( $title )
		);

	return preg_replace(
		'/<a\b/i',
		'<a aria-label="' . esc_attr( $label ) . '"',
		$block_content,
		1
	);
}
add_filter( 'render_block', 'afa_poveda_read_more_accessible_name', 10, 2 );

/**
 * Listados de contenido del plugin sin el plugin (specs 012 y 009).
 *
 * Si el tipo (`afa_servicio`, `afa_extraescolar`) no existe (plugin desactivado), WP_Query cae al
 * tipo `post` y el Query Loop pintaría noticias como si fueran fichas. Se sustituye por un aviso.
 *
 * @param string|null $pre_render Contenido ya calculado.
 * @param array       $block      Bloque parseado.
 * @return string|null
 */
function afa_poveda_query_sin_plugin( $pre_render, $block ) {
	if ( null !== $pre_render || empty( $block['blockName'] ) || 'core/query' !== $block['blockName'] ) {
		return $pre_render;
	}
	$avisos    = array(
		'afa_servicio'     => __( 'Aún no hay servicios publicados.', 'afa-poveda' ),
		'afa_extraescolar' => __( 'Aún no hay actividades publicadas.', 'afa-poveda' ),
	);
	$post_type = isset( $block['attrs']['query']['postType'] ) ? $block['attrs']['query']['postType'] : '';
	if ( ! isset( $avisos[ $post_type ] ) || post_type_exists( $post_type ) ) {
		return $pre_render;
	}
	return '<p class="afa-listado-vacio">' . esc_html( $avisos[ $post_type ] ) . '</p>';
}
add_filter( 'pre_render_block', 'afa_poveda_query_sin_plugin', 10, 2 );
