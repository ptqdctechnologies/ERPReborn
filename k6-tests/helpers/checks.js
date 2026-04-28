/**
 * Reusable check bundles and metric recorders
 */

import { check }  from 'k6';
import { Rate, Trend, Counter } from 'k6/metrics';
import { ENV }    from '../config/env.js';

// ─── Custom metrics (imported by scenario files) ─────────────────────────────
export const errorRate    = new Rate('erp_error_rate');
export const authLatency  = new Trend('erp_auth_latency',    true);
export const gatewayLatency = new Trend('erp_gateway_latency', true);
export const dbQueryLatency = new Trend('erp_db_query_latency', true);
export const timeoutCount = new Counter('erp_timeout_count');

/**
 * Standard success check for any ERPReborn response.
 * Records to the error rate metric.
 *
 * @param {object} res       - k6 http response
 * @param {string} label     - human label for check output
 * @param {number} [maxMs]   - optional latency threshold in ms
 * @returns {boolean}
 */
export function checkSuccess(res, label, maxMs = null) {
  const checks = {
    [`${label}: status 200`]:          (r) => r.status === 200,
    [`${label}: successStatus true`]:  (r) => {
      try {
        return JSON.parse(r.body).metadata.successStatus === true;
      } catch (_) { return false; }
    },
  };

  if (maxMs !== null) {
    checks[`${label}: latency < ${maxMs}ms`] = (r) => r.timings.duration < maxMs;
  }

  const passed = check(res, checks);
  errorRate.add(!passed);

  if (res.status === 0) timeoutCount.add(1);

  return passed;
}

/**
 * Extracts server-reported query timing from the response body if present.
 * ERPReborn stores timing inside metadata.queryTiming (if enabled).
 */
export function recordDBLatency(res) {
  try {
    const body = JSON.parse(res.body);
    const ms   = body?.metadata?.queryTiming?.durationMs;
    if (ms !== undefined) dbQueryLatency.add(ms);
  } catch (_) { /* not all endpoints expose this */ }
}

/**
 * Prints a single line showing the stored-procedure (apiKey) that was called
 * and its timing breakdown. Only outputs when LOG_SQL=1 is set.
 *
 * Output format:
 *   [SQL] authentication.userPrivilege.getMenu  HTTP: 245ms  DB: 180ms  status: 200
 *
 * @param {string} apiKey  - e.g. "authentication.userPrivilege.getMenu"
 * @param {object} res     - k6 http response object
 */
export function logTiming(apiKey, res) {
  if (!ENV.LOG_SQL) return;

  let dbMs = 'n/a';
  try {
    const body = JSON.parse(res.body);
    const ms   = body?.metadata?.queryTiming?.durationMs;
    if (ms !== undefined) dbMs = `${ms.toFixed(1)}ms`;
  } catch (_) { /* response may not carry timing */ }

  const http = res.timings.duration.toFixed(1);
  console.log(`[SQL] ${apiKey.padEnd(60)}  HTTP: ${String(http + 'ms').padStart(9)}  DB: ${String(dbMs).padStart(9)}  status: ${res.status}`);
}
