# Implementation Plan: Calendario escolar y detalle de evento

**Branch**: `008-calendario-evento` | **Date**: 2026-10-27 | **Spec**: [spec.md](./spec.md)

## Summary

Plantilla `page-calendario` con dos patterns (`calendario-mes`, `calendario-lateral`), pattern `evento-contenido` y CSS para los bloques del plugin y para la plantilla nativa de TEC.

## Technical Context

HTML de bloques, PHP de patterns, CSS. TEC 6.18.2 + plugin contrato 1.9. Verificación: json.tool, php -l, HTTP con eventos ZZ008 (3 eventos, 1 categoría), capturas, contraste, plugin desactivado.

## Constitution Check

I Sí · II Sí (presets; hex de fin de semana) · III Sí (sin lógica) · IV Sí (textos editables) · V Sí · VI Sí (sin JS, sin mapas) · VII Sí · VIII Sí.

## Project Structure

```text
templates/page-calendario.html
patterns/calendario-mes.php · calendario-lateral.php · evento-contenido.php
theme.json    # customTemplates: page-calendario
style.css     # «Calendario y eventos (008)»
```

## Complexity Tracking

| Desviación | Motivo |
|---|---|
| Sin `single-tribe_events.html` | TEC impone su plantilla (comprobado); se estiliza |
| Hex `#b3261e` fin de semana | Sin preset (mismo criterio que 005/011) |
