---
description: "Task list for WCAG 2.2 AA theme accessibility validation and remediation"
---

# Tasks: Accesibilidad WCAG AA del tema

**Input**: Design documents from `/specs/007-accesibilidad-aa/`

**Prerequisites**: plan.md, spec.md, research.md, data-model.md, contracts/a11y-aa.md, contracts/guia-editorial-a11y.md, audit.md, quickstart.md

**Tests**: No hay suite automatizada pedida en la spec; validación = contraste calculado + teclado + estructura + checklist de `quickstart.md` + `audit.md`. Plugins = clasificación `delegado`, no remediación en el tema.

**Organization**: Por user story (P1 → P2). Seguir constitución V, skills `wp-block-themes` / `wp-patterns`, tokens en `theme.json`, CSS solo justificado.

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Puede ir en paralelo (otro archivo, sin depender de tareas incompletas)
- **[Story]**: US1…US4 según spec.md
- Incluir rutas de archivo exactas

## Path Conventions

Raíz del tema: `templates/`, `parts/`, `patterns/`, `theme.json`, `style.css`, `functions.php`, `CHANGELOG.md`, `specs/007-accesibilidad-aa/`

---

## Phase 1: Setup (Shared Infrastructure)

**Purpose**: Changelog y alinear artefactos de auditoría antes de tocar UI

- [x] T001 [P] Añadir en `CHANGELOG.md` bajo `[Unreleased]` un apartado preparado para 007 (Accesibilidad AA) sin bullets de implementación aún
- [x] T002 [P] Confirmar que `specs/007-accesibilidad-aa/quickstart.md`, `contracts/a11y-aa.md` y `audit.md` siguen alineados con `plan.md` (skip → `#contenido`, clasificación tema|plugin|editorial)
- [x] T003 [P] Anotar fecha de inicio en `specs/007-accesibilidad-aa/audit.md` (cabecera) dejando matriz y hallazgos vacíos listos para rellenar

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Destino de skip + skip link global + CSS base; bloquea US2 y valida FR-005 en todas las vistas

**⚠️ CRITICAL**: No empezar historias de remediación de teclado/estructura hasta completar esta fase. US1 (contraste) puede empezar en paralelo tras T004 si hace falta, pero el checkpoint de foundation incluye skip.

- [x] T004 Unificar destino de skip: en **todas** las plantillas públicas con `<main>`, añadir `id="contenido"` (y `"anchor":"contenido"` en el JSON del Group si aplica), conservando clases `afa-*`; si `front-page.html` tiene `id="afa-home"`, pasar a `id="contenido"` (o `contenido` canónico + documentar en research/audit). Archivos: `templates/front-page.html`, `home.html`, `index.html`, `archive.html`, `search.html`, `single.html`, `page.html`, `page-with-sidebar.html`, `page-afa.html`, `page-servicios.html`, `page-servicio-detalle.html`, `page-hazte-socio.html`, `404.html`
- [x] T005 Añadir en `parts/header.html` como **primer** hijo enfocable el enlace skip: texto «Saltar al contenido», `href="#contenido"`, clases `afa-skip-link screen-reader-text` (o equivalente), español
- [x] T006 Añadir en `style.css` bloque comentado «Accesibilidad AA (007)» con `.afa-skip-link` (oculto hasta `:focus`/`:focus-visible`, visible con contraste AA, `z-index` alto, no recortado por overflow); justificar por qué no va solo en `theme.json`
- [x] T007 Verificar con Tab en portada que el primer foco es el skip y Enter mueve a `#contenido`; anotar resultado provisional en `specs/007-accesibilidad-aa/audit.md` (hallazgo H-001 cerrado si pasa)

**Checkpoint**: Foundation ready — skip + `#contenido` en todas las vistas; US1–US4 pueden avanzar

---

## Phase 3: User Story 1 - Percibir el contenido con contraste suficiente (Priority: P1) 🎯 MVP

**Goal**: Todos los pares de texto/fondo y controles esenciales del tema cumplen umbrales AA (4,5:1 / 3:1), medidos; correcciones en tokens o CSS local; refinamientos Figma documentados

**Independent Test**: Medir pares canónicos de `theme.json` + overlays de heroes (portada, sobre, servicios, hazte); ningún fallo `tema` abierto de contraste en `audit.md`

### Implementation for User Story 1

- [x] T008 [US1] Rellenar tabla «Pares de contraste (tokens)» en `specs/007-accesibilidad-aa/audit.md` midiendo al menos: `contrast`/`contrast-muted` sobre `surface`/`base`/`surface-container`/`surface-high`; `base` sobre `primary`/`accent`/`green`; `primary` (enlace) sobre `surface`; anotar ratio y ¿cumple?
- [x] T009 [P] [US1] Medir contraste efectivo de texto sobre covers/overlays en patterns `patterns/home-hero.php`, `patterns/sobre-hero.php`, `patterns/servicio-hero.php` (y hazte si aplica); registrar hallazgos en `specs/007-accesibilidad-aa/audit.md`
- [x] T010 [US1] Corregir fallos globales de contraste en `theme.json` (presets de color) cuando el ratio falle; preferir color sólido frente a opacidad sobre texto (FR-003)
- [x] T011 [P] [US1] Corregir fallos locales (píldoras, paneles, CSS) en `style.css` y/o patterns afectados; solo variables `--wp--preset--*` salvo justificación
- [x] T012 [US1] Documentar cada desviación Figma→AA en la tabla de refinamientos de `specs/007-accesibilidad-aa/spec.md` (valor anterior → nuevo → ratio)
- [x] T013 [US1] Actualizar `CHANGELOG.md` `[Unreleased]` (Cambiado/Corregido: contraste AA)
- [x] T014 [US1] Validar: `python3 -m json.tool theme.json > /dev/null`; re-medir pares corregidos; marcar celdas Contraste ✅ en matriz de `audit.md` para vistas tocadas

**Checkpoint**: MVP — contraste del tema verificable y corregido

---

## Phase 4: User Story 2 - Navegar solo con teclado (Priority: P1)

**Goal**: Recorrido Tab completo sin trampas; foco visible en todos los controles del tema; menú overlay operable; skip ya entregado en Phase 2

**Independent Test**: Tab/Shift+Tab/Enter/Escape en cabecera (390 + 1280), buscador, CTAs, listados, details/FAQ, formularios envueltos; foco siempre visible

### Implementation for User Story 2

- [x] T015 [US2] Auditar foco en cabecera/nav overlay/buscador/CTA y anotar fallos en `specs/007-accesibilidad-aa/audit.md` (clasificación `tema` si el outline falta o hay trampa)
- [x] T016 [US2] Ampliar selectores de foco en `style.css` (y/o `theme.json` elements) para controles del tema sin outline (p. ej. `summary`, botones de icono, `.wp-block-search__button`, items de paginación) manteniendo outline ≥ 2 px con color que cumpla contraste
- [x] T017 [P] [US2] Revisar teclado en Actualidad (píldoras, «Más categorías», paginación) y Servicios FAQ (`core/details`); corregir CSS en `style.css` solo si el tema rompe el foco nativo
- [x] T018 [US2] Validar menú overlay móvil (~390 px): abrir, recorrer ítems, cerrar sin trampa; documentar en `audit.md`
- [x] T019 [US2] Actualizar `CHANGELOG.md` `[Unreleased]` (foco/teclado)
- [x] T020 [US2] Marcar columna Teclado/foco + Skip en matriz de `audit.md` para vistas del contrato §G

**Checkpoint**: US1+US2 — perceptible y operable por teclado

---

## Phase 5: User Story 3 - Entender la página con lector de pantalla (Priority: P1)

**Goal**: Un H1 por vista; landmarks coherentes; decorativos silenciosos; controles/CTAs con nombre comprensible

**Independent Test**: Árbol de accesibilidad o VoiceOver en portada, una interior, listado, detalle, hazte socio: 1 H1, main/header/footer, sin iconos decorativos engañosos

### Implementation for User Story 3

- [x] T021 [US3] Auditar H1 único y jerarquía en vistas del alcance; listar fallos en `specs/007-accesibilidad-aa/audit.md`; corregir en `templates/*.html` y/o `patterns/*.php` afectados (sin duplicar `post-title` + H1 de pattern)
- [x] T022 [P] [US3] Verificar landmarks: `header` en `parts/header.html`, `footer` en pie, `main#contenido` (Phase 2); corregir `tagName` si alguna plantilla/part lo pierde
- [x] T023 [P] [US3] Revisar iconos/imágenes decorativas vs informativas en patterns de home/sobre/servicios/hazte/noticias; asegurar `alt=""` / `aria-hidden` donde corresponda (reutilizar patrones de `functions.php` si ya existen filtros de cover)
- [x] T024 [US3] Corregir CTAs genéricos repetidos («Ver más», «Saber más») en patterns de listados (servicios, noticias, home): nombre accesible distinto por ítem (`aria-label` o texto `.screen-reader-text` con título de ficha) sin romper Figma salvo aceptación documentada
- [x] T025 [US3] Actualizar `CHANGELOG.md` `[Unreleased]` (estructura / nombres accesibles)
- [x] T026 [US3] Validar: `php -l` en patterns PHP tocados; marcar H1 + Landmarks en matriz de `audit.md`

**Checkpoint**: US1–US3 — perceptible, operable, comprensible en estructura

---

## Phase 6: User Story 4 - Validar y corregir de forma trazable (Priority: P2)

**Goal**: Informe `audit.md` completo con clasificación; hallazgos `tema` cerrados; guía editorial lista para la junta

**Independent Test**: Persona no técnica entiende en ≤ 15 min qué se validó, qué se corrigió y qué queda en plugin/editorial

### Implementation for User Story 4

- [x] T027 [US4] Completar `specs/007-accesibilidad-aa/audit.md`: fecha, resumen conteos, todos los hallazgos con estado `corregido`|`aceptado`|`delegado` según data-model (enum clasificacion: `tema`|`plugin`|`editorial`; severidad: `bloqueante`|`mayor`|`menor`)
- [x] T028 [P] [US4] Clasificar barreras de formularios plugin (Hazte socio / newsletter) como `delegado` en `audit.md` sin remediar vendor; anotar si la envoltura del tema empeora foco/contraste y corregir solo eso en `style.css` / patterns
- [x] T029 [P] [US4] Revisar que `specs/007-accesibilidad-aa/contracts/guia-editorial-a11y.md` esté completa y enlazada desde `audit.md` (cierre) y/o `CHANGELOG.md`
- [x] T030 [US4] Cerrar checklist de cierre en `audit.md` (hallazgos tema, tag `accessibility-ready`, refinamientos spec)
- [x] T031 [US4] Actualizar `CHANGELOG.md` `[Unreleased]` (informe AA + guía editorial)

**Checkpoint**: Cumplimiento demostrable para la junta

---

## Phase 7: Polish & Cross-Cutting Concerns

**Purpose**: Movimiento, zoom, tag, verificación final quickstart

- [x] T032 Añadir en `style.css` `@media (prefers-reduced-motion: reduce)` que anule/minimize transitions/animations no esenciales del tema (aunque hoy haya pocas); comentario de justificación (FR-013)
- [x] T033 Validar zoom 200 % en portada + una página interior (390 y 1280 de partida); corregir desbordes/controles del tema en `style.css` / templates si fallan; anotar en `audit.md`
- [x] T034 Revisar tag `accessibility-ready` en cabecera de `style.css`: mantener solo si `audit.md` no tiene hallazgos `tema` bloqueantes/mayores abiertos (research R8); si no, quitar el tag hasta remediar
- [x] T035 Ejecutar escenarios 1–14 de `specs/007-accesibilidad-aa/quickstart.md` y marcar Done when
- [x] T036 [P] `python3 -m json.tool theme.json > /dev/null` y `php -l functions.php` (si se tocó) + `php -l` en patterns modificados
- [x] T037 [P] Abrir plantillas/parts tocados en Editor del sitio: 0 bloques «no válido»
- [x] T038 Actualizar estado de `specs/007-accesibilidad-aa/spec.md` a Implementada (o parcial) y completar refinamientos pendientes

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: Sin dependencias
- **Foundational (Phase 2)**: Depende de Setup — **bloquea** skip/teclado completo; recomendable antes de US2–US4
- **US1 (Phase 3)**: Puede solaparse con final de Phase 2 (archivos distintos: tokens vs header); ideal tras T003
- **US2 (Phase 4)**: Depende de Phase 2 (skip + `#contenido`)
- **US3 (Phase 5)**: Depende de Phase 2 (landmarks/main id); puede ir en paralelo a US1/US2 en patterns distintos con cuidado
- **US4 (Phase 6)**: Depende de que US1–US3 hayan generado hallazgos/remedios
- **Polish (Phase 7)**: Depende de US4 (informe) + remediaciones previas

### User Story Dependencies

- **US1 (P1)**: Tras Setup (+ opcional Foundation); independiente de US2/US3
- **US2 (P1)**: Tras Foundation (skip)
- **US3 (P1)**: Tras Foundation (`#contenido` / main)
- **US4 (P2)**: Tras US1–US3 (consolida evidencia)

### Parallel Opportunities

- T001–T003 en paralelo
- T008 medición tokens ‖ T009 overlays (tras empezar US1)
- T010 tokens vs T011 CSS local (coordinar si mismo token)
- T022 ‖ T023 en US3
- T028 ‖ T029 en US4
- T036 ‖ T037 en Polish

---

## Parallel Example: User Story 1

```bash
# Tras T008 (tabla tokens iniciada):
Task: "T009 Medir overlays en patterns/home-hero.php, sobre-hero.php, servicio-hero.php → audit.md"
# Tras mediciones, correcciones en archivos distintos:
Task: "T010 Corregir presets en theme.json"
Task: "T011 Corregir fallos locales en style.css / patterns"
```

## Parallel Example: User Story 3

```bash
Task: "T022 Verificar landmarks en parts/header.html y templates"
Task: "T023 Revisar alt/aria-hidden en patterns home/sobre/servicios/hazte/noticias"
```

---

## Implementation Strategy

### MVP First (User Story 1 Only)

1. Phase 1 Setup
2. Phase 2 Foundational (skip — también desbloquea demos de teclado)
3. Phase 3 US1 contraste → **STOP y validar** pares + `audit.md` parcial
4. Demo a junta: «los colores cumplen AA»

### Incremental Delivery

1. Setup + Foundation → skip usable en todo el sitio
2. US1 → contraste
3. US2 → teclado/foco
4. US3 → estructura/nombres
5. US4 → informe + guía
6. Polish → motion, zoom, tag, quickstart completo

### Parallel Team Strategy

- A: US1 (theme.json / contraste)
- B: Phase 2 + US2 (header skip / foco)
- C: US3 (patterns H1 / aria)
- Juntos: US4 + Polish

---

## Notes

- [P] = otro archivo / sin dependencia de tarea incompleta
- Hallazgos `plugin`/`editorial` → `delegado` en `audit.md`, no inflar el tema
- AA gana sobre Figma: siempre anotar refinamiento en `spec.md`
- No añadir JS de terceros ni focus-trap custom (research R4)
- Commit por historia o grupo lógico si el usuario lo pide
