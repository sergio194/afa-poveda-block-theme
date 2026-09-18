# Changelog

Todos los cambios notables de este tema se documentan en este archivo.

El formato se basa en [Keep a Changelog](https://keepachangelog.com/es-ES/1.1.0/),
y el proyecto sigue [Versionado Semántico](https://semver.org/lang/es/).

## [Unreleased]

### Añadido

- Portada (`front-page.html`) según Figma HOME: hero, accesos rápidos, actualidad y avisos, últimas noticias y CTA de comunidad
- Patterns `afa-poveda/home-hero`, `home-quick-access`, `home-avisos`, `home-latest-news`, `home-community-cta`
- Iconos SVG de accesos en `assets/icons/`
- Página AFA / Sobre nosotros: plantilla `page-afa.html` y patterns `sobre-hero`, `sobre-quienes-somos`, `sobre-organigrama`, `sobre-que-hace`, `sobre-utilidad-comisiones`, `sobre-documentos`, compuesto `sobre-nosotros`
- Archivo Actualidad y Eventos: patterns `noticias-hero`, `noticias-grid`; parte `noticias-toolbar` (píldoras editables + «Más categorías»); plantillas `home`, `archive`, `search` e `index` a una columna
- Detalle de noticia (`single.html`) con migas, titular en primario, autor con avatar, relacionadas compactas y «Compartir noticia»
- Tamaño de imagen `afa-news-card` (768×432, recorte 16:9) para fichas del archivo
- Servicios (005): plantillas `page-servicios` / `page-servicio-detalle`; patterns `servicios-hero`, `servicios-grid`, `servicios-cta`, `servicios-page`; detalle Comedor (`servicio-hero`, `servicio-alimentacion`, `servicio-menus-valores`, `servicio-faq`, `servicio-inscripcion`, `servicio-documentacion`, compuesto `servicio-comedor`)
- Iconos SVG `icon-leaf`, `icon-clock`, `icon-folder` para detalle de servicio

### Cambiado

- Toolbar de Actualidad: píldoras de categoría editables en el Editor del sitio + «Más categorías» (desplegable); sin buscador duplicado (la búsqueda queda en la cabecera)
- La URL de inicio usa la plantilla de portada; `home.html` es el archivo de noticias (página de entradas `/noticias/`), sin sidebar de blog
- Accesos rápidos: iconos con bloque `Icono` (listado del editor + colección AFA), sin clases CSS
- Sobre nosotros: organigrama en caja con avatares, comisiones en pills, documentos 2×2 con icono PDF e iconos de sección (fidelidad Figma)

### Corregido

- Menú: Inicio ya no queda activo fuera de la portada; AFA/Servicios se marcan activos como ancestros en páginas hijas
- Submenús de la cabecera: ya no empujan el layout ni quedan bajo el contenido (`overflow` / z-index)
- Patterns Sobre nosotros: imágenes sin `width`/`height` HTML (validación WP 7.1) y `url` en atributos del bloque
- Bloque Actualidad y Avisos: se oculta sin sticky; layout 0/1/2/3
- Últimas noticias: tarjetas a misma altura, imágenes 16:9 y «Leer más» al pie; «Cargar más» solo en móvil
- Archivo de noticias en móvil: sin scroll horizontal (título del sitio, blur de fichas y toolbar a ancho completo)
- Detalle de noticia: migas con el título real de la entrada (ya no «Detalle de noticia»)
