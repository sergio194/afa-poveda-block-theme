# Quickstart: Validar Actualidad y Eventos (004)

**Feature**: `004-actualidad-eventos` | **Date**: 2026-09-17

Guía de validación end-to-end tras implementar. Sin código de implementación aquí.

## Prerequisites

- Tema `afa-poveda` activo en Local
- Spec 001 (tokens, header, footer) y portada 002 (enlace «Ver noticias» → `/noticias/`)
- Locale del sitio en español (fechas)
- Al menos **8 entradas publicadas** en **3 categorías** del conjunto inicial, algunas **sin** imagen destacada

## Setup editorial

1. **Páginas → Añadir**: título «Noticias», slug `noticias`. Publicar (el contenido de la página no se muestra; manda `home.html`).
2. **Ajustes → Lectura**:
   - Tu portada: una página estática (la de inicio de 002).
   - Página de entradas: **Noticias**.
   - Entradas en cada página: **6**.
3. **Entradas → Categorías**: el filtro del archivo es un **desplegable** (no píldoras). Conviene reducir/fusionar categorías heredadas y dejar un conjunto usable (p. ej. Comunidad, Deportes, Cultura, Servicios, AFA).
4. **Editor del sitio → Navegación**: ítem «Noticias» → `/noticias/` (la página de entradas).
5. Si no ves la plantilla nueva: recarga / reactiva el tema; restablece personalizaciones de `home` / `archive` / `single` / `search` / `index` guardadas en BD (Apariencia → Editor → las personalizaciones de usuario pisan los archivos).
6. Tras activar el tamaño `afa-news-card` (768×432): regenerar miniaturas (plugin «Regenerate Thumbnails» o volver a guardar las destacadas) y, si LiteSpeed está activo, **purgar CSS** para ver `style.css` nuevo.

Contrato UI: [ui-actualidad-eventos.md](./contracts/ui-actualidad-eventos.md).

## Checks técnicos

```bash
# Desde la raíz del tema
php -l patterns/noticias-hero.php
php -l functions.php
python3 -m json.tool theme.json > /dev/null
php -l patterns/noticias-grid.php
php -l patterns/noticias-crumbs.php
php -l functions.php
python3 -m json.tool theme.json > /dev/null
python3 -m json.tool styles/sections/afa-card.json > /dev/null
```

(`noticias-crumbs.php` y `posts-list.php` si se tocan: `php -l` también.)

## Escenarios de aceptación (manual)

| # | Escenario | Esperado |
|---|-----------|----------|
| 1 | Abrir `/noticias/` a 1280 px | Hero → toolbar (**píldoras + Más categorías**; sin caja; sin buscador) → 6 fichas 3×2 → paginación; **sin sidebar**; menú «Noticias» activo; píldora «Todas» activa |
| 2 | Abrir `/noticias/` a 390 px | Mismo orden; píldoras con scroll horizontal; fichas a 1 columna; sin desborde |
| 3 | Portada «Ver noticias» | Llega a este archivo |
| 4 | Elegir Comunidad en el desplegable | Listado solo de esa categoría; en archive, enlace «Todas las noticias» vuelve al archivo |
| 5 | Categoría vacía | Mensaje de vacío; layout intacto |
| 6 | Buscar término con acierto **desde la lupa de cabecera** | Fichas del mismo tipo; se puede abrir «Leer más» |
| 7 | Buscar término inexistente (cabecera) | Vacío amable; no error |
| 8 | Página 2 de paginación | Otras noticias; actual marcada |
| 9 | Ficha sin imagen | Hueco 16:9 estable, no layout roto |
| 10 | Leer más | Detalle: migas Inicio › Noticias › …, H1, fecha, cuerpo; relacionadas al lado (desktop) / debajo (móvil) |
| 11 | Relacionada | Abre otra noticia |
| 12 | Publicar una entrada nueva | Aparece en el archivo sin código |
| 13 | Editor: abrir home / single / archive | Ningún bloque «no válido» |
| 14 | Teclado + contraste | Tab con foco; píldoras, «Más categorías», lupa de cabecera, paginación, migas y texto ≥ 4,5:1 |
| 15 | Editor → Parte «Noticias — Filtros» | Se pueden añadir/quitar/renombrar píldoras sin tocar código |

## Comparación Figma

- Desktop archivo: `Actualidad y eventos` (20:2742)
- Mobile archivo: `Actualidad y eventos mobile` (22:2991)
- Detalle: frames `Html → Body` 19:2503 (escritorio) y 20:2629 (móvil)
- Anotar desviaciones nuevas en la tabla de refinamientos de `spec.md`

## Done when

- [ ] Los 14 escenarios pasan
- [ ] `php -l` limpio en PHP tocado
- [ ] Capturas 390 / 900 / 1280 revisadas
- [ ] Spec `spec.md` actualizada si hubo refinamientos nuevos
