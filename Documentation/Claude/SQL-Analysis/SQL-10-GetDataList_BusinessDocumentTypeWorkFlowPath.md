# SQL-10 — `Func_GetDataList_BusinessDocumentTypeWorkFlowPath`

| Field | Value |
|-------|-------|
| Schema | `SchSysConfig` |
| Calls (capture run) | 1 |
| Time | **325ms** |
| Caller | `SchSysConfig/General.php:398` |
| Severity | **Medium** |

---

## What It Does

Returns the approval workflow path for a business document type, optionally filtered by submitter entity and combined budget. Used when creating documents that require a workflow (e.g. Advance Request, Purchase Order).

---

## Notable: Caching Is Already Implemented

The function documentation states:

> *"Metode Cache Function Result sudah diterapkan guna mempercepat waktu proses pemuatan data yang bersifat statis."*  
> (Cache Function Result method has been applied to speed up loading of static data.)

It calls `FuncSys_CacheFunctionResult_GetData` and `FuncSys_CacheFunctionResult_SetData` internally. Despite this, the call still took **325ms**, indicating either:
- This was a cold cache miss (first call after DB restart or TTL expiry)
- The cache lookup itself has significant overhead
- The cache key parameters (branch + docType + submitter + budget) resulted in a miss

---

## Problems Found

### 1. MEDIUM — DB-side caching has its own overhead

The `FuncSys_CacheFunctionResult_*` functions store results somewhere in the DB (likely a cache table). Looking up and storing from a cache table still involves a DB round trip + table scan/index lookup. This is faster than the full re-computation but slower than an application-level cache in Redis.

On a cache miss, the full computation plus cache write still takes ~325ms.

### 2. MEDIUM — Cache warm-up not guaranteed

On container restart or after DB maintenance, all DB-side caches are cold. The first request for each unique (branch, docType, submitter, budget) combination pays the full cost.

### 3. LOW — Complex 8-parameter function with optional defaults

```sql
Func_GetDataList_BusinessDocumentTypeWorkFlowPath(
    varBranch_RefID,              -- mandatory
    varBusinessDocumentType_RefID,-- mandatory
    varSubmitterEntity_RefID,     -- optional
    varCombinedBudget_RefID,      -- optional
    varPickStatement,             -- optional, default '*'
    varSortStatement,             -- optional, default '"OrderSequence" ASC'
    varFilterStatement,           -- optional, default ''
    varPagingStatement            -- optional, default 'LIMIT ALL OFFSET 0'
)
```

Cache key design must account for all 8 parameters to avoid returning wrong cached results. If the DB cache key does not include all optional parameters, cache collisions could return incorrect workflows.

---

## Fix

### Layer an application-level Redis cache on top of the existing DB cache

```php
$cacheKey = sprintf(
    'workflow_path:%d:%d:%d:%d',
    $branchId, $docTypeId, $submitterEntityId ?? 0, $combinedBudgetId ?? 0
);

return Cache::remember($cacheKey, 3600, fn() => /* DB call */);
```

Workflow paths change only when admin modifies the workflow configuration. Invalidate on workflow write.

### Verify DB cache key includes all discriminating parameters

Review `FuncSys_CacheFunctionResult_GetData` to confirm the cache key is built from all 4 discriminating parameters (branch, docType, submitter, budget). If optional parameters are excluded from the key, fix the cache key construction.

---

## Expected Gain

| Fix | Saving |
|-----|--------|
| Redis application cache (warm hit) | **~325ms** per repeated call |
| Verify DB cache key completeness | Correctness — prevents wrong workflow being served |
