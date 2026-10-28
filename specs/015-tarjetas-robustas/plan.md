# Implementation Plan: Tarjetas robustas ante imagen rota y textos largos

**Branch**: `015-tarjetas-robustas` | **Date**: 2026-10-28 | **Spec**: [spec.md](./spec.md)

## Summary

Reproducir con datos ZZ en la copia de la BD; sección CSS común «Tarjetas robustas (015)»: alt y icono de imagen rota ocultos tras el marcador, proporción en el contenedor, `overflow-wrap`, clamp de extractos en el párrafo y `flex-wrap: nowrap` en las tarjetas de avisos. Clase `afa-single-media` en la imagen de `single.html`.

## Technical Context

CSS y HTML de bloques. Verificación: capturas con Chrome headless (1280) y captura en iframe para 390/900 con medición de desbordes por script; ida y vuelta de bloques; `php -l`/`json.tool`.

## Constitution Check

I Sí · II Sí (presets; el degradado es el mismo de 009/012) · III Sí · IV Sí · V Sí: el alt sigue disponible para lectores; sin opacidades sobre texto · VI Sí: refuerza «imágenes con aspect-ratio» · VII Sí · VIII Sí.

## Project Structure

```text
style.css             # «Tarjetas robustas (015)»
templates/single.html # className afa-single-media en post-featured-image
```

## Complexity Tracking

| Decisión | Por qué |
|---|---|
| `!important` en `flex-wrap: nowrap` | El layout flex de WordPress genera `flex-wrap: wrap` con una clase de contenedor de mayor especificidad |
| `img::before` | Única forma sin JS de tapar el icono de imagen rota; no se pinta con imágenes que cargan |
