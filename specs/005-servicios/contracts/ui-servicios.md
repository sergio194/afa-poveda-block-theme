# Contract: UI Servicios AFA

**Feature**: `005-servicios` | **Date**: 2026-09-18  
**Consumers**: `templates/page-servicios.html`, `page-servicio-detalle.html`; patterns `afa-poveda/servicios-*`, `afa-poveda/servicio-*`  
**Fuente**: Figma `Nuestros Servicios - Vista Homogénea` (`26:3374`, `27:4354`), `Detalle de Servicio - Comedor Escolar` (`26:3175`, `27:4168`)

## A. Listado (`/servicios/`)

### Orden de secciones (obligatorio)

1. `header` (template part — spec 001)
2. `main.afa-servicios`
   1. Hero — `afa-poveda/servicios-hero`
   2. Grid — `afa-poveda/servicios-grid`
   3. CTA — `afa-poveda/servicios-cta`
3. `footer` (template part — spec 001)

Sin sidebar. Sin `post-title` en la plantilla.

### Hero listado

| Slot | Bloque | Tokens / notas |
|------|--------|----------------|
| Eyebrow | `core/paragraph` estilo etiqueta | «COMPROMISO Y COMUNIDAD»; `soft-green` / `green` o `is-style-afa-eyebrow` |
| Titular | `core/heading` nivel **1** | «Servicios AFA»; `huge` / `xx-large`, font heading, `contrast` |
| Apoyo | `core/paragraph` | `contrast-muted`; copy canónico escritorio |

### Grid de fichas

| Slot | Contrato |
|------|----------|
| Layout | Escritorio: 3 columnas; móvil: 1 columna; gap spacing preset |
| Card | Contenedor con radio medium; sombra sutil solo si ya existe patrón 001; clase `.afa-servicio-card` |
| Media | Imagen superior, `aspect-ratio` estable (~16:10 o 3:2); píldora categoría superpuesta esquina superior izquierda |
| Píldora | Texto blanco o contraste AA sobre color de categoría (tokens / CSS mapeado) |
| Título | H2 o H3, `contrast`, font heading |
| Descripción | `contrast-muted`, clamp ~3 líneas |
| Meta | Izquierda: icono + etiqueta (Diario, etc.); derecha: enlace «Ver más» color `primary` |
| Vacío imagen | Fondo `surface-high` sin romper altura |

**Defaults de contenido (6 fichas)**: ver data-model conjunto inicial; metas canónicas de escritorio.

### CTA final

| Slot | Escritorio | Móvil |
|------|------------|-------|
| Fondo | `primary` a ancho (align wide/full según diseño) | Igual |
| Texto | Titular + apoyo en `base` | Igual |
| Botones | Primario relleno `base` texto `primary`; secundario outline `base` | Apilados a ancho usable |
| Labels | «Contactar ahora» / «Preguntas frecuentes» | Igual |

## B. Detalle Comedor (`/servicios/comedor-escolar/` o slug editorial)

### Orden

1. `header`
2. `main.afa-servicio-detalle`
   1. Hero cover — `afa-poveda/servicio-hero`
   2. Layout dos columnas (escritorio) / apilado (móvil):
      - **Principal**: alimentación → menús/valores → FAQ
      - **Aside**: inscripción → documentación
3. `footer`

### Hero detalle

| Slot | Contrato |
|------|----------|
| Media | `core/cover` full/wide; overlay oscuro suficiente para AA |
| Badge | Píldora «Servicio Destacado» (`soft-green`/`green`) |
| H1 | «Comedor Escolar» en `base` |
| Subtítulo | Frase nutrición / proximidad en `base` |

### Alimentación saludable

| Slot | Contrato |
|------|----------|
| Contenedor | Card/superficie blanca o `base` sobre `surface`; radio medium |
| H2 | Color `primary` o `contrast` según Figma (preferir token) |
| Cuerpo | Párrafo `contrast-muted` |
| Puntos | 2 ítems: icono verde + título + texto; clases `.afa-servicio-feature` |

### Valores nutricionales y menú

| Slot | Contrato |
|------|----------|
| Descargas | Filas con icono documento, título, tamaño opcional, enlace «Descargar» `primary` |
| Composición | H3 + icono; grid 2×2 (móvil) / 4 columnas (escritorio) de stats |
| Stat | Valor destacado + etiqueta; colores diferenciados con contraste AA |

### FAQ

| Slot | Contrato |
|------|----------|
| Bloque | `core/details` por pregunta |
| Separadores | Borde `outline` / `surface-high` entre ítems |
| Defaults Comedor | 3 preguntas del mock; primera abierta si es posible |

### Inscripción (aside)

| Slot | Contrato |
|------|----------|
| Fondo | `primary`; texto `base`; radio medium; padding spacing-50+ |
| Precios | Socio + badge descuento (`soft-green`/`green`); no socio |
| Horario | Icono reloj + texto |
| CTA | Botón `base` / texto `primary`, ancho completo del aside: «Inscribirse Ahora» |
| Nota | Small, opacidad/contraste AA sobre `primary` |

### Documentación (aside)

| Slot | Contrato |
|------|----------|
| Fondo | `surface-container` / `surface-high` |
| Título | Icono carpeta + «Documentación» |
| Ítems | Icono archivo + enlace título; 3 defaults del mock |

## C. Navegación y a11y

| Regla | Contrato |
|-------|----------|
| Menú activo | «Servicios» en listado y en detalles (ancestro o filtro mínimo) |
| H1 | Exactamente uno por vista (hero) |
| Iconos decorativos | `alt=""` / aria-hidden |
| Teclado | Tab a «Ver más», botones CTA, summary FAQ, Descargar, Inscribirse |
| Contraste | Texto nuevo ≥ 4,5:1; píldoras y badge verificados |

## Tokens obligatorios (001)

- Colores: `primary`, `primary-soft`, `accent`, `soft-green`, `green`, `base`, `surface`, `surface-container`, `surface-high`, `outline`, `contrast`, `contrast-muted`
- Tipografía: heading / body; escala huge → small
- Radios: `small`, `medium`, `full` (píldoras)
- Spacing: presets 40–80

Hex sueltos solo en `style.css` con comentario de justificación si un acento de stat no tiene preset.

## Fuera de contrato

- Formulario de inscripción embebido
- Sticky JS
- CPT / archivo dinámico de servicios
- Rediseño header/footer
