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

/**
 * Destinos de los enlaces internos fijos del tema (spec 014).
 *
 * Patterns y plantillas enlazan a rutas canónicas («/hazte-socio/», «/contacto/»…). Al pintar,
 * cada ruta se lleva a la página que la junta haya marcado con la plantilla del tema
 * correspondiente, así el enlace funciona aunque el slug real sea otro (`hazte-socio-2`,
 * `contacto-afa`) y se cambia desde el editor (Plantilla de la página) sin tocar código.
 *
 * Tipos de destino:
 * - `template`: página publicada con esa plantilla (si hay varias, la que esté en la ruta
 *   canónica; si no, la más reciente).
 * - `post_type` + `slugs`: primera entrada publicada de ese tipo con uno de esos slugs.
 * - `archive`: archivo del tipo de contenido.
 * - `posts_page`: página de entradas (Ajustes → Lectura).
 * - `privacy`: página de privacidad (Ajustes → Privacidad), si está publicada.
 *
 * @return array<string,array> Ruta canónica => destino.
 */
function afa_poveda_internal_link_targets() {
	$targets = array(
		'/hazte-socio/'       => array( 'template' => 'page-hazte-socio' ),
		'/contacto/'          => array( 'template' => 'page-contacto' ),
		'/calendario/'        => array( 'template' => 'page-calendario' ),
		'/afa/'               => array( 'template' => 'page-afa' ),
		'/servicios/'         => array( 'template' => 'page-servicios' ),
		'/configurador/'      => array( 'template' => 'page-configurador' ),
		'/servicios/comedor/' => array(
			'post_type' => 'afa_servicio',
			'slugs'     => array( 'comedor', 'comedor-escolar' ),
		),
		'/extraescolares/'    => array( 'archive' => 'afa_extraescolar' ),
		'/noticias/'          => array( 'posts_page' => true ),
		'/privacidad/'        => array( 'privacy' => true ),
	);

	/**
	 * Permite añadir o cambiar destinos sin editar el tema.
	 *
	 * @param array $targets Ruta canónica => destino.
	 */
	return apply_filters( 'afa_poveda_internal_link_targets', $targets );
}

/**
 * URL real de una ruta canónica del tema, o '' si no hay destino.
 *
 * @param string $path Ruta canónica con barras («/contacto/»).
 * @return string
 */
function afa_poveda_resolve_internal_link( $path ) {
	static $cache = array();
	if ( isset( $cache[ $path ] ) ) {
		return $cache[ $path ];
	}

	$targets = afa_poveda_internal_link_targets();
	$target  = isset( $targets[ $path ] ) ? $targets[ $path ] : array();
	$url     = '';

	if ( ! empty( $target['template'] ) ) {
		$pages = get_posts(
			array(
				'post_type'        => 'page',
				'post_status'      => 'publish',
				'posts_per_page'   => 10,
				'orderby'          => 'date',
				'order'            => 'DESC',
				'meta_key'         => '_wp_page_template', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
				'meta_value'       => $target['template'], // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
				'no_found_rows'    => true,
				'suppress_filters' => false,
			)
		);
		foreach ( $pages as $page ) {
			if ( trim( $path, '/' ) === get_page_uri( $page ) ) {
				$url = get_permalink( $page );
				break;
			}
		}
		if ( ! $url && $pages ) {
			$url = get_permalink( $pages[0] );
		}
	} elseif ( ! empty( $target['post_type'] ) && post_type_exists( $target['post_type'] ) ) {
		foreach ( (array) $target['slugs'] as $slug ) {
			$found = get_page_by_path( $slug, OBJECT, $target['post_type'] );
			if ( $found && 'publish' === $found->post_status ) {
				$url = get_permalink( $found );
				break;
			}
		}
	} elseif ( ! empty( $target['archive'] ) && post_type_exists( $target['archive'] ) ) {
		$url = (string) get_post_type_archive_link( $target['archive'] );
	} elseif ( ! empty( $target['posts_page'] ) ) {
		$posts_page = (int) get_option( 'page_for_posts' );
		$url        = $posts_page ? get_permalink( $posts_page ) : '';
	} elseif ( ! empty( $target['privacy'] ) ) {
		$url = get_privacy_policy_url();
	}

	$cache[ $path ] = $url ? (string) $url : '';
	return $cache[ $path ];
}

/**
 * Reescribe al pintar los enlaces a rutas canónicas del tema (spec 014).
 *
 * Acepta la ruta relativa («/contacto/») o absoluta del propio sitio
 * («http://dominio/contacto/», como guarda el menú). Si la ruta no tiene destino,
 * se deja tal cual pero colgando de la URL del sitio (instalaciones en subcarpeta).
 *
 * @param string $block_content HTML del bloque.
 * @param array  $block         Bloque parseado.
 * @return string
 */
function afa_poveda_internal_links( $block_content, $block ) {
	$types = array( 'core/button', 'core/paragraph', 'core/heading', 'core/list-item', 'core/navigation-link', 'core/navigation-submenu' );
	if ( empty( $block['blockName'] ) || ! in_array( $block['blockName'], $types, true ) ) {
		return $block_content;
	}
	if ( ! $block_content || false === strpos( $block_content, 'href=' ) ) {
		return $block_content;
	}

	$targets   = afa_poveda_internal_link_targets();
	$home_host = wp_parse_url( home_url(), PHP_URL_HOST );

	return preg_replace_callback(
		'/(\bhref=")([^"#?]*)(["#?])/i',
		static function ( $m ) use ( $targets, $home_host ) {
			$href = html_entity_decode( $m[2] );
			$host = wp_parse_url( $href, PHP_URL_HOST );
			if ( $host ? $host !== $home_host : 0 !== strpos( $href, '/' ) ) {
				return $m[0];
			}
			$path = wp_parse_url( $href, PHP_URL_PATH );
			if ( ! is_string( $path ) || '' === $path ) {
				return $m[0];
			}
			$path = trailingslashit( $path );
			if ( ! isset( $targets[ $path ] ) ) {
				return $m[0];
			}

			$url = afa_poveda_resolve_internal_link( $path );
			if ( ! $url ) {
				$url = home_url( $path );
			}
			return $m[1] . esc_url( $url ) . $m[3];
		},
		$block_content
	);
}
add_filter( 'render_block', 'afa_poveda_internal_links', 10, 2 );

/**
 * Enlaces sin destino (spec 014): `href="#"` es el marcador de los patterns
 * («Descargar», documentos, redes). En el front no lleva a ningún sitio, así que:
 * - en redes sociales se quita el icono (vuelve en cuanto se pone la URL real);
 * - en párrafos y elementos de lista se deja el texto sin enlace;
 * - en botones se quita el botón.
 *
 * Va con prioridad 20: «Compartir noticia» rellena antes sus enlaces (prioridad 10).
 *
 * @param string $block_content HTML del bloque.
 * @param array  $block         Bloque parseado.
 * @return string
 */
function afa_poveda_placeholder_links( $block_content, $block ) {
	if ( empty( $block['blockName'] ) || ! $block_content || false === strpos( $block_content, 'href="#"' ) ) {
		return $block_content;
	}

	switch ( $block['blockName'] ) {
		case 'core/social-links':
			$block_content = preg_replace( '#<li\b[^>]*>\s*<a\b[^>]*\bhref="\#"[^>]*>.*?</a>\s*</li>#is', '', $block_content );
			return false === strpos( $block_content, '<li' ) ? '' : $block_content;
		case 'core/paragraph':
		case 'core/list-item':
			return preg_replace( '#<a\b[^>]*\bhref="\#"[^>]*>(.*?)</a>#is', '<span class="afa-enlace-pendiente">$1</span>', $block_content );
		case 'core/button':
			return '';
	}

	return $block_content;
}
add_filter( 'render_block', 'afa_poveda_placeholder_links', 20, 2 );
