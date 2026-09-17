---
description: "Task list for Actualidad y Eventos (Noticias) implementation"
---

# Tasks: Actualidad y Eventos (Noticias)

**Input**: Design documents from `/specs/004-actualidad-eventos/`

**Prerequisites**: plan.md, spec.md, research.md, data-model.md, contracts/ui-actualidad-eventos.md, quickstart.md

**Tests**: No hay suite automatizada pedida en la spec; validación = `php -l` + checklist de `quickstart.md` + comparación Figma (390 / 900 / 1280).

**Organization**: Por user story (P1 → P3). Seguir skills `wp-block-themes` y `wp-patterns` (markup de bloques, presets, i18n `afa-poveda`, sin JS custom, sin CPT ni taxonomías registradas por el tema).

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Puede ir en paralelo (otro archivo, sin depender de tareas incompletas)
- **[Story]**: US1…US5 según spec.md
- Incluir rutas de archivo exactas

## Path Conventions

Raíz del tema block: `templates/`, `patterns/`, `style.css`, `functions.php`, `CHANGELOG.md`

---

## Phase 1: Setup (Shared Infrastructure)

**Purpose**: Preparar changelog y alinear la guía editorial sin UI todavía

- [x] T001 [P] Añadir en `CHANGELOG.md` bajo `[Unreleased]` un apartado preparado para 004 (archivo Actualidad y Eventos / noticias) sin bullets de implementación aún
- [x] T002 [P] Confirmar en `specs/004-actualidad-eventos/quickstart.md` que los pasos editoriales (página slug `noticias`, Lectura = 6 entradas/página, menú «Noticias») siguen alineados con `specs/004-actualidad-eventos/plan.md` y `specs/004-actualidad-eventos/data-model.md`

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Cascarón de archivo a una columna + namespace CSS; bloquea todas las US

**⚠️ CRITICAL**: No empezar historias hasta completar esta fase

- [x] T003 Reescribir `templates/home.html`: template-part `header` → `<main class="afa-news">` (Group constrained/wide) **sin** `parts/sidebar` y **sin** `core/query-title` como H1 → template-part `footer`; dejar `main` listo para patterns (contrato UI A)
- [x] T004 Alinear `templates/index.html` al mismo cascarón de una columna que `templates/home.html` (fallback sin sidebar)
- [x] T005 Añadir en `style.css` bloque comentado «Actualidad y Eventos (004)» con selectores base `.afa-news`, `.afa-news-card`, `.afa-news-toolbar`, `.afa-news-pagination` listos para extender por US; solo variables `--wp--preset--*`; justificar por qué hace falta CSS (píldoras activas, scroll, placeholder 16:9, paginación Figma)
- [x] T006 Anotar en `specs/004-actualidad-eventos/quickstart.md` (si falta): tras cambiar plantillas, restablecer personalizaciones de `home` / `archive` / `single` / `search` guardadas en BD

**Checkpoint**: Foundation ready — se puede implementar US1–US5

---

## Phase 3: User Story 1 - Recorrer el archivo de actualidad (Priority: P1) 🎯 MVP

**Goal**: Hero «Actualidad y Eventos» + grid de fichas (imagen o marcador, categoría, fecha, título, extracto, «Leer más») con paginación, 3 columnas en escritorio y lista en móvil

**Independent Test**: Página de entradas `/noticias/` con ≥ 8 posts; en 1280 ver H1 + hasta 6 fichas 3×2 + paginación sin sidebar; en 390 apilado sin desborde; publicar una entrada y verla en el archivo

### Implementation for User Story 1

- [x] T007 [P] [US1] Crear `patterns/noticias-hero.php` (slug `afa-poveda/noticias-hero`): eyebrow default «Archivo de noticias» (`is-style-afa-eyebrow` o `soft-green`/`green`); H1 **único** «Actualidad y Eventos»; párrafo de apoyo canónico «Toda la información relevante de nuestra comunidad escolar organizada para que no te pierdas nada.»; i18n `afa-poveda`; categoría `afa-poveda`
- [x] T008 [P] [US1] Crear `patterns/noticias-grid.php` (slug `afa-poveda/noticias-grid`): `core/query` **`inherit: true`** (6 por página vía Lectura, no `perPage` fijo); `post-template` grid `columnCount: 3`; card `.afa-news-card is-style-afa-card` con imagen 16:9 enlace, `post-terms` categoría + `post-date` (fecha visible), título nivel 3 enlace, extracto, «Leer más»; `query-pagination` números+flechas clase `.afa-news-pagination`; `query-no-results` «No hay noticias que mostrar todavía.»; i18n `afa-poveda`
- [x] T009 [US1] CSS en `style.css` para `.afa-news-card` (altura igualada, clamp título 2 líneas / extracto 3, media `aspect-ratio: 16 / 9`, placeholder `surface-high` si no hay `img`) y `.afa-news-pagination` (centrada, página actual `primary`/`accent` + texto `base`); 1 columna &lt; ~782 px; comentario de justificación
- [x] T010 [US1] Insertar en `templates/home.html` y `templates/index.html` los patterns `afa-poveda/noticias-hero` y `afa-poveda/noticias-grid` dentro de `.afa-news` (aún sin toolbar)
- [x] T011 [US1] Actualizar `CHANGELOG.md` `[Unreleased]` → Añadido: archivo Actualidad y Eventos (hero + grid)
- [x] T012 [US1] Validar: `php -l patterns/noticias-hero.php patterns/noticias-grid.php`; un solo H1; 6 fichas; sin bloques inválidos al abrir `home` en el Editor del sitio

**Checkpoint**: MVP — `/noticias/` usable como archivo Figma (sin filtros todavía)

---

## Phase 4: User Story 2 - Leer una noticia completa (Priority: P1)

**Goal**: Ficha de detalle con migas, H1, fecha (autor opcional), imagen y cuerpo; sin aside de blog 001

**Independent Test**: Pulsar «Leer más» en una ficha; ver migas Inicio › Noticias › …, artículo legible en 1280 y 390; editar el cuerpo en el editor y verlo en front

### Implementation for User Story 2

- [x] T013 [US2] Reescribir `templates/single.html`: header + `main.afa-news-single` **sin** `parts/sidebar`; migas `.afa-news-crumbs` (enlaces Inicio `/` y Noticias `/noticias/`, título actual **no** es H1); `core/post-title` nivel 1; byline con fecha **obligatoria** y autor opcional; imagen destacada radio medium; `core/post-content`; `post-terms` de categoría real; columnas ~66/33 reservando la derecha para relacionadas (query placeholder `afa-related-news` permitido; filtro PHP en US5)
- [x] T014 [US2] CSS en `style.css` para `.afa-news-crumbs` (separadores, contraste), byline y stack móvil de columnas del detalle; comentario de justificación
- [x] T015 [US2] Actualizar `CHANGELOG.md` `[Unreleased]` (detalle de noticia)
- [x] T016 [US2] Validar `templates/single.html`: detalle sin sidebar; un H1 (el de la entrada); teclado en migas; 390/1280 vs frames 19:2503 / 20:2629

**Checkpoint**: US1+US2 — archivo y lectura completa (relacionadas aún genéricas)

---

## Phase 5: User Story 3 - Filtrar por categoría (Priority: P2)

**Goal**: Píldoras Todas + categorías nativas; listado filtrado al recargar el archivo de categoría, con la activa marcada

**Independent Test**: Con noticias en ≥ 3 categorías (conjunto inicial editorial: Comunidad, Deportes, Cultura, Servicios, AFA), pulsar una píldora y «Todas»; categoría vacía muestra mensaje de vacío

### Implementation for User Story 3

- [x] T017 [US3] Crear `patterns/noticias-toolbar.php` (slug `afa-poveda/noticias-toolbar`): píldora «Todas» → `/noticias/`; `core/categories` lista plana sin recuentos (la junta crea los términos; el tema **no** registra taxonomías); campo `core/search` placeholder «Buscar noticias…» (mismo destino nativo; piel de resultados en US4); clase `.afa-news-toolbar`; i18n `afa-poveda`
- [x] T018 [US3] CSS en `style.css` para `.afa-news-toolbar`: escritorio fila (píldoras izq / buscar dcha); móvil columna y chips `overflow-x: auto`; activa (`body.blog` / `.current-cat`) fondo `primary` o `accent` + texto `base`; inactiva `surface-container`/`primary-soft` con contraste ≥ 4,5:1; comentario
- [x] T019 [US3] Reescribir `templates/archive.html` al mismo orden que el archivo (hero + toolbar + grid, sin sidebar, query inherit) e insertar `afa-poveda/noticias-toolbar` también en `templates/home.html` y `templates/index.html` entre hero y grid
- [x] T020 [US3] Actualizar `CHANGELOG.md` `[Unreleased]` (filtros de categoría)
- [x] T021 [US3] Validar: `php -l patterns/noticias-toolbar.php`; «Todas» y una categoría; `aria-current` o `.current-cat`; sin JS

**Checkpoint**: Filtrar recarga listado de categoría sin cambiar de piel

---

## Phase 6: User Story 4 - Buscar una noticia (Priority: P2)

**Goal**: Resultados de búsqueda con las mismas fichas y vacío amable

**Independent Test**: Buscar un término con acierto y otro inexistente desde el archivo; fichas iguales al grid; mensaje de vacío con vía a `/noticias/`

### Implementation for User Story 4

- [x] T022 [US4] Reescribir `templates/search.html`: mismo layout hero + toolbar + `afa-poveda/noticias-grid` (query inherit) **sin sidebar**; no sustituir el H1 del hero por `query-title` (contexto de búsqueda como subtítulo o `.screen-reader-text` si hace falta)
- [x] T023 [US4] Ajustar vacío de búsqueda en `patterns/noticias-grid.php` (o `query-no-results` condicionado) para término sin coincidencias: mensaje amable + enlace a `/noticias/`; i18n `afa-poveda`
- [x] T024 [US4] CSS en `style.css` si el `core/search` del toolbar necesita radio/borde `outline` alineado a Figma; comentario
- [x] T025 [US4] Actualizar `CHANGELOG.md` `[Unreleased]` (búsqueda de noticias)
- [x] T026 [US4] Validar: acierto y vacío; foco visible en el campo; `php -l patterns/noticias-grid.php`

**Checkpoint**: Buscar y filtrar conviven con el mismo tipo de ficha

---

## Phase 7: User Story 5 - Noticias relacionadas (Priority: P3)

**Goal**: Hasta 3 relacionadas (misma categoría, excluir actual) al lado en escritorio y debajo en móvil

**Independent Test**: Abrir un detalle con otras publicadas en la misma categoría; cada relacionada abre su ficha; si no hay, sección oculta o no-results sin huecos rotos

### Implementation for User Story 5

- [x] T027 [US5] Completar en `templates/single.html` el Query Loop `.afa-related-news`: `inherit: false`, `perPage: 3`, `postType: post`; ficha con categoría + título enlace (miniatura opcional); título de bloque «Noticias relacionadas»; `query-no-results` discreto
- [x] T028 [US5] Añadir en `functions.php` filtro `query_loop_block_query_vars` acotado a bloques con clase `afa-related-news` y `is_singular('post')`: `post__not_in` = ID actual; `category__in` = categorías de la entrada (si 0 categorías, solo excluir actual); **no** registrar CPT ni taxonomías
- [x] T029 [US5] CSS en `style.css` para `.afa-related-news` (cards compactas, stack móvil); comentario
- [x] T030 [US5] Actualizar `CHANGELOG.md` `[Unreleased]` (noticias relacionadas)
- [x] T031 [US5] Validar: `php -l functions.php`; relacionadas ≠ actual; 0 relacionadas no rompe layout

**Checkpoint**: Recorrido archivo → detalle → relacionada cerrado

---

## Phase 8: Polish & Cross-Cutting Concerns

**Purpose**: QA visual, menú activo, deprecar listado viejo, cierre de spec

- [x] T032 Dejar de usar `patterns/posts-list.php` en `templates/home.html`, `templates/archive.html`, `templates/search.html` e `templates/index.html` (retirar del inserter o documentar deprecación en la cabecera del pattern)
- [x] T033 Ejecutar los 14 escenarios de `specs/004-actualidad-eventos/quickstart.md` a 390 / 900 / 1280; confirmar que portada 002 «Ver noticias» sigue en `/noticias/` y que `templates/front-page.html` no se modificó
- [x] T034 [P] Revisar contraste AA (≥ 4,5:1) y foco teclado en píldoras, paginación, buscar, migas y «Leer más» usando tokens de `theme.json` y reglas de `style.css` (sin hex sueltos)
- [x] T035 [P] Actualizar tabla de refinamientos en `specs/004-actualidad-eventos/spec.md` si hubo desviaciones nuevas (p. ej. menú activo en categoría/detalle); marcar status de la spec
- [x] T036 Añadir bullet final en `CHANGELOG.md` `[Unreleased]` resumiendo plantillas `home`/`archive`/`search`/`single` + patterns `noticias-*`
- [x] T037 Validación final: `php -l` en `patterns/noticias-*.php` y `functions.php`; `python3 -m json.tool theme.json > /dev/null` si se tocó `theme.json`

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: Sin dependencias
- **Foundational (Phase 2)**: Depende de Setup — **BLOQUEA** todas las US
- **US1 (Phase 3)**: Tras Phase 2 — MVP
- **US2 (Phase 4)**: Tras Phase 2; se valida mejor con US1 (enlace «Leer más»)
- **US3 (Phase 5)**: Tras US1 (reutiliza hero + grid en `archive.html`)
- **US4 (Phase 6)**: Tras US1 (mismo grid); toolbar ya incluye buscar desde US3
- **US5 (Phase 7)**: Tras US2 (`single.html` + columna relacionadas)
- **Polish (Phase 8)**: Tras las US deseadas

### User Story Dependencies

- **US1 (P1)**: Tras foundation — sin dependencia de otras stories
- **US2 (P1)**: Tras foundation — archivo propio; el recorrido completo necesita US1
- **US3 (P2)**: Tras US1 (inserta toolbar en home + archive)
- **US4 (P2)**: Tras US1; ideal tras US3 (toolbar con search)
- **US5 (P3)**: Tras US2

### Parallel Opportunities

- T001 ∥ T002
- T007 ∥ T008 (tras Phase 2)
- Tras US1, un agente puede hacer US2 (`single.html`) mientras otro prepara `noticias-toolbar.php` (T017) — serializar `style.css` y `CHANGELOG.md`
- T034 ∥ T035 en polish

---

## Parallel Example: User Story 1

```bash
# Tras Phase 2, en paralelo:
Task: "Crear patterns/noticias-hero.php …"
Task: "Crear patterns/noticias-grid.php …"
# Luego secuencial: CSS cards, insertar en home.html/index.html, changelog, php -l
```

## Parallel Example: Detalle vs toolbar

```bash
# Tras US1, archivos distintos:
Task: "Reescribir templates/single.html …"          # US2
Task: "Crear patterns/noticias-toolbar.php …"       # US3
# No paralelizar style.css ni CHANGELOG.md
```

---

## Implementation Strategy

### MVP First (User Story 1 Only)

1. Phase 1 Setup
2. Phase 2 Foundational (`home.html` / `index.html` sin sidebar + CSS base)
3. Phase 3 US1 (hero + grid)
4. **STOP**: Lectura → página de entradas `noticias`, 6 por página; validar `/noticias/`
5. Demo a la junta si basta el archivo

### Incremental Delivery

1. Setup + Foundational
2. US1 → demo MVP archivo
3. US2 detalle → se puede leer una noticia
4. US3 filtros → píldoras
5. US4 búsqueda → resultados
6. US5 relacionadas
7. Polish: quickstart 14 escenarios + spec

### Suggested MVP scope

**US1 únicamente** (T001–T012): archivo `/noticias/` con fichas y paginación. Detalle, filtros y búsqueda en incrementos siguientes.

---

## Notes

- [P] = otro archivo, sin depender de tareas incompletas del mismo story salvo CSS/changelog compartidos
- Query del archivo **`inherit: true`**; 6 por página es ajuste de Lectura (data-model: PaginaEntradas)
- Categorías las crea el voluntariado; conjunto inicial Comunidad, Deportes, Cultura, Servicios, AFA
- Sin CPT, sin `register_taxonomy`, sin JS de filtro
- Tokens solo vía presets; CSS con comentario del porqué
- No tocar `templates/front-page.html`
- Commit solo si el usuario lo pide
