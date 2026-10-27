# Feature Specification: Extraescolares — archivo y ficha de actividad

**Feature Branch**: `009-extraescolares-archivo-ficha`

**Created**: 2026-10-27

**Status**: Hecha (pendiente validación visual en Editor y móvil real)

**Input**: Backlog 009 — plantillas de archivo y single del CPT `afa_extraescolar` del plugin (plugin-003 ✅, contrato §8 v1.9.0). Sin mock móvil: definir la adaptación.

**Fuente de diseño**: Figma `AFA` (`lS6WwjiFrPKd60cQTfXrKF`):

| Vista | Frame | ID |
|---|---|---|
| Archivo de actividades (escritorio) | `Extraescolares - AFA Padre Poveda` | `1:673` |
| Ficha de actividad (escritorio) | `Detalle de Actividad` | `8:2305` |

**Fuente de datos**: [contrato §8](../../../../plugins/afa-padre-poveda-core/docs/contrato-tema.md): post type `afa_extraescolar`, taxonomías `afa_extraescolar_categoria` y `afa_extraescolar_curso` (sin archivo público), metas `afa_extraescolar_{curso_escolar,dias,horario,ubicacion,ubicacion_nota,nota_precio}`, filtros GET `buscar`/`categoria`/`curso`, bloques `afa-padre-poveda/extraescolares-filtro`, `extraescolar-{precios,datos,etiqueta,horarios,ubicacion,requisitos}`.

## Clarifications

### Session 2026-10-27 (decisiones tomadas sin la persona responsable, revisar)

- Q: ¿Cómo se adapta el diseño a móvil (no hay mock)? → A: Archivo: filtro apilado (campos a ancho completo) y fichas en 1 columna; en 900 px, 2 columnas. Ficha: la imagen pasa sobre el texto del hero, columnas «Horarios» y «Ubicación» apiladas, requisitos en 1 columna y la tarjeta de precios después del contenido.
- Q: ¿El filtro y la consulta del archivo los pone el plugin o el tema? → A: El filtro es el bloque del plugin (formulario GET); el archivo usa un Query Loop con `inherit: true` para que reciba `buscar`/`categoria`/`curso` del plugin. El tema solo da estilo.
- Q: ¿De dónde sale el texto del hero del Figma («Descubre la oferta… 2024/2025»)? → A: Texto editable en la plantilla (sin año fijo: «Descubre la oferta formativa y de ocio del curso. Un espacio para aprender, jugar y crecer juntos después de clase.»). El curso real lo aporta cada ficha vía meta.
- Q: ¿La píldora de categoría cambia de color por categoría (verde/amarillo/azul del Figma)? → A: Un único estilo (`primary-soft` con texto `primary`) para no meter lógica en el tema; desviación anotada.
- Q: ¿El banner «¿Tienes dudas…?» y el aviso «¿Aún no eres socio?» son contenido fijo? → A: Sí, patterns/plantilla con texto editable y enlaces a Contacto y Hazte socio por URL relativa; no dependen del plugin.
- Q: ¿Los iconos de Requisitos (portátil, check, ropa)? → A: El bloque `extraescolar-requisitos` imprime una lista; se estiliza como tarjetas en rejilla con un icono genérico decorativo por CSS (check), sin icono por requisito.
- Q: ¿Qué hace la ficha con la inscripción cerrada o sin precios? → A: Lo resuelve el bloque `extraescolar-precios` (muestra «Inscripción cerrada»); el tema solo estiliza `__cerrada`.
- Q: ¿Paginación del archivo? → A: Query Loop con paginación (12 por página) y los filtros se conservan (lo garantiza el plugin).

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Explorar las actividades extraescolares (Priority: P1)

Como familia, quiero ver todas las actividades en una rejilla y filtrarlas por nombre, categoría y edad/curso, para encontrar la adecuada para mi hijo o hija.

**Independent Test**: Abrir `/extraescolares/` con 3 actividades: se ven título, intro, filtro y fichas; aplicar `?categoria=deportes` y ver solo las de esa categoría.

**Acceptance Scenarios**:

1. **Given** actividades publicadas, **When** se abre el archivo en escritorio, **Then** hay H1 «Actividades Extraescolares», texto de apoyo, el filtro en una banda y fichas en rejilla de 3 columnas con imagen, categoría, título, extracto, días/horario, cursos, precios y botón «Inscribirse ahora».
2. **Given** móvil (390 px), **When** carga, **Then** filtro y fichas se apilan en una columna sin scroll horizontal.
3. **Given** un filtro sin resultados, **When** se aplica, **Then** aparece un mensaje claro y el formulario sigue disponible con «Quitar filtros».
4. **Given** una actividad sin imagen, **When** aparece en la rejilla, **Then** usa un marcador del sistema de diseño sin romper la altura.

---

### User Story 2 - Leer la ficha de una actividad (Priority: P1)

Como familia, quiero una ficha con descripción, horarios, ubicación, requisitos y precios para decidir e inscribirme.

**Independent Test**: Abrir la ficha de una actividad con todos los datos y comparar con Figma 8:2305; abrir una sin datos y comprobar que no hay huecos.

**Acceptance Scenarios**:

1. **Given** una actividad completa, **When** se abre la ficha, **Then** se ve enlace «Volver a extraescolares», hero (categoría, H1, extracto, cursos y días como chips, imagen), «Sobre la actividad», tarjetas Horarios y Ubicación, «Requisitos y materiales» y la tarjeta «Precios mensuales» con botón.
2. **Given** inscripción cerrada, **When** se abre, **Then** se ve «Inscripción cerrada» en lugar del botón.
3. **Given** una actividad sin horarios, ubicación o requisitos, **When** se abre, **Then** esas tarjetas no aparecen ni dejan hueco.
4. **Given** móvil, **When** se abre, **Then** todo se apila (imagen, texto, contenido, tarjetas, precios) sin desbordes.

---

### User Story 3 - Seguir funcionando sin el plugin (Priority: P1)

Sin el plugin, el tema no da errores y no mezcla noticias con actividades (constitución III).

**Acceptance Scenarios**:

1. **Given** el plugin desactivado, **When** se abre una página con el listado de la spec, **Then** aparece un aviso editorial, no noticias ni errores PHP.

---

### User Story 4 - Navegación y accesibilidad (Priority: P2)

«Extraescolares» queda activo en el menú en archivo y ficha; un solo H1; controles con foco visible; contraste ≥ 4,5:1; iconos decorativos ocultos.

### Edge Cases

- Título muy largo: no desborda en 390 px.
- Sin precios: la tarjeta de ficha del listado no muestra bloque de precios (lo decide el plugin).
- Archivo con una sola actividad: la rejilla no se estira a 3 columnas.
- Filtro con valores no válidos: lo gestiona el plugin; el tema no rompe.
- Más de 12 actividades: paginación visible y operable por teclado.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: El tema MUST incluir `templates/archive-afa_extraescolar.html` con H1, texto de apoyo, bloque `afa-padre-poveda/extraescolares-filtro`, Query Loop (`inherit: true`) con fichas, paginación y banner de dudas.
- **FR-002**: Cada ficha MUST mostrar imagen (16:10 con marcador), categoría, título enlazado, extracto, datos (cuándo + cursos), precios (variante `tarjeta`) y el botón del bloque de precios.
- **FR-003**: El tema MUST incluir `templates/single-afa_extraescolar.html` con enlace de vuelta, hero en dos mitades, «Sobre la actividad» (`post-content`), Horarios y Ubicación en dos tarjetas, Requisitos, y columna lateral con precios (completa) y aviso «¿Aún no eres socio?».
- **FR-004**: El tema MUST estilizar las clases `afa-core-extraescolares-filtro*`, `afa-core-extraescolar-{precios,datos,etiqueta,horarios,ubicacion,requisitos}*` con presets de `theme.json`.
- **FR-005**: Los bloques del plugin sin datos MUST no dejar contenedores visibles del tema (columnas/tarjetas vacías).
- **FR-006**: Sin el plugin, el archivo MUST NOT mostrar entradas de otro tipo (guarda equivalente a la spec 012) ni errores.
- **FR-007**: El tema MUST NOT registrar CPT, taxonomías, metas, bloques ni formularios.
- **FR-008**: El menú «Extraescolares» MUST quedar activo en archivo y ficha.
- **FR-009**: Textos fijos en español y traducibles (`afa-poveda`), único H1 por página, contraste ≥ 4,5:1 calculado, foco visible, `#contenido` en `main`.
- **FR-010**: Adaptación móvil/tablet según Clarifications; 0 desbordes horizontales en 390 px.

### Key Entities

- **Actividad extraescolar** (plugin): título, imagen, extracto, contenido, categoría, cursos, días/horario, precios, ubicación, requisitos, grupos.
- **Plantillas y patterns del tema**: composición de bloques; sin datos propios.

## Success Criteria *(mandatory)*

- **SC-001**: Archivo y ficha coinciden con Figma 1:673 / 8:2305 en estructura y jerarquía a 1280 px; se adaptan a 900 y 390 px sin desbordes.
- **SC-002**: Una actividad nueva aparece en el archivo sin editar ninguna página.
- **SC-003**: Con el plugin desactivado: 0 errores PHP y ninguna noticia pintada como actividad.
- **SC-004**: Todo texto nuevo ≥ 4,5:1 calculado.
- **SC-005**: Una actividad sin horarios/ubicación/requisitos no muestra tarjetas ni títulos vacíos.

## Assumptions

- Plugin en contrato 1.x. No se modifica.
- El destino de «Ver guía de inscripción» es la página de FAQ/Servicios por URL relativa editable; «Contactar con AFA» → `/contacto/`.
- El formulario de inscripción es del plugin (spec 006 del plugin) y se enlaza desde el botón del bloque de precios; fuera de alcance aquí.
