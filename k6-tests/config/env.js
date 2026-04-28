/**
 * ERPReborn k6 Test Configuration
 * Edit these values to match your environment before running tests.
 */

export const ENV = {
  // ─── Target host ───────────────────────────────────────────────────────────
  BASE_URL: __ENV.BASE_URL || 'http://172.28.0.30:50080',

  // ─── Credentials ───────────────────────────────────────────────────────────
  USERNAME:  __ENV.API_USER     || 'admin',
  PASSWORD:  __ENV.API_PASSWORD || 'password',

  // ─── Timezone offset for agent-datetime header (Jakarta = +07:00) ──────────
  TZ_OFFSET: __ENV.TZ_OFFSET || '+07:00',

  // ─── Request TTL in seconds (must be within server's TIME_EXPIRED_REQUEST) ─
  REQUEST_TTL_SECONDS: 600,

  // ─── Branch / Role used in login payload ───────────────────────────────────
  BRANCH_REF_ID:    __ENV.BRANCH_REF_ID    || 11000000000004,
  USER_ROLE_REF_ID: __ENV.USER_ROLE_REF_ID || 95000000000038,

  // ─── Thresholds ─────────────────────────────────────────────────────────────
  THRESHOLD_P95_MS: 500,
  THRESHOLD_P99_MS: 1000,
  THRESHOLD_ERROR_RATE: 0.01,   // 1%

  // ─── Debug / verbose logging ─────────────────────────────────────────────
  // Set LOG_SQL=1 to print each API call (stored proc) with its timing.
  // Example: k6 run -e LOG_SQL=1 scenarios/04_load_test.js
  LOG_SQL: __ENV.LOG_SQL === '1',
};
