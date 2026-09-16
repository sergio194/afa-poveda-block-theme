# Quickstart: Validar Sobre nosotros (003)

**Feature**: `003-sobre-nosotros` | **Date**: 2026-09-16

Guía de validación end-to-end tras implementar. Sin código de implementación aquí.

## Prerequisites

- Tema `afa-poveda` activo en Local
- Spec 001 (tokens, header, footer) y portada 002 opcionales pero recomendadas
- Al menos un PDF de prueba en Medios (para documentos)
- Imagen para el hero (opcional pero recomendada)

## Setup editorial

1. **Páginas → Añadir**: título «Sobre nosotros», slug `afa`.
2. En el panel de plantilla, elegir **AFA / Sobre nosotros** (`page-afa`).
3. En el contenido, insertar el pattern **Sobre nosotros** (compuesto) o las secciones en el orden del [contrato UI](./contracts/ui-sobre-nosotros.md).
4. Publicar.
5. **Editor del sitio → Navegación**: ítem «AFA» → URL de esta página (`/afa/`).
6. Sustituir imagen del Cover y PDFs reales cuando estén disponibles.
7. Si no ves la plantilla nueva: recarga / reactiva el tema; si hay personalización de plantilla en BD, restablécela.

## Checks técnicos

```bash
# Desde la raíz del tema
php -l patterns/sobre-nosotros.php
php -l patterns/sobre-hero.php
php -l patterns/sobre-quienes-somos.php
php -l patterns/sobre-organigrama.php
php -l patterns/sobre-que-hace.php
php -l patterns/sobre-utilidad-comisiones.php
php -l patterns/sobre-documentos.php
php -l functions.php
python3 -m json.tool theme.json > /dev/null
```

## Escenarios de aceptación (manual)

| # | Escenario | Esperado |
|---|-----------|----------|
| 1 | Abrir `/afa/` a 1280 px | Orden: hero → quiénes somos → organigrama → qué hace → utilidad/comisiones 2 cols → documentos; sin H1 duplicado; sin sidebar |
| 2 | Abrir `/afa/` a 390 px | Mismas secciones apiladas; organigrama y vocales legibles; sin desborde |
| 3 | Menú «AFA» | Lleva a esta página |
| 4 | Un solo H1 | «Sobre nosotros» en el hero |
| 5 | Editar un nombre de junta en la página | Cambio visible en front sin código |
| 6 | Clic documento con PDF | Descarga o abre el medio (no 404) |
| 7 | Sin imagen hero | Página usable; texto contrastado |
| 8 | Editor: abrir página / plantilla | Ningún bloque «no válido» |
| 9 | Teclado + contraste | Tab con foco visible; texto nuevo ≥ 4,5:1 |

## Comparación Figma

- Desktop: frame `Sobre Nosotros - Organigrama Visual` (1:390)
- Mobile: frame `sobre nosotros- mobile` (4:1183)
- Anotar desviaciones en la tabla de refinamientos de `spec.md`

## Done when

- [ ] Los 9 escenarios pasan
- [ ] `php -l` limpio en patterns tocados
- [ ] Capturas 390 / 900 / 1280 revisadas
- [ ] Spec `spec.md` actualizada si hubo refinamientos nuevos
