#!/usr/bin/env bash
# ─── ERPReborn — authentication.general.setLogin curl helper ─────────────────
# Mirrors the header contract produced by k6-tests/helpers/headers.js:
#   agent-datetime   ISO-8601 now
#   expires          ISO-8601 now + TTL
#   x-content-md5    base64( md5_hex( body ) )
#   x-request-id     UUID v4
#
# Usage:
#   ./k6-tests/scripts/curl-login.sh
#   BASE_URL=http://localhost:10080 API_USER=redi API_PASSWORD=redi1234 \
#     ./k6-tests/scripts/curl-login.sh
#
# Output: JSON response (pretty-printed if jq is installed).

set -euo pipefail

BASE_URL="${BASE_URL:-http://localhost:10080}"
USERNAME="${API_USER:-redi}"
PASSWORD="${API_PASSWORD:-redi1234}"
BRANCH_REF_ID="${BRANCH_REF_ID:-AUTO}"
USER_ROLE_REF_ID="${USER_ROLE_REF_ID:-AUTO}"
TTL_SECONDS="${TTL_SECONDS:-600}"
TZ_OFFSET="${TZ_OFFSET:-+07:00}"
VERBOSE="${VERBOSE:-0}"

# ─── Body ────────────────────────────────────────────────────────────────────
# /api/auth is dedicated to authentication.general.setLogin, so metadata.API
# has only `version` — the schema validator rejects extra fields like `key`.
#
# branch_RefID and userRole_RefID must be either:
#   • an integer ≥ 1  (emit bare, no quotes), OR
#   • the literal string "AUTO"  (emit quoted)
# fmt_refid picks the right encoding based on the value.
fmt_refid() {
    if [[ "$1" =~ ^-?[0-9]+$ ]]; then
        printf '%s' "$1"
    else
        printf '"%s"' "$1"
    fi
}
BRANCH_JSON=$(fmt_refid "$BRANCH_REF_ID")
ROLE_JSON=$(fmt_refid "$USER_ROLE_REF_ID")

BODY=$(printf '{"metadata":{"API":{"version":"latest"}},"data":{"userName":"%s","userPassword":"%s","additionalData":{"branch_RefID":%s,"userRole_RefID":%s}}}' \
    "$USERNAME" "$PASSWORD" "$BRANCH_JSON" "$ROLE_JSON")

# ─── x-content-md5 = base64(md5_hex(body)) ───────────────────────────────────
if command -v md5sum >/dev/null 2>&1; then
    MD5_HEX=$(printf '%s' "$BODY" | md5sum | awk '{print $1}')
else
    MD5_HEX=$(printf '%s' "$BODY" | md5 -q 2>/dev/null || printf '%s' "$BODY" | md5)
fi
CONTENT_MD5=$(printf '%s' "$MD5_HEX" | base64)

# ─── x-request-id (UUID v4) ──────────────────────────────────────────────────
if command -v uuidgen >/dev/null 2>&1; then
    REQUEST_ID=$(uuidgen | tr '[:upper:]' '[:lower:]')
else
    REQUEST_ID=$(python3 -c 'import uuid; print(uuid.uuid4())')
fi

# ─── agent-datetime / expires ────────────────────────────────────────────────
# Parse TZ_OFFSET (±HH:MM) into seconds, add to UTC epoch, format with the
# literal offset suffix. Works on both BSD (macOS) and GNU date.
SIGN="${TZ_OFFSET:0:1}"
OFF_H="${TZ_OFFSET:1:2}"
OFF_M="${TZ_OFFSET:4:2}"
OFF_SEC=$(( (10#$OFF_H * 60 + 10#$OFF_M) * 60 ))
[[ "$SIGN" == "-" ]] && OFF_SEC=$(( -OFF_SEC ))

NOW_UTC=$(date -u +%s)
LOCAL_NOW=$(( NOW_UTC + OFF_SEC ))
LOCAL_EXP=$(( NOW_UTC + OFF_SEC + TTL_SECONDS ))

fmt_iso() {
    # Emits ISO-8601 with 6-digit microseconds. ERPReborn's Helper_DateTime
    # (line ~1330) assumes a `.` separator exists in the string to extract
    # microseconds; without it the parsed microsecond becomes empty and
    # downstream arithmetic hits "string + int" TypeError on PHP 8.4.
    if date -u -r "$1" '+%Y-%m-%dT%H:%M:%S' >/dev/null 2>&1; then
        date -u -r "$1" "+%Y-%m-%dT%H:%M:%S.000000${TZ_OFFSET}"   # BSD / macOS
    else
        date -u -d "@$1" "+%Y-%m-%dT%H:%M:%S.000000${TZ_OFFSET}"  # GNU
    fi
}
AGENT_DT=$(fmt_iso "$LOCAL_NOW")
EXPIRES=$(fmt_iso "$LOCAL_EXP")

# ─── Debug trace ─────────────────────────────────────────────────────────────
if [[ "$VERBOSE" == "1" ]]; then
    echo "POST ${BASE_URL}/api/auth" >&2
    echo "  agent-datetime : ${AGENT_DT}" >&2
    echo "  expires        : ${EXPIRES}" >&2
    echo "  x-content-md5  : ${CONTENT_MD5}" >&2
    echo "  x-request-id   : ${REQUEST_ID}" >&2
    echo "  body           : ${BODY}" >&2
    echo >&2
fi

# ─── Fire ────────────────────────────────────────────────────────────────────
RAW=$(curl -sS -X POST "${BASE_URL}/api/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "agent-datetime: ${AGENT_DT}" \
    -H "expires: ${EXPIRES}" \
    -H "x-content-md5: ${CONTENT_MD5}" \
    -H "x-request-id: ${REQUEST_ID}" \
    --data-raw "$BODY")

if command -v jq >/dev/null 2>&1; then
    printf '%s' "$RAW" | jq .
else
    printf '%s\n' "$RAW"
fi
