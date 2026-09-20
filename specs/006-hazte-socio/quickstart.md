# Quickstart: Validar Hazte Socio (006)

**Feature**: `006-hazte-socio` | **Date**: 2026-09-18

Guía de validación end-to-end tras implementar. Sin código de implementación aquí.

## Prerequisites

- Tema `afa-poveda` activo en Local
- Spec 001 (header con CTA → `/hazte-socio/`, footer, tokens)
- Locale español
- (Recomendado) Plugin de formularios activo con un formulario «Alta socia/o»

## Setup editorial

1. **Páginas → Añadir** «Hazte Socio», slug `hazte-socio`. Plantilla: **Hazte Socio** (`page-hazte-socio`).
2. Insertar pattern **Hazte Socio (página completa)** (`afa-poveda/hazte-socio-page`) o las secciones por separado.
3. En `.afa-hazte-form`: sustituir el fallback («Ir a Contacto») por el bloque/shortcode del plugin. Campos del formulario:
   - Nombre del tutor/a (obligatorio)
   - DNI / NIE (obligatorio)
   - Email de contacto (obligatorio)
   - Checkbox de privacidad / RGPD (recomendado)
   - Botón: «Enviar Solicitud de Alta»
4. Configurar notificación del plugin: email a la junta + mensaje de confirmación (instrucciones de pago / carnet).
5. Sustituir ilustración e iconos placeholder por medios reales si aplica.
6. Verificar que el botón de cabecera «Hazte socio» sigue apuntando a `/hazte-socio/`.
7. Si no ves la plantilla: **Apariencia → Temas** → reactivar `afa-poveda`; restablecer personalizaciones de página en BD que pisen los archivos.

Contrato UI: [ui-hazte-socio.md](./contracts/ui-hazte-socio.md). Modelo: [data-model.md](./data-model.md).

## Checks técnicos

```bash
# Desde la raíz del tema
php -l patterns/hazte-hero.php
php -l patterns/hazte-que-hacemos.php
php -l patterns/hazte-pertenecer.php
php -l patterns/hazte-ayudar.php
php -l patterns/hazte-dudas.php
php -l patterns/hazte-socio-page.php
python3 -m json.tool theme.json > /dev/null
```

## Escenarios de aceptación (manual)

| # | Escenario | Esperado |
|---|-----------|----------|
| 1 | Abrir `/hazte-socio/` a 1280 px | Hero 2 cols → qué hacemos 3×2 → pertenecer 2 cols → ayudar 3 → dudas; H1 único; menú/CTA coherente |
| 2 | Abrir a 390 px | Stack; sin desborde; CTAs y form usables |
| 3 | CTA cabecera «Hazte socio» | Llega a esta página |
| 4 | «Formulario de inscripción» | Scroll/ancla a `#pertenecer` |
| 5 | «Saber más» | Ancla a `#que-hacemos` |
| 6 | Seis fichas «qué hacemos» | Títulos canónicos; editables |
| 7 | Cuota visible | Importe + ≥ 3 beneficios |
| 8 | Plugin activo: envío válido | Confirmación; sin romper layout |
| 9 | Plugin activo: envío vacío | Errores del plugin; layout intacto |
| 10 | Plugin inactivo | Fallback Contacto; sin form falso |
| 11 | Editar cuota en Editor | Front actualizado |
| 12 | Mailto dudas | Abre cliente de correo |
| 13 | Editor: plantilla/página | Ningún bloque «no válido» |
| 14 | Teclado + contraste | Tab por CTAs, form, mailto; ≥ 4,5:1 |

## Comparación Figma

- Desktop: `hazte socio` (`27:3962`)
- Mobile: `hazte socio mobile` (`27:3559`)
- Anotar desviaciones nuevas en refinamientos de `spec.md`

## Done when

- [ ] Escenarios 1–14 pasan (8–10 según estado del plugin)
- [ ] `php -l` limpio en PHP tocado
- [ ] Capturas 390 / 900 / 1280 revisadas
- [ ] Spec actualizada si hubo refinamientos nuevos
