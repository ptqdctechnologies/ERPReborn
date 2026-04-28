/**
 * SCENARIO 08 — LDAP-Only Latency (isolated from DB / Redis / auto-login)
 * ────────────────────────────────────────────────────────────────────────
 * What it measures:
 *   - Pure LDAP bind latency as reported by setLogin.php via
 *     `data.serverTiming.ldap_ms` in the auth response.
 *   - Compares LDAP cost vs. full /api/auth HTTP round trip, so you can
 *     quantify how much of login is LDAP vs. other post-auth work.
 *   - Also captures db_session_ms, privileges_ms, redis_ms, engine_total_ms
 *     so you can see where the remaining time goes.
 *
 * Why this works:
 *   setLogin.php attaches a `serverTiming` object to its success response.
 *   This scenario hits /api/auth and pulls those fields out, recording each
 *   slice as its own k6 Trend metric. No separate endpoint needed.
 *
 * Run:
 *   k6 run scenarios/08_ldap_latency.js
 *   VIZ=1 make 08
 */

import http                from 'k6/http';
import { sleep, check }    from 'k6';
import { Trend, Rate }     from 'k6/metrics';
import { ENV }             from '../config/env.js';
import { authBody }        from '../helpers/auth.js';
import { buildHeaders }    from '../helpers/headers.js';

// ─── Metrics ──────────────────────────────────────────────────────────────────
const ldapDuration        = new Trend('ldap_bind_duration_ms',     true);
const dbSessionDuration   = new Trend('db_session_duration_ms',    true);
const privilegesDuration  = new Trend('privileges_duration_ms',    true);
const redisPrimaryDuration= new Trend('redis_primary_duration_ms', true);
const redisCacheDuration  = new Trend('redis_cache_duration_ms',   true);
const autoLoginDuration   = new Trend('auto_login_duration_ms',    true);
const engineTotalDuration = new Trend('engine_total_duration_ms',  true);
const httpTotalDuration   = new Trend('http_total_duration_ms',    true); // wire-level
const overheadDuration    = new Trend('non_engine_overhead_ms',    true); // HTTP – engine = middleware+network
// DB breakdown sourced from Helper_PostgreSQL's static counter
const dbTotalMs           = new Trend('db_total_ms',               true);
const dbReadMs            = new Trend('db_read_ms',                true);
const dbWriteMs           = new Trend('db_write_ms',               true);
const dbOtherMs           = new Trend('db_other_ms',               true);
const dbSlowestMs         = new Trend('db_slowest_single_ms',      true);
const dbTotalCount        = new Trend('db_total_queries');
const dbReadCount         = new Trend('db_read_queries');
const dbWriteCount        = new Trend('db_write_queries');
const missingTimingRate   = new Rate('ldap_timing_missing_rate');
const loginErrorRate      = new Rate('ldap_login_error_rate');

// ─── Options ──────────────────────────────────────────────────────────────────
export const options = {
  scenarios: {
    ldap_latency: {
      executor:  'ramping-vus',
      startVUs:  1,
      stages: [
        { duration: '30s', target: 5  },
        { duration: '60s', target: 10 },
        { duration: '30s', target: 20 },
        { duration: '30s', target: 0  },
      ],
    },
  },
  thresholds: {
    'ldap_bind_duration_ms':   [`p(95)<${ENV.THRESHOLD_P95_MS}`, `p(99)<${ENV.THRESHOLD_P99_MS}`],
    'ldap_login_error_rate':   [`rate<${ENV.THRESHOLD_ERROR_RATE}`],
    'ldap_timing_missing_rate':['rate<0.05'],   // server should always emit timing
  },
};

// ─── Iteration ────────────────────────────────────────────────────────────────
export default function () {
  const body = authBody();
  const res  = http.post(
    `${ENV.BASE_URL}/api/auth`,
    body,
    { headers: buildHeaders(body), tags: { endpoint: 'auth' } },
  );

  httpTotalDuration.add(res.timings.duration);

  const ok = check(res, {
    'status 200':           (r) => r.status === 200,
    'successStatus true':   (r) => {
      try { return JSON.parse(r.body).metadata?.successStatus === true; }
      catch { return false; }
    },
  });
  loginErrorRate.add(!ok);

  if (!ok) { sleep(0.5); return; }

  let timing;
  try { timing = JSON.parse(res.body).data?.serverTiming; } catch { timing = null; }

  if (!timing || timing.ldap_ms == null) {
    missingTimingRate.add(1);
    sleep(0.5);
    return;
  }
  missingTimingRate.add(0);

  ldapDuration.add(timing.ldap_ms);
  engineTotalDuration.add(timing.engine_total_ms);
  overheadDuration.add(Math.max(0, res.timings.duration - timing.engine_total_ms));

  if (timing.db_session_ms    != null) dbSessionDuration.add(timing.db_session_ms);
  if (timing.privileges_ms    != null) privilegesDuration.add(timing.privileges_ms);
  if (timing.redis_primary_ms != null) redisPrimaryDuration.add(timing.redis_primary_ms);
  if (timing.redis_cache_ms   != null) redisCacheDuration.add(timing.redis_cache_ms);
  if (timing.auto_login_ms    != null) autoLoginDuration.add(timing.auto_login_ms);

  // ── DB read/write breakdown (from Helper_PostgreSQL counter) ────────────────
  const db = timing.db;
  if (db) {
    if (db.total_ms    != null) dbTotalMs.add(db.total_ms);
    if (db.read_ms     != null) dbReadMs.add(db.read_ms);
    if (db.write_ms    != null) dbWriteMs.add(db.write_ms);
    if (db.other_ms    != null) dbOtherMs.add(db.other_ms);
    if (db.slowest_ms  != null) dbSlowestMs.add(db.slowest_ms);
    if (db.total_queries != null) dbTotalCount.add(db.total_queries);
    if (db.read_queries  != null) dbReadCount.add(db.read_queries);
    if (db.write_queries != null) dbWriteCount.add(db.write_queries);
  }

  sleep(0.5);
}

// ─── Summary ──────────────────────────────────────────────────────────────────
export function handleSummary(data) {
  const rows = [
    ['LDAP bind',              'ldap_bind_duration_ms'],
    ['DB session (INSERT+GET)','db_session_duration_ms'],
    ['Privileges (stored proc)','privileges_duration_ms'],
    ['Redis primary (token)',  'redis_primary_duration_ms'],
    ['Redis cache (menu etc.)','redis_cache_duration_ms'],
    ['Auto-login sub-call',    'auto_login_duration_ms'],
    ['Engine total',           'engine_total_duration_ms'],
    ['HTTP total (wire)',      'http_total_duration_ms'],
    ['Non-engine overhead',    'non_engine_overhead_ms'],
    ['DB all queries total',   'db_total_ms'],
    ['  ↳ reads  (GET/LIST)',  'db_read_ms'],
    ['  ↳ writes (SET/INS/UPD)','db_write_ms'],
    ['  ↳ other',              'db_other_ms'],
    ['DB slowest single query','db_slowest_single_ms'],
  ];

  console.log('\n─── LDAP Latency Breakdown ───────────────────────────────────');
  console.log('                            avg       p95       p99       max');
  rows.forEach(([label, metric]) => {
    const v = data.metrics[metric]?.values;
    if (!v) return;
    const fmt = (n) => (n == null ? '   -  ' : n.toFixed(1).padStart(7));
    console.log(`  ${label.padEnd(26)} ${fmt(v.avg)}   ${fmt(v['p(95)'])}   ${fmt(v['p(99)'])}   ${fmt(v.max)}`);
  });

  // Query counts (single-number metrics — just print the avg)
  const cntRows = [
    ['DB total query count',  'db_total_queries'],
    ['  ↳ read query count',  'db_read_queries'],
    ['  ↳ write query count', 'db_write_queries'],
  ];
  console.log('');
  cntRows.forEach(([label, metric]) => {
    const v = data.metrics[metric]?.values;
    if (!v) return;
    console.log(`  ${label.padEnd(26)} ${v.avg?.toFixed(1).padStart(7)} avg  (max ${v.max?.toFixed(0)})`);
  });

  const missing = data.metrics['ldap_timing_missing_rate']?.values?.rate;
  if (missing !== undefined && missing > 0) {
    console.log(`\n  ⚠ ${(missing * 100).toFixed(2)}% of responses had no serverTiming — check setLogin.php instrumentation.`);
  }

  return {
    'reports/08_ldap_latency_summary.json': JSON.stringify(data, null, 2),
  };
}
