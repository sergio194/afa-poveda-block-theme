# Data Model: Hazte Socio

**Feature**: `006-hazte-socio` | **Date**: 2026-09-18

Modelo conceptual sobre página WP + plugin de formularios. El tema **no** registra CPT ni almacena solicitudes.

## Entities

### PaginaHazteSocio (página WP)

| Campo | Tipo | Reglas |
|-------|------|--------|
| título | post_title | Preferido «Hazte Socio» (admin/menú) |
| slug | post_name | `hazte-socio` → `/hazte-socio/` |
| plantilla | page template | `page-hazte-socio` / «Hazte Socio» |
| contenido | post_content | Patterns hero → qué hacemos → pertenecer → ayudar → dudas |

H1 visual en el pattern hero, no en `post-title`.

### HeroHazte

| Campo | Tipo | Reglas |
|-------|------|--------|
| eyebrow | string | Default «Únete a nuestra familia» |
| titular | string (H1) | «Hazte Socia/o» |
| apoyo | string | Texto AFA / CEIP Padre Poveda |
| cta_primario | label + ancla | «Formulario de inscripción» → `#pertenecer` |
| cta_secundario | label + ancla | «Saber más» → `#que-hacemos` |
| ilustracion | media | Recomendada; si falta → hueco estable |

### FichaActividadAfa

| Campo | Tipo | Reglas |
|-------|------|--------|
| icono | SVG / media | Decorativo |
| titulo | string | Obligatorio |
| descripcion | string | Corta |

**Conjunto inicial (6)**: Extraescolares, Comedor Escolar, Carrera Solidaria, Feria del Libro, Ludoteca, Voz y Participación.

### OfertaCuota

| Campo | Tipo | Reglas |
|-------|------|--------|
| importe_label | string | Default «45€ CUOTA ANUAL POR FAMILIA» (editable) |
| beneficios | 3..n strings | Con marca visual de check |
| nota_form | string | Instrucciones de pago / carnet por email |

### SolicitudAlta (plugin — fuera del tema)

| Campo | Tipo | Reglas |
|-------|------|--------|
| nombre_tutor | string | Obligatorio |
| dni_nie | string | Obligatorio (formato lo valida el plugin) |
| email | email | Obligatorio |
| privacidad | bool | Recomendado / RGPD |
| estado | enviado / error | UI del plugin |

### ViaColaboracion

| Campo | Tipo | Reglas |
|-------|------|--------|
| icono | SVG / media | Circular en diseño |
| titulo | string | Colaboración puntual / Tus habilidades / Comisiones de trabajo |
| descripcion | string | Editable |

### ContactoDudas

| Campo | Tipo | Reglas |
|-------|------|--------|
| mensaje | string | «¿Tienes dudas?» + apoyo |
| email | mailto URL | Editable; no hardcodear en lógica |

## Relationships

```text
PaginaHazteSocio
  ├── HeroHazte ──CTA──► #pertenecer / #que-hacemos
  ├── FichaActividadAfa[6]   (#que-hacemos)
  ├── OfertaCuota + [Plugin: SolicitudAlta]  (#pertenecer)
  ├── ViaColaboracion[3]
  └── ContactoDudas

Cabecera 001 «Hazte socio» ──URL──► /hazte-socio/
```

## Validation / empty states

| Situación | Comportamiento |
|-----------|----------------|
| Plugin de form inactivo | Fallback en `.afa-hazte-form`: mensaje + enlace Contacto; sin campos falsos |
| Envío inválido | Errores del plugin; layout de la página intacto |
| Envío válido | Confirmación del plugin; copy puede mencionar email de pago |
| Sin ilustración | Hueco aspect-ratio / superficie |
| Cuota distinta de 45 € | Texto editable; sin constante en código |

## Out of model

- CPT socios / solicitudes en el tema.
- Pasarela de pago, carnet digital.
- Frames genéricos de error/éxito como entidades del tema.
