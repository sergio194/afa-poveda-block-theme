# Feature Specification: Accesibilidad WCAG AA del tema

**Feature Branch**: `007-accesibilidad-aa`

**Created**: 2026-09-20

**Status**: Implementada (validación visual Tab/zoom en Local recomendada)

**Input**: User description: «ahora quiero validar e implementar que el tema tenga AA en accesibilidad»

**Referencia de cumplimiento**: WCAG 2.2 nivel AA (alineado con la constitución del proyecto, principio V).

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Percibir el contenido con contraste suficiente (Priority: P1)

Como visitante con baja visión o que lee en pantalla al sol, quiero que textos, iconos informativos y controles tengan contraste suficiente, para poder leer y operar la web sin adivinar.

**Why this priority**: El contraste es el fallo AA más frecuente en sitios con diseño de marca; ya hubo correcciones puntuales en specs anteriores y hace falta una pasada completa y verificable.

**Independent Test**: Recorrer portada, Sobre nosotros, Actualidad, Servicios, Hazte socio, cabecera y pie; comprobar cada par texto/fondo y control/borde con herramienta de contraste (no a ojo).

**Acceptance Scenarios**:

1. **Given** texto normal (menor de ~18 px / 14 px negrita), **When** se mide el contraste frente a su fondo, **Then** el ratio es ≥ 4,5:1.
2. **Given** texto grande o controles/bordes no textuales que delimitan componentes, **When** se mide, **Then** el ratio es ≥ 3:1.
3. **Given** un texto con opacidad o sobre imagen/vídeo, **When** se evalúa el contraste efectivo, **Then** sigue cumpliendo los umbrales anteriores (sin «parecer» legible a ojo).
4. **Given** un par que falle, **When** se corrige en el sistema de diseño o en la presentación afectada, **Then** la corrección se documenta (valor anterior → valor nuevo → ratio) y no introduce regresiones visuales graves respecto a Figma.

---

### User Story 2 - Navegar solo con teclado (Priority: P1)

Como persona que no usa ratón (movilidad reducida, preferencia, lector de pantalla), quiero recorrer todos los enlaces, botones, menús y controles con teclado y ver siempre dónde está el foco, para usar la web de punta a punta.

**Why this priority**: Sin teclado usable la web queda inaccesible para un grupo amplio; es criterio AA obligatorio y transversal a todas las páginas.

**Independent Test**: En escritorio, recorrer con Tab / Shift+Tab / Enter / Escape / flechas (donde aplique) cabecera (incl. menú móvil), buscador, CTAs, listados, detalle, acordeones/FAQ si existen, pie y formularios envueltos por el tema.

**Acceptance Scenarios**:

1. **Given** la página cargada, **When** avanzo con Tab, **Then** el orden de foco sigue el orden visual lógico y no hay trampas de foco.
2. **Given** cualquier control interactivo del tema, **When** recibe el foco, **Then** hay un indicador visible inequívoco (no solo cambio de color sutil).
3. **Given** el menú en vista estrecha, **When** lo abro y cierro con teclado, **Then** puedo llegar a todos los ítems y cerrar sin ratón; el foco no se pierde fuera de la zona útil.
4. **Given** un enlace «saltar al contenido» (o equivalente), **When** lo activo al inicio del recorrido, **Then** llego al contenido principal sin pasar de nuevo por toda la cabecera.

---

### User Story 3 - Entender la página con lector de pantalla (Priority: P1)

Como usuaria de lector de pantalla, quiero una estructura clara (regiones, encabezados, nombres de controles e imágenes), para orientarme y completar las mismas tareas que una persona vidente.

**Why this priority**: Cumple AA de estructura y nombres accesibles; evita páginas «decorativas» que no anuncian nada útil.

**Independent Test**: Con lector de pantalla (o inspección de árbol de accesibilidad), recorrer al menos portada, una página interior, un listado, un detalle y Hazte socio; comprobar H1 único, jerarquía, landmarks y etiquetas.

**Acceptance Scenarios**:

1. **Given** cualquier plantilla pública del tema, **When** se anuncia la página, **Then** hay un único H1 significativo y la jerarquía de encabezados no salta niveles de forma confusa.
2. **Given** regiones principales (cabecera, navegación, contenido, pie), **When** se navega por landmarks, **Then** están identificadas de forma coherente en todas las plantillas.
3. **Given** un icono o imagen decorativa, **When** el lector la encuentra, **Then** no la anuncia (o se presenta como decorativa); si el icono transmite información o es control, tiene nombre accesible.
4. **Given** enlaces y botones del tema, **When** se anuncian, **Then** su propósito se entiende fuera de contexto (evitar «clic aquí» / «saber más» repetidos sin contexto diferenciable cuando hay varios en la misma vista).

---

### User Story 4 - Validar y corregir de forma trazable (Priority: P2)

Como responsable de la web / junta, quiero un inventario de hallazgos AA del tema, con estado corregido o aceptado con motivo, para saber que «cumplimos AA» no es una afirmación a ojo.

**Why this priority**: La petición pide validar e implementar; sin evidencia el cumplimiento no es demostrable ante la comunidad ni ante revisiones futuras.

**Independent Test**: Abrir el informe de auditoría de la feature; verificar que cada criterio AA aplicable al alcance tiene resultado (pasa / falla / no aplica) y que los fallos del tema tienen corrección o desviación documentada.

**Acceptance Scenarios**:

1. **Given** el alcance definido (superficie pública del tema), **When** termina la validación, **Then** existe un informe con fecha, páginas/plantillas revisadas y resultado por criterio relevante.
2. **Given** un fallo atribuible al tema, **When** se cierra la feature, **Then** está corregido o documentado como desviación justificada (p. ej. conflicto temporal con Figma) con plan o aceptación explícita.
3. **Given** un fallo atribuible a plugin o a contenido editorial puntual, **When** se clasifica, **Then** queda fuera del «cumplimiento del tema» pero listado como dependencia/recomendación para la junta.

---

### Edge Cases

- Overlay sobre imagen (heroes, covers): el texto debe cumplir contraste en el peor punto visible, no solo sobre el color sólido del mock.
- Estados hover/focus/active/disabled: el contraste y el foco visible deben mantenerse en esos estados.
- Menú abierto en móvil + teclado: Escape o control equivalente cierra; el foco vuelve a un sitio predecible.
- Formularios de plugins (newsletter, alta de socio, contacto): el tema no «certifica» el plugin; sí debe asegurar que la envoltura visual (etiquetas visibles, contraste de campos estilizados por el tema, foco) no empeore la accesibilidad del control.
- Contenido añadido después por voluntarios (contraste de imagen sin overlay, H2 saltados): el tema aporta defaults y patterns correctos; la guía breve para editoras es parte del entregable de validación, no un bloqueo de la feature.
- Reducción de movimiento: animaciones no esenciales del tema respetan la preferencia del sistema de «reducir movimiento» cuando existan animaciones propias.
- Zoom hasta 200 %: el contenido sigue usable sin pérdida de información ni solapes críticos en anchos de referencia.
- Idioma de la página: el idioma principal anunciado coincide con el contenido (español).

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: El tema MUST cumplir WCAG 2.2 nivel AA en toda su superficie pública: plantillas, partes (cabecera, pie, barra lateral) y patterns de presentación.
- **FR-002**: Todos los pares de color de texto normal MUST alcanzar contraste ≥ 4,5:1; texto grande y componentes gráficos esenciales (bordes/indicadores de control) ≥ 3:1, verificados con cálculo.
- **FR-003**: MUST prohibirse (y corregirse donde exista) el uso de opacidad sobre texto que reduzca el contraste por debajo de AA; preferir color sólido equivalente.
- **FR-004**: Todos los elementos interactivos aportados o estilizados por el tema MUST ser operablees solo con teclado y MUST mostrar foco visible.
- **FR-005**: MUST existir un mecanismo para saltar al contenido principal al inicio de cada vista pública.
- **FR-006**: Cada vista pública MUST tener un único encabezado de nivel 1 significativo y una jerarquía de encabezados coherente.
- **FR-007**: Iconos e imágenes decorativas MUST no interferir con lectores de pantalla; iconos/controles con significado MUST tener nombre accesible.
- **FR-008**: Enlaces y botones del tema MUST tener propósito comprensible; si varios CTAs genéricos comparten etiqueta visible, MUST distinguirse por contexto accesible.
- **FR-009**: MUST realizarse una auditoría de validación documentada sobre las páginas/plantillas representativas (como mínimo: portada, sobre nosotros, actualidad/listado y detalle, servicios/listado y detalle, hazte socio, 404 y búsqueda si existen).
- **FR-010**: Los hallazgos MUST clasificarse como: tema (obligatorio corregir en esta feature), plugin (fuera de implementación del tema) o editorial (recomendación).
- **FR-011**: Las correcciones del tema MUST preservarse en el sistema de diseño cuando el fallo sea de token/estilo global; las desviaciones respecto a Figma por motivo de AA MUST anotarse en esta spec (tabla de refinamientos).
- **FR-012**: El alcance MUST excluir la UI de administración, el Editor del sitio como herramienta, y la lógica interna de plugins; el tema MUST no introducir barreras adicionales en las zonas donde solo envuelve presentación de plugins.
- **FR-013**: La preferencia de usuario «reducir movimiento» MUST respetarse para animaciones no esenciales propias del tema.
- **FR-014**: Con zoom de página al 200 %, las vistas de referencia MUST permanecer usables (sin pérdida de contenido ni controles inaccesibles).

### Key Entities

- **Criterio AA**: Requisito WCAG 2.2 nivel AA aplicable al alcance (perceptible, operable, comprensible, robusto en lo que afecta a presentación).
- **Hallazgo**: Incumplimiento detectado con ubicación (página/sección), severidad, clasificación (tema / plugin / editorial) y estado.
- **Par de contraste**: Combinación texto/fondo o control/borde medida con ratio documentado.
- **Superficie pública del tema**: Conjunto de plantillas, partes y patterns que ve una visitante sin iniciar sesión.
- **Desviación Figma por AA**: Decisión de diseño documentada donde se altera un mock para cumplir contraste u otro criterio AA.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: El 100 % de los pares de texto/fondo revisados en la auditoría de la superficie pública del tema cumplen los umbrales AA (4,5:1 o 3:1 según corresponda), o figuran como desviación aceptada con ratio y motivo.
- **SC-002**: En una pasada de teclado por las páginas del alcance, el 100 % de los controles del tema son alcanzables y muestran foco visible; cero trampas de foco.
- **SC-003**: En revisión con lector de pantalla (o árbol de accesibilidad equivalente) de las páginas del alcance, el 100 % tienen un solo H1 y landmarks principales identificables; cero iconos decorativos anunciados de forma engañosa.
- **SC-004**: Existe un informe de auditoría con fecha y resultado por criterio/hallazgo; el 100 % de hallazgos clasificados como «tema» están corregidos o documentados con aceptación explícita al cerrar la feature.
- **SC-005**: Una persona no técnica de la junta, con el informe en mano, puede afirmar en ≤ 15 minutos qué se validó, qué se corrigió y qué queda a cargo de plugins o de buenas prácticas editoriales.
- **SC-006**: Zoom al 200 % en anchos de referencia (al menos 390 y 1280 CSS px de partida) no impide completar las tareas principales (leer un artículo, abrir el menú, llegar a Hazte socio).

## Assumptions

- El nivel objetivo es **WCAG 2.2 AA**, no AAA ni certificación formal de terceros en esta fase.
- La validación es **interna y documentada** (manual + apoyo de herramientas de contraste/inspección); no se exige sello externo ni auditoría de consultora salvo que la junta lo pida después.
- El alcance es la **superficie pública del tema** ya implementada (specs 001–006 y plantillas base), no una página nueva de marketing.
- Los **plugins** (formularios, newsletter, etc.) quedan fuera del cumplimiento «del tema»; sí se listan barreras detectadas como dependencias.
- El contenido editorial futuro puede romper AA (p. ej. imagen sin contraste); el entregable incluye una **guía breve** (checklist) para voluntarias, no un sistema de bloqueo en el editor.
- Donde Figma y AA choquen, **gana AA** y se documenta la desviación (como ya ocurrió con opacidades y azules de botón en spec 001).
- No se requiere soporte de modos de alto contraste personalizados del sistema más allá de no romper estilos con transparencias abusivas; el cumplimiento se mide sobre la presentación por defecto del tema.
- Idioma principal del sitio: español.

## Out of Scope

- Certificación oficial WCAG / EN 301 549 por organismo externo.
- Remediación del código de plugins de terceros.
- Formación larga en accesibilidad para toda la junta (solo guía breve).
- Cumplimiento AAA.
- Apps nativas o PDFs enlazados desde el contenido.
- Pruebas con usuarios con discapacidad a gran escala (recomendable a futuro; no bloquea el cierre de esta feature si la auditoría documentada está completa).

## Refinamientos respecto a Figma

| # | En Figma / estado previo | En el tema (objetivo) | Motivo |
|---|---|---|---|
| R1 | Pares o opacidades que fallen AA | Tokens canónicos ya cumplen (≥ 4,5:1); sin cambio de hex | Constitución V; medido 2026-09-20 |
| R2 | Cover heroes dim ~50 % (primary) | dimRatio **85 %** (home + sobre) | Peor caso (foto blanca): 50 % → ~2,35:1; 85 % → ≥ 4,5:1 con texto `base` |
| R3 | Cover servicio dim 55 % (contrast) | dimRatio **65 %** | Peor caso: 55 % → ~3,87:1; 65 % → ≥ 4,5:1 |
| R4 | Sin skip link en mocks | Enlace «Saltar al contenido» → `#contenido` | WCAG 2.4.1; no está en Figma |
| R5 | CTAs «Ver más» / «Leer más» idénticos | Mismo label visible + `aria-label` con título | 2.4.4 sin alterar diseño |

## Pendiente de confirmar con la junta

- [ ] ¿Se desea, en una fase posterior, una auditoría externa con informe formal?
- [ ] ¿Quién mantiene la guía editorial de accesibilidad tras el cierre de esta feature?
