# Research: Hazte Socio

**Feature**: `006-hazte-socio` | **Date**: 2026-09-18

## R1 — Página estática + patterns (como 003/005)

**Decision**: Landing `/hazte-socio/` = página WP con plantilla `page-hazte-socio` (sin `post-title`) y patterns `hazte-*`. El CTA de cabecera ya apunta a `/hazte-socio/` (`parts/header.html`).

**Rationale**: Constitución IV; mismo patrón editorial que AFA/Servicios. No hace falta CPT de socios en el tema.

**Alternatives considered**: CPT «solicitud» en el tema — prohibido (III). Solo `page.html` genérica — duplica H1.

## R2 — Formulario = plugin; hueco en el pattern

**Decision**: Pattern `hazte-pertenecer` incluye columna derecha `.afa-hazte-form` con:
1. Placeholder editable: párrafo de fallback («El formulario se activará en breve») + enlace a Contacto, **o**
2. Tras montaje editorial: bloque/shortcode del plugin de formularios (Contact Form 7, Gravity Forms, WPForms, Fluent Forms, etc. — el que use el sitio).

El tema **no** registra el formulario ni procesa el POST. Estilos CSS bajo `.afa-hazte-form` para inputs/botón del plugin (selectores genéricos + comentario de justificación).

**Rationale**: Spec FR-005 / R1; constitución III.

**Alternatives considered**:
- HTML `<form>` en el pattern — no envía de verdad; engaña a la familia.
- Shortcode hardcodeado de un plugin concreto en PHP — acopla el tema a un vendor.
- Frames de error/éxito como plantillas del tema — fuera de alcance (R6).

## R3 — Campos canónicos y privacidad

**Decision**: Documentar en quickstart los campos que debe configurar el plugin: Nombre del tutor/a, DNI/NIE, Email, checkbox de privacidad (RGPD). Un solo formulario para todos los anchos (spec R2).

**Rationale**: Escritorio es canónico; privacidad no está en el mock desktop pero es obligatoria en la práctica.

**Alternatives considered**: Dos formularios móvil/escritorio — mantenimiento doble.

## R4 — Hero: columns + ilustración local

**Decision**: `hazte-hero`: columns ~50/50 en escritorio (texto | imagen). Imagen vía `get_theme_file_uri` placeholder o medio editable; `aspect-ratio` / CSS para evitar CLS. Ancla `#pertenecer` (o `#formulario`) en el CTA primario; secundario «Saber más» → `#que-hacemos`.

**Rationale**: Coincide con Figma; sin JS.

**Alternatives considered**: Cover full-bleed — no es el layout de este frame (texto + ilustración lado a lado).

## R5 — Grid «qué hacemos» y «ayudar»

**Decision**: Seis cards en columns 3×2 (`hazte-que-hacemos`); tres cards en fila (`hazte-ayudar`). Iconos con bloque `core/icon` y colección `afa-poveda` (SVG en `assets/icons/`, `currentColor`). Stack móvil vía CSS/`columns`.

**Rationale**: Mismo patrón que accesos de la home; editables en el editor sin filtros CSS sobre imagen.

## R6 — Bloque pertenecer (cuota | form)

**Decision**: Grupo/columns: izquierda fondo `primary` (cuota + checklist beneficios); derecha superficie blanca con form. ID/`anchor` `pertenecer` para el scroll del hero.

**Rationale**: Layout distintivo del Figma; tokens 001.

## R7 — Dudas mailto

**Decision**: Pattern `hazte-dudas` con icono + heading + enlace `mailto:` editable (default del mock o el que fije la junta). No unificar con el email del pie por código.

**Rationale**: Spec US5; editorial.

## R8 — Menú / CTA activo

**Decision**: El botón de cabecera ya es enlace a `/hazte-socio/`. Si se añade ítem de menú, marcar activo en esta plantilla (CSS `page-template-page-hazte-socio` o clase body). No tocar rediseño del header.

**Rationale**: Spec edge case; mínimo cambio.

## Resolved clarifications

No quedan NEEDS CLARIFICATION en Technical Context. Plugin concreto = decisión de entorno Local/producción, documentada en quickstart sin fijarla en el tema.
