#!/usr/bin/env bash
# Comprobador de enlaces internos rotos (spec 014).
#
# Descarga las páginas indicadas, saca todos los enlaces al propio sitio y comprueba
# que cada uno responde 200 (siguiendo redirecciones). Solo hace peticiones GET de lectura.
#
# Uso:
#   docs/comprobar-enlaces.sh https://afapadrepoveda.org [ruta …]
#   docs/comprobar-enlaces.sh http://localhost:10048 / /noticias/ /extraescolares/
#
# Sin rutas, revisa la portada, el archivo de noticias y el de extraescolares.
# Sale con código 1 si hay algún enlace roto.

set -u

base="${1:?Indica la URL del sitio, p. ej. http://localhost:10048}"
base="${base%/}"
shift
paths=("$@")
[ ${#paths[@]} -eq 0 ] && paths=(/ /noticias/ /extraescolares/)

host="${base#*://}"
host="${host%%/*}"
tmp="$(mktemp -d)"
trap 'rm -rf "$tmp"' EXIT

for p in "${paths[@]}"; do
	curl -sL -m 60 "$base$p" |
		grep -oE 'href="[^"]+"' |
		sed -E 's/^href="//; s/"$//; s/&amp;/\&/g' |
		grep -vE '^(#|mailto:|tel:|javascript:)' |
		grep -vE '/(wp-content|wp-includes|wp-json)/|xmlrpc\.php|/feed/|\?ical=|oembed' |
		while read -r href; do
			case "$href" in
				//*) continue ;;
				/*) echo "$base$href" ;;
				http://"$host"*|https://"$host"*) echo "$href" ;;
				http://*|https://*) printf '%s\n' "$href" >> "$tmp/externos.txt" ;;
			esac
		done
done | sed 's/#.*$//' | sort -u > "$tmp/internos.txt"

rotos=0
while read -r url; do
	code="$(curl -s -o /dev/null -L -m 60 -w '%{http_code}' "$url")"
	if [ "$code" != "200" ]; then
		printf 'ROTO %s  %s\n' "$code" "$url"
		rotos=$((rotos + 1))
	fi
done < "$tmp/internos.txt"

total="$(wc -l < "$tmp/internos.txt" | tr -d ' ')"
externos=0
[ -f "$tmp/externos.txt" ] && externos="$(sort -u "$tmp/externos.txt" | grep -c .)"
printf '\n%s enlaces internos revisados, %s rotos. %s enlaces a otros dominios sin revisar (p. ej. el menú con otro dominio).\n' "$total" "$rotos" "$externos"
[ "$rotos" -eq 0 ]
