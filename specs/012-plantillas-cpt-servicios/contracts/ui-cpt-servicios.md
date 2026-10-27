# Contrato de UI — 012

## Plantilla `single-afa_servicio`
```
header
main#contenido
  cover(hero): [etiqueta destacado] H1 título · subtítulo
  columns .afa-servicio-layout__cols
    col 65%: post-content · servicio-indicadores · servicio-faq
    col 35%: servicio-inscripcion · servicio-documentos
footer
```
≤ 781 px: una columna (principal, luego lateral).

## Pattern `afa-poveda/servicios-grid-dinamico`
Query Loop `afa_servicio`, rejilla 3/1 columnas; ficha: imagen 16:9, categoría (píldora `primary`), título (enlace), extracto, frecuencia, «Ver más».

## Clases estilizadas (plugin → tema)
`afa-core-servicio-inscripcion[__titulo|__precios|__precio|__precio-etiqueta|__precio-valor|__descuento|__horario|__nota|__boton]`,
`afa-core-servicio-faq[__titulo|__item|__pregunta|__respuesta]`,
`afa-core-servicio-documentos[__titulo|__lista|__item|__nombre|__meta|__enlace]`,
`afa-core-servicio-indicadores[__titulo|__lista|__item|__etiqueta|__valor]`,
`afa-core-servicio-etiqueta[__categoria|__frecuencia|__destacado]`.
