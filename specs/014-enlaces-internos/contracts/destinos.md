# Contrato: rutas canónicas del tema → destino

| Ruta en patterns/plantillas | Destino al pintar | Si no hay destino |
|---|---|---|
| `/hazte-socio/` | Página con plantilla «Hazte Socio» | Ruta tal cual |
| `/contacto/` | Página con plantilla «Contacto» | Ruta tal cual |
| `/calendario/` | Página con plantilla «Calendario escolar» | Ruta tal cual |
| `/afa/` | Página con plantilla «AFA / Sobre nosotros» | Ruta tal cual |
| `/servicios/` | Página con plantilla «Servicios — Listado» | Ruta tal cual |
| `/configurador/` | Página con plantilla «Configurador de semana» | Ruta tal cual |
| `/servicios/comedor/` | Servicio (`afa_servicio`) `comedor` o `comedor-escolar` | Ruta tal cual |
| `/extraescolares/` | Archivo de `afa_extraescolar` | Ruta tal cual |
| `/noticias/` | Página de entradas | Ruta tal cual |
| `/privacidad/` | Ajustes → Privacidad (publicada) | Ruta tal cual |
| `#` | Sin enlace (texto gris / icono o botón oculto) | — |

Varias páginas con la misma plantilla: la que esté en la ruta canónica; si no, la más reciente. Se aceptan rutas relativas y absolutas del propio dominio. Para añadir rutas: filtro `afa_poveda_internal_link_targets`.

**Para la junta**: para cambiar adónde va «Hazte socio» (o Contacto, Calendario…), abre la página buena → Plantilla → elige la del tema. No hace falta tocar los botones.
