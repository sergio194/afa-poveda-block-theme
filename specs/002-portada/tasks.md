---
description: "Task list for Portada (HOME) implementation"
---

# Tasks: Portada (HOME)

**Input**: Design documents from `/specs/002-portada/`

**Prerequisites**: plan.md, spec.md, research.md, data-model.md, contracts/ui-portada.md, quickstart.md

**Tests**: No hay suite automatizada pedida en la spec; validación = `php -l` + checklist de `quickstart.md` + comparación Figma.

**Organization**: Por user story (P1 → P3). Seguir skills `wp-block-themes` y `wp-patterns` (markup de bloques, presets, i18n `afa-poveda`, sin JS custom).

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Puede ir en paralelo (otro archivo, sin depender de tareas incompletas)
- **[Story]**: US1…US5 según spec.md
- Incluir rutas de archivo exactas

## Path Conventions

Raíz del tema block: `templates/`, `patterns/`, `assets/`, `style.css`, `functions.php`

---

## Phase 1: Setup (Shared Infrastructure)

**Purpose**: Carpetas y esqueleto sin lógica de UI todavía

- [x] T001 Crear directorio `assets/icons/` para SVG de accesos rápidos
- [x] T002 [P] Crear `CHANGELOG.md` en la raíz del tema con sección `## [Unreleased]` (Añadido/Cambiado/Corregido) lista para ir acumulando la feature 002
- [x] T003 [P] Revisar que `templates/home.html` se conserva como índice blog+sidebar (no borrarlo; solo documentar en comentario de plan si hace falta)

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Plantilla front-page y CSS base compartido; bloquea todas las US

**⚠️ CRITICAL**: No empezar historias hasta completar esta fase

- [x] T004 Crear `templates/front-page.html` con estructura: template-part `header` → `<main id="afa-home" class="afa-home">` (Group constrained/wide según contrato) → placeholders de pattern en orden del contrato → template-part `footer`; **sin sidebar**
- [x] T005 Añadir en `style.css` bloque comentado «Portada (002)» con selectores base `.afa-home` (espaciado de secciones con presets vía gap si aplica) listos para extender por US
- [x] T006 Verificar jerarquía WP: con tema activo, `/` usa `front-page.html` (nota en `specs/002-portada/quickstart.md` si hace falta ajuste de Lectura)

**Checkpoint**: Foundation ready — se puede implementar US1–US5

---

## Phase 3: User Story 1 - Primera impresión (Hero) (Priority: P1) 🎯 MVP

**Goal**: Hero editable con titular, apoyo e imagen; CTA «Descubre más» en móvil

**Independent Test**: Abrir `/` en 1280 y 390 px; ver hero Figma-like; «Descubre más» lleva a `#afa-accesos` (ancla puede existir vacía hasta US2)

### Implementation for User Story 1

- [x] T007 [US1] Crear pattern `patterns/home-hero.php` (slug `afa-poveda/home-hero`): Cover/Group align wide, radio medium, overlay/gradiente para contraste AA, H1 con texto Figma, párrafo de bienvenida, botón «Descubre más» → `#afa-accesos`; cadenas con `esc_html_e` / dominio `afa-poveda`; Category `featured`/`afa-poveda`
- [x] T008 [US1] Referenciar `<!-- wp:pattern {"slug":"afa-poveda/home-hero"} /-->` en `templates/front-page.html`
- [x] T009 [US1] CSS en `style.css`: overlay/legibilidad del hero y visibilidad del CTA móvil (`max-width` ~781px); comentario del porqué (theme.json no expresa overlay+CTA responsive)
- [x] T010 [US1] Añadir bullet bajo `CHANGELOG.md` → `[Unreleased]` → Añadido: hero de portada
- [x] T011 [US1] Validar: `php -l patterns/home-hero.php`; sin bloques inválidos en Editor; contraste texto hero ≥ 4,5:1

**Checkpoint**: MVP visual — portada con hero + header/footer

---

## Phase 4: User Story 2 - Accesos rápidos (Priority: P1)

**Goal**: Cuatro accesos (Comedor, Extraescolares, Calendario, Voluntarios) 1×4 / 2×2

**Independent Test**: Clic en cada acceso; layout 4 en fila (≥1024) y 2×2 (390); ancla `#afa-accesos` funciona desde el hero

### Implementation for User Story 2

- [x] T012 [P] [US2] Añadir SVG en `assets/icons/icon-comedor.svg`, `icon-extraescolares.svg`, `icon-calendario.svg`, `icon-voluntarios.svg` (decorativos)
- [x] T013 [US2] Crear pattern `patterns/home-quick-access.php` (slug `afa-poveda/home-quick-access`): contenedor con `id`/`anchor` `afa-accesos`, 4 columnas/cards fondo `surface-container`, radio medium, icono+etiqueta, URLs por defecto `/servicios/comedor/`, `/extraescolares/`, `/calendario/`, `/afa/`; i18n `afa-poveda`
- [x] T014 [US2] Referenciar pattern en `templates/front-page.html` tras el hero
- [x] T015 [US2] CSS en `style.css`: `.afa-home-access` grid/wrap 2×2 ≤781px e iconos vía máscara o img del tema; comentario justificación
- [x] T016 [US2] Actualizar `CHANGELOG.md` `[Unreleased]` (accesos rápidos)
- [x] T017 [US2] Validar: `php -l patterns/home-quick-access.php`; prueba 390/1280 sin desborde

**Checkpoint**: US1+US2 — hero y accesos operativos

---

## Phase 5: User Story 3 - Actualidad y Avisos (Priority: P2)

**Goal**: Hasta 1 destacado + 2 secundarios desde posts sticky; enlace Ver todo/Ver todos

**Independent Test**: Con 3 sticky, layout escritorio 1+2 y móvil card+lista; con 0 sticky, sección vacía/oculta sin error

### Implementation for User Story 3

- [x] T018 [US3] Crear pattern `patterns/home-avisos.php` (slug `afa-poveda/home-avisos`): cabecera H2 «Actualidad y Avisos» + subtítulo + enlace archivo; Query Loop sticky `perPage: 3` según research R3; plantilla de post con imagen, chip categoría (o «Destacado»), título, extracto, CTA outline; markup/CSS para layout principal+secundarios desktop y lista compacta móvil (contrato `contracts/ui-portada.md`)
- [x] T019 [US3] Referenciar pattern en `templates/front-page.html` tras accesos
- [x] T020 [US3] CSS en `style.css` para layout avisos (columnas / stack móvil) con comentario; tokens de color `surface-container` / `accent` si el segundo card destaca como Figma
- [x] T021 [US3] Si el Query Loop no excluye/ordena sticky bien: filtro mínimo documentado en `functions.php` (solo presentación; sin CPT)
- [x] T022 [US3] Actualizar `CHANGELOG.md` `[Unreleased]` (bloque Actualidad y Avisos)
- [x] T023 [US3] Validar: `php -l patterns/home-avisos.php` (+ `functions.php` si aplica); escenarios vacío y con 3 sticky

**Checkpoint**: Avisos dinámicos en portada

---

## Phase 6: User Story 4 - Últimas Noticias (Priority: P2)

**Goal**: Grid de 3 noticias + Ver noticias / Cargar más → archivo

**Independent Test**: 3 cards en escritorio, columna en móvil; sin posts → mensaje vacío; «Cargar más noticias» es enlace al archivo (no infinite scroll)

### Implementation for User Story 4

- [x] T024 [US4] Crear pattern `patterns/home-latest-news.php` (slug `afa-poveda/home-latest-news`): H2 «Últimas Noticias» + subtítulo + «Ver noticias»; Query `perPage: 3` order date DESC preferiblemente sin sticky (R4); card con featured 16:9, fecha, título enlace, extracto, botón outline «Leer más»; vacío con mensaje i18n; botón/enlace móvil «Cargar más noticias» al archivo
- [x] T025 [US4] Referenciar pattern en `templates/front-page.html` tras avisos
- [x] T026 [US4] CSS menor en `style.css` si hace falta (radio imagen, stack columnas) con comentario
- [x] T027 [US4] Actualizar `CHANGELOG.md` `[Unreleased]` (últimas noticias en portada)
- [x] T028 [US4] Validar: `php -l patterns/home-latest-news.php`; 390/1280 vs Figma sección noticias

**Checkpoint**: Portada informativa completa salvo CTA

---

## Phase 7: User Story 5 - CTA comunidad (Priority: P3)

**Goal**: Bloque final hacerse socio / contactar vocalías

**Independent Test**: Dos botones con destinos `/hazte-socio/` y `/contacto/`; textos editables; tratamiento desktop/móvil según research R8

### Implementation for User Story 5

- [x] T029 [US5] Crear pattern `patterns/home-community-cta.php` (slug `afa-poveda/home-community-cta`): Group radio ~24px, H2 y párrafo Figma, botones primario «Hazte Socio Ahora» y outline «Contactar con Vocalías»; i18n `afa-poveda`
- [x] T030 [US5] Referenciar pattern en `templates/front-page.html` antes del footer
- [x] T031 [US5] CSS en `style.css` `.afa-home-cta` para variante móvil (fondo accent / textos base) si no se cubre solo con presets; comentario justificación
- [x] T032 [US5] Actualizar `CHANGELOG.md` `[Unreleased]` (CTA comunidad)
- [x] T033 [US5] Validar: `php -l patterns/home-community-cta.php`; contraste AA en ambas variantes

**Checkpoint**: Las 5 secciones de Figma presentes en `/`

---

## Phase 8: Polish & Cross-Cutting Concerns

**Purpose**: Cierre de feature (sin bump de versión; eso es `/generar-version`)

- [x] T034 Recorrer checklist completo de `specs/002-portada/quickstart.md` (escenarios 1–9) y anotar desviaciones nuevas en tabla de refinamientos de `specs/002-portada/spec.md`
- [x] T035 [P] Comparar capturas 390 / 900 / 1280 px con Figma HOME y HOME-MOBILE; ajustar CSS/patterns solo si falla FR-009/SC-005
- [x] T036 [P] `php -l` en todos los `patterns/home-*.php` y `functions.php`; confirmar 0 bloques inválidos al abrir plantilla Portada en el Editor del sitio
- [x] T037 Revisar que `CHANGELOG.md` `[Unreleased]` resume Añadido/Cambiado de la 002 (listo para `/generar-version` cuando el usuario lo pida)
- [x] T038 Actualizar estado en `specs/002-portada/spec.md` (Status / criterios de aceptación marcados) si la implementación los cumple

---

## Dependencies & Execution Order

### Phase Dependencies

- **Phase 1 Setup** → sin dependencias
- **Phase 2 Foundational** → tras Setup; **bloquea** US
- **Phase 3–7 (US1–US5)** → tras Foundational; preferible orden P1→P2→P3 (front-page se enriquece por secciones)
- **Phase 8 Polish** → tras las US deseadas (mínimo US1+US2 para MVP)

### User Story Dependencies

- **US1 (Hero)**: Solo foundation; ancla `#afa-accesos` puede apuntar a elemento vacío hasta US2
- **US2 (Accesos)**: Ideal tras US1 (mismo `front-page.html`); independiente en valor
- **US3 (Avisos)**: Independiente de US4/US5; requiere contenido sticky editorial
- **US4 (Noticias)**: Independiente; mejor tras US3 si se filtran sticky
- **US5 (CTA)**: Independiente; última sección visual

### Parallel Opportunities

- T002 ∥ T003 (setup)
- T012 (SVG) ∥ preparación de copy mientras se hace T007
- Tras foundation: US3/US4/US5 en paralelo si se evitan conflictos en `front-page.html` / `style.css` (en solitario, secuencial es más seguro)
- T035 ∥ T036 en polish

---

## Parallel Example: User Story 2

```bash
# En paralelo tras empezar US2:
Task: "SVG iconos en assets/icons/*.svg"
# Luego secuencial:
Task: "patterns/home-quick-access.php"
Task: "enganchar en front-page.html + CSS 2×2"
```

---

## Implementation Strategy

### MVP First (US1 + opcional US2)

1. Phase 1–2  
2. Phase 3 Hero → validar  
3. Phase 4 Accesos → validar  
4. Demo temprana a la junta  

### Incremental Delivery

1. Foundation  
2. US1 Hero → demo  
3. US2 Accesos → demo  
4. US3 Avisos → demo  
5. US4 Noticias → demo  
6. US5 CTA → demo  
7. Polish + dejar `[Unreleased]` listo  
8. Usuario ejecuta `/generar-version` (no es tarea Speckit de bump)

### Skills WP en implementación

- `wp-block-themes`: plantillas, `theme.json` presets, debugging de overrides de usuario  
- `wp-patterns`: markup válido, PHP solo en registro, `esc_*`, sin `<style>` inline ni JS  

---

## Notes

- No crear CPT ni formularios  
- No infinite scroll  
- No subir `Version:` en `style.css` aquí — reservado a `/generar-version`  
- Commits sugeridos por US o por fase; changelog en `[Unreleased]` en cada US (T010, T016, T022, T027, T032)
