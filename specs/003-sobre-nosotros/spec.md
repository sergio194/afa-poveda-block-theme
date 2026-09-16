# Feature Specification: Sobre nosotros (AFA)

**Feature Branch**: `003-sobre-nosotros`

**Created**: 2026-09-16

**Status**: Implementada (pendiente validación visual en Local + montaje editorial de la página `/afa/`)

**Input**: User description: "Página Nosotros / Sobre nosotros correspondiente al ítem AFA del menú, según Figma screens «Sobre Nosotros - Organigrama Visual» (1:390) y «sobre nosotros- mobile» (4:1183)."

**Fuente de diseño**: Figma `AFA`, canvas `screens`, frames `Sobre Nosotros - Organigrama Visual` y `sobre nosotros- mobile`.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Entender qué es la AFA (Priority: P1)

Como familia que entra por el menú «AFA», quiero ver de inmediato de qué trata la asociación y un texto claro de quiénes somos, para saber si encajo y qué papel tiene la AFA en el colegio.

**Why this priority**: Sin hero + «¿Quiénes somos?» la página no cumple su propósito informativo.

**Independent Test**: Abrir la página AFA/Sobre nosotros en escritorio y móvil y comprobar titular, subtítulo y sección «¿Quiénes somos?» con tres párrafos legibles.

**Acceptance Scenarios**:

1. **Given** una visitante en escritorio (≥ 1024 px), **When** abre la página enlazada desde «AFA», **Then** ve un hero con imagen de fondo, titular «Sobre nosotros» y el subtítulo de comunidad de familias.
2. **Given** la misma página, **When** hace scroll a la primera sección de contenido, **Then** ve «¿Quiénes somos?» con el texto explicativo de la AFA (sin ánimo de lucro, participación con el equipo docente, comisiones).
3. **Given** una voluntaria del editor, **When** cambia textos o imagen del hero desde el contenido de la página, **Then** el cambio se refleja sin tocar código del tema.

---

### User Story 2 - Conocer la junta y el organigrama (Priority: P1)

Como madre o padre, quiero ver quién forma la Junta Directiva (presidencia, secretaría, tesorería y vocales), para saber a quién dirigirme y cómo está organizada la AFA este curso.

**Why this priority**: Es el bloque diferencial del diseño («Organigrama Visual») y da transparencia.

**Independent Test**: Con datos de junta de ejemplo cargados, comprobar grupos Presidencia/Vicepresidencia, Secretaría, Tesorería y Vocales en escritorio y apilado usable en móvil.

**Acceptance Scenarios**:

1. **Given** la página en escritorio, **When** se muestra «Organigrama», **Then** hay un texto introductorio de la Junta y bloques visuales para Presidencia/Vicepresidencia, Secretaría, Tesorería y Vocales con nombres legibles.
2. **Given** la página en móvil (~390 px), **When** se ve el organigrama, **Then** los mismos grupos se apilan sin solapes ni desbordes y se pueden leer todos los nombres.
3. **Given** un cambio de junta (nuevo curso), **When** una voluntaria edita nombres o cargos en el contenido de la página, **Then** la portada del organigrama queda actualizada sin desarrollo.

---

### User Story 3 - Saber qué hace la AFA y sus comisiones (Priority: P2)

Como familia, quiero ver qué actividades realiza la AFA, para qué sirve y qué comisiones existen, para decidir si me involucro o a qué comisión acudir.

**Why this priority**: Convierte la página institucional en guía práctica de participación.

**Independent Test**: Revisar listas «¿Qué hace el AFA?», «Utilidad de la AFA» y «Comisiones» en ambos anchos.

**Acceptance Scenarios**:

1. **Given** la sección «¿Qué hace el AFA?», **When** se carga la página, **Then** se muestran al menos las actividades del diseño (reuniones con el centro, extraescolares/ludoteca, fiestas, becas, Consejo Escolar, escuela verde) como lista clara.
2. **Given** el bloque asimétrico Utilidad + Comisiones, **When** se ve en escritorio, **Then** «Utilidad de la AFA» y «Comisiones» aparecen en disposición de dos columnas (o equivalente fiel a Figma); en móvil, apiladas.
3. **Given** la lista de comisiones, **When** se muestra, **Then** incluye al menos Extraescolares, Becas, Comedor, Huerto, Fiestas, Informática y Lotería (editables por la junta).

---

### User Story 4 - Descargar documentos y estatutos (Priority: P2)

Como socia o interesada, quiero descargar documentos oficiales (qué es una AFA, estatutos, manuales), para consultar normas y procedimientos sin pedirlos por correo.

**Why this priority**: Cierra la página con utilidad concreta y transparencia.

**Independent Test**: Con PDFs subidos y enlazados, pulsar cada documento y comprobar que descarga o abre el archivo.

**Acceptance Scenarios**:

1. **Given** la sección «Documentos y Estatutos», **When** se muestra, **Then** hay una lista de documentos con nombre visible y enlace de descarga/apertura.
2. **Given** un documento enlazado, **When** la persona lo activa, **Then** obtiene el archivo (o una página de vista previa del medio) sin error 404.
3. **Given** aún no hay PDFs subidos, **When** se carga la sección, **Then** la junta puede dejar enlaces placeholder o ocultar ítems vacíos sin romper el layout.

---

### Edge Cases

- Página publicada pero sin imagen de hero: se muestra un fondo o color de marca sin romper tipografía.
- Organigrama con pocos vocales o cargos vacíos: el layout no deja huecos rotos; se pueden ocultar tarjetas vacías.
- Nombres largos en vocales: no desbordan las tarjetas ni cortan de forma ilegible.
- Documentos sin archivo: no se muestran enlaces muertos; o se marcan como «próximamente» de forma discreta.
- Menú «AFA» apunta a esta página; el título visible de página es «Sobre nosotros» (pueden diferir etiqueta de menú y H1).

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: MUST existir una página del sitio alcanzable desde el ítem de menú «AFA» cuyo contenido principal sea «Sobre nosotros» según Figma.
- **FR-002**: MUST mostrar un hero con imagen, titular «Sobre nosotros» y subtítulo de apoyo editable.
- **FR-003**: MUST incluir la sección «¿Quiénes somos?» con texto editable en varios párrafos.
- **FR-004**: MUST incluir la sección «Organigrama» con introducción y grupos de cargos (presidencia/vicepresidencia, secretaría, tesorería, vocales) y nombres editables por la junta.
- **FR-005**: MUST incluir la sección «¿Qué hace el AFA?» como listado de actividades editables.
- **FR-006**: MUST incluir el bloque «Utilidad de la AFA» y el bloque «Comisiones» con listas editables, en layout de dos columnas en escritorio y apilado en móvil.
- **FR-007**: MUST incluir «Documentos y Estatutos» con enlaces a archivos gestionables por la junta (p. ej. biblioteca de medios).
- **FR-008**: En anchos 390, 900 y 1280 px la página MUST coincidir con Figma en estructura y jerarquía, sin desbordes horizontales.
- **FR-009**: Textos de interfaz MUST estar en español y ser traducibles; contraste de texto nuevo ≥ 4,5:1; controles usables con teclado y foco visible.
- **FR-010**: Cabecera y pie MUST reutilizar los del sistema de diseño (spec 001); no se rediseñan en esta feature.
- **FR-011**: Formularios de alta de socio, newsletter con envío real o directorio de personas como lógica de negocio MUST quedar fuera del tema (plugins / specs posteriores); esta página solo presenta contenido e enlaces.

### Key Entities

- **Página Sobre nosotros**: Página institucional enlazada como AFA; agrupa hero y secciones de contenido.
- **Cargo / persona de junta**: Nombre y rol (presidencia, vicepresidencia, secretaría, tesorería, vocal) mostrados en el organigrama.
- **Comisión**: Nombre de grupo de trabajo de la AFA.
- **Documento**: Archivo descargable (PDF u otro) con etiqueta visible y URL.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: En una prueba con 5 personas no técnicas, al menos 4 identifican en ≤ 15 s que la página explica qué es la AFA y quién la representa.
- **SC-002**: Una visitante localiza el organigrama y al menos un documento descargable en ≤ 3 scrolls en móvil.
- **SC-003**: Con contenido de ejemplo, las secciones de Figma (hero, quiénes somos, organigrama, qué hace, utilidad/comisiones, documentos) son visibles en escritorio y móvil sin bloques rotos.
- **SC-004**: Una voluntaria actualiza un nombre de junta y un PDF en ≤ 15 minutos sin ayuda técnica.
- **SC-005**: Revisión visual a 390, 900 y 1280 px sin desbordes; contraste AA en textos nuevos.

## Assumptions

- El ítem de menú se llama «AFA»; el H1 de la página es «Sobre nosotros» (como en Figma). Slug sugerido `/afa/` (confirmable por la junta).
- El contenido (textos, nombres, comisiones, enlaces a PDFs) vive en la página / patrones editables; no se crea un directorio de personas ni CPT en el tema.
- Los nombres y cargos del Figma (curso 2023/24) son contenido de ejemplo; la junta los sustituye por los vigentes.
- En Figma escritorio el contenido va a una columna ancha (sin sidebar de blog en el frame); en móvil aparece el aside global (buscar / suscríbete). Esta feature prioriza el layout de contenido de Figma escritorio a una columna; el aside de blog no es requisito de la página AFA (queda el footer/header y, si se desea, el sidebar global en otra plantilla).
- Documentos de ejemplo del diseño: `QUE_ES_UNA_AFA.pdf`, `ESTATUTOS_DE_NUESTRA_AFA.pdf`, `MANUAL_DE_PROCEDIMIENTOS.pdf`, `PARTE_DE_DISCIPLINA.pdf` — la junta sube los archivos reales.
- Se reutilizan tokens y componentes de la spec 001; tipografías y colores no se reinventan.
- La portada (002) ya enlaza o puede enlazar a esta página (p. ej. voluntarios / descubre más); no se reabre el alcance de portada salvo el enlace de menú.

## Refinamientos respecto a Figma

| # | En Figma | En esta feature | Motivo |
|---|---|---|---|
| R1 | Aside buscar/newsletter en móvil al final | No obligatorio en la página AFA | El aside es patrón global; evita duplicar newsletter de pie |
| R2 | Nombres con glifos rotos en export | Textos correctos en español en el contenido | Error de encoding del export, no del diseño |
| R3 | Organigrama como mock visual fijo | Bloques/patrones editables en la página | La junta cambia cada curso |
| R4 | PDFs con nombres de archivo crudos | Etiquetas legibles + enlace al medio | Mejor UX; el nombre de archivo puede quedar como subtítulo |
| R5 | «comedor de profesores» en listado | «claustro de profesores» | Corrección de sentido respecto al copy de Figma |
| R6 | Aside móvil / Suscríbete al final | No en la página AFA | Pattern global / pie; constitución III |
| R7 | Paleta Figma con verde en comisiones | Tokens `soft-green` / `green` añadidos a `theme.json` | Necesarios para pills; contraste AA con blanco |

## Alcance fuera

- Formulario «Hazte socio» y lógica de cuotas.
- Newsletter con envío / CRM.
- CPT de personas o organigrama dinámico en plugin.
- Páginas Extraescolares, Servicios, Contacto, Calendario.
- Rediseño de header/footer o del sistema de menús FSE.
