# Constitución del proyecto: tema AFA Padre Poveda

Reglas no negociables. Toda spec, plan y tarea debe cumplirlas; si una tarea choca con alguna, se para y se revisa la spec.

## I. Block theme puro
- Tema de bloques (FSE) sin framework padre ni page builders.
- Plantillas en `templates/*.html`, partes en `parts/*.html` (sin subcarpetas), patterns en `patterns/*.php`.
- Mínimo soportado: WordPress 7.1, PHP 7.4. `theme.json` versión 3.

## II. theme.json es la fuente de verdad del diseño
- Colores, tipografías, tamaños, espaciados y radios se definen como presets en `theme.json`.
- Prohibido usar valores sueltos (hex, px) en plantillas o patterns si existe un preset equivalente.
- `style.css` solo contiene lo que `theme.json` no puede expresar (iconos, ajustes responsive puntuales, estados). Cada bloque de CSS lleva un comentario que justifica por qué está ahí.
- Referencias a variables CSS siempre en su forma normalizada (`--wp--preset--font-size--x-large`).

## III. Presentación en el tema, lógica en plugins
- El tema no registra tipos de contenido, taxonomías, formularios, shortcodes ni integraciones.
- Inscripciones, cuotas, newsletter y formularios se resuelven con plugins; el tema solo aporta estilos y patterns que los envuelven.
- Cambiar de tema no debe hacer perder contenido.

## IV. Editable por voluntarios sin tocar código
- Todo texto visible (cabecera, pie, barra lateral) debe poder editarse desde el Editor del sitio.
- Patterns con nombres y categorías en español, pensados para gente no técnica.
- Nada de contenido "hardcodeado" que obligue a llamar al desarrollador (excepción: el año del copyright, que se calcula solo).

## V. Accesibilidad (WCAG 2.2 AA)
- Contraste mínimo 4,5:1 en texto normal y 3:1 en texto grande y bordes de controles. Se verifica con cálculo, no a ojo.
- Sin opacidades sobre texto que bajen el contraste.
- Foco visible en todos los elementos interactivos. Navegación completa por teclado.
- Jerarquía de encabezados correcta; iconos decorativos ocultos a lectores de pantalla, iconos con función con etiqueta.

## VI. Privacidad y rendimiento
- Fuentes alojadas en el propio tema (nada de Google Fonts remoto: RGPD).
- Sin scripts de terceros en el tema. Sin jQuery.
- Imágenes con `aspect-ratio` para evitar saltos de maquetación.

## VII. Español primero
- Interfaz, patterns y textos por defecto en español, con cadenas traducibles (`afa-poveda`).

## VIII. Verificación antes de dar una tarea por hecha
- `theme.json` y `styles/**/*.json` validan como JSON.
- Ningún bloque aparece como "no válido" al abrir plantillas y partes en el Editor del sitio.
- Capturas en 390, 900 y 1280 px de ancho comparadas con Figma.
- `WP_DEBUG` sin avisos provenientes del tema.

## Gobernanza
- La fuente de diseño es el archivo de Figma "AFA". Si el tema se desvía de Figma, la desviación se documenta en la spec correspondiente con su motivo.
- Modificar esta constitución requiere anotar el cambio y la fecha al final del archivo.

**Versión**: 1.1.0 · **Ratificada**: 2026-09-16  
**Cambios**: 1.1.0 (2026-09-16) — mínimo WordPress 7.1 por API de iconos (`core/icon` + `wp_register_icon`).
