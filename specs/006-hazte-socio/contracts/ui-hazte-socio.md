# Contract: UI Hazte Socio

**Feature**: `006-hazte-socio` | **Date**: 2026-09-18  
**Consumers**: `templates/page-hazte-socio.html`; patterns `afa-poveda/hazte-*`  
**Fuente**: Figma `hazte socio` (`27:3962`), `hazte socio mobile` (`27:3559`)

## Orden de secciones (obligatorio)

1. `header` (spec 001) — CTA «Hazte socio» → `/hazte-socio/`
2. `main.afa-hazte`
   1. Hero — `afa-poveda/hazte-hero`
   2. Qué hacemos — `afa-poveda/hazte-que-hacemos` (`#que-hacemos`)
   3. Pertenecer — `afa-poveda/hazte-pertenecer` (`#pertenecer`)
   4. Ayudar — `afa-poveda/hazte-ayudar`
   5. Dudas — `afa-poveda/hazte-dudas`
3. `footer` (spec 001)

Sin sidebar. Sin `post-title` en la plantilla.

## Hero

| Slot | Escritorio | Móvil |
|------|------------|-------|
| Layout | Columns ~50/50: texto \| ilustración | Ilustración arriba o texto primero según Figma móvil; stack |
| Eyebrow | «Únete a nuestra familia»; `soft-green`/`green` o `is-style-afa-eyebrow` | Igual |
| H1 | «Hazte Socia/o»; `huge`, heading, `contrast` | Igual |
| Apoyo | `contrast-muted` | Igual |
| CTAs | Primario fill → `#pertenecer`; outline → `#que-hacemos` | Apilados; copy canónico escritorio |
| Media | Ilustración; `aspect-ratio` estable | Ancho completo |

## Qué hacemos (`#que-hacemos`)

| Slot | Contrato |
|------|----------|
| H2 | «¿Qué hacemos por el cole?» |
| Intro | Párrafo centrado o ancho contenido |
| Grid | 3×2 escritorio; 1 col móvil; cards con icono + título + descripción |
| Cards | Fondo `base` / sombra sutil si patrón 001; radio medium; clase `.afa-hazte-actividad` |

## Pertenecer (`#pertenecer`)

| Slot | Escritorio | Móvil |
|------|------------|-------|
| Contenedor | Card ancha; columns 50/50 | Stack: cuota arriba, form abajo |
| Izquierda | Fondo `primary`; texto `base`; H2 «¿Cómo pertenecer?»; importe destacado; checklist beneficios | Igual contenido |
| Derecha | Fondo `base`; `.afa-hazte-form` | Igual |
| Form | Plugin (inputs + submit «Enviar Solicitud de Alta»); o fallback | Igual |
| Nota | Small bajo campos: instrucciones de pago por email | Igual |

### Contrato del hueco formulario (tema)

| Estado | UI |
|--------|-----|
| Plugin activo | Shortcode/bloque del plugin dentro de `.afa-hazte-form`; estilos de inputs alineados a tokens |
| Plugin inactivo | Mensaje claro + enlace a Contacto; **sin** inputs decorativos que no envían |

Campos esperados del plugin (documentación, no markup del tema): Nombre tutor/a, DNI/NIE, Email, privacidad.

## Ayudar

| Slot | Contrato |
|------|----------|
| H2 | «¿Cómo puedes ayudar?» |
| Intro | Texto de tiempo/habilidades |
| Vías | 3 cards; icono circular + título + descripción; fila escritorio / stack móvil |
| Títulos canónicos | Colaboración puntual; Tus habilidades; Comisiones de trabajo |

## Dudas

| Slot | Contrato |
|------|----------|
| Icono | Sobre / mail decorativo |
| Texto | «¿Tienes dudas?» + apoyo |
| Enlace | `mailto:` editable; contraste `primary` |

## Tokens (001)

- Colores: `primary`, `primary-soft`, `soft-green`, `green`, `base`, `surface`, `surface-container`, `contrast`, `contrast-muted`, `outline`
- Tipografía heading/body; escala huge → small
- Radios `medium` / `full` (eyebrow, badges)

## A11y

- Un solo H1 (hero)
- Anclas con focos visibles al saltar desde CTAs
- Form: labels asociados (plugin); errores anunciables
- Contraste ≥ 4,5:1 en cuota sobre `primary` y CTAs

## Fuera de contrato

- Páginas de éxito/error del plugin como plantillas del tema
- Pasarela de pago
- Rediseño header/footer
