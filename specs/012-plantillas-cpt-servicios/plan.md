# Implementation Plan: Plantillas del CPT Servicios

**Branch**: `012-plantillas-cpt-servicios` | **Date**: 2026-10-27 | **Spec**: [spec.md](./spec.md)

**Input**: Feature specification from `/specs/012-plantillas-cpt-servicios/spec.md`

## Summary

Dar al tipo `afa_servicio` del plugin una plantilla de detalle (`single-afa_servicio.html`) con el diseño de la 005 (hero cover con imagen destacada, dos columnas 2/3 + 1/3, apilado en móvil), un pattern de listado dinámico (Query Loop) con las fichas de la 005, y el CSS del tema para las clases `afa-core-servicio-*` del contrato §7 (el plugin casi no aporta CSS). Sin registrar nada en el tema; sin el plugin, todo lo existente de la 005 sigue igual.

## Technical Context

**Language/Version**: PHP ≥ 7.4 (patterns), HTML de bloques, CSS en `style.css`

**Primary Dependencies**: WordPress ≥ 7.1, `theme.json` v3; bloques core `cover`, `post-featured-image`, `post-title`, `post-content`, `post-terms`, `post-excerpt`, `post-template`, `query`, `query-no-results`, `read-more`, `columns`, `group`; bloques del plugin `afa-padre-poveda/servicio-*` (opcionales)

**Storage**: N/A (los datos son del plugin)

**Testing**: `json.tool`, `php -l`, peticiones HTTP al servidor de pruebas (copia de la BD en Local), render de plantilla con y sin el plugin, captura 390/900/1280 si hay navegador, cálculo de contraste

**Target Platform**: WordPress 7.1.x, PHP 8.5 en Local (mínimo declarado 7.4)

**Project Type**: Block theme (FSE)

**Performance Goals**: sin JS nuevo; imágenes con `aspect-ratio`

**Constraints**: constitución; contrato plugin↔tema §4 (presets), §7 (clases/bloques)

**Scale/Scope**: 1 plantilla, 1-2 patterns, ~120 líneas de CSS

## Constitution Check

| Principio | ¿Cumple? | Cómo |
|-----------|----------|------|
| I. Block theme puro | Sí | `templates/single-afa_servicio.html` + `patterns/*.php` |
| II. theme.json fuente | Sí | Presets; CSS solo para clases del plugin (no expresable en theme.json), con comentario |
| III. Lógica en plugins | Sí | No se registra CPT/metas/bloques. Los bloques del plugin se referencian por nombre |
| IV. Editable | Sí | Contenido libre en `post-content`; textos fijos editables en el Editor |
| V. Accesibilidad | Sí | Un H1; summary con foco; contraste calculado |
| VI. Privacidad/rendimiento | Sí | Sin scripts; `aspect-ratio` |
| VII. Español | Sí | Cadenas `afa-poveda` |
| VIII. Verificación | Sí | Ver quickstart |

**Post-design**: sin violaciones.

## Project Structure

```text
specs/012-plantillas-cpt-servicios/
├── spec.md · plan.md · research.md · data-model.md · quickstart.md · tasks.md
├── checklists/requirements.md
└── contracts/ui-cpt-servicios.md

templates/single-afa_servicio.html          # nuevo
patterns/servicios-grid-dinamico.php        # nuevo (Query Loop)
style.css                                   # bloque nuevo «Servicios CPT (012)»
functions.php                               # solo si hace falta clase de menú activo (body_class)
```

## Complexity Tracking

| Desviación | Por qué | Alternativa descartada |
|---|---|---|
| Píldora de categoría de un solo color en el listado dinámico (Figma: color por categoría) | `post-terms` no expone clase por término sin lógica en el tema | Mapear slug→color en PHP del tema: lógica de negocio implícita |
