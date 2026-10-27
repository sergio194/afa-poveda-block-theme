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
| 012 | Plantillas CPT de Servicios | los de la 005 · [spec](specs/012-plantillas-cpt-servicios/spec.md) |

## Por hacer

| Spec | Nombre | Figma | Depende de | Notas |
|---|---|---|---|---|
| 008 | Calendario escolar y detalle de evento | `Calendario Escolar` 18:644, `Calendario mobile` 18:1889, `detalle evento` 19:2095, `detalle evento mobile` 19:2253 | plugin-009 | Estilizar las plantillas de **The Events Calendar** (decisión: se reutiliza). Vista mensual, lista y detalle (ej. "Carrera Solidaria"). La 004 lo excluyó expresamente. |
| 009 | Extraescolares: archivo y ficha de actividad | `Extraescolares - AFA Padre Poveda` 1:673, `Detalle de Actividad` 8:2305 | plugin-003 | Plantillas de archivo y single del CPT. Sin mock móvil de estos frames: definir adaptación. |
| 010 | Contacto | `CONTACTO` 56:1185, `Html → Body` móvil 56:1263 | plugin-005 | Página y envoltura del formulario. |
| 011 | Estilos de formularios | `Inscripcion` 56:1456, `inscripcion mobile` 56:2125, `Errores de Validación` 56:1616 / 56:2360, `Confirmación de Éxito` 56:1785 / 56:2308 | plugin-004 | Tracker de pasos, campos, errores, éxito. Incluye el formulario de MailPoet (newsletter). Solo envoltura visual (ver 006 R1/R6 y 007). |
| 013 | Estilos del configurador de semana | `configurador de semana` 3:467, `Html → Body` 3:658 (actividades), `Configurador Móvil` 3:331 | plugin-011 | **Añadida tras revisar Figma**: no estaba en la lista inicial. Barra de resumen inferior en móvil. |

### Deuda y pendientes de la junta
- Specs 002, 003 y 006 siguen "pendiente validación visual / montaje editorial en Local".
- Dirección del pie: Figma escritorio dice Alfonso XII, 58 y móvil dice San Sergio, 1 (spec 001).
- Redes sociales reales y URLs.
- Logo en SVG.
- Revisar el grupo `GUIA` (Group 7, 33:5671) frente a la 001.
- Plantillas `404` y `search` existen en el tema sin frame en Figma: confirmar si hace falta diseño.

## Fuera de alcance (decidido)
- Pagos de cuota online: se mantiene lo de la 006 (cobro por email, lo gestiona la junta).
- Organigrama dinámico: tema 003 sigue con pattern editable hasta `plugin-012`.

## Orden recomendado
012 → 009 → 011 → 010 → 008 → 013, cada una cuando exista su dependencia del plugin (ver `plugin-NNN`).
