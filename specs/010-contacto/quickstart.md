# Quickstart — 010

1. `json.tool` / `php -l`.
2. Página ZZ010 con plantilla Contacto: 200, un `<h1>`, formulario y tarjeta de información; plugin desactivado: provisional.
3. Capturas 1280/900/390 y contraste calculado.

## Resultado de la validación
Entorno: copia aislada de la BD de Local (mysqld propio en otro socket; durante la sesión Local arrancó y cerró mi instancia, se relanzó sin tocar los datos reales), WP 7.1.3, PHP 8.5.3; página temporal «ZZ010».

**Comprobado**
- `theme.json` válido (con `customTemplates` ampliado); `php -l` correcto en `functions.php` y todos los patterns.
- Página con plantilla Contacto: 200, un `<h1>` con barra de acento, formulario del plugin (`afa-core-form--contacto`) a la izquierda y tarjeta de información con iconos (dirección, email, horario) y píldoras a la derecha; captura 1280 px comparada con Figma 56:1185.
- Plugin desactivado: 200, texto provisional con el email, 0 errores PHP, sin formulario.
- Contraste calculado: contrast/surface-high 14,74; primary/surface-container 5,87; base/primary 6,46.

**Fallos encontrados y corregidos**
1. La plantilla `page-formulario` de la 011 no estaba registrada en `customTemplates` (no se podía elegir desde el editor) → registrada junto con `page-contacto`.

**Pendiente de una persona**
- Revisar a 390 px en un móvil/DevTools (Figma 56:1263); Chrome headless recorta, la regla de apilado se ha comprobado solo en CSS.
- Confirmar dirección, email, horario y vocalías reales (se usan la dirección del pie y los datos de ejemplo del Figma; el Figma de escritorio dice Avenida Alfonso XIII, 23).
- Enviar el formulario de verdad (correo recibido en Mailpit/buzón) y comprobar los estados error/éxito dentro de la tarjeta.
- Asignar la plantilla «Contacto» a la página real y comprobar en el Editor del sitio que no hay bloques «no válidos».
