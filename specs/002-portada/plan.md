# Implementation Plan: Portada (HOME)

**Branch**: `002-portada` | **Date**: 2026-09-16 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/002-portada/spec.md`

## Summary

Sustituir la portada actual (listado de entradas + sidebar) por la composición de Figma HOME / HOME-MOBILE: hero, cuatro accesos rápidos, Actualidad y Avisos, Últimas Noticias y CTA de comunidad. Implementación en block theme puro mediante `templates/front-page.html` y patterns PHP reutilizables, con Query Loop nativos y tokens de la spec 001. Sin formularios ni lógica de negocio en el tema.

## Technical Context

**Language/Version**: PHP ≥ 7.4 (tema), HTML de bloques WordPress, CSS mínimo en `style.css`

**Primary Dependencies**: WordPress ≥ 6.9 (FSE), `theme.json` v3, bloques core (`group`, `cover`/`image`, `columns`, `query`, `post-template`, `buttons`, `heading`, `paragraph`)

**Storage**: Contenido en WP (entradas, páginas, medios, sticky/categoría). Sin tablas nuevas del tema.

**Testing**: Validación manual (Editor del sitio + front); `php -l` en patterns; JSON válido si se toca `theme.json`; capturas 390 / 900 / 1280 px vs Figma

**Target Platform**: Sitio Local / producción WordPress, navegadores modernos; anchos de referencia 390–1280 px

**Project Type**: Block theme (FSE) — presentación en tema

**Performance Goals**: Portada usable en < 3 s en red local; sin JS de terceros; imágenes con `aspect-ratio` / tamaños WP

**Constraints**: Constitución (tokens en theme.json; sin lógica de plugins en tema; WCAG AA; español + dominio `afa-poveda`; editable por voluntarios)

**Scale/Scope**: 1 plantilla front-page, ~5 patterns de sección, ajustes CSS responsive puntuales, assets de iconos de acceso

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

| Principio | ¿Cumple? | Cómo |
|-----------|----------|------|
| I. Block theme puro | Sí | `front-page.html` + `patterns/*.php`, sin page builders |
| II. theme.json fuente de verdad | Sí | Presets existentes; CSS solo para grid 2×2, overlay hero, iconos |
| III. Lógica en plugins | Sí | Solo enlaces a `/hazte-socio/`, `/newsletter/`, etc.; sin formularios |
| IV. Editable sin código | Sí | Patterns + Query Loop; textos y URLs editables en el editor |
| V. Accesibilidad AA | Sí | Overlay en hero; contraste botones de 001; foco visible |
| VI. Privacidad / rendimiento | Sí | Fuentes locales; sin scripts terceros; sin jQuery |
| VII. Español primero | Sí | Cadenas `esc_html_e` / `esc_attr_e` con `afa-poveda` |
| VIII. Verificación | Sí | Checklist en quickstart |

**Post-design**: Sin violaciones. Complexity Tracking vacío.

## Project Structure

### Documentation (this feature)

```text
specs/002-portada/
├── plan.md
├── research.md
├── data-model.md
├── quickstart.md
├── contracts/
│   └── ui-portada.md
└── tasks.md                 # /speckit-tasks (aún no)
```

### Source Code (theme root)

```text
templates/
├── front-page.html          # NUEVO — portada Figma
└── home.html                # Conservar como índice de blog (noticias + sidebar)

patterns/
├── home-hero.php            # NUEVO
├── home-quick-access.php    # NUEVO
├── home-avisos.php          # NUEVO
├── home-latest-news.php     # NUEVO
└── home-community-cta.php   # NUEVO

assets/
└── icons/                   # SVG accesos (comedor, extraescolares, calendario, voluntarios)

style.css                    # Reglas justificadas: hero overlay, grid accesos, avisos mobile
functions.php                # Solo si hace falta registrar categoría de pattern / enqueue nada nuevo
```

**Structure Decision**: Un solo tema block; plantilla `front-page.html` orquesta patterns. `home.html` sigue sirviendo el listado con sidebar cuando exista página de entradas (alineado con spec 003).

## Complexity Tracking

> Sin violaciones de constitución que justificar.
