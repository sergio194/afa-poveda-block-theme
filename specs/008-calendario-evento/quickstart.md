# Quickstart — 008

1. `json.tool` / `php -l`.
2. Eventos ZZ008 + página con plantilla «Calendario escolar»: 200, calendario con eventos, próximos, destacado.
3. Evento individual 200 con estilos.
4. Plugin desactivado.
5. Capturas y contraste.

## Resultado de la validación
Entorno: copia aislada de la BD de Local, WP 7.1.3, PHP 8.5.3, TEC 6.18.2; 3 eventos y una página temporales «ZZ008» (borrados; el ajuste de TEC «Plantilla de eventos» se cambió a `default` para una prueba y se restauró a su valor original, vacío).

**Comprobado**
- `theme.json` válido (nueva plantilla en `customTemplates`); `php -l` correcto en `functions.php` y patterns.
- Página «Calendario escolar»: 200, un `<h1>`, calendario de octubre 2026 con navegación, día actual con «Hoy», fines de semana distinguidos, evento enlazado en su día, «Próximos eventos» con 3 tarjetas y tarjeta destacada; captura a 1280 px comparada con Figma 18:644.
- Evento individual: 200; la ficha nativa de TEC queda con tipografía, enlaces y navegación del tema (captura a 1280 px).
- Sin el plugin: calendario muestra «El calendario estará disponible próximamente», 0 errores PHP.

**Fallos encontrados y corregidos**
1. Una plantilla `single-tribe_events.html` del tema se ignora: TEC impone su plantilla (también con «Plantilla de página predeterminada») → se descarta y se estiliza la nativa; el hero con foto y la tarjeta de detalles quedan como petición al plugin.
2. El nombre largo de un evento desbordaba la celda vecina → `overflow: hidden` en la celda.

**Pendiente de una persona**
- Validar a 390 px en un móvil real (la regla de apilado y celdas más bajas está solo en CSS).
- Ver la página con eventos reales, categorías y colores del plugin (aquí solo una categoría, sin leyenda) y con el PDF configurado.
- Decidir si se pide al plugin que fuerce la plantilla de bloques del tema para `tribe_events` (hero + «Detalles clave» como en Figma 19:2095).
- Comprobar en el Editor del sitio que `page-calendario` y los patterns no tienen bloques «no válidos».
