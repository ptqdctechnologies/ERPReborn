/**
 * One-shot SQL capture script.
 * Hits every ALL_READ_ENDPOINTS entry exactly once (1 VU, sequential).
 * Used to populate laravel.log with [SQL.query] lines for static analysis.
 * Run: k6 run -e LOG_SQL=1 k6-tests/scripts/sql_capture.js
 */
import http            from 'k6/http';
import { check }       from 'k6';
import { ENV }         from '../config/env.js';
import { login, gatewayBody } from '../helpers/auth.js';
import { buildHeaders }       from '../helpers/headers.js';
import { ALL_READ_ENDPOINTS } from '../api_mapping.js';

export const options = {
  vus:        1,
  iterations: ALL_READ_ENDPOINTS.length,
};

export function setup() {
  return { token: login() };
}

export default function ({ token }) {
  const ep   = ALL_READ_ENDPOINTS[__ITER];
  const body = gatewayBody(ep.apiKey, ep.data);
  const res  = http.post(
    `${ENV.BASE_URL}/api/gateway`,
    body,
    { headers: buildHeaders(body, token), timeout: '15s' },
  );
  check(res, {
    [`${ep.name}: 200`]:     (r) => r.status === 200,
    [`${ep.name}: success`]: (r) => {
      try { return JSON.parse(r.body).metadata.successStatus === true; }
      catch (_) { return false; }
    },
  });
}
