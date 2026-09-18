# Feature Specification: Servicios AFA (listado y detalle)

**Feature Branch**: `005-servicios`

**Created**: 2026-09-18

**Status**: Lista (v1 páginas + patterns; CPT Servicios/Extraescolares aplazado a plugin futuro)

**Input**: User description: "nuevo spec del figma SERVICIOS" — pantallas de listado homogéneo de servicios y detalle de servicio (Comedor Escolar) en escritorio y móvil, a partir de capturas y frames del archivo Figma AFA.

**Fuente de diseño**: Figma `AFA`, canvas `screens`, frames:

| Vista | Frame | ID |
|---|---|---|
| Listado escritorio | `Nuestros Servicios - Vista Homogénea` | `26:3374` |
| Listado móvil | `Nuestros Servicios - Vista Homogénea` | `27:4354` |
| Detalle escritorio | `Detalle de Servicio - Comedor Escolar` | `26:3175` |
| Detalle móvil | `Detalle de Servicio - Comedor Escolar` | `27:4168` |

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Descubrir los servicios de la AFA (Priority: P1)

Como madre o padre, quiero abrir «Servicios» y ver de un vistazo qué ofrece la AFA (comedor, biblioteca, primeros del cole, música y arte, deporte, escuela de familias), para elegir a cuál entrar.

**Why this priority**: Sin el listado no hay puerta de entrada a los servicios; es el ítem de menú y el hub informativo.

**Independent Test**: Abrir `/servicios/` (o la página enlazada desde el menú) en escritorio y móvil; comprobar intro, seis fichas y CTA inferior; pulsar «Ver más» de una ficha y llegar al detalle.

**Acceptance Scenarios**:

1. **Given** una visitante en escritorio (≥ 1024 px), **When** abre Servicios, **Then** ve la etiqueta «COMPROMISO Y COMUNIDAD», el H1 «Servicios AFA», un texto de apoyo y una rejilla de seis fichas de servicio (3×2).
2. **Given** la misma página en móvil (~390 px), **When** carga, **Then** ve la misma intro (migas o etiqueta superior + H1 + texto) y las seis fichas apiladas en una columna, sin desbordes horizontales.
3. **Given** cualquier ficha, **When** activa «Ver más» (o «Leer más» unificado), **Then** llega a la página de detalle de ese servicio.

---

### User Story 2 - Entender un servicio concreto (Comedor) (Priority: P1)

Como familia interesada en el comedor, quiero una ficha de detalle con hero, explicación de alimentación saludable, menús descargables, datos nutricionales orientativos y preguntas frecuentes, para decidir si me conviene y cómo funciona.

**Why this priority**: El Comedor es el servicio de referencia del diseño y el de mayor demanda práctica (menús, alérgenos, precios).

**Independent Test**: Abrir el detalle de Comedor Escolar en escritorio (columna principal + barra lateral) y móvil (todo en columna); comprobar hero, secciones de contenido, FAQ y bloques de inscripción/documentación.

**Acceptance Scenarios**:

1. **Given** escritorio, **When** abre el detalle de Comedor, **Then** ve un hero a ancho completo con foto, distintivo «Servicio Destacado», título «Comedor Escolar» y subtítulo sobre nutrición equilibrada y proximidad.
2. **Given** el mismo detalle, **When** hace scroll al contenido, **Then** ve «Alimentación Saludable» (texto + dos puntos con icono: equilibrado y control de alérgenos), «Valores Nutricionales y Menú» (descargas de menús + composición media diaria) y «Preguntas Frecuentes» en acordeón.
3. **Given** móvil, **When** abre el mismo detalle, **Then** el hero y las secciones se apilan; inscripción y documentación aparecen debajo del contenido principal (no en sidebar).

---

### User Story 3 - Ver precio, horario e inscribirse (Priority: P1)

Como familia que ya quiere apuntarse, quiero ver de forma clara el precio para socias/os y no socias/os, el horario del servicio y un botón «Inscribirse Ahora», para pasar a la inscripción sin buscar en otro sitio.

**Why this priority**: Es la conversión principal del detalle; sin ella la página solo informa y no lleva a la acción.

**Independent Test**: En detalle Comedor, localizar la tarjeta azul de inscripción, comprobar precios, distintivo de descuento, horario y que el CTA lleva a un destino configurable (formulario/plugin o página de inscripción).

**Acceptance Scenarios**:

1. **Given** el detalle de Comedor, **When** se muestra la tarjeta «Inscripción», **Then** aparecen precio socias/os AFA con distintivo de descuento, precio no socias/os, horario de servicio y el botón «Inscribirse Ahora».
2. **Given** una visitante, **When** pulsa «Inscribirse Ahora», **Then** llega al destino de inscripción configurado por la junta (fuera del alcance de lógica del tema).
3. **Given** una voluntaria del editor, **When** actualiza precios, horario, curso de matrícula o el enlace del CTA, **Then** el cambio se refleja sin tocar código.

---

### User Story 4 - Descargar menús y documentación (Priority: P2)

Como familia, quiero descargar el menú basal, el menú de alérgenos y documentos (reglamento, protocolo, becas), para consultarlos offline o compartirlos en casa.

**Why this priority**: Uso recurrente cada mes; reduce consultas a la junta por correo.

**Independent Test**: Con archivos de ejemplo enlazados, pulsar cada «Descargar» y cada documento de la lista; verificar que abre o descarga el archivo correcto.

**Acceptance Scenarios**:

1. **Given** menús publicados, **When** la visitante pulsa «Descargar» en «Menú Basal» o «Menú Alérgenos», **Then** obtiene el archivo correspondiente (nombre y tamaño visibles si la junta los mantiene actualizados).
2. **Given** la tarjeta «Documentación», **When** pulsa un ítem (Reglamento, Protocolo, Formulario de Becas), **Then** abre o descarga ese documento.
3. **Given** un documento aún no subido, **When** la junta no ha enlazado el archivo, **Then** ese ítem no se muestra o se marca de forma clara como no disponible, sin enlaces rotos.

---

### User Story 5 - Resolver dudas del listado (CTA) (Priority: P2)

Como visitante con dudas generales sobre servicios, quiero un bloque final «¿Tienes alguna duda…?» con acceso a contacto y a preguntas frecuentes, para no quedarme bloqueada en el listado.

**Why this priority**: Cierra el recorrido del hub; complementa las FAQ de cada detalle.

**Independent Test**: En la página de listado, comprobar el banner azul y que ambos botones llevan a destinos configurables (Contacto y FAQ/servicios o ancla).

**Acceptance Scenarios**:

1. **Given** el listado en escritorio, **When** llega al CTA, **Then** ve titular, texto de apoyo y dos botones («Contactar ahora» y «Preguntas frecuentes») en fila.
2. **Given** el listado en móvil, **When** llega al CTA, **Then** los mismos botones se apilan a ancho usable.
3. **Given** cada botón, **When** se activa, **Then** navega al destino editorial configurado (p. ej. Contacto y una página o sección de FAQ).

---

### User Story 6 - Editar contenido sin desarrollo (Priority: P2)

Como voluntaria de la junta, quiero poder actualizar textos, fotos, precios, fichas del listado, FAQ y documentos desde el Editor del sitio / páginas, para mantener el curso actual sin llamar al desarrollador.

**Why this priority**: Constitución IV; los servicios cambian de curso en curso.

**Independent Test**: Cambiar un título de ficha, un precio y un enlace de menú PDF; verificar en front que se actualizan.

**Acceptance Scenarios**:

1. **Given** la página de listado, **When** se edita eyebrow, H1, intro o una ficha (imagen, etiqueta, título, descripción, meta, enlace), **Then** el front refleja el cambio.
2. **Given** una página de detalle, **When** se editan hero, secciones, FAQ, inscripción o documentación, **Then** el front refleja el cambio sin desplegar código.
3. **Given** un servicio nuevo o uno que se da de baja, **When** la junta añade o quita una ficha del listado y su página de detalle, **Then** el hub permanece coherente (sin fichas huérfanas visibles).

---

### Edge Cases

- Menos de seis servicios publicados: el listado muestra solo los disponibles; la rejilla no deja huecos rotos ni mensajes de error.
- Más de seis servicios: se muestran todos en la misma rejilla (escritorio 3 columnas, móvil 1); no se fuerza un máximo de 6 en producto (el 6 es el contenido de Figma).
- Servicio sin imagen: ficha con marcador de posición coherente con el sistema de diseño, sin romper la rejilla.
- Detalle sin menús PDF o sin documentación: esas subsecciones se ocultan o muestran estado vacío discreto.
- Detalle sin FAQ: la sección FAQ no aparece o no muestra acordeón vacío.
- FAQ con una sola pregunta abierta por defecto (como en Figma): el resto colapsadas; teclado y lector de pantalla pueden abrir/cerrar todas.
- Enlace de inscripción aún no configurado: el botón no lleva a un 404; o no se muestra, o apunta a Contacto como respaldo editorial.
- Etiquetas de categoría con colores distintos: contraste de texto sobre la píldora ≥ 4,5:1 (o se ajusta el token).
- Ítem de menú activo: «Servicios» (no «Inicio», aunque algún mock lo subraye mal).
- Cabecera y pie: se reutilizan los del sistema de diseño; diferencias de dirección del pie no se resuelven aquí.
- Formularios de inscripción reales, pago y gestión de plazas: fuera de alcance del tema (plugin).

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: MUST existir una página de listado alcanzable desde el ítem de menú «Servicios», con eyebrow «COMPROMISO Y COMUNIDAD», H1 «Servicios AFA» y texto de apoyo editable.
- **FR-002**: MUST listar servicios en fichas homogéneas con: imagen, etiqueta de categoría (píldora), título, descripción corta, meta con icono + etiqueta de frecuencia/uso (p. ej. Diario, Tarde) y enlace «Ver más».
- **FR-003**: En escritorio MUST mostrar las fichas en rejilla de tres columnas; en móvil MUST apilar a una columna. Sin barra lateral en el listado.
- **FR-004**: MUST existir un bloque CTA al final del listado con titular «¿Tienes alguna duda sobre los servicios?», texto de apoyo y dos acciones: contacto y preguntas frecuentes (destinos configurables).
- **FR-005**: MUST existir al menos la página de detalle de «Comedor Escolar» como referencia canónica del diseño de detalle de servicio.
- **FR-006**: El detalle MUST incluir hero a ancho completo (imagen, distintivo opcional «Servicio Destacado», título y subtítulo).
- **FR-007**: El detalle MUST permitir una sección descriptiva principal (canónica: «Alimentación Saludable») con texto y hasta dos puntos destacados con icono y título/descripción.
- **FR-008**: El detalle MUST permitir una sección de menús/valores (canónica: «Valores Nutricionales y Menú») con lista de descargas (nombre, tamaño opcional, acción Descargar) y un bloque de indicadores numéricos («Composición Media Diaria») cuando haya datos.
- **FR-009**: El detalle MUST permitir una sección de preguntas frecuentes en acordeón (una pregunta expandida a la vez o varias, siempre operable por teclado y con estado accesible).
- **FR-010**: En escritorio el detalle MUST usar layout de dos columnas: contenido principal a la izquierda e inscripción + documentación a la derecha. En móvil MUST apilar: contenido y después inscripción y documentación.
- **FR-011**: La tarjeta de inscripción MUST mostrar precios diferenciados (socias/os vs no socias/os), distintivo de descuento cuando aplique, horario, CTA «Inscribirse Ahora» y nota de matrícula/curso; el CTA MUST ser un enlace configurable (la lógica de formulario no vive en el tema).
- **FR-012**: La tarjeta de documentación MUST listar documentos enlazados con icono y título; ítems sin archivo no deben producir enlaces rotos.
- **FR-013**: Cabecera y pie MUST reutilizar los del sistema de diseño (spec 001); el enlace «Servicios» del menú queda activo en listado y en páginas de detalle de servicio.
- **FR-014**: En anchos 390, 900 y 1280 px listado y detalle MUST coincidir con Figma en estructura y jerarquía, sin desbordes horizontales.
- **FR-015**: Textos de interfaz MUST estar en español y ser traducibles (`afa-poveda`); contraste de texto nuevo ≥ 4,5:1; foco visible en controles interactivos.
- **FR-016**: Esta feature MUST ser presentacional y editable: no registra tipos de contenido, taxonomías, formularios ni pagos en el tema. Otras páginas de servicio (Biblioteca, Primeros del Cole, etc.) reutilizan el mismo patrón de detalle con contenido propio.
- **FR-017**: Los seis servicios del mock inicial MUST poder representarse en el listado: Comedor Escolar, Biblioteca y Apoyo, Primeros del Cole, Música y Arte, Deporte Escolar, Escuela de Familias (nombres y metas canónicos según escritorio; ver refinamientos si móvil diverge).

### Key Entities

- **Listado de servicios**: Página hub con intro, rejilla de fichas y CTA final.
- **Servicio (ficha)**: Oferta de la AFA con imagen, categoría, título, descripción, meta de frecuencia/uso y enlace al detalle.
- **Detalle de servicio**: Página de un servicio concreto (hero, secciones informativas, FAQ, inscripción, documentación).
- **Descarga de menú / documento**: Archivo enlazado (PDF u otro) con título y, opcionalmente, tamaño visible.
- **Indicador nutricional**: Valor numérico etiquetado (p. ej. kcal, proteína) mostrado en la composición media.
- **Pregunta frecuente**: Par pregunta/respuesta del acordeón del detalle.
- **Inscripción (presentación)**: Bloque de precios, horario y CTA hacia el flujo externo de alta.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: En una prueba con 5 personas no técnicas, al menos 4 identifican en ≤ 10 s que la página es el listado de servicios de la AFA.
- **SC-002**: Una visitante llega desde el menú «Servicios» al detalle de Comedor y localiza precio + botón de inscripción en ≤ 3 pulsaciones / ≤ 1 minuto de scroll.
- **SC-003**: Con contenido de ejemplo (6 fichas + detalle Comedor completo), se pueden completar listado → detalle → descarga de un menú → CTA de inscripción sin bloques rotos en escritorio y móvil.
- **SC-004**: Una voluntaria actualiza un precio y un PDF de menú y lo ve publicado en ≤ 10 minutos sin ayuda técnica.
- **SC-005**: Revisión visual a 390, 900 y 1280 px sin desbordes; contraste AA en textos y controles nuevos (píldoras, botones del CTA, acordeón, tarjeta de inscripción).

## Assumptions

- Slug sugerido del listado: `/servicios/`. El detalle de Comedor vive en una página hija o hermana enlazada desde la ficha (p. ej. `/servicios/comedor-escolar/`); el slug exacto lo define la junta.
- El contenido canónico de etiquetas, metas y copy del listado es el de **escritorio** (`26:3374`). Las variantes de móvil (textos de meta distintos, «Leer más» vs «Ver más», tags distintos) se unifican según la tabla de refinamientos.
- «Primeros del Cole» es el nombre canónico (escritorio); no «Primera del Cole» / «Extraescolar del Cole» si aparecen en exports.
- El detalle de Comedor es la plantilla de referencia; el resto de servicios reutilizan la misma estructura, omitiendo secciones vacías.
- «Inscribirse Ahora» no implementa el formulario en el tema: enlaza a la página/plugin de inscripción (p. ej. feature de Inscripción del Figma) cuando exista; hasta entonces puede apuntar a Contacto.
- Precios, horarios y curso (2023/24 vs 2024/25 en mocks) son contenido editorial; no se fijan en código.
- Tamaños de archivo (1,2 MB, etc.) son informativos; si no se pueden mantener al día, basta con el nombre y el enlace.
- FAQ del detalle es contenido de la página, no un sistema global de FAQ del sitio (el CTA del listado puede apuntar a Contacto o a una página FAQ general).
- Se reutilizan tokens y componentes de la spec 001 (colores, tipografías, radios, botones, cabecera, pie).
- Extraescolares como sección propia del menú (frame `Extraescolares`) es otra feature; aquí «Música y Arte» / «Deporte» aparecen como servicios del hub.
- Diferencias de dirección del pie (Alfonso XII vs San Sergio) siguen pendientes con la junta (spec 001).
- **Decisión 2026-09-18**: v1 permanece en páginas WP + patterns (sin CPT en el tema). Más adelante, un **plugin** registrará los CPT necesarios; **Servicios** y **Extraescolares** serán CPT. El tema aportará entonces plantillas `archive`/`single` (o Query Loop) sin registrar tipos. Esta v1 es maquetación editable; la migración de contenido páginas → CPT se planificará en esa fase.

## Refinamientos respecto a Figma

| # | En Figma | En esta feature | Motivo |
|---|---|---|---|
| R1 | Metas y copy distintos en móvil vs escritorio en fichas | Unificar a versión escritorio (Diario, Tarde, Mañana, Semanal, Competición, Mensual; «Ver más») | Un copy, menos mantenimiento (constitución IV) |
| R2 | Tags distintos en algunos exports móvil | Tags canónicos de escritorio: Nutrición, Aprendizaje, Conciliación, Extraescolares, Deporte, Familia | Coherencia del listado |
| R3 | Curso 2023/24 y 2024/25 según frame | Contenido editable; no hardcodear curso | La junta cambia cada año |
| R4 | Inicio subrayado en algunos mocks | Ítem activo: «Servicios» | El subrayado de Inicio es error de mock |
| R5 | Formulario de inscripción embebido implícito | Solo CTA con enlace configurable | Lógica en plugin (constitución III) |
| R6 | Sidebar sticky en detalle escritorio | Comportamiento sticky opcional si no exige JS a medida; si no, sidebar estática en flujo | Preferir sin scripts de terceros |
| R7 | Colores de píldora muy saturados / distintos por servicio | Tokens de etiqueta del sistema de diseño; ajustar si falla contraste AA | Constitución II y V |
| R8 | «Leer más» en un export móvil | «Ver más» en todos los anchos | Alinea con escritorio |
| R9 | Composición media y menús solo en Comedor | Otras páginas de servicio omiten bloques sin contenido | Plantilla flexible, no forzar datos inventados |
| R10 | Dirección del pie distinta entre frames | Pie global de spec 001; no tocar aquí | Fuera de alcance |
| R11 | Stats nutricionales ámbar/rojo | Hex `#9a6700` / `#b3261e` solo en `style.css` con comentario | Sin presets de color equivalentes en theme.json |

## Alcance fuera

- Formulario de inscripción, validación, pago, plazas o cuotas (plugins / feature Inscripción del Figma).
- Página Extraescolares completa (frame propio) y configurador de semana.
- Calendario escolar, actualidad/noticias, contacto, hazte socio (más allá del enlace del CTA).
- CPT / taxonomías en esta feature (ni en el tema ni aún en plugin); pendiente plugin futuro para Servicios y Extraescolares.
- Rediseño de cabecera o pie.
- App nativa o área privada de familias.
- Generación automática de PDFs de menú o cálculo nutricional real.
