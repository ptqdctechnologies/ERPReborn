# SQL-04 — `Func_GetDataPickSet_UserPrivileges`

| Field | Value |
|-------|-------|
| Schema | `SchSysConfig` |
| Calls (capture run) | **2 with identical parameters** |
| Time | ~439ms, ~444ms |
| Callers | `Helper_Environment.php:162`, `setLogin.php:332` |
| Severity | **High** |

---

## What It Does

Returns the full privilege set for a user — the complete list of actions, menus, and permissions the user is allowed to perform — as a JSON structure. Called during session initialization and whenever the privilege set needs to be re-evaluated.

---

## Call Pattern (from log)

```
kind=read  time=439ms  caller=Helper_Environment.php:162   sql=Func_GetDataPickSet_UserPrivileges(4000000000041)
kind=read  time=444ms  caller=setLogin.php:332             sql=Func_GetDataPickSet_UserPrivileges(4000000000041)
```

**Same parameter, same result, called twice in one request** from two different callers.

---

## Problems Found

### 1. HIGH — Called twice with same params in same request

`Helper_Environment.php:162` and `setLogin.php:332` both call this function with the same `varID = 4000000000041` in the same request lifecycle. The privilege set for a user cannot change between these two calls (they are milliseconds apart in the same request).

Total wasted cost: ~440ms per login request purely from the duplicate call.

### 2. HIGH — DB-side caching not preventing the double call

The function signature references `FuncSys_CacheFunctionResult_GetData` and `FuncSys_CacheFunctionResult_SetData` in its dependencies — suggesting a DB-level result cache is implemented. However, it still takes ~440ms on both calls, indicating either:
- The DB cache is not being hit (key miss, TTL expired, or first call hasn't stored yet)
- The cache lookup itself is not cheap enough to avoid the overhead

### 3. MEDIUM — Very large function body (8000+ lines)

The function body is over 8,000 lines according to the SQL file. Complex privilege aggregation with extensive JSON building and nested queries. Any optimization inside requires careful review of the full privilege tree logic.

---

## Fix

### Immediate: Deduplicate at PHP level

In `Helper_Environment.php` or the request container, memoize the result for the request lifetime:

```php
// In a request-scoped service or static cache:
private static array $privilegeCache = [];

public static function getUserPrivileges(int $userId): array {
    if (!array_key_exists($userId, self::$privilegeCache)) {
        self::$privilegeCache[$userId] = /* existing DB call */;
    }
    return self::$privilegeCache[$userId];
}
```

Both `Helper_Environment.php:162` and `setLogin.php:332` call through this wrapper — the second call returns instantly from memory.

### Better: Cache in Redis per user session

```php
$cacheKey = "user_privileges:{$userId}";
return Cache::remember($cacheKey, 3600, fn() => /* DB call */);
```

Privilege sets change only when an admin modifies roles — invalidate on role/permission write.

---

## Expected Gain

| Fix | Saving per Login Request |
|-----|--------------------------|
| Deduplicate at PHP level | **~440ms** (skip second identical call) |
| Redis cache across requests | **~440ms** per request after first login |
