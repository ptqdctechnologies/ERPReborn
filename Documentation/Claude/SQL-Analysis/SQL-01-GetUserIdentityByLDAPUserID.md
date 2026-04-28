# SQL-01 — `FuncSys_General_GetUserIdentityByLDAPUserID`

| Field | Value |
|-------|-------|
| Schema | `SchSysConfig` |
| Calls (capture run) | **25 out of 30 gateway requests** |
| Avg time | ~300ms |
| Caller | `Helper_API.php:1397` |
| Severity | **Critical** |

---

## What It Does

Resolves a raw LDAP username (e.g. `'redi'`) into a full identity record spanning 7+ tables:

```
TblLDAPObject_User
  → TblMapper_UserToLDAPUser → TblDBObject_User
  → TblMapper_LDAPUserToPerson → TblPerson
      → TblWorker
          → TblWorkerCareerInternal  (ROW_NUMBER → latest record)
              → TblWorkerType
              → TblOrganizationalDepartment
              → TblOrganizationalJobPosition
```

It is called **on every authenticated gateway request** to resolve the session user's identity.

---

## Call Pattern (from log)

```
kind=read  time=232ms  caller=Helper_API.php:1397  sql=FuncSys_General_GetUserIdentityByLDAPUserID('redi')
kind=read  time=241ms  caller=Helper_API.php:1397  sql=FuncSys_General_GetUserIdentityByLDAPUserID('redi')
kind=read  time=248ms  caller=Helper_API.php:1397  sql=FuncSys_General_GetUserIdentityByLDAPUserID('redi')
... (×25 identical calls, same username, same result)
```

25 calls with **identical input and identical output** across the test run.

---

## Problems Found

### 1. CRITICAL — Result never cached despite being identical per session

The function is called with the same `varLDAPUserID` on every request for the duration of a user's session. The result cannot change mid-session (user's HR record doesn't change while they're logged in). Every call hits 7+ tables with a complex multi-join plan.

**Cost:** 25 × ~300ms = ~7.5 seconds of pure redundant DB work in this test alone.

### 2. HIGH — Dynamic SQL for a static JOIN query

The entire multi-join query is assembled as a dynamic SQL string using `Func_GetStringLiteralConvertion_VarChar` (one extra SELECT round trip for escaping), then executed via `EXECUTE varSQL`. There is no parameterized path. PostgreSQL cannot cache the query plan between calls.

```sql
-- Current: builds full query as string, escapes parameter via separate SELECT
varSQL := '
    SELECT * FROM (
        SELECT ...
        FROM (SELECT ' ||
            (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_VarChar"(varLDAPUserID::varchar)) ||
        '::varchar AS "LDAPUserID") AS "SubSQLParameter"
        LEFT JOIN ...
    ) AS ...
';
EXECUTE varSQL INTO varRecSetOutput;
```

**Fix:** Use a parameterized `EXECUTE ... USING`:
```sql
varSQL := 'SELECT ... FROM ... WHERE "TblLDAPObject_User"."UserID" = $1 ...';
EXECUTE varSQL INTO varRecSetOutput USING varLDAPUserID;
```

### 3. HIGH — 6 levels of nested LEFT JOINs, no index verification

The query walks 7 tables through nested subqueries. The `ROW_NUMBER()` window function on `TblWorkerCareerInternal.ValidStartDateTimeTZ DESC` requires a sort. If there is no index on `(Worker_RefID, ValidStartDateTimeTZ DESC)` the query degrades to a full sort per worker.

### 4. MEDIUM — Duplicate JOIN condition bug (Sys_PID used twice)

```sql
LEFT JOIN "SchSysConfig"."TblDBObject_User"
    ON (
        "TblMapper_UserToLDAPUser"."User_RefID" = "TblDBObject_User"."Sys_PID"
        OR
        "TblMapper_UserToLDAPUser"."User_RefID" = "TblDBObject_User"."Sys_PID"  -- ← same condition repeated
    )
```

The second `OR` branch should reference `Sys_SID`, not `Sys_PID`. The same bug appears in the `TblPerson` join:
```sql
"SubSQL"."Person_RefIDLink" = "SchData-OLTP-Master"."TblPerson"."Sys_PID"
OR
"SubSQL"."Person_RefIDLink" = "SchData-OLTP-Master"."TblPerson"."Sys_PID"  -- ← same
```

This means records accessible only via `Sys_SID` are silently never found.

### 5. LOW — `FuncSys_General_IsValid_SQLSyntax` adds extra round trip

Before executing `varSQL`, the result is validated:
```sql
IF ((SELECT "SchSysConfig"."FuncSys_General_IsValid_SQLSyntax"(varSQL)) IS TRUE) THEN
    FOR varRecSetOutput IN EXECUTE varSQL LOOP ...
```

This validation parses the SQL string on every call — an extra DB round trip for a query that never changes structure.

---

## Fix

### Immediate: Cache at PHP level per session

In `Helper_API.php` at the call site, wrap with a request-scoped memo:

```php
// Helper_API.php ~line 1397
private static array $userIdentityCache = [];

public static function getUserIdentity(string $ldapUserID): array {
    if (!isset(self::$userIdentityCache[$ldapUserID])) {
        self::$userIdentityCache[$ldapUserID] = /* existing DB call */;
    }
    return self::$userIdentityCache[$ldapUserID];
}
```

Since PHP-FPM/Octane serves one request per process invocation, a static cache lives for exactly the request lifetime — zero stale-data risk.

### Better: Cache in Redis per session

```php
$cacheKey = "user_identity:{$ldapUserID}";
$ttl      = config('session.lifetime') * 60;

return Cache::remember($cacheKey, $ttl, fn() => /* DB call */);
```

Invalidate on logout or role change.

### DB-level: Fix parameterization and duplicate condition

```sql
-- Replace dynamic SQL with parameterized EXECUTE
EXECUTE $QUERY$
    SELECT ... FROM ...
    WHERE "TblLDAPObject_User"."UserID" = $1
    ...
    LEFT JOIN "TblDBObject_User" ON (
        "TblMapper_UserToLDAPUser"."User_RefID" = "TblDBObject_User"."Sys_PID"
        OR
        "TblMapper_UserToLDAPUser"."User_RefID" = "TblDBObject_User"."Sys_SID"  -- ← fix
    )
$QUERY$ USING varLDAPUserID;
```

### Add indexes

```sql
-- On the SysConfig DB:
CREATE INDEX IF NOT EXISTS idx_ldapuser_userid
    ON "SchSysConfig"."TblLDAPObject_User" ("UserID")
    WHERE "Sys_Data_Delete_DateTimeTZ" IS NULL;

-- On the HR DB:
CREATE INDEX IF NOT EXISTS idx_workercareer_worker_date
    ON "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"
    ("Worker_RefID", "ValidStartDateTimeTZ" DESC);
```

---

## Expected Gain

| Fix | Saving per Request |
|-----|--------------------|
| PHP request-scope cache | **~270ms** (skip 24 of 25 identical calls) |
| Redis session cache | **~300ms** (skip all DB calls after first login) |
| Fix Sys_PID/Sys_SID bug | Data correctness (users with only SID links silently missing) |
| Parameterized EXECUTE | Plan caching — minor but eliminates parse overhead |
