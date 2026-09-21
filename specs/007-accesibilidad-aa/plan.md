# Implementation Plan: Accesibilidad WCAG AA del tema

**Branch**: `007-accesibilidad-aa` | **Date**: 2026-09-20 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/007-accesibilidad-aa/spec.md`

## Summary

Validar e implementar el cumplimiento **WCAG 2.2 nivel AA** en la superficie pública del tema AFA Padre Poveda (plantillas, partes, patterns, tokens y CSS de presentación). Enfoque: auditoría documentada → corrección de hallazgos del tema (contraste, teclado/foco, skip link, encabezados/landmarks, iconos, movimiento, zoom) → informe de cierre + guía breve para voluntarias. Sin lógica de plugins ni sello externo.

## Technical Context

**Language/Version**: PHP ≥ 7.4 (tema), HTML de bloques WordPress, CSS en `theme.json` / `style.css`

**Primary Dependencies**: WordPress ≥ 7.1 (FSE), `theme.json` v3, bloques core; herramientas de contraste (manual o extensión); inspección de teclado y árbol de accesibilidad del navegador / lector de pantalla

**Storage**: N/A (sin datos nuevos). Artefactos de auditoría en `specs/007-accesibilidad-aa/` (informe + refinamientos en `spec.md`)

**Testing**: Auditoría manual según [quickstart.md](./quickstart.md) y [contracts/a11y-aa.md](./contracts/a11y-aa.md); `php -l` / JSON válidos si se toca PHP/JSON; capturas 390 / 900 / 1280; zoom 200 %

**Target Platform**: Sitio Local / producción WordPress; anchos 390–1280 px; teclado + zoom

**Project Type**: Block theme (FSE) — remediación transversal de presentación

**Performance Goals**: Sin JS de terceros; sin scripts nuevos salvo justificación constitucional; CSS de foco/skip/motion mínimo

**Constraints**: Constitución (tokens en `theme.json`; CSS solo lo no expresable; sin lógica de plugins; AA gana sobre Figma con desviación documentada; español + `afa-poveda`)

**Scale/Scope**: ~18 plantillas públicas + `parts/header|footer|sidebar` + patterns de specs 001–006; matriz de contraste de tokens; 1 skip link global; informe + guía editorial corta

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

| Principio | ¿Cumple? | Cómo |
|-----------|----------|------|
| I. Block theme puro | Sí | Cambios en templates/parts/patterns/`theme.json`/`style.css`/`functions.php` solo si hace falta presentación a11y |
| II. theme.json fuente de verdad | Sí | Pares de color y foco global vía presets/elementos; CSS justificado (skip visible en foco, reduced-motion, unificación de destinos) |
| III. Lógica en plugins | Sí | Hallazgos de formularios = clasificación «plugin»; el tema no remedia vendors |
| IV. Editable sin código | Sí | Skip link con texto traducible; guía editorial para voluntarias; no hardcodear copy de páginas |
| V. Accesibilidad AA | Sí | Esta feature **es** el gate V ampliado a auditoría + remediación completa |
| VI. Privacidad / rendimiento | Sí | Sin scripts terceros; fuentes locales intactas |
| VII. Español primero | Sí | «Saltar al contenido» y guía en español (`afa-poveda`) |
| VIII. Verificación | Sí | Checklist en quickstart + informe de auditoría |

**Post-design**: Sin violaciones. Complexity Tracking vacío.

## Project Structure

### Documentation (this feature)

```text
specs/007-accesibilidad-aa/
├── plan.md
├── research.md
├── data-model.md
├── quickstart.md
├── contracts/
│   ├── a11y-aa.md              # Criterios, landmarks, skip, teclado, contraste
│   └── guia-editorial-a11y.md  # Checklist corta para voluntarias
├── audit.md                    # Informe de hallazgos (se rellena en implementación)
└── tasks.md                    # /speckit-tasks (aún no)
```

### Source Code (theme root)

```text
parts/
└── header.html                 # AÑADIR skip link (primer foco) → #contenido

templates/
├── front-page.html             # ASEGURAR <main id="contenido" …>
├── home.html, index.html, page*.html, single.html, archive.html,
│   search.html, 404.html, page-afa.html, page-servicios.html, …
└── (todas las plantillas públicas con <main>)

theme.json                      # Ajustes de tokens / :focus-visible si auditoría lo exige
style.css                       # .afa-skip-link; prefers-reduced-motion; foco residual justificado
functions.php                   # Solo si hace falta filtro presentacional (p. ej. alt decorativo ya existente)
patterns/                       # Corregir H1/jerarquía, aria/alt, CTAs genéricos según hallazgos
specs/007-accesibilidad-aa/
└── audit.md                    # Inventario pasa/falla/N/A + remediaciones
```

**Structure Decision**: Feature transversal, no página nueva. El skip link vive en la parte `header` (un solo sitio); el destino canónico es `#contenido` en el `<main>` de cada plantilla. La auditoría se documenta en `audit.md`; las desviaciones Figma por AA se anexan a la tabla de refinamientos de `spec.md`.

## Complexity Tracking

> Sin violaciones de constitución que justificar.
