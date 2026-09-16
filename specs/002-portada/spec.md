# Feature Specification: Portada (HOME)

**Feature Branch**: `002-portada`

**Created**: 2026-09-16

**Status**: Implementada (pendiente validación visual en Local + `/generar-version`)

**Input**: User description: "Crear la portada del sitio según Figma screens HOME (1:259) y HOME-MOBILE (1:1395): hero, accesos rápidos, actualidad y avisos, últimas noticias y CTA de comunidad, reutilizando el sistema de diseño de la spec 001."

**Fuente de diseño**: Figma `AFA`, canvas `screens`, frames `HOME` y `HOME- MOBILE`.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Primera impresión en portada (Priority: P1)

Como familia que entra en la web, quiero ver de inmediato el mensaje de la AFA y entender de qué va el sitio, para sentir que estoy en el lugar correcto.

**Why this priority**: Es el primer viewport; sin hero la portada no cumple el diseño ni la identidad.

**Independent Test**: Abrir la portada en escritorio y móvil y comprobar titular, texto de apoyo e imagen/ilustración del hero sin scroll (o con un scroll mínimo en móvil).

**Acceptance Scenarios**:

1. **Given** una visitante en escritorio (≥ 1024 px), **When** carga la portada, **Then** ve un hero a ancho de contenido con imagen, titular «Construyendo juntos el futuro de nuestras hijas e hijos.» y el texto de bienvenida al portal de la AFA del CEIP Padre Poveda.
2. **Given** una visitante en móvil (~390 px), **When** carga la portada, **Then** ve el hero adaptado (ilustración + mismo mensaje) y un botón «Descubre más» visible y usable.
3. **Given** una voluntaria del editor, **When** cambia la imagen o los textos del hero desde el Editor del sitio / página de inicio, **Then** el cambio se refleja en la portada sin tocar código.

---

### User Story 2 - Llegar rápido a lo importante (Priority: P1)

Como madre o padre con poco tiempo, quiero cuatro accesos claros (Comedor, Extraescolares, Calendario, Voluntarios) justo debajo del hero, para ir a lo que busco en un toque.

**Why this priority**: Es el atajo principal del diseño y reduce dependencia del menú.

**Independent Test**: Con la portada abierta, pulsar cada acceso y comprobar que navega a su destino; revisar layout 4 en fila (escritorio) y 2×2 (móvil).

**Acceptance Scenarios**:

1. **Given** la portada en escritorio, **When** se muestra la sección de accesos, **Then** hay cuatro tarjetas en una fila: Comedor, Extraescolares, Calendario, Voluntarios, cada una con icono y etiqueta.
2. **Given** la portada en móvil, **When** se muestra la misma sección, **Then** las cuatro tarjetas aparecen en rejilla 2×2 sin desbordar ni solaparse.
3. **Given** cualquier acceso, **When** la persona lo activa, **Then** llega a la página o sección correspondiente (destino configurable por la junta).

---

### User Story 3 - Ver avisos y destacados (Priority: P2)

Como familia, quiero una sección «Actualidad y Avisos» con un destacado grande y avisos secundarios, para enterarme de plazos e eventos sin entrar al archivo de noticias.

**Why this priority**: Diferencia avisos urgentes del blog general; alto valor informativo.

**Independent Test**: Publicar/marcar hasta tres contenidos destacados y comprobar el layout (escritorio: destacado + dos apilados; móvil: destacado + dos filas compactas) y el enlace «Ver todo» / «Ver todos».

**Acceptance Scenarios**:

1. **Given** hay al menos un aviso o evento destacado, **When** se carga la portada en escritorio, **Then** se muestra un bloque principal (imagen, etiqueta tipo Destacado/categoría, título, resumen y enlace de acción) junto a hasta dos tarjetas secundarias.
2. **Given** la misma sección en móvil, **When** se carga, **Then** el destacado va primero a ancho completo y debajo aparecen hasta dos avisos en formato lista compacta, con enlace «Ver todos».
3. **Given** no hay avisos destacados, **When** se carga la portada, **Then** la sección se oculta o muestra un estado vacío discreto sin romper el layout (sin errores visibles).

---

### User Story 4 - Leer las últimas noticias (Priority: P2)

Como familia, quiero ver las últimas noticias del colegio en tarjetas con imagen, fecha, título, extracto y «Leer más», para decidir qué abrir.

**Why this priority**: Sustituye el listado blog+sidebar actual de `home` por el diseño de Figma.

**Independent Test**: Con tres o más entradas publicadas, comprobar grid de 3 en escritorio, apilado en móvil, y el enlace «Ver noticias» / botón «Cargar más noticias» en móvil.

**Acceptance Scenarios**:

1. **Given** hay entradas publicadas, **When** se carga la portada en escritorio, **Then** la sección «Últimas Noticias» muestra hasta 3 tarjetas en fila con imagen, fecha, título, extracto y control «Leer más», más el enlace «Ver noticias».
2. **Given** la portada en móvil, **When** se ve la sección, **Then** las noticias van en columna y hay un control «Cargar más noticias» o equivalente que permite seguir al archivo.
3. **Given** no hay entradas, **When** se carga la portada, **Then** se muestra un mensaje claro de que aún no hay noticias (sin bloques rotos).

---

### User Story 5 - Invitar a participar (Priority: P3)

Como la junta, quiero un bloque final que invite a hacerse socio o contactar con las vocalías, para convertir visitas en participación.

**Why this priority**: Cierra la portada con la llamada a la acción de Figma; depende menos del contenido editorial.

**Independent Test**: Ver el bloque al final del contenido principal (antes del pie) en escritorio y móvil; comprobar los dos botones y sus destinos.

**Acceptance Scenarios**:

1. **Given** la portada en escritorio, **When** se llega a la sección de comunidad, **Then** aparece el titular «¿Quieres participar en la comunidad?», el texto de apoyo y dos botones: «Hazte Socio Ahora» (primario) y «Contactar con Vocalías» (secundario/contorno).
2. **Given** la portada en móvil, **When** se muestra la misma sección, **Then** el bloque usa el tratamiento visual móvil de Figma (fondo de acento, textos legibles) y los mismos destinos de acción.
3. **Given** una voluntaria, **When** edita textos o URLs del bloque desde el editor, **Then** puede hacerlo sin pedir cambios de código.

---

### Edge Cases

- ¿Qué ocurre si faltan imágenes destacadas en noticias o avisos? Se muestra un marcador de posición coherente con el sistema de diseño o se omite la imagen sin romper la tarjeta.
- ¿Qué ocurre si hay menos de 3 noticias o menos de 3 avisos? Se muestran solo los disponibles; no se inventan tarjetas vacías.
- ¿Qué ocurre si un destino de acceso rápido aún no tiene página publicada? El enlace puede apuntar a un borrador o a una URL provisional documentada; no debe producir error 500.
- Contraste del texto blanco sobre imagen/hero: debe cumplir WCAG AA (≥ 4,5:1), usando overlay/gradiente como en Figma si hace falta.
- La portada no debe mostrar la barra lateral de noticias (eso queda para archivo/single según spec 001).

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: La página de inicio MUST mostrar la portada diseñada (hero → accesos → actualidad y avisos → últimas noticias → CTA comunidad → pie), no el layout actual de listado + sidebar.
- **FR-002**: El hero MUST incluir imagen o ilustración editable, titular y texto de apoyo según Figma; en móvil MUST incluir el botón «Descubre más».
- **FR-003**: MUST existir una sección de cuatro accesos rápidos (Comedor, Extraescolares, Calendario, Voluntarios) con icono y etiqueta; layout 1×4 en escritorio y 2×2 en móvil.
- **FR-004**: MUST existir la sección «Actualidad y Avisos» con hasta un destacado principal y hasta dos avisos secundarios, etiquetas de categoría/tipo, y enlace «Ver todo» / «Ver todos» al listado de actualidad.
- **FR-005**: MUST existir la sección «Últimas Noticias» con hasta tres entradas recientes (imagen, fecha, título, extracto, «Leer más») y enlace al archivo de noticias; en móvil, control para ver más.
- **FR-006**: MUST existir el bloque de comunidad con titular, texto y dos acciones (hacerse socio / contactar vocalías), editable por voluntariado.
- **FR-007**: Todos los textos visibles de la portada MUST estar en español y ser editables sin desplegar código (excepto cadenas estructurales mínimas si las hubiera).
- **FR-008**: La portada MUST reutilizar los tokens y componentes visuales de la spec 001 (colores, tipografías, radios, tarjetas, botones) salvo desviaciones documentadas en esta spec.
- **FR-009**: En anchos de referencia 390, 900 y 1280 px la portada MUST coincidir con Figma en estructura y jerarquía, sin desbordes horizontales.
- **FR-010**: Enlaces, botones y controles MUST ser usables con teclado y tener foco visible; contraste de texto ≥ 4,5:1.
- **FR-011**: La lógica de formularios de inscripción, pago de cuota o envío de newsletter MUST quedar fuera de esta feature (plugins / specs posteriores); la portada solo enlaza a esas destinos.

### Key Entities

- **Aviso / destacado**: Contenido breve priorizado en portada (evento, plazo, comunicado) con título, resumen, etiqueta, imagen opcional y enlace de acción.
- **Noticia**: Entrada del blog/archivo con fecha, título, extracto e imagen destacada.
- **Acceso rápido**: Atajo con etiqueta, icono y URL de destino.
- **Bloque comunidad**: Textos y dos llamadas a la acción con URL.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: En una prueba con 5 personas no técnicas, al menos 4 identifican en menos de 10 segundos de qué trata el sitio solo mirando el primer viewport de la portada.
- **SC-002**: Desde la portada, una persona llega a Extraescolares, Calendario o Comedor en ≤ 2 pulsaciones/clics.
- **SC-003**: Con contenido de ejemplo cargado, las cinco secciones de Figma (hero, accesos, actualidad, noticias, CTA) son visibles en escritorio y móvil sin bloques rotos ni solapes.
- **SC-004**: Una voluntaria puede actualizar imagen del hero, textos del CTA y destinos de los accesos en menos de 15 minutos sin ayuda técnica.
- **SC-005**: Revisión visual a 390, 900 y 1280 px sin desbordes; todos los pares de texto nuevos cumplen contraste AA.

## Assumptions

- Se parte del sistema de diseño y del cascarón (cabecera/pie) de la spec 001; no se rediseñan esos componentes salvo ajustes menores de espaciado en la portada.
- «Actualidad y Avisos» se alimenta de entradas marcadas como destacadas/fijas o de una categoría acordada (p. ej. Avisos); «Últimas Noticias» son las entradas recientes excluyendo o no duplicando lo ya mostrado en avisos según convenga en el plan.
- Destinos por defecto de accesos: Comedor → página de servicio comedor; Extraescolares → `/extraescolares/`; Calendario → `/calendario/`; Voluntarios → sección o página AFA/voluntariado. Las URLs finales las confirma la junta.
- «Descubre más» en móvil lleva a la siguiente sección de la portada o a la página AFA (se fijará en el plan; no bloquea la spec).
- «Hazte Socio Ahora» apunta a `/hazte-socio/`; «Contactar con Vocalías» apunta a `/contacto/` (o ancla de vocalías cuando exista).
- El listado completo de actualidad/noticias (archivo) es scope de la spec 003; aquí solo el bloque de portada.
- Formularios de inscripción y hazte socio reales son specs 009/010 + plugins.
- Diferencias desktop/móvil del pie (dirección Alfonso XII vs San Sergio) siguen siendo decisión pendiente de la junta (ya anotada en 001); esta spec no las resuelve.

## Refinamientos respecto a Figma

| # | En Figma | En esta feature | Motivo |
|---|---|---|---|
| R1 | Botones hero/CTA en azul `#1A73E8` | Usar token `accent` / `primary` de 001 | Contraste AA ya decidido en 001 (R1) |
| R2 | «Cargar más noticias» sugiere paginación infinita | Enlace o botón al archivo de noticias | Sin JS de scroll infinito en el tema (constitución: lógica mínima) |
| R3 | Iconos de accesos dibujados en el archivo | Iconos del sistema o SVG del tema, editables | Mantenibilidad; se anotan si no coinciden 1:1 |
| R4 | Textos de ejemplo de avisos/noticias | Contenido real o de demostración en WP | La portada es plantilla/pattern, no copy fijo de marketing |
| R5 | Iconos solo vía clases CSS | Bloque core `Icono` + colección `afa-poveda` en el listado del editor | Editable por voluntarios; requiere WP ≥ 7.1 |
| R6 | Layout avisos siempre 1+2 con fotos en todas | 0 oculto · 1 ancha · 2 cols · 3 = foto solo en destacado; laterales sin imagen (Figma Event 2/3) | Coincide con HOME; evita estirar la primera |

## Alcance fuera

- Páginas internas (Extraescolares, Servicios, Contacto, Calendario, detalle de actividad).
- Configurador semanal de extraescolares.
- Newsletter con campos de formulario embebidos.
- Cambios al menú o al pie salvo los necesarios para que la portada encaje.
