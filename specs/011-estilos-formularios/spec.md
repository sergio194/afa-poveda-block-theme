# Feature Specification: Estilos de formularios

**Feature Branch**: `011-estilos-formularios`

**Created**: 2026-10-27

**Status**: Hecha (pendiente probar envío real y revisión móvil)

**Input**: Backlog 011 — tracker de pasos, campos, errores y éxito de los formularios del plugin (plugin-004 ✅, contrato §9–§12 y §14 v1.9.0), más el formulario de newsletter. Solo envoltura visual (006 R1/R6 y 007).

**Fuente de diseño**: Figma `AFA` (`lS6WwjiFrPKd60cQTfXrKF`): `Inscripcion` `56:1456`, `inscripcion mobile` `56:2125`, `Errores de Validación` `56:1616` / `56:2360`, `Confirmación de Éxito` `56:1785` / `56:2308`.

**Fuente de datos**: [contrato §9](../../../../plugins/afa-padre-poveda-core/docs/contrato-tema.md) — marcado `afa-core-form*` (pasos, campos, errores, resumen, éxito, consentimientos, repetibles, tarjetas), bloques `inscripcion`, `contacto`, `alta-socio`, `newsletter`, `formulario`.

## Clarifications

### Session 2026-10-27 (decisiones tomadas sin la persona responsable, revisar)

- Q: ¿Qué se entrega: solo CSS o también plantilla? → A: CSS de todo `afa-core-form*` + una plantilla `page-formulario` (icono, H1 centrado, introducción y tarjeta contenedora) + un pattern de newsletter con el bloque del plugin. Contacto (010) reutilizará la plantilla.
- Q: ¿El tracker de pasos del Figma (con iconos por paso) se replica? → A: Se estiliza el `<ol class="afa-core-form__pasos">` como pestañas con subrayado en el paso actual y pasos completados atenuados; sin iconos por paso (el plugin no los imprime) — desviación anotada.
- Q: ¿Qué hacer con el formulario de MailPoet nativo (shortcode/bloque `.mailpoet_form`)? → A: Se le da el mismo aspecto básico (campos, botón, mensajes) con CSS acotado a `.mailpoet_form`; la recomendación es usar el bloque del plugin (`afa-padre-poveda/newsletter`).
- Q: ¿Colores de error? → A: Error: texto `#b3261e` (contraste calculado ≥ 4,5:1 sobre `base` y sobre el fondo del resumen) con borde del campo en el mismo color y no solo color (el plugin añade texto y `aria-invalid`). Se documenta el hex por no existir preset (igual que 005).
- Q: ¿Adaptación móvil (los frames móviles solo cambian anchos)? → A: Tracker con texto pequeño y scroll horizontal si no cabe, grupos y filas apilados, botones a ancho completo.
- Q: ¿Página «Inscripción» real? → A: No se crea contenido; la plantilla se aplica a las páginas que la junta cree.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Rellenar un formulario con claridad (P1)

Como familia, quiero formularios legibles, con etiquetas claras, campos grandes y avance por pasos, para completar la inscripción sin errores.

**Acceptance Scenarios**:

1. **Given** el formulario de inscripción en escritorio, **When** se abre, **Then** se ve el tracker de pasos, el título del paso con barra de acento, los grupos como tarjetas, los campos con borde visible y el botón de envío destacado.
2. **Given** móvil (390 px), **When** se abre, **Then** campos y grupos se apilan y los botones ocupan el ancho útil, sin scroll horizontal de la página.
3. **Given** opciones tipo tarjeta (forma de pago, ¿sois socios?), **When** se seleccionan con ratón o teclado, **Then** la elegida se resalta y el foco es visible.

### User Story 2 - Entender y corregir errores (P1)

1. **Given** un envío con errores, **When** el plugin imprime el resumen y marca los campos, **Then** el resumen aparece en un panel de error destacado, cada campo erróneo muestra borde y texto de error, y el significado no depende solo del color.

### User Story 3 - Confirmación de envío (P1)

1. **Given** un envío correcto, **When** el plugin imprime el panel de éxito, **Then** se ve una tarjeta centrada con icono de confirmación, título, texto y los botones de acción.

### User Story 4 - Newsletter y otros formularios (P2)

Contacto, alta de socio y newsletter comparten estilos con variaciones compactas; el bloque de newsletter funciona en una fila (campo + botón) en escritorio.

### Edge Cases

- Formulario sin pasos (contacto): no hay tracker ni navegación.
- Campos condicionales ocultos (`hidden`): no deben dejar huecos.
- Filas repetibles: cada fila es una tarjeta con título; botón «Añadir» con aspecto secundario.
- «No disponible» (sin actividades abiertas): aviso discreto.
- Zoom 200 % / reflow a 320 px sin pérdida de información.

## Requirements *(mandatory)*

- **FR-001**: El tema MUST estilizar `afa-core-form` y sus elementos (`__pasos`, `__paso-indicador`, `__progreso`, `__paso`, `__paso-titulo`, `__grupo`, `__campo`, `__etiqueta`, `__control`, `__ayuda`, `__error`, `__opciones`, `__opcion`, `__campo--tarjetas`, `__fila`, `__repetible`, `__anadir`, `__navegacion`, `__consentimientos`, `__nota`, `__acciones`, `__enviar`, `__resumen`, `__exito`, `__no-disponible`) usando solo presets de `theme.json` (y un hex de error documentado).
- **FR-002**: Estados `is-error`, `is-success`, `is-loading`, `is-disabled` y `is-current` MUST ser visibles sin depender solo del color (borde, texto, icono).
- **FR-003**: Controles MUST tener borde con contraste ≥ 3:1 y foco visible con anillo ≥ 2 px; texto ≥ 4,5:1.
- **FR-004**: El tema MUST incluir `templates/page-formulario.html` (icono, H1 único, la introducción es el primer párrafo editable del contenido (el extracto autogenerado copiaba texto del formulario), tarjeta contenedora) con `main#contenido`.
- **FR-005**: El tema MUST incluir un pattern de newsletter con el bloque `afa-padre-poveda/newsletter` y estilos en fila.
- **FR-006**: El tema MUST NOT añadir JS, lógica de validación ni registrar formularios (constitución III y VI).
- **FR-007**: Se MUST dar estilo acotado a `.mailpoet_form` equivalente al de los campos.
- **FR-008**: 0 desbordes horizontales en 390 px; botones y tracker operables en táctil (objetivo ≥ 44 px de alto).

## Success Criteria

- **SC-001**: Inscripción, contacto, alta de socio y newsletter se ven coherentes con Figma a 900 y 1280 px y sin desbordes a 390 px.
- **SC-002**: Todos los pares de color del formulario ≥ 4,5:1 (texto) y ≥ 3:1 (bordes de control), calculados.
- **SC-003**: Los estados error y éxito se reconocen sin color (texto/borde/icono).
- **SC-004**: Sin errores PHP; sin cambios de comportamiento del plugin.

## Assumptions

- El plugin imprime el marcado del contrato; el tema solo lo viste.
- El icono del cabecero de página y el check de éxito se dibujan con CSS/unicode (sin imágenes nuevas).
