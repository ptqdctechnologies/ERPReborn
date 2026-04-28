/**
 * SCENARIO 06 — Soak / Endurance Test
 * ─────────────────────────────────────
 * What it measures:
 *   - Long-running reliability: memory leaks, connection pool exhaustion,
 *     Redis key expiry issues, log file growth, cron interference
 *   - Tracks latency drift over time — if p95 increases between hour 1 and hour 2,
 *     something is accumulating (unclosed connections, file handles, cache growth)
 *
 * Default duration: 2 hours at 15 VUs (adjust for your schedule)
 * Quick mode:       BASE_URL=... SOAK_DURATION=10m k6 run scenarios/06_soak_test.js
 *
 * Run:
 *   k6 run scenarios/06_soak_test.js
 *   k6 run --out json=reports/06_soak.json \
 *          -e SOAK_DURATION=30m \
 *          -e SOAK_VUS=10 \
 *          scenarios/06_soak_test.js
 */

import http       from 'k6/http';
import { sleep }  from 'k6';
import { Trend, Rate, Counter } from 'k6/metrics';
import { ENV }    from '../config/env.js';
import { login, gatewayBody } from '../helpers/auth.js';
import { buildHeaders }       from '../helpers/headers.js';
import { checkSuccess }       from '../helpers/checks.js';
import { ALL_READ_ENDPOINTS } from '../api_mapping.js';

// ─── Configurable via env ─────────────────────────────────────────────────────
const SOAK_DURATION = __ENV.SOAK_DURATION || '2h';
const SOAK_VUS      = Number(__ENV.SOAK_VUS || 15);
const RAMP_TIME     = '5m';

// ─── Custom metrics ──────────────────────────────────────────────────────────
const soakDuration  = new Trend('soak_req_duration', true);
const soakErrors    = new Rate('soak_error_rate');
const soakTimeouts  = new Counter('soak_timeouts');

// Checkpoint metrics — sampled every N requests to detect drift
const checkpoint1   = new Trend('soak_checkpoint_first_quarter',  true);
const checkpoint2   = new Trend('soak_checkpoint_second_quarter', true);
const checkpoint3   = new Trend('soak_checkpoint_third_quarter',  true);
const checkpoint4   = new Trend('soak_checkpoint_last_quarter',   true);

// ─── Test options ────────────────────────────────────────────────────────────
export const options = {
  scenarios: {
    soak: {
      executor: 'ramping-vus',
      startVUs: 1,
      stages: [
        { duration: RAMP_TIME,    target: SOAK_VUS },  // warm up
        { duration: SOAK_DURATION, target: SOAK_VUS }, // hold
        { duration: RAMP_TIME,    target: 0         }, // cool down
      ],
    },
  },
  thresholds: {
    'soak_req_duration': [
      `p(95)<${ENV.THRESHOLD_P95_MS}`,
      `p(99)<${ENV.THRESHOLD_P99_MS}`,
    ],
    'soak_error_rate': [`rate<${ENV.THRESHOLD_ERROR_RATE}`],
    'http_req_failed': [`rate<${ENV.THRESHOLD_ERROR_RATE}`],
  },
};

// ─── Setup ────────────────────────────────────────────────────────────────────
export function setup() {
  console.log(`Soak test: ${SOAK_DURATION} at ${SOAK_VUS} VUs`);
  return { token: login() };
}

// ─── Iteration counter (shared across VUs per instance) ──────────────────────
let iteration = 0;

// ─── Test function ────────────────────────────────────────────────────────────
export default function ({ token }) {
  iteration++;

  const ep   = ALL_READ_ENDPOINTS[iteration % ALL_READ_ENDPOINTS.length];
  const body = gatewayBody(ep.apiKey, ep.data);

  const res = http.post(
    `${ENV.BASE_URL}/api/gateway`,
    body,
    {
      headers: buildHeaders(body, token),
      tags:    { endpoint: ep.apiKey },
      timeout: '10s',
    },
  );

  // Record main metric
  soakDuration.add(res.timings.duration);
  soakErrors.add(res.status !== 200);
  if (res.status === 0) soakTimeouts.add(1);

  // Record drift checkpoints by VU iteration count
  const vuIter = __ITER;
  const totalExpectedIters = SOAK_VUS * 3600; // rough estimate
  const quarter = Math.floor(totalExpectedIters / 4);

  if (vuIter < quarter)                     checkpoint1.add(res.timings.duration);
  else if (vuIter < quarter * 2)            checkpoint2.add(res.timings.duration);
  else if (vuIter < quarter * 3)            checkpoint3.add(res.timings.duration);
  else                                      checkpoint4.add(res.timings.duration);

  checkSuccess(res, 'soak');
  sleep(Math.random() * 2 + 1);  // 1–3s think time (realistic pacing)
}

// ─── Summary ─────────────────────────────────────────────────────────────────
export function handleSummary(data) {
  const d  = data.metrics['soak_req_duration']?.values;
  const e  = data.metrics['soak_error_rate']?.values;
  const tc = data.metrics['soak_timeouts']?.values?.count;
  const checkpoints = [
    ['soak_checkpoint_first_quarter',  'Quarter 1 (fresh)'],
    ['soak_checkpoint_second_quarter', 'Quarter 2'],
    ['soak_checkpoint_third_quarter',  'Quarter 3'],
    ['soak_checkpoint_last_quarter',   'Quarter 4 (aged)'],
  ];

  console.log('\n─── Soak / Endurance Test Summary ───');
  if (d) {
    console.log('\n  Overall Latency:');
    console.log(`    avg  : ${d.avg?.toFixed(1)} ms`);
    console.log(`    p95  : ${d['p(95)']?.toFixed(1)} ms`);
    console.log(`    p99  : ${d['p(99)']?.toFixed(1)} ms`);
    console.log(`    max  : ${d.max?.toFixed(1)} ms`);
  }
  if (e)  console.log(`\n  Error rate : ${(e.rate * 100).toFixed(2)}%`);
  if (tc !== undefined) console.log(`  Timeouts   : ${tc}`);

  console.log('\n  Latency Drift (p95 per quarter — higher = degradation):');
  checkpoints.forEach(([metric, label]) => {
    const v = data.metrics[metric]?.values;
    if (v) console.log(`    ${label}: ${v['p(95)']?.toFixed(1)} ms`);
  });

  return {
    'reports/06_soak_summary.json': JSON.stringify(data, null, 2),
  };
}
