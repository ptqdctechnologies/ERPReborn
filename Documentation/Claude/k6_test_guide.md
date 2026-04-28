# k6 Load Test — Laravel App API

Generated from `API_Documentation.xlsx`. Covers **55 endpoints** across **10 form groups**.

---

## Project Structure

```
k6/
├── api_mapping.js   ← API definitions (keys, payloads, names)
└── test.js          ← k6 runner (scenarios, checks, metrics)
```

---

## Quick Start

```bash
# Install k6
brew install k6          # macOS
# or: https://k6.io/docs/getting-started/installation/

# Read-only load test (safe, no DB mutations)
k6 run \
  --env BASE_URL=https://your-laravel-app.com \
  --env API_USERNAME=youruser \
  --env API_PASSWORD=yourpass \
  test.js

# Custom VUs and duration
k6 run --vus 10 --duration 60s test.js

# Write scenario (creates records — use a staging environment!)
k6 run --env SCENARIO=write test.js
```

---

## Configuration

| ENV Variable    | Default                       | Description              |
|-----------------|-------------------------------|--------------------------|
| `BASE_URL`      | `https://your-laravel-app.com`| Laravel app base URL     |
| `API_USERNAME`  | `icha`                        | Login username           |
| `API_PASSWORD`  | `icha1234`                    | Login password           |

> **Important:** Update `API_ENDPOINT` in `api_mapping.js` if your API path differs from `/api`.

---

## API Modules

| Module                    | Endpoints | Operations              |
|---------------------------|-----------|-------------------------|
| Auth                      | 1         | login                   |
| Menu                      | 1         | getMenuLayout           |
| Advance Request Form      | 11        | CRUD + picklists        |
| Advance Settlement Form   | 4         | CRUD                    |
| Purchase Request Form     | 5         | CRUD + picklists        |
| Purchase Order Form       | 7         | CRUD + picklists        |
| Account Payable Form      | 7         | CRUD + picklists        |
| Delivery Order Form       | 6         | CRUD + picklists        |
| Material Receive Form     | 4         | CRUD                    |
| Business Trip Request Form| 4         | CRUD                    |
| Business Trip Settlement  | 4         | CRUD                    |

---

## Request Envelope

All endpoints use a single POST endpoint. Adjust `buildBody()` in `test.js` if your envelope differs.

```json
{
  "APIKey": "authentication.general.setLogin",
  "username": "...",
  "password": "..."
}
```

---

## `api_mapping.js`

```javascript
// ============================================================
// API Mapping - Laravel App
// Generated from API_Documentation.xlsx
// Compatible with k6 load testing framework
// ============================================================

export const BASE_URL = __ENV.BASE_URL || 'https://your-laravel-app.com';
export const API_ENDPOINT = `${BASE_URL}/api`; // Adjust path as needed

// ============================================================
// AUTH
// ============================================================
export const AUTH = {
  login: {
    name: 'Login',
    apiKey: 'authentication.general.setLogin',
    payload: {
      username: __ENV.API_USERNAME || 'icha',
      password: __ENV.API_PASSWORD || 'icha1234',
    },
  },
};

// ============================================================
// MENU
// ============================================================
export const MENU = {
  getMenuLayout: {
    name: 'Get Menu Layout',
    apiKey: 'transaction.read.dataList.sysConfig.getAppObject_MenuLayout',
    payload: {
      parameter: {
        recordID: 4000000000359,
      },
    },
  },
};

// ============================================================
// ADVANCE REQUEST FORM
// ============================================================
export const ADVANCE_REQUEST = {
  getBudgetPickList: {
    name: 'Advance Request - Budget PickList',
    apiKey: 'dataPickList.project.getProject',
    payload: null,
  },
  getNewSite: {
    name: 'Advance Request - Get New Site',
    apiKey: 'dataPickList.project.getProjectSectionItem',
    payload: {
      parameter: {
        project_RefID: 46000000000033,
      },
    },
  },
  getRequester: {
    name: 'Advance Request - Get Requester',
    apiKey: 'transaction.read.dataList.humanResource.getWorkerJobsPositionCurrent',
    payload: {
      parameter: {
        worker_RefID: null, // e.g. 32000000000557
      },
      SQLStatement: {
        pick: null,
        sort: null,
        filter: null,
        paging: null,
      },
    },
  },
  getBeneficiary: {
    name: 'Advance Request - Get Beneficiary',
    apiKey: 'transaction.read.dataList.humanResource.getWorkerJobsPositionCurrent',
    payload: {
      parameter: {
        worker_RefID: null,
      },
      SQLStatement: {
        pick: null,
        sort: null,
        filter: null,
        paging: null,
      },
    },
  },
  getBank: {
    name: 'Advance Request - Get Bank',
    apiKey: 'transaction.read.dataList.master.getEntityBankAccount',
    payload: {
      parameter: {
        entity_RefID: 164000000000439,
      },
      SQLStatement: {
        pick: null,
        sort: null,
        filter: null,
        paging: null,
      },
    },
  },
  getBankAccount: {
    name: 'Advance Request - Get Bank Account',
    apiKey: 'transaction.read.dataList.master.getBankAccount',
    payload: {
      parameter: {
        bank_RefID: null, // e.g. 166000000000005
      },
      SQLStatement: {
        pick: null,
        sort: null,
        filter: null,
        paging: null,
      },
    },
  },
  getBudgetDetail: {
    name: 'Advance Request - Get Budget Detail',
    apiKey: 'transaction.read.dataList.budgeting.getCombinedBudgetSectionDetail',
    payload: {
      parameter: {
        combinedBudgetSection_RefID: 143000000000302,
      },
      SQLStatement: {
        pick: null,
        sort: null,
        filter: null,
        paging: null,
      },
    },
  },
  getWorkflow: {
    name: 'Advance Request - Get Workflow',
    apiKey: 'userAction.documentWorkFlow.general.getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID',
    payload: {
      parameter: {
        businessDocumentType_RefID: 77000000000057,
        submitterEntity_RefID: 164000000000196,
        combinedBudget_RefID: 46000000000033,
      },
    },
  },
  getAdvancePickList: {
    name: 'Advance Request - Advance PickList',
    apiKey: 'dataPickList.finance.getAdvance',
    payload: null,
  },
  store: {
    name: 'Advance Request - Create',
    apiKey: 'transaction.create.finance.setAdvance',
    payload: {
      entities: {
        documentDateTimeTZ: '2022-03-07',
        log_FileUpload_Pointer_RefID: 91000000000001,
        requesterWorkerJobsPosition_RefID: 164000000000497,
        beneficiaryWorkerJobsPosition_RefID: 164000000000439,
        beneficiaryBankAccount_RefID: 167000000000001,
        internalNotes: 'k6 load test - internal notes',
        remarks: 'k6 load test - remarks',
        additionalData: {
          itemList: {
            items: [
              {
                entities: {
                  workStructure_RefID: 302000000000001,
                  combinedBudgetSectionDetail_RefID: 169000000000001,
                  product_RefID: 88000000000002,
                  quantity: 10,
                  quantityUnit_RefID: 73000000000001,
                  productUnitPriceCurrency_RefID: 62000000000001,
                  productUnitPriceCurrencyValue: 30000,
                  productUnitPriceCurrencyExchangeRate: 1,
                  remarks: 'k6 load test item',
                },
              },
            ],
          },
        },
      },
    },
  },
  getDetail: {
    name: 'Advance Request - Get Detail',
    apiKey: 'transaction.read.dataList.finance.getAdvanceDetail',
    payload: {
      parameter: {
        advance_RefID: 76000000000050,
      },
      SQLStatement: {
        pick: null,
        sort: null,
        filter: null,
        paging: null,
      },
    },
  },
  update: {
    name: 'Advance Request - Update',
    apiKey: 'transaction.update.finance.setAdvance',
    payload: {
      recordID: 76000000000001,
      entities: {
        documentDateTimeTZ: '2022-03-07',
        log_FileUpload_Pointer_RefID: 91000000000001,
        requesterWorkerJobsPosition_RefID: 164000000000497,
        beneficiaryWorkerJobsPosition_RefID: 164000000000439,
        beneficiaryBankAccount_RefID: 167000000000001,
        internalNotes: 'k6 load test - updated notes',
        remarks: 'k6 load test - updated remarks',
        additionalData: {
          itemList: {
            items: [
              {
                recordID: 82000000000001,
                entities: {
                  workStructure_RefID: 302000000000002,
                  combinedBudgetSectionDetail_RefID: 169000000000001,
                  product_RefID: 88000000000002,
                  quantity: 10,
                  quantityUnit_RefID: 73000000000001,
                  productUnitPriceCurrency_RefID: 62000000000001,
                  productUnitPriceCurrencyExchangeRate: 1,
                  productUnitPriceCurrencyValue: 30000,
                  remarks: 'k6 load test item updated',
                },
              },
            ],
          },
        },
      },
    },
  },
};

// ============================================================
// ADVANCE SETTLEMENT FORM
// ============================================================
export const ADVANCE_SETTLEMENT = {
  getPickList: {
    name: 'Advance Settlement - PickList',
    apiKey: 'dataPickList.finance.getAdvanceSettlement',
    payload: null,
  },
  store: {
    name: 'Advance Settlement - Create',
    apiKey: 'transaction.create.finance.setAdvanceSettlement',
    payload: {
      entities: {
        documentDateTimeTZ: '2023-10-25',
        log_FileUpload_Pointer_RefID: null,
        requesterWorkerJobsPosition_RefID: 164000000000497,
        remarks: 'k6 load test - remarks',
        additionalData: {
          itemList: {
            items: [
              {
                entities: {
                  advanceDetail_RefID: 195000000000001,
                  workStructure_RefID: 302000000000001,
                  expenseQuantity: 0.12,
                  expenseProductUnitPriceCurrency_RefID: 62000000000001,
                  expenseProductUnitPriceCurrencyValue: 235000,
                  expenseProductUnitPriceCurrencyExchangeRate: 1,
                  expenseProductUnitPriceBaseCurrencyValue: 235000,
                  refundQuantity: 0,
                  refundProductUnitPriceCurrency_RefID: 62000000000001,
                  refundProductUnitPriceCurrencyValue: 0,
                  refundProductUnitPriceCurrencyExchangeRate: 1,
                  refundProductUnitPriceBaseCurrencyValue: 0,
                  remarks: 'k6 load test item',
                },
              },
            ],
          },
        },
      },
    },
  },
  getDetail: {
    name: 'Advance Settlement - Get Detail',
    apiKey: 'transaction.read.dataList.finance.getAdvanceSettlementDetail',
    payload: {
      parameter: {
        advanceSettlement_RefID: 203000000000043,
      },
      SQLStatement: {
        pick: null,
        sort: null,
        filter: null,
        paging: null,
      },
    },
  },
  update: {
    name: 'Advance Settlement - Update',
    apiKey: 'transaction.update.finance.setAdvanceSettlement',
    payload: {
      recordID: 203000000000001,
      entities: {
        documentDateTimeTZ: '2023-10-25',
        log_FileUpload_Pointer_RefID: null,
        requesterWorkerJobsPosition_RefID: 164000000000497,
        remarks: 'k6 load test - updated remarks',
        additionalData: {
          itemList: {
            items: [
              {
                recordID: 204000000000001,
                entities: {
                  workStructure_RefID: 302000000000002,
                  expenseQuantity: 0.12,
                  expenseProductUnitPriceCurrency_RefID: 62000000000001,
                  expenseProductUnitPriceCurrencyValue: 235000,
                  expenseProductUnitPriceCurrencyExchangeRate: 1,
                  expenseProductUnitPriceBaseCurrencyValue: 235000,
                  refundQuantity: 0,
                  refundProductUnitPriceCurrency_RefID: 62000000000001,
                  refundProductUnitPriceCurrencyValue: 0,
                  refundProductUnitPriceCurrencyExchangeRate: 1,
                  refundProductUnitPriceBaseCurrencyValue: 0,
                  remarks: 'k6 load test item updated',
                },
              },
            ],
          },
        },
      },
    },
  },
};

// ============================================================
// PURCHASE REQUEST FORM
// ============================================================
export const PURCHASE_REQUEST = {
  getWarehousePickList: {
    name: 'Purchase Request - Warehouse PickList',
    apiKey: 'dataPickList.supplyChain.getWarehouse',
    payload: null,
  },
  getPurchaseRequisitionPickList: {
    name: 'Purchase Request - PR PickList',
    apiKey: 'dataPickList.supplyChain.getPurchaseRequisition',
    payload: null,
  },
  store: {
    name: 'Purchase Request - Create',
    apiKey: 'transaction.create.supplyChain.setPurchaseRequisition',
    payload: {
      entities: {
        documentDateTimeTZ: '2022-03-07',
        log_FileUpload_Pointer_RefID: null,
        requesterWorkerJobsPosition_RefID: 164000000000497,
        deliveryDateTimeTZ: '2025-05-07',
        deliveryTo_RefID: 126000000000005,
        deliveryTo_NonRefID: 'Jl. Siliwangi No. 30, Surabaya',
        fulfillmentDeadlineDateTimeTZ: '2025-05-30',
        remarks: 'k6 load test - remarks',
        additionalData: {
          itemList: {
            items: [
              {
                entities: {
                  workStructure_RefID: 302000000000001,
                  combinedBudgetSectionDetail_RefID: 169000000000001,
                  product_RefID: 88000000000002,
                  quantity: 10,
                  quantityUnit_RefID: 73000000000001,
                  productUnitPriceCurrency_RefID: 62000000000001,
                  productUnitPriceCurrencyValue: 30000,
                  productUnitPriceCurrencyExchangeRate: 1,
                  asset: 0,
                  remarks: 'k6 load test item',
                },
              },
            ],
          },
        },
      },
    },
  },
  getDetail: {
    name: 'Purchase Request - Get Detail',
    apiKey: 'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail',
    payload: {
      parameter: {
        purchaseRequisition_RefID: 83000000000210,
      },
      SQLStatement: {
        pick: null,
        sort: null,
        filter: null,
        paging: null,
      },
    },
  },
  update: {
    name: 'Purchase Request - Update',
    apiKey: 'transaction.update.supplyChain.setPurchaseRequisition',
    payload: {
      recordID: 83000000000068,
      entities: {
        documentDateTimeTZ: '2022-03-07',
        log_FileUpload_Pointer_RefID: null,
        requesterWorkerJobsPosition_RefID: 164000000000497,
        deliveryDateTimeTZ: '2025-05-13',
        deliveryTo_RefID: 126000000000005,
        deliveryTo_NonRefID: 'Jl. Denpasar No. 47, Bandung',
        fulfillmentDeadlineDateTimeTZ: '2025-06-16',
        remarks: 'k6 load test - updated remarks',
        additionalData: {
          itemList: {
            items: [
              {
                recordID: 84000000000108,
                entities: {
                  workStructure_RefID: 302000000000002,
                  combinedBudgetSectionDetail_RefID: 169000000000001,
                  product_RefID: 88000000000002,
                  quantity: 10,
                  quantityUnit_RefID: 73000000000001,
                  productUnitPriceCurrency_RefID: 62000000000001,
                  productUnitPriceCurrencyValue: 30000,
                  productUnitPriceCurrencyExchangeRate: 1,
                  asset: 0,
                  remarks: 'k6 load test item updated',
                },
              },
            ],
          },
        },
      },
    },
  },
};

// ============================================================
// PURCHASE ORDER FORM
// ============================================================
export const PURCHASE_ORDER = {
  getSupplier: {
    name: 'Purchase Order - Get Supplier',
    apiKey: 'transaction.read.dataList.supplyChain.getSupplier',
    payload: {
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
  getPaymentTerm: {
    name: 'Purchase Order - Get Payment Term',
    apiKey: 'transaction.read.dataList.master.getPaymentTerm',
    payload: {
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
  getVAT: {
    name: 'Purchase Order - Get VAT',
    apiKey: 'transaction.read.dataList.taxation.getVat',
    payload: {
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
  getList: {
    name: 'Purchase Order - Get List',
    apiKey: 'transaction.read.dataList.supplyChain.getPurchaseOrderDetail',
    payload: {
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
  store: {
    name: 'Purchase Order - Create',
    apiKey: 'transaction.create.supplyChain.setPurchaseOrder',
    payload: {
      entities: {
        documentDateTimeTZ: '2022-03-07',
        purchaseRequisition_RefID: 83000000000068,
        remarks: 'k6 load test - remarks',
        additionalData: { itemList: { items: [] } },
      },
    },
  },
  getDetail: {
    name: 'Purchase Order - Get Detail',
    apiKey: 'transaction.read.dataList.supplyChain.getPurchaseOrderDetail',
    payload: {
      parameter: { purchaseOrder_RefID: null },
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
  update: {
    name: 'Purchase Order - Update',
    apiKey: 'transaction.update.supplyChain.setPurchaseOrder',
    payload: {
      recordID: null,
      entities: {
        documentDateTimeTZ: '2022-03-07',
        remarks: 'k6 load test - updated remarks',
        additionalData: { itemList: { items: [] } },
      },
    },
  },
};

// ============================================================
// ACCOUNT PAYABLE FORM
// ============================================================
export const ACCOUNT_PAYABLE = {
  getChartOfAccount: {
    name: 'Account Payable - Chart of Account',
    apiKey: 'dataPickList.accounting.getChartOfAccount',
    payload: null,
  },
  getAssetCategory: {
    name: 'Account Payable - Asset Category',
    apiKey: 'dataPickList.accounting.getAssetCategory',
    payload: null,
  },
  getDepreciationMethod: {
    name: 'Account Payable - Depreciation Method',
    apiKey: 'dataPickList.accounting.getDepreciationMethod',
    payload: null,
  },
  getPickList: {
    name: 'Account Payable - PickList',
    apiKey: 'dataPickList.finance.getPaymentInstruction',
    payload: null,
  },
  store: {
    name: 'Account Payable - Create',
    apiKey: 'transaction.create.finance.setPaymentInstruction',
    payload: {
      entities: {
        documentDateTimeTZ: '2022-03-07',
        remarks: 'k6 load test - remarks',
        additionalData: { itemList: { items: [] } },
      },
    },
  },
  getDetail: {
    name: 'Account Payable - Get Detail',
    apiKey: 'transaction.read.dataList.finance.getPaymentInstructionDetail',
    payload: {
      parameter: { paymentInstruction_RefID: null },
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
  update: {
    name: 'Account Payable - Update',
    apiKey: 'transaction.update.finance.setPaymentInstruction',
    payload: {
      recordID: null,
      entities: {
        documentDateTimeTZ: '2022-03-07',
        remarks: 'k6 load test - updated remarks',
        additionalData: { itemList: { items: [] } },
      },
    },
  },
};

// ============================================================
// DELIVERY ORDER FORM
// ============================================================
export const DELIVERY_ORDER = {
  getTransporter: {
    name: 'Delivery Order - Get Transporter',
    apiKey: 'dataPickList.supplyChain.getTransporter',
    payload: null,
  },
  getStockDetail: {
    name: 'Delivery Order - Get Stock Detail',
    apiKey: 'transaction.read.dataList.supplyChain.getStockDetail',
    payload: {
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
  getPickList: {
    name: 'Delivery Order - PickList',
    apiKey: 'dataPickList.supplyChain.getDeliveryOrder',
    payload: null,
  },
  store: {
    name: 'Delivery Order - Create',
    apiKey: 'transaction.create.supplyChain.setDeliveryOrder',
    payload: {
      entities: {
        documentDateTimeTZ: '2022-03-07',
        remarks: 'k6 load test - remarks',
        additionalData: { itemList: { items: [] } },
      },
    },
  },
  getDetail: {
    name: 'Delivery Order - Get Detail',
    apiKey: 'transaction.read.dataList.supplyChain.getDeliveryOrderDetail',
    payload: {
      parameter: { deliveryOrder_RefID: null },
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
  update: {
    name: 'Delivery Order - Update',
    apiKey: 'transaction.update.supplyChain.setDeliveryOrder',
    payload: {
      recordID: null,
      entities: {
        documentDateTimeTZ: '2022-03-07',
        remarks: 'k6 load test - updated remarks',
        additionalData: { itemList: { items: [] } },
      },
    },
  },
};

// ============================================================
// MATERIAL RECEIVE FORM
// ============================================================
export const MATERIAL_RECEIVE = {
  getPickList: {
    name: 'Material Receive - PickList',
    apiKey: 'dataPickList.supplyChain.getWarehouseInboundOrder',
    payload: null,
  },
  store: {
    name: 'Material Receive - Create',
    apiKey: 'transaction.create.supplyChain.setWarehouseInboundOrder',
    payload: {
      entities: {
        documentDateTimeTZ: '2022-03-07',
        remarks: 'k6 load test - remarks',
        additionalData: { itemList: { items: [] } },
      },
    },
  },
  getDetail: {
    name: 'Material Receive - Get Detail',
    apiKey: 'transaction.read.dataList.supplyChain.getWarehouseInboundOrderDetail',
    payload: {
      parameter: { warehouseInboundOrder_RefID: null },
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
  update: {
    name: 'Material Receive - Update',
    apiKey: 'transaction.update.supplyChain.setWarehouseInboundOrder',
    payload: {
      recordID: null,
      entities: {
        documentDateTimeTZ: '2022-03-07',
        remarks: 'k6 load test - updated remarks',
        additionalData: { itemList: { items: [] } },
      },
    },
  },
};

// ============================================================
// BUSINESS TRIP REQUEST FORM
// ============================================================
export const BUSINESS_TRIP_REQUEST = {
  getPickList: {
    name: 'Business Trip Request - PickList',
    apiKey: 'dataPickList.supplyChain.getWarehouseInboundOrder',
    payload: null,
  },
  store: {
    name: 'Business Trip Request - Create',
    apiKey: 'transaction.create.humanResource.setPersonBusinessTrip',
    payload: {
      entities: {
        documentDateTimeTZ: '2022-03-07',
        remarks: 'k6 load test - remarks',
        additionalData: { itemList: { items: [] } },
      },
    },
  },
  getDetail: {
    name: 'Business Trip Request - Get Detail',
    apiKey: 'transaction.read.dataList.humanResource.getPersonBusinessTripDetail',
    payload: {
      parameter: { personBusinessTrip_RefID: null },
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
  update: {
    name: 'Business Trip Request - Update',
    apiKey: 'transaction.update.humanResource.setPersonBusinessTrip',
    payload: {
      recordID: null,
      entities: {
        documentDateTimeTZ: '2022-03-07',
        remarks: 'k6 load test - updated remarks',
        additionalData: { itemList: { items: [] } },
      },
    },
  },
};

// ============================================================
// BUSINESS TRIP SETTLEMENT FORM
// ============================================================
export const BUSINESS_TRIP_SETTLEMENT = {
  getPickList: {
    name: 'Business Trip Settlement - PickList',
    apiKey: 'dataPickList.humanResource.getPersonBusinessTripSettlement',
    payload: null,
  },
  store: {
    name: 'Business Trip Settlement - Create',
    apiKey: 'transaction.create.humanResource.setPersonBusinessTripSettlement',
    payload: {
      entities: {
        documentDateTimeTZ: '2022-03-07',
        remarks: 'k6 load test - remarks',
        additionalData: { itemList: { items: [] } },
      },
    },
  },
  getDetail: {
    name: 'Business Trip Settlement - Get Detail',
    apiKey: 'transaction.read.dataList.humanResource.getPersonBusinessTripSettlementDetail',
    payload: {
      parameter: { personBusinessTripSettlement_RefID: null },
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
  update: {
    name: 'Business Trip Settlement - Update',
    apiKey: 'transaction.update.humanResource.setPersonBusinessTripSettlement',
    payload: {
      recordID: null,
      entities: {
        documentDateTimeTZ: '2022-03-07',
        remarks: 'k6 load test - updated remarks',
        additionalData: { itemList: { items: [] } },
      },
    },
  },
};
```

---

## `test.js`

```javascript
// ============================================================
// k6 Load Test Script - Laravel App API
// Generated from API_Documentation.xlsx
//
// Usage:
//   k6 run test.js
//   k6 run --env BASE_URL=https://your-app.com --env API_USERNAME=user --env API_PASSWORD=pass test.js
//   k6 run --vus 10 --duration 30s test.js
// ============================================================

import http from 'k6/http';
import { check, group, sleep } from 'k6';
import { Trend, Rate, Counter } from 'k6/metrics';
import {
  BASE_URL,
  API_ENDPOINT,
  AUTH,
  MENU,
  ADVANCE_REQUEST,
  ADVANCE_SETTLEMENT,
  PURCHASE_REQUEST,
  PURCHASE_ORDER,
  ACCOUNT_PAYABLE,
  DELIVERY_ORDER,
  MATERIAL_RECEIVE,
  BUSINESS_TRIP_REQUEST,
  BUSINESS_TRIP_SETTLEMENT,
} from './api_mapping.js';

// ============================================================
// OPTIONS - Load test configuration
// ============================================================
export const options = {
  stages: [
    { duration: '30s', target: 5 },   // Ramp up to 5 VUs
    { duration: '1m',  target: 10 },  // Hold at 10 VUs
    { duration: '30s', target: 0 },   // Ramp down
  ],
  thresholds: {
    http_req_duration: ['p(95)<5000'],  // 95% of requests under 5s
    http_req_failed:   ['rate<0.05'],   // Error rate under 5%
  },
};

// ============================================================
// CUSTOM METRICS
// ============================================================
const loginDuration          = new Trend('login_duration');
const advanceRequestDuration = new Trend('advance_request_duration');
const purchaseRequestDuration = new Trend('purchase_request_duration');
const apiErrorRate           = new Rate('api_error_rate');
const successfulTransactions  = new Counter('successful_transactions');

// ============================================================
// HELPERS
// ============================================================

/**
 * Build the standard API request body.
 * All endpoints share the same envelope: { APIKey, ...payload }
 */
function buildBody(apiKey, payload) {
  return JSON.stringify({
    APIKey: apiKey,
    ...(payload || {}),
  });
}

/**
 * Build standard headers. Pass token after login.
 */
function buildHeaders(token = null) {
  const headers = {
    'Content-Type': 'application/json',
    Accept: 'application/json',
  };
  if (token) {
    headers['Authorization'] = `Bearer ${token}`;
  }
  return headers;
}

/**
 * POST wrapper with automatic check and metric recording.
 */
function apiPost(name, apiKey, payload, headers, trendMetric = null) {
  const body = buildBody(apiKey, payload);
  const res = http.post(API_ENDPOINT, body, { headers });

  const success = check(res, {
    [`[${name}] status is 200`]: (r) => r.status === 200,
    [`[${name}] successStatus is true`]: (r) => {
      try {
        return JSON.parse(r.body).metadata?.successStatus === true;
      } catch {
        return false;
      }
    },
  });

  apiErrorRate.add(!success);
  if (trendMetric) trendMetric.add(res.timings.duration);

  return res;
}

/**
 * Parse token from login response.
 */
function extractToken(loginRes) {
  try {
    return JSON.parse(loginRes.body).data?.APIWebToken || null;
  } catch {
    return null;
  }
}

// ============================================================
// SETUP - runs once before load test
// ============================================================
export function setup() {
  const res = apiPost(
    AUTH.login.name,
    AUTH.login.apiKey,
    AUTH.login.payload,
    buildHeaders()
  );
  loginDuration.add(res.timings.duration);

  const token = extractToken(res);
  if (!token) {
    console.error('Login failed — token not received. Check credentials and BASE_URL.');
  }
  return { token };
}

// ============================================================
// DEFAULT FUNCTION - runs per VU iteration
// ============================================================
export default function ({ token }) {
  const headers = buildHeaders(token);

  // ── Menu ──────────────────────────────────────────────────
  group('Menu', () => {
    apiPost(MENU.getMenuLayout.name, MENU.getMenuLayout.apiKey, MENU.getMenuLayout.payload, headers);
    sleep(0.5);
  });

  // ── Advance Request Form ──────────────────────────────────
  group('Advance Request Form', () => {
    apiPost(ADVANCE_REQUEST.getBudgetPickList.name,  ADVANCE_REQUEST.getBudgetPickList.apiKey,  null, headers);
    apiPost(ADVANCE_REQUEST.getNewSite.name,         ADVANCE_REQUEST.getNewSite.apiKey,         ADVANCE_REQUEST.getNewSite.payload, headers);
    apiPost(ADVANCE_REQUEST.getRequester.name,       ADVANCE_REQUEST.getRequester.apiKey,       ADVANCE_REQUEST.getRequester.payload, headers);
    apiPost(ADVANCE_REQUEST.getBeneficiary.name,     ADVANCE_REQUEST.getBeneficiary.apiKey,     ADVANCE_REQUEST.getBeneficiary.payload, headers);
    apiPost(ADVANCE_REQUEST.getBank.name,            ADVANCE_REQUEST.getBank.apiKey,            ADVANCE_REQUEST.getBank.payload, headers);
    apiPost(ADVANCE_REQUEST.getBankAccount.name,     ADVANCE_REQUEST.getBankAccount.apiKey,     ADVANCE_REQUEST.getBankAccount.payload, headers);
    apiPost(ADVANCE_REQUEST.getBudgetDetail.name,    ADVANCE_REQUEST.getBudgetDetail.apiKey,    ADVANCE_REQUEST.getBudgetDetail.payload, headers);
    apiPost(ADVANCE_REQUEST.getWorkflow.name,        ADVANCE_REQUEST.getWorkflow.apiKey,        ADVANCE_REQUEST.getWorkflow.payload, headers);
    apiPost(ADVANCE_REQUEST.getAdvancePickList.name, ADVANCE_REQUEST.getAdvancePickList.apiKey, null, headers, advanceRequestDuration);

    const detailRes = apiPost(ADVANCE_REQUEST.getDetail.name, ADVANCE_REQUEST.getDetail.apiKey, ADVANCE_REQUEST.getDetail.payload, headers);
    check(detailRes, { '[Advance Request] data array not empty': (r) => {
      try { return JSON.parse(r.body).data?.data?.length > 0; } catch { return false; }
    }});

    sleep(1);
  });

  // ── Advance Settlement Form ───────────────────────────────
  group('Advance Settlement Form', () => {
    apiPost(ADVANCE_SETTLEMENT.getPickList.name, ADVANCE_SETTLEMENT.getPickList.apiKey, null, headers);
    apiPost(ADVANCE_SETTLEMENT.getDetail.name,   ADVANCE_SETTLEMENT.getDetail.apiKey,  ADVANCE_SETTLEMENT.getDetail.payload, headers);
    sleep(1);
  });

  // ── Purchase Request Form ─────────────────────────────────
  group('Purchase Request Form', () => {
    apiPost(PURCHASE_REQUEST.getWarehousePickList.name,          PURCHASE_REQUEST.getWarehousePickList.apiKey,          null, headers);
    apiPost(PURCHASE_REQUEST.getPurchaseRequisitionPickList.name, PURCHASE_REQUEST.getPurchaseRequisitionPickList.apiKey, null, headers);
    apiPost(PURCHASE_REQUEST.getDetail.name, PURCHASE_REQUEST.getDetail.apiKey, PURCHASE_REQUEST.getDetail.payload, headers, purchaseRequestDuration);
    sleep(1);
  });

  // ── Purchase Order Form ───────────────────────────────────
  group('Purchase Order Form', () => {
    apiPost(PURCHASE_ORDER.getSupplier.name,    PURCHASE_ORDER.getSupplier.apiKey,    PURCHASE_ORDER.getSupplier.payload, headers);
    apiPost(PURCHASE_ORDER.getPaymentTerm.name, PURCHASE_ORDER.getPaymentTerm.apiKey, PURCHASE_ORDER.getPaymentTerm.payload, headers);
    apiPost(PURCHASE_ORDER.getVAT.name,         PURCHASE_ORDER.getVAT.apiKey,         PURCHASE_ORDER.getVAT.payload, headers);
    apiPost(PURCHASE_ORDER.getList.name,        PURCHASE_ORDER.getList.apiKey,        PURCHASE_ORDER.getList.payload, headers);
    sleep(1);
  });

  // ── Account Payable Form ──────────────────────────────────
  group('Account Payable Form', () => {
    apiPost(ACCOUNT_PAYABLE.getChartOfAccount.name,     ACCOUNT_PAYABLE.getChartOfAccount.apiKey,     null, headers);
    apiPost(ACCOUNT_PAYABLE.getAssetCategory.name,      ACCOUNT_PAYABLE.getAssetCategory.apiKey,      null, headers);
    apiPost(ACCOUNT_PAYABLE.getDepreciationMethod.name, ACCOUNT_PAYABLE.getDepreciationMethod.apiKey, null, headers);
    apiPost(ACCOUNT_PAYABLE.getPickList.name,           ACCOUNT_PAYABLE.getPickList.apiKey,           null, headers);
    sleep(1);
  });

  // ── Delivery Order Form ───────────────────────────────────
  group('Delivery Order Form', () => {
    apiPost(DELIVERY_ORDER.getTransporter.name, DELIVERY_ORDER.getTransporter.apiKey, null, headers);
    apiPost(DELIVERY_ORDER.getStockDetail.name, DELIVERY_ORDER.getStockDetail.apiKey, DELIVERY_ORDER.getStockDetail.payload, headers);
    apiPost(DELIVERY_ORDER.getPickList.name,    DELIVERY_ORDER.getPickList.apiKey,    null, headers);
    sleep(1);
  });

  // ── Material Receive Form ─────────────────────────────────
  group('Material Receive Form', () => {
    apiPost(MATERIAL_RECEIVE.getPickList.name, MATERIAL_RECEIVE.getPickList.apiKey, null, headers);
    sleep(0.5);
  });

  // ── Business Trip Request Form ────────────────────────────
  group('Business Trip Request Form', () => {
    apiPost(BUSINESS_TRIP_REQUEST.getPickList.name, BUSINESS_TRIP_REQUEST.getPickList.apiKey, null, headers);
    sleep(0.5);
  });

  // ── Business Trip Settlement Form ─────────────────────────
  group('Business Trip Settlement Form', () => {
    apiPost(BUSINESS_TRIP_SETTLEMENT.getPickList.name, BUSINESS_TRIP_SETTLEMENT.getPickList.apiKey, null, headers);
    sleep(0.5);
  });

  successfulTransactions.add(1);
  sleep(1);
}

// ============================================================
// WRITE SCENARIOS — Separate scenario for mutation endpoints
// Run with: k6 run --env SCENARIO=write test.js
// ============================================================
export function writeScenario({ token }) {
  const headers = buildHeaders(token);

  group('Create Advance Request', () => {
    const res = apiPost(
      ADVANCE_REQUEST.store.name,
      ADVANCE_REQUEST.store.apiKey,
      ADVANCE_REQUEST.store.payload,
      headers
    );
    const created = check(res, {
      '[Advance Request Store] recordID present': (r) => {
        try { return !!JSON.parse(r.body).data?.recordID; } catch { return false; }
      },
    });
    if (created) successfulTransactions.add(1);
    sleep(2);
  });

  group('Create Advance Settlement', () => {
    const res = apiPost(
      ADVANCE_SETTLEMENT.store.name,
      ADVANCE_SETTLEMENT.store.apiKey,
      ADVANCE_SETTLEMENT.store.payload,
      headers
    );
    check(res, {
      '[Advance Settlement Store] recordID present': (r) => {
        try { return !!JSON.parse(r.body).data?.recordID; } catch { return false; }
      },
    });
    sleep(2);
  });

  group('Create Purchase Request', () => {
    const res = apiPost(
      PURCHASE_REQUEST.store.name,
      PURCHASE_REQUEST.store.apiKey,
      PURCHASE_REQUEST.store.payload,
      headers
    );
    check(res, {
      '[Purchase Request Store] recordID present': (r) => {
        try { return !!JSON.parse(r.body).data?.recordID; } catch { return false; }
      },
    });
    sleep(2);
  });

  group('Create Business Trip Request', () => {
    apiPost(
      BUSINESS_TRIP_REQUEST.store.name,
      BUSINESS_TRIP_REQUEST.store.apiKey,
      BUSINESS_TRIP_REQUEST.store.payload,
      headers
    );
    sleep(2);
  });
}
```

---

## Customisation Notes for Claude Code

- **`API_ENDPOINT`** — change `/api` suffix in `api_mapping.js` to match your Laravel route prefix
- **`buildBody()`** — if the envelope wraps `APIKey` differently (e.g. nested under `parameter`), update this single function in `test.js`
- **`extractToken()`** — token is read from `data.APIWebToken`; adjust the path if the login response structure differs
- **`options.stages`** — tune VUs and durations to match target load
- **`options.thresholds`** — tighten `p(95)<5000` once baseline is known
- **Payloads with `null` IDs** — fields like `purchaseOrder_RefID: null` and `recordID: null` need real values for write scenarios; consider parameterising with a CSV data file via `papaparse` or k6's `SharedArray`
