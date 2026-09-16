# Data Model: Portada (HOME)

**Feature**: `002-portada` | **Date**: 2026-09-16

Modelo conceptual sobre contenido WordPress existente. El tema **no** registra CPT ni taxonomías.

## Entities

### AccesoRápido

| Campo | Tipo | Reglas |
|-------|------|--------|
| etiqueta | string | Obligatorio; es/Comedor, Extraescolares, Calendario, Voluntarios |
| icono | asset SVG local | Obligatorio; decorativo (oculto a AT) |
| url | URL | Obligatorio; editable en el pattern |

Relación: 4 instancias fijas en el pattern `home-quick-access` (no son posts).

### AvisoDestacado (entrada WP)

| Campo | Tipo | Reglas |
|-------|------|--------|
| título | post_title | Obligatorio |
| resumen | excerpt o recorte del content | Recomendado |
| imagen | featured image | Recomendada; placeholder si falta |
| etiqueta | category name o «Destacado» | Primera categoría |
| enlace_accion | permalink o enlace en extracto | Por defecto permalink; texto «Más información» / «Inscribirse…» editable en plantilla del item |
| sticky | boolean | Debe ser sticky para entrar en la sección |
| orden | sticky order / date | Primera = hero de avisos; 2.ª y 3.ª = secundarios |

**Estados**: `publicado` visible; `borrador` no aparece. Si 0 sticky → sección vacía/oculta.

### Noticia (entrada WP)

| Campo | Tipo | Reglas |
|-------|------|--------|
| título | post_title | Obligatorio |
| fecha | post_date | Visible formateada (p. ej. «15 Mayo, 2024») |
| extracto | excerpt | Hasta ~30 palabras |
| imagen | featured image | Recomendada |
| permalink | URL | «Leer más» |

Query: 3 más recientes, preferiblemente no sticky (ver research R4).

### BloqueComunidad

| Campo | Tipo | Reglas |
|-------|------|--------|
| titular | string | Default Figma |
| texto | string | Default Figma |
| cta_primaria_label | string | «Hazte Socio Ahora» |
| cta_primaria_url | URL | `/hazte-socio/` |
| cta_secundaria_label | string | «Contactar con Vocalías» |
| cta_secundaria_url | URL | `/contacto/` |

Contenido del pattern, no entidad en BD.

### HeroPortada

| Campo | Tipo | Reglas |
|-------|------|--------|
| imagen | media | Cover |
| titular | string | H1 |
| apoyo | string | párrafo |
| cta_movil_label | string | «Descubre más» |
| cta_movil_url | ancla/URL | `#afa-accesos` |

## Relationships

```text
HeroPortada (1) ──pattern──► front-page
AccesoRápido (4) ──pattern──► front-page
AvisoDestacado (0..3 sticky posts) ──query──► sección avisos
Noticia (0..3 posts) ──query──► sección noticias
BloqueComunidad (1) ──pattern──► front-page
```

## Validation (editorial)

- Voluntarios deben fijar como máximo ~3 entradas en portada para avisos.
- Imágenes destacadas en ratio cercano a 16:9 para noticias; hero más ancho.
- Categorías cortas (1 palabra) para chips legibles.
