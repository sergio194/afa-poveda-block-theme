# Implementation Plan: Servicios AFA (listado y detalle)

**Branch**: `005-servicios` | **Date**: 2026-09-18 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/005-servicios/spec.md`

## Summary

Implementar el hub «Servicios AFA» y la ficha de detalle de referencia «Comedor Escolar» según Figma (listado homogéneo + detalle con sidebar de inscripción/documentación). Block theme puro: páginas WP + plantillas de página sin H1 duplicado + patterns PHP insertables/editables; tokens de la spec 001; CSS mínimo justificado (rejilla de fichas, hero cover, sidebar apilable, acordeón FAQ, indicadores nutricionales). Sin CPT, sin formularios ni pagos en el tema: el CTA «Inscribirse Ahora» es un enlace configurable.

## Technical Context

**Language/Version**: PHP ≥ 7.4 (tema), HTML de bloques WordPress, CSS mínimo en `style.css`

**Primary Dependencies**: WordPress ≥ 7.1 (FSE), `theme.json` v3, bloques core (`cover`, `group`, `columns`, `heading`, `paragraph`, `image`, `buttons`/`button`, `file`, `details`, `list`, `separator`, `spacer`)

**Storage**: Páginas WP + medios (imágenes hero/fichas, PDFs de menús y documentación). Sin tablas ni CPT del tema.

**Testing**: Validación manual (`/servicios/`, `/servicios/comedor-escolar/` + Editor); `php -l` en patterns y `functions.php` si se toca; `python3 -m json.tool` en JSON tocado; capturas 390 / 900 / 1280 px vs Figma

**Target Platform**: Sitio Local / producción WordPress; anchos de referencia 390–1280 px

**Project Type**: Block theme (FSE) — presentación en tema

**Performance Goals**: Páginas usables en < 3 s en red local; sin JS de terceros; imágenes de ficha con `aspect-ratio` estable

**Constraints**: Constitución (tokens; sin lógica de plugins en tema; WCAG AA; español + `afa-poveda`; editable por voluntarios; fuentes locales)

**Scale/Scope**: 1–2 plantillas de página, ~8–10 patterns (listado + detalle Comedor), CSS justificado para fichas/hero/sidebar/FAQ/stats; contenido de ejemplo de los 6 servicios del mock

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

| Principio | ¿Cumple? | Cómo |
|-----------|----------|------|
| I. Block theme puro | Sí | Plantillas HTML + `patterns/*.php`; sin page builders |
| II. theme.json fuente de verdad | Sí | Presets 001; CSS solo layout fichas, hero overlay, sidebar stack, details FAQ, stats, badge descuento |
| III. Lógica en plugins | Sí | Sin CPT/taxonomías; PDFs = medios; inscripción = enlace a plugin/página externa |
| IV. Editable sin código | Sí | Contenido en páginas; patterns con defaults Figma; precios/enlaces editables |
| V. Accesibilidad AA | Sí | H1 único por página; `core/details` nativo; contraste píldoras/CTA; foco visible |
| VI. Privacidad / rendimiento | Sí | Fuentes locales; sin scripts terceros; `aspect-ratio` en media de fichas |
| VII. Español primero | Sí | Cadenas `afa-poveda` |
| VIII. Verificación | Sí | Checklist en quickstart |

**Post-design**: Sin violaciones. Complexity Tracking vacío.

## Project Structure

### Documentation (this feature)

```text
specs/005-servicios/
├── plan.md
├── research.md
├── data-model.md
├── quickstart.md
├── contracts/
│   └── ui-servicios.md
└── tasks.md                 # /speckit-tasks (aún no)
```

### Source Code (theme root)

```text
templates/
├── page-servicios.html          # NUEVO — hub listado (header + main post-content + footer; sin post-title)
└── page-servicio-detalle.html   # NUEVO — detalle de servicio (mismo esqueleto; clase distinta para CSS)

patterns/
├── servicios-page.php               # NUEVO — compuesto opcional: hero + grid + CTA
├── servicios-hero.php               # NUEVO — eyebrow + H1 + apoyo
├── servicios-grid.php               # NUEVO — 6 fichas homogéneas (defaults Figma)
├── servicios-cta.php                # NUEVO — banner dudas (Contactar / FAQ)
├── servicio-comedor.php             # NUEVO — compuesto opcional detalle Comedor
├── servicio-hero.php                # NUEVO — cover + badge + título + subtítulo
├── servicio-alimentacion.php        # NUEVO — texto + 2 puntos con icono
├── servicio-menus-valores.php       # NUEVO — descargas + composición media
├── servicio-faq.php                 # NUEVO — acordeón details
├── servicio-inscripcion.php         # NUEVO — tarjeta azul precios + CTA
└── servicio-documentacion.php       # NUEVO — lista de documentos

style.css                    # Reglas justificadas: .afa-servicios-*, .afa-servicio-*
# functions.php              # Solo si hace falta marcar menú activo en hijas (mínimo)
```

**Structure Decision**: Mismo modelo que spec 003 (Sobre nosotros): páginas estáticas cuyo contenido es un árbol de patterns; la plantilla solo aporta header/main/footer sin `post-title` para no duplicar el H1 del pattern. El listado usa `page-servicios.html`; el detalle Comedor (y futuros servicios) usan `page-servicio-detalle.html` con layout de columnas en el pattern compuesto o en el contenido de la página. No Query Loop ni CPT: las fichas son markup editorial (la junta añade/quita cards editando la página). Extraescolares como sección de menú queda fuera (otra feature).

## Complexity Tracking

> Sin violaciones de constitución que justificar.
