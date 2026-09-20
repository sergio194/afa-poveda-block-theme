# Implementation Plan: Hazte Socio

**Branch**: `006-hazte-socio` | **Date**: 2026-09-18 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/006-hazte-socio/spec.md`

## Summary

Implementar la landing «Hazte Socia/o» según Figma (hero con ilustración y CTAs, grid «qué hacemos», bloque cuota + hueco de formulario, voluntariado, dudas por email). Block theme puro: plantilla de página sin H1 duplicado + patterns PHP editables; tokens de la spec 001; CSS mínimo justificado. El formulario de alta lo aporta un **plugin**; el tema solo maqueta la cáscara y estilos. Sin CPT de socios ni pagos en el tema.

## Technical Context

**Language/Version**: PHP ≥ 7.4 (tema), HTML de bloques WordPress, CSS mínimo en `style.css`

**Primary Dependencies**: WordPress ≥ 7.1 (FSE), `theme.json` v3, bloques core (`group`, `columns`, `heading`, `paragraph`, `image`, `buttons`/`button`, `list`, `separator`, `shortcode` o bloque del plugin de formularios)

**Storage**: Página WP + medios (ilustración hero, iconos). Formulario y envíos = plugin. Sin CPT ni tablas del tema.

**Testing**: Validación manual (`/hazte-socio/` + Editor); con plugin de formularios activo, envío de prueba; `php -l` en patterns; capturas 390 / 900 / 1280 px vs Figma

**Target Platform**: Sitio Local / producción WordPress; anchos de referencia 390–1280 px

**Project Type**: Block theme (FSE) — presentación en tema

**Performance Goals**: Página usable en < 3 s en red local; sin JS de terceros en el tema; ilustración con `aspect-ratio` estable

**Constraints**: Constitución (tokens; formularios fuera del tema; WCAG AA; español + `afa-poveda`; editable por voluntarios)

**Scale/Scope**: 1 plantilla de página, ~6–8 patterns (secciones + compuesto), CSS de grid de fichas, bloque cuota/form, cards de ayuda; enlace cabecera → esta página

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

| Principio | ¿Cumple? | Cómo |
|-----------|----------|------|
| I. Block theme puro | Sí | `page-hazte-socio.html` + `patterns/hazte-*.php` |
| II. theme.json fuente de verdad | Sí | Presets 001; CSS solo layout fichas, bloque pertenecer, stack móvil |
| III. Lógica en plugins | Sí | Formulario + envío + confirmación = plugin; tema = cáscara |
| IV. Editable sin código | Sí | Copy, cuota, fichas, email en contenido de página |
| V. Accesibilidad AA | Sí | H1 único; labels del form vía plugin; contraste CTAs |
| VI. Privacidad / rendimiento | Sí | Fuentes locales; sin scripts terceros en tema; consent en plugin |
| VII. Español primero | Sí | Cadenas `afa-poveda` |
| VIII. Verificación | Sí | Checklist en quickstart |

**Post-design**: Sin violaciones. Complexity Tracking vacío.

## Project Structure

### Documentation (this feature)

```text
specs/006-hazte-socio/
├── plan.md
├── research.md
├── data-model.md
├── quickstart.md
├── contracts/
│   └── ui-hazte-socio.md
└── tasks.md                 # /speckit-tasks (aún no)
```

### Source Code (theme root)

```text
templates/
└── page-hazte-socio.html        # NUEVO — header + main.afa-hazte (post-content) + footer; sin post-title

patterns/
├── hazte-socio-page.php         # NUEVO — compuesto opcional
├── hazte-hero.php               # NUEVO — eyebrow + H1 + copy + CTAs + ilustración
├── hazte-que-hacemos.php        # NUEVO — intro + 6 fichas
├── hazte-pertenecer.php         # NUEVO — cuota + beneficios + hueco formulario (plugin)
├── hazte-ayudar.php             # NUEVO — 3 vías de colaboración
└── hazte-dudas.php              # NUEVO — mailto editable

theme.json                   # customTemplates: page-hazte-socio
style.css                    # .afa-hazte-* justificado
# parts/header — CTA ya apunta a /hazte-socio/ (verificar; no rediseñar)
```

**Structure Decision**: Mismo modelo que Sobre nosotros / Servicios: página estática con plantilla dedicada y patterns por sección. El bloque «¿Cómo pertenecer?» es un layout de dos columnas (cuota | form); el form se inserta como shortcode/bloque del plugin en un contenedor `.afa-hazte-form` con fallback editorial si el plugin no está activo. No `page-with-sidebar`.

## Complexity Tracking

> Sin violaciones de constitución que justificar.
