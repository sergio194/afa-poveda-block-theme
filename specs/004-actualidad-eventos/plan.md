# Implementation Plan: Actualidad y Eventos (Noticias)

**Branch**: `004-actualidad-eventos` | **Date**: 2026-09-17 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/004-actualidad-eventos/spec.md`

## Summary

Sustituir el listado blog + sidebar (`home.html` / `archive.html` / `search.html` / `single.html`) por el archivo «Actualidad y Eventos» de Figma y su ficha de detalle. Block theme puro: plantillas FSE + patterns PHP, Query Loop nativo (`inherit: true`) a 6 por página, filtros = archivo de categoría, búsqueda nativa, relacionadas con un filtro mínimo de query. Tokens de la spec 001. Sin CPT, sin taxonomías registradas por el tema, sin JS a medida.

## Technical Context

**Language/Version**: PHP ≥ 7.4 (tema), HTML de bloques WordPress, CSS mínimo en `style.css`

**Primary Dependencies**: WordPress ≥ 7.1 (FSE), `theme.json` v3, bloques core (`group`, `query`, `post-template`, `post-featured-image`, `post-title`, `post-excerpt`, `post-date`, `post-terms`, `read-more`, `query-pagination`, `search`, `categories`, `heading`, `paragraph`, `columns`, `query-no-results`)

**Storage**: Entradas WP (`post`) + categorías nativas + medios. Página de entradas slug `noticias`. Sin tablas ni CPT del tema.

**Testing**: Validación manual (archivo `/noticias/`, categoría, búsqueda, detalle + Editor); `php -l` en patterns y `functions.php`; capturas 390 / 900 / 1280 px vs Figma

**Target Platform**: Sitio Local / producción WordPress; anchos de referencia 390–1280 px

**Project Type**: Block theme (FSE) — presentación en tema

**Performance Goals**: Archivo usable en < 3 s en red local; sin JS de terceros; imágenes de ficha con `aspect-ratio` 16:9

**Constraints**: Constitución (tokens; sin lógica de plugins en tema; WCAG AA; español + `afa-poveda`; editable por voluntarios)

**Scale/Scope**: 4 plantillas tocadas (`home`, `archive`, `search`, `single`; `index` alineado), ~4–5 patterns, filtro de query relacionadas + share/media en `functions.php`, CSS de fichas / toolbar / paginación / migas

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

| Principio | ¿Cumple? | Cómo |
|-----------|----------|------|
| I. Block theme puro | Sí | Plantillas HTML + `patterns/*.php`; sin page builders |
| II. theme.json fuente de verdad | Sí | Presets 001; CSS solo toolbar/select, placeholder, paginación Figma, migas, relacionadas, share |
| III. Lógica en plugins | Sí | Sin CPT/taxonomías nuevas; entradas y categorías nativas; relacionadas = ajuste de Query Loop, no negocio |
| IV. Editable sin código | Sí | Hero/copy en pattern de plantilla; noticias = entradas; categorías las crea la junta |
| V. Accesibilidad AA | Sí | H1 único; select nativo + enlace «Todas»; foco visible; contraste toolbar |
| VI. Privacidad / rendimiento | Sí | Fuentes locales; sin scripts terceros; `aspect-ratio` en fichas |
| VII. Español primero | Sí | Cadenas `afa-poveda` |
| VIII. Verificación | Sí | Checklist en quickstart |

**Post-design**: Sin violaciones. Complexity Tracking vacío.

## Project Structure

### Documentation (this feature)

```text
specs/004-actualidad-eventos/
├── plan.md
├── research.md
├── data-model.md
├── quickstart.md
├── contracts/
│   └── ui-actualidad-eventos.md
└── tasks.md                 # /speckit-tasks (generado)
```

### Source Code (theme root)

```text
templates/
├── home.html                # REESCRIBIR — archivo Actualidad (página de entradas)
├── archive.html             # REESCRIBIR — categorías (mismo layout, query heredada)
├── search.html              # REESCRIBIR — resultados con las mismas fichas
├── single.html              # REESCRIBIR — detalle + relacionadas (sin aside 001)
└── index.html               # ALINEAR — fallback = mismo archivo que home

patterns/
├── noticias-hero.php        # NUEVO — eyebrow + H1 + texto de apoyo
├── noticias-toolbar.php     # NUEVO — buscar + desplegable; «Todas» fuera del archivo
├── noticias-grid.php        # NUEVO — Query inherit, grid 3×2, paginación, vacío
├── noticias-crumbs.php      # NUEVO — migas del detalle
└── posts-list.php           # SUSTITUIR o dejar de usar en estas plantillas

functions.php                # Relacionadas `.afa-related-news`; share URLs; tamaño `afa-news-card` + fondo media
style.css                    # Reglas justificadas: toolbar, placeholder, paginación, detalle, relacionadas, share
```

**Structure Decision**: `home.html` es el archivo cuando hay página de entradas `/noticias/` (ya enlazada desde la portada 002). `archive.html` reutiliza hero + toolbar + grid para que filtrar no cambie de «piel». `search.html` comparte el grid. `single.html` es dos columnas (artículo | relacionadas) en escritorio. No se usa `parts/sidebar.html` en estas vistas. `front-page.html` no se toca.

## Complexity Tracking

> Sin violaciones de constitución que justificar.
