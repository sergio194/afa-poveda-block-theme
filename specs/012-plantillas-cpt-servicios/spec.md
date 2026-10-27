# Feature Specification: Plantillas del CPT Servicios

**Feature Branch**: `012-plantillas-cpt-servicios`

**Created**: 2026-10-27

**Status**: Hecha (pendiente validación visual en Editor y móvil real)

**Input**: User description: "Spec 012 — Plantillas CPT de Servicios. Aplicar el diseño de la spec 005 sobre el tipo de contenido `afa_servicio` del plugin afa-padre-poveda-core (contrato §7 v1.9.0)."

**Fuente de diseño**: la de la spec 005 (Figma `AFA`, canvas `screens`): listado `26:3374` / `27:4354`; detalle Comedor `26:3175` / `27:4168`. Esta spec no introduce diseño nuevo: reubica el mismo diseño sobre contenido dinámico.

**Fuente de datos**: plugin `afa-padre-poveda-core`, contrato [§7 Servicios](../../../../plugins/afa-padre-poveda-core/docs/contrato-tema.md) (v1.9.0): post type `afa_servicio`, taxonomía `afa_servicio_categoria`, metas `afa_servicio_subtitulo|frecuencia|horario|nota`, bloques `afa-padre-poveda/servicio-{inscripcion,faq,documentos,indicadores,etiqueta}`.

## Clarifications

### Session 2026-10-27 (decisiones tomadas sin la persona responsable, revisar)

- Q: ¿De dónde sale el texto principal de la ficha (secciones «Alimentación saludable», etc.)? → A: Del contenido libre del propio servicio (`post-content`), editable con el editor de bloques; la plantilla solo fija hero, columna lateral y los bloques de datos del plugin (inscripción, documentos). FAQ e indicadores se colocan en la plantilla tras el contenido.
- Q: ¿Qué hace el hero si el servicio no tiene imagen destacada? → A: Fondo `primary` plano con texto `base`, misma altura mínima; nunca un hueco vacío.
- Q: ¿Cómo se colorean las píldoras de categoría en el listado dinámico? → A: Un único color (`primary` sobre `base`). Los colores por categoría de la 005 solo existen en el pattern estático; el Query Loop no expone la clase de término y no se añade lógica (constitución III). Desviación de Figma anotada.
- Q: ¿Qué se muestra en el listado dinámico si no hay servicios o el plugin está inactivo? → A: Mensaje de `query-no-results` editable («Aún no hay servicios publicados.»); sin errores. La página de la 005 sigue usando el pattern estático.
- Q: ¿«Ver más» y la frecuencia en el listado cómo se obtienen? → A: Enlace con `post-title`/`read-more` del núcleo (nombre accesible incluye el título); frecuencia con `core/post-meta` vinculado a `afa_servicio_frecuencia` (si el plugin no expone la meta, el elemento no se imprime).
- Q: ¿Qué columna lateral en escritorio? → A: Dos columnas 2/3 + 1/3 como en 26:3175; en ≤ 781 px apilado. La inscripción y documentos van en la columna lateral con `position: sticky` no aplicado (se evita por accesibilidad con zoom).

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Ver la ficha de un servicio dado de alta como contenido (Priority: P1)

Como familia, quiero abrir la URL de un servicio (p. ej. «Comedor Escolar») y ver la misma ficha de detalle que diseñó la spec 005 —hero, contenido, inscripción, documentación, preguntas frecuentes—, para no notar si la junta creó el servicio como página o como contenido de tipo Servicio.

**Why this priority**: Es la razón de ser de la spec: sin plantilla propia, un `afa_servicio` se pinta con la plantilla genérica y pierde todo el diseño.

**Independent Test**: Con un servicio de prueba publicado que tenga datos (precios, horario, FAQ, documentos), abrir su URL en 390, 900 y 1280 px y comparar con Figma 26:3175 / 27:4168.

**Acceptance Scenarios**:

1. **Given** un servicio publicado con imagen destacada, título y subtítulo, **When** se abre su URL en escritorio, **Then** se ve el hero a ancho completo con título (único H1), subtítulo, y la etiqueta de «Servicio destacado» solo si el servicio está marcado como destacado.
2. **Given** el mismo servicio con precios, horario y enlace, **When** se desplaza al contenido, **Then** el contenido principal queda a la izquierda y a la derecha la tarjeta de inscripción y la de documentación; en móvil todo se apila (contenido, inscripción, documentación).
3. **Given** un servicio con FAQ, documentos e indicadores, **When** se visualiza, **Then** cada bloque del plugin aparece con el aspecto del diseño (acordeón, lista de descargas, composición media) y sin estilos del navegador por defecto.
4. **Given** un servicio sin precios, sin FAQ y sin documentos, **When** se visualiza, **Then** esas secciones y sus contenedores no dejan huecos, bordes ni títulos vacíos.

---

### User Story 2 - Listado de servicios alimentado por el contenido (Priority: P1)

Como familia, quiero que la página «Servicios» muestre una ficha por cada servicio publicado, para que un servicio nuevo aparezca sin que nadie edite la rejilla a mano.

**Why this priority**: Hoy la rejilla de la 005 son seis fichas fijas; con el CPT debe ser dinámica o los dos mundos divergen.

**Independent Test**: Publicar un servicio nuevo con imagen, categoría y frecuencia; recargar `/servicios/` y ver su ficha sin tocar la página.

**Acceptance Scenarios**:

1. **Given** el plugin activo y servicios publicados, **When** se abre la página del listado con el pattern dinámico, **Then** hay una ficha por servicio: imagen, píldora de categoría, título, descripción corta, frecuencia con icono y enlace «Ver más» a su URL.
2. **Given** menos de tres o más de seis servicios, **When** se abre el listado, **Then** la rejilla (3 columnas en escritorio, 1 en móvil) no deja huecos rotos y no hay límite artificial de seis.
3. **Given** un servicio sin imagen destacada, **When** aparece en el listado, **Then** muestra un marcador coherente con el sistema de diseño y mantiene la proporción de las demás fichas.

---

### User Story 3 - El tema sigue funcionando sin el plugin (Priority: P1)

Como junta, quiero poder desactivar o cambiar el plugin sin que la web de servicios se rompa ni pierda contenido (constitución III).

**Why this priority**: Es una regla no negociable del proyecto.

**Independent Test**: Desactivar el plugin y abrir `/servicios/`, el detalle de Comedor (páginas de la 005) y una URL de servicio.

**Acceptance Scenarios**:

1. **Given** el plugin desactivado, **When** se abren las páginas de la 005, **Then** se ven exactamente como antes de esta spec (plantillas `page-servicios` y `page-servicio-detalle`, patterns estáticos intactos).
2. **Given** el plugin desactivado, **When** se abre el listado con el pattern dinámico, **Then** no hay errores PHP ni bloques inválidos y se muestra un aviso editorial o el listado vacío, nunca una pantalla rota.

---

### User Story 4 - Mantener las direcciones actuales (Priority: P2)

Como junta, quiero que las URLs de servicios que ya están publicadas sigan funcionando al pasar a contenido de tipo Servicio.

**Why this priority**: Evita enlaces rotos y pérdida de posicionamiento; la garantía de URL la da el plugin, el tema solo debe no romperla.

**Independent Test**: Comprobar que la plantilla de detalle responde en la ruta que construye el plugin y que el ítem «Servicios» del menú queda activo en el listado y en cada ficha.

**Acceptance Scenarios**:

1. **Given** un servicio en la ruta `/servicios/<slug>/`, **When** se abre, **Then** responde 200 con la plantilla de detalle y «Servicios» aparece activo en el menú.

---

### User Story 5 - Editar sin tocar código (Priority: P2)

Como voluntaria, quiero ajustar desde el Editor del sitio los textos fijos de la plantilla (títulos de sección, texto del botón) y rellenar los datos desde la ficha del servicio, sin llamar al desarrollador.

**Why this priority**: Constitución IV.

**Acceptance Scenarios**:

1. **Given** la plantilla de detalle abierta en el Editor del sitio, **When** se revisa, **Then** ningún bloque aparece como «no válido» y los bloques del plugin son seleccionables con sus atributos editables.

---

### Edge Cases

- Servicio con título muy largo: el hero y la ficha del listado no desbordan en 390 px.
- Servicio sin imagen destacada: el hero usa fondo de color del sistema de diseño con texto de contraste ≥ 4,5:1.
- Servicio sin subtítulo, sin frecuencia o sin categoría: el elemento se omite sin dejar márgenes ni iconos huérfanos.
- Categorías con colores distintos: el texto de la píldora mantiene contraste ≥ 4,5:1.
- Plugin desactivado con servicios ya creados: sus URLs no deben dar error fatal (el contenido se conserva en base de datos).
- Dos servicios con el mismo nombre de categoría: se muestran sin duplicar ni romper la rejilla.
- Lectores de pantalla: iconos decorativos ocultos; enlaces «Ver más» con nombre accesible propio de cada ficha.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: El tema MUST incluir una plantilla `single-afa_servicio.html` que muestre un servicio con hero (imagen destacada, título como único H1, subtítulo vinculado a `afa_servicio_subtitulo`, etiqueta de destacado), contenido principal del servicio y, en escritorio, columna lateral con inscripción y documentación.
- **FR-002**: En móvil (≤ 781 px) la plantilla MUST apilar: contenido principal, inscripción, documentación; sin barra lateral ni desbordes horizontales.
- **FR-003**: La plantilla MUST usar los bloques del plugin `servicio-inscripcion`, `servicio-documentos`, `servicio-indicadores`, `servicio-faq` y `servicio-etiqueta`, en el orden y posición de Figma 26:3175.
- **FR-004**: El tema MUST dar estilo a las clases `afa-core-servicio-*` del contrato §7 (inscripción con precios y distintivo de descuento, FAQ, documentos, indicadores, etiquetas) para igualar el diseño de la 005, usando solo presets de `theme.json` y reservas neutras (contrato §4).
- **FR-005**: Los bloques del plugin sin datos MUST no producir contenedores visibles; el tema no debe añadir bordes, rellenos ni títulos alrededor de un bloque que no imprime nada.
- **FR-006**: El tema MUST ofrecer un pattern de listado dinámico («Servicios — Rejilla desde contenido») con Query Loop de `afa_servicio`: imagen destacada, etiqueta de categoría, título, extracto, frecuencia y enlace «Ver más», en rejilla de 3 columnas (escritorio) y 1 (móvil), con las mismas fichas visuales de la 005.
- **FR-007**: El pattern estático `servicios-grid` de la 005 MUST conservarse; el nuevo es una alternativa. La página de listado actual no cambia hasta que la junta decida sustituir el pattern.
- **FR-008**: El tema MUST NOT registrar el CPT, taxonomías, metas, bloques ni shortcodes (constitución III); las plantillas MUST renderizar sin errores con el plugin desactivado.
- **FR-009**: El ítem «Servicios» del menú MUST quedar marcado como activo en el listado y en cada ficha de `afa_servicio`.
- **FR-010**: La plantilla `single-afa_servicio` MUST reutilizar cabecera, pie, enlace «Saltar al contenido» (`#contenido`) y la jerarquía de encabezados de la spec 007.
- **FR-011**: Todo texto fijo MUST estar en español y ser traducible con `afa-poveda`; contraste ≥ 4,5:1 en texto nuevo, foco visible en controles.
- **FR-012**: No existe archivo público de `afa_servicio` (el plugin tiene `has_archive` desactivado); el tema MUST NOT crear una plantilla de archivo de este tipo.

### Key Entities

- **Servicio** (contenido del plugin): título, imagen destacada, extracto, contenido libre, categoría, metas de subtítulo/frecuencia/horario/nota, precios, FAQ, documentos, indicadores.
- **Plantilla de detalle**: composición de bloques del tema + bloques del plugin; no guarda datos.
- **Pattern de listado dinámico**: Query Loop sobre Servicio; no guarda datos.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: Un servicio nuevo publicado con datos completos se ve con el diseño de la 005 en 390, 900 y 1280 px sin ninguna edición de código.
- **SC-002**: Un servicio nuevo aparece en el listado dinámico en la siguiente carga de la página, sin editar la página.
- **SC-003**: Con el plugin desactivado, 0 errores PHP y 0 bloques «no válidos» en las plantillas y patterns tocados.
- **SC-004**: 0 desbordes horizontales en 390 px en listado y detalle.
- **SC-005**: Todo texto nuevo cumple contraste ≥ 4,5:1 (calculado, no a ojo).
- **SC-006**: La ficha de un servicio sin precios/FAQ/documentos no muestra ningún contenedor ni título vacío.

## Assumptions

- El plugin está en contrato 1.x y expone los bloques descritos; no se modifica.
- La ruta pública de los servicios la decide el plugin a partir de la página «hub»; el tema no la fuerza.
- El diseño de Figma de la 005 es la referencia; el detalle de Comedor es el canónico. No hay mock específico del CPT: toda desviación se anota aquí.
- Las páginas actuales de la 005 siguen en producción hasta que la junta migre a mano su contenido a Servicios (migración de datos fuera de alcance).
- Cobro, formularios de inscripción y gestión de plazas quedan fuera (plugin).
