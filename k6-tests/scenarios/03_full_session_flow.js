/**
 * SCENARIO 03 — Full Session Flow (Realistic User Journey)
 * ─────────────────────────────────────────────────────────
 * What it measures:
 *   - Simulates an actual user session end-to-end:
 *       Step 1 → POST /api/auth          (login)
 *       Step 2 → GET  /api/getUniqueID   (unique ID generation)
 *       Step 3 → POST /api/gateway       (getMenu)
 *       Step 4 → POST /api/gateway       (getRole)
 *       Step 5 → POST /api/gateway       (getBranch + setLoginBranchAndUserRole)
 *   - Reveals cumulative session startup latency a real user experiences
 *   - Each VU runs its own login (no shared token) — tests session isolation
 *
 * Run:
 *   k6 run scenarios/03_full_session_flow.js
 *   k6 run --out json=reports/03_full_session_flow.json scenarios/03_full_session_flow.js
 */

import http              from 'k6/http';
import { sleep, check }  from 'k6';
import { Trend, Rate }   from 'k6/metrics';
import { ENV }           from '../config/env.js';
import { authBody, gatewayBody } from '../helpers/auth.js';
import { buildHeaders }  from '../helpers/headers.js';
import { checkSuccess }  from '../helpers/checks.js';

// ─── Custom metrics ──────────────────────────────────────────────────────────
const sessionTotalTime  = new Trend('session_total_duration',       true);
const step1AuthTime     = new Trend('session_step1_auth',           true);
const step2UniqueIDTime = new Trend('session_step2_uniqueID',       true);
const step3MenuTime     = new Trend('session_step3_menu',           true);
const step4RoleTime     = new Trend('session_step4_role',           true);
const step5BranchTime   = new Trend('session_step5_branch',         true);
const sessionErrorRate  = new Rate('session_error_rate');

// ─── Test options ────────────────────────────────────────────────────────────
export const options = {
  scenarios: {
    full_session: {
      executor: 'ramping-vus',
      startVUs: 1,
      stages: [
        { duration: '30s', target: 5  },
        { duration: '60s', target: 20 },
        { duration: '30s', target: 0  },
      ],
    },
  },
  thresholds: {
    'session_total_duration': [`p(95)<3000`],  // full session < 3s
    'session_step1_auth':     [`p(95)<${ENV.THRESHOLD_P95_MS}`],
    'session_step3_menu':     [`p(95)<${ENV.THRESHOLD_P95_MS}`],
    'session_error_rate':     [`rate<${ENV.THRESHOLD_ERROR_RATE}`],
  },
};

// ─── Helper: gateway POST ────────────────────────────────────────────────────
function gw(apiKey, data, token) {
  const body = gatewayBody(apiKey, data);
  return http.post(
    `${ENV.BASE_URL}/api/gateway`,
    body,
    { headers: buildHeaders(body, token), tags: { endpoint: apiKey } },
  );
}

// ─── Test function ───────────────────────────────────────────────────────────
export default function () {
  const sessionStart = Date.now();
  let token;

  // ── Step 1: Login ──────────────────────────────────────────────────────────
  const loginBody = authBody();

  const step1 = http.post(`${ENV.BASE_URL}/api/auth`, loginBody, {
    headers: buildHeaders(loginBody),
    tags:    { step: 'login' },
  });

  step1AuthTime.add(step1.timings.duration);

  const loginOk = check(step1, {
    'step1: login 200':         (r) => r.status === 200,
    'step1: has APIWebToken':   (r) => {
      try { return !!JSON.parse(r.body).data.APIWebToken; } catch (_) { return false; }
    },
  });

  if (!loginOk) {
    sessionErrorRate.add(1);
    return;
  }

  token = JSON.parse(step1.body).data.APIWebToken;
  sleep(0.3);

  // ── Step 2: Get Unique ID ──────────────────────────────────────────────────
  const uidBody = JSON.stringify({});
  const step2 = http.post(`${ENV.BASE_URL}/api/getUniqueID`, uidBody, {
    headers: buildHeaders(uidBody, token),
    tags:    { step: 'uniqueID' },
  });
  step2UniqueIDTime.add(step2.timings.duration);
  checkSuccess(step2, 'step2: getUniqueID');
  sleep(0.2);

  // ── Step 3: Get Menu ───────────────────────────────────────────────────────
  const step3 = gw('authentication.userPrivilege.getMenu', {}, token);
  step3MenuTime.add(step3.timings.duration);
  checkSuccess(step3, 'step3: getMenu');
  sleep(0.2);

  // ── Step 4: Get Role ───────────────────────────────────────────────────────
  const step4 = gw('authentication.userPrivilege.getRole', {}, token);
  step4RoleTime.add(step4.timings.duration);
  checkSuccess(step4, 'step4: getRole');
  sleep(0.2);

  // ── Step 5: Get Branches ───────────────────────────────────────────────────
  const step5 = gw('authentication.userPrivilege.getInstitutionBranch', {}, token);
  step5BranchTime.add(step5.timings.duration);
  checkSuccess(step5, 'step5: getBranch');

  // ── Record total session time ─────────────────────────────────────────────
  const totalMs = Date.now() - sessionStart;
  sessionTotalTime.add(totalMs);
  sessionErrorRate.add(0);

  sleep(2);
}

// ─── Summary ─────────────────────────────────────────────────────────────────
export function handleSummary(data) {
  const steps = [
    ['session_step1_auth',     'Step 1 — Login'],
    ['session_step2_uniqueID', 'Step 2 — UniqueID'],
    ['session_step3_menu',     'Step 3 — GetMenu'],
    ['session_step4_role',     'Step 4 — GetRole'],
    ['session_step5_branch',   'Step 5 — GetBranch'],
    ['session_total_duration', 'TOTAL SESSION'],
  ];

  console.log('\n─── Full Session Flow Latency Summary ───');
  steps.forEach(([metric, label]) => {
    const v = data.metrics[metric]?.values;
    if (!v) return;
    console.log(`\n  ${label}`);
    console.log(`    avg : ${v.avg?.toFixed(1)} ms`);
    console.log(`    p95 : ${v['p(95)']?.toFixed(1)} ms`);
    console.log(`    max : ${v.max?.toFixed(1)} ms`);
  });

  return {
    'reports/03_full_session_summary.json': JSON.stringify(data, null, 2),
  };
}
