# Implementation Plan: Estilos de formularios

**Branch**: `011-estilos-formularios` | **Date**: 2026-10-27 | **Spec**: [spec.md](./spec.md)

## Summary

Bloque CSS «Formularios (011)» para `afa-core-form*` y `.mailpoet_form`, plantilla `page-formulario` y pattern de newsletter con el bloque del plugin. Sin JS.

## Technical Context

CSS + HTML de bloques + PHP de pattern. Verificación: json.tool, php -l, HTTP con páginas ZZ011 (inscripción, contacto, alta de socio, newsletter), simulación de estados de error/éxito con HTML de prueba equivalente al contrato, capturas Chrome headless, contraste calculado.

## Constitution Check

Todas las reglas se cumplen (III: sin lógica; V: contraste y foco calculados; VI: sin JS ni terceros; II: presets, único hex = error, comentado). 

## Project Structure

```text
templates/page-formulario.html
patterns/newsletter-formulario.php
style.css   # «Formularios (011)»
```

## Complexity Tracking

| Desviación | Motivo |
|---|---|
| Hex `#b3261e` para errores | No hay preset de error (mismo criterio que 005) |
| Tracker sin iconos por paso | El plugin no los imprime |
