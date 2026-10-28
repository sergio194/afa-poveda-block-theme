# Feature Specification: Menú móvil

**Feature Branch**: `016-menu-movil` (implementada en `backlog-auto-2026-10-28`)

**Created**: 2026-10-28

**Status**: Hecha (pendiente probar en móvil real y en el Editor del sitio)

**Input**: Backlog 016 — [auditoría del 28/10/2026](../../Auditoria_web_AFA_Padre_Poveda.pdf) #19: «El menú móvil está totalmente desplegado y alineado a la derecha, sin jerarquía visual. "Hazte socio" queda enterrado».

**Fuente de diseño**: Figma `AFA` (`lS6WwjiFrPKd60cQTfXrKF`), `MENU` `1:1592` (390×644): cajón lateral izquierdo de 320 px, fondo `surface-container`, logo arriba con separador, enlaces alineados a la izquierda con icono, activo en `primary`.

## Diagnóstico

- El overlay por defecto de `core/navigation` hereda `justifyContent: right` de la cabecera: todo alineado a la derecha y a pantalla completa.
- En el overlay, core muestra todos los submenús abiertos (su estado `isSubmenuOpen` es verdadero mientras el overlay está abierto): 20 enlaces seguidos sin jerarquía.
- Por debajo de 600 px el botón «Hazte socio» de la cabecera se oculta (`.afa-header__actions`), así que en móvil solo quedaba dentro del submenú AFA, como «Hazte Socia/o».

## Clarifications

### Session 2026-10-28 (decisiones tomadas sin la persona responsable, revisar)

- Q: ¿Cómo hacer el cajón sin JS? → A: Con la función de WordPress 7.1 de **overlay como parte de plantilla** (área `navigation-overlay`): nueva parte «Menú móvil» (`parts/menu-movil.html`) que la navegación de la cabecera usa como overlay. Así el cajón es editable desde el Editor del sitio (constitución IV).
- Q: ¿Qué lleva el cajón? → A: Logo + botón de cerrar (bloque de core), botón «Hazte socio» a todo el ancho arriba (lo pide la auditoría; no está en Figma), el mismo menú de la cabecera en vertical y el buscador (en móvil la lupa de la cabecera también está oculta; no está en Figma).
- Q: ¿Submenús? → A: Acordeón por clic, cerrados al abrir, uno abierto a la vez. Se usa la lógica de core (botón de submenú y `aria-expanded`): un filtro de render da a cada submenú del cajón su propio estado y quita el «abrir al pasar el ratón». Sin JS propio.
- Q: ¿Iconos por enlace como en Figma? → A: No. El bloque «Enlace de navegación» no admite icono y el menú es contenido de la junta (cambia). Desviación anotada.
- Q: ¿El enlace padre (AFA, Servicios) sigue siendo enlace? → A: Sí: el texto lleva a la página y la flecha despliega.
- Q: ¿Cabecera de escritorio? → A: Sin cambios. A 600–1023 px (tablet) también se usa el cajón.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Hacerse socio desde el móvil (P1)

1. **Given** 390 px, **When** se abre el menú, **Then** el primer elemento tras el logo es «Hazte socio» y lleva a la página con la plantilla Hazte Socio (014).

### User Story 2 - Encontrar una sección (P1)

1. **Given** el cajón abierto, **When** se mira, **Then** se ven 7 entradas de primer nivel alineadas a la izquierda; las que tienen submenú muestran una flecha.
2. **When** se pulsa la flecha de AFA, **Then** se despliega solo AFA (`aria-expanded="true"`); al pulsar la de Extraescolares, AFA se cierra.

### User Story 3 - Teclado y lector de pantalla (P2)

1. **Given** el cajón abierto, **Then** es un diálogo modal con nombre, el foco va al primer elemento, Tab queda dentro, Escape cierra y devuelve el foco al botón de abrir.

### Edge Cases

- Sin menú creado: core usa su menú por defecto (lista de páginas); el cajón sigue funcionando.
- Menú muy largo: el cajón tiene su propio scroll.
- Escritorio ≥ 1024 px: no cambia.

## Requirements *(mandatory)*

- **FR-001**: La navegación de la cabecera MUST usar la parte `menu-movil` como overlay.
- **FR-002**: El cajón MUST ir a la izquierda, con ancho `min(320px, 88vw)`, fondo `surface-container` y fondo atenuado detrás.
- **FR-003**: «Hazte socio» MUST estar visible arriba del cajón.
- **FR-004**: Los submenús MUST ser acordeones cerrados por defecto, con `aria-expanded` correcto.
- **FR-005**: Objetivos táctiles ≥ 44 px; foco visible; contraste ≥ 4,5:1.
- **FR-006**: Sin JS propio; la parte MUST ser editable en el Editor del sitio.

## Success Criteria

- **SC-001**: A 390 px el menú abierto muestra ≤ 8 entradas de primer nivel y «Hazte socio» sin desplazar.
- **SC-002**: Comprobación automática: `aria-expanded` false → true → false, Escape cierra.

## Desviaciones de Figma

| Elemento | Figma | Tema | Motivo |
|---|---|---|---|
| Iconos por enlace | Sí | No | El bloque de enlace de navegación no admite icono; el menú lo edita la junta |
| «Hazte socio» y buscador en el cajón | No | Sí | Auditoría #19; en móvil la cabecera los oculta |
| Submenús | No hay | Acordeón | El menú real tiene 3 submenús |
| Botón de cerrar | Hamburguesa visible fuera del cajón | Aspa dentro del cajón | Bloque de core; accesible y editable |

## Assumptions

- El contenido del menú (Trueque, `http://`, Contacto duplicado) es de la junta (backlog).
