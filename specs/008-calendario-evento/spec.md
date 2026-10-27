# Feature Specification: Calendario escolar y detalle de evento

**Feature Branch**: `008-calendario-evento`

**Created**: 2026-10-27

**Status**: Hecha parcialmente (calendario completo; hero de evento pendiente de petición al plugin)

**Input**: Backlog 008 — estilizar el calendario escolar (mensual + próximos) y el detalle de evento sobre **The Events Calendar** (decisión: se reutiliza) y los bloques del plugin (plugin-009 ✅, contrato §13 v1.9.0). La 004 lo excluyó expresamente.

**Fuente de diseño**: Figma `AFA` (`lS6WwjiFrPKd60cQTfXrKF`): `Calendario Escolar` `18:644`, `Calendario mobile` `18:1889`, `detalle evento` `19:2095`, `detalle evento mobile` `19:2253`.

**Fuente de datos**: [contrato §13](../../../../plugins/afa-padre-poveda-core/docs/contrato-tema.md): bloques `afa-padre-poveda/eventos-calendario`, `eventos-proximos`, `evento-detalles`, `evento-etiqueta`, `eventos-pdf`; variable `--afa-core-evento-color`. Requieren The Events Calendar; sin él no pintan nada.

## Clarifications

### Session 2026-10-27 (decisiones tomadas sin la persona responsable, revisar)

- Q: ¿Plantilla propia de evento (`single-tribe_events`) o estilizar la de TEC? → A: Se comprobó que TEC impone su propia plantilla de evento en temas de bloques e ignora `single-tribe_events.html` (ni con el ajuste «Plantilla de página predeterminada»). Se estiliza la plantilla nativa de TEC (decisión del backlog) y se ofrece un pattern `evento-contenido` («¿Qué nos espera?» + bloque de detalles) para pegar en el contenido del evento. El hero con foto de Figma queda como **petición al plugin** (ver BACKLOG).
- Q: ¿El calendario muestra los eventos como barras de color (Figma) o con texto? → A: Con el título del evento en una etiqueta con borde de color (accesible, color no es el único canal); en móvil solo la marca de color y el nombre queda para lectores de pantalla.
- Q: ¿Qué contiene la columna lateral? → A: Próximos eventos (bloque), una tarjeta «Destacado» editable y el botón de calendario PDF (bloque, solo aparece si el plugin tiene PDF configurado).
- Q: ¿Colores por categoría (festivos, reuniones…)? → A: Los pone el plugin con `--afa-core-evento-color` (presets del tema); el tema los consume y no mantiene un mapa propio.
- Q: ¿Móvil? → A: Una columna; calendario primero, lateral después; celdas más bajas.
- Q: ¿Botón «Compartir evento» del Figma? → A: No se implementa (requeriría JS/terceros); queda fuera de alcance.
- Q: ¿Vistas lista/mes nativas de TEC (`/events/`)? → A: Solo se alinean colores y tipografía con variables CSS de TEC; el diseño de Figma se obtiene con la página «Calendario escolar».

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Ver el calendario escolar (P1)

1. **Given** una página con la plantilla «Calendario escolar», **When** se abre en escritorio, **Then** se ve el H1, la introducción, el calendario del mes con navegación anterior/siguiente a la izquierda y «Próximos eventos» + tarjeta destacada a la derecha.
2. **Given** un evento en un día, **When** se muestra el mes, **Then** el día muestra el evento enlazado, el día actual se destaca con «Hoy» y los fines de semana se distinguen.
3. **Given** móvil, **When** se abre, **Then** calendario y lateral se apilan sin desbordes.
4. **Given** el plugin o TEC desactivados, **When** se abre, **Then** aparece un aviso y no hay errores.

### User Story 2 - Leer el detalle de un evento (P1)

1. **Given** un evento publicado, **When** se abre, **Then** se ve con tipografía, enlaces y tarjeta de metadatos del tema (plantilla de TEC estilizada), y el contenido puede incluir el bloque «Detalles clave».

### User Story 3 - Elegir qué ver en la lista de próximos (P2)

El bloque de próximos eventos muestra fecha, título, hora, lugar y «Ver más» con aspecto de tarjeta; sin eventos muestra el mensaje del plugin.

### Edge Cases

- Mes sin eventos; mes con muchos eventos en un día (la celda recorta y los enlaces siguen accesibles por teclado).
- Título largo: no desborda la celda ni la tarjeta.
- Evento de día completo / sin hora: lo resuelve el bloque.

## Requirements *(mandatory)*

- **FR-001**: `templates/page-calendario.html` MUST registrarse en `customTemplates` y mostrar H1, introducción, columna principal (pattern `calendario-mes`) y lateral (pattern `calendario-lateral`), `main#contenido`.
- **FR-002**: El tema MUST estilizar `afa-core-calendario*`, `afa-core-eventos*`, `afa-core-evento-detalles*`, `afa-core-evento-etiqueta`, `afa-core-eventos-pdf*` con presets (un hex documentado para fin de semana).
- **FR-003**: Los controles de navegación del calendario MUST medir ≥ 44 px y tener foco visible; el día actual MUST distinguirse además del color (texto «Hoy» + contorno).
- **FR-004**: Los patterns MUST funcionar sin el plugin (aviso o bloque omitido).
- **FR-005**: El tema MUST alinear con variables CSS las vistas nativas de TEC y estilizar la ficha nativa del evento; MUST NOT registrar CPT ni sobrescribir plantillas de TEC por PHP.
- **FR-006**: El pattern `evento-contenido` MUST ofrecer «¿Qué nos espera?» + `evento-detalles` solo con el plugin activo.
- **FR-007**: Contraste ≥ 4,5:1 calculado, 0 desbordes a 390 px.

## Success Criteria

- **SC-001**: La página de calendario coincide con Figma 18:644 en estructura a 1280 px y se adapta a 390 px.
- **SC-002**: Sin plugin o sin TEC: 0 errores PHP.
- **SC-003**: Contraste ≥ 4,5:1 en todo texto nuevo.

## Assumptions

- Los eventos, categorías y colores los gestiona TEC/plugin; el tema solo presenta.
- La integración de un hero con foto y columna de detalles en el evento individual depende de una petición al plugin.
