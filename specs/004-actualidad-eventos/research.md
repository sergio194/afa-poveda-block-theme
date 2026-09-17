# Research: Actualidad y Eventos (Noticias)

**Feature**: `004-actualidad-eventos` | **Date**: 2026-09-17

## R1 — `home.html` como archivo `/noticias/`

**Decision**: Reescribir `templates/home.html` como el archivo de Figma (hero + toolbar + grid, sin sidebar). Activación editorial: Ajustes → Lectura → «Página de entradas» = página con slug `noticias`. `front-page.html` (spec 002) sigue siendo `/`.

**Rationale**: Con página de entradas asignada, WordPress usa `home.html` en `/noticias/`, que es el destino ya cableado en «Ver noticias» / «Cargar más» de la portada. Encaja con la jerarquía FSE y no inventa un CPT archivo.

**Alternatives considered**:
- Solo `archive.html` — las entradas no tienen archivo nativo en una URL bonita sin página de entradas.
- Página estática con Query Loop `inherit: false` — duplica paginación y se desincroniza de Lectura.
- Dejar sidebar de 001 en `home.html` — contradice Figma y spec R5.

## R2 — Categorías y búsqueda reutilizan la misma piel

**Decision**: `archive.html` (categoría/etiqueta/fecha) y `search.html` montan el mismo hero + toolbar + `noticias-grid` (query `inherit: true`). En búsqueda, el H1 del hero puede convivir con `query-title` tipo search o un párrafo de contexto; las fichas son las mismas.

**Rationale**: Spec R1 (filtrar = recarga de listado; buscar = resultados). La visitante no percibe tres layouts distintos. `inherit: true` respeta el contexto (todas / una categoría / `s=`).

**Alternatives considered**:
- AJAX en la misma URL — JS a medida, constitución VI.
- Template `category.html` distinta — más archivos para el mismo UI.

## R3 — Filtros: «Todas» + desplegable de categorías

**Decision**: Pattern `noticias-toolbar`: buscador + píldora «Todas» → `/noticias/` + bloque `core/categories` con `displayAsDropdown: true` (script de navegación de core, no JS del tema). El conjunto Figma (Comunidad, Deportes…) es editorial; el tema no registra taxonomías ni limita el listado en código.

**Rationale**: Constitución III y IV: la junta añade categorías y aparecen solas. Con decenas de términos migrados, las píldoras (aunque con scroll) no son usables ni fieles al mock de 5–6 chips.

**Alternatives considered**:
- Píldoras de todas las categorías — no escala (estado inicial 004).
- Navigation hardcodeada a 5 URLs — se queda obsoleta.
- `register_taxonomy` en el tema — prohibido.
- Limitar a N categorías por PHP — lógica editorial en el tema; frágil.

## R4 — Seis por página

**Decision**: Query del grid con `inherit: true` (paginación correcta de archivo/categoría/búsqueda). Documentar en quickstart: Ajustes → Lectura → «Entradas en cada página» = **6**. No forzar `posts_per_page` en PHP salvo que Lectura se ignore en algún contexto; si hace falta, un filtro acotado a `is_home || is_category || is_search` de entradas.

**Rationale**: Un único recuento (spec R4). Inherit + ajuste de Lectura es lo que el voluntariado ya puede cambiar sin código.

**Alternatives considered**: `perPage: 6` + `inherit: false` en `home.html` — rompe el contexto de categoría/búsqueda si se reutiliza el mismo pattern.

## R5 — Ficha de tarjeta (grid)

**Decision**: Pattern `noticias-grid` con `core/query` inherit, `post-template` layout grid `columnCount: 3`, card `is-style-afa-card` + clase `.afa-news-card`: imagen 16:9 (enlace), fila categoría + fecha, título (enlace, nivel 3), extracto, «Leer más». Vacío: `query-no-results` con mensaje en español. Paginación: números + flechas, clase `.afa-news-pagination`.

**Rationale**: Reutiliza el estilo tarjeta de 001 y la idea de `home-latest-news`, pero el archivo necesita categoría en la ficha y paginación; no se reescribe el pattern de portada para no romper 002.

**Alternatives considered**: Reusar `posts-list.php` tal cual — layout lista + sidebar, no Figma. Unificar CSS con `.afa-home-news-card` — acopla portada y archivo.

## R6 — Imagen ausente

**Decision**: CSS en `.afa-news-card__media`: `aspect-ratio: 16 / 9` siempre; si no hay `img`, fondo `surface-high` (marcador). Sin iconos distintos por categoría en v1 (los de Figma AFA/judo son mock).

**Rationale**: Constitución VI (sin saltos de maquetación). No registrar imágenes default en PHP ni CPT.

## R7 — Detalle: plantilla `single.html`

**Decision**: Reescribir `single.html`: header + main constrained/wide sin `parts/sidebar`. Migas (Inicio → Noticias → título) + titular H1 + autor/fecha + imagen 16:9 + `post-content` + términos. Escritorio: `core/columns` ~66 % artículo / ~33 % relacionadas. Móvil: apilado (relacionadas debajo).

**Rationale**: Frames detalle 19:2503 / 20:2629. El aside 001 (buscar / newsletter / recientes) no está en esos frames (spec R5).

**Alternatives considered**: `page-with-sidebar` — sidebar incorrecto. Plugin de breadcrumbs — lógica fuera, innecesario.

## R8 — Relacionadas sin plugin

**Decision**: Query Loop (`inherit: false`, `perPage: 3`, `postType: post`) con clase `afa-related-news`. En `functions.php`, filtro `query_loop_block_query_vars`: si el bloque tiene esa clase y `is_singular('post')`, añadir `post__not_in` = ID actual y `category__in` = categorías de la entrada; si no hay categorías, solo excluir actual (últimas 3). Vacío: no resultados → ocultar o mensaje discreto vía `query-no-results`.

**Rationale**: Core no relaciona «esta entrada» solo con markup. El precedente está en 002 (filtro mínimo si el Query Loop no basta). No es CPT ni formulario (constitución III).

**Alternatives considered**:
- Plugin Related Posts — dependencia y constitución III.
- Siempre las 3 últimas — más simple, peor «relacionadas».
- Markup PHP `get_posts` en el pattern — anti-pattern (query en registro, no en render; ver skill wp-patterns).

## R9 — Migas

**Decision**: Grupo `.afa-news-crumbs`: enlace Inicio (`/`), enlace Noticias (`/noticias/`), `core/post-title` (sin enlace, nivel span/p o heading visualmente de miga, no H1). Separadores CSS (`::after`) para no hardcodear caracteres en cada nodo. H1 del artículo aparte, debajo.

**Rationale**: No hay bloque core de migas en WP 7.1. Patrón estático + título dinámico es editable y accesible (el H1 sigue siendo el de la noticia).

## R10 — Copy del hero y menú activo

**Decision**: Pattern `noticias-hero` con eyebrow estilo etiqueta (`soft-green` / `green` o `afa-eyebrow` de 001), H1 «Actualidad y Eventos», párrafo de apoyo canónico de escritorio. Editable en el Editor del sitio (vive en plantilla). El título de la página de entradas puede ser «Noticias» para el menú; no se imprime `query-title` como H1 del archivo.

**Rationale**: Spec (menú ≠ H1, mismo patrón que AFA / Sobre nosotros). `current-menu-item` lo resuelve el menú al apuntar a `/noticias/`; en categoría/detalle, WP marca ancestro si el ítem es la página de entradas (comprobar; si no, CSS `body.single-post .current-*` o clase en el ítem — documentar en implementación si falla).

## Resolved clarifications

No quedan ítems NEEDS CLARIFICATION abiertos del Technical Context.
