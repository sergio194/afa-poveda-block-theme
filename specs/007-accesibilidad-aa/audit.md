# Auditoría AA — informe

**Feature**: `007-accesibilidad-aa`  
**Fecha**: 2026-09-20  
**Alcance**: superficie pública del tema (ver [contracts/a11y-aa.md](./contracts/a11y-aa.md) §G)  
**Método**: contraste calculado (WCAG relativo) + revisión estructural de plantillas/patterns + teclado (selectores de foco) + clasificación de hallazgos

## Resumen

| Métrica | Valor |
|---------|-------|
| Criterios/páginas revisados | 9 vistas + header/footer + tokens |
| Pasa | Tokens canónicos; skip; main#contenido; foco ampliado; overlays corregidos |
| Falla (tema) | 0 abiertos |
| Falla (plugin) | Formularios (delegado) |
| Falla (editorial) | Covers con foto muy clara + overlay bajo (mitigado por dim ↑); guía publicada |
| N/A | Certificación externa |

## Matriz rápida por vista

| Vista | Contraste | Teclado/foco | Skip→#contenido | H1 único | Landmarks | Notas |
|-------|-----------|--------------|-----------------|----------|-----------|-------|
| Portada | ✅ | ✅ | ✅ | ✅ | ✅ | Overlay hero 85 % |
| Sobre nosotros | ✅ | ✅ | ✅ | ✅ | ✅ | Overlay hero 85 % |
| Actualidad listado | ✅ | ✅ | ✅ | ✅ | ✅ | Leer más + aria-label |
| Entrada single | ✅ | ✅ | ✅ | ✅ | ✅ | |
| Servicios listado | ✅ | ✅ | ✅ | ✅ | ✅ | Ver más + aria-label |
| Servicio detalle | ✅ | ✅ | ✅ | ✅ | ✅ | Overlay 65 %; FAQ summary foco |
| Hazte socio | ✅ | ✅ | ✅ | ✅ | ✅ | Saber más + aria-label |
| Búsqueda | ✅ | ✅ | ✅ | ✅ | ✅ | query-title SR |
| 404 | ✅ | ✅ | ✅ | ✅ | ✅ | |
| Header/nav overlay | ✅ | ✅ | — | — | ✅ | Skip primero |
| Footer | ✅ | ✅ | — | — | ✅ | `tagName` footer |

Leyenda: ✅ pasa · ❌ falla · N/A

## Pares de contraste (tokens)

| Par | Ratio | Umbral | ¿Cumple? | Acción |
|-----|-------|--------|----------|--------|
| contrast sobre surface | 16,27:1 | 4,5:1 | ✅ | — |
| contrast-muted sobre surface | 8,85:1 | 4,5:1 | ✅ | — |
| contrast / muted sobre base, surface-container, surface-high, primary-soft | ≥ 7,3:1 | 4,5:1 | ✅ | — |
| base sobre accent | 5,37:1 | 4,5:1 | ✅ | — |
| base sobre primary | 6,46:1 | 4,5:1 | ✅ | — |
| base sobre green | 6,49:1 | 4,5:1 | ✅ | — |
| primary (enlace) sobre surface | 6,14:1 | 4,5:1 | ✅ | — |
| green sobre soft-green | 5,72:1 | 4,5:1 | ✅ | — |
| base sobre primary @50 % dim + imagen blanca | ~2,35:1 | 4,5:1 | ❌→✅ | dimRatio → 85 % (peor caso ≥ 4,5:1) |
| base sobre contrast @55 % dim + imagen blanca | ~3,87:1 | 4,5:1 | ❌→✅ | dimRatio → 65 % |

## Hallazgos

| ID | Ubicación | Criterio | Clasificación | Severidad | Estado | Remedio |
|----|-----------|----------|---------------|-----------|--------|---------|
| H-001 | Sin skip link global | 2.4.1 | tema | bloqueante | corregido | `parts/header.html` + `.afa-skip-link`; destinos `main#contenido` |
| H-002 | Heroes home/sobre dim 50 % | 1.4.3 | tema | mayor | corregido | dimRatio 85 % + opacity inline |
| H-003 | Hero servicio dim 55 % | 1.4.3 | tema | mayor | corregido | dimRatio 65 % |
| H-004 | Foco incompleto (summary, search, page-numbers) | 2.4.7 | tema | mayor | corregido | selectores en `style.css` |
| H-005 | CTAs «Ver más» / «Leer más» genéricos | 2.4.4 | tema | menor | corregido | aria-label en grid servicios + filtro `core/read-more` |
| H-006 | Sin prefers-reduced-motion | 2.3.3 (aprox.) | tema | menor | corregido | media query en `style.css` |
| H-007 | Formularios plugin (alta / newsletter) | varios | plugin | mayor | delegado | Junta: labels, errores y contraste del plugin; envoltura `.afa-hazte-form` no empeora foco |
| H-008 | Contenido editorial futuro (covers, H1) | varios | editorial | menor | delegado | Ver [contracts/guia-editorial-a11y.md](./contracts/guia-editorial-a11y.md) |

## Reduced motion / zoom 200 %

| Comprobación | Resultado | Notas |
|--------------|-----------|-------|
| `prefers-reduced-motion` | ✅ | Regla global en `style.css` |
| Zoom 200 % portada | ✅ | Layout fluido; sin overflow crítico del tema (revisión estructural) |
| Zoom 200 % interior | ✅ | Idem; validar visualmente en Local tras desplegar |

## Cierre

- [x] 100 % hallazgos `tema` bloqueantes/mayores → corregido o aceptado documentado
- [x] Tag `accessibility-ready` coherente con el resultado (research R8)
- [x] Guía editorial enlazada desde este informe
- [x] Refinamientos Figma actualizados en `spec.md`
