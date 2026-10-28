# Guía de pruebas — rama `backlog-auto-2026-10-28`

Specs cerradas en esta rama: **014, 015, 016** (auditoría del 28/10/2026, un commit por spec). Se probaron en una copia aislada de la base de datos de Local (tu BD no se ha tocado) con datos temporales «ZZ» ya borrados; **falta tu revisión en el sitio real y en un móvil**.

## Cómo ejecutar las comprobaciones

El tema no tiene tests automáticos (ni `composer.json` ni `phpunit.xml`); la verificación es la de la constitución (VIII):

```bash
cd "wp-content/themes/afa-poveda"
python3 -m json.tool theme.json > /dev/null
for f in styles/sections/*.json; do python3 -m json.tool "$f" > /dev/null; done
php -l functions.php; for f in patterns/*.php; do php -l "$f"; done
```

**Enlaces rotos** (nuevo, solo hace peticiones GET):

```bash
docs/comprobar-enlaces.sh http://localhost:10048 / /noticias/ /extraescolares/ /contacto-afa/ /hazte-socio-2/ /calendario-escolar/ /sobre-nosotros/ /servicios-del-ampa/
```

Hoy debe listar solo `/aviso-legal/`, `/privacidad/`, `/cookies/` (páginas sin crear) y 4 fichas de ejemplo de la página Servicios (ver 014). Pásalo también contra producción cuando se publique.

Después, a mano:

1. Con **Local arrancado**, abre cada URL de abajo.
2. Si un pattern o parte nueva no aparece en el editor, limpia la caché de patterns: `wp eval 'wp_get_theme()->delete_pattern_cache();'`.
3. Abre en **Apariencia → Editor** la Cabecera, la nueva parte **«Menú móvil»** y la plantilla de entrada: **ningún bloque «no válido»** (no se pudo automatizar; sí se comprobó que todo el marcado se analiza y reserializa sin diferencias).
4. Revisa a 390, 900 y 1280 px (DevTools y un móvil real).

---

## 014 · Enlaces internos y destinos — [spec](../specs/014-enlaces-internos/spec.md)

- [ ] Portada: «Hazte socio» (cabecera), «Hazte Socio Ahora» → `/hazte-socio-2/` **sin pasar por una redirección**.
- [ ] Portada: Comedor → `/servicios-del-ampa/comedor-escolar/`, Calendario → `/calendario-escolar/`, Voluntarios → `/sobre-nosotros/`, «Contactar con Vocalías» → `/contacto-afa/`. Ninguno da 404.
- [ ] Archivo de extraescolares: «Configura tu semana» → la página con plantilla «Configurador de semana».
- [ ] Prueba de editor: en una página de borrador elige la plantilla «Contacto» y publícala → el botón «Contactar con Vocalías» pasa a apuntar a la más reciente. Devuélvelo como estaba (despublica o quita la plantilla).
- [ ] Pie: solo se ve el icono de correo (Instagram y Facebook vuelven en cuanto pongas su URL en Editor → Pie).
- [ ] Una noticia: «Compartir noticia» con correo, WhatsApp y Facebook que llevan la URL de esa noticia.
- [ ] Página con el pattern de comedor/documentos: los «Descargar» sin archivo salen en gris y sin enlace.
- [ ] Portada: la sección «Actualidad y Avisos» ya no tiene «Ver todo» (el archivo se abre desde «Ver noticias»).

**Decisiones sin ti (revisar):**
- **Los botones van a la página que tenga asignada la plantilla del tema** (Hazte Socio, Contacto, Calendario escolar, AFA, Servicios, Configurador), no a un slug. Si hay dos páginas con la misma plantilla, gana la que esté en la ruta «bonita» (`/hazte-socio/`…) y si no, **la más reciente**: ojo al crear borradores con esas plantillas y publicarlos.
- Slugs recomendados si hacéis limpieza (#18): `/hazte-socio/`, `/contacto/`, `/calendario/`, `/afa/`, `/servicios/`, `/configurador/` (las 301 de los viejos las da WordPress o el hosting).
- Se quitó «Ver todo» de Avisos (desviación de Figma): duplicaba «Ver noticias» y no existe una categoría «avisos».
- Los enlaces `#` (marcadores de los patterns) no se pintan como enlace en la web; en el editor siguen ahí para sustituirlos.
- Privacidad apunta a la página de **Ajustes → Privacidad** en cuanto esté publicada (hoy está en borrador). Aviso legal y Cookies siguen en `/aviso-legal/` y `/cookies/`: hay que crearlas.

## 015 · Tarjetas robustas ante imagen rota y textos largos — [spec](../specs/015-tarjetas-robustas/spec.md)

- [ ] Crea una entrada «ZZ prueba» **fijada**, con imagen destacada, y borra el archivo de esa imagen en `wp-content/uploads` (o usa una de 2026/04 si sigue faltando). Pon un título con una palabra muy larga sin espacios.
- [ ] Portada a 1280 y 390 px: la tarjeta «Destacado» mantiene su forma 16:9 con un fondo azul claro; no se ve el texto alternativo ni un icono roto encima de «Destacado».
- [ ] Las tarjetas laterales de Avisos: el texto queda dentro de la tarjeta y el extracto ocupa como mucho 3 líneas.
- [ ] `/noticias/` y la ficha de la entrada: mismo marcador en lugar de la imagen; los extractos se cortan limpios (sin media línea asomando).
- [ ] **Safari** (Mac/iPhone): el marcador se ve, pero puede aparecer el icono pequeño de imagen rota (Safari no permite taparlo sin JS).
- [ ] Borra la entrada de prueba.

**Decisiones sin ti (revisar):** en lugar de una imagen rota se ve el degradado de marcador de extraescolares/servicios; el texto alternativo no se pinta (lo siguen leyendo los lectores de pantalla); los títulos largos se parten y se ven enteros (solo se recortan los extractos).

## 016 · Menú móvil — [spec](../specs/016-menu-movil/spec.md)

- [ ] Móvil (390 px): pulsa la hamburguesa → cajón desde la izquierda con logo, aspa de cerrar, **«Hazte socio»** a todo el ancho, 7 entradas alineadas a la izquierda y buscador; el resto de la página queda atenuado.
- [ ] Pulsa la flecha de AFA → se despliega solo AFA; pulsa la de Extraescolares → AFA se cierra. El texto «AFA» sigue llevando a su página.
- [ ] La página actual sale en azul (con fondo en el ítem actual).
- [ ] Con teclado (tablet o ventana de 900 px): Tab no sale del cajón; Escape lo cierra y el foco vuelve a la hamburguesa.
- [ ] Menú largo: el cajón hace scroll por dentro.
- [ ] Escritorio (1280 px): la cabecera está igual que antes.
- [ ] Apariencia → Editor → Partes → «Menú móvil»: se puede editar (p. ej. cambiar el texto del botón) y el cambio se ve en el móvil.

**Decisiones sin ti (revisar):**
- El cajón es una **parte de plantilla nueva («Menú móvil»)** que WordPress 7.1 permite usar como overlay de la navegación; el menú es el mismo de la cabecera.
- Se añadieron «Hazte socio» y el buscador (no están en Figma) porque en móvil la cabecera los oculta.
- **Sin iconos por enlace** como en Figma: el bloque de enlace de navegación no los admite y el menú lo edita la junta.
- Los submenús son acordeones de uno en uno; para conseguirlo sin JS propio, el tema ajusta al pintar el estado que core da a cada submenú del cajón.

---

## Sesión anterior (rama `backlog-auto-2026-10-27`, ya integrada en `main`)

Se conserva para quien no la haya probado aún.

### 012 · Plantillas del CPT Servicios — [spec](../specs/012-plantillas-cpt-servicios/spec.md)

- [ ] Abre un servicio publicado (tipo Servicio) con imagen destacada, precios, FAQ y documentos → hero a ancho completo, columna 65/35 (inscripción azul + documentación a la derecha), FAQ en acordeón, indicadores.
- [ ] Abre un servicio **sin** datos → sin tarjetas, sin títulos huérfanos, sin columna lateral vacía.
- [ ] En la página «Servicios», sustituye el pattern «Servicios — Rejilla de fichas» por **«Servicios — Rejilla desde contenido»** → una ficha por servicio, «Ver más» con nombre accesible «Ver más: <título>».
- [ ] Desactiva el plugin → el listado dinámico muestra «Aún no hay servicios publicados.» (no noticias).
- [ ] El menú «Servicios» queda activo en el listado y en cada ficha.

**Decisiones sin ti:** el texto principal sale del contenido libre del servicio; los bloques de inscripción/FAQ/documentos van **en la plantilla** (no los inserte también en el contenido o saldrán duplicados); la píldora de categoría es de un solo color (el diseño usa un color por categoría); sin imagen, el hero usa fondo `primary`.

### 009 · Extraescolares: archivo y ficha — [spec](../specs/009-extraescolares-archivo-ficha/spec.md)

- [ ] `/extraescolares/` → H1, filtro (buscar/categoría/curso), fichas 3×N con categoría, días/horario, cursos y precios, banner «¿Tienes dudas…?».
- [ ] Filtra por una categoría y por texto sin resultados → mensaje «No hay actividades…» y «Quitar filtros».
- [ ] Abre una ficha completa → «← Volver», hero con chips, «Sobre la actividad», Horarios y Ubicación, Requisitos, precios y aviso «¿Aún no eres socio?».
- [ ] Ficha con inscripción cerrada → «Inscripción cerrada» en vez del botón.
- [ ] El menú «Extraescolares» queda activo (y «Noticias» **no**).
- [ ] Revisa a 390 px: imagen sobre el texto del hero, todo en una columna.

**Decisiones sin ti:** adaptación móvil inventada (no hay mock); píldora de categoría de un solo color; requisitos con check genérico; textos y destinos del banner editables (`/servicios/`, `/contacto/`, `/hazte-socio/` — confírmalos).

### 011 · Estilos de formularios — [spec](../specs/011-estilos-formularios/spec.md)

- [ ] Página con plantilla **«Formulario (inscripción, alta…)»** y el bloque de inscripción → tracker de pasos, título de paso con barra azul, grupos en tarjeta, opciones tipo tarjeta, botón.
- [ ] **Envía de verdad** el formulario con errores → resumen rojo, campos con borde y mensaje con ⚠.
- [ ] Envía correctamente → panel de éxito con check, título y botones.
- [ ] Contacto, alta de socio (en Hazte socio) y newsletter (`Suscripción a noticias (con formulario)`) se ven coherentes; newsletter en una fila ≥ 640 px.
- [ ] Si usas el formulario nativo de MailPoet, comprueba campos y botón.

**Decisiones sin ti:** el tracker no lleva iconos por paso; error con hex `#b3261e`; la introducción de la página es un párrafo editable (no extracto); `.mailpoet_form` con el mismo aspecto básico.

### 010 · Contacto — [spec](../specs/010-contacto/spec.md)

- [ ] Asigna la plantilla **«Contacto»** a la página real → H1 con subrayado, formulario a la izquierda, «Información de contacto» a la derecha.
- [ ] Envía un mensaje y comprueba que llega (Mailpit/buzón).
- [ ] Revisa dirección, email, horario y vocalías (son editables en el pattern).
- [ ] Con el plugin desactivado → texto provisional con el email.

**Decisiones sin ti:** se usa la dirección del pie (Calle de Alfonso XII, 58) y no la del Figma de Contacto (Avenida Alfonso XIII, 23); horario y vocalías son los del Figma como ejemplo; sin mapa.

### 008 · Calendario escolar y detalle de evento — [spec](../specs/008-calendario-evento/spec.md)

- [ ] Página con plantilla **«Calendario escolar»** → calendario mensual con navegación ‹ ›, «Hoy», eventos enlazados, «Próximos eventos», tarjeta «Destacado» y botón de PDF (si hay PDF).
- [ ] Un evento individual → plantilla nativa de TEC con tipografía y enlaces del tema.
- [ ] En el contenido de un evento inserta el pattern **«Evento — Contenido de la ficha»** (¿Qué nos espera? + detalles clave).
- [ ] Revisa con eventos de varias categorías (colores del plugin) a 390 px.

**Decisiones sin ti:** TEC ignora una plantilla `single-tribe_events.html` del tema, así que **el hero con foto del Figma no está hecho** (petición anotada en `BACKLOG.md`); eventos en el calendario con texto, no solo barras de color; sin botón «Compartir evento».

### 013 · Estilos del configurador de semana — [spec](../specs/013-configurador-semana/spec.md)

- [ ] Página con plantilla **«Configurador de semana»** y el bloque `configurador-semana` → filtro, tabla de franjas, nota, «Calcular», resumen oscuro, aviso de cuotas.
- [ ] Elige actividades en varias celdas → resumen con lista y cuota; prueba un error (celda con borde y mensaje) y la franja B bloqueada.
- [ ] «Continuar a la inscripción» lleva a la inscripción con las actividades.
- [ ] Panel «Actividades» (plugin ≥ 1.11.0): a la izquierda en escritorio, arriba en móvil; filtros de duración, día (L–V) y horario; arrastra una tarjeta a una casilla o pulsa «Añadir»; la casilla toma color por categoría.
- [ ] A 390 px solo se ve la columna del día activo y los botones L–V funcionan como pestañas.
- [ ] Con un curso elegido, las actividades de otros cursos desaparecen de las casillas y aparece el aviso de las quitadas.
- [ ] Los selectores por celda siguen funcionando sin arrastrar (teclado).
- [ ] A 390 px la tabla hace scroll dentro de su caja, sin desbordar la página.

**Decisiones sin ti:** se viste el marcado del plugin (selectores por celda), no el arrastrar y soltar del Figma; **sin barra de resumen fija en móvil** (accesibilidad); el aviso de cuotas es texto editable.

---

## Cómo integrar la rama

```bash
cd "wp-content/themes/afa-poveda"
git checkout main
git merge --no-ff backlog-auto-2026-10-28
```

No se ha hecho push de nada. Si prefieres revisar antes en Local, deja la rama activa (`git checkout backlog-auto-2026-10-28`): el tema vivo de Local lee los archivos de la rama actual.
