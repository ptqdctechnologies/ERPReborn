# SQL-05 — `Func_General_GetUserPrivilege_MenuLayout`

| Field | Value |
|-------|-------|
| Schema | `SchSysConfig` |
| Calls (capture run) | 1 |
| Time | **465ms** |
| Caller | `SchSysConfig/General.php:230` |
| Severity | **High** |

---

## What It Does

Builds the full hierarchical menu layout JSON for a user given their branch and user ID. Used to render the application's navigation menu after login.

Internal call chain:
```
Func_General_GetUserPrivilege_MenuLayout(branch_RefID, user_RefID)
  ↓
  Func_GetDataPickSet_UserPrivileges(user_RefID)  ← ~440ms (see SQL-04)
  ↓
  Func_General_JSONArray_ExtractToElements(json)
  ↓
  Builds menu hierarchy JSON
```

---

## Problems Found

### 1. HIGH — Cascades the `Func_GetDataPickSet_UserPrivileges` cost

This function internally calls `Func_GetDataPickSet_UserPrivileges` (SQL-04), which is itself ~440ms. This means the 465ms total is almost entirely the privileges fetch — with minimal overhead for the menu layout assembly on top.

If SQL-04 is fixed (cached), this function's cost drops proportionally.

### 2. HIGH — Menu layout is essentially static data

A user's menu layout changes only when:
- An admin modifies the user's role/permissions
- The menu structure itself changes (code deployment)

Yet it is recomputed from scratch on every call.

### 3. MEDIUM — JSON array extraction in DB

`Func_General_JSONArray_ExtractToElements` unpacks the privileges JSON into rows in the DB, which are then re-assembled into a menu hierarchy JSON. This extract → iterate → reassemble pattern is expensive in the DB and would be faster in PHP.

---

## Fix

### Cache the full menu layout JSON

```php
$cacheKey = "menu_layout:{$branchId}:{$userId}";
return Cache::remember($cacheKey, 3600, fn() => /* DB call */);
```

The menu layout is the ideal candidate for long-TTL caching since it is expensive to compute (~465ms) and changes very infrequently.

**Invalidation trigger:** On any role/permission write in `SchSysConfig`, clear `menu_layout:{branch}:{user}` for the affected user.

### Benefit stacking

If SQL-04 (`Func_GetDataPickSet_UserPrivileges`) is also cached, the DB cost drops near zero. The menu layout cache is an independent second layer — even if SQL-04 is not cached yet, caching SQL-05 at the PHP level is worth doing immediately.

---

## Expected Gain

| Fix | Saving |
|-----|--------|
| Redis cache on menu layout | **~460ms** per request after first load |
