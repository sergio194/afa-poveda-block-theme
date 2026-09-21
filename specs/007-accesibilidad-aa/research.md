# Research: Accesibilidad WCAG AA del tema

**Feature**: `007-accesibilidad-aa` | **Date**: 2026-09-20

## R1 — Estándar y alcance de validación

**Decision**: Cumplir **WCAG 2.2 nivel AA** en la superficie pública del tema (plantillas, parts, patterns, estilos globales). Auditoría **interna documentada** (manual + herramientas de contraste/inspección). Sin certificación externa en esta fase.

**Rationale**: Constitución V ya fija WCAG 2.2 AA; la spec asume informe interno demostrable para la junta.

**Alternatives considered**: Solo WCAG 2.1 — insuficiente respecto a constitución. Sello externo ahora — fuera de alcance / coste. AAA — sobrealcance.

## R2 — Skip link (FR-005): dónde y cómo

**Estado actual**: No hay enlace «saltar al contenido». Sí existe `.screen-reader-text` y foco visible global. `<main>` ya usa `tagName":"main"` en plantillas; IDs varían (`afa-home`, etc.).

**Decision**:
1. Añadir como **primer elemento** de `parts/header.html` un enlace `.afa-skip-link` (extiende `.screen-reader-text`, visible en `:focus`) con texto «Saltar al contenido» (`esc_html__` / traducible si el part no admite PHP → pattern mínimo o HTML estático en español con dominio documentado; preferir HTML en el part alineado al resto del header, cadena en español).
2. Destino canónico: **`#contenido`**.
3. En **todas** las plantillas públicas, el `<main>` debe incluir `id="contenido"` (puede coexistir con clases `afa-*` e ids secundarios si hacen falta; si hay conflicto, `contenido` es el id de skip).

**Rationale**: Un solo skip en la parte header cubre todas las vistas; no duplicar en 18 templates. Cumple 2.4.1 Bypass Blocks.

**Alternatives considered**:
- `wp_body_open` en `functions.php` — válido pero menos visible/editable en FSE.
- Skip solo en `front-page` — no cumple FR-005 («cada vista pública»).
- Depender del skip de un plugin — frágil y fuera del tema.

## R3 — Contraste: matriz de tokens + superficies especiales

**Decision**: Inventariar pares canónicos de `theme.json` (texto sobre `base` / `surface` / `surface-*` / `primary` / `accent` / overlays de Cover) y medir ratios. Corregir en **tokens** si el fallo es global; en CSS/pattern si es local (hero overlay, píldoras, panel azul Hazte socio). Documentar cada cambio en `spec.md` refinamientos + `audit.md`.

**Rationale**: Spec 001 ya corrigió opacidades y azul de botón; hace falta pasada completa (green, muted, overlays).

**Alternatives considered**: Cambiar solo páginas nuevas — incumple alcance transversal. Subir opacidades de nuevo — falla AA (precedente R2/R3 de 001).

## R4 — Teclado, foco y menú overlay

**Estado actual**: `:focus-visible` en `theme.json` (link/button) y refuerzo en `style.css` para `a, button, input, select, textarea, .wp-block-navigation-item__content`.

**Decision**: Validar recorrido Tab en cabecera (nav overlay móvil), buscador, CTAs, query/paginación, details/FAQ, formularios envueltos. Completar selectores de foco si quedan controles del tema sin outline (p. ej. summary, icon buttons). No reinventar el menú core; solo CSS/comportamiento presentacional si hay trampa de foco atribuible al tema.

**Rationale**: FR-004 / US2; el navigation block de core ya gestiona overlay — no reimplementar en JS.

**Alternatives considered**: JS custom de focus trap — riesgo y contradice «sin jQuery / mínimo JS».

## R5 — Landmarks, H1 y lectores de pantalla

**Decision**:
- Mantener `header` / `main` / `footer` con `tagName` semánticos (hoy header/footer en parts; main en templates). El `template-part` puede seguir envuelto en `div` si el hijo ya es `header`/`footer`.
- Auditar **un H1 por vista** (patterns hero vs `post-title`).
- Iconos decorativos: `aria-hidden` / alt vacío (precedente en covers y filtros de `functions.php`); controles con nombre.
- CTAs «Saber más» / «Ver más» repetidos: añadir contexto accesible (texto visually-hidden o `aria-label` con título de ficha) donde la auditoría lo marque.

**Rationale**: FR-006–008; US3.

**Alternatives considered**: Cambiar todos los CTAs a textos únicos visibles — puede chocar con Figma; preferir nombre accesible sin romper diseño salvo que el copy visible sea ambiguo y la junta acepte cambio.

## R6 — `prefers-reduced-motion` y zoom 200 %

**Decision**: Envolver animaciones/transiciones no esenciales del tema (si las hay: transforms, scrolls suaves propios) en `@media (prefers-reduced-motion: reduce)`. Validar zoom 200 % en portada, listado y una página interior; corregir solo desbordes/controles del tema.

**Rationale**: FR-013 / FR-014.

**Alternatives considered**: Eliminar toda transición — innecesario si reduced-motion las anula.

## R7 — Informe de auditoría y clasificación

**Decision**: Plantilla `audit.md` con filas por criterio/página: **pasa / falla / N/A**, clasificación **tema | plugin | editorial**, enlace a remediación. Guía corta en `contracts/guia-editorial-a11y.md`.

**Rationale**: US4 / SC-004–005; separa responsabilidad del tema vs junta/plugins.

**Alternatives considered**: Solo issues en GitHub — peor trazabilidad en el repo SDD. Auditoría solo con axe automatizado — útil como apoyo, no suficiente (teclado, skip, H1 contextual).

## R8 — Tag `accessibility-ready` del tema

**Estado actual**: `style.css` ya declara `Tags: … accessibility-ready`.

**Decision**: Mantener el tag **solo si** al cerrar la feature el quickstart y `audit.md` confirman los requisitos de esta spec. Si quedan fallos «tema» abiertos, quitar el tag hasta remediar (honestidad frente a wordpress.org guidelines).

**Rationale**: El tag implica un nivel de cuidado; no debe quedar como marketing vacío.

## Resolved clarifications

No quedan NEEDS CLARIFICATION en Technical Context. Pendientes de junta en la spec (auditoría externa futura, dueño de la guía) no bloquean el plan.
