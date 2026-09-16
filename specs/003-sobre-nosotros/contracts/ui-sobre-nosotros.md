# Contract: UI Sobre nosotros (AFA)

**Feature**: `003-sobre-nosotros` | **Date**: 2026-09-16  
**Consumers**: `templates/page-afa.html`, patterns `afa-poveda/sobre-*`  
**Fuente**: Figma `Sobre Nosotros - Organigrama Visual` (1:390), `sobre nosotros- mobile` (4:1183)

## Orden de secciones (obligatorio)

1. `header` (template part — spec 001)
2. `main` → `post-content` (sin `post-title` en plantilla)
   1. Hero — `afa-poveda/sobre-hero`
   2. ¿Quiénes somos? — `afa-poveda/sobre-quienes-somos`
   3. Organigrama — `afa-poveda/sobre-organigrama`
   4. ¿Qué hace el AFA? — `afa-poveda/sobre-que-hace`
   5. Utilidad + Comisiones — `afa-poveda/sobre-utilidad-comisiones`
   6. Documentos y Estatutos — `afa-poveda/sobre-documentos`
3. `footer` (template part — spec 001)

Pattern compuesto `afa-poveda/sobre-nosotros` = secciones 1–6 en ese orden.

## Contratos por sección

### Hero

| Slot | Bloque sugerido | Tokens / notas |
|------|-----------------|----------------|
| Contenedor | `core/cover` align wide | Radio medium; overlay oscuro para AA |
| Titular | `core/heading` nivel **1** | `huge` o `xx-large`, font heading, color `base` |
| Apoyo | `core/paragraph` | Color `base`; subtítulo Figma |

### ¿Quiénes somos?

| Slot | Contrato |
|------|----------|
| Cabecera | H2 «¿Quiénes somos?» (+ acento visual opcional con borde/preset) |
| Cuerpo | 3 párrafos (defaults Figma); color `contrast` / `contrast-muted` |

### Organigrama

| Slot | Escritorio | Móvil |
|------|------------|-------|
| Cabecera | H2 «Organigrama» + párrafo intro junta | Igual, apilado |
| Presidencia | 2 cards lado a lado (nombre + rol) | Apiladas |
| Secretaría / Tesorería | 2 columnas con H3 de grupo + 1 card c/u | Apiladas |
| Vocales | H3 + grid/flex de chips/cards con nombre | Wrap / columna |

Clase contenedor: `.afa-organigrama`. Cards: fondo `surface-container` o `base`, borde `outline`/`surface-high`, radio medium.

### ¿Qué hace el AFA?

| Slot | Contrato |
|------|----------|
| Título | H2 «¿Qué hace el AFA?» |
| Lista | `core/list` o ítems en Groups; 6 actividades default Figma |

### Utilidad + Comisiones

| Slot | Escritorio | Móvil |
|------|------------|-------|
| Layout | 2 columnas (Utilidad \| Comisiones) | Apiladas |
| Utilidad | H3 + lista de 4 puntos | Igual |
| Comisiones | H3 + lista/chips de comisiones | Igual |

Clase: `.afa-sobre-utilidad`.

### Documentos y Estatutos

| Slot | Contrato |
|------|----------|
| Título | H2 «Documentos y Estatutos» |
| Ítems | Lista vertical; etiqueta legible + control descarga (`core/file` o enlace) |
| Defaults | Qué es una AFA; Estatutos; Manual de procedimientos; Parte de disciplina |

Clase: `.afa-docs`.

## Tokens obligatorios (001)

- Colores: `surface`, `surface-container`, `surface-high`, `accent`, `primary`, `base`, `contrast`, `contrast-muted`, `outline`
- Tipografía: heading / body; sizes huge → small según jerarquía
- Radios: medium (cards), small (chips/botones)

## No contratos

- Sidebar de blog / newsletter embebido en esta página
- Formulario hazte socio
- CPT organigrama
- Infinite scroll / JS custom
