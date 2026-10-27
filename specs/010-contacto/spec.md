# Feature Specification: Contacto

**Feature Branch**: `010-contacto`

**Created**: 2026-10-27

**Status**: Hecha (pendiente envío real y revisión móvil)

**Input**: Backlog 010 — página de contacto y envoltura del formulario (plugin-005 ✅, contrato §10, hueco «Formulario de Contacto (tema-010)» §5).

**Fuente de diseño**: Figma `AFA` (`lS6WwjiFrPKd60cQTfXrKF`): `CONTACTO` `56:1185` (escritorio) y `Html → Body` `56:1263` (móvil, 394 px).

**Fuente de datos**: [contrato §10](../../../../plugins/afa-padre-poveda-core/docs/contrato-tema.md): bloque `afa-padre-poveda/contacto` (campos nombre, email, mensaje; botón «Enviar mensaje»); estilos del formulario: spec 011.

## Clarifications

### Session 2026-10-27 (decisiones tomadas sin la persona responsable, revisar)

- Q: ¿Qué dirección se muestra en «Información de contacto» (Figma: Avenida Alfonso XIII, 23; pie: Calle de Alfonso XII, 58)? → A: La del pie del tema (Calle de Alfonso XII, 58, 28014 Madrid) y el email `info@afapadrepoveda.org`, por coherencia dentro del sitio. Es texto editable; la discrepancia con Figma ya figura como deuda en el backlog.
- Q: ¿El formulario va en la plantilla o en el contenido de la página? → A: La plantilla `page-contacto` coloca el formulario en la columna izquierda mediante un pattern (`contacto-formulario`) que inserta el bloque del plugin; sin el plugin muestra un texto provisional con el email (contrato §5, FR-018). El contenido de la página queda disponible bajo las dos columnas para texto extra.
- Q: ¿Horario de atención y vocalías son fijos? → A: Texto editable en el pattern `contacto-info`, con los valores del Figma como ejemplo.
- Q: ¿Mapa? → A: No hay en el Figma; no se añade (evita terceros, constitución VI).
- Q: ¿Móvil? → A: Una columna: formulario primero y la información después.
- Q: ¿Los iconos de la información? → A: Máscaras CSS con los iconos ya existentes del tema (pin y mail del pie, reloj de `assets/icons`) dentro de círculos `primary`; decorativos (`aria-hidden`).

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Escribir a la AFA (P1)

**Acceptance Scenarios**:

1. **Given** una página con la plantilla Contacto, **When** se abre en escritorio, **Then** se ve el H1 con subrayado de acento, la tarjeta del formulario (nombre, email, mensaje, «Enviar mensaje») a la izquierda y la tarjeta «Información de contacto» a la derecha.
2. **Given** móvil (390 px), **When** se abre, **Then** formulario e información se apilan sin desbordes.
3. **Given** el plugin desactivado, **When** se abre, **Then** la columna izquierda muestra un texto provisional con el email, sin errores.

### User Story 2 - Encontrar datos de contacto (P1)

1. **Given** la tarjeta de información, **When** se lee, **Then** muestra dirección, email (enlace `mailto:`), horario de atención y las vocalías como píldoras, todo editable en el Editor del sitio.

### User Story 3 - Errores y éxito (P2)

1. **Given** un envío con errores o correcto, **When** el plugin imprime el estado, **Then** el formulario sigue los estilos de la 011 dentro de la tarjeta.

### Edge Cases

- Título de página distinto de «Contacto»: la plantilla usa el título de la página.
- Sin vocalías: la sección no deja hueco (el grupo es editable/borrable).
- Texto de contacto largo: no desborda a 390 px.

## Requirements *(mandatory)*

- **FR-001**: `templates/page-contacto.html` MUST mostrar H1 (título de la página) con barra de acento, dos columnas 50/50 en escritorio y una en ≤ 781 px, `main#contenido`, y `post-content` tras las columnas.
- **FR-002**: El pattern `afa-poveda/contacto-formulario` MUST insertar `afa-padre-poveda/contacto` solo si el plugin está activo (`function_exists( 'afa_padre_poveda_core_contract_version' )`); si no, un párrafo provisional con el email.
- **FR-003**: El pattern `afa-poveda/contacto-info` MUST ofrecer dirección, email, horario y vocalías, con iconos decorativos y texto editable.
- **FR-004**: La plantilla MUST registrarse en `customTemplates` como «Contacto».
- **FR-005**: El tema MUST NOT procesar el formulario ni añadir JS (constitución III y VI).
- **FR-006**: Contraste ≥ 4,5:1, foco visible, enlaces con nombre claro; iconos `aria-hidden`.
- **FR-007**: 0 desbordes horizontales en 390 px.

## Success Criteria

- **SC-001**: Coincide con Figma 56:1185 en estructura y jerarquía a 1280 px y con 56:1263 en móvil.
- **SC-002**: Sin plugin: 0 errores y mensaje provisional visible.
- **SC-003**: Contraste calculado ≥ 4,5:1 en el texto nuevo.

## Assumptions

- El formulario y su validación son del plugin; los estilos de campos son de la 011.
- La página «Contacto» se crea/asigna por la junta; no se modifica ninguna página real.
