# Quickstart — 014

1. `php -l functions.php patterns/*.php`; `python3 -m json.tool theme.json`.
2. `docs/comprobar-enlaces.sh http://localhost:10048 / /noticias/ /extraescolares/ /contacto-afa/ /hazte-socio-2/ /calendario-escolar/ /sobre-nosotros/ /servicios-del-ampa/`
3. Portada: pulsar los cuatro accesos, «Hazte socio» y «Contactar con Vocalías».

## Resultado de la validación
Entorno: copia aislada de la BD de Local del 28/10/2026 (mysqldump → mysqld propio), WP 7.1.3, PHP 8.5.3 con `php -S`; páginas temporales «ZZ014» creadas y borradas.

**Comprobado**
- `php -l` y `json.tool` correctos. Ida y vuelta `parse_blocks`/`serialize_blocks` de las 69 plantillas, partes y patterns: 0 diferencias.
- Portada: Hazte socio → `/hazte-socio-2/`, Contactar con Vocalías → `/contacto-afa/`, Comedor → `/servicios-del-ampa/comedor-escolar/`, Calendario → `/calendario-escolar/`, Voluntarios → `/sobre-nosotros/`, todos 200 sin redirección. Botón del archivo de extraescolares → `/actividades-extraescolares-2/`.
- 15 casos por WP-CLI: relativa, absoluta del sitio, sin barra final, con ancla (se conserva), externa y `//` intactas, otras rutas intactas, privacidad sin publicar → ruta, plugin desactivado → ruta fija; `#` en párrafo → texto, en botón → nada, redes todas `#` → bloque vacío, mezcla → solo las que tienen URL; `#contenido` intacto.
- Con una página ZZ en `/hazte-socio/` con la plantilla, gana la ruta canónica; con dos páginas Contacto, gana la más reciente.
- «Compartir noticia» en una entrada real: correo, WhatsApp y Facebook con la URL de la noticia. Pie: solo el icono de correo.
- Comprobador: 54 enlaces internos, rotos solo `/aviso-legal/`, `/cookies/`, `/privacidad/` (no existen) y 4 fichas de ejemplo de `servicios-grid` insertadas en el contenido de la página Servicios.
- Contraste de `.afa-enlace-pendiente` (contrast-muted): 9,32:1 sobre base, 8,46 sobre surface-container, 8,02 sobre surface-high.
- `debug.log` sin avisos del tema. Captura 1280: sección Avisos sin «Ver todo», resto igual.

**Fallos encontrados y corregidos**
1. El servidor de pruebas devolvía 200 en los 404 porque los avisos `Deprecated` de The Events Calendar se imprimían antes de las cabeceras: falso negativo de la primera pasada; se relanzó con `display_errors=0`. (Solo entorno; producción no muestra errores.)
2. El pattern `servicios-grid` enlazaba fichas inventadas (`/servicios/musica-y-arte/`…) → `#` (y Comedor a la ruta canónica).
3. Una primera comprobación hizo creer que el icono de Facebook de «Compartir» desaparecía: era el recorte de mi inspección; se confirmó en el HTML completo que está.

**Pendiente de una persona**
- Publicar Aviso legal, Privacidad (marcarla en Ajustes → Privacidad) y Cookies con las rutas `/aviso-legal/`, `/privacidad/`, `/cookies/` (o cambiar los enlaces del pie en el Editor del sitio).
- Página Servicios: sustituir la rejilla de ejemplo por «Servicios — Rejilla desde contenido» (o poner los enlaces de cada ficha).
- Menú: «Contacto» apunta a la página duplicada `/ampa-3/contacto/`; «Hazte Socia/o» es un enlace personalizado a `/hazte-socio/` (el tema lo corrige al pintar, pero conviene enlazar la página). Quitar «Trueque».
- URLs reales de Instagram y Facebook en el pie (Editor del sitio → Pie).
- Probar en el live link/producción con `docs/comprobar-enlaces.sh`.
