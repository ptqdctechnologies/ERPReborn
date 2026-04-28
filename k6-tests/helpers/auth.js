/**
 * Authentication helper
 *
 * Call `login()` once in a test's setup() phase to obtain an APIWebToken,
 * then pass the token to buildHeaders() for all gateway requests.
 */

import http          from 'k6/http';
import { check, fail } from 'k6';
import { ENV }       from '../config/env.js';
import { buildHeaders } from './headers.js';
import { AUTH }      from '../api_mapping.js';

/**
 * Accepts either a numeric reference ID or the string 'AUTO'. The backend
 * JSON schema allows both (pattern ^AUTO$ or integer ≥ 1).
 */
function refID(value) {
  if (value === 'AUTO' || value === 'auto') return 'AUTO';
  return Number(value);
}

/**
 * Builds the login request body for authentication.general.setLogin.
 * Exported so scenarios that need to time the login call directly
 * (01_auth_latency, 03_full_session_flow) can reuse the same envelope.
 *
 * Note: POST /api/auth is dedicated to setLogin, so metadata.API does NOT
 * carry a `key` field — its JSONRequestSchema declares only `version` and
 * the schema validator rejects the request otherwise. The API key still
 * lives in api_mapping.js → AUTH.setLogin for reference/documentation.
 */
export function authBody() {
  void AUTH; // keeps the import as a documentation reference
  return JSON.stringify({
    metadata: {
      API: { version: 'latest' },
    },
    data: {
      userName:     ENV.USERNAME,
      userPassword: ENV.PASSWORD,
      additionalData: {
        branch_RefID:   refID(ENV.BRANCH_REF_ID),
        userRole_RefID: refID(ENV.USER_ROLE_REF_ID),
      },
    },
  });
}

/**
 * Performs a login against /api/auth and returns the APIWebToken string.
 * Intended for use inside k6 setup() — runs once before VUs start.
 *
 * @returns {string} APIWebToken
 */
export function login() {
  const body = authBody();

  const res = http.post(
    `${ENV.BASE_URL}/api/auth`,
    body,
    { headers: buildHeaders(body) },
  );

  const ok = check(res, {
    'login: status 200':    (r) => r.status === 200,
    'login: has APIWebToken': (r) => {
      try {
        return JSON.parse(r.body).data.APIWebToken !== undefined;
      } catch (_) { return false; }
    },
  });

  if (!ok) {
    fail(`Login failed — status ${res.status}: ${res.body}`);
  }

  return JSON.parse(res.body).data.APIWebToken;
}

/**
 * Builds a gateway request body with the standard metadata envelope.
 *
 * @param {string} apiKey   - e.g. "authentication.userPrivilege.getMenu"
 * @param {object} data     - payload for the "data" key
 * @returns {string} JSON string ready to POST
 */
export function gatewayBody(apiKey, data = {}) {
  return JSON.stringify({
    metadata: {
      API: {
        key:     apiKey,
        version: 'latest',
      },
    },
    data,
  });
}
