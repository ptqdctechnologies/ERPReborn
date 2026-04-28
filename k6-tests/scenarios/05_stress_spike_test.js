/**
 * SCENARIO 05 — Stress & Spike Test
 * ───────────────────────────────────
 * What it measures:
 *   - Breaking point: how many concurrent users before latency degrades / errors spike
 *   - Recovery speed: how quickly the system recovers after spike drops
 *   - Two sub-scenarios run in parallel:
 *       stress_ramp  — slow ramp to high VU count (find the ceiling)
 *       spike_burst  — instant VU surge then drop (simulate viral traffic)
 *
 * Target: FrankenPHP has 8 workers. Beyond ~8 concurrent long requests,
 * the worker queue will build up — this test finds that threshold.
 *
 * Run:
 *   k6 run scenarios/05_stress_spike_test.js
 *   k6 run --out json=reports/05_stress_spike.json scenarios/05_stress_spike_test.js
 */

import http       from 'k6/http';
import { sleep }  from 'k6';
import { Trend, Rate, Counter } from 'k6/metrics';
import { ENV }    from '../config/env.js';
import { login, gatewayBody } from '../helpers/auth.js';
import { buildHeaders }       from '../helpers/headers.js';
import { checkSuccess }       from '../helpers/checks.js';
import { PRIVILEGE }          from '../api_mapping.js';

// ─── Custom metrics ──────────────────────────────────────────────────────────
const stressDuration = new Trend('stress_req_duration', true);
const spikeDuration  = new Trend('spike_req_duration',  true);
const stressErrors   = new Rate('stress_error_rate');
const spikeErrors    = new Rate('spike_error_rate');
const timeouts       = new Counter('stress_spike_timeouts');

// ─── Test options ────────────────────────────────────────────────────────────
export const options = {
  scenarios: {
    // ── Scenario A: Stress ramp ─────────────────────────────────────────────
    stress_ramp: {
      executor:  'ramping-vus',
      startVUs:  1,
      stages: [
        { duration: '2m', target: 20  },
        { duration: '2m', target: 40  },
        { duration: '2m', target: 80  },
        { duration: '2m', target: 100 },
        { duration: '2m', target: 0   },  // recovery
      ],
      env: { SCENARIO: 'stress' },
    },

    // ── Scenario B: Spike burst ──────────────────────────────────────────────
    spike_burst: {
      executor:  'ramping-vus',
      startVUs:  1,
      stages: [
        { duration: '1m',  target: 5   },  // baseline
        { duration: '30s', target: 100 },  // instant spike
        { duration: '1m',  target: 100 },  // hold spike
        { duration: '30s', target: 5   },  // recover
        { duration: '2m',  target: 5   },  // post-recovery measurement
        { duration: '30s', target: 0   },
      ],
      startTime: '5m',  // start after stress scenario begins
      env: { SCENARIO: 'spike' },
    },
  },

  thresholds: {
    'stress_req_duration': [`p(99)<2000`],     // allow degradation under stress
    'spike_req_duration':  [`p(99)<3000`],     // spikes can be slower
    'stress_error_rate':   [`rate<0.05`],      // 5% error tolerance under stress
    'spike_error_rate':    [`rate<0.10`],      // 10% tolerance during spike
  },
};

// ─── Setup ────────────────────────────────────────────────────────────────────
export function setup() {
  return { token: login() };
}

// ─── Test function ────────────────────────────────────────────────────────────
export default function ({ token }) {
  const isSpike = __ENV.SCENARIO === 'spike';

  const body = gatewayBody(PRIVILEGE.getMenu.apiKey, PRIVILEGE.getMenu.data);
  const res  = http.post(
    `${ENV.BASE_URL}/api/gateway`,
    body,
    {
      headers: buildHeaders(body, token),
      tags:    { scenario: isSpike ? 'spike' : 'stress' },
      timeout: '15s',
    },
  );

  if (isSpike) {
    spikeDuration.add(res.timings.duration);
    spikeErrors.add(res.status !== 200);
  } else {
    stressDuration.add(res.timings.duration);
    stressErrors.add(res.status !== 200);
  }

  if (res.status === 0) timeouts.add(1);

  checkSuccess(res, isSpike ? 'spike' : 'stress');
  sleep(0.5);
}

// ─── Summary ─────────────────────────────────────────────────────────────────
export function handleSummary(data) {
  const printMetric = (label, metric) => {
    const v = data.metrics[metric]?.values;
    if (!v) return;
    console.log(`\n  [${label}]`);
    console.log(`    avg  : ${v.avg?.toFixed(1)} ms`);
    console.log(`    p95  : ${v['p(95)']?.toFixed(1)} ms`);
    console.log(`    p99  : ${v['p(99)']?.toFixed(1)} ms`);
    console.log(`    max  : ${v.max?.toFixed(1)} ms`);
  };

  const printRate = (label, metric) => {
    const v = data.metrics[metric]?.values;
    if (!v) return;
    console.log(`  ${label}: ${(v.rate * 100).toFixed(2)}%`);
  };

  console.log('\n─── Stress & Spike Test Summary ───');
  printMetric('Stress Ramp Latency', 'stress_req_duration');
  printMetric('Spike Burst Latency', 'spike_req_duration');
  printRate('Stress Error Rate', 'stress_error_rate');
  printRate('Spike Error Rate',  'spike_error_rate');

  const tc = data.metrics['stress_spike_timeouts']?.values?.count;
  if (tc !== undefined) console.log(`\n  Timeouts: ${tc}`);

  return {
    'reports/05_stress_spike_summary.json': JSON.stringify(data, null, 2),
  };
}
