# Feature Specification: Tarjetas robustas ante imagen rota y textos largos

**Feature Branch**: `015-tarjetas-robustas` (implementada en `backlog-auto-2026-10-28`)

**Created**: 2026-10-28

**Status**: Hecha (pendiente revisar en Safari/iOS y volver a subir los medios)

**Input**: Backlog 015 — [auditoría del 28/10/2026](../../Auditoria_web_AFA_Padre_Poveda.pdf) #10 y #11.

**Fuente de diseño**: Figma `HOME` 1:259 / `HOME- MOBILE` 1:1395 (tarjetas de avisos y noticias) y detalle de noticia 19:2503. Sin cambios de diseño: solo comportamiento ante contenido «malo».

## Reproducción (antes de corregir)

Copia de la BD de Local con datos ZZ015: un adjunto cuyo archivo no existe (`2026/04/zz015-no-existe.jpg`, 1200×1688, como la migración incompleta de la auditoría), tres entradas fijadas con esa imagen, un título con una palabra de 70 letras y extractos con URLs sin espacios.

| Síntoma de la auditoría | ¿Se reproduce? | Causa |
|---|---|---|
| Imagen rota con el alt subrayado, solapado con «Destacado» | Sí (tarjeta destacada de Avisos) | El `aspect-ratio` estaba en el `<img>`; una imagen rota deja de ser elemento «reemplazado», pierde la proporción y pinta el alt en línea, subrayado por el enlace. En otros navegadores se estira a su atributo `height` (1.688 px de la auditoría). |
| Texto que se sale de las tarjetas por la derecha | Sí (avisos laterales) | La tarjeta es un grupo flex vertical con alto repartido y `flex-wrap: wrap` (valor por defecto del layout flex de WordPress): lo que no cabía saltaba a una segunda columna, fuera de la tarjeta. Además, sin `overflow-wrap`, las palabras/URL largas no se partían. |
| Extracto sin recortar | Sí (destacado) y medio recortado en el archivo de noticias | El destacado no tenía `line-clamp`; en el archivo el clamp estaba en el contenedor, que crece (`flex: 1`) y dejaba ver media línea. |
| Cabecera de la ficha de noticia | Franja de 25 px | Misma causa que la primera. |
| Plantillas personalizadas en la BD | No | Solo hay `archive-events` y `single-event` (TEC). |

«Últimas noticias», el archivo de extraescolares y las fichas de servicios ya tenían la proporción en el contenedor y aguantaban.

## Clarifications

### Session 2026-10-28 (decisiones tomadas sin la persona responsable, revisar)

- Q: ¿Qué se ve en lugar de una imagen rota? → A: El mismo degradado de marcador que ya usan extraescolares y servicios (primary-soft → surface-high), a la proporción de la tarjeta. El alt no se pinta (sigue en el HTML para lectores de pantalla) y el icono de «imagen rota» del navegador se tapa con un `::before` que solo existe cuando la imagen falla.
- Q: ¿Recortar títulos? → A: No; se parten si hace falta (`overflow-wrap: anywhere`) y se ven enteros. Solo se recortan los extractos a 3 líneas (lo que pedía la auditoría). Los recortes de título que ya existían en noticias se mantienen.
- Q: ¿Aplicar a todo? → A: Reglas comunes para cualquier `.wp-block-post-featured-image` (alt, icono) y para títulos/extractos de entradas; la proporción en contenedor solo donde faltaba (destacado de Avisos, `posts-list`, ficha de noticia).

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Portada legible aunque falten medios (P1)

1. **Given** un aviso fijado cuya imagen no existe, **When** se abre la portada a 1280/900/390, **Then** la tarjeta mantiene la proporción 16:9 con fondo de marcador, sin texto alternativo pintado ni solape con «Destacado».

### User Story 2 - Textos largos dentro de la tarjeta (P1)

1. **Given** un título o extracto con palabras/URL sin espacios, **When** se ve en avisos, últimas noticias o archivo, **Then** el texto se parte dentro de la tarjeta, el extracto ocupa como mucho 3 líneas y no hay desbordes horizontales.

### Edge Cases

- Imagen correcta: sin cambios visibles.
- Solo un aviso fijado: el destacado ocupa todo el ancho (regla de la 002, intacta).
- Navegadores que no pintan `::before` en imágenes rotas (Safari): queda el icono pequeño del navegador sobre el marcador; la caja sigue a su tamaño.

## Requirements *(mandatory)*

- **FR-001**: Las tarjetas con imagen destacada MUST tener la proporción y el recorte en el contenedor.
- **FR-002**: El alt de una imagen rota MUST NOT pintarse ni subrayarse; MUST seguir en el HTML.
- **FR-003**: Títulos y extractos de entradas MUST partir palabras largas; los extractos de tarjetas MUST recortarse a 3 líneas.
- **FR-004**: Las tarjetas de avisos MUST NOT repartir su contenido en columnas (`flex-wrap: nowrap`).
- **FR-005**: 0 desbordes horizontales a 390 y 900 px en portada, noticias y ficha.
- **FR-006**: Solo CSS (más una clase en `single.html`); sin JS.

## Success Criteria

- **SC-001**: Con la imagen rota, la tarjeta destacada mide lo mismo que con imagen (16:9).
- **SC-002**: Medición automática: 0 elementos fuera del viewport a 390 y 900 px (salvo el carrusel de píldoras, que es desplazable a propósito).

## Assumptions

- Volver a subir los medios de `/uploads/2026/04` y `/05` sigue siendo tarea de la junta (backlog, «Contenido»).
