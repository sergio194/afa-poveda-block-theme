# Quickstart — 013

1. `json.tool` / `php -l`.
2. Página ZZ013 con el bloque y 3 actividades: 200; capturas 1280/390; `?afa_semana[...]` para ver el resumen.
3. Plugin desactivado.
4. Contraste calculado.

## Resultado de la validación

Entorno: copia aislada de la BD de Local, WP 7.1.3, PHP 8.5.3; 3 actividades y una página temporales «ZZ013» (borradas).

**Comprobado**
- `theme.json` válido (nueva plantilla); `php -l` correcto en patterns y `functions.php`.
- Página con plantilla Configurador: 200, un `<h1>`, filtro de curso, tabla 5 días × 2 franjas con selectores, franja B bloqueada con trama, panel oscuro de resumen con lista y cuota (35 € al elegir Judo L+X), aviso de cuotas; captura a 1280 px.
- Sin el plugin: 200, 0 errores PHP, sin formulario.
- Contraste: base/contrast (resumen) 17,1; contrast-muted/surface-container 8,46; error `#b3261e`/base 6,54; borde de control contrast-muted/base 9,32.

**Fallos encontrados y corregidos**
1. El panel de acciones quedaba debajo del total sin alinear → rejilla de dos columnas en escritorio, una en móvil.
2. Nada indicaba la franja bloqueada más que el estado deshabilitado → trama + color de fondo (no depende solo del color).

**Pendiente de una persona**
- Probar el JS real del plugin en un navegador: elegir actividades en cada celda, comprobar mensajes de error (`is-error`), bloqueo de la franja B y el botón «Continuar a la inscripción».
- Revisión a 390 px en móvil real (tabla con scroll interno; Figma propone otro patrón con pestañas por día).
- Los nombres largos se recortan en los selectores; revisar con actividades reales.
- Decidir si se pide al plugin un panel lateral de actividades con arrastrar y soltar (Figma 3:467).
- Comprobar en el Editor del sitio que `page-configurador` y el pattern no tienen bloques «no válidos».
