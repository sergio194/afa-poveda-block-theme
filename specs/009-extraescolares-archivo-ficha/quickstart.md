# Quickstart — 009

## Comprobaciones
1. `python3 -m json.tool theme.json` y `styles/sections/*.json`; `php -l` en `functions.php` y `patterns/*.php`.
2. GET `/extraescolares/` → 200, un `<h1>`, filtro, una ficha por actividad; `?categoria=<slug>` filtra.
3. GET de una ficha completa y de una vacía.
4. Plugin desactivado → archivo y ficha sin error.
5. Capturas 900/1280 (y 390 aproximada) con Chrome headless.

## Resultado de la validación
Entorno: copia aislada de la BD de Local, WP 7.1.3, PHP 8.5.3, `php -S`; datos temporales «ZZ009» (borrados al terminar).

**Comprobado**
- JSON de `theme.json` y `styles/sections/*.json` válidos; `php -l` correcto en `functions.php` y todos los patterns.
- Archivo `/extraescolares/`: 200, un `<h1>`, filtro del plugin, ficha por actividad con categoría, datos, precios y botón; `?categoria=deportes` deja solo «ZZ Judo» y `?buscar=zzzzz` muestra el mensaje sin resultados con «Quitar filtros».
- Ficha completa (hero con chips, Sobre la actividad, Horarios, Ubicación, Requisitos, Precios, aviso de socio) y ficha vacía (sin tarjetas ni requisitos; sin título huérfano).
- Plugin desactivado: ficha y archivo responden sin errores PHP (el archivo del CPT deja de existir y WP redirige 301).
- Capturas Chrome headless a 900 y 1280 px. Contraste calculado: primary/primary-soft 5,07; primary/surface-container 5,87; green/soft-green 5,72; contrast-muted/base 9,32; base/primary 6,46.

**Fallos encontrados y corregidos**
1. La imagen de ficha no tenía alto sin imagen destacada (la píldora tapaba el título) → `min-height` + ancho 100 % en el marcador.
2. La regla de 004 `body.archive … /noticias` marcaba «Noticias» activa en el archivo del CPT → `:not(.post-type-archive)`.
3. El ítem de menú real apunta a `/actividades-extraescolares-2/`, no a `/extraescolares/` → selector por `href*="extraescolares"`.
4. El título «Sobre la actividad» quedaba solo en actividades sin descripción → se oculta con `:has()`.
5. La guarda de «tipo inexistente» de la 012 se generalizó (`afa_servicio` y `afa_extraescolar`) en lugar de duplicarla.

**Pendiente de una persona**
- Validar en el Editor del sitio que las plantillas `archive-afa_extraescolar` y `single-afa_extraescolar` y los patterns no tienen bloques «no válidos».
- Revisar a 390 px en un móvil/DevTools real (adaptación definida sin mock; Chrome headless recorta).
- Con imágenes reales, revisar recorte 16:10 y la composición del hero; Figma usa un color de píldora distinto por categoría (aquí uno solo, decisión documentada).
- Comprobar que los destinos de los botones del banner (`/servicios/`, `/contacto/`) y del aviso de socio (`/hazte-socio/`) son los correctos en producción.
