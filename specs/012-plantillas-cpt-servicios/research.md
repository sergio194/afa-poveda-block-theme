# Research — 012

## R1. Plantilla de detalle
- **Decisión**: `single-afa_servicio.html` con `post-content` como contenido principal y bloques del plugin en la plantilla (inscripción y documentos en lateral; indicadores y FAQ tras el contenido).
- **Por qué**: lo que el plugin ya modela como datos (precios, FAQ, documentos) no se duplica a mano; el texto libre queda editable.
- **Alternativas**: pattern con todo en `post-content` (obliga a insertar a mano en cada servicio; descartado).

## R2. Hero
- **Decisión**: `core/cover` con `useFeaturedImage` y overlay `contrast` al 65 % (igual que 007), `post-title` H1, `post-meta` ligado a `afa_servicio_subtitulo`, `afa-padre-poveda/servicio-etiqueta` con `mostrar: destacado`.
- **Sin imagen**: el cover sin imagen usa el color de overlay; se fija `backgroundColor`/overlay `primary` para el fallback.

## R3. Listado dinámico
- **Decisión**: pattern `afa-poveda/servicios-grid-dinamico` con `core/query` (`postType: afa_servicio`, grid 3 col, `perPage` 12). Ficha reutiliza clases `afa-servicio-card*` de la 005.
- **Sin plugin**: el tipo no existe → el Query devuelve vacío → `query-no-results`.

## R4. Menú activo
- **Decisión**: ampliar el selector CSS existente con `body.single-afa_servicio` (las 005 ya usan clase de plantilla). No requiere PHP.

## R5. CSS del plugin
- El plugin solo aporta `.afa-core-visually-hidden` y foco del `summary`. Todo el aspecto lo pone el tema bajo `.afa-core-servicio-*`.
