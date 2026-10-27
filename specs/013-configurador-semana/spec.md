# Feature Specification: Estilos del configurador de semana

**Feature Branch**: `013-configurador-semana`

**Created**: 2026-10-27

**Status**: Draft

**Input**: Backlog 013 — estilos del configurador de semana (añadida tras revisar Figma): barra de resumen inferior en móvil. Depende de plugin-011 ✅ (contrato §15 v1.9.0).

**Fuente de diseño**: Figma `AFA` (`lS6WwjiFrPKd60cQTfXrKF`): `configurador de semana` `3:467`, `Html → Body` `3:658` (actividades), `Configurador Móvil` `3:331`.

**Fuente de datos**: [contrato §15](../../../../plugins/afa-padre-poveda-core/docs/contrato-tema.md): bloque `afa-padre-poveda/configurador-semana` (formulario GET con tabla de franjas por día, selectores por celda, resumen en `aria-live`, enlace «Continuar a la inscripción»).

## Clarifications

### Session 2026-10-27 (decisiones tomadas sin la persona responsable, revisar)

- Q: El Figma propone arrastrar actividades desde un panel lateral; el plugin implementa selectores por celda. ¿Cómo se resuelve? → A: Se viste el marcado del plugin (más accesible y operable por teclado). Panel lateral con tarjetas de actividad, filtros por edad/duración/día y arrastrar-soltar quedan fuera: serían JS/lógica del plugin. Desviación anotada.
- Q: ¿Barra de resumen fija inferior en móvil? → A: No se fija (position: sticky) por accesibilidad: con zoom 200 % o teclado puede tapar contenido/foco (WCAG 1.4.10, 2.4.11). El resumen se apila bajo la tabla con total e importe destacados.
- Q: ¿Tabla en móvil? → A: Scroll horizontal propio de la tabla (la página no desborda) con anchura mínima legible; el Figma móvil propone otro patrón (días en pestañas) que requeriría JS.
- Q: ¿Texto del encabezado y del aviso de cuotas? → A: Plantilla `page-configurador` con H1 de la página, introducción editable y pattern `configurador-aviso` (curso y cuota anual sin año fijo).
- Q: ¿Colores del resumen y de errores? → A: Resumen en `contrast` con texto `base`; error en borde + texto con hex documentado (`#b3261e`, como 011).

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Componer la semana de actividades (P1)

1. **Given** el configurador, **When** se abre en escritorio, **Then** se ve el filtro de curso, la tabla con días en columnas y franjas 16:00–17:00 / 17:00–17:30 en filas, con selectores legibles y la franja bloqueada claramente distinguible (trama + deshabilitada).
2. **Given** una celda con error, **When** el plugin la marca (`is-error`), **Then** muestra borde y mensaje de texto, no solo color.
3. **Given** móvil, **When** se abre, **Then** la tabla se desplaza dentro de su contenedor y el resto de la página no desborda.

### User Story 2 - Ver y usar el resumen (P1)

1. **Given** actividades elegidas, **When** se calcula, **Then** se ve un panel oscuro con lista, cuota mensual grande, aviso, y botones «Continuar a la inscripción» e «Imprimir o guardar como PDF».

### User Story 3 - Sin plugin (P2)

Sin el plugin, la página con la plantilla no da errores y no muestra el formulario.

### Edge Cases

- Sin actividades elegidas: lista vacía oculta, cuota 0 €.
- Nombres largos en selectores: se recortan visualmente; el nombre completo está en la opción y en el resumen.
- Franja B bloqueada (`is-blocked`): contraste suficiente del texto deshabilitado (estado inactivo).

## Requirements *(mandatory)*

- **FR-001**: El tema MUST estilizar `afa-core-configurador*` (filtro, tabla, franjas, celdas, errores, bloqueo, nota, acciones, resumen, lista, total, aviso, botones) con presets.
- **FR-002**: `templates/page-configurador.html` MUST registrarse en `customTemplates` con H1, introducción, `post-content` (donde va el bloque) y el pattern `configurador-aviso`, en `main#contenido`.
- **FR-003**: Estados `is-error` e `is-blocked` MUST distinguirse sin depender solo del color.
- **FR-004**: Controles ≥ 44 px de alto, foco visible, contraste ≥ 4,5:1 (texto) y ≥ 3:1 (bordes de control).
- **FR-005**: 0 desbordes horizontales de página a 390 px; la tabla hace scroll interno.
- **FR-006**: El tema MUST NOT añadir JS ni lógica de cálculo.

## Success Criteria

- **SC-001**: Estructura y jerarquía equivalentes a Figma 3:467 en lo que el marcado del plugin permite; desviaciones documentadas.
- **SC-002**: Sin plugin: 0 errores PHP.
- **SC-003**: Contraste calculado correcto en resumen, tabla y errores.

## Assumptions

- El plugin imprime el marcado del contrato y gestiona JS, reglas y resumen.
