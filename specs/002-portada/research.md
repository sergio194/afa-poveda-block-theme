# Research: Portada (HOME)

**Feature**: `002-portada` | **Date**: 2026-09-16

## R1 — Plantilla: `front-page` vs reescribir `home`

**Decision**: Crear `templates/front-page.html` para la portada diseñada; mantener `templates/home.html` como índice de entradas con sidebar.

**Rationale**: En temas de bloques, `front-page.html` tiene prioridad en la página de inicio del sitio. `home.html` se usa para el blog cuando hay página de entradas separada (o como fallback). La spec exige que la portada no lleve sidebar; el listado con sidebar sigue siendo útil para Noticias (spec 003).

**Alternatives considered**:
- Reescribir solo `home.html` — mezcla portada marketing con archivo de posts; peor si la junta configura «Últimas entradas» vs página estática.
- Página estática en el editor sin plantilla en repo — no versionable ni alineada con SDD.

## R2 — Composición: patterns por sección vs un solo pattern monolítico

**Decision**: Cinco patterns de sección + `front-page.html` que los referencia con `wp:pattern`.

**Rationale**: Editables e insertables por separado; encaja con constitución IV y con el skill de patterns del proyecto. Facilita reutilizar «Últimas noticias» o el CTA en otras páginas.

**Alternatives considered**:
- Todo el markup en `front-page.html` — menos reutilizable.
- Un único pattern `home` anidando todo — válido, pero más difícil de editar por bloques en el Site Editor.

## R3 — Fuente de «Actualidad y Avisos»

**Decision**: Query de entradas **sticky** (fijas), máximo 3: la primera = destacado principal; las dos siguientes = secundarios. Etiqueta visual = primera categoría de la entrada (o «Destacado» si no hay). Enlace «Ver todos» → archivo de la categoría `avisos` si existe, si no al blog (`/noticias/` o home de posts).

**Rationale**: Sin CPT ni plugins (constitución III). Sticky es nativo y editable por voluntarios («Fijar en la portada»). Cubre el layout 1+2 de Figma.

**Alternatives considered**:
- Categoría `avisos` como única fuente — también válido; se puede combinar después (sticky dentro de avisos) en refine.
- CPT `aviso` — fuera de alcance del tema.
- Bloques manuales sin Query — no escala; la junta tendría que editar markup cada aviso.

## R4 — «Últimas Noticias» y duplicados con avisos

**Decision**: Query de 3 posts publicados ordenados por fecha, **excluyendo IDs sticky** mostrados arriba cuando sea posible vía atributos del Query Loop; si el editor no permite exclusión fácil, aceptar solape temporal y documentarlo (mejor sticky solo para avisos y noticias no sticky).

**Rationale**: Evita repetir el mismo titular en dos secciones. Query Loop core soporta `perPage`, `postType`, `order`; la exclusión de sticky puede requerir un filtro mínimo en `functions.php` solo si el bloque no basta — preferir configuración del query (`ignoreStickyPosts` / no incluir sticky en el loop de noticias).

**Alternatives considered**: Offset manual — frágil. Misma query sin filtro — peor UX.

## R5 — Hero: Cover vs Image + Group

**Decision**: Bloque **Cover** (o Group con imagen de fondo) a `alignwide`, radio `medium` (12px), overlay/gradiente oscuro lateral como Figma para contraste del texto blanco; en móvil, Cover + botón «Descubre más» con ancla `#afa-accesos`.

**Rationale**: Cover es el bloque nativo para hero con overlay; editable en el editor; cumple AA con overlay.

**Alternatives considered**: Image + texto absoluto en CSS — más frágil y menos editable. Media & Text — no coincide con Figma full-bleed redondeado.

## R6 — Accesos rápidos e iconos

**Decision**: Cuatro columnas (`core/columns`) en escritorio; en CSS (`style.css`) forzar wrap 2×2 bajo ~781 px. Iconos: SVG locales en `assets/icons/` referenciados como máscara CSS (mismo patrón que pin/mail de 001) o Image con SVG del tema vía `get_theme_file_uri` en el pattern.

**Rationale**: Figma pide icono + label; constitución VI exige assets locales. CSS justificado porque theme.json no expresa grid 2×2 de columnas fácilmente en todos los breakpoints.

**Alternatives considered**: Cuatro grupos apilados solo en móvil con block visibility — WP no tiene visibility nativa estable sin plugin. Icons de dashicons — estética distinta a Figma.

## R7 — «Cargar más noticias» (móvil)

**Decision**: Botón/enlace a la página de entradas o `/noticias/` (mismo destino que «Ver noticias»), no infinite scroll.

**Rationale**: Spec R2 y constitución (sin JS de interacción custom). Cumple el outcome de «ver más».

## R8 — CTA comunidad responsive

**Decision**: Un pattern con dos estilos vía clases `afa-home-cta` + media queries: fondo `surface-container` + botones primary/outline en escritorio; fondo `accent` + botón base / outline claro en móvil (como Figma), o un único tratamiento `surface-container` si el contraste móvil del azul sólido complica el outline — preferir acercarse a Figma móvil con tokens `accent`/`base`.

**Rationale**: Un solo pattern editable; divergencia visual documentada como CSS justificado.

## R9 — Ajustes de lectura del sitio

**Decision**: Documentar en quickstart: Ajustes → Lectura → «Una página estática» con portada vacía/mínima **o** «Últimas entradas»; con `front-page.html` presente, WordPress usa esa plantilla en la URL de inicio en ambos casos cuando aplica la jerarquía de plantillas front-page.

**Rationale**: Evitar sorpresa de que `home.html` siga mostrando el blog en `/` si no hay `front-page.html`.

## Resolved clarifications

No quedan ítems NEEDS CLARIFICATION abiertos del Technical Context.
