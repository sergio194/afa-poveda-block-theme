# Contract: UI Portada

**Feature**: `002-portada` | **Date**: 2026-09-16  
**Consumers**: `templates/front-page.html`, patterns `afa-poveda/home-*`  
**Fuente**: Figma HOME (1:259), HOME-MOBILE (1:1395)

## Orden de secciones (obligatorio)

1. `header` (template part — spec 001)
2. `main#afa-home`
   1. Hero — pattern `afa-poveda/home-hero`
   2. Accesos — pattern `afa-poveda/home-quick-access` (`id="afa-accesos"`)
   3. Actualidad y Avisos — pattern `afa-poveda/home-avisos`
   4. Últimas Noticias — pattern `afa-poveda/home-latest-news`
   5. Comunidad CTA — pattern `afa-poveda/home-community-cta`
3. `footer` (template part — spec 001)

## Contratos por sección

### Hero

| Slot | Bloque sugerido | Tokens / notas |
|------|-----------------|----------------|
| Contenedor | `core/cover` align wide | `border.radius` medium; overlay gradiente oscuro |
| Titular | `core/heading` nivel 1 | `huge`, font heading, color `base` |
| Apoyo | `core/paragraph` | `large` o medium; color `base` / blanco 100 % (AA) |
| CTA móvil | `core/button` | Visible solo &lt; 600–781 px vía CSS; label «Descubre más» → `#afa-accesos` |

### Accesos rápidos

| Slot | Contenido |
|------|-----------|
| Grid | 4 columnas (`core/columns`) o 4 grupos en flex |
| Item | Fondo `surface-container`, radio medium, icono + texto 14/600, color `contrast` |
| Breakpoint | ≤781 px → 2×2 (CSS `.afa-home-access`) |

URLs por defecto: `/servicios/comedor/`, `/extraescolares/`, `/calendario/`, `/afa/` (voluntarios).

### Actualidad y Avisos

| Slot | Escritorio | Móvil |
|------|------------|-------|
| Cabecera | H2 «Actualidad y Avisos» + subtítulo + «Ver todo» | H2 + «Ver todos» |
| Principal | Columna ~60–66 %: imagen, chip, H3, extracto, enlace/botón outline | Card full-width primero |
| Secundarios | Columna ~33 %: 2 cards apiladas (1 surface, 1 accent opcional como Figma) | Lista compacta (icono/título) |

Query: sticky, `perPage: 3`. Vacío: no renderizar cards (mensaje opcional o sección colapsada).

### Últimas Noticias

| Slot | Contrato |
|------|----------|
| Cabecera | H2 «Últimas Noticias» + subtítulo + «Ver noticias» |
| Grid | 3 columnas desktop; 1 columna móvil |
| Card | imagen 16:9, fecha, H3 enlace, extracto, botón outline «Leer más» |
| Más (móvil) | Botón outline «Cargar más noticias» → archivo noticias |

Query: `perPage: 3`, `postType: post`, order date DESC; preferir no sticky.

### Comunidad CTA

| Slot | Contrato |
|------|----------|
| Contenedor | Group radio grande (~24px), padding amplio |
| Textos | H2 + párrafo centrados |
| Acciones | 2 botones: primario relleno, secundario outline |

## Tokens obligatorios (001)

- Colores: `surface`, `surface-container`, `accent`, `primary`, `base`, `contrast`, `contrast-muted`, `outline`
- Tipografía: heading / body; sizes huge, xx-large, x-large, large, medium, small
- Radios: medium (12), small (8) en botones outline de cards

## No contratos

- Formulario de inscripción, pago, newsletter embebido
- Sidebar en portada
- Infinite scroll
