# Implementation Plan: Menú móvil

**Branch**: `016-menu-movil` | **Date**: 2026-10-28 | **Spec**: [spec.md](./spec.md)

## Summary

Parte `menu-movil` (área `navigation-overlay`, WP 7.1) usada como overlay por la navegación de la cabecera: logo, cerrar, «Hazte socio», navegación vertical y buscador. CSS del cajón y del acordeón. Filtro `render_block` que da a cada submenú del cajón su propio `overlayOpenedBy` y quita los directivos de hover.

## Technical Context

HTML de bloques, CSS, PHP (`WP_HTML_Tag_Processor`). Verificación: capturas a 390/900 con el menú abierto por script dentro de un iframe, prueba scriptada de `aria-expanded`/Escape/foco, 1280 sin cambios, ida y vuelta de bloques, `php -l` 7.4 y 8.5, contraste calculado.

## Constitution Check

I Sí (parte en `parts/`, sin subcarpetas) · II Sí (presets; la sombra y el fondo atenuado no tienen preset) · III Sí · IV **Mejora**: el cajón se edita en el Editor del sitio · V Sí (diálogo modal de core, 44 px, contraste) · VI Sí (sin JS propio) · VII Sí · VIII Sí.

## Project Structure

```text
parts/menu-movil.html     # nueva
parts/header.html         # "overlay":"menu-movil"
theme.json                # templateParts: menu-movil (navigation-overlay)
functions.php             # afa_poveda_mobile_menu_accordion()
style.css                 # «Menú móvil (016)»; order:2 de tablet solo para la navegación de cabecera
```

## Complexity Tracking

| Decisión | Por qué | Alternativa descartada |
|---|---|---|
| Reescribir `data-wp-context` de los submenús al pintar | Core da por abiertos todos los submenús dentro del overlay; así se reutiliza su lógica (aria, foco, Escape) sin JS propio | JS propio: duplicaría estado y `aria-expanded` chocaría con el de core. `openSubmenusOnClick`: los padres dejarían de ser enlaces en escritorio |
| `!important` en `justify-content` y `box-shadow` | Ganar a la alineación derecha heredada y a las reglas de «activo por URL» de 004/009/012 | Reescribir esas reglas |
