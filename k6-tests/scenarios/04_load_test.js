/**
 * SCENARIO 04 — Sustained Load Test
 * ─────────────────────────────────
 * What it measures:
 *   - API behaviour under constant sustained load (not a spike)
 *   - Identifies degradation over time: memory leaks, connection pool exhaustion,
 *     Redis/DB saturation, Octane worker queue buildup
 *   - Runs 3 phases: ramp-up → steady state (10 min) → ramp-down
 *   - Thresholds enforce SLA throughout the entire run
 *
 * Run:
 *   k6 run scenarios/04_load_test.js
 *   k6 run --out json=reports/04_load_test.json scenarios/04_load_test.js
 */

import http       from 'k6/http';
import { sleep }  from 'k6';
import { Trend, Rate, Counter } from 'k6/metrics';
import { ENV }    from '../config/env.js';
import { login, gatewayBody } from '../helpers/auth.js';
import { buildHeaders }       from '../helpers/headers.js';
import { checkSuccess, logTiming } from '../helpers/checks.js';
import { ALL_READ_ENDPOINTS } from '../api_mapping.js';

// ─── Custom metrics ──────────────────────────────────────────────────────────
const reqDuration  = new Trend('load_req_duration',  true);
const errorRate    = new Rate('load_error_rate');
const timeouts     = new Counter('load_timeouts');

// ─── Test options ────────────────────────────────────────────────────────────
export const options = {
  scenarios: {
    sustained_load: {
      executor: 'ramping-vus',
      startVUs: 1,
      stages: [
        { duration: '2m',  target: 20  },  // ramp to working load
        { duration: '10m', target: 20  },  // hold — detect slow drift / leaks
        { duration: '2m',  target: 50  },  // brief stress bump
        { duration: '10m', target: 50  },  // hold at stress
        { duration: '2m',  target: 0   },  // cool-down
      ],
    },
  },
  thresholds: {
    'load_req_duration':  [
      `p(95)<${ENV.THRESHOLD_P95_MS}`,
      `p(99)<${ENV.THRESHOLD_P99_MS}`,
    ],
    'load_error_rate':    [`rate<${ENV.THRESHOLD_ERROR_RATE}`],
    'http_req_duration':  [`p(95)<${ENV.THRESHOLD_P95_MS}`],
    'http_req_failed':    [`rate<${ENV.THRESHOLD_ERROR_RATE}`],
  },
};

// ─── Setup ────────────────────────────────────────────────────────────────────
export function setup() {
  return { token: login() };
}

// ─── Test function ────────────────────────────────────────────────────────────
export default function ({ token }) {
  // Rotate across the full read-only API surface to simulate mixed traffic
  const ep   = ALL_READ_ENDPOINTS[Math.floor(Math.random() * ALL_READ_ENDPOINTS.length)];
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

  reqDuration.add(res.timings.duration);
  errorRate.add(res.status !== 200);
  if (res.status === 0) timeouts.add(1);

  logTiming(ep.apiKey, res);
  checkSuccess(res, 'load', ENV.THRESHOLD_P95_MS);

  sleep(Math.random() * 1 + 0.5);  // 0.5–1.5s think time
}

// ─── Summary ─────────────────────────────────────────────────────────────────
export function handleSummary(data) {
  const d = data.metrics['load_req_duration']?.values;
  const e = data.metrics['load_error_rate']?.values;
  const t = data.metrics['load_timeouts']?.values;

  console.log('\n─── Sustained Load Test Summary ───');
  if (d) {
    console.log(`  avg  : ${d.avg?.toFixed(1)} ms`);
    console.log(`  p90  : ${d['p(90)']?.toFixed(1)} ms`);
    console.log(`  p95  : ${d['p(95)']?.toFixed(1)} ms`);
    console.log(`  p99  : ${d['p(99)']?.toFixed(1)} ms`);
    console.log(`  max  : ${d.max?.toFixed(1)} ms`);
  }
  if (e) console.log(`  errors  : ${(e.rate * 100).toFixed(2)}%`);
  if (t) console.log(`  timeouts: ${t.count}`);

  return {
    'reports/04_load_test_summary.json': JSON.stringify(data, null, 2),
  };
}
