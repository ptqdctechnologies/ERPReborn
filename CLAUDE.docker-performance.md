# ERPReborn — Docker Infrastructure Performance Analysis & Testing Guide

> Last updated: 2026-04-13 | Author: Claude (claude/tender-thompson session)
> Companion to: CLAUDE.md (application-level bottlenecks)

---

## 1. Infrastructure Overview

```
┌─────────────────────────────────────────────────────────┐
│                  app-network (172.28.0.0/16)            │
│                                                         │
│  [Client] → php-backend-franken (172.28.0.30:50080)    │
│               FrankenPHP / Laravel Octane               │
│               8 workers, max-requests=1000              │
│                  ↓                    ↓                 │
│  db-postgresql (172.28.0.2)   cache-redis (172.28.0.5) │
│  PostgreSQL 18, shared=128MB  Redis (latest)            │
│                  ↓                                      │
│  auth-samba (172.28.0.7) ← LDAP auth on every request  │
│                                                         │
│  monitoring-percona (172.28.0.111) ← PMM server        │
└─────────────────────────────────────────────────────────┘
```

**Active primary backend:** `php-backend-franken` (FrankenPHP + Laravel Octane)
**Legacy variant:** `php-apache-backend` (Apache + PHP-FPM, port 10080)

---

## 2. Current Docker Performance Settings (with Problems)

### 2.1 FrankenPHP / Laravel Octane Container

| Setting | Current Value | Recommended | Impact |
|---------|--------------|-------------|--------|
| Workers | `--workers=8` | 2× CPU cores (e.g. 16 on 8-core host) | Concurrency ceiling |
| Max requests | `--max-requests=1000` | 500–2000 (tune per memory) | Memory leak prevention |
| Watch mode | `--watch` (ENABLED) | Disable in production | ~5% CPU overhead polling filesystem |
| PHP memory limit | `-1` (unlimited) | 256M–512M | Risk of OOM kills |
| Compression | zstd, br, gzip ✓ | Keep, zstd is optimal | Reduces payload 60–80% |

**Critical:** `--watch` flag causes FrankenPHP to inotify-watch all files for hot-reload. This is a **dev-only** feature. Remove in production.

**Current startup command (Dockerfile):**
```bash
php artisan octane:frankenphp \
  --workers=8 \
  --caddyfile="/var/www/html/WebBackEnd/Caddyfile" \
  --max-requests=1000 \
  --watch
```

**Recommended production command:**
```bash
php artisan octane:frankenphp \
  --workers=16 \
  --caddyfile="/var/www/html/WebBackEnd/Caddyfile" \
  --max-requests=500 \
  --log-level=warn
```

### 2.2 PostgreSQL Container

| Setting | Current Value | Recommended | Why |
|---------|--------------|-------------|-----|
| `shared_buffers` | `128MB` | 25% of container RAM (e.g. 1–4GB) | Main DB memory cache |
| `max_connections` | `100` | 25–50 (use PgBouncer for higher) | Each connection = ~10MB RAM |
| `work_mem` | not set (4MB default) | 16–64MB | Sort/hash performance |
| `effective_cache_size` | not set | 75% of container RAM | Query planner hint |
| `wal_buffers` | not set (-1, auto) | 16MB | WAL write performance |
| `autovacuum_worker_slots` | `16` | Keep — high tx volume assumed | Already aggressive |
| `statement_timeout` | not set | 30000ms (30s) | Prevent runaway queries |
| `idle_in_transaction_session_timeout` | not set | 10000ms | Prevent connection starvation |
| `log_min_duration_statement` | not set | 200ms | Log slow queries |

**Config file location in container:** `/var/lib/postgresql/18/docker/postgresql.conf`

**Recommended additions to postgresql.conf:**
```conf
# Memory (adjust based on container RAM allocation)
shared_buffers = 1GB
effective_cache_size = 3GB
work_mem = 32MB
maintenance_work_mem = 256MB
wal_buffers = 16MB

# Connections
max_connections = 50
idle_in_transaction_session_timeout = 10000

# Timeouts
statement_timeout = 30000
lock_timeout = 5000

# Slow query logging
log_min_duration_statement = 200
log_line_prefix = '%m [%p] %q%u@%d '

# Planner
random_page_cost = 1.1       # for SSD storage
effective_io_concurrency = 200  # for SSD
```

### 2.3 Redis Container

| Setting | Current Value | Recommended |
|---------|--------------|-------------|
| Max memory | not set | Set `maxmemory 512mb` |
| Eviction policy | not set | `allkeys-lru` for cache use |
| Persistence | RDB default | `appendonly no` for pure cache |
| `vm.overcommit_memory` | `1` (via sysctl) ✓ | Already correct |

**Redis is configured but Laravel app has `CACHE_DRIVER=file` — fix this first.**

### 2.4 Missing: Connection Pooler (PgBouncer)

The application issues `pg_connect()` per query with no pooling. At scale this creates:
- PostgreSQL connection overhead (10–50ms per new connection)
- Max 100 concurrent connections (PostgreSQL limit)
- Each connection holds ~10MB RAM in PostgreSQL

**Recommended: Add PgBouncer service to docker-compose.yml:**

```yaml
pgbouncer:
  image: pgbouncer/pgbouncer:latest
  container_name: erp-pgbouncer
  networks:
    app-network:
      ipv4_address: 172.28.0.6
  environment:
    DATABASES_HOST: 172.28.0.2
    DATABASES_PORT: 5432
    DATABASES_DBNAME: dbERPReborn
    DATABASES_USER: SysEngine
    DATABASES_PASSWORD: 748159263
    POOL_MODE: transaction          # Best for Laravel
    MAX_CLIENT_CONN: 500
    DEFAULT_POOL_SIZE: 20
    RESERVE_POOL_SIZE: 5
    SERVER_IDLE_TIMEOUT: 600
    LOG_CONNECTIONS: 0
    LOG_DISCONNECTIONS: 0
  ports:
    - "172.28.0.6:5432:5432"
  restart: unless-stopped
```

Then update `config/database.php` to point to `172.28.0.6:5432` (PgBouncer) instead of `172.28.0.2:5432`.

### 2.5 Missing: Resource Limits

No `deploy.resources` defined for any container. Add to prevent resource starvation:

```yaml
# In docker-compose.yml under each service:
deploy:
  resources:
    limits:
      cpus: '4.0'
      memory: 2G
    reservations:
      cpus: '1.0'
      memory: 512M
```

### 2.6 Missing: Health Checks

No health checks defined. Add these to docker-compose.yml:

```yaml
db-postgresql:
  healthcheck:
    test: ["CMD-SHELL", "pg_isready -U SysEngine -d dbERPReborn"]
    interval: 10s
    timeout: 5s
    retries: 5

cache-redis:
  healthcheck:
    test: ["CMD", "redis-cli", "ping"]
    interval: 10s
    timeout: 3s
    retries: 3

php-backend-franken:
  healthcheck:
    test: ["CMD", "curl", "-f", "http://localhost:80/api/health"]
    interval: 30s
    timeout: 10s
    retries: 3
    start_period: 30s
```

---

## 3. Performance Measurement: Tools & Methods

### 3.1 HTTP Load Testing — Primary Tools

#### Option A: k6 (Recommended — scripted, CI-friendly)

```bash
# Install
brew install k6

# Basic load test script: test-api-load.js
```

```javascript
// test-api-load.js
import http from 'k6/http';
import { check, sleep } from 'k6';
import { Rate } from 'k6/metrics';

const errorRate = new Rate('errors');

export const options = {
  stages: [
    { duration: '30s', target: 10 },   // ramp up to 10 users
    { duration: '60s', target: 50 },   // hold at 50 users
    { duration: '30s', target: 100 },  // spike to 100
    { duration: '30s', target: 0 },    // ramp down
  ],
  thresholds: {
    http_req_duration: ['p(95)<500'],  // 95% under 500ms
    http_req_duration: ['p(99)<1000'], // 99% under 1s
    errors: ['rate<0.01'],             // <1% errors
  },
};

const BASE_URL = 'http://172.28.0.30:50080';  // FrankenPHP backend

export default function () {
  const params = {
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      // Add required ERPReborn headers:
      'date': new Date().toUTCString(),
      'x-request-id': `test-${Math.random().toString(36).substr(2, 9)}`,
    },
  };

  const res = http.get(`${BASE_URL}/api/v1/your-endpoint`, params);

  check(res, {
    'status is 200': (r) => r.status === 200,
    'response time < 500ms': (r) => r.timings.duration < 500,
  });

  errorRate.add(res.status !== 200);
  sleep(1);
}
```

```bash
# Run test
k6 run test-api-load.js

# Output to JSON for analysis
k6 run --out json=results.json test-api-load.js

# Real-time InfluxDB + Grafana integration
k6 run --out influxdb=http://localhost:8086/k6 test-api-load.js
```

#### Option B: Apache Bench (ab) — Quick smoke test

```bash
# Install (comes with Apache)
brew install httpd

# 1000 requests, 10 concurrent
ab -n 1000 -c 10 \
   -H "date: $(date -u '+%a, %d %b %Y %H:%M:%S GMT')" \
   -H "x-content-md5: d41d8cd98f00b204e9800998ecf8427e" \
   -H "x-request-id: bench-001" \
   http://172.28.0.30:50080/api/v1/your-endpoint

# Key metrics to watch:
# - Requests per second
# - Time per request (mean)
# - Time per request (concurrent mean)
# - Percentage of requests served within X ms
```

#### Option C: wrk (HTTP benchmarking)

```bash
# Install
brew install wrk

# 30s test, 12 threads, 400 connections
wrk -t12 -c400 -d30s \
    --header "date: $(date -u '+%a, %d %b %Y %H:%M:%S GMT')" \
    http://172.28.0.30:50080/api/v1/your-endpoint

# With Lua script for POST requests and custom headers
wrk -t4 -c100 -d30s -s post_script.lua \
    http://172.28.0.30:50080/api/v1/your-endpoint
```

#### Option D: Vegeta (constant rate testing)

```bash
# Install
brew install vegeta

# Create target file
echo 'GET http://172.28.0.30:50080/api/v1/endpoint' > targets.txt

# Attack at 50 req/s for 60 seconds
vegeta attack -targets=targets.txt -rate=50 -duration=60s | \
  vegeta report

# Generate histogram
vegeta attack -targets=targets.txt -rate=50 -duration=60s | \
  vegeta report -type=hist[0,100ms,200ms,300ms,500ms,1000ms]
```

---

### 3.2 PostgreSQL Query Analysis

#### Identify Slow Queries

```sql
-- Enable slow query logging (add to postgresql.conf):
-- log_min_duration_statement = 200

-- Or query pg_stat_statements (requires extension):
CREATE EXTENSION IF NOT EXISTS pg_stat_statements;

-- View top 20 slowest queries
SELECT
    query,
    calls,
    round(total_exec_time::numeric, 2) AS total_ms,
    round(mean_exec_time::numeric, 2) AS avg_ms,
    round(stddev_exec_time::numeric, 2) AS stddev_ms,
    rows
FROM pg_stat_statements
ORDER BY mean_exec_time DESC
LIMIT 20;

-- Reset stats
SELECT pg_stat_statements_reset();
```

#### Check Active Connections and Wait Events

```sql
-- Current connections and states
SELECT
    pid,
    usename,
    application_name,
    client_addr,
    state,
    wait_event_type,
    wait_event,
    query_start,
    NOW() - query_start AS duration,
    LEFT(query, 100) AS query_preview
FROM pg_stat_activity
WHERE state != 'idle'
ORDER BY duration DESC;

-- Connection count by state
SELECT state, COUNT(*) FROM pg_stat_activity GROUP BY state;

-- Lock contention
SELECT
    blocked.pid AS blocked_pid,
    blocked.query AS blocked_query,
    blocking.pid AS blocking_pid,
    blocking.query AS blocking_query
FROM pg_stat_activity blocked
JOIN pg_stat_activity blocking
  ON blocking.pid = ANY(pg_blocking_pids(blocked.pid))
WHERE blocked.cardinality(pg_blocking_pids(blocked.pid)) > 0;
```

#### EXPLAIN ANALYZE for Stored Procedures

```sql
-- Profile a specific stored procedure call
EXPLAIN (ANALYZE, BUFFERS, FORMAT TEXT)
SELECT * FROM SchSysConfig.Func_TblXxx_GET(
    '{"userSession": "..."}'::jsonb
);

-- Key things to look for:
-- Seq Scan (bad for large tables) vs Index Scan (good)
-- Rows removed by filter (index selectivity)
-- Shared hit vs read (cache hit vs disk I/O)
-- Planning time vs execution time
```

---

### 3.3 Docker Container Metrics

#### Real-time Resource Monitoring

```bash
# Live stats for all containers
docker stats

# Stats with custom format
docker stats --format \
  "table {{.Name}}\t{{.CPUPerc}}\t{{.MemUsage}}\t{{.NetIO}}\t{{.BlockIO}}"

# Single container continuous monitoring
watch -n1 docker stats erp-php-backend-franken --no-stream
```

#### Container Logs During Load Test

```bash
# FrankenPHP/Octane logs
docker logs -f erp-php-backend-franken 2>&1 | grep -E "(error|warn|slow|timeout)"

# PostgreSQL logs  
docker logs -f erp-db-postgresql 2>&1 | grep -E "(slow|error|FATAL|LOG)"

# Redis logs
docker logs -f erp-cache-redis

# Watch all simultaneously (requires multitail)
brew install multitail
multitail \
  <(docker logs -f erp-php-backend-franken) \
  <(docker logs -f erp-db-postgresql)
```

#### Container-level Profiling

```bash
# CPU profile for PHP container (requires ctop)
brew install ctop
ctop

# Enter container for live inspection
docker exec -it erp-php-backend-franken bash

# Inside container: check PHP-FPM/Octane workers
ps aux | grep php

# Check open file descriptors
ls -la /proc/1/fd | wc -l

# Check TCP connections
ss -tn | grep ESTABLISHED | wc -l
```

---

### 3.4 Laravel Octane / Application Profiling

#### Laravel Telescope (Dev only)

```bash
# Install Telescope for request profiling
composer require laravel/telescope --dev
php artisan telescope:install
php artisan migrate

# Access at: http://172.28.0.30:50080/telescope
# Shows: query times, request times, exceptions, cache hits/misses
```

#### Laravel Debugbar (Dev only)

```bash
composer require barryvdh/laravel-debugbar --dev
```

#### Octane Worker Status

```bash
# Inside FrankenPHP container
docker exec -it erp-php-backend-franken bash
php artisan octane:status
```

#### Custom Response Time Logging

Add to `app/Http/Middleware/ResponseHandler_General.php`:
```php
// At start of request
$startTime = microtime(true);

// At end of request, before return
$duration = (microtime(true) - $startTime) * 1000;
if ($duration > 200) {
    \Log::warning("Slow request: {$duration}ms", [
        'url' => request()->url(),
        'method' => request()->method(),
    ]);
}
```

---

### 3.5 Percona Monitoring Manager (PMM) — Already Deployed

PMM is running at `172.28.0.111:40080` (credentials: admin/admin).

**To connect PostgreSQL to PMM:**
```bash
# Inside the PMM container or via pmm-admin
docker exec -it erp-monitoring-percona pmm-admin add postgresql \
    --username=SysEngine \
    --password=748159263 \
    --host=172.28.0.2 \
    --port=5432 \
    --database=dbERPReborn \
    erp-postgresql
```

**PMM Dashboards to monitor:**
- PostgreSQL Overview → QPS, TPS, connection count
- PostgreSQL Instances Overview → slow queries, vacuum stats
- Node Summary → CPU, RAM, Disk I/O per container host

---

## 4. Step-by-Step Performance Baseline Procedure

### Step 1: Establish Baseline (Before Any Changes)

```bash
# 1. Start all services
docker compose up -d

# 2. Wait for services to be healthy
docker compose ps

# 3. Run baseline k6 test (replace endpoint with real one)
k6 run --out json=baseline.json test-api-load.js

# 4. Record baseline metrics
cat baseline.json | jq '.metrics.http_req_duration' > baseline-metrics.json
```

### Step 2: Apply One Change at a Time

Priority order:
1. Enable Redis cache driver
2. Increase PostgreSQL shared_buffers
3. Add PgBouncer
4. Disable `--watch` in FrankenPHP
5. Add resource limits

### Step 3: Re-test After Each Change

```bash
# Run same k6 test
k6 run --out json=after-redis.json test-api-load.js

# Compare p95 latency
echo "Baseline p95:" && cat baseline.json | jq '.metrics.http_req_duration.values["p(95)"]'
echo "After Redis p95:" && cat after-redis.json | jq '.metrics.http_req_duration.values["p(95)"]'
```

### Step 4: PostgreSQL Query Profiling

```bash
# Enable pg_stat_statements
docker exec -it erp-db-postgresql psql -U SysEngine -d dbERPReborn \
    -c "CREATE EXTENSION IF NOT EXISTS pg_stat_statements;"

# Run load test
k6 run test-api-load.js

# Check slowest queries
docker exec -it erp-db-postgresql psql -U SysEngine -d dbERPReborn -c "
SELECT
    LEFT(query, 80) AS query,
    calls,
    round(mean_exec_time::numeric, 2) AS avg_ms
FROM pg_stat_statements
ORDER BY mean_exec_time DESC
LIMIT 10;
"
```

---

## 5. Quick Wins: Change Checklist

These can be applied without code changes:

### A. Switch to Redis Cache (`.env`)
```bash
# Edit .env in WebBackEnd
CACHE_DRIVER=redis
SESSION_DRIVER=redis
REDIS_HOST=172.28.0.5
REDIS_PORT=6379
```

### B. PostgreSQL Memory Boost

```bash
# Edit postgresql.conf inside container
docker exec -it erp-db-postgresql bash
cat >> /var/lib/postgresql/18/docker/postgresql.conf << 'EOF'
shared_buffers = 1GB
effective_cache_size = 3GB
work_mem = 32MB
maintenance_work_mem = 256MB
log_min_duration_statement = 200
EOF
# Then restart: docker restart erp-db-postgresql
```

### C. Disable FrankenPHP Watch Mode

In `Dockerfile` for `PHPBackEnd_LaravelOctane_FrankenPHP/Dockerfile`, change:
```diff
- php artisan octane:frankenphp --workers=8 --caddyfile="..." --max-requests=1000 --watch
+ php artisan octane:frankenphp --workers=16 --caddyfile="..." --max-requests=500
```

### D. Add PgBouncer to docker-compose.yml

See section 2.4 above for full configuration.

### E. Increase Laravel Octane Workers

```diff
- --workers=8
+ --workers=16   # or: $(nproc) * 2
```

---

## 6. Expected Gains Per Optimization

| Optimization | Est. Latency Reduction | Difficulty |
|-------------|----------------------|------------|
| Redis cache driver | 30–80ms (disk I/O eliminated) | Low — `.env` change only |
| PostgreSQL shared_buffers | 20–100ms (disk reads → memory) | Low — config change |
| Disable `--watch` | 5–10ms + CPU freed | Low — Dockerfile change |
| PgBouncer | 50–200ms (connection overhead) | Medium — new service |
| Increase Octane workers | Throughput improvement (not latency) | Low — flag change |
| Remove SELECT NOW() timing | 45–90ms per 5-query request | Medium — PHP code |
| Eager loading / query batching | 100–500ms (N+1 elimination) | High — PHP + PGSQL |
| pg_stat_statements + index tuning | Variable (query dependent) | Medium |

---

## 7. Key File Paths for Docker Config

| File | Purpose |
|------|---------|
| `docker-compose.yml` (root) | All service definitions |
| `.ProjectCore/Configuration/Docker/PHPBackEnd_LaravelOctane_FrankenPHP/Dockerfile` | Primary backend image |
| `.ProjectCore/Configuration/Docker/PHPApacheBackEnd/Dockerfile` | Legacy Apache backend |
| `.ProjectCore/Configuration/Docker/PostgreSQL/postgresql.conf` | PostgreSQL tuning |
| `.ProjectCore/Configuration/Docker/PostgreSQL/pg_hba.conf` | Connection auth rules |
| `Programming/WebBackEnd/Caddyfile` | Caddy web server config (FrankenPHP) |
| `Programming/WebBackEnd/.env` | Laravel env (cache driver, DB host) |
| `Programming/WebBackEnd/config/database.php` | DB connection settings |
| `Programming/WebBackEnd/config/cache.php` | Cache driver config |
| `Programming/WebBackEnd/config/session.php` | Session driver config |

---

## 8. Notes on Dual-Backend Architecture

The project has two backend variants sharing `.LaravelCore`:

| Variant | Container | Port | Engine | Status |
|---------|-----------|------|--------|--------|
| FrankenPHP + Octane | `php-backend-franken` | 50080/50443 | Persistent workers (fast) | **ACTIVE PRIMARY** |
| Apache + PHP | `php-apache-backend` | 10080/10443 | Traditional per-request | Legacy |

**FrankenPHP advantage**: Workers are persistent processes (like Node.js). Laravel bootstrapping happens once, not per request. This alone saves 50–150ms vs traditional Apache+PHP-FPM.

**But watch mode negates this**: `--watch` forces file scanning overhead that offsets the Octane performance gain in development.

---

## 9. Samba LDAP Authentication — Hidden Latency Source

Every authenticated API request may call `auth-samba` (172.28.0.7) for LDAP validation. This is a network round trip + Samba domain controller lookup.

```bash
# Measure LDAP response time
time ldapsearch -H ldap://172.28.0.7:10389 \
    -D "CN=Administrator,DC=QDC-FILES,DC=QDC,DC=CO,DC=ID" \
    -w "YourPassword" \
    -b "DC=QDC-FILES,DC=QDC,DC=CO,DC=ID" \
    "(sAMAccountName=testuser)"
```

**Recommendation**: Cache successful LDAP auth results in Redis with a 5–15 minute TTL to avoid repeated domain controller queries per request.
