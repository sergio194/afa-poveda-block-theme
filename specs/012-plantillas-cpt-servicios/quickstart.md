# Quickstart — 012

## Prerrequisitos
Sitio de pruebas con el plugin activo y un servicio `ZZ …` publicado (ver «Resultado de la validación»).

## Comprobaciones
1. `python3 -m json.tool theme.json >/dev/null` · `php -l patterns/servicios-grid-dinamico.php functions.php`
2. GET a la URL del servicio → 200, un solo `<h1>`, clases `afa-servicio-layout__cols`, bloques del plugin con datos.
3. GET del servicio vacío → sin `afa-core-servicio-*__titulo` huérfanos.
4. Listado dinámico en una página de prueba `ZZ`: una ficha por servicio.
5. Con el plugin desactivado: `/servicios/` (005) sigue igual; el pattern dinámico muestra `query-no-results`.
6. Capturas 390/900/1280 (si hay navegador).

## Resultado de la validación
Entorno: copia aislada de la BD de Local (mysqld propio), WP 7.1.3, PHP 8.5.3, servidor `php -S`; datos temporales «ZZ012» (borrados al terminar).

**Comprobado**
- `theme.json` y `styles/sections/*.json` validan; `php -l` correcto en `functions.php` y todos los `patterns/*.php`.
- `GET` del servicio completo → 200, un único `<h1>`, hero, columnas `afa-servicio-layout__cols`, los 5 bloques del plugin; servicio vacío → 200 sin ningún bloque `afa-core-servicio-*` ni columna lateral.
- Listado dinámico (página `ZZ012 Listado`): una ficha por servicio, enlaces «Ver más» con nombre accesible «Ver más: <título>», píldora de categoría, frecuencia con icono (oculta si vacía).
- Plugin desactivado: 200 en detalle y listado, sin errores; el listado muestra «Aún no hay servicios publicados.».
- Capturas con Chrome headless a 900 y 1280 px (correctas). Contraste calculado: base/primary 6,46; primary/base 6,46; primary/surface-container 5,87; green/soft-green 5,72; contrast-muted/surface-container 8,46.

**Fallos encontrados y corregidos**
1. Sin el plugin, el Query Loop de `afa_servicio` cae al tipo `post` y pintaba noticias como servicios → guarda `pre_render_block` en `functions.php`.
2. `core/post-terms` no imprime nada con taxonomías sin archivo público → la categoría usa el bloque `servicio-etiqueta` (`mostrar: categoria`).
3. La variación `afa-card` añadía 32 px de relleno y descuadraba la ficha → relleno 0 en `.afa-servicios-query`.
4. Botón de inscripción desbordaba la tarjeta → `box-sizing: border-box`.
5. El filtro de 007 daba a «Ver más» el nombre accesible «Leer más: …» (incumple 2.5.3) → usa el texto visible del bloque.
6. Caché de patterns del tema: un pattern nuevo no aparece hasta limpiar la caché (`WP_Theme::delete_pattern_cache()`); no ocurre con `WP_DEBUG` activo.

**Pendiente de una persona**
- Abrir `single-afa_servicio` y `servicios-grid-dinamico` en el Editor del sitio y comprobar que ningún bloque aparece «no válido» (no hay forma automática de validar el editor aquí; el `core/cover` con imagen destacada es lo más sensible).
- Captura real a 390 px en un móvil/DevTools (Chrome headless impone un ancho mínimo y recorta).
- Con imagen destacada real, comprobar el contraste del hero.
- Los bloques del plugin (inscripción, FAQ, documentos) ya van en la plantilla: si alguien los inserta también en el contenido del servicio, saldrán duplicados.
- Para usar el listado dinámico, sustituir en la página «Servicios» el pattern estático `servicios-grid` por `servicios-grid-dinamico` (no se ha tocado la página real).
