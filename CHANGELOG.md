# Changelog

Todos los cambios notables de este tema se documentan en este archivo.

El formato se basa en [Keep a Changelog](https://keepachangelog.com/es-ES/1.1.0/),
y el proyecto sigue [Versionado Semántico](https://semver.org/lang/es/).

## [Unreleased]

### Añadido
- Configurador visual (spec 013, ampliación): estilos del panel de actividades del plugin v1.11.0 (tarjetas, filtros, días como botones y pestañas en móvil, colores por categoría y hueco de soltado) y del aviso de actividades quitadas por el filtro de curso. Botón «Configura tu semana» en el archivo de extraescolares.

### Añadido

- Configurador de semana (013): plantilla `page-configurador`, pattern `configurador-aviso` y estilos de `afa-core-configurador*` (tabla de franjas, resumen, errores y bloqueos)
- Calendario escolar (008): plantilla `page-calendario`, patterns `calendario-mes`, `calendario-lateral` y `evento-contenido`; estilos de los bloques de eventos del plugin y de la ficha nativa de The Events Calendar
- Contacto (010): plantilla `page-contacto`, patterns `contacto-formulario` (bloque del plugin o texto provisional) y `contacto-info`; plantillas `Contacto` y `Formulario` seleccionables en el editor
- Estilos de formularios (011): CSS de `afa-core-form*` (tracker, campos, errores, éxito, newsletter) y `.mailpoet_form`; plantilla `page-formulario`; pattern `newsletter-formulario`
- Extraescolares (009): plantillas `archive-afa_extraescolar` y `single-afa_extraescolar`; patterns `extraescolares-dudas` y `extraescolar-socio`; estilos de los bloques `afa-core-extraescolar*` del plugin
- Plantillas CPT de Servicios (012): `single-afa_servicio` (hero, 65/35, bloques del plugin), pattern `servicios-grid-dinamico` (Query Loop) y estilos de las clases `afa-core-servicio-*`
- Accesibilidad AA (007): enlace «Saltar al contenido» en cabecera → `#contenido` en todas las plantillas públicas
- Guía editorial breve de accesibilidad en `specs/007-accesibilidad-aa/contracts/guia-editorial-a11y.md`
- Portada (`front-page.html`) según Figma HOME: hero, accesos rápidos, actualidad y avisos, últimas noticias y CTA de comunidad
- Patterns `afa-poveda/home-hero`, `home-quick-access`, `home-avisos`, `home-latest-news`, `home-community-cta`
- Iconos SVG de accesos en `assets/icons/`
- Página AFA / Sobre nosotros: plantilla `page-afa.html` y patterns `sobre-hero`, `sobre-quienes-somos`, `sobre-organigrama`, `sobre-que-hace`, `sobre-utilidad-comisiones`, `sobre-documentos`, compuesto `sobre-nosotros`
- Archivo Actualidad y Eventos: patterns `noticias-hero`, `noticias-grid`; parte `noticias-toolbar` (píldoras editables + «Más categorías»); plantillas `home`, `archive`, `search` e `index` a una columna
- Detalle de noticia (`single.html`) con migas, titular en primario, autor con avatar, relacionadas compactas y «Compartir noticia»
- Tamaño de imagen `afa-news-card` (768×432, recorte 16:9) para fichas del archivo
- Servicios (005): plantillas `page-servicios` / `page-servicio-detalle`; patterns `servicios-hero`, `servicios-grid`, `servicios-cta`, `servicios-page`; detalle Comedor (`servicio-hero`, `servicio-alimentacion`, `servicio-menus-valores`, `servicio-faq`, `servicio-inscripcion`, `servicio-documentacion`, compuesto `servicio-comedor`)
- Iconos SVG `icon-leaf`, `icon-clock`, `icon-folder` para detalle de servicio
- Hazte Socio (006): plantilla `page-hazte-socio`; patterns `hazte-hero`, `hazte-que-hacemos`, `hazte-pertenecer` (hueco form plugin), `hazte-ayudar`, `hazte-dudas`, compuesto `hazte-socio-page`
- Iconos SVG para Hazte Socio (`icon-carrera`, `icon-libro`, `icon-ludoteca`, `icon-voz`, `icon-mail`, `icon-habilidades`, `icon-colaboracion`, `icon-check-line`, ilustración hero)

### Cambiado

- Accesibilidad AA (007): overlays de heroes (portada/sobre 85 % primary; servicio 65 % contrast) para contraste de texto blanco en peor caso sobre imagen clara
- Accesibilidad AA (007): foco visible ampliado (`summary`, buscador, paginación); `prefers-reduced-motion`; nombres accesibles en «Ver más» / «Leer más»
- Toolbar de Actualidad: píldoras de categoría editables en el Editor del sitio + «Más categorías» (desplegable); sin buscador duplicado (la búsqueda queda en la cabecera)
- La URL de inicio usa la plantilla de portada; `home.html` es el archivo de noticias (página de entradas `/noticias/`), sin sidebar de blog
- Accesos rápidos: iconos con bloque `Icono` (listado del editor + colección AFA), sin clases CSS
- Hazte Socio: iconos decorativos con bloque `Icono` (`afa-poveda/*`), igual que la home; sin filtros CSS sobre `<img>`
- Sobre nosotros: organigrama en caja con avatares, comisiones en pills, documentos 2×2 con icono PDF e iconos de sección (fidelidad Figma)

### Corregido

- Menú: «Noticias» ya no se marca activa en el archivo de Extraescolares
- «Ver más» del Query Loop: el nombre accesible incluye el texto visible (WCAG 2.5.3)
- Menú: Inicio ya no queda activo fuera de la portada; AFA/Servicios se marcan activos como ancestros en páginas hijas
- Submenús de la cabecera: ya no empujan el layout ni quedan bajo el contenido (`overflow` / z-index)
- Patterns Sobre nosotros: imágenes sin `width`/`height` HTML (validación WP 7.1) y `url` en atributos del bloque
- Bloque Actualidad y Avisos: se oculta sin sticky; layout 0/1/2/3
- Últimas noticias: tarjetas a misma altura, imágenes 16:9 y «Leer más» al pie; «Cargar más» solo en móvil
- Archivo de noticias en móvil: sin scroll horizontal (título del sitio, blur de fichas y toolbar a ancho completo)
- Detalle de noticia: migas con el título real de la entrada (ya no «Detalle de noticia»)
