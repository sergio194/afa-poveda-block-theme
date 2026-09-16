# Spec 001 — Sistema de diseño y estructura base

**Estado**: Implementada (v0.1.0) · **Fuente**: Figma `AFA`, página `componets` (Header - TopNavBar, Header - Top Navigation, Footer, Footer mobile, Aside - Sidebar)

## Objetivo
Trasladar los componentes de Figma a un block theme donde el sistema de diseño viva en `theme.json` y la cabecera, pie y barra lateral se puedan editar desde el Editor del sitio.

## Historias de usuario
1. **Como familia** que visita la web desde el móvil, quiero leer noticias y encontrar el contacto sin hacer zoom.
2. **Como voluntario/a de la junta**, quiero cambiar el menú, la dirección o los enlaces del pie sin pedir ayuda técnica.
3. **Como responsable de IT**, quiero que cualquier cambio de color o tipografía se haga en un único sitio.

## Requisitos funcionales
- **RF-1** Cabecera escritorio: logo, menú (Inicio, AFA, Extraescolares, Servicios, Noticias, Contacto), buscador desplegable y botón "Hazte socio". Enlace activo resaltado con subrayado de 2 px.
- **RF-2** Cabecera móvil y tablet (< 1024 px): logo + botón hamburguesa. Buscador y botón visibles a partir de 600 px.
- **RF-3** Pie escritorio en 3 columnas: marca + lema + redes · enlaces legales · contacto con iconos.
- **RF-4** Pie móvil centrado: marca → contacto → redes → legales → copyright.
- **RF-5** Barra lateral en noticias: buscador, tarjeta de suscripción, últimas entradas, categorías en píldoras.
- **RF-6** Plantillas: `index`, `home`, `single`, `page`, `page-with-sidebar`, `archive`, `search`, `404`.
- **RF-7** Copyright con el año actual calculado automáticamente.

## Tokens (theme.json)
| Token | Valor | Uso |
|---|---|---|
| `primary` | #005bbf | Enlaces, activo, etiquetas |
| `accent` | #1967d2 | Botones, tarjeta de suscripción |
| `primary-soft` | #d9e5f4 | Fondo de píldoras |
| `surface` | #f7f9ff | Fondo de página y cabecera |
| `surface-container` | #f1f4fa | Tarjetas |
| `surface-high` | #ebeef4 | Pie, bordes suaves |
| `outline` | #c1c6d6 | Bordes |
| `contrast-muted` | #414754 | Texto secundario, menú |
| `contrast` | #181c20 | Texto principal |

Tipografía: Inter (texto) y Plus Jakarta Sans (títulos), variables y locales. Escala 12 · 14 · 16 · 20 · 24 · 32 · 44 px (las tres últimas fluidas). Espaciado 4 · 8 · 12 · 16 · 24 · 32 · 48 · 64 px. Radios 8 · 12 · píldora.

Estilos de bloque registrados: **Tarjeta** y **Tarjeta destacada** (Grupo/Columna), **Etiqueta** (Encabezado/Párrafo).

## Refinamientos respecto a Figma (decisiones)
| # | En Figma | En el tema | Motivo |
|---|---|---|---|
| R1 | Dos azules de botón: #1a73e8 y #005bbf | `accent` #1967d2 para botones, `primary` para texto | Blanco sobre #1a73e8 da 4,51:1, al límite; #1967d2 da 5,37:1 y se ve igual |
| R2 | Copyright al 70 % de opacidad | Color sólido `contrast-muted` | Con opacidad el contraste cae a 3,76:1 (falla AA) |
| R3 | Texto de la suscripción al 90 % | Blanco 100 % | 3,95:1 → 5,37:1 |
| R4 | Fondo del pie #ebeef4 (escritorio) y #dfe3e8 (móvil) | Un único `surface-high` | Coherencia; un solo token |
| R5 | Títulos de sidebar (16 px regular, gris) y del pie (14 px semibold, azul) | Un estilo "Etiqueta" (14 px, 600, mayúsculas) | Mismo papel, mismo estilo |
| R6 | Cabecera con borde y sombra | Solo borde inferior | Redundante |
| R7 | "Lo más visto" | "Lo más reciente" (bloque Últimas entradas) | WordPress no mide visitas sin plugin; ver spec 003 |
| R8 | Formulario de suscripción con campos | Tarjeta con botón a `/newsletter/` | El formulario real depende del plugin elegido; ver spec 003 |
| R9 | © 2024 fijo | Año automático | Evita editarlo cada enero |
| R10 | Tres iconos sociales (uno parece una medalla) | Bloque Iconos sociales: Instagram, Facebook, email | Iconos mantenidos por WordPress; cada red se cambia desde el editor |
| R11 | Menú en móvil a < 600 px (comportamiento por defecto) | Hamburguesa hasta 1024 px | El menú completo no cabe entre 600 y 1024 px |
| R12 | Logo como imagen fija en el diseño | Bloque Logo del sitio | Se sube desde el editor; si no hay logo se muestra el nombre del sitio |

## Pendiente de confirmar con la junta
- [ ] **Dirección**: Figma escritorio dice "Calle de Alfonso XII, 58, 28014 Madrid" y Figma móvil "C/ San Sergio, 1. 28017 Madrid". En el tema está la primera.
- [ ] Redes sociales reales y sus URLs.
- [ ] Logo en SVG (mejor que PNG para pantallas retina).

## Criterios de aceptación
- [x] JSON válido en `theme.json` y `styles/sections/*.json`.
- [x] 0 bloques no válidos al abrir header, footer, sidebar, single y home en el Editor del sitio.
- [x] Sin errores de consola ni avisos PHP del tema.
- [x] Capturas a 390, 700, 900, 1024 y 1280 px sin desbordes.
- [x] Todos los pares de color de texto ≥ 4,5:1.

## Siguientes specs propuestas
- **002 — Portada**: hero, accesos rápidos (extraescolares, servicios, hazte socio), últimas noticias, avisos.
- **003 — Newsletter y formularios**: elegir plugin (p. ej. MailPoet o formulario + Mailchimp), estilos del formulario.
- **004 — Páginas de Extraescolares y Servicios**: patterns de ficha de actividad (horario, curso, precio, inscripción).
- **005 — Hazte socio**: flujo de alta y pago de cuota (plugin), pattern de ventajas.
