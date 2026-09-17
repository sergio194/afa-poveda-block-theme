# Data Model: Actualidad y Eventos (Noticias)

**Feature**: `004-actualidad-eventos` | **Date**: 2026-09-17

Modelo conceptual sobre contenido WordPress existente. El tema **no** registra CPT ni taxonomías.

## Entities

### PaginaEntradas (página WP)

| Campo | Tipo | Reglas |
|-------|------|--------|
| título | post_title | Preferido «Noticias» (etiqueta de menú) |
| slug | post_name | `noticias` → URL `/noticias/` |
| rol | setting Lectura | Asignada como «Página de entradas» |
| plantilla | implícita | `home.html` cuando es la página de entradas |

No lleva el H1 visual: ese vive en el pattern hero.

### HeroArchivo

| Campo | Tipo | Reglas |
|-------|------|--------|
| eyebrow | string | Default «Archivo de noticias» |
| titular | string (H1) | Default «Actualidad y Eventos» |
| apoyo | string | Default canónico de la spec (versión escritorio) |

Vive en `noticias-hero` (plantilla, editable en Editor del sitio).

### Noticia (entrada WP `post`)

| Campo | Tipo | Reglas |
|-------|------|--------|
| título | post_title | Obligatorio; H3 en ficha, H1 en detalle |
| slug | post_name | Permalink bajo la estructura del sitio |
| fecha | post_date | Visible (p. ej. «15 Mayo, 2024» con locale es_ES) |
| autor | user | Opcional en detalle (nombre; cargo = descripción de perfil si existe) |
| extracto | excerpt | Recomendado; si vacío, recorte del cuerpo |
| cuerpo | post_content | Obligatorio para el detalle |
| imagen | featured image | Recomendada 16:9; si falta → marcador CSS |
| categorías | `category` nativa | 0..n; primera se muestra como píldora en la ficha |
| estado | draft/publish | Solo `publish` en archivo |

**Estados**: `publicado` visible; `borrador` no aparece; sticky no cambia el archivo (el sticky es de portada 002).

### CategoriaNoticia (`category`)

| Campo | Tipo | Reglas |
|-------|------|--------|
| nombre | string | Visible en píldora y ficha |
| slug | slug | URL `/category/{slug}/` |
| conjunto inicial | editorial | Comunidad, Deportes, Cultura, Servicios, AFA (+ Extraescolares opcional) |

El tema no las crea en PHP. «Todas» no es categoría: es el archivo `/noticias/`.

### BusquedaNoticias

| Campo | Tipo | Reglas |
|-------|------|--------|
| término | `s` | Texto del campo «Buscar noticias…» |
| resultados | query de `post` | Misma ficha que el archivo |
| vacío | mensaje | Sin fichas rotas; enlace de vuelta al archivo |

### NoticiaRelacionada

| Campo | Tipo | Reglas |
|-------|------|--------|
| fuente | query | Hasta 3 `post` publicados, no el actual, misma categoría si hay |
| ficha | subset | Categoría + título (+ miniatura opcional según Figma detalle) |

## Relationships

```text
PaginaEntradas (/noticias/) ──home.html──► HeroArchivo + Toolbar + Grid(Noticia[])
CategoriaNoticia            ──archive.html──► mismo layout, query filtrada
BusquedaNoticias            ──search.html──► mismo grid
Noticia                     ──single.html──► Detalle + NoticiaRelacionada[]
Noticia *──n:m──* CategoriaNoticia
Portada 002 «Ver noticias» ──URL──► /noticias/
```

## Validation / empty states

| Situación | Comportamiento |
|-----------|----------------|
| 0 noticias publicadas | Hero + toolbar visibles; mensaje de vacío en el grid |
| Categoría sin posts | Píldora activa + mensaje de vacío |
| Búsqueda sin acierto | Mensaje de vacío + vía de vuelta a `/noticias/` |
| Sin imagen destacada | Hueco 16:9 con fondo `surface-high` |
| 1 sola página | Paginación oculta o inactiva (sin falsas páginas 2…12) |
| Relacionadas 0 | Ocultar bloque o no-results discreto |
| Título/extracto largo | Clamp CSS (2 / 3 líneas) para igualar altura de ficha |

## Out of model

- CPT evento de calendario, extraescolares, servicios.
- Taxonomía «Institucional» (mock de Figma).
- Newsletter / formularios.
- Recuento de visitas («lo más visto»).
