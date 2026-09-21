# Contract: Accesibilidad WCAG 2.2 AA (tema)

**Feature**: `007-accesibilidad-aa` | **Date**: 2026-09-20  
**Consumers**: todas las plantillas públicas, `parts/header.html`, `parts/footer.html`, `parts/sidebar.html`, patterns de presentación, `theme.json`, `style.css`  
**Estándar**: WCAG 2.2 Level AA (constitución V)

## A. Skip link y landmarks

| Requisito | Contrato |
|-----------|----------|
| Skip link | Primer enlace enfocable de la vista: texto «Saltar al contenido», clase `.afa-skip-link`, destino `#contenido` |
| Visibilidad | Oculto visualmente hasta `:focus` / `:focus-visible`; entonces visible, alto contraste, no recortado |
| Main | Exactamente un `<main id="contenido">` por vista pública |
| Header / Footer | Semántica `header` / `footer` (vía part o hijo del part) |
| Nav | Menú principal anunciable como navegación (bloque Navigation core) |

## B. Contraste (mínimos)

| Tipo | Ratio mínimo |
|------|----------------|
| Texto normal | 4,5:1 |
| Texto grande (≥18 px / ≥14 px negrita aprox.) | 3:1 |
| Borde/indicador de componente UI no textual esencial | 3:1 |
| Texto sobre imagen | Medir en el peor punto con overlay real |

**Pares canónicos a inventariar** (no exhaustivo): `contrast`/`contrast-muted` sobre `base`/`surface`/`surface-*`; `base` sobre `primary`/`accent`/`green`; enlaces `primary` sobre superficies; píldoras y overlays de Cover.

Cualquier corrección de token se refleja en `theme.json` y en la tabla de refinamientos de `spec.md`.

## C. Teclado y foco

| Requisito | Contrato |
|-----------|----------|
| Orden | Tab sigue orden visual lógico; sin trampas |
| Foco visible | Outline ≥ 2 px con color de contraste suficiente (preset `primary` u otro que cumpla) en enlaces, botones, inputs, nav items, summary y controles propios del tema |
| Menú overlay | Abrir/cerrar y recorrer ítems solo con teclado |
| Skip | Activa el skip → foco/viewport al contenido principal |

## D. Estructura y nombres

| Requisito | Contrato |
|-----------|----------|
| H1 | Uno significativo por vista |
| Jerarquía | Sin saltos confusos (p. ej. H1 → H3 sin H2 de sección) en patterns del tema |
| Imágenes informativas | Texto alternativo que describa el propósito |
| Decorativas | No anunciadas (`alt=""` / `aria-hidden` según caso) |
| CTAs genéricos repetidos | Nombre accesible distinto por ítem (p. ej. «Ver más: Comedor escolar») si el visible es idéntico |

## E. Movimiento y zoom

| Requisito | Contrato |
|-----------|----------|
| Reduced motion | Animaciones no esenciales del tema desactivadas o mínimas bajo `prefers-reduced-motion: reduce` |
| Zoom 200 % | Sin pérdida de contenido ni controles del tema inaccesibles en vistas de referencia |

## F. Clasificación de hallazgos

| Clasificación | Acción en esta feature |
|---------------|------------------------|
| `tema` | Corregir o aceptar con refinamiento documentado |
| `plugin` | Listar en `audit.md`; no remediar vendor |
| `editorial` | Listar + referencia a [guia-editorial-a11y.md](./guia-editorial-a11y.md) |

## G. Páginas mínimas del alcance de auditoría

1. Portada (`front-page` / home)
2. Sobre nosotros (`page-afa` o URL editorial)
3. Actualidad (listado + una entrada `single`)
4. Servicios (listado + un detalle)
5. Hazte socio
6. Búsqueda
7. 404
8. Cabecera + pie en todas (implícito)

Detalle de filas: [../audit.md](../audit.md) (se rellena en implementación).
