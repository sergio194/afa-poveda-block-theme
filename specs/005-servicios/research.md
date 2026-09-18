# Research: Servicios AFA (listado y detalle)

**Feature**: `005-servicios` | **Date**: 2026-09-18

## R1 — Páginas estáticas + patterns (no CPT)

**Decision**: El listado `/servicios/` y cada detalle (p. ej. `/servicios/comedor-escolar/`) son páginas WP. El contenido se monta con patterns PHP (`servicios-*`, `servicio-*`), igual que Sobre nosotros (003). El tema no registra CPT «servicio» ni taxonomías.

**Rationale**: Constitución III y IV. Los servicios cambian poco (6 en Figma); la junta edita textos, fotos y enlaces en el Editor. Un CPT añadiría registro en el tema o un plugin sin ganancia clara para v1.

**Follow-up (2026-09-18)**: Confirmado dejar v1 así. Más adelante un plugin registrará CPT para **Servicios** y **Extraescolares**; el tema solo plantillas/`Query`. Migración páginas → CPT fuera de esta feature.

**Alternatives considered**:
- CPT + Query Loop — más flexible a largo plazo; aplazado a plugin (no en el tema).
- Solo `page.html` genérica con `post-title` — duplica H1 (mismo problema resuelto en 003 con plantilla dedicada).

## R2 — Plantillas `page-servicios` y `page-servicio-detalle`

**Decision**: Dos plantillas de página sin `core/post-title`:
- `page-servicios.html` — clase wrapper `.afa-servicios` (hub).
- `page-servicio-detalle.html` — clase `.afa-servicio-detalle` (detalle).

Ambas: header + `main` constrained con `post-content` align full + footer. Asignación editorial: plantilla en el editor de cada página.

**Rationale**: Separar clases CSS evita que estilos del hub contaminen el detalle (hero cover, sidebar). Precedente `page-afa.html`.

**Alternatives considered**:
- Una sola plantilla — viable pero CSS más frágil.
- Contenido en la plantilla (no en la página) — menos editable por voluntarios (constitución IV).

## R3 — Fichas del listado: markup editorial, no Query

**Decision**: Pattern `servicios-grid` con seis `group`/`columns` cards (imagen, píldora categoría, título, descripción, meta icono+etiqueta, enlace «Ver más»). Defaults según Figma escritorio (R1–R2 de la spec). La junta puede borrar o duplicar cards en el contenido.

**Rationale**: Spec asume 6 servicios del mock; sin CPT no hay query. Patterns compuestos + cards editables cumplen SC-004.

**Alternatives considered**:
- Query de páginas hijas — elegante, pero exige convención de metadatos (imagen/etiqueta) vía custom fields o bloques en cada hija; más complejidad en v1.
- Navigation block como grid — no encaja con foto + descripción.

## R4 — FAQ con `core/details` (sin JS)

**Decision**: Pattern `servicio-faq` usa bloques `core/details` (HTML `<details>`/`<summary>`). Primera pregunta abierta por defecto si el bloque lo permite; resto cerradas. Sin acordeón JS ni plugin.

**Rationale**: Constitución VI (sin scripts de terceros / sin jQuery). Accesible por teclado de forma nativa. WP ≥ 6.3 incluye el bloque; el mínimo del tema es 7.1.

**Alternatives considered**:
- Grupo + CSS-only hack con checkbox — frágil y peor a11y.
- Plugin FAQ — lógica fuera del alcance y dependencia.

## R5 — Layout detalle: columns + stack móvil

**Decision**: En el contenido del detalle (o pattern compuesto): `core/columns` ~65 % / ~35 % (contenido | inscripción + documentación). En anchos estrechos, columns de core apilan. Sidebar **no** requiere `position: sticky` en v1; si se añade, solo CSS en `.afa-servicio-aside` sin JS (spec R6).

**Rationale**: Coincide con Figma escritorio; móvil apila inscripción debajo (spec US2). Sticky opcional para no bloquear si el aside es más alto que el viewport.

**Alternatives considered**:
- Template part sticky global — acopla todos los detalles.
- Dos páginas distintas desktop/móvil — inmantenible.

## R6 — Descargas y documentación

**Decision**: Menús y docs como `core/file` o enlaces a medios (mismo patrón que `sobre-documentos.php`). Placeholders iniciales pueden apuntar a `#` o a PDFs de ejemplo en `assets/` documentados en quickstart; la junta sustituye por medios reales. Tamaño de archivo: visible si `core/file` lo muestra; si no, omitir (spec: tamaño opcional).

**Rationale**: Constitución III (medios WP, no lógica de generación de PDF). Precedente 003.

**Alternatives considered**: Hardcodear URLs externas — peor para RGPD/mantenimiento. Shortcode de plugin de menús — fuera de alcance.

## R7 — Inscripción = botón enlace, no formulario

**Decision**: Pattern `servicio-inscripcion`: precios, badge descuento, horario, `core/button` «Inscribirse Ahora» con URL configurable (default Contacto `/contacto/` o `#` documentado hasta existir la feature Inscripción). Nota de matrícula editable.

**Rationale**: Spec FR-011 y constitución III. El frame Inscripción del Figma es otra feature.

**Alternatives considered**: Embebido Gravity Forms / shortcode en el tema — acopla plugin. Formulario HTML en el pattern — lógica de negocio en el tema.

## R8 — Hero del detalle: `core/cover`

**Decision**: `servicio-hero` con `core/cover` a ancho completo (o wide), overlay oscuro suficiente para contraste AA del título blanco, badge «Servicio Destacado» (`soft-green`/`green` o estilo píldora), H1 y subtítulo. Imagen placeholder local vía `get_theme_file_uri` en el pattern.

**Rationale**: Mismo patrón que heroes de 002/003. Contraste verificable (constitución V).

**Alternatives considered**: Imagen + texto absoluto solo CSS — más frágil en el editor.

## R9 — Indicadores nutricionales

**Decision**: Cuatro celdas en grid/columns (`.afa-servicio-stat`) con valor coloreado vía clases de color de preset o clases CSS mapeadas a tokens (`primary`, `green`, y acentos justificados en `style.css` si no hay token ámbar/rojo — documentar desviación o reutilizar `accent` / `contrast` si el contraste falla). Sin charts JS.

**Rationale**: Datos estáticos de Figma; editables como texto. Evitar hex sueltos en markup si existe preset.

**Alternatives considered**: Imagen exportada del mock — no editable. Chart library — JS prohibido.

## R10 — Menú activo en hijas de Servicios

**Decision**: Ítem de navegación «Servicios» → `/servicios/`. Comprobar `current-page-ancestor` en páginas hijas; si WP no marca el ancestro, añadir filtro mínimo en `functions.php` (como se documentó en 004 para noticias) acotado a la página Servicios y sus descendientes.

**Rationale**: Spec edge case / refinamiento R4. Precedente 004 R11.

**Alternatives considered**: CSS genérico `body.page .menu` — demasiado amplio. Forzar todas las URLs planas sin jerarquía — peor IA/UX.

## R11 — Copy e i18n unificados

**Decision**: Defaults de patterns en español con `esc_html_e` / `esc_html__` dominio `afa-poveda`. Copy canónico = escritorio (spec R1–R2, R8). CTA listado: «Contactar ahora» + «Preguntas frecuentes». Enlace ficha: «Ver más».

**Rationale**: Constitución VII; evita dos copys móvil/desktop.

## Resolved clarifications

No quedan ítems NEEDS CLARIFICATION abiertos del Technical Context. Decisiones de producto tomadas por defecto en Assumptions de la spec (slug, plantilla Comedor como referencia, CTA externo).
