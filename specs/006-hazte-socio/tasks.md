---
description: "Task list for Hazte Socio landing implementation"
---

# Tasks: Hazte Socio

**Input**: Design documents from `/specs/006-hazte-socio/`

**Prerequisites**: plan.md, spec.md, research.md, data-model.md, contracts/ui-hazte-socio.md, quickstart.md

**Tests**: No hay suite automatizada pedida en la spec; validación = `php -l` + checklist de `quickstart.md` + comparación Figma (390 / 900 / 1280). Formulario real = plugin (fuera del tema).

**Organization**: Por user story (P1 → P2). Seguir skills `wp-block-themes` y `wp-patterns` (markup de bloques, presets, i18n `afa-poveda`, sin JS custom, sin CPT ni formularios en el tema).

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Puede ir en paralelo (otro archivo, sin depender de tareas incompletas)
- **[Story]**: US1…US5 según spec.md
- Incluir rutas de archivo exactas

## Path Conventions

Raíz del tema block: `templates/`, `patterns/`, `style.css`, `theme.json`, `CHANGELOG.md`, `parts/header.html`

---

## Phase 1: Setup (Shared Infrastructure)

**Purpose**: Preparar changelog y alinear la guía editorial sin UI todavía

- [x] T001 [P] Añadir en `CHANGELOG.md` bajo `[Unreleased]` un apartado preparado para 006 (Hazte Socio — landing) sin bullets de implementación aún
- [x] T002 [P] Confirmar en `specs/006-hazte-socio/quickstart.md` que los pasos (slug `hazte-socio`, plantilla, CTA cabecera → `/hazte-socio/`, hueco plugin) siguen alineados con `specs/006-hazte-socio/plan.md` y `specs/006-hazte-socio/data-model.md`
- [x] T003 [P] Verificar en `parts/header.html` que el botón «Hazte socio» apunta a `/hazte-socio/` (ya cableado; no rediseñar cabecera)

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Plantilla de página sin H1 duplicado + registro en theme.json + namespace CSS; bloquea todas las US

**⚠️ CRITICAL**: No empezar historias hasta completar esta fase

- [x] T004 Crear `templates/page-hazte-socio.html`: template-part `header` → `<main class="afa-hazte">` (Group constrained) con **solo** `core/post-content` (`align":"full"`, layout constrained) → template-part `footer`; **sin** `core/post-title`; **sin sidebar** (contrato UI)
- [x] T005 Registrar en `theme.json` → `customTemplates`: `{ "name": "page-hazte-socio", "title": "Hazte Socio", "postTypes": ["page"] }`
- [x] T006 Añadir en `style.css` bloque comentado «Hazte Socio (006)» con selectores base `.afa-hazte`, `.afa-hazte-hero`, `.afa-hazte-actividad`, `.afa-hazte-pertenecer`, `.afa-hazte-form`, `.afa-hazte-ayuda`, `.afa-hazte-dudas` listos para extender por US; solo variables `--wp--preset--*` salvo justificación; comentar por qué hace falta CSS (hero columns, grid fichas, bloque cuota|form, estilos genéricos de inputs del plugin)
- [x] T007 Documentar en `specs/006-hazte-socio/quickstart.md` (si falta): tras añadir plantilla, reactivar tema / restablecer personalizaciones de página en BD

**Checkpoint**: Foundation ready — se puede implementar US1–US5

---

## Phase 3: User Story 1 - Entender qué es hacerse socio/a (Priority: P1) 🎯 MVP

**Goal**: Hero con eyebrow «Únete a nuestra familia», H1 «Hazte Socia/o», texto, CTAs (anclas) e ilustración; layout 2 cols escritorio / stack móvil

**Independent Test**: Página slug `hazte-socio`, plantilla «Hazte Socio», pattern hero; en 1280 texto+ilustración; en 390 apilado sin desborde; un solo H1; CTA primario apunta a `#pertenecer` (aunque la sección aún no exista, el ancla queda lista)

### Implementation for User Story 1

- [x] T008 [US1] Crear `patterns/hazte-hero.php` (slug `afa-poveda/hazte-hero`): eyebrow default «Únete a nuestra familia» (`is-style-afa-eyebrow` o `soft-green`/`green`); H1 **único** «Hazte Socia/o»; párrafo de apoyo AFA/CEIP Padre Poveda; botones «Formulario de inscripción» → `#pertenecer` y «Saber más» → `#que-hacemos`; ilustración placeholder `get_theme_file_uri` o medio; columns ~50/50 clase `.afa-hazte-hero`; i18n `afa-poveda`; Categories `featured`, `afa-poveda`
- [x] T009 [US1] CSS en `style.css` para `.afa-hazte-hero` (media `aspect-ratio` estable, stack &lt; ~782 px, CTAs); comentario de justificación
- [x] T010 [US1] Actualizar `CHANGELOG.md` `[Unreleased]` → Añadido: hero Hazte Socio
- [x] T011 [US1] Validar: `php -l patterns/hazte-hero.php`; un solo H1; contraste AA; sin bloques inválidos en Editor

**Checkpoint**: MVP — hero usable; anclas preparadas

---

## Phase 4: User Story 2 - Ver qué hace la AFA con la cuota (Priority: P1)

**Goal**: Sección `#que-hacemos` con H2, intro y 6 fichas (Extraescolares, Comedor Escolar, Carrera Solidaria, Feria del Libro, Ludoteca, Voz y Participación)

**Independent Test**: Pattern insertado; 3×2 en 1280; columna en 390; textos editables; ancla `#que-hacemos` alcanzable desde «Saber más»

### Implementation for User Story 2

- [x] T012 [US2] Crear `patterns/hazte-que-hacemos.php` (slug `afa-poveda/hazte-que-hacemos`): Group con `anchor`/`id` `que-hacemos`; H2 «¿Qué hacemos por el cole?»; párrafo intro cuota; 6 cards `.afa-hazte-actividad` (icono + título + descripción) en columns 3×2; defaults canónicos escritorio (Feria del Libro, no «Fiesta»); i18n `afa-poveda`
- [x] T013 [US2] Añadir iconos SVG mínimos en `assets/icons/` si faltan para las 6 fichas (o reutilizar existentes); `alt=""` / decorativos
- [x] T014 [US2] CSS en `style.css` para `.afa-hazte-actividad` (radio medium, gap, 1 col móvil); comentario
- [x] T015 [US2] Actualizar `CHANGELOG.md` `[Unreleased]` (sección qué hacemos)
- [x] T016 [US2] Validar: `php -l patterns/hazte-que-hacemos.php`; 6 fichas; 390/1280

**Checkpoint**: US1+US2 — valor de la cuota visible

---

## Phase 5: User Story 3 - Conocer la cuota y solicitar el alta (Priority: P1)

**Goal**: Bloque `#pertenecer` con cuota 45€ (editable), ≥3 beneficios, y hueco `.afa-hazte-form` (fallback Contacto **o** shortcode/bloque plugin — **sin** `<form>` falso en el tema)

**Independent Test**: Ancla desde hero; cuota + checklist visibles; sin plugin = fallback claro; con plugin (montaje editorial) = campos Nombre tutor/a, DNI/NIE, Email (+ privacidad) y envío

### Implementation for User Story 3

- [x] T017 [US3] Crear `patterns/hazte-pertenecer.php` (slug `afa-poveda/hazte-pertenecer`): Group `id`/`anchor` `pertenecer` clase `.afa-hazte-pertenecer`; columns ~50/50 — izquierda fondo `primary` (H2 «¿Cómo pertenecer?», importe default «45€ CUOTA ANUAL POR FAMILIA» editable, checklist ≥3 beneficios con check); derecha `.afa-hazte-form` con **fallback** párrafo + enlace `/contacto/` (mensaje: formulario se activará / contactar) y nota de pago por email; **prohibido** inputs HTML que no envían; documentar en comentario del pattern que la junta sustituye el fallback por el bloque del plugin; i18n `afa-poveda`
- [x] T018 [US3] CSS en `style.css` para `.afa-hazte-pertenecer` (stack móvil), contraste texto `base` sobre `primary`, `.afa-hazte-form` (padding; selectores genéricos `input`/`textarea`/`button`/`label` del plugin con tokens); comentario justificación (theme.json no estiliza forms de terceros)
- [x] T019 [US3] Actualizar `specs/006-hazte-socio/quickstart.md` con checklist de campos del plugin: Nombre del tutor/a, DNI/NIE, Email, checkbox privacidad; botón «Enviar Solicitud de Alta»
- [x] T020 [US3] Actualizar `CHANGELOG.md` `[Unreleased]` (bloque pertenecer + hueco form)
- [x] T021 [US3] Validar: `php -l patterns/hazte-pertenecer.php`; ancla desde hero; fallback sin form falso; contraste AA en panel azul

**Checkpoint**: Conversión principal (cáscara lista; plugin = montaje editorial)

---

## Phase 6: User Story 4 - Ver cómo ayudar (Priority: P2)

**Goal**: Sección «¿Cómo puedes ayudar?» con intro y 3 vías (Colaboración puntual, Tus habilidades, Comisiones de trabajo)

**Independent Test**: 3 cards en fila (1280) / apiladas (390); títulos canónicos escritorio

### Implementation for User Story 4

- [x] T022 [US4] Crear `patterns/hazte-ayudar.php` (slug `afa-poveda/hazte-ayudar`): H2 «¿Cómo puedes ayudar?»; intro; 3 cards `.afa-hazte-ayuda` con icono circular + título + descripción (Colaboración puntual; Tus habilidades — no «Iniciativas»; Comisiones de trabajo); i18n `afa-poveda`
- [x] T023 [US4] CSS en `style.css` para `.afa-hazte-ayuda` (icono circular, stack móvil); comentario
- [x] T024 [US4] Actualizar `CHANGELOG.md` `[Unreleased]` (sección ayudar)
- [x] T025 [US4] Validar: `php -l patterns/hazte-ayudar.php`; 390/1280

**Checkpoint**: Voluntariado visible

---

## Phase 7: User Story 5 - Resolver dudas por correo (Priority: P2)

**Goal**: Bloque dudas con mailto editable

**Independent Test**: Enlace abre cliente de correo; email editable en Editor

### Implementation for User Story 5

- [x] T026 [US5] Crear `patterns/hazte-dudas.php` (slug `afa-poveda/hazte-dudas`): icono mail; «¿Tienes dudas?»; enlace `mailto:` editable (default editorial del mock o el que fije la junta; no hardcodear en `functions.php`); texto de apoyo; clase `.afa-hazte-dudas`; i18n `afa-poveda`
- [x] T027 [US5] CSS en `style.css` si hace falta centrado/gap `.afa-hazte-dudas`; comentario
- [x] T028 [US5] Actualizar `CHANGELOG.md` `[Unreleased]` (bloque dudas)
- [x] T029 [US5] Validar: `php -l patterns/hazte-dudas.php`; mailto usable; contraste enlace

**Checkpoint**: Cierre del recorrido de la landing

---

## Phase 8: Polish & Cross-Cutting Concerns

**Purpose**: Compuesto, menú activo, verificación global

- [x] T030 Crear `patterns/hazte-socio-page.php` (slug `afa-poveda/hazte-socio-page`): compuesto que referencia `hazte-hero` → `hazte-que-hacemos` → `hazte-pertenecer` → `hazte-ayudar` → `hazte-dudas`; Categories `featured`, `afa-poveda`; `Block Types: core/post-content`; `Post Types: page`
- [x] T031 CSS opcional: marcar activo el CTA/enlace a `/hazte-socio/` en `body.page-template-page-hazte-socio` en `style.css` (sin rediseñar header)
- [x] T032 [P] Ejecutar checklist de `specs/006-hazte-socio/quickstart.md` (escenarios 1–14 según plugin)
- [x] T033 [P] Capturas / revisión 390, 900, 1280 px vs frames `27:3962` / `27:3559`; anotar desviaciones en refinamientos de `specs/006-hazte-socio/spec.md`
- [x] T034 Verificar: sin CPT/form en tema; `python3 -m json.tool theme.json > /dev/null`; contraste AA
- [x] T035 Actualizar `CHANGELOG.md` `[Unreleased]` con resumen final 006 (plantilla + patterns)
- [x] T036 Marcar status de `specs/006-hazte-socio/spec.md` cuando el checklist pase

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: Sin dependencias
- **Foundational (Phase 2)**: Depende de Setup — **BLOQUEA** todas las US
- **US1 (Phase 3)**: Tras Foundational — MVP hero
- **US2 (Phase 4)**: Tras Foundational; ancla usada por US1
- **US3 (Phase 5)**: Tras Foundational; ancla `#pertenecer` usada por US1
- **US4 (Phase 6)**: Tras Foundational; independiente
- **US5 (Phase 7)**: Tras Foundational; independiente
- **Polish (Phase 8)**: Tras US1–US5 deseadas

### User Story Dependencies

- **US1 (P1)**: Independiente tras foundation — MVP
- **US2 (P1)**: Independiente; mejora el CTA «Saber más» de US1
- **US3 (P1)**: Independiente; completa el CTA «Formulario» de US1
- **US4 (P2)** / **US5 (P2)**: Independientes; paralelizable tras foundation

### Parallel Opportunities

- T001 ∥ T002 ∥ T003
- Tras foundation: US2 ∥ US3 ∥ US4 ∥ US5 (tras o en paralelo con US1)
- T032 ∥ T033

---

## Parallel Example: Tras foundation

```bash
Task: "Crear patterns/hazte-que-hacemos.php"
Task: "Crear patterns/hazte-pertenecer.php"
Task: "Crear patterns/hazte-ayudar.php"
Task: "Crear patterns/hazte-dudas.php"
```

---

## Implementation Strategy

### MVP First (User Story 1 Only)

1. Phase 1–2: Setup + plantilla + CSS base
2. Phase 3: US1 hero
3. **STOP and VALIDATE** en 390/1280
4. Demo del primer viewport

### Incremental Delivery

1. US1 hero → US2 qué hacemos → US3 pertenecer/form hueco → US4 ayudar → US5 dudas → compuesto + polish
2. Montaje del plugin de formularios = paso editorial (quickstart), no tarea de código del tema

### Parallel Team Strategy

1. Dev A: US1 → US3 (hero + conversión)
2. Dev B: US2 → US4 → US5 (contenido)
3. Juntos: compuesto + polish

---

## Notes

- [P] = otro archivo, sin depender de tareas incompletas del mismo archivo
- **Nunca** implementar envío de formulario ni CPT socios en el tema (constitución III)
- Copy/campos canónicos = escritorio (spec R2–R5)
- Commit tras cada historia o grupo lógico
