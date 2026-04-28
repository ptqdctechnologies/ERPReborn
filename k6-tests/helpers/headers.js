/**
 * Header generation helpers
 *
 * ERPReborn requires every request to carry:
 *   agent-datetime  — ISO-8601 current client time
 *   x-content-md5  — base64( md5( JSON.stringify(body) ) )
 *   x-request-id   — unique UUID per request
 *   expires        — ISO-8601 expiry time (agent-datetime + TTL)
 *   authorization  — "Bearer {APIWebToken}"  (gateway only)
 */

import { md5 }      from 'k6/crypto';
import encoding     from 'k6/encoding';
import { uuidv4 }  from 'https://jslib.k6.io/k6-utils/1.4.0/index.js';
import { ENV }     from '../config/env.js';

/**
 * Returns an ISO-8601 timestamp offset by `addSeconds`, WITH 6-digit
 * microseconds. ERPReborn's Helper_DateTime::getUnixTime() parses the
 * microsecond component using `explode('.', $string)[1]`; when the string
 * contains no dot, strict PHP 8.4 arithmetic downstream throws
 * "Unsupported operand types: string + int". Always emitting `.mmmmmm`
 * keeps us on the well-tested code path.
 *
 * e.g. agentDatetime(0)    → "2026-04-13T13:00:00.000000+07:00"
 *      agentDatetime(600)  → "2026-04-13T13:10:00.000000+07:00"
 */
export function agentDatetime(addSeconds = 0) {
  const now     = new Date(Date.now() + addSeconds * 1000);
  const pad     = (n) => String(n).padStart(2, '0');
  const offset  = ENV.TZ_OFFSET;                        // e.g. "+07:00"
  const [h, m]  = offset.replace(/[+-]/, '').split(':');
  const sign    = offset[0] === '+' ? 1 : -1;
  const local   = new Date(now.getTime() + sign * (Number(h) * 60 + Number(m)) * 60000);

  return (
    `${local.getUTCFullYear()}-` +
    `${pad(local.getUTCMonth() + 1)}-` +
    `${pad(local.getUTCDate())}T` +
    `${pad(local.getUTCHours())}:` +
    `${pad(local.getUTCMinutes())}:` +
    `${pad(local.getUTCSeconds())}.000000` +
    offset
  );
}

/**
 * Computes x-content-md5: base64( md5_bytes(jsonString) )
 * Matches PHP: base64_encode(md5($body))
 */
export function contentMD5(body) {
  const hex = md5(body, 'hex');
  return encoding.b64encode(hex);
}

/**
 * Builds the common headers required on every ERPReborn request.
 * Pass `token` to add the Authorization header (gateway endpoint).
 */
export function buildHeaders(body, token = null) {
  const bodyStr  = typeof body === 'string' ? body : JSON.stringify(body);
  const datetime = agentDatetime(0);
  const expires  = agentDatetime(ENV.REQUEST_TTL_SECONDS);

  const headers = {
    'Content-Type':   'application/json',
    'Accept':         'application/json',
    'agent-datetime': datetime,
    'x-content-md5':  contentMD5(bodyStr),
    'x-request-id':   uuidv4(),
    'expires':        expires,
  };

  if (token) {
    headers['authorization'] = `Bearer ${token}`;
  }

  return headers;
}
