# Backlog de specs — tema `afa-poveda`

Fuente de diseño: Figma `AFA` (`lS6WwjiFrPKd60cQTfXrKF`), página `screens` (1:173).
Continúa la numeración existente (001–007). Los ids de plugin (`plugin-NNN`) se refieren al backlog de `afa-padre-poveda-core`.

Reparto (constitución III): el tema pone **presentación**; la lógica vive en el plugin.

## Hecho

| Spec | Tema | Figma |
|---|---|---|
| 001 | Sistema de diseño | `uikit` 33:5375, `MENU` 1:1592, header/footer |
| 002 | Portada | `HOME` 1:259, `HOME- MOBILE` 1:1395 |
| 003 | Sobre nosotros | 1:390, 4:1183 |
| 004 | Actualidad y eventos (noticias) | 20:2742, 22:2991, detalle 19:2503 / 20:2629 |
| 005 | Servicios (páginas + patterns) | 26:3374, 26:3175, 27:4354, 27:4168 |
| 006 | Hazte socio (landing) | 27:3962, 27:3559 |
| 007 | Accesibilidad WCAG 2.2 AA | transversal |
| 008 | Calendario escolar y detalle de evento (calendario hecho; hero de evento pendiente de petición al plugin) | `18:644`, `19:2095` · [spec](specs/008-calendario-evento/spec.md) |
| 009 | Extraescolares: archivo y ficha | `1:673`, `8:2305` · [spec](specs/009-extraescolares-archivo-ficha/spec.md) |
| 010 | Contacto | `56:1185`, `56:1263` · [spec](specs/010-contacto/spec.md) |
| 011 | Estilos de formularios | `56:1456`, `56:1616`, `56:1785` (+ móviles) · [spec](specs/011-estilos-formularios/spec.md) |
| 012 | Plantillas CPT de Servicios | los de la 005 · [spec](specs/012-plantillas-cpt-servicios/spec.md) |
| 013 | Estilos del configurador de semana | `3:467`, `3:658`, `3:331` · [spec](specs/013-configurador-semana/spec.md) |

## Por hacer

Origen: [auditoría de usabilidad y seguridad del 28/10/2026](Auditoria_web_AFA_Padre_Poveda.pdf) (22 hallazgos, «#N» = número en la auditoría). Se hizo sobre el live link de Local, así que lo de servidor puede no coincidir con producción. Solo entra aquí lo que es del tema; el resto está repartido en las secciones de abajo.

| Spec | Tema | Hallazgos | Qué incluye | Prioridad |
|---|---|---|---|---|
| 014 | Enlaces internos y destinos | #1, #5, #16, #20, parte de #17 | Revisar **todas** las URLs fijas de `parts/`, `patterns/` y `templates/` contra los slugs reales: `/hazte-socio/` (cabecera, `home-community-cta`, `extraescolar-socio`, `configurador-aviso`), `/servicios/comedor/`, `/calendario/`, `/afa/` (`home-quick-access`), `/contacto/` (6 patterns), `/actividades-extraescolares-2/` (`archive-afa_extraescolar`, slug sospechoso de duplicado). Decidir slugs canónicos con la junta y pedir 301 para los viejos. Iconos sociales con `"url":"#"` en `footer.php` y en «Compartir noticia» de `single.html`: quitar los que no tengan destino real o usar enlaces de compartir de verdad. «Ver todo» de `home-avisos` → `/category/avisos/` (o la que sea) en vez de `/noticias/`. Enlaces «Descargar» con `href="#"` en `servicio-menus-valores`, `servicio-documentacion`, `sobre-documentos`. Ver nota de la constitución IV abajo. Añadir a la guía de pruebas un paso de comprobación de enlaces rotos | **Crítica** (bloquea la captación de socios) |
| 015 | Tarjetas robustas ante imagen rota y textos largos | #10, #11 | El CSS ya tiene `aspect-ratio`, `object-fit`, `min-width:0` y `line-clamp` en las tarjetas (`style.css` ~380–884), pero la auditoría ve tarjetas de 2.000 px y textos desbordados. **Primero reproducir** en Local con una imagen destacada cuyo archivo no existe: comprobar si el `<img>` roto ignora el `aspect-ratio` (el texto alt se pinta en línea), si hay plantillas personalizadas en la BD que pisan las del tema, o si el live link servía otra versión. Corregir: contenedor de la media con alto fijo por ratio y `overflow:hidden`, fondo de placeholder, alt sin subrayado, y que la etiqueta «Destacado» no se solape. Revisar a 390/900/1280 | Media-alta |
| 016 | Menú móvil | #19 | El overlay de `core/navigation` sale desplegado del todo y alineado a la derecha (`justifyContent:right` en `parts/header.html`). Alinear a la izquierda en el overlay, submenús como acordeón y «Hazte socio» visible arriba del overlay. Contrastar con Figma `MENU` 1:1592 y anotar desviaciones en la spec | Baja |

**Nota (constitución IV):** las URLs fijas en patterns que se insertan con `<!-- wp:pattern … /-->` no se pueden editar desde el Editor del sitio sin desvincular el pattern. La 014 debe valorar sacarlas a un menú de navegación o a bloques sincronizados para que la junta las cambie sin desarrollador.

### Deuda y pendientes de la junta
- Specs 002, 003 y 006 siguen "pendiente validación visual / montaje editorial en Local".
- Dirección del pie: Figma escritorio dice Alfonso XII, 58 y móvil dice San Sergio, 1 (spec 001).
- Redes sociales reales y URLs.
- Logo en SVG.
- Revisar el grupo `GUIA` (Group 7, 33:5671) frente a la 001.
- Plantillas `404` y `search` existen en el tema sin frame en Figma: confirmar si hace falta diseño.

## Peticiones a afa-padre-poveda-core
- **Plantilla de evento (spec 008)**: The Events Calendar impone su plantilla de evento en temas de bloques e ignora `single-tribe_events.html`. Para el hero con foto y la tarjeta «Detalles clave» de Figma 19:2095 haría falta que el plugin fuerce la plantilla de bloques del tema para `tribe_events` (o exponga un filtro/bloque que lo haga) y lo documente en el contrato.
- **Configurador (spec 013)**: pasado al backlog del plugin como specs 013 (filtro de curso, fallo) y 014 (arrastrar y soltar del Figma, con alternativa accesible).
- **Endurecimiento de WordPress (auditoría #6, #8, #14, #22)**: desactivar XML-RPC (o al menos `system.multicall`) salvo que Jetpack lo necesite; restringir `/wp-json/wp/v2/users` a usuarios autenticados y quitar los usuarios de `wp-sitemap`; quitar el meta `generator`; desactivar los emojis de WordPress (cargan un script y una petición a s.w.org: choca con la constitución VI del tema). Es configuración del sitio, no presentación, por eso va al plugin.
- **Consentimiento de cookies (auditoría #3)**: Microsoft Clarity (plugin `microsoft-clarity`) graba sesiones sin consentimiento. Hace falta un banner/CMP que bloquee Clarity (y cualquier analítica, p. ej. Site Kit) hasta aceptar, con enmascarado de formularios. Si se resuelve con un plugin de terceros, el tema solo le daría estilos (spec futura del tema).
- **Primera capa RGPD en formularios (auditoría #4)**: el checkbox de privacidad del motor 004 no enlaza a la política. Que el texto del consentimiento enlace a la página de privacidad (`get_privacy_policy_url()`) y que bajo cada formulario se muestre la información básica (responsable, finalidad, legitimación, derechos). Afecta a contacto, inscripción, alta de socio y newsletter.
- **Caducidad de avisos (auditoría #12)**: fecha de expiración en los avisos para que dejen de salir en «Actualidad y Avisos» al caducar. El tema solo ajustaría la Query de `home-avisos` si el plugin expone un parámetro o una taxonomía/estado.

## Contenido y configuración (junta / administración del sitio)
Hallazgos de la auditoría que no son código. Sin esto, la 014 no sirve de nada.
- **Urgente** — crear la página «Hazte socio» con el pattern `afa-poveda/hazte-socio-page` en el slug que se decida en la 014 (#1).
- **Urgente** — publicar Aviso legal, Política de privacidad y Política de cookies (esta última declarando Clarity) y marcar la de privacidad en Ajustes → Privacidad (#2, #3, #4).
- Volver a subir los medios de `/uploads/2026/04` y `/05` (migración incompleta) (#10).
- Despublicar o mover a borrador los avisos caducados (junio, Semana Santa 2026, ludoteca dic. 2025) y publicar los del curso 2026/27 (#12).
- Consolidar las 2 páginas de contacto (`/contacto-afa/`, `/ampa-3/contacto/`) y las 2 de extraescolares, con 301; quitar «Trueque» del menú (#17).
- Unificar «AMPA» → «AFA» en títulos, autor «Junta Ampa…» y slugs (`/ampa-3/`, `/servicios-del-ampa/`, `/2026/05/8622/`, slugs con emojis), con 301 (#18).
- Pasar los enlaces del menú de `http://` a relativos o `https://` (#22).
- Metadatos SEO: descripción del sitio, imagen OG y título sin el nombre repetido. No hay Yoast ni Rank Math; valorar el módulo SEO de Jetpack (ya instalado) antes de añadir otro plugin (#21).
- Redes sociales: URLs reales de Instagram y Facebook o confirmar que no hay (#16, enlaza con «Deuda»).
- Usuarios: 2FA para los 7, logins distintos del nombre público, revisar quién necesita cuenta (#8, #9).
- WPVR (tours virtuales): desinstalar si no se usa (#15).
- Activar la protección de fuerza bruta de Jetpack Protect (ya instalado) en `wp-login.php` y verificar el límite de intentos (#9).

## Servidor y hosting (fuera del tema y del plugin)
- Cabeceras: `Content-Security-Policy` básica con `frame-ancestors 'self'`, `X-Content-Type-Options: nosniff`, `Referrer-Policy: strict-origin-when-cross-origin` (#13).
- Ocultar `Server` y `X-Powered-By`; bloquear `readme.html` y los `readme.txt` de plugins; si producción usa Apache 2.4.43, actualizarlo (#14).
- Staging: no dejar el live link de Local abierto; si hace falta, con contraseña y `noindex`, y sin Clarity (#7).
- Pasar WPScan contra producción (versiones de plugins no verificadas en la auditoría).

## Fuera de alcance (decidido)
- Pagos de cuota online: se mantiene lo de la 006 (cobro por email, lo gestiona la junta).
- Organigrama dinámico: tema 003 sigue con pattern editable hasta `plugin-012`.

## Orden recomendado
Hecho en la rama `backlog-auto-2026-10-27`: 012 → 009 → 011 → 010 → 008 → 013.

Siguiente tanda (auditoría 28/10/2026): primero las dos tareas urgentes de contenido (página Hazte socio y páginas legales) y la petición de consentimiento de cookies al plugin; en paralelo **014** → **015** → **016**.
