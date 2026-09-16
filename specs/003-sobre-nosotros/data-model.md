# Data Model: Sobre nosotros (AFA)

**Feature**: `003-sobre-nosotros` | **Date**: 2026-09-16

Modelo conceptual sobre contenido WordPress existente. El tema **no** registra CPT ni taxonomías.

## Entities

### PaginaSobreNosotros (página WP)

| Campo | Tipo | Reglas |
|-------|------|--------|
| título | post_title | «Sobre nosotros» (puede diferir de la etiqueta de menú «AFA») |
| slug | post_name | Preferido `afa` → URL `/afa/` |
| plantilla | template slug | `page-afa` (AFA / Sobre nosotros) |
| contenido | post_content | Patterns de sección en orden del contrato UI |
| estado | draft/publish | Solo `publish` visible en menú/front |

### HeroSobreNosotros

| Campo | Tipo | Reglas |
|-------|------|--------|
| imagen | media (Cover) | Recomendada; sin ella, overlay de color de marca |
| titular | string (H1) | Default «Sobre nosotros» |
| subtitulo | string | Default Figma comunidad de familias |

Vive en el pattern `sobre-hero` dentro del contenido de la página.

### SeccionQuienesSomos

| Campo | Tipo | Reglas |
|-------|------|--------|
| titulo | string (H2) | «¿Quiénes somos?» |
| parrafos | 1..n texto | Defaults Figma; editables |

### CargoJunta

| Campo | Tipo | Reglas |
|-------|------|--------|
| nombre | string | Obligatorio si la tarjeta se muestra |
| rol | string | Presidencia, Vicepresidencia, Secretaria, Tesorera, Vocal, … |
| grupo | enum lógico | `presidencia` \| `secretaria` \| `tesoreria` \| `vocales` |

No es post WP: instancias en el pattern `sobre-organigrama`. Tarjetas sin nombre se pueden eliminar en el editor.

### ActividadAFA

| Campo | Tipo | Reglas |
|-------|------|--------|
| texto | string | Ítem de lista «¿Qué hace el AFA?» |

### PuntoUtilidad

| Campo | Tipo | Reglas |
|-------|------|--------|
| texto | string | Ítem de «Utilidad de la AFA» |

### Comision

| Campo | Tipo | Reglas |
|-------|------|--------|
| nombre | string | Extraescolares, Becas, Comedor, Huerto, Fiestas, Informática, Lotería, … |

### DocumentoAFA

| Campo | Tipo | Reglas |
|-------|------|--------|
| etiqueta | string | Legible (p. ej. «Estatutos de nuestra AFA») |
| archivo | media URL / File block | PDF u otro; vacío → no publicar enlace muerto |
| nombre_archivo | string opcional | Puede mostrarse como subtítulo |

## Relationships

```text
PaginaSobreNosotros
  └── contiene → Hero, QuienesSomos, Organigrama(CargoJunta[]),
                 QueHace(ActividadAFA[]), Utilidad+Comisiones,
                 Documentos(DocumentoAFA[])
```

## Validation / empty states

| Situación | Comportamiento |
|-----------|----------------|
| Sin imagen hero | Cover con color `primary` / `accent` y texto legible |
| Vocales 0–N | Columnas/flex se adaptan; sin huecos rotos |
| Documento sin medio | Quitar ítem o dejar «Próximamente» sin `href` falso |
| Página en borrador | No enlazar desde el menú hasta publicar |

## Out of model

- Usuario WP, roles, formularios de socio, envío de newsletter, CPT de personas.
