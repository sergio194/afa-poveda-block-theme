---
description: "Task list for Sobre nosotros (AFA) implementation"
---

# Tasks: Sobre nosotros (AFA)

**Input**: Design documents from `/specs/003-sobre-nosotros/`

**Prerequisites**: plan.md, spec.md, research.md, data-model.md, contracts/ui-sobre-nosotros.md, quickstart.md

**Tests**: No hay suite automatizada pedida en la spec; validación = `php -l` + checklist de `quickstart.md` + comparación Figma.

**Organization**: Por user story (P1 → P2). Seguir skills `wp-block-themes` y `wp-patterns` (markup de bloques, presets, i18n `afa-poveda`, sin JS custom, sin CPT).

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Puede ir en paralelo (otro archivo, sin depender de tareas incompletas)
- **[Story]**: US1…US4 según spec.md
- Incluir rutas de archivo exactas

## Path Conventions

Raíz del tema block: `templates/`, `patterns/`, `style.css`, `functions.php`, `CHANGELOG.md`

---

## Phase 1: Setup (Shared Infrastructure)

**Purpose**: Preparar changelog y nota de feature sin UI todavía

- [x] T001 [P] Añadir en `CHANGELOG.md` bajo `[Unreleased]` un apartado preparado para 003 (Añadido: página Sobre nosotros / AFA) sin bullets de implementación aún
- [x] T002 [P] Confirmar en `specs/003-sobre-nosotros/quickstart.md` que los pasos editoriales (página slug `afa`, plantilla, menú) siguen alineados con el plan

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Plantilla de página sin H1 duplicado + CSS base; bloquea todas las US

**⚠️ CRITICAL**: No empezar historias hasta completar esta fase

- [x] T003 Crear `templates/page-afa.html`: template-part `header` → `<main class="afa-sobre">` (Group constrained) con **solo** `core/post-content` (layout default/constrained) → template-part `footer`; **sin** `core/post-title`; **sin sidebar** (contrato UI)
- [x] T004 Registrar título legible de plantilla si hace falta (comentario HTML / convención FSE): en Site Editor debe verse como «AFA / Sobre nosotros» al asignar a la página
- [x] T005 Añadir en `style.css` bloque comentado «Sobre nosotros (003)» con selectores base `.afa-sobre` listos para extender por US; solo variables `--wp--preset--*`; justificar por qué hace falta CSS
- [x] T006 Documentar en `specs/003-sobre-nosotros/quickstart.md` (si falta): tras añadir el archivo, reactivar tema o refrescar plantillas si no aparece `page-afa`

**Checkpoint**: Foundation ready — se puede implementar US1–US4

---

## Phase 3: User Story 1 - Entender qué es la AFA (Priority: P1) 🎯 MVP

**Goal**: Hero «Sobre nosotros» + sección «¿Quiénes somos?» editables en el contenido de la página

**Independent Test**: Crear página slug `afa`, plantilla AFA, insertar patterns hero + quiénes somos; en 1280/390 ver H1 único, subtítulo y 3 párrafos; editar texto en la página y ver cambio en front

### Implementation for User Story 1

- [x] T007 [P] [US1] Crear `patterns/sobre-hero.php` (slug `afa-poveda/sobre-hero`): Cover align wide, radio medium, overlay para contraste AA, H1 «Sobre nosotros», subtítulo Figma comunidad de familias; sin imagen fija obligatoria (color `primary`/`accent` de fallback); i18n `afa-poveda`; Category `afa-poveda` / featured
- [x] T008 [P] [US1] Crear `patterns/sobre-quienes-somos.php` (slug `afa-poveda/sobre-quienes-somos`): H2 «¿Quiénes somos?» + 3 párrafos default Figma (asociación sin ánimo de lucro; escuela abierta; comisiones); tokens tipográficos/color `contrast` / `contrast-muted`
- [x] T009 [US1] CSS en `style.css` si hace falta legibilidad Cover (`.afa-sobre-hero`); comentario justificación
- [x] T010 [US1] Actualizar `CHANGELOG.md` `[Unreleased]` → Añadido: hero y quiénes somos de Sobre nosotros
- [x] T011 [US1] Validar: `php -l patterns/sobre-hero.php patterns/sobre-quienes-somos.php`; un solo H1; contraste ≥ 4,5:1; sin bloques inválidos

**Checkpoint**: MVP — página AFA con hero + quiénes somos

---

## Phase 4: User Story 2 - Organigrama (Priority: P1)

**Goal**: Organigrama visual editable (presidencia/vice, secretaría, tesorería, vocales) sin CPT

**Independent Test**: Con pattern insertado, ver grupos y nombres en escritorio; apilado usable en 390; editar un nombre en el editor de la página

### Implementation for User Story 2

- [x] T012 [US2] Crear `patterns/sobre-organigrama.php` (slug `afa-poveda/sobre-organigrama`): H2 «Organigrama» + intro junta; grupos Presidencia/Vicepresidencia (2 cards nombre+rol), Secretaría, Tesorería, Vocales (grid de nombres); defaults Figma curso ejemplo con grafía correcta en español; bloques Group/Columns; clase `.afa-organigrama`; i18n `afa-poveda`
- [x] T013 [US2] CSS en `style.css`: `.afa-organigrama`, `.afa-organigrama__card` (fondo `surface-container`, borde, radio medium, wrap vocales); comentario (theme.json no expresa grid de chips)
- [x] T014 [US2] Actualizar `CHANGELOG.md` `[Unreleased]` (organigrama)
- [x] T015 [US2] Validar: `php -l patterns/sobre-organigrama.php`; nombres largos no desbordan; 390/1280 vs Figma organigrama

**Checkpoint**: US1+US2 — identidad + junta visibles

---

## Phase 5: User Story 3 - Qué hace / Utilidad / Comisiones (Priority: P2)

**Goal**: Lista «¿Qué hace el AFA?» + bloque asimétrico Utilidad | Comisiones

**Independent Test**: Ver 6 actividades; en escritorio 2 columnas Utilidad/Comisiones; en móvil apiladas; comisiones editables incluyen las 7 del diseño

### Implementation for User Story 3

- [x] T016 [P] [US3] Crear `patterns/sobre-que-hace.php` (slug `afa-poveda/sobre-que-hace`): H2 «¿Qué hace el AFA?» + lista (reuniones con el centro, extraescolares/ludoteca, fiestas, becas, Consejo Escolar, escuela verde); i18n `afa-poveda`
- [x] T017 [P] [US3] Crear `patterns/sobre-utilidad-comisiones.php` (slug `afa-poveda/sobre-utilidad-comisiones`): Columns 50/50; H3 «Utilidad de la AFA» + 4 puntos Figma; H3 «Comisiones» + Extraescolares, Becas, Comedor, Huerto, Fiestas, Informática, Lotería; clase `.afa-sobre-utilidad`; i18n `afa-poveda`
- [x] T018 [US3] CSS en `style.css` para `.afa-sobre-utilidad` (gap/cards) solo si Columns no basta; comentario
- [x] T019 [US3] Actualizar `CHANGELOG.md` `[Unreleased]` (qué hace + utilidad/comisiones)
- [x] T020 [US3] Validar: `php -l` en ambos patterns; layout 1280 dos cols / 390 stack

**Checkpoint**: Guía de participación completa

---

## Phase 6: User Story 4 - Documentos y Estatutos (Priority: P2)

**Goal**: Lista de documentos con etiquetas legibles y descarga vía medios WP

**Independent Test**: Con PDF en Medios enlazado, clic abre/descarga sin 404; sin PDF, ítems placeholder sin enlaces muertos

### Implementation for User Story 4

- [x] T021 [US4] Crear `patterns/sobre-documentos.php` (slug `afa-poveda/sobre-documentos`): H2 «Documentos y Estatutos»; lista de 4 ítems con etiquetas legibles (Qué es una AFA, Estatutos, Manual de procedimientos, Parte de disciplina); `core/file` o enlaces a URL de medio placeholder documentados; clase `.afa-docs`; i18n `afa-poveda`
- [x] T022 [US4] CSS en `style.css` para `.afa-docs` (lista vertical, tipografía) si hace falta; comentario
- [x] T023 [US4] Actualizar `CHANGELOG.md` `[Unreleased]` (documentos y estatutos)
- [x] T024 [US4] Validar: `php -l patterns/sobre-documentos.php`; escenario con PDF real y sin archivo

**Checkpoint**: Página institucional completa a nivel de secciones

---

## Phase 7: Polish & Cross-Cutting Concerns

**Purpose**: Pattern compuesto, montaje editorial, QA visual y cierre de spec

- [x] T025 Crear `patterns/sobre-nosotros.php` (slug `afa-poveda/sobre-nosotros`): pattern compuesto que inserta en orden del contrato las 6 secciones (referencias `wp:pattern` o markup concatenado); título/descripción en español para el insertador
- [x] T026 Ejecutar checklist de `specs/003-sobre-nosotros/quickstart.md` (9 escenarios): página `/afa/`, menú AFA, plantilla, un H1, 390/900/1280
- [x] T027 [P] Revisar contraste AA y foco teclado en hero, cards organigrama y enlaces de documentos
- [x] T028 [P] Actualizar tabla de refinamientos en `specs/003-sobre-nosotros/spec.md` si hubo desviaciones nuevas; marcar status de la spec
- [x] T029 Añadir bullet final en `CHANGELOG.md` `[Unreleased]` resumiendo plantilla `page-afa` + pattern compuesto
- [x] T030 Validación final: `php -l` en todos los `patterns/sobre-*.php` y `functions.php` si se tocó; `python3 -m json.tool theme.json > /dev/null` si se tocó theme.json

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: Sin dependencias
- **Foundational (Phase 2)**: Depende de Setup — **BLOQUEA** todas las US
- **US1 (Phase 3)**: Tras Phase 2 — MVP
- **US2 (Phase 4)**: Tras Phase 2; ideal tras US1 para validar en la misma página
- **US3 (Phase 5)**: Tras Phase 2; independiente de US2 a nivel de archivos
- **US4 (Phase 6)**: Tras Phase 2; independiente
- **Polish (Phase 7)**: Tras US1–US4 deseadas (compuesto T025 necesita los 6 patterns)

### User Story Dependencies

- **US1 (P1)**: Tras foundation — sin dependencia de otras stories
- **US2 (P1)**: Tras foundation — archivo propio; se valida insertando bajo US1
- **US3 (P2)**: Tras foundation — paralelo a US2/US4 a nivel de files
- **US4 (P2)**: Tras foundation — paralelo a US2/US3

### Parallel Opportunities

- T001 ∥ T002
- T007 ∥ T008 (tras Phase 2)
- T016 ∥ T017
- Tras Phase 2, distintos agentes pueden hacer US2 / US3 / US4 en paralelo (archivos distintos); cuidado con conflictos en `style.css` y `CHANGELOG.md` (serializar esos)

---

## Parallel Example: User Story 1

```bash
# Tras Phase 2, en paralelo:
Task: "Crear patterns/sobre-hero.php …"
Task: "Crear patterns/sobre-quienes-somos.php …"
# Luego secuencial: CSS hero, changelog, validación php -l
```

## Parallel Example: User Story 3

```bash
Task: "Crear patterns/sobre-que-hace.php …"
Task: "Crear patterns/sobre-utilidad-comisiones.php …"
```

---

## Implementation Strategy

### MVP First (User Story 1 Only)

1. Phase 1 Setup  
2. Phase 2 Foundational (`page-afa.html` + CSS base)  
3. Phase 3 US1 (hero + quiénes somos)  
4. **STOP**: crear página `/afa/`, asignar plantilla, insertar patterns, validar  
5. Demo a la junta si basta el MVP informativo  

### Incremental Delivery

1. Setup + Foundational  
2. US1 → demo MVP  
3. US2 organigrama → transparencia junta  
4. US3 actividades/comisiones → participación  
5. US4 documentos → descargas  
6. Polish: pattern compuesto + quickstart completo  

### Suggested MVP scope

**US1 únicamente** (T001–T011): página AFA usable con mensaje institucional. Organigrama y documentos en siguientes incrementos.

---

## Notes

- [P] = otro archivo, sin depender de tareas incompletas del mismo story salvo CSS/changelog compartidos
- Contenido vive en la **página**, no hardcodeado en la plantilla (research R1/R8)
- Sin CPT, sin formularios, sin JS de terceros
- Tokens solo vía presets; CSS con comentario del porqué
- Commit solo si el usuario lo pide
