# Guía de pruebas — rama `backlog-auto-2026-10-27`

Specs cerradas en esta rama: **012, 009, 011, 010, 008, 013** (un commit por spec). Todas se probaron en una copia aislada de la base de datos de Local con datos temporales «ZZ» ya borrados; **falta tu revisión visual en el sitio real**.

## Cómo ejecutar las comprobaciones

El tema no tiene tests automáticos (ni `composer.json` ni `phpunit.xml`); la verificación es la de la constitución (VIII):

```bash
cd "wp-content/themes/afa-poveda"
python3 -m json.tool theme.json > /dev/null
for f in styles/sections/*.json; do python3 -m json.tool "$f" > /dev/null; done
php -l functions.php; for f in patterns/*.php; do php -l "$f"; done
```

Después, a mano:

1. Con **Local arrancado**, abre cada URL de abajo.
2. Si un pattern nuevo no aparece en el editor, limpia la caché de patterns (con `WP_DEBUG` desactivado WordPress la guarda): guardar un cambio en cualquier archivo de `patterns/` o ejecutar `wp eval 'wp_get_theme()->delete_pattern_cache();'`.
3. Abre cada plantilla/pattern nuevo en **Apariencia → Editor** y comprueba que **ningún bloque aparece como «no válido»** (no se pudo automatizar).
4. Revisa a 390, 900 y 1280 px (DevTools). Las capturas de 390 px que se hicieron en el entorno automático son aproximadas.

> Nota: Local arrancó con el tema de esta rama activa; si prefieres ver el sitio como estaba, cambia a `main` (`git checkout main`).

---

## 012 · Plantillas del CPT Servicios — [spec](../specs/012-plantillas-cpt-servicios/spec.md)

- [ ] Abre un servicio publicado (tipo Servicio) con imagen destacada, precios, FAQ y documentos → hero a ancho completo, columna 65/35 (inscripción azul + documentación a la derecha), FAQ en acordeón, indicadores.
- [ ] Abre un servicio **sin** datos → sin tarjetas, sin títulos huérfanos, sin columna lateral vacía.
- [ ] En la página «Servicios», sustituye el pattern «Servicios — Rejilla de fichas» por **«Servicios — Rejilla desde contenido»** → una ficha por servicio, «Ver más» con nombre accesible «Ver más: <título>».
- [ ] Desactiva el plugin → el listado dinámico muestra «Aún no hay servicios publicados.» (no noticias).
- [ ] El menú «Servicios» queda activo en el listado y en cada ficha.

**Decisiones sin ti:** el texto principal sale del contenido libre del servicio; los bloques de inscripción/FAQ/documentos van **en la plantilla** (no los inserte también en el contenido o saldrán duplicados); la píldora de categoría es de un solo color (el diseño usa un color por categoría); sin imagen, el hero usa fondo `primary`.

## 009 · Extraescolares: archivo y ficha — [spec](../specs/009-extraescolares-archivo-ficha/spec.md)

- [ ] `/extraescolares/` → H1, filtro (buscar/categoría/curso), fichas 3×N con categoría, días/horario, cursos y precios, banner «¿Tienes dudas…?».
- [ ] Filtra por una categoría y por texto sin resultados → mensaje «No hay actividades…» y «Quitar filtros».
- [ ] Abre una ficha completa → «← Volver», hero con chips, «Sobre la actividad», Horarios y Ubicación, Requisitos, precios y aviso «¿Aún no eres socio?».
- [ ] Ficha con inscripción cerrada → «Inscripción cerrada» en vez del botón.
- [ ] El menú «Extraescolares» queda activo (y «Noticias» **no**).
- [ ] Revisa a 390 px: imagen sobre el texto del hero, todo en una columna.

**Decisiones sin ti:** adaptación móvil inventada (no hay mock); píldora de categoría de un solo color; requisitos con check genérico; textos y destinos del banner editables (`/servicios/`, `/contacto/`, `/hazte-socio/` — confírmalos).

## 011 · Estilos de formularios — [spec](../specs/011-estilos-formularios/spec.md)

- [ ] Página con plantilla **«Formulario (inscripción, alta…)»** y el bloque de inscripción → tracker de pasos, título de paso con barra azul, grupos en tarjeta, opciones tipo tarjeta, botón.
- [ ] **Envía de verdad** el formulario con errores → resumen rojo, campos con borde y mensaje con ⚠.
- [ ] Envía correctamente → panel de éxito con check, título y botones.
- [ ] Contacto, alta de socio (en Hazte socio) y newsletter (`Suscripción a noticias (con formulario)`) se ven coherentes; newsletter en una fila ≥ 640 px.
- [ ] Si usas el formulario nativo de MailPoet, comprueba campos y botón.

**Decisiones sin ti:** el tracker no lleva iconos por paso; error con hex `#b3261e`; la introducción de la página es un párrafo editable (no extracto); `.mailpoet_form` con el mismo aspecto básico.

## 010 · Contacto — [spec](../specs/010-contacto/spec.md)

- [ ] Asigna la plantilla **«Contacto»** a la página real → H1 con subrayado, formulario a la izquierda, «Información de contacto» a la derecha.
- [ ] Envía un mensaje y comprueba que llega (Mailpit/buzón).
- [ ] Revisa dirección, email, horario y vocalías (son editables en el pattern).
- [ ] Con el plugin desactivado → texto provisional con el email.

**Decisiones sin ti:** se usa la dirección del pie (Calle de Alfonso XII, 58) y no la del Figma de Contacto (Avenida Alfonso XIII, 23); horario y vocalías son los del Figma como ejemplo; sin mapa.

## 008 · Calendario escolar y detalle de evento — [spec](../specs/008-calendario-evento/spec.md)

- [ ] Página con plantilla **«Calendario escolar»** → calendario mensual con navegación ‹ ›, «Hoy», eventos enlazados, «Próximos eventos», tarjeta «Destacado» y botón de PDF (si hay PDF).
- [ ] Un evento individual → plantilla nativa de TEC con tipografía y enlaces del tema.
- [ ] En el contenido de un evento inserta el pattern **«Evento — Contenido de la ficha»** (¿Qué nos espera? + detalles clave).
- [ ] Revisa con eventos de varias categorías (colores del plugin) a 390 px.

**Decisiones sin ti:** TEC ignora una plantilla `single-tribe_events.html` del tema, así que **el hero con foto del Figma no está hecho** (petición anotada en `BACKLOG.md`); eventos en el calendario con texto, no solo barras de color; sin botón «Compartir evento».

## 013 · Estilos del configurador de semana — [spec](../specs/013-configurador-semana/spec.md)

- [ ] Página con plantilla **«Configurador de semana»** y el bloque `configurador-semana` → filtro, tabla de franjas, nota, «Calcular», resumen oscuro, aviso de cuotas.
- [ ] Elige actividades en varias celdas → resumen con lista y cuota; prueba un error (celda con borde y mensaje) y la franja B bloqueada.
- [ ] «Continuar a la inscripción» lleva a la inscripción con las actividades.
- [ ] A 390 px la tabla hace scroll dentro de su caja, sin desbordar la página.

**Decisiones sin ti:** se viste el marcado del plugin (selectores por celda), no el arrastrar y soltar del Figma; **sin barra de resumen fija en móvil** (accesibilidad); el aviso de cuotas es texto editable.

---

## Cómo integrar la rama

```bash
cd "wp-content/themes/afa-poveda"
git checkout main
git merge --no-ff backlog-auto-2026-10-27
```

No se ha hecho push de nada. La rama contiene también `BACKLOG.md` (estaba sin versionar) con las specs movidas a «Hecho».
