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

### Cambiado

- La URL de inicio usa la plantilla de portada; `home.html` queda como índice de entradas con sidebar
- Accesos rápidos: iconos con bloque `Icono` (listado del editor + colección AFA), sin clases CSS
- Sobre nosotros: organigrama en caja con avatares, comisiones en pills, documentos 2×2 con icono PDF e iconos de sección (fidelidad Figma)

### Corregido

- Bloque Actualidad y Avisos: se oculta sin sticky; layout 0/1/2/3
- Últimas noticias: tarjetas a misma altura, imágenes 16:9 y «Leer más» al pie; «Cargar más» solo en móvil
