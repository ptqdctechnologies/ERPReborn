/**
 * SCENARIO 01 — Authentication Endpoint Latency
 * ─────────────────────────────────────────────
 * What it measures:
 *   - Raw latency of POST /api/auth (login)
 *   - Validates MD5 header handling, date tolerance, and LDAP auth round-trip
 *   - Reveals: LDAP/Samba cost, session creation cost, Redis token write cost
 *
 * Run:
 *   k6 run scenarios/01_auth_latency.js
 *   k6 run --out json=reports/01_auth_latency.json scenarios/01_auth_latency.js
 */

import http           from 'k6/http';
import { sleep }      from 'k6';
import { Trend, Rate } from 'k6/metrics';
import { ENV }        from '../config/env.js';
import { authBody }    from '../helpers/auth.js';
import { buildHeaders } from '../helpers/headers.js';
import { checkSuccess } from '../helpers/checks.js';

// ─── Custom metrics ──────────────────────────────────────────────────────────
const loginDuration  = new Trend('auth_login_duration',  true);
const loginErrorRate = new Rate('auth_login_error_rate');

// ─── Test options ────────────────────────────────────────────────────────────
export const options = {
  scenarios: {
    auth_latency: {
      executor:        'ramping-vus',
      startVUs:        1,
      stages: [
        { duration: '30s', target: 5  },  // warm-up
        { duration: '60s', target: 10 },  // steady measurement
        { duration: '30s', target: 20 },  // mild stress
        { duration: '30s', target: 0  },  // ramp-down
      ],
    },
  },
  thresholds: {
    'auth_login_duration':   [
      `p(95)<${ENV.THRESHOLD_P95_MS}`,
      `p(99)<${ENV.THRESHOLD_P99_MS}`,
    ],
    'auth_login_error_rate': [`rate<${ENV.THRESHOLD_ERROR_RATE}`],
    'http_req_duration':     [`p(95)<${ENV.THRESHOLD_P95_MS}`],
  },
};

// ─── Test function (runs per VU per iteration) ───────────────────────────────
export default function () {
  const body = authBody();

  const res = http.post(
    `${ENV.BASE_URL}/api/auth`,
    body,
    {
      headers: buildHeaders(body),
      tags:    { endpoint: 'auth' },
    },
  );

  // Record custom metric
  loginDuration.add(res.timings.duration);
  loginErrorRate.add(res.status !== 200);

  // Standard checks
  checkSuccess(res, 'auth_login', ENV.THRESHOLD_P95_MS);

  sleep(1);
}

// ─── Summary ─────────────────────────────────────────────────────────────────
export function handleSummary(data) {
  const d = data.metrics['auth_login_duration']?.values;
  if (!d) return {};

  console.log('\n─── Auth Latency Summary ───');
  console.log(`  min   : ${d.min?.toFixed(1)} ms`);
  console.log(`  avg   : ${d.avg?.toFixed(1)} ms`);
  console.log(`  p(90) : ${d['p(90)']?.toFixed(1)} ms`);
  console.log(`  p(95) : ${d['p(95)']?.toFixed(1)} ms`);
  console.log(`  p(99) : ${d['p(99)']?.toFixed(1)} ms`);
  console.log(`  max   : ${d.max?.toFixed(1)} ms`);

  return {
    'reports/01_auth_latency_summary.json': JSON.stringify(data, null, 2),
  };
}
