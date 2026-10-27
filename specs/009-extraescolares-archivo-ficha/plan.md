# Implementation Plan: Extraescolares — archivo y ficha

**Branch**: `009-extraescolares-archivo-ficha` | **Date**: 2026-10-27 | **Spec**: [spec.md](./spec.md)

## Summary

Dos plantillas (`archive-afa_extraescolar`, `single-afa_extraescolar`), dos patterns (banner de dudas, aviso de socio) y CSS para las clases `afa-core-extraescolar*` del contrato §8. Reutiliza de la 012 la guarda de «tipo inexistente» y el patrón de ficha (`afa-servicio-card`) con variante propia `afa-extra-card`.

## Technical Context

PHP ≥ 7.4, bloques core `query`, `post-template`, `post-featured-image`, `post-title`, `post-excerpt`, `query-pagination`, `query-no-results`, `columns`, `group`; bloques del plugin. WP 7.1. Verificación: json.tool, php -l, HTTP contra copia de BD, capturas Chrome headless, contraste calculado.

## Constitution Check

| Principio | Cumple | Cómo |
|---|---|---|
| I | Sí | Plantillas HTML + patterns PHP |
| II | Sí | Presets; CSS solo para clases del plugin con comentario |
| III | Sí | Sin CPT/lógica; filtros y precios son bloques del plugin |
| IV | Sí | Textos fijos editables en plantilla/pattern |
| V | Sí | H1 único, foco visible, contraste calculado |
| VI | Sí | Sin JS ni terceros |
| VII | Sí | `afa-poveda` |
| VIII | Sí | Ver quickstart |

## Project Structure

```text
templates/archive-afa_extraescolar.html
templates/single-afa_extraescolar.html
patterns/extraescolares-dudas.php        # banner azul con 2 botones
patterns/extraescolar-socio.php          # aviso «¿Aún no eres socio?»
functions.php                            # guarda genérica de Query sin plugin
style.css                                # bloque «Extraescolares (009)»
```

## Complexity Tracking

| Desviación | Motivo |
|---|---|
| Píldora de categoría de un solo color | Sin lógica en el tema (sin clase de término) |
| Iconos de requisitos genéricos | El plugin imprime una lista sin icono por ítem |
| Guarda `pre_render_block` generalizada a `afa_servicio` y `afa_extraescolar` | Reutilizar la de la 012 en vez de duplicarla |
