# Backlog de specs — tema `afa-poveda`

Fuente de diseño: Figma `AFA` (`lS6WwjiFrPKd60cQTfXrKF`), página `screens` (1:173).
Continúa la numeración existente (001–007). Los ids de plugin (`plugin-NNN`) se refieren al backlog de `afa-padre-poveda-core`.

Reparto (constitución III): el tema pone **presentación**; la lógica vive en el plugin.

## Hecho

| Spec | Tema | Figma |
|---|---|---|
| 001 | Sistema de diseño | `uikit` 33:5375, `MENU` 1:1592, header/footer |
| 002 | Portada | `HOME` 1:259, `HOME- MOBILE` 1:1395 |
| 003 | Sobre nosotros | 1:390, 4:1183 |
| 004 | Actualidad y eventos (noticias) | 20:2742, 22:2991, detalle 19:2503 / 20:2629 |
| 005 | Servicios (páginas + patterns) | 26:3374, 26:3175, 27:4354, 27:4168 |
| 006 | Hazte socio (landing) | 27:3962, 27:3559 |
| 007 | Accesibilidad WCAG 2.2 AA | transversal |
| 008 | Calendario escolar y detalle de evento (calendario hecho; hero de evento pendiente de petición al plugin) | `18:644`, `19:2095` · [spec](specs/008-calendario-evento/spec.md) |
| 009 | Extraescolares: archivo y ficha | `1:673`, `8:2305` · [spec](specs/009-extraescolares-archivo-ficha/spec.md) |
| 010 | Contacto | `56:1185`, `56:1263` · [spec](specs/010-contacto/spec.md) |
| 011 | Estilos de formularios | `56:1456`, `56:1616`, `56:1785` (+ móviles) · [spec](specs/011-estilos-formularios/spec.md) |
| 012 | Plantillas CPT de Servicios | los de la 005 · [spec](specs/012-plantillas-cpt-servicios/spec.md) |
| 013 | Estilos del configurador de semana | `3:467`, `3:658`, `3:331` · [spec](specs/013-configurador-semana/spec.md) |

## Por hacer

_Nada pendiente en esta tanda (ver «Peticiones» y «Deuda»)._

### Deuda y pendientes de la junta
- Specs 002, 003 y 006 siguen "pendiente validación visual / montaje editorial en Local".
- Dirección del pie: Figma escritorio dice Alfonso XII, 58 y móvil dice San Sergio, 1 (spec 001).
- Redes sociales reales y URLs.
- Logo en SVG.
- Revisar el grupo `GUIA` (Group 7, 33:5671) frente a la 001.
- Plantillas `404` y `search` existen en el tema sin frame en Figma: confirmar si hace falta diseño.

## Peticiones a afa-padre-poveda-core
- **Plantilla de evento (spec 008)**: The Events Calendar impone su plantilla de evento en temas de bloques e ignora `single-tribe_events.html`. Para el hero con foto y la tarjeta «Detalles clave» de Figma 19:2095 haría falta que el plugin fuerce la plantilla de bloques del tema para `tribe_events` (o exponga un filtro/bloque que lo haga) y lo documente en el contrato.
- **Configurador (spec 013)**: el Figma propone un panel lateral de actividades con arrastrar y soltar, filtros por edad/duración/día y pestañas por día en móvil; el plugin implementa selectores por celda. Si la junta quiere el patrón de Figma, es trabajo del plugin (JS y marcado).

## Fuera de alcance (decidido)
- Pagos de cuota online: se mantiene lo de la 006 (cobro por email, lo gestiona la junta).
- Organigrama dinámico: tema 003 sigue con pattern editable hasta `plugin-012`.

## Orden recomendado
Hecho en la rama `backlog-auto-2026-10-27`: 012 → 009 → 011 → 010 → 008 → 013.
