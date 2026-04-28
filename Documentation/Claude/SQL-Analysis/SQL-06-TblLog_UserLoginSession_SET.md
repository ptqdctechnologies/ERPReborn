# SQL-06 — `Func_TblLog_UserLoginSession_SET`

| Field | Value |
|-------|-------|
| Schema | `SchSysConfig` |
| Calls (capture run) | 1 (login) |
| Time | **443ms** |
| Caller | `SchSysConfig/TblLog_UserLoginSession.php:76` |
| Severity | **High** |

---

## What It Does

Inserts or updates a user's login session record in `TblLog_UserLoginSession`. Called during login (`setLogin`) to create the session, and during `SetUserSessionBranchAndUserRole` to update the branch/role on the existing session record.

---

## Structural Pattern

This function follows the identical anti-pattern as `Func_TblRotateLog_API_SET` (see `ANALYSIS-TblRotateLog_API.md`):

```
Func_TblLog_UserLoginSession_SET (dbERPReborn)
  ↓
  Resolves User_RefID via FuncSys_General_GetUserIDByName (extra round trip)
  ↓
  Builds dynamic SQL with 14× scalar SELECT escape calls
  ↓
  DBLINK → SysConfig DB
      → Func_TblLog_UserLoginSession_INSERT or _UPDATE
```

---

## Problems Found

### 1. HIGH — 14 scalar SELECT calls to build the DBLINK string

Both the INSERT and UPDATE branches each build their SQL string by calling an escape helper for every parameter:

```sql
SELECT 
    "SubSQL"."Sys_RPK" 
FROM DBLINK(
    (SELECT "SchSysConfig"."FuncSys_General_GetDBLinkConnectionString"('SysConfig')),
    '... ' ||
    (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_VarChar"(varSysDataAnnotation)) || '::varchar, ' ||
    (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varUser_RefID)) || '::bigint, ' ||
    (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_VarChar"(varAPIWebToken)) || '::varchar, ' ||
    -- ... 11 more escape calls
) AS ...
```

**14 scalar SELECT calls** just to escape parameters before the DBLINK is even opened.

### 2. HIGH — DBLINK cross-database call

Same issue as `Func_TblRotateLog_API_SET` — the session table lives in `SysConfig` DB, forcing a DBLINK round trip on every login and branch-switch.

### 3. MEDIUM — Extra lookup: `FuncSys_General_GetUserIDByName`

Before building the SQL, the function calls:
```sql
varUser_RefID = (SELECT "SchSysConfig"."FuncSys_General_GetUserIDByName"(varLDAPUserID::varchar));
```

This is an extra DB round trip just to resolve a User_RefID that could be passed in from the caller (which already has it from `FuncSys_General_GetUserIdentityByLDAPUserID`).

### 4. LOW — Commented-out DBLINK code left in production

A previous implementation using a DBLINK to resolve `varUser_RefID` is commented out (55 lines of dead code). This should be removed.

### 5. LOW — `varSignValid := 0` dead guard (identical to TblRotateLog pattern)

```sql
varSignValid := 0;
-- IF (varSignValid=0) THEN  ← commented out but left as dead code
```

---

## Fix

### Replace 14 scalar escapes with `format()` + `%L`

```sql
varSQL := format(
    'SELECT "SignRecordID" FROM "SchSysConfig"."Func_TblLog_UserLoginSession_INSERT"(
        %L::varchar, %s::bigint, %L::timestamptz, %s, %s,
        %s::bigint, %L::varchar, %L::json, %s::bigint, %s::bigint,
        %L::timestamptz, %L::timestamptz, %L::timestamptz, %L::timestamptz, %L::varchar
    )',
    varSysDataAnnotation, varIDSession,
    "SchSysConfig"."FuncSys_General_GetDBClusterTimestamp"(),
    ..., varLDAPUserID
);
```

### Pass User_RefID from caller

The caller already has `User_RefID` from the identity resolution step. Pass it directly instead of re-resolving inside the function:

```sql
-- Remove this line:
varUser_RefID = (SELECT "SchSysConfig"."FuncSys_General_GetUserIDByName"(varLDAPUserID::varchar));

-- Add User_RefID as a parameter to the function signature
```

### Remove 55 lines of commented-out dead code

---

## Expected Gain

| Fix | Saving |
|-----|--------|
| `format()` instead of 14 scalar SELECTs | ~10–20ms |
| Remove extra `GetUserIDByName` lookup | ~50–100ms |
| DBLINK elimination (arch change) | ~20–50ms |
