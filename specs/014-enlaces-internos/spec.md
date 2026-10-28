# Feature Specification: Enlaces internos y destinos

**Feature Branch**: `014-enlaces-internos` (implementada en `backlog-auto-2026-10-28`)

**Created**: 2026-10-28

**Status**: Hecha (pendiente de páginas legales y limpieza de menú por la junta)

**Input**: Backlog 014 — [auditoría del 28/10/2026](../../Auditoria_web_AFA_Padre_Poveda.pdf) #1, #5, #16, #20 y parte de #17.

**Fuente de diseño**: no aplica (sin cambios visuales salvo quitar un enlace duplicado de la portada, ver desviaciones).

## Diagnóstico (copia de la BD de Local, 28/10/2026)

| Ruta fija en el tema | Dónde | Respuesta | Página real |
|---|---|---|---|
| `/hazte-socio/` | cabecera, `home-community-cta`, `extraescolar-socio`, `configurador-aviso`, menú | 301 adivinado | `hazte-socio-2` (plantilla Hazte Socio) |
| `/contacto/` | 6 patterns | 301 adivinado a `/ampa-3/contacto/` (duplicado) | `contacto-afa` (plantilla Contacto) |
| `/calendario/` | `home-quick-access` | 301 adivinado | `calendario-escolar` (plantilla Calendario) |
| `/afa/` | `home-quick-access` (Voluntarios) | **404** | `sobre-nosotros` (plantilla AFA) |
| `/servicios/comedor/` | `home-quick-access` | 301 adivinado | servicio `comedor-escolar` |
| `/servicios/` | `extraescolares-dudas` | 301 adivinado | `servicios-del-ampa` (plantilla Servicios) |
| `/actividades-extraescolares-2/` | `archive-afa_extraescolar` | 200 | (plantilla Configurador) |
| `/aviso-legal/`, `/privacidad/`, `/cookies/` | pie | **404** | no existen (privacidad en borrador) |
| `/servicios/biblioteca-y-apoyo/` y otras 4 | `servicios-grid` (insertado en la página Servicios) | **404** | fichas de ejemplo |
| `#` | redes del pie, «Descargar», documentos | sin destino | — |

En el live link las 301 «adivinadas» salían como 404 (la auditoría lo vio así). Fiarse de la adivinanza de WordPress no vale: `/servicios/primeros-del-cole/` acaba en una noticia de 2022.

## Clarifications

### Session 2026-10-28 (decisiones tomadas sin la persona responsable, revisar)

- Q: ¿Slugs canónicos o destino por otra vía? → A: **Destino por plantilla.** Cada ruta fija del tema se lleva al pintar a la página publicada que tenga asignada la plantilla del tema correspondiente (Hazte Socio, Contacto, Calendario escolar, AFA, Servicios, Configurador). La junta ya las tiene asignadas, así que los enlaces funcionan hoy sin cambiar slugs, y se cambian desde el editor (Página → Plantilla) sin desarrollador. Resuelve la nota de la constitución IV sin sacar los enlaces a un menú. Si hay varias páginas con la misma plantilla, gana la que esté en la ruta canónica y, si no, la más reciente.
- Q: ¿Slugs canónicos recomendados para las 301? → A: `/hazte-socio/`, `/contacto/`, `/calendario/`, `/afa/`, `/servicios/`, `/configurador/`. Los enlaces ya no dependen de ello; es para URLs limpias (#18). Las 301 son de la junta/hosting.
- Q: ¿Iconos de Instagram y Facebook del pie sin URL? → A: Se ocultan en el front mientras su URL sea `#`; reaparecen en cuanto la junta pone la real en el Editor del sitio.
- Q: ¿«Compartir noticia»? → A: Ya tenía destinos reales (filtro de `functions.php`); se verifica y se protege del nuevo filtro.
- Q: ¿«Ver todo» de Avisos y «Ver noticias» iban al mismo sitio? → A: Se quita «Ver todo» de Avisos: los avisos son entradas fijadas, que no tienen archivo propio, y no existe la categoría «avisos». El archivo queda enlazado desde «Últimas noticias». Desviación de Figma (abajo).
- Q: ¿Enlaces «Descargar»/documentos con `#`? → A: En el front se pinta el texto sin enlace y en gris (`.afa-enlace-pendiente`); un botón con `#` no se pinta. En el editor siguen como enlace para sustituirlo.
- Q: ¿Fichas de ejemplo de `servicios-grid`? → A: En el pattern, Comedor apunta a la ruta canónica y las de ejemplo a `#`. La página Servicios real tiene la rejilla de ejemplo ya insertada: sustituirla por «Servicios — Rejilla desde contenido» es tarea de la junta (backlog).
- Q: ¿Legales? → A: Privacidad se lleva a la página de Ajustes → Privacidad cuando esté publicada. Aviso legal y Cookies se quedan en su ruta: crearlas es la tarea urgente de contenido.
- Q: ¿Comprobador de enlaces? → A: Script `docs/comprobar-enlaces.sh` (solo GET) y paso en la guía de pruebas.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Hacerse socio desde cualquier botón (P1)

1. **Given** la página con plantilla Hazte Socio en `/hazte-socio-2/`, **When** se pulsa «Hazte socio» (cabecera), «Hazte Socio Ahora» (portada) o el del aviso del configurador/ficha de extraescolar, **Then** se llega a esa página con un 200 y sin redirecciones.
2. **Given** que la junta crea una página nueva en `/hazte-socio/` con la plantilla, **When** se recarga, **Then** todos los botones van a la nueva.

### User Story 2 - Accesos rápidos y contacto sin 404 (P1)

1. **Given** la portada, **When** se pulsan Comedor, Extraescolares, Calendario, Voluntarios y «Contactar con Vocalías», **Then** todos responden 200 en su página real.

### User Story 3 - Sin enlaces muertos (P2)

1. **Given** redes sin URL, «Descargar» o documentos con `#`, **When** se ve el front, **Then** no hay enlaces que no lleven a ningún sitio.

### Edge Cases

- Plugin desactivado: Comedor y Extraescolares caen a su ruta fija (sin error).
- Ninguna página con la plantilla: el enlace queda en la ruta fija (colgando de la URL del sitio).
- Enlaces externos, protocolo relativo (`//`) y anclas (`#contenido`) no se tocan; `/afa/#equipo` conserva el ancla.
- Menú con URLs absolutas del propio dominio: también se resuelven.

## Requirements *(mandatory)*

- **FR-001**: Los enlaces del tema a `/hazte-socio/`, `/contacto/`, `/calendario/`, `/afa/`, `/servicios/`, `/configurador/` MUST pintarse con el permalink de la página publicada con la plantilla correspondiente, si existe.
- **FR-002**: `/servicios/comedor/` → servicio `comedor`/`comedor-escolar`; `/extraescolares/` → archivo del CPT; `/noticias/` → página de entradas; `/privacidad/` → página de privacidad publicada.
- **FR-003**: El mapa MUST poder ampliarse con el filtro `afa_poveda_internal_link_targets`.
- **FR-004**: Enlaces `#` MUST NOT pintarse como enlace en el front (redes: icono oculto; texto: sin enlace; botón: oculto).
- **FR-005**: «Compartir noticia» MUST seguir enlazando a correo, WhatsApp y Facebook con la URL de la noticia.
- **FR-006**: Sin JS ni peticiones externas (constitución VI); sin cambiar contenido de la BD.
- **FR-007**: `docs/comprobar-enlaces.sh` MUST listar los enlaces internos que no den 200.

## Success Criteria

- **SC-001**: 0 enlaces rotos generados por el tema en portada, noticias, extraescolares, contacto, hazte socio, calendario, AFA y servicios (salvo las páginas legales que no existen).
- **SC-002**: Los botones «Hazte socio» llegan sin redirección.

## Desviaciones de Figma

| Elemento | Figma | Tema | Motivo |
|---|---|---|---|
| «Ver todo» en Actualidad y Avisos | Sí | Quitado | Duplicaba «Ver noticias» (#20) y no hay archivo de avisos |
| Redes del pie | Instagram, Facebook, correo | Solo los que tengan URL | #16: no hay URLs reales |

## Assumptions

- Las 301 de slugs viejos, consolidar páginas duplicadas y el menú (ítem «Contacto» apunta al duplicado `/ampa-3/contacto/`, «Trueque», `http://`) son de la junta.
