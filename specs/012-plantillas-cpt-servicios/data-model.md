# Data model — 012

El tema no guarda datos. Interfaz de lectura con el plugin (contrato §7):

| Elemento | Origen | Uso en el tema |
|---|---|---|
| `afa_servicio` (post) | plugin | Plantilla `single-afa_servicio`, Query Loop |
| `afa_servicio_categoria` | plugin | `post-terms` en la ficha |
| meta `afa_servicio_subtitulo` | plugin | `post-meta` en el hero |
| meta `afa_servicio_frecuencia` | plugin | `post-meta` en la ficha del listado |
| bloques `servicio-*` | plugin | Insertados en la plantilla |

Estados: servicio sin imagen / sin subtítulo / sin datos de bloque → elemento omitido.
