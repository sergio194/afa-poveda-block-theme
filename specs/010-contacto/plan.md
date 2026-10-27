# Implementation Plan: Contacto

**Branch**: `010-contacto` | **Date**: 2026-10-27 | **Spec**: [spec.md](./spec.md)

## Summary

Plantilla `page-contacto` + patterns `contacto-formulario` (bloque del plugin o provisional) y `contacto-info`, con CSS acotado `.afa-contacto*`. Estilos del formulario reutilizados de la 011.

## Technical Context

HTML de bloques, PHP de pattern, CSS. Verificación: json.tool, php -l, HTTP con página ZZ010 con y sin plugin, capturas, contraste.

## Constitution Check

I Sí (plantilla/pattern) · II Sí (presets) · III Sí (el formulario es el bloque del plugin) · IV Sí (textos editables) · V Sí · VI Sí (sin mapa ni JS) · VII Sí · VIII Sí.

## Project Structure

```text
templates/page-contacto.html
patterns/contacto-formulario.php
patterns/contacto-info.php
theme.json        # customTemplates: page-contacto, page-formulario
style.css         # «Contacto (010)»
```

## Complexity Tracking

Vacío (sin violaciones). Desviación de contenido: dirección del pie en lugar de la del Figma.
