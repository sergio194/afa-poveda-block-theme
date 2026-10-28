# Quickstart — 015

1. Crear una entrada «ZZ» fijada con imagen destacada y borrar el archivo de la imagen en `uploads` (o usar una de 2026/04 si sigue faltando). Título con una palabra muy larga.
2. Portada, `/noticias/` y la ficha a 1280, 900 y 390 px.
3. Borrar la entrada de prueba y desfijarla.

## Resultado de la validación
Entorno: copia aislada de la BD de Local (28/10/2026), WP 7.1.3, PHP 8.5.3; datos «ZZ015» (1 adjunto sin archivo de 1200×1688, 3 entradas fijadas con textos largos), borrados al terminar y `sticky_posts` restaurado a `[8622,8514,8451]`.

**Comprobado**
- Reproducidos #10 y #11 antes de corregir (alt subrayado bajo «Destacado», extracto y título fuera de la tarjeta lateral azul, extracto del destacado sin recortar).
- Después: destacado a 16:9 con marcador, sin alt ni icono visibles; laterales con el texto dentro y extractos a 3 líneas, a 1280 y 390 px.
- «Últimas noticias» y archivo `/noticias/` con imagen rota: marcador a 16:9; extractos a 3 líneas sin media línea asomando.
- Ficha de noticia con imagen rota: cabecera 16:9 con marcador (antes, franja de 25 px); relacionadas con marcador. Ficha con imagen real: sin cambios.
- Medición en iframe: 0 elementos desbordados a 390 y 900 px en portada y ficha; en `/noticias/` solo las píldoras del carrusel horizontal (desplazable a propósito, spec 004).
- Ida y vuelta de bloques de las 69 plantillas/partes/patterns: 0 diferencias. `debug.log` sin avisos del tema.

**Fallos encontrados y corregidos**
1. Tarjetas laterales de Avisos: `flex-wrap: wrap` del layout flex mandaba el contenido a una segunda columna fuera de la tarjeta (era el «texto que se sale» de la auditoría).
2. Clamp del extracto del archivo de noticias en el contenedor: dejaba ver media línea de más.
3. Cabecera de la ficha de noticia: misma causa que la tarjeta destacada.
4. El recorte de título a 3 líneas que probé no se aplicaba y además ocultaba información: retirado (los títulos se ven enteros y se parten).

**Pendiente de una persona**
- Revisar en Safari (macOS/iOS): Safari no pinta `::before` en imágenes rotas, así que se verá el icono pequeño del navegador sobre el marcador (la caja sí mantiene la proporción).
- Volver a subir los medios de `/uploads/2026/04` y `/05` (contenido).
- Comparar con Figma HOME 1:259 / 1:1395 con contenido real.
