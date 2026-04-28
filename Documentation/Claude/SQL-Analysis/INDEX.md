# SQL Analysis — Scenario 04 Captured Queries

**Captured:** 2026-04-21 via `k6-tests/scripts/sql_capture.js` (29 endpoints, 1 VU)  
**Source:** `laravel.log` `[SQL.query]` lines with `LOG_SQL=true`

---

## Unique Stored Procedures Found

| # | Function | Schema | Calls | Avg Time | Severity | Analysis |
|---|----------|--------|-------|----------|----------|----------|
| 1 | `FuncSys_General_GetUserIdentityByLDAPUserID` | SchSysConfig | 25 | ~300ms | **Critical** | [→](SQL-01-GetUserIdentityByLDAPUserID.md) |
| 2 | `Func_TblRotateLog_API_SET` | SchSysConfig | 30 | ~295ms | **Critical** | [→](../ANALYSIS-TblRotateLog_API.md) |
| 3 | `Func_GetDataListJSON_CombinedBudgetSectionDetail` | SchData-OLTP-Budgeting | 1 | 848ms | **Critical** | [→](SQL-03-CombinedBudgetSectionDetail.md) |
| 4 | `Func_GetDataPickSet_UserPrivileges` | SchSysConfig | 2 | ~442ms | **High** | [→](SQL-04-GetDataPickSet_UserPrivileges.md) |
| 5 | `Func_General_GetUserPrivilege_MenuLayout` | SchSysConfig | 1 | 465ms | **High** | [→](SQL-05-GetUserPrivilege_MenuLayout.md) |
| 6 | `Func_TblLog_UserLoginSession_SET` | SchSysConfig | 1 | 443ms | **High** | [→](SQL-06-TblLog_UserLoginSession_SET.md) |
| 7 | `FuncSys_General_GetExistantionOnSystem_APIWebToken` | SchSysConfig | 1 | 334ms | **High** | [→](SQL-07-GetExistantionOnSystem_APIWebToken.md) |
| 8 | `FuncSys_General_SetUserSessionBranchAndUserRole` | SchSysConfig | 1 | 365ms | **Medium** | [→](SQL-08-SetUserSessionBranchAndUserRole.md) |
| 9 | `Func_General_JSONArray_ConvertKeysToCamelCase` | SchSysAsset | 3 | ~192ms | **Medium** | [→](SQL-09-JSONArray_ConvertKeysToCamelCase.md) |
| 10 | `Func_GetDataList_BusinessDocumentTypeWorkFlowPath` | SchSysConfig | 1 | 325ms | **Medium** | [→](SQL-10-GetDataList_BusinessDocumentTypeWorkFlowPath.md) |

---

## Per-Request Cost Breakdown (typical authenticated gateway call)

```
FuncSys_General_GetUserIdentityByLDAPUserID  ~300ms  ← called every request
Func_TblRotateLog_API_SET                    ~295ms  ← called every request
FuncSys_General_GetExistantionOnSystem_…     ~334ms  ← token validation every request
─────────────────────────────────────────────────────
Infrastructure overhead per request:         ~929ms  (before business logic runs)

Business logic (e.g. CombinedBudgetSection)  ~848ms  ← worst single endpoint
```

**The top 3 infrastructure functions together cost ~930ms on every single request before any business logic executes.**

---

## Common Anti-Patterns Found Across Functions

| Pattern | Occurrences | Impact |
|---------|-------------|--------|
| Dynamic SQL string built with N× scalar `SELECT` helper calls | 7/10 functions | +5–15 round trips per call |
| DBLINK cross-database call | 4/10 functions | +5–30ms TCP overhead per call |
| Results never cached despite identical parameters per-request | 5/10 functions | 100% redundant DB work |
| `COUNT(*)` where `EXISTS` suffices | 2/10 functions | Full row scan vs. stop-at-first |
| SQL injection via raw string concatenation | 1/10 functions | Security risk |
| `varSignEligibleToProcess` dead-code pattern (always TRUE) | 6/10 functions | Misleading code |
