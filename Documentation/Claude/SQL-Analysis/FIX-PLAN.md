# SQL Performance Fix Plan — ERPReborn

**Generated:** 2026-04-23  
**Source:** SQL-Analysis capture run (29 endpoints, Scenario 04)  
**Baseline infrastructure overhead per request:** ~929ms (before any business logic)

---

## Executive Summary

Ten stored procedures were analysed. The three called on **every authenticated request** together cost ~930ms before any business logic runs. The root causes repeat across all ten functions: dynamic SQL assembled via scalar SELECT helpers, DBLINK cross-database calls, and results never cached despite identical inputs across the entire session.

Fixing these in priority order can bring the per-request infrastructure overhead from ~930ms to **under 50ms**.

---

## Quick Reference — All Issues

| ID | Function | Severity | Issues | Est. Saving |
|----|----------|----------|--------|-------------|
| SQL-01 | `FuncSys_General_GetUserIdentityByLDAPUserID` | **Critical** | No cache; dynamic SQL; dupe JOIN condition | ~270–300ms/req |
| SQL-02 | `Func_TblRotateLog_API_SET` | **Critical** | No UPSERT; DBLINK; 9× scalar SELECTs; no index | ~100–200ms/req |
| SQL-03 | `Func_GetDataListJSON_CombinedBudgetSectionDetail` | **Critical** | Double dynamic SQL wrap; CamelCase in DB; no cache | ~800ms on cache hit |
| SQL-04 | `Func_GetDataPickSet_UserPrivileges` | **High** | Called twice same request; no PHP-level cache | ~440ms/req |
| SQL-05 | `Func_General_GetUserPrivilege_MenuLayout` | **High** | Cascades SQL-04 cost; static data never cached | ~460ms/req |
| SQL-06 | `Func_TblLog_UserLoginSession_SET` | **High** | 14× scalar SELECTs; DBLINK; redundant lookup | ~80–170ms/login |
| SQL-07 | `FuncSys_General_GetExistantionOnSystem_APIWebToken` | **High** | SQL injection; COUNT vs EXISTS; no index; no cache | ~334ms/req |
| SQL-08 | `FuncSys_General_SetUserSessionBranchAndUserRole` | **Medium** | Read-all/write-all for 2-field UPDATE | ~300ms/session-switch |
| SQL-09 | `Func_General_JSONArray_ConvertKeysToCamelCase` | **Medium** | JSON string work in DB; should be PHP | ~193ms/response |
| SQL-10 | `Func_GetDataList_BusinessDocumentTypeWorkFlowPath` | **Medium** | DB-side cache only; no Redis layer | ~325ms on cold hit |

---

## Phase 1 — Critical / Per-Request Fixes (Do First)

These three functions run on **every single request**. Fixing them yields the largest wall-clock improvement.

---

### Fix 1.1 — Cache `FuncSys_General_GetUserIdentityByLDAPUserID` in Redis

**File:** `Programming/.LaravelCore/app/Helpers/ZhtHelper/System/BackEnd/Helper_API.php` ~line 1397  
**Saving:** ~270–300ms per request

**Step 1 — Add Redis cache at the call site:**

```php
// Helper_API.php ~line 1397
$cacheKey = "user_identity:{$ldapUserID}";
$ttl      = config('session.lifetime') * 60;

$identity = Cache::remember($cacheKey, $ttl, fn() => /* existing DB call */);
```

Invalidate on logout or role change by calling `Cache::forget("user_identity:{$ldapUserID}")`.

**Step 2 — Fix parameterized query in the stored procedure (DB change):**

Replace all dynamic SQL assembly with `EXECUTE ... USING`:

```sql
-- In SchSysConfig.FuncSys_General_GetUserIdentityByLDAPUserID:
EXECUTE $Q$
    SELECT ... FROM ...
    WHERE "TblLDAPObject_User"."UserID" = $1
    ...
$Q$ INTO varRecSetOutput USING varLDAPUserID;
```

Remove the `FuncSys_General_GetStringLiteralConvertion_VarChar` call — it is no longer needed.

**Step 3 — Fix duplicate OR condition bug (DB change):**

```sql
-- In TblDBObject_User join:
LEFT JOIN "SchSysConfig"."TblDBObject_User"
    ON (
        "TblMapper_UserToLDAPUser"."User_RefID" = "TblDBObject_User"."Sys_PID"
        OR
        "TblMapper_UserToLDAPUser"."User_RefID" = "TblDBObject_User"."Sys_SID"  -- was Sys_PID (duplicate)
    )

-- Same fix in TblPerson join — change second Sys_PID to Sys_SID
```

**Step 4 — Add indexes (DB change):**

```sql
CREATE INDEX IF NOT EXISTS idx_ldapuser_userid
    ON "SchSysConfig"."TblLDAPObject_User" ("UserID")
    WHERE "Sys_Data_Delete_DateTimeTZ" IS NULL;

CREATE INDEX IF NOT EXISTS idx_workercareer_worker_date
    ON "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"
    ("Worker_RefID", "ValidStartDateTimeTZ" DESC);
```

**Step 5 — Remove `FuncSys_General_IsValid_SQLSyntax` pre-check (DB change):**

Delete the `IF (SELECT FuncSys_General_IsValid_SQLSyntax(...))` guard — it adds one extra round trip for a query whose structure never changes.

---

### Fix 1.2 — Rewrite `Func_TblRotateLog_API_SET` (DB change)

**Schema:** `SchSysConfig` (SysConfig DB)  
**Saving:** ~100–200ms per request + eliminates race condition

**Step 1 — Add PRIMARY KEY on `Sys_RotateID` (prerequisite):**

```sql
-- On SysConfig DB:
ALTER TABLE "SchSysConfig"."TblRotateLog_API"
    ADD PRIMARY KEY ("Sys_RotateID");
```

**Step 2 — Replace SELECT COUNT + INSERT/UPDATE with UPSERT:**

```sql
-- In Func_TblRotateLog_API_INSERT, replace the COUNT check:
INSERT INTO "SchSysConfig"."TblRotateLog_API" (
    "Sys_RotateID", "Sys_RPK", "Sys_Data_Annotation",
    "HostIPAddress", "URL", "NavigatorUserAgent",
    "RequestDateTimeTZ", "RequestHTTPHeader", "RequestHTTPBody",
    "ResponseDateTimeTZ", "ResponseHTTPStatus", "ResponseHTTPHeader", "ResponseHTTPBody",
    "Sys_Data_Entry_LoginSession_RefID", "Sys_Data_Entry_DateTimeTZ"
) VALUES (
    varSys_RotateID, varSys_RPK, varSysDataAnnotation,
    varHostIPAddress, varURL, varNavigatorUserAgent,
    varRequestDateTimeTZ, varRequestHTTPHeader, varRequestHTTPBody,
    varResponseDateTimeTZ, varResponseHTTPStatus, varResponseHTTPHeader, varResponseHTTPBody,
    varIDSession, NOW()
)
ON CONFLICT ("Sys_RotateID") DO UPDATE SET
    "Sys_RPK"           = EXCLUDED."Sys_RPK",
    "Sys_Data_Annotation" = EXCLUDED."Sys_Data_Annotation",
    "HostIPAddress"     = EXCLUDED."HostIPAddress",
    "URL"               = EXCLUDED."URL",
    "NavigatorUserAgent"= EXCLUDED."NavigatorUserAgent",
    "RequestDateTimeTZ" = EXCLUDED."RequestDateTimeTZ",
    "RequestHTTPHeader" = EXCLUDED."RequestHTTPHeader",
    "RequestHTTPBody"   = EXCLUDED."RequestHTTPBody",
    "ResponseDateTimeTZ"= EXCLUDED."ResponseDateTimeTZ",
    "ResponseHTTPStatus"= EXCLUDED."ResponseHTTPStatus",
    "ResponseHTTPHeader"= EXCLUDED."ResponseHTTPHeader",
    "ResponseHTTPBody"  = EXCLUDED."ResponseHTTPBody",
    "Sys_Data_Entry_LoginSession_RefID" = EXCLUDED."Sys_Data_Entry_LoginSession_RefID",
    "Sys_Data_Entry_DateTimeTZ" = EXCLUDED."Sys_Data_Entry_DateTimeTZ";
```

**Step 3 — Replace 9× scalar SELECT escapes with `format()` (DB change):**

```sql
-- In Func_TblRotateLog_API_SET:
varSQL := format(
    'SELECT "SignRecordID" FROM "SchSysConfig"."Func_TblRotateLog_API_INSERT"(
        %L::varchar, %s::bigint, %L::timestamptz,
        %L::cidr,    %L::varchar, %L::varchar,
        %L::timestamptz, %L::json, %L::varchar,
        %L::timestamptz, %s::smallint, %L::json, %L::varchar
    )',
    varSysDataAnnotation, varIDSession,
    (SELECT "SchSysConfig"."FuncSys_General_GetDBClusterTimestamp"()),
    varHostIPAddress::varchar, varURL, varNavigatorUserAgent,
    varRequestDateTimeTZ::varchar, varRequestHTTPHeader::varchar, varRequestHTTPBody,
    varResponseDateTimeTZ::varchar, varResponseHTTPStatus,
    varResponseHTTPHeader::varchar, varResponseHTTPBody
);
```

**Step 4 — Increase sequence cache (DB change):**

```sql
ALTER SEQUENCE "SchSysConfig"."TblRotateLog_API_Sys_RPK_seq" CACHE 50;
```

**Step 5 — Replace CURRVAL with in-scope variable (DB change):**

```sql
-- Replace:
varRecSetOutput."SignRecordID" := CURRVAL('"SchSysConfig"."TblRotateLog_API_Sys_RPK_seq"');
-- With:
varRecSetOutput."SignRecordID" := varSys_RPK;
```

**Step 6 — Remove dead code (DB change):**
- Remove `varSignValid := 0` guard and its `IF` block
- Remove `varID ALIAS FOR $2` if `varID` is never read in the body
- Clean up commented-out previous implementation blocks

**Long-term — Async log write (Architecture spike, separate task):**
- Option A: Move `TblRotateLog_API` into `dbERPReborn` — eliminates DBLINK
- Option B: Fire-and-forget via Redis queue + background worker

---

### Fix 1.3 — Fix `FuncSys_General_GetExistantionOnSystem_APIWebToken` (DB + PHP)

**Schema:** `SchSysConfig`  
**Caller:** `SchSysConfig/General.php:1073`  
**Saving:** ~334ms per request + security fix

**Step 1 — Fix SQL injection and switch to `EXISTS` (DB change):**

```sql
-- Replace entire function body with:
BEGIN
    EXECUTE '
        SELECT EXISTS (
            SELECT 1
            FROM "SchSysConfig"."TblLog_UserLoginSession"
            WHERE "SessionAutoStartDateTimeTZ"  <= NOW()
            AND   "SessionAutoFinishDateTimeTZ" >= NOW()
            AND   "APIWebToken" = $1
        )
    ' INTO varReturn USING varAPIWebToken;

    RETURN varReturn;
END;
```

**Step 2 — Add partial index on `APIWebToken` (DB change):**

```sql
CREATE INDEX IF NOT EXISTS idx_userloginsession_token
    ON "SchSysConfig"."TblLog_UserLoginSession" ("APIWebToken")
    WHERE "SessionAutoFinishDateTimeTZ" >= NOW();
```

**Step 3 — Cache validation result in Redis (PHP change):**

```php
// In SchSysConfig/General.php ~line 1073:
$cacheKey = 'token_valid:' . hash('sha256', $token);
$ttl      = /* session expiry timestamp - time() */;

return Cache::remember($cacheKey, $ttl, fn() => /* existing DB call */);
```

On logout, call `Cache::forget('token_valid:' . hash('sha256', $token))`.

---

## Phase 2 — High Severity / Session & Login Fixes

---

### Fix 2.1 — Deduplicate `Func_GetDataPickSet_UserPrivileges` calls

**File:** `Programming/.LaravelCore/app/Helpers/ZhtHelper/...` — called from `Helper_Environment.php:162` and `setLogin.php:332`  
**Saving:** ~440ms per login request

**Step 1 — Add PHP request-scope cache:**

```php
private static array $privilegeCache = [];

public static function getUserPrivileges(int $userId): array {
    if (!array_key_exists($userId, self::$privilegeCache)) {
        self::$privilegeCache[$userId] = /* existing DB call */;
    }
    return self::$privilegeCache[$userId];
}
```

Route both call sites through this wrapper.

**Step 2 — Add Redis cache across requests:**

```php
$cacheKey = "user_privileges:{$userId}";
return Cache::remember($cacheKey, 3600, fn() => /* DB call */);
```

Invalidate on admin role/permission write for the affected user.

---

### Fix 2.2 — Cache `Func_General_GetUserPrivilege_MenuLayout`

**Caller:** `SchSysConfig/General.php:230`  
**Saving:** ~460ms per request (stacks with Fix 2.1 — independent layer)

```php
$cacheKey = "menu_layout:{$branchId}:{$userId}";
return Cache::remember($cacheKey, 3600, fn() => /* DB call */);
```

Invalidation trigger: on any role/permission write in `SchSysConfig`, clear `menu_layout:{branch}:{user}` for the affected user.

---

### Fix 2.3 — Reduce overhead in `Func_TblLog_UserLoginSession_SET`

**Schema:** `SchSysConfig` — called from `TblLog_UserLoginSession.php:76`

**Step 1 — Replace 14× scalar SELECT escapes with `format()` (DB change):**

```sql
-- Both INSERT and UPDATE branches:
varSQL := format(
    'SELECT "SignRecordID" FROM "SchSysConfig"."Func_TblLog_UserLoginSession_INSERT"(
        %L::varchar, %s::bigint, %L::timestamptz, %s, %s,
        %s::bigint, %L::varchar, %L::json, %s::bigint, %s::bigint,
        %L::timestamptz, %L::timestamptz, %L::timestamptz, %L::timestamptz, %L::varchar
    )',
    varSysDataAnnotation, varIDSession, ...
);
```

**Step 2 — Pass `User_RefID` from caller, remove internal lookup (DB change):**

The caller already has `User_RefID` from the identity resolution step (Fix 1.1). Add it as an explicit parameter:

```sql
-- Remove this line from the function body:
varUser_RefID := (SELECT "SchSysConfig"."FuncSys_General_GetUserIDByName"(varLDAPUserID::varchar));

-- Add varUser_RefID as an input parameter to the function signature
```

Update the caller at `TblLog_UserLoginSession.php:76` to pass it.

**Step 3 — Remove 55 lines of commented-out dead code (DB change).**

---

## Phase 3 — Medium Severity Fixes

---

### Fix 3.1 — Replace `Func_General_JSONArray_ConvertKeysToCamelCase` with PHP

**Caller:** `Helper_API.php:419` (called on every API response)  
**Saving:** ~193ms per response

Remove the DB call entirely. Add a PHP utility method:

```php
// In Helper_API.php or a shared utility class:
public static function toCamelCaseKeys(mixed $data): mixed {
    if (is_array($data)) {
        $result = [];
        foreach ($data as $key => $value) {
            $newKey = is_string($key)
                ? lcfirst(str_replace(['_', ' '], '', ucwords(strtolower($key), '_')))
                : $key;
            $result[$newKey] = self::toCamelCaseKeys($value);
        }
        return $result;
    }
    return $data;
}
```

At `Helper_API.php:419`, replace the stored procedure call:

```php
// Remove: DB call to Func_General_JSONArray_ConvertKeysToCamelCase
// Add:
$data = self::toCamelCaseKeys($data);
```

---

### Fix 3.2 — Targeted UPDATE in `FuncSys_General_SetUserSessionBranchAndUserRole`

**Caller:** `SchSysConfig/General.php:1238`  
**Saving:** ~300ms per branch-switch

Add a dedicated narrow-update function to the SysConfig DB and call it directly via DBLINK (or direct if Phase 4 DBLINK consolidation is done first):

```sql
CREATE OR REPLACE FUNCTION "SchSysConfig"."Func_TblLog_UserLoginSession_SET_BranchAndRole"(
    varRecordID   bigint,
    varBranchID   bigint,
    varUserRoleID bigint
) RETURNS void LANGUAGE sql AS $$
    UPDATE "SchSysConfig"."TblLog_UserLoginSession"
    SET
        "Branch_RefID"   = varBranchID,
        "UserRole_RefID" = varUserRoleID
    WHERE "Sys_PID" = varRecordID
    OR    "Sys_SID" = varRecordID;
$$;
```

Replace the existing SELECT-all + _SET call chain in `FuncSys_General_SetUserSessionBranchAndUserRole` with a call to this new function.

---

### Fix 3.3 — Simplify `Func_GetDataListJSON_CombinedBudgetSectionDetail`

**Caller:** `SchData_OLTP_Budgeting/General.php:827`  
**Saving:** ~150–300ms on execution + ~800ms on cache hit

**Step 1 — Eliminate double dynamic SQL wrap (DB change):**

```sql
-- Instead of building a SQL string that itself contains a SQL string:
RETURN QUERY
    SELECT * FROM "SchData-OLTP-Budgeting"."Func_GetDataList_CombinedBudgetSectionDetail"(
        varBranch_RefID,
        varCombinedBudgetSection_RefID,
        varPickStatement,
        varSortStatement,
        varFilterStatement,
        varPagingStatement
    );
```

**Step 2 — Move CamelCase to PHP (covered by Fix 3.1).**

**Step 3 — Add Redis cache (PHP change):**

```php
$cacheKey = "budget_section_detail:{$branchId}:{$sectionId}";
return Cache::remember($cacheKey, 300, fn() => /* DB call */);
```

Invalidate on budget modification writes.

---

### Fix 3.4 — Layer Redis cache on `Func_GetDataList_BusinessDocumentTypeWorkFlowPath`

**Caller:** `SchSysConfig/General.php:398`  
**Saving:** ~325ms per repeated call

```php
$cacheKey = sprintf(
    'workflow_path:%d:%d:%d:%d',
    $branchId, $docTypeId, $submitterEntityId ?? 0, $combinedBudgetId ?? 0
);

return Cache::remember($cacheKey, 3600, fn() => /* DB call */);
```

Also verify that the existing `FuncSys_CacheFunctionResult_GetData` cache key includes all 4 discriminating parameters (branch, docType, submitter, budget). If optional parameters are excluded, fix the DB-side cache key construction.

---

## Phase 4 — Architecture (Separate Spike)

### Fix 4.1 — Eliminate DBLINK for TblRotateLog_API (highest long-term value)

Options in order of complexity:
1. **Move `TblRotateLog_API` into `dbERPReborn`** — eliminates DBLINK entirely; requires table migration + update all references to the table and its functions.
2. **Async fire-and-forget** — PHP writes log payload to Redis queue; a background worker (Laravel Queue or separate process) drains the queue and writes to DB. Response no longer waits for log write.
3. **Batch via Redis** — accumulate N log entries in Redis, flush to DB in a single multi-row INSERT every N seconds.

Option 2 (async) gives the best immediate latency win with moderate effort and is recommended.

---

## Common DB Cleanup — All Functions

The following dead-code patterns appear in 6/10 functions and should be removed during each function's update pass:

**`varSignEligibleToProcess` always-true guard:**
```sql
-- Remove entirely:
varSignEligibleToProcess := FALSE;
IF (varSignEligibleToProcess IS FALSE) THEN
    varSignEligibleToProcess := TRUE;
END IF;
IF (varSignEligibleToProcess IS TRUE) THEN
    ...  -- just keep this block's content
END IF;
```

**Affected functions:** SQL-03, SQL-05, SQL-06, SQL-07, SQL-09, SQL-10 (and related functions).

---

## Execution Order Summary

| Priority | Fix ID | What | Type | Est. Saving |
|----------|--------|------|------|-------------|
| 1 | 1.3 Step 1 | SQL injection fix in token validation | DB | Security |
| 2 | 1.2 Step 1 | Add PK on `TblRotateLog_API.Sys_RotateID` | DDL | Prerequisite |
| 3 | 1.2 Step 2 | Rewrite INSERT as UPSERT | DB | Race fix + I/O |
| 4 | 1.3 Step 2 | Add index on `APIWebToken` | DDL | ~250–300ms/req |
| 5 | 1.1 | Cache `GetUserIdentityByLDAPUserID` in Redis | PHP | ~270–300ms/req |
| 6 | 1.3 Step 3 | Cache token validation in Redis | PHP | ~334ms/req |
| 7 | 1.2 Step 3 | Replace 9× scalar SELECTs with `format()` | DB | ~30–50ms/req |
| 8 | 3.1 | Move CamelCase conversion to PHP | PHP | ~193ms/resp |
| 9 | 2.1 | Deduplicate `GetDataPickSet_UserPrivileges` | PHP | ~440ms/login |
| 10 | 2.2 | Cache menu layout in Redis | PHP | ~460ms/req |
| 11 | 1.1 Step 2 | Fix Sys_PID/Sys_SID duplicate OR bug | DB | Data correctness |
| 12 | 2.3 | Reduce `TblLog_UserLoginSession_SET` overhead | DB | ~80–170ms/login |
| 13 | 3.2 | Targeted UPDATE for branch/role switch | DB | ~300ms/switch |
| 14 | 3.3 | Simplify CombinedBudgetSectionDetail | DB + PHP | ~150–300ms/call |
| 15 | 3.4 | Redis cache for WorkflowPath | PHP | ~325ms/call |
| 16 | 4.1 | Async log write (spike) | Arch | ~295ms/req |

---

## Prerequisite: Enable Redis

Before any caching fixes take effect, Redis must be switched on in the environment:

```
# Programming/WebBackEnd/.env
CACHE_DRIVER=redis
SESSION_DRIVER=redis
```

Redis is already deployed at `172.28.0.5:6379` and configured in `config/database.php`. This is a one-line change with the highest leverage-to-effort ratio in the entire system.

---

## Expected Outcome After All Phases

| Metric | Before | After |
|--------|--------|-------|
| Infrastructure overhead per request | ~929ms | ~50ms (cached) |
| Token validation per request | ~334ms | <5ms |
| User identity per request | ~300ms | <5ms |
| Rotate log write per request | ~295ms | ~50ms (UPSERT + index) |
| Login request (total session setup) | ~1,200ms+ | ~200ms |
| Budget detail endpoint | ~848ms | <5ms (cached) |
| CamelCase conversion per response | ~193ms | <1ms (PHP) |
