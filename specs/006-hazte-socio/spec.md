# Feature Specification: Hazte Socio

**Feature Branch**: `006-hazte-socio`

**Created**: 2026-09-18

**Status**: Implementada (pendiente montaje editorial en Local + plugin de formularios)

**Input**: User description: «HAZTE SOCIO» — página de alta de socias/os según Figma escritorio y móvil (hero, beneficios de la AFA, cuota + formulario, voluntariado, contacto).

**Fuente de diseño**: Figma `AFA`, canvas `screens`, frames:

| Vista | Frame | ID |
|---|---|---|
| Escritorio | `hazte socio` | `27:3962` |
| Móvil | `hazte socio mobile` | `27:3559` |

Frames relacionados de formulario (errores / éxito / inscripción genérica) existen en Figma pero **no** forman parte del alcance de presentación de esta página en el tema; son responsabilidad del flujo de formulario (plugin).

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Entender qué es hacerse socio/a (Priority: P1)

Como madre o padre, quiero abrir «Hazte Socio» y ver de inmediato el mensaje de unión a la AFA, una ilustración acogedora y acciones claras, para decidir si me interesa seguir.

**Why this priority**: Es el primer viewport y la puerta de conversión del botón global de cabecera.

**Independent Test**: Abrir `/hazte-socio/` (o la URL del menú/CTA) en escritorio y móvil; comprobar eyebrow, H1 «Hazte Socia/o», texto, CTAs e ilustración.

**Acceptance Scenarios**:

1. **Given** una visitante en escritorio (≥ 1024 px), **When** abre Hazte Socio, **Then** ve eyebrow «Únete a nuestra familia», H1 «Hazte Socia/o», texto de bienvenida a la AFA del CEIP Padre Poveda, dos botones («Formulario de inscripción» y «Saber más») e ilustración a la derecha.
2. **Given** la misma página en móvil (~390 px), **When** carga, **Then** ve ilustración, eyebrow, H1, texto y botones apilados (primario hacia el formulario; secundario «Más info» / «Saber más» unificado), sin desbordes.
3. **Given** el botón primario del hero, **When** lo activa, **Then** lleva a la sección del formulario (ancla) o a la zona de alta visible en la misma página.

---

### User Story 2 - Ver qué hace la AFA con la cuota (Priority: P1)

Como familia indecisa, quiero ver qué servicios e iniciativas sostiene la cuota (extraescolares, comedor, carrera, feria del libro, ludoteca, voz y participación), para entender el valor de asociarme.

**Why this priority**: Justifica el pago anual; sin esto el formulario carece de contexto.

**Independent Test**: Scroll a «¿Qué hacemos por el cole?»; ver intro + 6 fichas con icono, título y descripción; en móvil apiladas.

**Acceptance Scenarios**:

1. **Given** escritorio, **When** se muestra la sección, **Then** hay H2 «¿Qué hacemos por el cole?», texto de apoyo sobre la cuota y una rejilla de seis fichas (3×2).
2. **Given** móvil, **When** se muestra la misma sección, **Then** las seis fichas van en columna (o lista) legibles, cada una con icono, título y descripción.
3. **Given** una voluntaria, **When** edita títulos o textos de las fichas desde el contenido de la página, **Then** el cambio se refleja sin tocar código.

---

### User Story 3 - Conocer la cuota y solicitar el alta (Priority: P1)

Como familia que quiere asociarse, quiero ver el precio anual (45 € por familia), los beneficios incluidos y un formulario de solicitud, para enviar mis datos y recibir instrucciones de pago.

**Why this priority**: Es la conversión principal de la página.

**Independent Test**: Localizar el bloque «¿Cómo pertenecer?»; comprobar cuota, lista de beneficios y campos del formulario; enviar una solicitud de prueba (flujo del plugin) y ver confirmación o error amable.

**Acceptance Scenarios**:

1. **Given** el bloque de pertenencia, **When** se muestra, **Then** aparece la cuota «45€ CUOTA ANUAL POR FAMILIA» (o el importe editorial actual) y al menos tres beneficios con marca de verificación.
2. **Given** el formulario de alta, **When** la visitante rellena los campos obligatorios y envía, **Then** la solicitud se registra según el sistema de formularios del sitio (plugin) y recibe feedback de éxito o error.
3. **Given** la junta, **When** cambia el importe de la cuota o el texto de beneficios en el contenido editable, **Then** la página refleja el cambio sin desarrollo.

---

### User Story 4 - Ver cómo ayudar sin (solo) pagar (Priority: P2)

Como persona que quiere contribuir con tiempo o habilidades, quiero ver opciones de colaboración puntual, habilidades profesionales y comisiones de trabajo, para saber cómo involucrarme.

**Why this priority**: Amplía la comunidad más allá de la cuota; refuerza el mensaje de AFA.

**Independent Test**: Sección «¿Cómo puedes ayudar?» con intro y tres vías; en escritorio en fila, en móvil apiladas.

**Acceptance Scenarios**:

1. **Given** escritorio, **When** llega a la sección, **Then** ve H2, texto de apoyo y tres fichas: Colaboración puntual, Tus habilidades, Comisiones de trabajo.
2. **Given** móvil, **When** ve la misma sección, **Then** las tres vías se apilan sin solapes.
3. **Given** una voluntaria, **When** actualiza los textos de colaboración, **Then** el front se actualiza sin código.

---

### User Story 5 - Resolver dudas por correo (Priority: P2)

Como visitante con preguntas, quiero un contacto claro por email, para escribir sin buscar en el pie.

**Why this priority**: Cierra el recorrido si el formulario no basta o hay dudas previas.

**Independent Test**: Bloque «¿Tienes dudas?» con enlace `mailto:` usable; el email es editable editorialmente.

**Acceptance Scenarios**:

1. **Given** la sección de dudas, **When** se muestra, **Then** hay un mensaje de contacto y un enlace de correo clicable.
2. **Given** la visitante, **When** activa el enlace, **Then** abre el cliente de correo con la dirección configurada.
3. **Given** la junta, **When** cambia la dirección mostrada, **Then** el enlace se actualiza (sin hardcodear en lógica del tema).

---

### Edge Cases

- Formulario no disponible aún (plugin no activo): el hueco del formulario muestra un mensaje claro o un CTA a Contacto; no un formulario falso que no envía.
- Envío con campos vacíos o inválidos: mensajes de error accesibles (responsabilidad del plugin; la página no debe romper el layout).
- Cuota distinta del mock (45 €): el importe es contenido editable; no fijarlo en código.
- Campos distintos entre mock móvil y escritorio: un solo conjunto canónico (ver Assumptions / refinamientos).
- Ilustración ausente: hueco con aspect-ratio estable o color de superficie; sin layout roto.
- Email de dudas distinto del del pie: ambos editables; no forzar unificación en código (decisión editorial).
- Ítem / botón «Hazte Socio» de la cabecera: activo o lleva a esta página; no deja «Inicio» como activo por error de mock.
- Cabecera y pie: se reutilizan los del sistema de diseño (spec 001).
- Pago online, tarjeta digital, CRM de socios: fuera del tema (plugin / procesos de la junta).

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: MUST existir una página alcanzable desde el CTA «Hazte Socio» de la cabecera (y, si aplica, desde el menú), con H1 «Hazte Socia/o» y eyebrow «Únete a nuestra familia».
- **FR-002**: El hero MUST incluir texto de apoyo editable, dos acciones (ir al formulario / saber más) e ilustración o media destacada; en móvil el layout se apila sin desbordes.
- **FR-003**: MUST existir la sección «¿Qué hacemos por el cole?» con intro y seis fichas (Extraescolares, Comedor Escolar, Carrera Solidaria, Feria del Libro, Ludoteca, Voz y Participación) con icono, título y descripción editables.
- **FR-004**: MUST existir el bloque «¿Cómo pertenecer?» con importe de cuota anual por familia, lista de beneficios y zona de formulario de solicitud de alta.
- **FR-005**: El formulario de alta MUST ser aportado por un **plugin** (o integración equivalente); el tema MUST solo envolverlo con estilos/presentación. Campos canónicos de solicitud: nombre del tutor/a, DNI/NIE, email de contacto (más aviso de privacidad si el plugin lo exige).
- **FR-006**: Tras un envío correcto, la persona MUST recibir confirmación visible y, según el copy, instrucciones de pago / carnet por los canales que defina la junta (email u otro); el tema no implementa el envío.
- **FR-007**: MUST existir la sección «¿Cómo puedes ayudar?» con tres vías de colaboración editables (puntual, habilidades, comisiones).
- **FR-008**: MUST existir un bloque de dudas con enlace de correo editable.
- **FR-009**: Cabecera y pie MUST reutilizar los del sistema de diseño (spec 001).
- **FR-010**: En anchos 390, 900 y 1280 px la página MUST coincidir con Figma en estructura y jerarquía, sin desbordes horizontales.
- **FR-011**: Textos de interfaz MUST estar en español y ser traducibles (`afa-poveda`); contraste de texto nuevo ≥ 4,5:1; foco visible en controles.
- **FR-012**: Esta feature MUST ser presentacional en el tema: sin CPT de socios, sin lógica de cuotas/pagos ni shortcodes inventados en el tema. El contenido informativo es editable por voluntarios.

### Key Entities

- **Página Hazte Socio**: Landing de captación con hero, valor, cuota, formulario y voluntariado.
- **Ficha de actividad AFA**: Ítem del grid «qué hacemos» (icono, título, descripción).
- **Oferta de cuota**: Importe anual por familia + beneficios listados.
- **Solicitud de alta**: Datos enviados por la familia (nombre, documento, email, etc.); gestionada fuera del tema.
- **Vía de colaboración**: Opción de voluntariado (puntual / habilidades / comisiones).
- **Contacto de dudas**: Dirección de correo y mensaje de apoyo.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: En una prueba con 5 personas no técnicas, al menos 4 identifican en ≤ 10 s que la página sirve para hacerse socia/o de la AFA.
- **SC-002**: Una visitante localiza cuota + formulario y completa (o intenta) el envío en ≤ 3 minutos en escritorio o móvil.
- **SC-003**: Con plugin de formularios activo, un envío válido produce confirmación visible; un envío inválido muestra errores sin romper la página.
- **SC-004**: Una voluntaria actualiza la cuota o un texto de beneficio y lo ve en front en ≤ 10 minutos sin ayuda técnica.
- **SC-005**: Revisión visual a 390, 900 y 1280 px sin desbordes; contraste AA en textos y controles nuevos.

## Assumptions

- Slug sugerido: `/hazte-socio/` (alineado con el CTA de cabecera ya usado en el sitio).
- Copy canónico = **escritorio** (`27:3962`). Variantes de móvil (textos de botones, campos del form, títulos de colaboración) se unifican según refinamientos.
- Campos canónicos del formulario: Nombre del tutor/a, DNI/NIE, Email (como escritorio). El mock móvil (teléfono en lugar de DNI, checkbox privacidad) se resuelve en el plugin; se recomienda incluir consentimiento de privacidad aunque no aparezca en el mock de escritorio (RGPD).
- Importe de cuota de referencia del diseño: 45 € / familia / año; editable.
- El pago no se cobra en la web en v1: el copy indica que las instrucciones llegan por email (proceso de la junta / plugin).
- Frames `Formulario - Errores`, `Formulario - Confirmación`, `Inscripcion` son del flujo de formulario genérico; esta spec cubre la **landing** Hazte Socio y el hueco del form.
- Email de dudas del mock (`ampapoveda.madrid@gmail.com`) vs `info@…` del pie: editorial; no se unifica por código.
- Se reutilizan tokens y componentes de la spec 001.
- El botón «Hazte Socio» de la cabecera (spec 001 / portada) apunta a esta página.

## Refinamientos respecto a Figma

| # | En Figma | En esta feature | Motivo |
|---|---|---|---|
| R1 | Formulario «nativo» en el mock | Hueco estilizado + plugin de formularios | Constitución III (lógica fuera del tema) |
| R2 | Campos distintos móvil vs escritorio | Campos canónicos de escritorio + privacidad vía plugin | Un solo formulario; RGPD |
| R3 | Botones hero «Formulario… / Saber más» vs móvil «Quiero hacerme… / Más info» | Unificar a escritorio (o equivalentes editables) | Un copy (constitución IV) |
| R4 | «Tus Habilidades» vs móvil «Tus Iniciativas» | Canónico: «Tus Habilidades» (escritorio) | Coherencia |
| R5 | «Feria del Libro» vs móvil «Fiesta del Libro» | Canónico: «Feria del Libro» | Escritorio |
| R6 | Confirmación / errores de envío en frames aparte | Plugin; no plantillas de tema dedicadas en v1 | Alcance landing |
| R7 | Pago y carnet digital | Fuera del tema; solo copy + email/proceso junta | Constitución III |
| R8 | Sticky / efectos fancy | No requeridos | Simplicidad y rendimiento |

## Alcance fuera

- Cobro online de la cuota, pasarela de pago, generación de carnet digital.
- CRM / base de datos de socias/os como CPT en el tema.
- Frames de error/éxito de formulario genérico como páginas del tema (salvo que el plugin los renderice en sitio).
- Página Extraescolares, Servicios (ya specs propias), Contacto completo.
- Rediseño de cabecera o pie.
- App o área privada de socias/os.
