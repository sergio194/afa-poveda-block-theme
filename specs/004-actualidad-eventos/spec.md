# Feature Specification: Actualidad y Eventos (Noticias)

**Feature Branch**: `004-actualidad-eventos`

**Created**: 2026-09-16

**Status**: Implementada

**Input**: User description: "vamos con la spec de noticias (actualidad y eventos)"

**Fuente de diseño**: Figma `AFA`, canvas `screens`, frames `Actualidad y eventos` (20:2742), `Actualidad y eventos mobile` (22:2991), y detalle de noticia (escritorio 19:2503 y móvil 20:2629, etiquetados en Figma como `Html → Body`).

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Recorrer el archivo de actualidad (Priority: P1)

Como familia que entra por el menú «Noticias», quiero ver de un vistazo las novedades de la comunidad (título, fecha, categoría, resumen e imagen), para decidir qué abrir sin perder tiempo.

**Why this priority**: Es la pantalla que sustituye el listado actual con barra lateral y cumple el propósito del ítem de menú.

**Independent Test**: Abrir `/noticias/` (o la página de entradas) en escritorio y móvil con al menos seis noticias de ejemplo y comprobar cabecera, rejilla de fichas y paginación.

**Acceptance Scenarios**:

1. **Given** una visitante en escritorio (≥ 1024 px), **When** abre «Noticias», **Then** ve la etiqueta «Archivo de noticias», el titular «Actualidad y Eventos», el texto de apoyo y hasta seis fichas en rejilla de tres columnas, sin barra lateral de blog.
2. **Given** la misma página en móvil (~390 px), **When** se carga, **Then** el mismo contenido se apila: cabecera, buscador, categorías en fila desplazable y fichas a una columna, sin desbordes horizontales.
3. **Given** hay más noticias que las de la primera página, **When** se muestra el archivo, **Then** hay paginación numerada (página actual marcada, anterior/siguiente) y cada ficha incluye imagen o marcador, categoría, fecha, título, extracto y «Leer más».
4. **Given** una voluntaria del editor, **When** cambia el texto de apoyo o publica una noticia nueva, **Then** el archivo lo refleja sin tocar código.

---

### User Story 2 - Leer una noticia completa (Priority: P1)

Como madre o padre, quiero abrir una noticia y leerla entera (título, fecha, imagen y cuerpo), para enterarme del detalle y volver al archivo si lo necesito.

**Why this priority**: «Leer más» es la acción principal de cada ficha; sin ficha de detalle el archivo no cierra el recorrido.

**Independent Test**: Pulsar «Leer más» en una ficha y comprobar migas, titular, metadatos, contenido e imagen; volver a Noticias.

**Acceptance Scenarios**:

1. **Given** una ficha del archivo, **When** la persona activa el título o «Leer más», **Then** llega a la noticia completa con titular, fecha, categoría, imagen destacada (si existe) y el cuerpo editable por la junta.
2. **Given** la ficha de detalle en escritorio, **When** se carga, **Then** hay migas «Inicio › Noticias › [título o detalle]» y, junto al artículo, un bloque de noticias relacionadas.
3. **Given** la ficha en móvil, **When** se carga, **Then** el artículo se lee a una columna, las relacionadas van debajo y no hay solapes ni zoom forzado.
4. **Given** una voluntaria, **When** edita el cuerpo o la imagen destacada de una entrada, **Then** el cambio se ve en la ficha pública sin desarrollo.

---

### User Story 3 - Filtrar por categoría (Priority: P2)

Como familia con poco tiempo, quiero elegir Comunidad, Deportes, Cultura, Servicios o AFA (u otra categoría de la junta), para ver solo las noticias de ese tema.

**Why this priority**: Es el control diferencial del diseño; reduce ruido frente al listado único.

**Independent Test**: Con noticias en varias categorías, elegir una píldora y volver con «Todas»; comprobar listado filtrado y píldora activa; abrir «Más categorías» para un término fuera de la lista.

**Acceptance Scenarios**:

1. **Given** el archivo en escritorio, **When** se muestra la toolbar, **Then** aparecen píldoras de categorías (lista editable en la parte de plantilla) y un control «Más categorías» con el resto; la búsqueda se hace desde la cabecera del sitio.
2. **Given** una visitante, **When** elige una categoría en el desplegable, **Then** solo ve noticias de esa categoría y puede volver al archivo completo con «Todas las noticias».
3. **Given** una categoría sin noticias, **When** se elige, **Then** se muestra un mensaje claro de que no hay resultados (sin fichas rotas).
4. **Given** la junta, **When** crea o renombra una categoría, **Then** aparece en el desplegable sin tocar código.

---

### User Story 4 - Buscar una noticia (Priority: P2)

Como familia que recuerda un titular o un tema, quiero buscar por palabras («comedor», «fiesta», «carrera») desde la cabecera del sitio, para encontrar esa novedad sin recorrer páginas.

**Why this priority**: Evita duplicar el buscador del archivo; la lupa de cabecera ya es el patrón global (spec 001).

**Independent Test**: Escribir un término que coincida con un título o extracto y otro que no coincida; comprobar resultados y vacío en la piel de `search.html`.

**Acceptance Scenarios**:

1. **Given** cualquier página del sitio, **When** se usa el buscador de la cabecera, **Then** es usable con teclado, tiene foco visible y lleva a resultados en el mismo formato de ficha del archivo.
2. **Given** un término con coincidencias, **When** se lanza la búsqueda, **Then** se muestran las noticias que coinciden, en el mismo tipo de ficha (imagen, categoría, fecha, título, extracto, «Leer más»).
3. **Given** un término sin coincidencias, **When** se busca, **Then** aparece un mensaje de que no hay noticias para esa búsqueda, con opción de volver al archivo.

---

### User Story 5 - Descubrir noticias relacionadas (Priority: P3)

Como lectora que acaba un artículo, quiero ver otras noticias relacionadas, para seguir informada sin volver al menú.

**Why this priority**: Cierra el detalle de Figma; es útil pero el artículo ya entrega valor sin ella.

**Independent Test**: Abrir una noticia con otras publicadas y comprobar el bloque «Noticias relacionadas» (escritorio al lado; móvil debajo).

**Acceptance Scenarios**:

1. **Given** hay otras noticias publicadas, **When** se abre un detalle, **Then** se muestran hasta tres relacionadas con categoría y título, y cada una abre su ficha.
2. **Given** no hay suficientes relacionadas, **When** se abre el detalle, **Then** se muestran las que haya (o se oculta el bloque) sin huecos rotos.

---

### Edge Cases

- Sin noticias publicadas: el archivo muestra un mensaje claro; cabecera, filtros y (vía menú) buscador del sitio siguen visibles.
- Noticia sin imagen destacada: ficha con marcador de posición coherente con el sistema de diseño (como las fichas AFA / Extraescolares de Figma), sin romper la rejilla.
- Extractos o títulos muy largos: se recortan con ellipsis o se limitan de forma legible; no desbordan la ficha.
- Una sola página de resultados: la paginación no muestra controles inútiles o se desactiva de forma discreta.
- Categoría que aparece en una ficha pero no en el conjunto editorial inicial (p. ej. Extraescolares): se muestra en la ficha y en el desplegable; al elegirla se puede listar esa categoría.
- Búsqueda con caracteres especiales o muy corta: no produce error; o bien no busca, o muestra vacío amable.
- Menú: el ítem activo es «Noticias» (no «Inicio», aunque el mock de Figma lo marque mal).
- El calendario escolar y las fichas «detalle evento» no forman parte de este archivo.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: MUST existir un archivo de noticias alcanzable desde el ítem de menú «Noticias», con H1 «Actualidad y Eventos» y etiqueta «Archivo de noticias».
- **FR-002**: MUST mostrar un texto de apoyo editable (canónico: «Toda la información relevante de nuestra comunidad escolar organizada para que no te pierdas nada.»).
- **FR-003**: MUST listar noticias en fichas con imagen (o marcador), categoría, fecha, título, extracto y control «Leer más».
- **FR-004**: En escritorio MUST usar rejilla de tres columnas (hasta seis por página); en móvil MUST apilar a una columna. Sin barra lateral de blog en el archivo.
- **FR-005**: MUST paginar cuando haya más noticias que las de una página; la página actual se distingue visualmente.
- **FR-006**: MUST permitir filtrar por categoría nativa mediante píldoras editables (parte `noticias-toolbar`) más un desplegable «Más categorías» (`core/categories`); el conjunto visible es editorial (editable en el Editor del sitio), no un listado cerrado en código. La píldora «Todas» enlaza al archivo completo.
- **FR-007**: MUST reutilizar el buscador de la cabecera del sitio (spec 001) para buscar noticias; los resultados usan el mismo formato de ficha del archivo (`search.html`). No se duplica un campo de búsqueda en la toolbar del archivo (R17).
- **FR-008**: MUST existir la ficha de detalle de cada noticia: migas, titular, fecha (obligatoria) y autor opcional si el perfil lo tiene, imagen, cuerpo y bloque de relacionadas (omitible si no hay contenido).
- **FR-009**: Cabecera y pie MUST reutilizar los del sistema de diseño (spec 001); el enlace «Noticias» del menú queda activo en archivo, categorías, búsqueda de noticias y detalle.
- **FR-010**: En anchos 390, 900 y 1280 px la página MUST coincidir con Figma en estructura y jerarquía, sin desbordes horizontales.
- **FR-011**: Textos de interfaz MUST estar en español y ser traducibles; contraste de texto nuevo ≥ 4,5:1; controles usables con teclado y foco visible.
- **FR-012**: Esta feature MUST usar el contenido de noticias ya publicable por la junta (entradas y categorías); no introduce tipos de contenido, cuotas ni formularios. El calendario y los extraescolares quedan fuera.
- **FR-013**: En el detalle MUST ofrecer compartir la entrada (mail, WhatsApp, Facebook) con URLs de la noticia actual, sin JavaScript a medida (R13).

### Key Entities

- **Archivo de actualidad**: Página de listado enlazada como «Noticias»; agrupa cabecera, filtros, fichas y paginación (búsqueda vía menú del sitio).
- **Noticia**: Novedad o aviso publicado con título, fecha, extracto, cuerpo, imagen opcional y una o más categorías.
- **Categoría**: Etiqueta temática (Comunidad, Deportes, Cultura, Servicios, AFA, Extraescolares, etc.) usada en el desplegable y en la ficha.
- **Ficha de detalle**: Lectura completa de una noticia, con migas y relacionadas.
- **Noticia relacionada**: Otra noticia sugerida al final o al lado del detalle.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: En una prueba con 5 personas no técnicas, al menos 4 identifican en ≤ 10 s que la página es el listado de noticias/eventos de la AFA.
- **SC-002**: Una visitante llega desde el menú «Noticias» a una noticia concreta y vuelve al archivo en ≤ 3 pulsaciones.
- **SC-003**: Con contenido de ejemplo (al menos 8 noticias en 3 categorías), filtros, búsqueda con acierto y búsqueda vacía, paginación y detalle se pueden completar sin bloques rotos en escritorio y móvil.
- **SC-004**: Una voluntaria publica una noticia nueva (título, categoría, imagen, extracto) y la ve en el archivo en ≤ 10 minutos sin ayuda técnica.
- **SC-005**: Revisión visual a 390, 900 y 1280 px sin desbordes; contraste AA en textos y controles nuevos del toolbar (select/buscar).

## Assumptions

- El ítem de menú se llama «Noticias»; el H1 es «Actualidad y Eventos». Slug sugerido `/noticias/` (ya usado como destino «Ver noticias» en la portada, spec 002).
- «Eventos» en el título es el nombre del archivo de actualidad, no el calendario escolar (frames `Calendario Escolar` y `detalle evento` son otra feature).
- Las noticias son entradas estándar que la junta ya puede publicar; las categorías las crea el voluntariado. El tema no registra tipos ni taxonomías nuevas (constitución III).
- Conjunto inicial de categorías de Figma: Comunidad, Deportes, Cultura, Servicios, AFA. Extraescolares aparece en fichas de ejemplo y se admite como categoría adicional.
- Filtrar recarga un listado de esa categoría (no un filtrado instantáneo sin cambiar de página). Encaja con «sin scripts de terceros / lógica mínima en el tema».
- El buscador del sitio (cabecera) es el único punto de búsqueda; los resultados reutilizan la piel del archivo (`search.html`).
- Seis noticias por página en todos los anchos. El mock móvil muestra tres por altura de frame, no un recuento distinto.
- Texto de apoyo canónico: el de escritorio. El de móvil en Figma («Mantente informado…») se unifica para no mantener dos copys.
- En el detalle, el aside es «Noticias relacionadas», no el aside global de blog (buscar / suscríbete / lo más reciente) de la spec 001.
- Autoría: se muestra fecha; el nombre de autora (p. ej. «Marta García, Vocal de Eventos») si el perfil de quien publica lo tiene; no es un directorio de personas.
- Se reutilizan tokens y componentes de la spec 001 (tarjetas, etiquetas, radios). La portada (002) no se reabre: solo se confirma que «Ver noticias» llega a este archivo.
- Diferencias de dirección del pie (Alfonso XII vs San Sergio) siguen pendientes con la junta (spec 001); esta feature no las resuelve.

## Refinamientos respecto a Figma

| # | En Figma | En esta feature | Motivo |
|---|---|---|---|
| R1 | Filtrado y búsqueda en la misma vista sin recarga | Filtrar = listado de categoría; buscar = resultados de búsqueda | Sin JavaScript a medida en el tema (constitución VI) |
| R2 | En el archivo, Inicio aparece como ítem activo | Activo: «Noticias» | El subrayado de Inicio en el mock es un error del frame |
| R3 | Copy de intro distinto en móvil y escritorio | Un solo texto (versión escritorio), editable | Un copy, menos mantenimiento; constitución IV |
| R4 | 6 fichas en escritorio y 3 visibles en el frame móvil | 6 por página en ambos; móvil apila | Un único recuento por página |
| R5 | Aside de blog (buscar / newsletter) en spec 001 para noticias | Archivo a una columna; detalle con relacionadas | Coincide con los frames Actualidad y Detalle |
| R6 | Píldoras de categoría con colores distintos por tema | Tokens de etiqueta/superficie de 001; color de acento si hay contraste AA | No introducir hex sueltos; Extraescolares/AFA sin foto usan marcador |
| R7 | Frames de detalle llamados `Html → Body` | Tratarlos como «Detalle de noticia» escritorio/móvil | Nombre de export, no de producto |
| R8 | Paginación de ejemplo hasta la página 12 | Paginación real según el número de noticias | El «12» es mock |
| R9 | Relacionadas con etiquetas INSTITUCIONAL / SERVICIOS | Categoría real de cada noticia | No inventar taxonomía «Institucional» en el tema |
| R10 | Categoría superpuesta a la foto en móvil | Categoría en la meta de la ficha (igual que escritorio) | Evita CSS de posicionamiento frágil; misma ficha en todos los anchos |
| R11 | Ítem de menú activo solo con current-menu-item | También en categoría, búsqueda y detalle vía `href*=/noticias` | Los posts no son hijos de la página de entradas; el ítem del menú va a `/noticias` sin barra final |
| R12 | Seis píldoras de categoría (Comunidad, Deportes…) | Píldoras editables (defaults reales del sitio) + «Más categorías» con desplegable | Decenas de términos; la lista corta es editorial y editable en FSE |
| R13 | Compartir con iconos nativos (share / copiar / mail) | `core/social-links` mail + WhatsApp + Facebook con URLs de la entrada en render | Sin JS a medida; copiar al portapapeles exigiría script |
| R14 | Relacionadas con miniatura ancha 16:9 | Ficha compacta: miniatura 1:1 a la izquierda, categoría + título | Coincide con los frames de detalle 19:2503 / 20:2629 |
| R15 | Foto de ficha a tamaño completo del adjunto | Tamaño `afa-news-card` + `object-fit: contain` sobre fondo difuminado de la misma imagen | Carteles anchos; color dominante exigiría JS o análisis PHP en cada render |
| R16 | Toolbar en caja con borde/fondo | Fila sin contenedor card | Reduce carga visual junto al hero |
| R17 | Buscador «Buscar noticias…» en la toolbar del archivo | Solo filtros; búsqueda vía lupa de cabecera | Evita duplicar el patrón global de búsqueda (spec 001) |
| R18 | Pattern PHP `noticias-toolbar` | Template part `parts/noticias-toolbar.html` | La junta edita píldoras en Apariencia → Editor → Partes |

## Alcance fuera

- Calendario escolar y ficha de evento de calendario.
- Extraescolares, servicios, contacto, hazte socio.
- Newsletter con envío real o formulario embebido (sigue siendo plugin / spec posterior).
- Tipos de contenido o taxonomías registradas por el tema.
- Rediseño de cabecera o pie.
- Scroll infinito o «cargar más» con JavaScript (la portada ya enlaza aquí; este archivo pagina).
