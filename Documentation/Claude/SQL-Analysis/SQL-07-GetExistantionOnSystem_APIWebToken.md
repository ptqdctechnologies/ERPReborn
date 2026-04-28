# SQL-07 — `FuncSys_General_GetExistantionOnSystem_APIWebToken`

| Field | Value |
|-------|-------|
| Schema | `SchSysConfig` |
| Calls (capture run) | 1 |
| Time | **334ms** |
| Caller | `SchSysConfig/General.php:1073` |
| Severity | **High** |

---

## What It Does

Validates whether a JWT `APIWebToken` exists in `TblLog_UserLoginSession` and falls within a valid time window. Returns `boolean`.

Called on every authenticated request to verify the token has not expired or been revoked.

---

## Full SQL Inside the Function

```sql
varSQL = '
    SELECT
        CASE
            WHEN (COUNT("Sys_RPK") = 0) THEN 
                FALSE
            ELSE
                TRUE
        END AS "SignValid"
    FROM 
        "SchSysConfig"."TblLog_UserLoginSession"
    WHERE
        "SessionAutoStartDateTimeTZ" <= NOW()
        AND
        "SessionAutoFinishDateTimeTZ" >= NOW()
        AND
        "APIWebToken" = ''' || varAPIWebToken || '''
    ';
EXECUTE varSQL INTO varReturn;
```

---

## Problems Found

### 1. CRITICAL — SQL Injection via raw string concatenation

```sql
"APIWebToken" = ''' || varAPIWebToken || '''
```

`varAPIWebToken` is concatenated directly into the SQL string with no sanitization. A crafted JWT value containing `'; DROP TABLE ...` would execute arbitrary SQL.

JWT tokens are base64url-encoded and in practice safe, but this is still a code-level SQL injection vulnerability. Any future code that reuses this pattern with less-controlled input is at risk.

**Fix:** Use `EXECUTE ... USING`:
```sql
EXECUTE '
    SELECT (COUNT("Sys_RPK") > 0)
    FROM "SchSysConfig"."TblLog_UserLoginSession"
    WHERE "SessionAutoStartDateTimeTZ" <= NOW()
    AND   "SessionAutoFinishDateTimeTZ" >= NOW()
    AND   "APIWebToken" = $1
' INTO varReturn USING varAPIWebToken;
```

### 2. HIGH — `COUNT(*)` where `EXISTS` suffices

```sql
SELECT CASE WHEN (COUNT("Sys_RPK") = 0) THEN FALSE ELSE TRUE END
```

`COUNT` scans all matching rows to produce a count, then checks if it's zero. `EXISTS` stops at the first match:

```sql
SELECT EXISTS (
    SELECT 1 FROM "SchSysConfig"."TblLog_UserLoginSession"
    WHERE "SessionAutoStartDateTimeTZ" <= NOW()
    AND   "SessionAutoFinishDateTimeTZ" >= NOW()
    AND   "APIWebToken" = $1
) INTO varReturn USING varAPIWebToken;
```

### 3. HIGH — No index on `APIWebToken`

The query filters by `APIWebToken` on every authenticated request. Without an index, this is a full sequential scan of the entire session table. Session tables grow with usage; this degrades linearly.

**Fix:**
```sql
CREATE INDEX IF NOT EXISTS idx_userloginsession_token
    ON "SchSysConfig"."TblLog_UserLoginSession" ("APIWebToken")
    WHERE "SessionAutoFinishDateTimeTZ" >= NOW();
```

A partial index on non-expired tokens keeps the index small and scans only active sessions.

### 4. HIGH — No caching — called on every request with the same token

The token for an active session does not change between requests. The result of this validation (token is valid) is identical for every request in the same session until the token expires. Yet it hits the DB every time.

**Fix:** Cache the validation result in Redis using the token as key, with TTL set to the token's remaining lifetime:

```php
$cacheKey = 'token_valid:' . hash('sha256', $token);
$ttl      = /* session expiry - now */;
return Cache::remember($cacheKey, $ttl, fn() => /* DB call */);
```

On logout, explicitly delete the cache key.

### 5. LOW — `varSignEligibleToProcess` dead-code pattern

```sql
varSignEligibleToProcess := FALSE;
IF (varSignEligibleToProcess = FALSE) THEN
    varSignEligibleToProcess := TRUE;  -- always runs
END IF;
IF (varSignEligibleToProcess = TRUE) THEN
    ...  -- always runs
END IF;
```

---

## Fix Summary

```sql
-- Replacement function body:
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

Plus add the partial index on `APIWebToken`.

---

## Expected Gain

| Fix | Impact |
|-----|--------|
| SQL injection fix | Security — eliminates injection vector |
| `EXISTS` vs `COUNT` | Minor speed + correctness |
| Index on `APIWebToken` | **~250–300ms** (full scan → index lookup) |
| Redis cache per token | **~334ms** on all requests after first validation |
