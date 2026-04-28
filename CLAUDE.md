# ERPReborn Project — Claude Session Guide

> Last updated: 2026-04-13 | Branch: claude/tender-thompson

---

## Project Overview

**ERPReborn** is a Laravel 12 (PHP 8.2+) based ERP web backend with a custom API gateway architecture. It uses PostgreSQL as the primary database and follows a stored-procedure-first query model with a custom helper abstraction layer (`ZhtHelper`).

---

## Architecture Quick Reference

```
HTTP Request
  → Route (Helper_LaravelRoute::setRoute in routes/api.php)
  → Controller_Main_APIGateway
  → [Middleware: RequestHandler → Logic → ResponseHandler]
  → Helper_API::setCallAPIEngine()
  → Versioned Engine: App\Http\Controllers\Application\BackEnd\[Service]\Engines\[func]\v[N]\[Class]
  → Helper_PostgreSQL (DB abstraction)
  → PostgreSQL (192.168.0.27:5432, db: dbERPReborn)
  → JSON Response
```

**Key Directories:**
- `Programming/WebBackEnd/` — Laravel app root
- `Programming/.LaravelCore/app/` — Shared symlinked core (Helpers, Models, Controllers)
- `Programming/WebBackEnd/app/Helpers/ZhtHelper/` — Custom utility library
- `Programming/WebBackEnd/app/Http/Controllers/Application/BackEnd/` — API Engines

---

## Database Query Pipeline

### Connection Method
The system has **two query paths** in `Helper_PostgreSQL.php` (~124KB, 1,690 lines):

1. **PGSQL Direct Path** (`getArrayFromQueryExecutionDataFetch_UsingPGSQLConnection`):
   - Opens fresh `pg_connect()` → executes → `pg_close()` **per query**
   - No connection reuse or pooling

2. **Laravel PDO Path** (`getArrayFromQueryExecutionDataFetch_UsingLaravelConnection`):
   - Uses Laravel `DB::select()` facade
   - PDO-managed, but still no pool configuration

### Query Model
- **Stored Procedures** are the primary interface for all INSERT/UPDATE/DELETE
- SELECTs use stored functions called via: `SELECT SchSysConfig.Func_TblXxx_GET(...)`
- Models (`TblXxx`) are thin wrappers that delegate to `Helper_PostgreSQL::getQueryExecution()`

---

## Identified Performance Bottlenecks

### CRITICAL (High Impact)

| # | Issue | Estimated Overhead | Location |
|---|-------|--------------------|----------|
| 1 | **Connection per query** — `pg_connect()` + `pg_close()` each call | 10–50ms × N queries | `Helper_PostgreSQL.php` |
| 2 | **3× DB round trips per query** — `SELECT NOW()` before + after each query for timing | 45–90ms per 5-query request | `getQueryExecution()` |
| 3 | **File-based cache** — Redis configured but disabled (`CACHE_DRIVER=file`) | 10× slower than Redis | `config/cache.php` |
| 4 | **No eager loading** — N+1 implicit in multi-entity responses | unbounded | Model layer |
| 5 | **MD5 body validation on every request** — entire body re-encoded and hashed | 10–30ms | `RequestHandler_General.php` |

### MODERATE

| # | Issue | Location |
|---|-------|----------|
| 6 | JSON Schema loaded from disk per request (no in-memory cache) | `Helper_JSON::getSchemaValidationFromFile()` |
| 7 | Per-row, per-field type conversion in PHP (bool/int/float casting) | `getArrayFromQueryExecutionDataFetch_UsingPGSQLConnection()` |
| 8 | No query result caching — identical stored proc calls hit DB every time | `Helper_PostgreSQL.php` |
| 9 | Session on filesystem (not Redis) — disk I/O on every authenticated request | `config/session.php` |

### Typical Request Budget (estimated)
```
Header validation (date + MD5 + TTL):   ~15ms
Route + engine resolution:               ~15ms
JSON Schema validation (disk read):      ~10ms
LDAP/session auth:                      ~100–200ms
DB queries (5 typical):
  - SELECT NOW() × 10:                  ~50ms
  - 5 stored procedure calls:           ~150ms
  - pg_connect × 5:                     ~100ms
Response serialization:                  ~10ms
-----------------------------------------------
TOTAL (typical authenticated request):  ~450–550ms
```

---

## Recommended Fixes (Priority Order)

### 1. Enable PgBouncer or Persistent Connections
- Add `'options' => [PDO::ATTR_PERSISTENT => true]` to `config/database.php`
- OR deploy PgBouncer in transaction-pooling mode between app and PostgreSQL
- Expected gain: **100–250ms per request**

### 2. Remove Timing Instrumentation from Hot Path
- In `Helper_PostgreSQL::getQueryExecution()`, the `SELECT NOW()` calls before/after each query add 2 extra round trips
- Move timing to application-level middleware or remove for production
- Expected gain: **45–90ms per request**

### 3. Switch Cache Driver to Redis
- `.env`: `CACHE_DRIVER=redis`
- `config/cache.php`: change default to `'redis'`
- Redis is already configured at `172.28.0.5:6379`
- Expected gain: session + cache reads drop from disk I/O to sub-millisecond

### 4. Cache JSON Schema In-Memory
- Load and parse schemas once per process lifecycle (use Laravel's `Cache::rememberForever()`)
- In `Helper_JSON::getSchemaValidationFromFile()` — wrap with memory cache

### 5. Add Stored Procedure Result Caching
- For read-only stored functions (GET variants), cache results with appropriate TTL
- Use `Cache::remember("key", $ttl, fn() => query())` pattern
- Apply to: menu lists, user roles, configuration tables

### 6. Implement Eager Loading for Multi-Entity Responses
- Identify common parent-child query patterns in API engines
- Batch related entity queries using `WHERE id = ANY($1::bigint[])` pattern in stored procs

---

## Key Configuration Files

| File | Purpose | Notable Settings |
|------|---------|-----------------|
| `config/database.php` | DB connections | PostgreSQL 192.168.0.27, no pooling |
| `config/cache.php` | Cache driver | `file` (should be `redis`) |
| `config/session.php` | Session storage | `file` (should be `redis`) |
| `.env` | Environment vars | `CACHE_DRIVER=file`, Redis at 172.28.0.5:6379 |
| `app/Http/Kernel.php` | Middleware stack | API: throttle 60/min, CORS, custom handlers |
| `routes/api.php` | Route definitions | Custom `Helper_LaravelRoute::setRoute()` |

---

## Helper Library Map (`ZhtHelper`)

| Helper | Purpose |
|--------|---------|
| `Helper_PostgreSQL.php` | All DB operations, stored proc builder, connection management |
| `Helper_API.php` | API engine dispatcher, versioned engine loader |
| `Helper_HTTPResponse.php` | Standardized JSON response wrapper |
| `Helper_HTTPError.php` | Error → HTTP status code mapping |
| `Helper_HTTPRequest.php` | Request parsing, header extraction |
| `Helper_Redis.php` | Redis operations (built but not integrated in main flow) |
| `Helper_JSON.php` | JSON Schema validation, encoding/decoding |
| `Helper_LaravelRoute.php` | Custom route registration wrapper |

---

## Middleware Request Flow Detail

```
RequestHandler_General.php:
  ✓ Validates 'date' header (±60s tolerance from server time)
  ✓ Validates 'x-content-md5' (MD5 of JSON body — computed every request)
  ✓ Validates 'expires' TTL (default 300s)
  ✓ Validates 'x-request-id' presence

ResponseHandler_General.php:
  ✓ Wraps response in standard metadata envelope
  ✓ Converts exceptions to error JSON
  ✓ Maintains request/response timing metadata
```

---

## Performance Investigation Starting Points

When debugging slow queries, check in this order:

1. **`Helper_PostgreSQL::getQueryExecution()`** — the central execution path
2. **`getQueryExecutionDataFetch_UsingPGSQLConnection()`** — PGSQL direct path (connection overhead)
3. **`getBuildStringLiteral_StoredProcedure()`** — how stored proc calls are built
4. **Actual stored procedures in PostgreSQL** — `SchSysConfig.Func_Tbl*` schemas
5. **`RequestHandler_General.php`** — MD5 validation overhead
6. **`Helper_JSON::getSchemaValidationFromFile()`** — schema I/O overhead

---

## Notes on Symlink Structure

The `Programming/WebBackEnd/app/` directory contains symlinks pointing to:
- `Programming/.LaravelCore/app/` — shared across WebBackEnd and WebBackEnd_LaravelOctane_FrankenPHP
- Changes to `.LaravelCore` affect both backends
- Always confirm which backend variant is active before editing

---

## Redis (Available but Unused)

Redis is deployed at `172.28.0.5:6379` and configured in `config/database.php` under the `redis` key. The `Helper_Redis.php` utility is implemented with full CRUD methods. However:
- `CACHE_DRIVER` is set to `file`
- `SESSION_DRIVER` is set to `file`
- No cache calls exist in the DB helper layer

**Enabling Redis is the single fastest win with lowest risk** for improving response times.

---

## Bug Documentation Protocol

**IMPORTANT — ALWAYS follow this when you find a bug:**

Whenever a bug is identified during any task (investigation, feature work, test failure, code review), you MUST:

1. **Create a bug report** at `Documentation/Bugs/BUG-NNN-short-slug.md` using the template below.
   - Assign the next sequential number (`NNN`) by counting existing files in `Documentation/Bugs/`.
   - Use a short, descriptive slug (kebab-case, ≤ 6 words).

2. **Register it in the index** at `Documentation/Bugs/INDEX.md` — one line per bug.

3. **Do this before or immediately after applying a fix**, not after the conversation ends.

### Bug Report Template

```markdown
# BUG-NNN — Title

| Field        | Value |
|--------------|-------|
| ID           | BUG-NNN |
| Date Found   | YYYY-MM-DD |
| Severity     | Critical / High / Medium / Low |
| Status       | Open / Fixed / Won't Fix |
| Component    | e.g. k6-tests / routes / middleware |
| Fixed In     | commit hash or "pending" |

## Symptom
What the user or system observed (error message, HTTP status, test output).

## Root Cause
Precise technical explanation of why it broke.

## Fix Applied
What was changed and in which files (file path : line).

## Verification
How to confirm the fix works.
```

### Severity Guide

| Severity | Meaning |
|----------|---------|
| Critical | Blocks all users / data loss risk |
| High     | Feature completely broken |
| Medium   | Incorrect behaviour with workaround |
| Low      | Minor / cosmetic |
