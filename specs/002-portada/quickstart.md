# Quickstart: Validar Portada (002)

**Feature**: `002-portada` | **Date**: 2026-09-16

Guía de validación end-to-end tras implementar. Sin código de implementación aquí.

## Prerequisites

- Tema `afa-poveda` activo en Local
- Spec 001 desplegada (tokens, header, footer)
- Al menos 3 entradas publicadas con imagen destacada
- 1–3 entradas marcadas como **fijas en la portada** (sticky) para avisos
- Páginas esqueleto (pueden ser borrador/publicadas mínimas): Extraescolares, Calendario, Comedor/Servicios, AFA, Hazte socio, Contacto, Noticias

## Setup editorial

1. Con `templates/front-page.html` en el tema, la URL `/` usa esa plantilla (jerarquía front-page). Si no ves cambios: limpia caché y, en Apariencia → Editor, comprueba que no haya una personalización de plantilla Portada guardada en BD que anule el archivo.
2. Si hay página de entradas, asignarla a «Noticias» para que «Ver noticias» / «Cargar más» tengan destino.
3. Fijar 3 posts sticky con categorías cortas (p. ej. Servicios, Cultura, Evento).
4. En el hero: sustituye/añade la imagen de Cover desde el Editor del sitio (el pattern arranca con overlay de color `primary`).

## Checks técnicos

```bash
# Desde la raíz del tema
php -l patterns/home-hero.php
php -l patterns/home-quick-access.php
php -l patterns/home-avisos.php
php -l patterns/home-latest-news.php
php -l patterns/home-community-cta.php
php -l functions.php
python3 -m json.tool theme.json > /dev/null
```

## Escenarios de aceptación (manual)

| # | Escenario | Esperado |
|---|-----------|----------|
| 1 | Abrir `/` a 1280 px | Orden: hero → 4 accesos en fila → avisos 1+2 → 3 noticias → CTA → footer; sin sidebar |
| 2 | Abrir `/` a 390 px | Hero con «Descubre más»; accesos 2×2; avisos apilados; noticias en columna; CTA usable |
| 3 | Clic «Descubre más» | Salta a `#afa-accesos` |
| 4 | Clic cada acceso | Navega a URL configurada (sin 500) |
| 5 | Sin sticky | Sección avisos vacía/oculta sin error |
| 6 | Sin posts | Mensaje de sin noticias; resto de portada intacta |
| 7 | Editor del sitio → plantilla Portada | Se pueden editar textos del hero/CTA y no hay bloques inválidos |
| 8 | Contraste | Texto sobre hero y CTA ≥ 4,5:1 |
| 9 | Teclado | Tab recorre enlaces/botones con foco visible |

## Comparación Figma

- Desktop: frame `HOME` (1:259)
- Mobile: frame `HOME- MOBILE` (1:1395)
- Anotar desviaciones en la tabla de refinamientos de `spec.md`

## Done when

- [ ] Los 9 escenarios pasan
- [ ] `php -l` limpio en patterns tocados
- [ ] Capturas 390 / 900 / 1280 revisadas
- [ ] Spec `spec.md` criterios de aceptación actualizados si hubo refinamientos nuevos
