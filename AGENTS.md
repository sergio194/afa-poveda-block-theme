# AGENTS.md — Tema AFA Padre Poveda

Instrucciones para agentes (Claude Code, Cursor, Codex). Léelas antes de tocar nada.

## Qué es
Block theme (FSE) a medida para la AFA del CEIP Padre Poveda. WordPress ≥ 6.9, PHP ≥ 7.4, theme.json v3.
Diseño de referencia: Figma `https://www.figma.com/design/lS6WwjiFrPKd60cQTfXrKF/AFA`.

## Reglas
- Cumple `.specify/memory/constitution.md`. Si una petición la contradice, avisa antes de implementar.
- Flujo SDD: spec → plan → tareas → implementación. Las specs viven en `specs/NNN-nombre/`. Toda desviación de Figma se anota en la spec.
- Tokens solo en `theme.json`. `style.css` solo para lo que theme.json no puede expresar, con comentario del porqué.
- Variables CSS en forma normalizada: `--wp--preset--font-size--x-large`, `--wp--preset--spacing--50`.
- Partes en `parts/` sin subcarpetas. Contenido con PHP (año, cadenas traducibles) va en `patterns/*.php` y se referencia con `<!-- wp:pattern {"slug":"afa-poveda/..."} /-->`.
- Lógica de negocio (formularios, socios, newsletter) → plugins, nunca en el tema.
- Textos en español y traducibles con el dominio `afa-poveda`.

## Mapa
- `theme.json` — paleta, tipografías, escala, espaciados, estilos globales y por bloque.
- `styles/sections/` — estilos de bloque: `afa-card`, `afa-card-accent`, `afa-eyebrow`.
- `parts/` — header, footer (usa pattern `afa-poveda/footer`), sidebar.
- `templates/` — index, home, single, page, page-with-sidebar, archive, search, 404.
- `patterns/` — footer, newsletter, posts-list.

## Entorno local
- Sitio en Local; este directorio es `wp-content/themes/afa-poveda`.
- Si los cambios de theme.json no se ven: comprueba en Apariencia → Editor → Estilos si hay personalizaciones de usuario guardadas (tienen prioridad) y restablécelas.
- Si editas plantillas desde el Editor del sitio, se guardan en la base de datos, no en los archivos. Para devolverlas al repo usa el plugin Create Block Theme ("Guardar cambios en el tema") o borra la personalización para volver a la versión del archivo.

## Verificación antes de dar una tarea por terminada
1. `python3 -m json.tool theme.json > /dev/null` y lo mismo para `styles/sections/*.json`.
2. `php -l` en `functions.php` y `patterns/*.php`.
3. Abrir en el Editor del sitio las plantillas/partes tocadas: ningún bloque "no válido".
4. Revisar a 390, 900 y 1280 px. Comparar con Figma.
5. Contraste ≥ 4,5:1 en cualquier color de texto nuevo.
6. Actualizar la spec (criterios de aceptación y tabla de refinamientos).
