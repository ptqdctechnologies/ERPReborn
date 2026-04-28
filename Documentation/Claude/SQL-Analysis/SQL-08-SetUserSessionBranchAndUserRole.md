# SQL-08 — `FuncSys_General_SetUserSessionBranchAndUserRole`

| Field | Value |
|-------|-------|
| Schema | `SchSysConfig` |
| Calls (capture run) | 1 |
| Time | **365ms** |
| Caller | `SchSysConfig/General.php:1238` |
| Severity | **Medium** |

---

## What It Does

Updates the `Branch_RefID` and `UserRole_RefID` on an existing login session record. Called during the login flow when the user selects a branch/role combination.

---

## Current Implementation

```sql
-- Step 1: Read the existing session record (all columns)
varSQL := 'SELECT * FROM "SchSysConfig"."TblLog_UserLoginSession"
           WHERE "Sys_PID" = ' || varRecordID || ' OR "Sys_SID" = ' || varRecordID;
EXECUTE varSQL INTO varRecTemp;

-- Step 2: Build 14-parameter SQL string with all columns re-escaped
varSQL := 'SELECT * FROM "SchSysConfig"."Func_TblLog_UserLoginSession_SET"(
    ' || (SELECT FuncSys_General_GetStringLiteralConvertForVarchar(varRecTemp."Sys_Data_Annotation")) || '::varchar,
    ...
    ' || varBranchID || '::bigint,     -- ← the actual change
    ' || varUserRoleID || '::bigint,   -- ← the actual change
    ...
)';
EXECUTE varSQL;
```

**Two fields are being changed. The function reads all columns, passes them all back unchanged except those two.**

---

## Problems Found

### 1. HIGH — Reads full record just to pass it back unchanged

The function:
1. SELECTs `*` from the session table (loading all 15+ columns)
2. Re-escapes every single column value via helper functions
3. Calls `Func_TblLog_UserLoginSession_SET` with all values, changing only `Branch_RefID` and `UserRole_RefID`

This is a full round trip to load data only to immediately write it back. The underlying `UPDATE` could target only the two changed columns.

### 2. HIGH — Inherits `Func_TblLog_UserLoginSession_SET` overhead (SQL-06)

The call to `_SET` triggers the full DBLINK + 14-scalar-SELECT chain from SQL-06, adding ~443ms. The total pipeline for changing 2 fields is:
```
SELECT * (load session)       ~50ms
14× scalar escape SELECTs    ~30ms
DBLINK to SysConfig DB        ~20ms
INSERT/UPDATE on SysConfig    ~250ms
─────────────────────────────
Total:                        ~365ms  to change 2 columns
```

### 3. MEDIUM — Dynamic SQL for a fixed-structure operation

The `WHERE "Sys_PID" = X OR "Sys_SID" = X` query is built via string concatenation. With known bigint parameters this is safe but non-parameterized.

---

## Fix

Replace the read-all + write-all pattern with a direct targeted UPDATE:

```sql
-- On the SysConfig DB, add a dedicated update function:
CREATE OR REPLACE FUNCTION "SchSysConfig"."Func_TblLog_UserLoginSession_SET_BranchAndRole"(
    varSessionID bigint,
    varRecordID  bigint,
    varBranchID  bigint,
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

This eliminates the SELECT, the 14 escape calls, and passes only 4 parameters through DBLINK instead of 15.

---

## Expected Gain

| Fix | Saving |
|-----|--------|
| Targeted UPDATE instead of read-all/write-all | **~300ms** (eliminates SELECT + 14 escapes + full _SET call) |
