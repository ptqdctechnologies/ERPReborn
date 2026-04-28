/**
 * SCENARIO 02 — Gateway Privilege Endpoints Latency
 * ─────────────────────────────────────────────────
 * What it measures:
 *   - Full authenticated gateway pipeline: header validation → token check
 *     → engine dispatch → DB stored proc → response serialization
 *   - Tests the most-called post-login endpoints:
 *       • authentication.userPrivilege.getMenu
 *       • authentication.userPrivilege.getRole
 *       • authentication.userPrivilege.getInstitutionBranch
 *   - Reveals: Redis token lookup cost, engine file resolution, DB query cost
 *
 * Run:
 *   k6 run scenarios/02_gateway_privilege.js
 *   k6 run --out json=reports/02_gateway_privilege.json scenarios/02_gateway_privilege.js
 */

import http        from 'k6/http';
import { sleep }   from 'k6';
import { Trend, Rate } from 'k6/metrics';
import { ENV }     from '../config/env.js';
import { login, gatewayBody } from '../helpers/auth.js';
import { buildHeaders }       from '../helpers/headers.js';
import { checkSuccess, recordDBLatency } from '../helpers/checks.js';

// ─── Custom metrics ──────────────────────────────────────────────────────────
const menuLatency   = new Trend('gateway_getMenu_duration',   true);
const roleLatency   = new Trend('gateway_getRole_duration',   true);
const branchLatency = new Trend('gateway_getBranch_duration', true);
const errorRate     = new Rate('gateway_privilege_error_rate');

// ─── Test options ────────────────────────────────────────────────────────────
export const options = {
  scenarios: {
    gateway_privilege: {
      executor: 'ramping-vus',
      startVUs: 1,
      stages: [
        { duration: '30s', target: 5  },
        { duration: '60s', target: 15 },
        { duration: '60s', target: 30 },
        { duration: '30s', target: 0  },
      ],
    },
  },
  thresholds: {
    'gateway_getMenu_duration':      [`p(95)<${ENV.THRESHOLD_P95_MS}`],
    'gateway_getRole_duration':      [`p(95)<${ENV.THRESHOLD_P95_MS}`],
    'gateway_getBranch_duration':    [`p(95)<${ENV.THRESHOLD_P95_MS}`],
    'gateway_privilege_error_rate':  [`rate<${ENV.THRESHOLD_ERROR_RATE}`],
  },
};

// ─── Setup: login once, share token across all VUs ───────────────────────────
export function setup() {
  return { token: login() };
}

// ─── Helpers ─────────────────────────────────────────────────────────────────
function post(apiKey, data, token, trend, label) {
  const body = gatewayBody(apiKey, data);
  const res  = http.post(
    `${ENV.BASE_URL}/api/gateway`,
    body,
    {
      headers: buildHeaders(body, token),
      tags:    { endpoint: apiKey },
    },
  );
  trend.add(res.timings.duration);
  errorRate.add(res.status !== 200);
  checkSuccess(res, label);
  recordDBLatency(res);
  return res;
}

// ─── Test function ───────────────────────────────────────────────────────────
export default function ({ token }) {
  // 1. Get user menu (hits DB — menu table stored proc)
  post(
    'authentication.userPrivilege.getMenu',
    {},
    token,
    menuLatency,
    'getMenu',
  );
  sleep(0.5);

  // 2. Get user roles
  post(
    'authentication.userPrivilege.getRole',
    {},
    token,
    roleLatency,
    'getRole',
  );
  sleep(0.5);

  // 3. Get institution branches
  post(
    'authentication.userPrivilege.getInstitutionBranch',
    {},
    token,
    branchLatency,
    'getBranch',
  );
  sleep(1);
}

// ─── Summary ─────────────────────────────────────────────────────────────────
export function handleSummary(data) {
  const metrics = ['gateway_getMenu_duration', 'gateway_getRole_duration', 'gateway_getBranch_duration'];

  console.log('\n─── Gateway Privilege Latency Summary ───');
  metrics.forEach((m) => {
    const v = data.metrics[m]?.values;
    if (!v) return;
    const label = m.replace('gateway_', '').replace('_duration', '');
    console.log(`\n  [${label}]`);
    console.log(`    avg  : ${v.avg?.toFixed(1)} ms`);
    console.log(`    p95  : ${v['p(95)']?.toFixed(1)} ms`);
    console.log(`    p99  : ${v['p(99)']?.toFixed(1)} ms`);
    console.log(`    max  : ${v.max?.toFixed(1)} ms`);
  });

  return {
    'reports/02_gateway_privilege_summary.json': JSON.stringify(data, null, 2),
  };
}
