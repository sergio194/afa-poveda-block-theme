---
description: "Task list for Servicios AFA (listado y detalle) implementation"
---

# Tasks: Servicios AFA (listado y detalle)

**Input**: Design documents from `/specs/005-servicios/`

**Prerequisites**: plan.md, spec.md, research.md, data-model.md, contracts/ui-servicios.md, quickstart.md

**Tests**: No hay suite automatizada pedida en la spec; validación = `php -l` + checklist de `quickstart.md` + comparación Figma (390 / 900 / 1280).

**Organization**: Por user story (P1 → P2). Seguir skills `wp-block-themes` y `wp-patterns` (markup de bloques, presets, i18n `afa-poveda`, sin JS custom, sin CPT ni formularios en el tema).

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Puede ir en paralelo (otro archivo, sin depender de tareas incompletas)
- **[Story]**: US1…US6 según spec.md
- Incluir rutas de archivo exactas

## Path Conventions

Raíz del tema block: `templates/`, `patterns/`, `style.css`, `functions.php`, `theme.json`, `CHANGELOG.md`

---

## Phase 1: Setup (Shared Infrastructure)

**Purpose**: Preparar changelog y alinear la guía editorial sin UI todavía

- [x] T001 [P] Añadir en `CHANGELOG.md` bajo `[Unreleased]` un apartado preparado para 005 (Servicios — listado y detalle Comedor) sin bullets de implementación aún
- [x] T002 [P] Confirmar en `specs/005-servicios/quickstart.md` que los pasos editoriales (página slug `servicios`, hija `comedor-escolar`, plantillas, menú «Servicios») siguen alineados con `specs/005-servicios/plan.md` y `specs/005-servicios/data-model.md`

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Plantillas de página sin H1 duplicado + registro en theme.json + namespace CSS; bloquea todas las US

**⚠️ CRITICAL**: No empezar historias hasta completar esta fase

- [x] T003 [P] Crear `templates/page-servicios.html`: template-part `header` → `<main class="afa-servicios">` (Group constrained) con **solo** `core/post-content` (`align":"full"`, layout constrained) → template-part `footer`; **sin** `core/post-title`; **sin sidebar** (contrato UI A)
- [x] T004 [P] Crear `templates/page-servicio-detalle.html`: mismo esqueleto con `<main class="afa-servicio-detalle">`; **sin** `core/post-title`; **sin sidebar** (contrato UI B)
- [x] T005 Registrar en `theme.json` → `customTemplates`: `{ "name": "page-servicios", "title": "Servicios — Listado", "postTypes": ["page"] }` y `{ "name": "page-servicio-detalle", "title": "Servicio — Detalle", "postTypes": ["page"] }` (junto a `page-afa` existente)
- [x] T006 Añadir en `style.css` bloque comentado «Servicios (005)» con selectores base `.afa-servicios`, `.afa-servicio-detalle`, `.afa-servicio-card`, `.afa-servicio-aside` listos para extender por US; solo variables `--wp--preset--*`; justificar por qué hace falta CSS (rejilla fichas, cover hero, píldoras, stats, details FAQ, tarjeta inscripción)
- [x] T007 Documentar en `specs/005-servicios/quickstart.md` (si falta): tras añadir plantillas, reactivar tema / restablecer personalizaciones de página en BD si no aparecen

**Checkpoint**: Foundation ready — se puede implementar US1–US6

---

## Phase 3: User Story 1 - Descubrir los servicios de la AFA (Priority: P1) 🎯 MVP

**Goal**: Hub `/servicios/` con eyebrow «COMPROMISO Y COMUNIDAD», H1 «Servicios AFA», texto de apoyo y rejilla de 6 fichas homogéneas (3×2 escritorio / 1 col móvil) con «Ver más»

**Independent Test**: Página slug `servicios`, plantilla «Servicios — Listado», patterns hero + grid; en 1280 ver H1 + 6 fichas 3×2; en 390 apiladas sin desborde; un solo H1; «Ver más» de Comedor apunta a URL del detalle (aunque el detalle aún esté vacío)

### Implementation for User Story 1

- [x] T008 [P] [US1] Crear `patterns/servicios-hero.php` (slug `afa-poveda/servicios-hero`): eyebrow default «COMPROMISO Y COMUNIDAD» (`is-style-afa-eyebrow` o `soft-green`/`green`); H1 **único** «Servicios AFA»; párrafo de apoyo canónico escritorio (conciliación / enriquecimiento); i18n `afa-poveda`; Categories `featured`, `afa-poveda`
- [x] T009 [P] [US1] Crear `patterns/servicios-grid.php` (slug `afa-poveda/servicios-grid`): 6 fichas `.afa-servicio-card` con imagen (placeholder `get_theme_file_uri` o medio), píldora categoría, título, descripción, meta icono+etiqueta, enlace «Ver más»; defaults canónicos escritorio — Comedor Escolar (Nutrición / Diario), Biblioteca y Apoyo (Aprendizaje / Tarde), Primeros del Cole (Conciliación / Mañana), Música y Arte (Extraescolares / Semanal), Deporte Escolar (Deporte / Competición), Escuela de Familias (Familia / Mensual); layout Columns/Grid 3 cols; Comedor «Ver más» → `/servicios/comedor-escolar/`; resto → `#` o rutas hijas documentadas; i18n `afa-poveda`
- [x] T010 [US1] CSS en `style.css` para `.afa-servicio-card` (radio medium, media `aspect-ratio` estable ~3:2 o 16:10, píldora overlay esquina, clamp descripción ~3 líneas, fila meta + «Ver más» `primary`, placeholder `surface-high` sin imagen); 1 columna &lt; ~782 px; comentario de justificación
- [x] T011 [US1] Verificar contraste AA de píldoras de categoría (texto sobre color ≥ 4,5:1); si falla, ajustar a tokens `green`/`primary`/`soft-green` o CSS mapeado en `style.css` (spec R7)
- [x] T012 [US1] Actualizar `CHANGELOG.md` `[Unreleased]` → Añadido: hub Servicios (hero + grid de fichas)
- [x] T013 [US1] Validar: `php -l patterns/servicios-hero.php patterns/servicios-grid.php`; un solo H1; 6 fichas; sin bloques inválidos al abrir la página con plantilla listado en el Editor

**Checkpoint**: MVP — `/servicios/` usable como listado Figma (sin CTA final todavía)

---

## Phase 4: User Story 2 - Entender un servicio concreto / Comedor (Priority: P1)

**Goal**: Detalle Comedor con hero cover, alimentación saludable (2 features), FAQ en `core/details`, layout 2 columnas (contenido | aside vacío reservado)

**Independent Test**: Página hija `comedor-escolar` (padre Servicios), plantilla «Servicio — Detalle»; en 1280 hero + columna principal; en 390 apilado; FAQ operable por teclado; un solo H1

### Implementation for User Story 2

- [x] T014 [P] [US2] Crear `patterns/servicio-hero.php` (slug `afa-poveda/servicio-hero`): `core/cover` full/wide, overlay oscuro AA, badge «Servicio Destacado» (píldora `soft-green`/`green`), H1 «Comedor Escolar», subtítulo nutrición/proximidad; imagen placeholder local; clase `.afa-servicio-hero`; i18n `afa-poveda`
- [x] T015 [P] [US2] Crear `patterns/servicio-alimentacion.php` (slug `afa-poveda/servicio-alimentacion`): H2 «Alimentación Saludable»; párrafo Figma; 2 puntos `.afa-servicio-feature` — «100% Equilibrado» (icono hoja) y «Control de Alérgenos» (icono check); i18n `afa-poveda`
- [x] T016 [P] [US2] Crear `patterns/servicio-faq.php` (slug `afa-poveda/servicio-faq`): H2 «Preguntas Frecuentes»; 3× `core/details` con defaults Figma (alergia puntual abierta si el bloque lo permite; días sueltos; empresa gestora); clase `.afa-servicio-faq`; **sin JS**; i18n `afa-poveda`
- [x] T017 [US2] CSS en `style.css` para `.afa-servicio-hero` (overlay/contenido), `.afa-servicio-feature` (icono + texto), `.afa-servicio-faq` (bordes `outline`/`surface-high` entre details, chevron nativo); comentario de justificación
- [x] T018 [US2] Montar en pattern compuesto o documentar orden en quickstart: hero → `core/columns` ~65/35 (principal: alimentación + FAQ; aside: grupo `.afa-servicio-aside` vacío o con spacer) para US3/US4; stack móvil nativo de Columns
- [x] T019 [US2] Actualizar `CHANGELOG.md` `[Unreleased]` (detalle Comedor: hero, alimentación, FAQ)
- [x] T020 [US2] Validar: `php -l` en `servicio-hero.php`, `servicio-alimentacion.php`, `servicio-faq.php`; contraste hero AA; FAQ teclado; 390/1280 vs Figma detalle

**Checkpoint**: US1+US2 — listado + cuerpo informativo del Comedor

---

## Phase 5: User Story 3 - Ver precio, horario e inscribirse (Priority: P1)

**Goal**: Tarjeta azul de inscripción en el aside (precios socio/no socio, badge descuento, horario, CTA enlace «Inscribirse Ahora», nota de matrícula)

**Independent Test**: En detalle Comedor localizar tarjeta; precios y horario visibles; CTA navega a destino configurable (default Contacto `/contacto/` o `#` documentado, **no** 404); editar precio en Editor y verlo en front

### Implementation for User Story 3

- [x] T021 [US3] Crear `patterns/servicio-inscripcion.php` (slug `afa-poveda/servicio-inscripcion`): fondo `primary`, texto `base`, radio medium; «Inscripción»; precio socias/os AFA + badge «-15% dto.» (`soft-green`/`green`); precio no socias/os; horario «12:30h — 14:30h» con icono; `core/button` «Inscribirse Ahora» (fondo `base`, texto `primary`, URL configurable default Contacto); nota matrícula curso editable (no hardcodear año en lógica); clase `.afa-servicio-inscripcion`; i18n `afa-poveda`
- [x] T022 [US3] CSS en `style.css` para `.afa-servicio-inscripcion` (padding, badge descuento, botón ancho completo del aside, contraste nota sobre `primary`); comentario
- [x] T023 [US3] Insertar el pattern en el aside `.afa-servicio-aside` del detalle Comedor (columns de T018 / compuesto)
- [x] T024 [US3] Actualizar `CHANGELOG.md` `[Unreleased]` (tarjeta inscripción)
- [x] T025 [US3] Validar: `php -l patterns/servicio-inscripcion.php`; CTA no 404; contraste AA en tarjeta azul; editable en Editor

**Checkpoint**: Conversión principal del detalle lista

---

## Phase 6: User Story 4 - Descargar menús y documentación (Priority: P2)

**Goal**: Sección «Valores Nutricionales y Menú» (descargas + composición media) + tarjeta «Documentación» en aside; sin enlaces rotos

**Independent Test**: Con PDFs de ejemplo enlazados, «Descargar» y docs abren archivo; sin URL → ítem omitido o no clicable a 404; stats 750 KCAL / 35g PROTEÍNA / 90g HC / 15g GRASAS visibles

### Implementation for User Story 4

- [x] T026 [P] [US4] Crear `patterns/servicio-menus-valores.php` (slug `afa-poveda/servicio-menus-valores`): H2 «Valores Nutricionales y Menú»; 2 filas descarga (Menú Basal / Menú Alérgenos) con icono, título, tamaño opcional, enlace «Descargar» (`core/file` o ancla a medio; placeholder `#` documentado en quickstart hasta subir PDFs); bloque «Composición Media Diaria» con 4 `.afa-servicio-stat` (750 KCAL, 35g PROTEÍNA, 90g HC, 15g GRASAS); i18n `afa-poveda`
- [x] T027 [P] [US4] Crear `patterns/servicio-documentacion.php` (slug `afa-poveda/servicio-documentacion`): fondo `surface-container`/`surface-high`; icono carpeta + H3 «Documentación»; 3 ítems (Reglamento del Comedor, Protocolo de Emergencias, Formulario de Becas) con icono + enlace; sin URL no publicar enlace roto (omitir o `#` + nota quickstart); clase `.afa-servicio-docs`; i18n `afa-poveda` (precedente `sobre-documentos.php`)
- [x] T028 [US4] CSS en `style.css` para filas de descarga, grid stats (2×2 móvil / 4 cols escritorio), colores de énfasis de stats con tokens o CSS justificado si falta ámbar/rojo en paleta; `.afa-servicio-docs` lista; comentario
- [x] T029 [US4] Insertar menús/valores en columna principal (entre alimentación y FAQ) y documentación bajo inscripción en aside
- [x] T030 [US4] Actualizar `CHANGELOG.md` `[Unreleased]` (menús, stats, documentación)
- [x] T031 [US4] Validar: `php -l` en ambos patterns; descargas/docs; layout stats 390/1280

**Checkpoint**: Descargas y docs del Comedor operativos

---

## Phase 7: User Story 5 - Resolver dudas del listado / CTA (Priority: P2)

**Goal**: Banner final del listado «¿Tienes alguna duda sobre los servicios?» con dos botones (Contactar ahora / Preguntas frecuentes)

**Independent Test**: En `/servicios/` ver CTA azul; escritorio botones en fila; móvil apilados; cada botón navega a destino configurable

### Implementation for User Story 5

- [x] T032 [US5] Crear `patterns/servicios-cta.php` (slug `afa-poveda/servicios-cta`): grupo fondo `primary` align wide/full; titular + apoyo en `base`; botones «Contactar ahora» (relleno `base` / texto `primary`) y «Preguntas frecuentes» (outline `base`); URLs default Contacto y destino FAQ editorial (`#` o página documentada); clase `.afa-servicios-cta`; i18n `afa-poveda`
- [x] T033 [US5] CSS en `style.css` para `.afa-servicios-cta` (padding, gap botones, stack móvil); comentario
- [x] T034 [US5] Asegurar que el CTA queda **después** del grid en el contenido de la página listado (orden contrato UI A)
- [x] T035 [US5] Actualizar `CHANGELOG.md` `[Unreleased]` (CTA dudas servicios)
- [x] T036 [US5] Validar: `php -l patterns/servicios-cta.php`; botones 1280 fila / 390 stack; destinos correctos

**Checkpoint**: Hub listado completo (hero + grid + CTA)

---

## Phase 8: User Story 6 - Editar contenido sin desarrollo (Priority: P2)

**Goal**: Patterns compuestos + menú activo en hijas + verificación de que junta edita sin código

**Independent Test**: Cambiar un título de ficha, un precio y un enlace PDF en el Editor de la página; front actualizado; ítem menú «Servicios» activo en listado y en Comedor hijo

### Implementation for User Story 6

- [x] T037 [P] [US6] Crear `patterns/servicios-page.php` (slug `afa-poveda/servicios-page`): compuesto que referencia/incluye markup de hero + grid + CTA para insertar el hub de una vez; Categories `featured`, `afa-poveda`; i18n donde aplique
- [x] T038 [P] [US6] Crear `patterns/servicio-comedor.php` (slug `afa-poveda/servicio-comedor`): compuesto detalle completo (hero + columns: alimentación + menús + FAQ | inscripción + documentación) según contrato UI B
- [x] T039 [US6] Comprobar `current-page-ancestor` en página hija Comedor; si el ítem «Servicios» no queda activo, añadir filtro mínimo en `functions.php` acotado a la página Servicios y descendientes (precedente noticias 004); documentar en quickstart
- [x] T040 [US6] Actualizar `specs/005-servicios/quickstart.md` con pasos exactos: crear páginas, asignar plantillas, insertar compuestos, enlazar PDFs, menú
- [x] T041 [US6] Validar SC-004: voluntaria edita precio + PDF en ≤ 10 min sin código; `php -l` en compuestos y `functions.php` si se tocó

**Checkpoint**: Feature editable de extremo a extremo

---

## Phase 9: Polish & Cross-Cutting Concerns

**Purpose**: Verificación global, contraste, Figma, refinamientos

- [x] T042 [P] Ejecutar checklist completo de `specs/005-servicios/quickstart.md` (escenarios 1–15)
- [x] T043 [P] Capturas / revisión visual a 390, 900 y 1280 px vs frames `26:3374`, `27:4354`, `26:3175`, `27:4168`; anotar desviaciones nuevas en tabla de refinamientos de `specs/005-servicios/spec.md`
- [x] T044 Verificar contraste ≥ 4,5:1 en píldoras, CTA listado, tarjeta inscripción, stats y FAQ; ajustar tokens/CSS si falla
- [x] T045 Confirmar: sin CPT/taxonomías/JS a medida; sin bloques «no válido» en Editor; `python3 -m json.tool theme.json > /dev/null`
- [x] T046 Actualizar `CHANGELOG.md` `[Unreleased]` con resumen final 005 (plantillas + patterns listados)
- [x] T047 Marcar status de `specs/005-servicios/spec.md` como Implementada (pendiente validación visual en Local) cuando el checklist pase

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: Sin dependencias
- **Foundational (Phase 2)**: Depende de Setup — **BLOQUEA** todas las US
- **US1 (Phase 3)**: Tras Foundational — MVP listado
- **US2 (Phase 4)**: Tras Foundational; se beneficia de US1 para enlace «Ver más» Comedor
- **US3 (Phase 5)**: Tras US2 (aside del detalle)
- **US4 (Phase 6)**: Tras US2 (columna principal + aside); paralelizable con US3 tras T018
- **US5 (Phase 7)**: Tras US1 (añade CTA al listado); paralelizable con US2–US4
- **US6 (Phase 8)**: Tras US1–US5 (compuestos + menú activo)
- **Polish (Phase 9)**: Tras historias deseadas

### User Story Dependencies

- **US1 (P1)**: Independiente tras foundation — MVP
- **US2 (P1)**: Independiente tras foundation; enlace desde grid US1
- **US3 (P1)**: Requiere shell de columns/aside de US2
- **US4 (P2)**: Requiere shell US2; paralelo a US3 tras T018
- **US5 (P2)**: Solo requiere US1 (página listado)
- **US6 (P2)**: Tras piezas a componer (US1–US5)

### Within Each User Story

- Patterns antes de CSS fino que depende de sus clases
- Insertar en página/compuesto después del pattern
- Validar `php -l` al cerrar la historia
- Sin tareas de tests automatizados (no pedidas)

### Parallel Opportunities

- T001 ∥ T002
- T003 ∥ T004
- T008 ∥ T009
- T014 ∥ T015 ∥ T016
- T026 ∥ T027
- T037 ∥ T038
- Tras T018: US3 y US4 en paralelo
- Tras US1: US5 en paralelo con US2+
- T042 ∥ T043

---

## Parallel Example: User Story 2

```bash
# Patterns del cuerpo principal en paralelo:
Task: "Crear patterns/servicio-hero.php"
Task: "Crear patterns/servicio-alimentacion.php"
Task: "Crear patterns/servicio-faq.php"
# Luego CSS + columns shell (T017–T018) en serie
```

## Parallel Example: User Story 4

```bash
Task: "Crear patterns/servicio-menus-valores.php"
Task: "Crear patterns/servicio-documentacion.php"
```

---

## Implementation Strategy

### MVP First (User Story 1 Only)

1. Phase 1: Setup
2. Phase 2: Foundational (plantillas + theme.json + CSS base)
3. Phase 3: US1 (hero + grid)
4. **STOP and VALIDATE**: `/servicios/` en 390/1280
5. Demo del hub

### Incremental Delivery

1. Setup + Foundational → plantillas listas
2. US1 → hub listado (MVP)
3. US2 → detalle informativo Comedor
4. US3 → inscripción (conversión)
5. US4 → menús + docs
6. US5 → CTA listado
7. US6 → compuestos + menú activo + guía editorial
8. Polish → quickstart + Figma + changelog

### Parallel Team Strategy

1. Equipo cierra Setup + Foundational
2. Dev A: US1 → US5 (listado)
3. Dev B: US2 → US3 → US4 (detalle)
4. Juntos: US6 + Polish

---

## Notes

- [P] = otro archivo, sin depender de tareas incompletas del mismo archivo
- Sin CPT, sin formularios, sin JS a medida (constitución)
- CTA inscripción = enlace configurable (R5)
- Copy/metas canónicos = escritorio (R1, R2, R8)
- Sticky aside opcional solo CSS (R6); no bloquear v1
- Commit tras cada historia o grupo lógico
- Evitar: hardcodear curso/año en lógica; hex sueltos en patterns si hay preset
