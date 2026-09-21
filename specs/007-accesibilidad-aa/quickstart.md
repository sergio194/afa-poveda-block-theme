# Quickstart: Validar accesibilidad AA (007)

**Feature**: `007-accesibilidad-aa` | **Date**: 2026-09-20

Guía de validación end-to-end tras implementar. Sin código de implementación aquí.

## Prerequisites

- Tema `afa-poveda` activo en Local
- Páginas de specs 001–006 montadas (portada, AFA, actualidad, servicios, hazte socio)
- Teclado físico o emulación; herramienta de contraste (extensión o calculadora)
- (Opcional) Lector de pantalla (VoiceOver) o panel Accesibilidad de DevTools
- Contrato: [contracts/a11y-aa.md](./contracts/a11y-aa.md) · Modelo: [data-model.md](./data-model.md) · Informe: [audit.md](./audit.md)

## Setup

1. Reactivar el tema si plantillas en BD pisan archivos (o Create Block Theme → guardar / restablecer personalizaciones).
2. Abrir el front en ventana limpia (sin overlays de Local que intercepten Tab).
3. Preparar `audit.md`: fecha + filas de vistas del §G del contrato.

## Checks técnicos

```bash
# Desde la raíz del tema
python3 -m json.tool theme.json > /dev/null
# Si se tocó PHP:
php -l functions.php
# patterns tocados:
# php -l patterns/<archivo>.php
rg -n 'id="contenido"|afa-skip-link|Saltar al contenido' parts/ templates/ style.css
```

Esperado: skip link en `parts/header.html`; `id="contenido"` en cada `<main>` de plantillas públicas; JSON/PHP limpios.

## Escenarios de aceptación (manual)

| # | Escenario | Esperado |
|---|-----------|----------|
| 1 | Cargar portada; primer Tab | Foco en «Saltar al contenido»; Enter lleva a `#contenido` |
| 2 | Tab por cabecera (escritorio) | Logo, nav, buscar, Hazte socio; foco visible siempre |
| 3 | Viewport ~390 px; abrir menú overlay solo con teclado | Ítems alcanzables; cierre sin trampa de foco |
| 4 | Medir contrastes de tokens canónicos | Ratios ≥ umbral; fallos anotados y corregidos en tema |
| 5 | Heroes/covers con texto sobre imagen | Contraste efectivo AA en el peor punto |
| 6 | Cada vista del alcance | Un solo H1; `main#contenido`; header/footer semánticos |
| 7 | Iconos decorativos vs funcionales | Decorativos silenciosos; funcionales con nombre |
| 8 | Listados con varios «Ver más» | Propósito distinguible (visible o accesible) |
| 9 | Zoom 200 % en portada + una interior | Contenido y controles del tema usables |
| 10 | `prefers-reduced-motion: reduce` | Animaciones no esenciales del tema atenuadas/off |
| 11 | Formulario plugin (Hazte socio / newsletter) | Barreras del plugin → `delegado`; envoltura del tema no empeora foco/contraste |
| 12 | Completar `audit.md` | Hallazgos `tema` cerrados; resumen legible por junta en ≤ 15 min |
| 13 | Guía editorial | [contracts/guia-editorial-a11y.md](./contracts/guia-editorial-a11y.md) revisada y enlazable |
| 14 | Editor del sitio (plantillas/parts tocados) | Ningún bloque «no válido» |

## Done when

- [x] Escenarios 1–14 pasan (11 según plugins presentes)
- [x] `audit.md` con fecha y cierre marcado
- [x] Refinamientos nuevos en `spec.md` si hubo cambios vs Figma
- [x] Tag `accessibility-ready` coherente (research R8)
