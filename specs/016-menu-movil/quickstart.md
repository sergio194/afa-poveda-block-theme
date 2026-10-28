# Quickstart — 016

1. Móvil (o DevTools a 390 px): pulsar la hamburguesa.
2. Comprobar «Hazte socio» arriba, entradas a la izquierda, flechas en AFA/Extraescolares/Servicios.
3. Desplegar AFA, luego Extraescolares (AFA se cierra). Escape cierra el menú.
4. Editor del sitio → Partes → «Menú móvil»: abrir y comprobar que no hay bloques no válidos.

## Resultado de la validación
Entorno: copia aislada de la BD de Local (28/10/2026), WP 7.1.3, PHP 8.5.3, Chrome headless (capturas a 390/900 en iframe para evitar el ancho mínimo de ventana). Sin datos de prueba: se usa el menú real (`wp_navigation` 7402) en solo lectura.

**Comprobado**
- Antes: overlay a pantalla completa, alineado a la derecha y con los 3 submenús desplegados (20 enlaces).
- Después, a 390 y 900 px: cajón izquierdo de 320 px con logo, cerrar, «Hazte socio», 7 entradas de primer nivel, flechas en las 3 con submenú y buscador; fondo atenuado. Cabecera a 1280 px sin cambios.
- Script: botón de abrir con «Abrir el menú»; diálogo `role=dialog` `aria-modal=true`; cerrar con nombre «Cerrar»; `aria-expanded` false,false,false → clic en AFA true,false,false (submenú visible) → clic en Extraescolares false,true,false → otra vez false,false,false; Escape cierra y el foco vuelve al botón de abrir.
- Activo: «Inicio» en portada y «Noticias» en `/noticias/` en primario (con fondo `primary-soft` el ítem actual).
- Contraste: contrast/surface-container 15,55; primary/primary-soft 5,07; primary/surface-container 5,87.
- `php -l` con PHP 7.4.30 y 8.5.3; `json.tool`; ida y vuelta de bloques de 70 archivos: 0 diferencias; `debug.log` sin avisos del tema; 0 desbordes horizontales.

**Fallos encontrados y corregidos**
1. Core da por abiertos todos los submenús dentro de un overlay (hereda `overlayOpenedBy`): `aria-expanded="true"` en los tres → contexto propio por submenú en el render.
2. El cajón salía a la derecha (`justify-content: flex-end` heredado de la cabecera).
3. A 600–1023 px la regla de tablet `order: 2` de la navegación de cabecera también movía la del cajón debajo del buscador → limitada a `.is-responsive`.
4. Las reglas de «activo por URL» de 004/009/012 subrayaban el ítem en el cajón → anuladas dentro del cajón.

**Pendiente de una persona**
- Probar en un móvil real (táctil): abrir/cerrar acordeones, scroll del cajón con menú largo, VoiceOver/TalkBack.
- Abrir la parte «Menú móvil» y la Cabecera en el Editor del sitio: ningún bloque «no válido» y que la parte aparece como overlay de la navegación.
- Revisar las desviaciones de Figma (sin iconos por enlace; «Hazte socio» y buscador añadidos).
