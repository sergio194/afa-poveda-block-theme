# Contract: UI Actualidad y Eventos (Noticias)

**Feature**: `004-actualidad-eventos` | **Date**: 2026-09-17  
**Consumers**: `templates/home.html`, `archive.html`, `search.html`, `single.html`, `index.html`; patterns `afa-poveda/noticias-*`  
**Fuente**: Figma `Actualidad y eventos` (20:2742), `Actualidad y eventos mobile` (22:2991), detalle 19:2503 / 20:2629

## A. Archivo (home / archive / index)

### Orden de secciones (obligatorio)

1. `header` (template part — spec 001)
2. `main`
   1. Hero — `afa-poveda/noticias-hero`
   2. Toolbar — template part `noticias-toolbar` (píldoras editables + Más categorías)
   3. Grid — `afa-poveda/noticias-grid` (query inherit)
3. `footer` (template part — spec 001)

Sin `parts/sidebar`. Sin `query-title` como H1 del archivo.

### Hero

| Slot | Bloque | Tokens / notas |
|------|--------|----------------|
| Eyebrow | `core/paragraph` o heading estilo etiqueta | «Archivo de noticias»; `soft-green` / `green` o `is-style-afa-eyebrow` |
| Titular | `core/heading` nivel **1** | «Actualidad y Eventos»; `huge` o `xx-large`, font heading, `contrast` |
| Apoyo | `core/paragraph` | Color `contrast-muted`; copy canónico de la spec |

### Toolbar

| Slot | Escritorio | Móvil |
|------|------------|-------|
| Layout | Fila ligera sin caja: píldoras + «Más categorías»; sin borde/fondo de contenedor | Píldoras con scroll horizontal; «Más» a ancho completo |
| Todas | Píldora «Todas» → `/noticias/` (activa en el archivo completo) | Igual |
| Categorías destacadas | Párrafos `afa-news-pill` editables en la parte (defaults: AFA, Extraescolares, Campamentos, Fiestas, Planes en el barrio) | Igual |
| Más | `core/details` + `core/categories` `displayAsDropdown` | Select estilizado al abrir |
| Buscar | No en toolbar (R17); lupa de cabecera | Igual |

### Grid de fichas

| Slot | Contrato |
|------|----------|
| Query | `inherit: true`; 6 por página (ajuste Lectura) |
| Layout | Grid 3 columnas ≥ ~782 px; 1 columna bajo ese ancho |
| Card | `is-style-afa-card` + `.afa-news-card`; altura igualada |
| Media | 16:9, enlace al permalink; tamaño `afa-news-card`; imagen con `object-fit: contain` sobre fondo difuminado de la misma foto (R15); placeholder `surface-high` si no hay foto |
| Meta | Categoría (píldora pequeña) + fecha |
| Título | H3 enlace; clamp 2 líneas |
| Extracto | Clamp ~3 líneas |
| CTA | «Leer más» color `primary` (flecha opcional CSS) |
| Paginación | Centrada; página actual relleno `primary`/`accent` + texto `base`; prev/next flechas |
| Vacío | Párrafo «No hay noticias que mostrar todavía.» (o variante de búsqueda) |

## B. Búsqueda (`search.html`)

Mismo orden A, más contexto de resultados:

| Slot | Contrato |
|------|----------|
| Contexto | `query-title` tipo search **no sustituye** al H1 del hero; puede ir como subtítulo o sr-only si el hero ya explica el archivo |
| Grid | Idéntico a A |
| Vacío | Mensaje de sin resultados + enlace a `/noticias/` |

## C. Detalle (`single.html`)

### Orden

1. `header`
2. `main`
   1. Migas — Inicio / Noticias / título actual
   2. Titular H1 (título de la entrada)
   3. Byline — autor (si hay) + fecha
   4. Layout:
      - Escritorio: columna artículo (imagen + contenido) \| columna relacionadas
      - Móvil: artículo y debajo relacionadas
3. `footer`

### Artículo

| Slot | Contrato |
|------|----------|
| Migas | `.afa-news-crumbs`; enlaces Inicio y Noticias; título actual no es H1 |
| H1 | `core/post-title` nivel 1; font heading |
| Byline | Fecha obligatoria; autor opcional |
| Imagen | Destacada, radio medium, 16:9 o auto-alto; omitir hueco enorme si no hay |
| Cuerpo | `core/post-content`; citas con borde `primary` si el estilo global lo permite |
| Categorías | `post-terms` visibles (no taxonomía inventada) |

### Relacionadas

| Slot | Contrato |
|------|----------|
| Título | H2/H3 «Noticias relacionadas» |
| Query | Clase `afa-related-news`; hasta 3; ver research R8 |
| Item | Miniatura 1:1 a la izquierda + categoría + título enlace (R14) |
| Vacío | Ocultar sección o no-results |

## Tokens obligatorios (001)

- Colores: `surface`, `surface-container`, `surface-high`, `primary`, `primary-soft`, `accent`, `soft-green`, `green`, `base`, `contrast`, `contrast-muted`, `outline`
- Tipografía: heading / body; huge → small
- Radios: medium (fichas), pill (filtros), small (paginación)
- Spacing presets; `aspect-ratio` 16:9 en media

## No contratos

- Sidebar 001 (buscar posts / suscríbete / lo más reciente) en archivo ni detalle
- Calendario / detalle evento
- Infinite scroll, JS de filtro
- CPT o taxonomías registradas por el tema
- Copys distintos móvil/escritorio en el hero
