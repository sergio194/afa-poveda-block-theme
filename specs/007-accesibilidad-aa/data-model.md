# Data Model: Accesibilidad WCAG AA

**Feature**: `007-accesibilidad-aa` | **Date**: 2026-09-20

Modelo conceptual de la auditoría y remediación. Sin persistencia en WordPress (no CPT, no opciones nuevas del tema).

## Entities

### SuperficiePublica

Conjunto auditable del tema.

| Campo | Tipo | Reglas |
|-------|------|--------|
| plantillas | lista | Todas las de `templates/*.html` públicas |
| partes | lista | `header`, `footer`, `sidebar` |
| patterns | lista | Patterns de presentación activos (001–006) |
| estilos | tokens + CSS | `theme.json` presets + bloques `style.css` del tema |

### CriterioAA

| Campo | Tipo | Reglas |
|-------|------|--------|
| id | string | p. ej. `1.4.3`, `2.4.1`, `2.4.7` o id interno del contrato |
| nombre | string | Corto en español |
| umbral | texto | p. ej. contraste ≥ 4,5:1 |
| aplicable | bool | Si no aplica → N/A en informe |

### Hallazgo

| Campo | Tipo | Reglas |
|-------|------|--------|
| id | string | Único en `audit.md` (H-001…) |
| ubicacion | string | Plantilla / pattern / token / CSS |
| criterio | → CriterioAA | Obligatorio |
| descripcion | string | Qué falla y cómo se reproduce |
| clasificacion | enum | `tema` \| `plugin` \| `editorial` |
| severidad | enum | `bloqueante` \| `mayor` \| `menor` |
| estado | enum | `abierto` \| `corregido` \| `aceptado` \| `delegado` |
| remedio | string | Cambio hecho o motivo de aceptación/delegación |
| ratio_antes_despues | opcional | Solo contrastes |

**Reglas de cierre de feature**:
- Todo hallazgo `tema` + `bloqueante|mayor` → `corregido` o `aceptado` con motivo en refinamientos.
- `plugin` / `editorial` → `delegado` con nota para la junta (no bloquean el tag AA del tema si el tema no introduce la barrera).

### ParContraste

| Campo | Tipo | Reglas |
|-------|------|--------|
| primer_plano | color token o hex | Texto / icono / borde |
| fondo | color token o hex | Superficie real (incl. overlay) |
| tamano | `normal` \| `grande` | Define umbral 4,5 vs 3 |
| ratio | número | Medido, no estimado |
| cumple | bool | Según umbral |

### SkipLink

| Campo | Tipo | Reglas |
|-------|------|--------|
| etiqueta | string | «Saltar al contenido» |
| destino | id | `#contenido` (canónico) |
| ubicacion | part | Primer foco útil en `header` |
| visibilidad | CSS | Oculto hasta `:focus` / `:focus-visible` |

### LandmarkVista

| Campo | Tipo | Reglas |
|-------|------|--------|
| banner | header | Una cabecera de sitio |
| main | main#contenido | Uno por vista; id de skip |
| contentinfo | footer | Pie de sitio |
| navigation | nav | Menú principal (core navigation) |
| h1 | heading nivel 1 | Exactamente uno significativo por vista |

### InformeAuditoria

| Campo | Tipo | Reglas |
|-------|------|--------|
| fecha | date | Obligatorio |
| alcance | → SuperficiePublica | Páginas/plantillas recorridas |
| hallazgos | Hallazgo[] | Completo al cierre |
| resumen | conteos | pasa / falla / N/A / delegados |

## Relationships

```text
InformeAuditoria
  └── Hallazgo[] ──► CriterioAA
        ├── (si contraste) ParContraste
        └── clasificacion → remedio en tema | plugin | guía editorial

SuperficiePublica
  ├── SkipLink → #contenido
  └── LandmarkVista (por plantilla)
```

## Validation rules (from FR)

| Regla | Origen |
|-------|--------|
| Texto normal ≥ 4,5:1; grande/UI ≥ 3:1 | FR-002 |
| Sin opacidad que rompa contraste de texto | FR-003 |
| Controles tema operablees + foco visible | FR-004 |
| Skip link presente en toda vista pública | FR-005 |
| Un H1 + jerarquía coherente | FR-006 |
| Decorativo silencioso; funcional nombrado | FR-007 |
| Propósito de enlace comprensible | FR-008 |
| Informe con clasificación | FR-009–010 |
| Reduced motion + zoom 200 % | FR-013–014 |

## State transitions (Hallazgo)

```text
abierto → corregido     (cambio en tema)
abierto → aceptado      (desviación Figma documentada; solo excepciones justificadas)
abierto → delegado      (plugin | editorial)
```
