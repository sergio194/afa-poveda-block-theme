# Research: Sobre nosotros (AFA)

**Feature**: `003-sobre-nosotros` | **Date**: 2026-09-16

## R1 — Plantilla de página vs solo `page.html`

**Decision**: Crear `templates/page-afa.html` (título en Site Editor: «AFA / Sobre nosotros») con `header` + `main` → solo `post-content` (layout constrained/wide según secciones) + `footer`. **Sin** `core/post-title`.

**Rationale**: El H1 del diseño es el del hero («Sobre nosotros»). Si `page.html` imprime también el título de la página, hay H1 duplicado (rompe a11y y Figma). La junta asigna esta plantilla a la página `/afa/`.

**Alternatives considered**:
- Usar `page.html` y ocultar el título con CSS — frágil y accesible mal.
- `page-with-sidebar.html` — Figma escritorio no lleva sidebar de blog; el aside móvil de Figma es el global, fuera de alcance (spec R1).
- Todo en una plantilla fija sin `post-content` — viola constitución IV (cambios de junta en Site Editor de plantilla, no en la página).

## R2 — Patterns por sección + compuesto

**Decision**: Seis patterns de sección (`sobre-hero`, `sobre-quienes-somos`, `sobre-organigrama`, `sobre-que-hace`, `sobre-utilidad-comisiones`, `sobre-documentos`) y un pattern compuesto `sobre-nosotros` que los referencia o los concatena para insertar de una vez en la página vacía.

**Rationale**: Montaje rápido + edición por bloques; alineado con portada (002) y constitución IV.

**Alternatives considered**:
- Solo markup en la plantilla — poco editable.
- Un único pattern monolítico sin secciones — válido pero peor para reutilizar «Documentos» u «Organigrama».

## R3 — Organigrama: bloques vs CPT

**Decision**: Representar cargos con `core/group` / `core/columns` + headings/paragraphs (tarjetas). Contenido de ejemplo del Figma (curso 2023/24) como default editable. Sin CPT ni meta de personas en el tema.

**Rationale**: Constitución III. La junta cambia cada curso editando la página. Un directorio de personas sería plugin/spec aparte.

**Alternatives considered**:
- CPT `miembro_junta` — fuera de alcance del tema.
- HTML custom en `functions.php` — no editable en el editor de bloques.

## R4 — Documentos PDF

**Decision**: Lista de ítems con `core/file` (preferido: muestra nombre + descarga nativa) o `core/buttons`/`core/paragraph` + enlace a URL de medio. Defaults con etiquetas legibles; URLs placeholder hasta que la junta suba PDFs reales.

**Rationale**: Medios nativos de WP; sin lógica de descarga en el tema. Spec R4 (etiquetas legibles).

**Alternatives considered**:
- Shortcode de galería de PDFs — no necesario.
- Forzar archivos en `assets/` del tema — no editable por voluntarios y versiona binarios.

## R5 — Hero

**Decision**: `core/cover` (align wide, radio medium) con overlay/gradiente para contraste AA del texto blanco; H1 «Sobre nosotros» + párrafo de apoyo. Misma familia visual que el hero de portada, sin CTA «Descubre más».

**Rationale**: Coincide con Figma; Cover editable; reutiliza criterio AA de 002.

**Alternatives considered**: Image + Group — peor overlay. Media & Text — no es full-bleed redondeado del diseño.

## R6 — Layout Utilidad + Comisiones

**Decision**: `core/columns` 50/50 (o ~55/45) en escritorio; apilado natural en móvil. CSS mínimo solo si hay que forzar gap/card backgrounds que theme.json no cubra (clase `.afa-sobre-utilidad`).

**Rationale**: Figma «Asymmetric Layout»; Columns es el bloque nativo adecuado.

## R7 — Estilos organigrama y lista de docs

**Decision**: Clases BEM ligeras en `style.css` (p. ej. `.afa-organigrama`, `.afa-organigrama__card`, `.afa-docs`) con comentario de justificación: radios/bordes/grid de vocales que no se expresan bien solo con presets en todos los breakpoints.

**Rationale**: Constitución II permite CSS justificado. Evitar hex sueltos; usar variables `--wp--preset--*`.

## R8 — Activación editorial

**Decision**: Quickstart documenta: crear página título «Sobre nosotros», slug `afa`, asignar plantilla «AFA / Sobre nosotros», insertar pattern compuesto, enlazar menú «AFA» → esa página. El tema no crea la página en PHP.

**Rationale**: Contenido pertenece al sitio; cambiar de tema no debe depender de `wp_insert_post` en el theme.

## Resolved clarifications

No quedan ítems NEEDS CLARIFICATION abiertos del Technical Context.
