# SQL-09 — `Func_General_JSONArray_ConvertKeysToCamelCase`

| Field | Value |
|-------|-------|
| Schema | `SchSysAsset` |
| Calls (capture run) | 3 |
| Avg time | ~193ms |
| Caller | `Helper_API.php:419` |
| Severity | **Medium** |

---

## What It Does

Converts all keys in a JSON array (or object) from `PascalCase`/`Sys_SnakeCase` to `camelCase`. Called from `Helper_API.php` as a **post-processing step on every API response** before the JSON is returned to the client.

---

## Implementation

```sql
-- For JSON arrays: extracts each element, checks if it's an object/array/scalar,
-- recursively converts keys, then re-assembles with STRING_AGG:
varSQL := '
    SELECT ("[" || STRING_AGG("SubSQL"."JSONElementData"::varchar, ",") OVER () || "]")::json
    FROM (
        SELECT
            CASE
                WHEN element IS JSON OBJECT  → Func_General_JSONObject_ConvertKeysToCamelCase(element)
                WHEN element IS JSON ARRAY   → Func_General_JSONArray_ConvertKeysToCamelCase(element)  ← recursive
                ELSE element::varchar
            END AS "JSONElementData"
        FROM Func_General_JSONArray_ExtractToElements(varData)
    ) AS "SubSQL"
    LIMIT 1
';
EXECUTE varSQL INTO varReturn;
```

Each call: extracts elements → classifies each → applies recursive conversion → reassembles.

---

## Problems Found

### 1. HIGH — JSON manipulation in the database server

CamelCase key conversion is pure string transformation. It has no business logic, no cross-table joins, and no data that only the DB knows. Running it in PostgreSQL consumes DB CPU cycles and connection time for work that PHP handles trivially.

Every API response goes through this function (called from `Helper_API.php:419`), making it a **per-response overhead** rather than an optional feature.

### 2. HIGH — Dynamic SQL for a static operation

```sql
varSQL := '
    SELECT ... FROM Func_General_JSONArray_ExtractToElements(
        ' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_JSON"(varData::json)) || '::json
    )
';
EXECUTE varSQL INTO varReturn;
```

One scalar SELECT to escape the JSON input, then `EXECUTE` to run the query. PostgreSQL cannot cache this plan.

### 3. MEDIUM — Recursive calls on nested structures

For deeply nested JSON, this function calls itself recursively. Each recursive call is another `EXECUTE` + round trip through the PostgreSQL executor. A 3-level nested JSON array results in 3× call overhead.

### 4. MEDIUM — `varSignEligibleToProcess` dead-code pattern

```sql
varSignEligibleToProcess := FALSE;
IF (varSignEligibleToProcess IS FALSE) THEN
    varSignEligibleToProcess := TRUE;   -- always runs
END IF;
```

---

## Fix

### Move CamelCase conversion entirely to PHP

Remove the DB call from `Helper_API.php:419` and replace with a PHP function:

```php
// In Helper_API.php or a new utility class:
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

Call it after `json_decode`:
```php
$data = json_decode($responseBody, true);
$data = Helper_Utility::toCamelCaseKeys($data);
```

This eliminates 3 × ~193ms = ~579ms of DB time across the test run, with the PHP version taking <1ms total.

---

## Expected Gain

| Fix | Saving |
|-----|--------|
| Move CamelCase to PHP | **~193ms per response** that uses this function (~0ms in PHP) |
