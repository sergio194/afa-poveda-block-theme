# Quickstart: Validar Servicios AFA (005)

**Feature**: `005-servicios` | **Date**: 2026-09-18

Guía de validación end-to-end tras implementar. Sin código de implementación aquí.

## Prerequisites

- Tema `afa-poveda` activo en Local
- Spec 001 (tokens, header, footer) disponible
- Locale del sitio en español
- Medios de ejemplo: al menos 1 imagen de comedor + 2 PDFs (menú) + 1 PDF doc (opcional)

## Setup editorial

1. **Páginas → Añadir** «Servicios», slug `servicios`. En **Plantilla** elegir **Servicios — Listado**. En el editor de la página, insertar el pattern **Servicios (página completa)** (`afa-poveda/servicios-page`) o, por piezas, `servicios-hero` + `servicios-grid` + `servicios-cta`. Publicar.
2. **Páginas → Añadir** «Comedor Escolar», slug `comedor-escolar`, **padre** = Servicios (URL `/servicios/comedor-escolar/`). Plantilla: **Servicio — Detalle**. Insertar **Servicio — Comedor Escolar (página completa)** (`afa-poveda/servicio-comedor`). Sustituir enlaces `#` de menús/docs por PDFs de la biblioteca. CTA «Inscribirse Ahora» → `/contacto/` (o inscripción cuando exista). Publicar.
3. (Opcional v1) Crear páginas hijas mínimas para los otros 5 servicios (slugs ya enlazados en el grid) o dejar los «Ver más» hasta tener contenido.
4. **Apariencia → Editor → Navegación**: ítem «Servicios» → página `/servicios/`.
5. Si no ves plantillas/patterns: **Apariencia → Temas** → reactivar `afa-poveda`; en el Editor del sitio, restablece personalizaciones de plantilla de página que pisen los archivos del tema.
6. Sustituir placeholders `#` de descargas y documentación por medios reales.

Contrato UI: [ui-servicios.md](./contracts/ui-servicios.md). Modelo: [data-model.md](./data-model.md).

## Checks técnicos

```bash
# Desde la raíz del tema
php -l patterns/servicios-hero.php
php -l patterns/servicios-grid.php
php -l patterns/servicios-cta.php
php -l patterns/servicio-hero.php
php -l patterns/servicio-alimentacion.php
php -l patterns/servicio-menus-valores.php
php -l patterns/servicio-faq.php
php -l patterns/servicio-inscripcion.php
php -l patterns/servicio-documentacion.php
php -l functions.php   # si se tocó menú activo
python3 -m json.tool theme.json > /dev/null
```

(`servicios-page.php` / `servicio-comedor.php` si existen: `php -l` también.)

## Escenarios de aceptación (manual)

| # | Escenario | Esperado |
|---|-----------|----------|
| 1 | Abrir `/servicios/` a 1280 px | Eyebrow + H1 + apoyo → 6 fichas 3×2 → CTA azul; menú «Servicios» activo; sin sidebar |
| 2 | Abrir `/servicios/` a 390 px | Mismo orden; fichas 1 columna; CTA botones apilados; sin desborde |
| 3 | «Ver más» Comedor | Llega al detalle Comedor |
| 4 | Detalle 1280 px | Hero cover + badge; columna contenido; aside inscripción + docs |
| 5 | Detalle 390 px | Todo apilado; inscripción debajo del contenido |
| 6 | Descargar menú | Abre/descarga el PDF enlazado |
| 7 | FAQ | Abrir/cerrar con ratón y teclado; sin JS a medida |
| 8 | «Inscribirse Ahora» | Navega al destino configurado (no 404) |
| 9 | Documentación | Tres enlaces (o los publicados) abren archivo o página |
| 10 | CTA listado Contactar / FAQ | Destinos correctos |
| 11 | Editar precio en Editor | Front actualizado sin código |
| 12 | Ficha sin imagen (prueba) | Hueco estable, layout intacto |
| 13 | Editor: abrir ambas plantillas/páginas | Ningún bloque «no válido» |
| 14 | Teclado + contraste | Tab por enlaces/botones/summary; textos ≥ 4,5:1 |
| 15 | Página hija Comedor | Ítem menú «Servicios» sigue activo (ancestro o filtro) |

## Comparación Figma

- Listado desktop: `Nuestros Servicios - Vista Homogénea` (`26:3374`)
- Listado mobile: `Nuestros Servicios - Vista Homogénea` (`27:4354`)
- Detalle desktop: `Detalle de Servicio - Comedor Escolar` (`26:3175`)
- Detalle mobile: `Detalle de Servicio - Comedor Escolar` (`27:4168`)
- Anotar desviaciones nuevas en la tabla de refinamientos de `spec.md`

## Done when

- [ ] Los escenarios 1–15 pasan (15 si hay jerarquía padre/hija)
- [ ] `php -l` limpio en PHP tocado
- [ ] Capturas 390 / 900 / 1280 revisadas
- [ ] Spec `spec.md` actualizada si hubo refinamientos nuevos
