# Implementation Plan: Sobre nosotros (AFA)

**Branch**: `003-sobre-nosotros` | **Date**: 2026-09-16 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/003-sobre-nosotros/spec.md`

## Summary

Implementar la página institucional «Sobre nosotros» (ítem de menú «AFA») según Figma: hero, quiénes somos, organigrama visual de la junta, qué hace la AFA, utilidad + comisiones y documentos/estatutos. Block theme puro: plantilla de página sin H1 duplicado + patterns PHP insertables/editables en el contenido de la página; tokens de la spec 001; CSS mínimo justificado. Sin CPT ni formularios en el tema.

## Technical Context

**Language/Version**: PHP ≥ 7.4 (tema), HTML de bloques WordPress, CSS mínimo en `style.css`

**Primary Dependencies**: WordPress ≥ 7.1 (FSE), `theme.json` v3, bloques core (`cover`, `group`, `columns`, `heading`, `paragraph`, `list`, `file`/`buttons`, `separator`)

**Storage**: Página WP + medios (imagen hero, PDFs). Sin tablas ni CPT del tema.

**Testing**: Validación manual (página `/afa/` + Editor); `php -l` en patterns; capturas 390 / 900 / 1280 px vs Figma

**Target Platform**: Sitio Local / producción WordPress; anchos de referencia 390–1280 px

**Project Type**: Block theme (FSE) — presentación en tema

**Performance Goals**: Página usable en < 3 s en red local; sin JS de terceros; imágenes y cards con `aspect-ratio` / tamaños estables

**Constraints**: Constitución (tokens; sin lógica de plugins en tema; WCAG AA; español + `afa-poveda`; editable por voluntarios)

**Scale/Scope**: 1 plantilla de página, ~6 patterns de sección (o 1 compuesto + secciones), ajustes CSS de organigrama / layout asimétrico / lista de documentos

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

| Principio | ¿Cumple? | Cómo |
|-----------|----------|------|
| I. Block theme puro | Sí | `page-afa.html` (o equivalente) + `patterns/*.php` |
| II. theme.json fuente de verdad | Sí | Presets 001; CSS solo organigrama, 2 cols→stack, lista docs |
| III. Lógica en plugins | Sí | Sin CPT personas; PDFs = medios; sin formularios |
| IV. Editable sin código | Sí | Contenido en la página; patterns con defaults Figma |
| V. Accesibilidad AA | Sí | Overlay hero; jerarquía H1→H2→H3; foco visible |
| VI. Privacidad / rendimiento | Sí | Fuentes locales; sin scripts terceros |
| VII. Español primero | Sí | Cadenas `afa-poveda` |
| VIII. Verificación | Sí | Checklist en quickstart |

**Post-design**: Sin violaciones. Complexity Tracking vacío.

## Project Structure

### Documentation (this feature)

```text
specs/003-sobre-nosotros/
├── plan.md
├── research.md
├── data-model.md
├── quickstart.md
├── contracts/
│   └── ui-sobre-nosotros.md
└── tasks.md                 # /speckit-tasks (aún no)
```

### Source Code (theme root)

```text
templates/
└── page-afa.html            # NUEVO — header + main(post-content) + footer; sin post-title

patterns/
├── sobre-nosotros.php           # NUEVO — pattern compuesto (opcional, insertar todo)
├── sobre-hero.php               # NUEVO
├── sobre-quienes-somos.php      # NUEVO
├── sobre-organigrama.php        # NUEVO
├── sobre-que-hace.php           # NUEVO
├── sobre-utilidad-comisiones.php # NUEVO
└── sobre-documentos.php         # NUEVO

style.css                    # Reglas justificadas: cards organigrama, layout utilidad/comisiones, docs
```

**Structure Decision**: Página WP con slug `/afa/`, plantilla «AFA / Sobre nosotros» que solo pinta el contenido (el H1 va en el hero). Patterns por sección + uno compuesto para montaje inicial. No se usa `page-with-sidebar` (Figma escritorio es una columna).

## Complexity Tracking

> Sin violaciones de constitución que justificar.
