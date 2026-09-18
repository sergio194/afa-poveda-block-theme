# Data Model: Servicios AFA (listado y detalle)

**Feature**: `005-servicios` | **Date**: 2026-09-18

Modelo conceptual sobre páginas y medios WordPress. El tema **no** registra CPT ni taxonomías.

## Entities

### PaginaListadoServicios (página WP)

| Campo | Tipo | Reglas |
|-------|------|--------|
| título | post_title | Preferido «Servicios» (etiqueta de menú) |
| slug | post_name | `servicios` → URL `/servicios/` |
| plantilla | page template | `page-servicios` / «Servicios — Listado» |
| contenido | post_content | Patterns: hero + grid + CTA (o compuesto) |

El H1 visual vive en el pattern hero, no en `post-title`.

### HeroListado

| Campo | Tipo | Reglas |
|-------|------|--------|
| eyebrow | string | Default «COMPROMISO Y COMUNIDAD» |
| titular | string (H1) | Default «Servicios AFA» |
| apoyo | string | Texto de conciliación / enriquecimiento (canónico escritorio) |

### FichaServicio (bloque editorial en el grid)

| Campo | Tipo | Reglas |
|-------|------|--------|
| imagen | media / URL tema | Recomendada; si falta → marcador CSS con aspect-ratio |
| categoria | string + estilo píldora | Nutrición, Aprendizaje, Conciliación, Extraescolares, Deporte, Familia |
| titulo | string | Obligatorio (H2/H3 en ficha) |
| descripcion | string | 2–3 líneas |
| meta_icono | icono / SVG tema | Decorativo (oculto a SR o con texto en meta) |
| meta_etiqueta | string | Diario, Tarde, Mañana, Semanal, Competición, Mensual |
| enlace | URL | Permalink del detalle; texto «Ver más» |

**Conjunto inicial (6)**: Comedor Escolar, Biblioteca y Apoyo, Primeros del Cole, Música y Arte, Deporte Escolar, Escuela de Familias.

### CtaListado

| Campo | Tipo | Reglas |
|-------|------|--------|
| titular | string | «¿Tienes alguna duda sobre los servicios?» |
| apoyo | string | Texto de ayuda al curso escolar |
| boton_primario | label + URL | «Contactar ahora» → Contacto |
| boton_secundario | label + URL | «Preguntas frecuentes» → destino editorial |

### PaginaDetalleServicio (página WP)

| Campo | Tipo | Reglas |
|-------|------|--------|
| título | post_title | p. ej. «Comedor Escolar» (menú/admin) |
| slug | post_name | p. ej. `comedor-escolar` |
| padre | post_parent | Opcional: página Servicios (jerarquía `/servicios/.../`) |
| plantilla | page template | `page-servicio-detalle` |
| contenido | post_content | Hero + secciones + columns (aside) |

### HeroDetalle

| Campo | Tipo | Reglas |
|-------|------|--------|
| imagen | cover media | Obligatoria para el diseño; contraste overlay AA |
| badge | string opcional | «Servicio Destacado» |
| titulo | string (H1) | Nombre del servicio |
| subtitulo | string | Frase de valor |

### SeccionInformativa

| Campo | Tipo | Reglas |
|-------|------|--------|
| titulo | string (H2) | p. ej. «Alimentación Saludable» |
| cuerpo | rich text | Párrafo(s) |
| puntos | 0..2 | Icono + título + texto corto |

### DescargaMenu

| Campo | Tipo | Reglas |
|-------|------|--------|
| titulo | string | p. ej. «Menú Basal - Mayo 2024» |
| archivo | media URL | PDF u otro; vacío → ocultar ítem |
| tamanio | string opcional | Informativo |

### IndicadorNutricional

| Campo | Tipo | Reglas |
|-------|------|--------|
| valor | string | p. ej. «750» |
| unidad_etiqueta | string | KCAL, PROTEÍNA, HC, GRASAS |
| énfasis_color | token/clase | Distintivo visual; contraste AA |

### PreguntaFrecuente

| Campo | Tipo | Reglas |
|-------|------|--------|
| pregunta | string | Summary del details |
| respuesta | rich text | Contenido expandido |
| abierta_inicial | bool | Preferible 1 abierta en Comedor |

### BloqueInscripcion

| Campo | Tipo | Reglas |
|-------|------|--------|
| precio_socio | string | p. ej. «4,85€ / día» |
| precio_no_socio | string | p. ej. «5,70€ / día» |
| descuento_badge | string opcional | «-15% dto.» |
| horario | string | p. ej. «12:30h — 14:30h» |
| cta_label | string | «Inscribirse Ahora» |
| cta_url | URL | Configurable (plugin/página; no formulario en tema) |
| nota_matricula | string | Curso / matrícula abierta |

### BloqueDocumentacion

| Campo | Tipo | Reglas |
|-------|------|--------|
| titulo | string | «Documentación» |
| items | 0..n | Título + URL medio; sin URL → no listar |

## Relationships

```text
PaginaListadoServicios
  ├── HeroListado
  ├── FichaServicio[]  ──enlace──► PaginaDetalleServicio
  └── CtaListado

PaginaDetalleServicio (Comedor = referencia)
  ├── HeroDetalle
  ├── SeccionInformativa (alimentación)
  ├── DescargaMenu[] + IndicadorNutricional[]
  ├── PreguntaFrecuente[]
  ├── BloqueInscripcion
  └── BloqueDocumentacion
```

## Validation / empty states

| Situación | Comportamiento |
|-----------|----------------|
| 0 fichas en el grid | Intro + CTA visibles; sin cards rotas (junta debe dejar al menos una) |
| Ficha sin imagen | Hueco con aspect-ratio + fondo `surface-high` |
| Sin PDFs de menú | Ocultar lista de descargas o sección parcial |
| Sin indicadores | Ocultar «Composición Media Diaria» |
| Sin FAQ | Ocultar sección |
| CTA inscripción sin URL | No publicar botón a 404; usar Contacto o quitar botón |
| Doc sin archivo | No mostrar ese ítem |
| Más de 6 fichas | Rejilla 3 columnas sigue; no hay máximo de producto |

## Out of model

- CPT / taxonomía «servicios».
- Formulario de inscripción, plazas, pagos.
- Generación automática de menús PDF o cálculo nutricional.
- Página Extraescolares (frame propio).
- Cabecera / pie (spec 001).
