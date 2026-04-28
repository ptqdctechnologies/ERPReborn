# SQL-03 — `Func_GetDataListJSON_CombinedBudgetSectionDetail`

| Field | Value |
|-------|-------|
| Schema | `SchData-OLTP-Budgeting` |
| Calls (capture run) | 1 |
| Time | **848ms** (slowest single endpoint in test) |
| Caller | `SchData_OLTP_Budgeting/General.php:827` |
| Severity | **Critical** |

---

## What It Does

Returns a JSON array of combined budget section detail rows for a given branch + budget section. It wraps an inner function `Func_GetDataList_CombinedBudgetSectionDetail` and applies a CamelCase key transformation on top.

```
Func_GetDataListJSON_CombinedBudgetSectionDetail(branch, section, pick, sort, filter, paging)
  ↓
  Builds dynamic SQL with 4× scalar SELECT escapes
  ↓
  Calls Func_GetDataList_CombinedBudgetSectionDetail (inner data function)
  ↓
  Calls Func_SQLTools_QueryResult_TransformToJSONCamelCaseKey (JSON transformation)
  ↓
  Returns json
```

---

## Problems Found

### 1. CRITICAL — Double dynamic SQL wrapping

The outer function builds a SQL string that itself contains a SQL string (two levels of escaping):

```sql
varSQL := '
    SELECT
        "SchSysAsset"."Func_SQLTools_QueryResult_TransformToJSONCamelCaseKey"(
        ''                                   -- ← inner SQL string starts here
        SELECT * FROM
            "SchData-OLTP-Budgeting"."Func_GetDataList_CombinedBudgetSectionDetail"(
                ' || REPLACE((SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBranch_RefID)), '''', '''''') || '::bigint,
                ...
            )
        ''::varchar,                         -- ← inner SQL string ends here
        ...
    )
';
EXECUTE varSQL INTO varReturn;
```

This means:
- 4 scalar `SELECT` calls to escape parameters
- Double-escaping via `REPLACE(..., '''', '''''')` for the inner SQL string
- The DB must parse and execute 3 nested query levels

### 2. HIGH — JSON transformation in the database (CPU on DB server)

`Func_SQLTools_QueryResult_TransformToJSONCamelCaseKey` converts every key in the result set from `PascalCase`/`snake_case` to `camelCase` **inside PostgreSQL**. This is string manipulation on the DB server — exactly the kind of work that belongs in the application layer.

Budget section detail could have dozens of rows × many keys = significant DB CPU time.

### 3. HIGH — `varSignEligibleToProcess` dead-code pattern

```sql
varSignEligibleToProcess := FALSE;
IF (varSignEligibleToProcess IS FALSE) THEN
    varSignEligibleToProcess := TRUE;   -- always runs
END IF;
IF (varSignEligibleToProcess IS TRUE) THEN
    ...                                 -- always runs
END IF;
```

The flag is unconditionally set to `TRUE`. Both `IF` blocks always execute. The pattern suggests a validation gate that was never implemented, leaving dead scaffolding.

### 4. MEDIUM — No result caching

Budget section detail is reference data that changes infrequently (when a budget is modified by an admin). Every API call re-executes the full 848ms query. A cache with a few-minute TTL would serve the vast majority of reads from memory.

### 5. MEDIUM — `SELECT *` in inner call

The inner `Func_GetDataList_CombinedBudgetSectionDetail` is called with `pick = '*'` by default (selecting all columns). For JSON serialization, all columns are fetched even if only a subset is needed by the caller.

---

## Fix

### 1. Eliminate the double-wrapping — call inner function directly

```sql
-- Instead of building a string that calls the inner function as a string,
-- call it directly and apply CamelCase in PHP:
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

### 2. Move CamelCase conversion to PHP

```php
// In the engine or model after fetching data:
$rows = $result['data'];
$camelRows = array_map(fn($row) => array_combine(
    array_map(fn($k) => lcfirst(str_replace('_', '', ucwords($k, '_'))), array_keys($row)),
    array_values($row)
), $rows);
```

This is CPU-cheap in PHP and removes the DB string manipulation entirely.

### 3. Cache results

```php
$cacheKey = "budget_section_detail:{$branchId}:{$sectionId}";
return Cache::remember($cacheKey, 300, fn() => /* DB call */);
```

Invalidate on budget modification writes.

---

## Expected Gain

| Fix | Saving |
|-----|--------|
| Eliminate double dynamic SQL | ~100–200ms (removes 3 levels of parse + execute) |
| CamelCase in PHP | ~50–100ms (DB CPU off-loaded) |
| Redis cache (5min TTL) | **~800ms** on cache hit (skip entire query) |
