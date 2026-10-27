# Quickstart — 011

1. `json.tool` / `php -l`.
2. Páginas ZZ011 con `inscripcion`, `contacto`, `alta-socio`, `newsletter`: 200 y capturas 900/1280/390.
3. Estados error y éxito: HTML de prueba con las clases del contrato inyectado en una página ZZ011 (el plugin los imprime tras enviar).
4. Contraste calculado.

## Resultado de la validación
Entorno: copia aislada de la BD de Local, WP 7.1.3, PHP 8.5.3; páginas temporales «ZZ011» (borradas al terminar).

**Comprobado**
- `theme.json` válido; `php -l` correcto en `functions.php` y todos los patterns.
- Páginas con los bloques `inscripcion`, `contacto`, `alta-socio` y `newsletter` responden 200 con la plantilla `page-formulario`; inscripción renderizada con tracker, título de paso, grupo, tarjetas de opción y botón (el JS del plugin muestra un paso cada vez).
- Estados error y éxito comprobados con HTML equivalente al contrato §9 (el plugin los imprime tras un envío): resumen con borde y texto, campo con borde de error + mensaje con icono ⚠, panel de éxito con check, título y dos botones.
- Capturas Chrome headless a 1280 px (y 390 aproximada). Contraste calculado: error/base 6,54; base/primary 6,46; primary/primary-soft 5,07; primary/surface-container 5,87; green/soft-green 5,72; borde de control contrast-muted/base 9,32.

**Fallos encontrados y corregidos**
1. `post-excerpt` en la plantilla autogeneraba un extracto con el texto del formulario → se quita; la introducción es un párrafo editable del contenido.
2. Botones «Siguiente/Anterior» y «Añadir» sin estilo propio (los añade JS) → estilos para `__siguiente`, `__anterior`, `__anadir`.
3. En el hueco de Hazte socio, el formulario quedaba con doble marco → sin borde/sombra dentro de `.afa-hazte-form` y `.afa-newsletter-form`.

**Pendiente de una persona**
- Enviar de verdad cada formulario (con errores y con éxito) en Local con el plugin activo: aquí solo se simuló el marcado de error/éxito, no el envío.
- Revisión visual a 390 px en un móvil real; revisar el tracker (Figma lleva iconos por paso; no se replican).
- Probar el formulario nativo de MailPoet (`.mailpoet_form`) con uno real, o sustituirlo por el bloque `newsletter`.
- Decidir si el patrón `newsletter-formulario` sustituye al provisional `newsletter` en la web.
- Comprobar en el Editor del sitio que `page-formulario` y el pattern no tienen bloques «no válidos».
