# ERPReborn k6 API Latency Test Suite

Measures API response time performance across the FrankenPHP + Laravel Octane backend.
Each scenario targets a specific performance concern.

---

## Folder Structure

```
k6-tests/
├── api_mapping.js                # Central API definitions (all 29+ read endpoints)
├── config/
│   └── env.js                    # Base URL, credentials, thresholds
├── helpers/
│   ├── headers.js                # agent-datetime, x-content-md5, x-request-id generation
│   ├── auth.js                   # login(), gatewayBody() helpers
│   └── checks.js                 # Shared check bundles + custom metrics
├── scenarios/
│   ├── 01_auth_latency.js        # POST /api/auth cold login latency
│   ├── 02_gateway_privilege.js   # Authenticated gateway calls (getMenu, getRole, getBranch)
│   ├── 03_full_session_flow.js   # Full user session: login → uniqueID → menu → role → branch
│   ├── 04_load_test.js           # Sustained load — rotates across ALL_READ_ENDPOINTS (29 endpoints)
│   ├── 05_stress_spike_test.js   # Stress ramp + spike burst (find breaking point)
│   ├── 06_soak_test.js           # Long-running endurance (default 2h, detects leaks)
│   └── 07_form_apis_read.js      # All 10 form group read endpoints, per-group latency metrics
├── reports/                      # JSON output from each run (gitignored)
└── README.md
```

---

## Prerequisites

```bash
# macOS
brew install k6

# Linux
sudo gpg -k
sudo gpg --no-default-keyring \
     --keyring /usr/share/keyrings/k6-archive-keyring.gpg \
     --keyserver hkp://keyserver.ubuntu.com:80 \
     --recv-keys C5AD17C747E3415A3642D57D77C6C491D6AC1D69
echo "deb [signed-by=/usr/share/keyrings/k6-archive-keyring.gpg] \
     https://dl.k6.io/deb stable main" | sudo tee /etc/apt/sources.list.d/k6.list
sudo apt-get update && sudo apt-get install k6

# Docker
docker pull grafana/k6
```

---

## Configuration

Edit `config/env.js` or pass values via environment variables:

| Variable          | Default               | Description                              |
|-------------------|-----------------------|------------------------------------------|
| `BASE_URL`        | `http://172.28.0.30:50080` | Target backend URL                  |
| `API_USER`        | `admin`               | Login username                           |
| `API_PASSWORD`    | `password`            | Login password                           |
| `TZ_OFFSET`       | `+07:00`              | Timezone for `agent-datetime` header     |
| `BRANCH_REF_ID`   | `11000000000004`      | Branch ID sent in login payload          |
| `USER_ROLE_REF_ID`| `95000000000038`      | Role ID sent in login payload            |

---

## Running Tests

### Quick start (single scenario)
```bash
cd k6-tests

# Scenario 01 — Auth latency
k6 run scenarios/01_auth_latency.js

# With custom URL and credentials
BASE_URL=http://localhost:50080 \
API_USER=myuser \
API_PASSWORD=mypass \
k6 run scenarios/02_gateway_privilege.js
```

### Save results to JSON
```bash
k6 run --out json=reports/01_auth_latency.json scenarios/01_auth_latency.js
```

### Run via Docker
```bash
docker run --rm -i \
  -e BASE_URL=http://172.28.0.30:50080 \
  -e API_USER=admin \
  -e API_PASSWORD=password \
  -v $(pwd):/scripts \
  grafana/k6 run /scripts/scenarios/01_auth_latency.js
```

---

## Scenario Reference

| # | File | Duration | Max VUs | Purpose |
|---|------|----------|---------|---------|
| 01 | `01_auth_latency.js` | ~2.5 min | 20 | Isolate login + LDAP cost |
| 02 | `02_gateway_privilege.js` | ~3 min | 30 | Authenticated gateway pipeline |
| 03 | `03_full_session_flow.js` | ~2 min | 20 | Real user session journey |
| 04 | `04_load_test.js` | ~26 min | 50 | Sustained load — rotates all 29 read endpoints |
| 05 | `05_stress_spike_test.js` | ~15 min | 100 | Breaking point + spike recovery |
| 06 | `06_soak_test.js` | 2h (default) | 15 | Memory leak / pool exhaustion — rotates all 29 read endpoints |
| 07 | `07_form_apis_read.js` | ~4 min | 10 | All 10 form group read APIs, per-group latency |

**Start here:**
```bash
# Day 1: establish baseline
k6 run --out json=reports/01.json scenarios/01_auth_latency.js
k6 run --out json=reports/02.json scenarios/02_gateway_privilege.js
k6 run --out json=reports/03.json scenarios/03_full_session_flow.js

# Form API baseline (all 10 form groups, read-only)
k6 run --out json=reports/07.json scenarios/07_form_apis_read.js
```

---

## Thresholds (SLA)

All scenarios enforce these by default (override in `config/env.js`):

| Metric | Threshold |
|--------|-----------|
| p(95) response time | < 500 ms |
| p(99) response time | < 1000 ms |
| Error rate | < 1% |

A threshold breach causes k6 to **exit with code 99** — useful in CI pipelines.

---

## Required HTTP Headers

ERPReborn validates every request against:

| Header | Value | Source |
|--------|-------|--------|
| `agent-datetime` | ISO-8601 current time with offset | `helpers/headers.js → agentDatetime()` |
| `x-content-md5` | `base64(md5(json_body))` | `helpers/headers.js → contentMD5()` |
| `x-request-id` | UUID v4 per request | `helpers/headers.js → buildHeaders()` |
| `expires` | `agent-datetime + 600s` | `helpers/headers.js → buildHeaders()` |
| `authorization` | `Bearer {APIWebToken}` | `helpers/auth.js → login()` |
| `Content-Type` | `application/json` | all requests |

---

## Interpreting Results

### Latency breakdown (what each number means for ERP)

| Metric | Expected (healthy) | Investigate if |
|--------|--------------------|----------------|
| `auth_login_duration p95` | 200–400 ms | > 500 ms → LDAP/Samba slow |
| `gateway_getMenu_duration p95` | 100–300 ms | > 400 ms → DB stored proc or N+1 |
| `session_total_duration p95` | 800 ms–2 s | > 3 s → cumulative pipeline issue |
| `load_req_duration p95` (steady) | ≤ 500 ms | Rising over time → memory leak |
| `soak_checkpoint_last_quarter p95` vs first quarter | ≤ +10% | > +25% → connection pool exhaustion |

### Key report files

After each run, `handleSummary()` writes JSON to `reports/`. Compare runs:
```bash
# Compare p95 before and after a fix
jq '.metrics.http_req_duration.values["p(95)"]' reports/02_before.json
jq '.metrics.http_req_duration.values["p(95)"]' reports/02_after_redis.json
```

---

## Soak Test Short Mode

The soak test defaults to 2 hours. For a quick 10-minute sanity check:
```bash
SOAK_DURATION=10m SOAK_VUS=5 k6 run scenarios/06_soak_test.js
```

---

## Monitoring During Tests

Run these alongside k6 to get infrastructure context:

```bash
# Container resource usage
watch -n2 docker stats --no-stream --format \
  "table {{.Name}}\t{{.CPUPerc}}\t{{.MemUsage}}\t{{.NetIO}}"

# PostgreSQL connection count
docker exec erp-db-postgresql psql -U SysEngine -d dbERPReborn \
  -c "SELECT state, COUNT(*) FROM pg_stat_activity GROUP BY state;"

# Slowest queries during test (requires pg_stat_statements extension)
docker exec erp-db-postgresql psql -U SysEngine -d dbERPReborn -c "
SELECT LEFT(query, 80), calls, round(mean_exec_time::numeric, 1) AS avg_ms
FROM pg_stat_statements ORDER BY mean_exec_time DESC LIMIT 10;"

# FrankenPHP/Octane logs
docker logs -f erp-php-backend-franken 2>&1 | grep -E "(error|slow|warn)"
```
