# Implementation Plan: Enlaces internos y destinos

**Branch**: `014-enlaces-internos` | **Date**: 2026-10-28 | **Spec**: [spec.md](./spec.md)

## Summary

Filtro `render_block` que reescribe las rutas canónicas del tema al permalink real buscando la página por plantilla asignada (más servicio, archivo del CPT, página de entradas y privacidad). Segundo filtro para los enlaces marcador `#`. Ajustes mínimos en patterns (configurador a ruta canónica, «Ver todo» fuera, fichas de ejemplo) y script de comprobación de enlaces.

## Technical Context

PHP 7.4 (filtros en `functions.php`), HTML de bloques, CSS mínimo, bash. Verificación: `php -l`, `json.tool`, ida y vuelta parse/serialize de todas las plantillas y patterns, WP-CLI `eval-file` con casos límite, HTTP con el comprobador sobre la copia de la BD, captura 1280/390.

## Constitution Check

I Sí · II Sí (un color de preset) · III Sí: no registra contenido ni lógica de negocio; es presentación de los enlaces del propio tema, como el filtro ya existente de «Compartir noticia» · IV **Mejora**: el destino se cambia eligiendo plantilla en el editor · V Sí (contraste del texto pendiente: 9,32:1 sobre base, 8,02:1 sobre surface-high) · VI Sí (sin JS) · VII Sí · VIII Sí.

## Project Structure

```text
functions.php                         # afa_poveda_internal_link_targets / _resolve_ / _internal_links / _placeholder_links
style.css                             # «Enlaces internos (014)»
templates/archive-afa_extraescolar.html
patterns/home-avisos.php, servicios-grid.php
docs/comprobar-enlaces.sh
```

## Complexity Tracking

| Decisión | Por qué | Alternativa descartada |
|---|---|---|
| Reescritura en el render (regex sobre `href`) | Los patterns referenciados con `wp:pattern` y el menú guardan URLs fijas; así se arreglan sin tocar la BD | Sacar los enlaces a un menú: cambia el diseño y obliga a montar menús nuevos |
| Consulta por `_wp_page_template` | Es la señal que la junta ya usa; caché estática por petición (≤ 6 consultas) | Ajuste de opciones propio: sería configuración de sitio (plugin) |
