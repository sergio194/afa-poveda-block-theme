# Implementation Plan: Estilos del configurador de semana

**Branch**: `013-configurador-semana` | **Date**: 2026-10-27 | **Spec**: [spec.md](./spec.md)

## Summary

CSS «Configurador de semana (013)», plantilla `page-configurador` y pattern `configurador-aviso`. Sin JS.

## Technical Context

HTML de bloques, PHP de pattern, CSS. Verificación con 3 actividades ZZ013 y una página con el bloque; capturas; contraste; plugin desactivado.

## Constitution Check

I–VIII cumplidos (III: sin lógica; V: foco, contraste, no solo color; VI: sin JS).

## Project Structure

```text
templates/page-configurador.html
patterns/configurador-aviso.php
theme.json   # customTemplates: page-configurador
style.css    # «Configurador de semana (013)»
```

## Complexity Tracking

| Desviación | Motivo |
|---|---|
| Sin sticky en móvil | Accesibilidad (reflow y foco no oculto) |
| Sin panel de arrastrar y soltar | Lógica/JS del plugin |
| Hex `#b3261e` | Sin preset de error |
