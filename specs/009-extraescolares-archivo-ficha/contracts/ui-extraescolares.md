# Contrato de UI — 009

## Archivo
```
header · main#contenido
  H1 «Actividades Extraescolares» + intro
  extraescolares-filtro (banda surface-container)
  Query (inherit) → grid 3/2/1: media 16:10 + etiqueta · H1/H3 título · extracto · datos · precios(tarjeta)
  paginación · sin resultados
  patrón extraescolares-dudas
footer
```
## Ficha
```
main#contenido
  «← Volver a extraescolares»
  hero (2 mitades): etiqueta · H1 · extracto · datos[cursos,dias] | imagen destacada
  columns 65/35
    principal: H2 «Sobre la actividad» · post-content · [horarios | ubicación] · requisitos
    lateral: precios (completa) · aviso socio
footer
```
Móvil: una columna; imagen sobre el texto.
