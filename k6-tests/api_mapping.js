/**
 * ERPReborn API Map
 * Central endpoint definitions for all gateway API calls.
 * Source: Documentation/Claude/k6_test_guide.md
 *
 * Each entry: { name, apiKey, data }
 *   name    → human label used in check output and tags
 *   apiKey  → routed as metadata.API.key by gatewayBody()
 *   data    → placed under the "data" key by gatewayBody()
 *
 * Usage:
 *   import { gatewayBody } from './helpers/auth.js';
 *   const body = gatewayBody(ep.apiKey, ep.data);
 */

// ─── Authentication (login endpoint) ──────────────────────────────────────────
// Note: login goes to POST /api/auth (not /api/gateway) and uses the bespoke
// body built by helpers/auth.js → authBody(). This entry exists for reference
// and to assert the API key name in one central place.
export const AUTH = {
  setLogin: {
    name:   'Auth - Set Login',
    apiKey: 'authentication.general.setLogin',
  },
};

// ─── Authentication Privilege ─────────────────────────────────────────────────
export const PRIVILEGE = {
  getMenu: {
    name: 'Privilege - Get Menu',
    apiKey: 'authentication.userPrivilege.getMenu',
    data: {},
  },
  getRole: {
    name: 'Privilege - Get Role',
    apiKey: 'authentication.userPrivilege.getRole',
    data: {},
  },
  getBranch: {
    name: 'Privilege - Get Institution Branch',
    apiKey: 'authentication.userPrivilege.getInstitutionBranch',
    data: {},
  },
};

// ─── Menu ─────────────────────────────────────────────────────────────────────
export const MENU = {
  getMenuLayout: {
    name: 'Menu - Get Menu Layout',
    apiKey: 'transaction.read.dataList.sysConfig.getAppObject_MenuLayout',
    data: { parameter: { recordID: 4000000000359 } },
  },
};

// ─── Advance Request Form ─────────────────────────────────────────────────────
export const ADVANCE_REQUEST = {
  getBudgetPickList: {
    name: 'Advance Request - Budget PickList',
    apiKey: 'dataPickList.project.getProject',
    data: {},
  },
  getNewSite: {
    name: 'Advance Request - Get New Site',
    apiKey: 'dataPickList.project.getProjectSectionItem',
    data: { parameter: { project_RefID: 46000000000033 } },
  },
  getRequester: {
    name: 'Advance Request - Get Requester',
    apiKey: 'transaction.read.dataList.humanResource.getWorkerJobsPositionCurrent',
    data: {
      parameter: { worker_RefID: null },
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
  getBeneficiary: {
    name: 'Advance Request - Get Beneficiary',
    apiKey: 'transaction.read.dataList.humanResource.getWorkerJobsPositionCurrent',
    data: {
      parameter: { worker_RefID: null },
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
  getBank: {
    name: 'Advance Request - Get Bank',
    apiKey: 'transaction.read.dataList.master.getEntityBankAccount',
    data: {
      parameter: { entity_RefID: 164000000000439 },
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
  getBankAccount: {
    name: 'Advance Request - Get Bank Account',
    apiKey: 'transaction.read.dataList.master.getBankAccount',
    data: {
      parameter: { bank_RefID: null },
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
  getBudgetDetail: {
    name: 'Advance Request - Get Budget Detail',
    apiKey: 'transaction.read.dataList.budgeting.getCombinedBudgetSectionDetail',
    data: {
      parameter: { combinedBudgetSection_RefID: 143000000000302 },
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
  getWorkflow: {
    name: 'Advance Request - Get Workflow',
    apiKey: 'userAction.documentWorkFlow.general.getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID',
    data: {
      parameter: {
        businessDocumentType_RefID: 77000000000057,
        submitterEntity_RefID:      164000000000196,
        combinedBudget_RefID:       46000000000033,
      },
    },
  },
  getAdvancePickList: {
    name: 'Advance Request - Advance PickList',
    apiKey: 'dataPickList.finance.getAdvance',
    data: {},
  },
  getDetail: {
    name: 'Advance Request - Get Detail',
    apiKey: 'transaction.read.dataList.finance.getAdvanceDetail',
    data: {
      parameter: { advance_RefID: 76000000000050 },
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
};

// ─── Advance Settlement Form ──────────────────────────────────────────────────
export const ADVANCE_SETTLEMENT = {
  getPickList: {
    name: 'Advance Settlement - PickList',
    apiKey: 'dataPickList.finance.getAdvanceSettlement',
    data: {},
  },
  getDetail: {
    name: 'Advance Settlement - Get Detail',
    apiKey: 'transaction.read.dataList.finance.getAdvanceSettlementDetail',
    data: {
      parameter: { advanceSettlement_RefID: 203000000000043 },
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
};

// ─── Purchase Request Form ────────────────────────────────────────────────────
export const PURCHASE_REQUEST = {
  getWarehousePickList: {
    name: 'Purchase Request - Warehouse PickList',
    apiKey: 'dataPickList.supplyChain.getWarehouse',
    data: {},
  },
  getPurchaseRequisitionPickList: {
    name: 'Purchase Request - PR PickList',
    apiKey: 'dataPickList.supplyChain.getPurchaseRequisition',
    data: {},
  },
  getDetail: {
    name: 'Purchase Request - Get Detail',
    apiKey: 'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail',
    data: {
      parameter: { purchaseRequisition_RefID: 83000000000210 },
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
};

// ─── Purchase Order Form ──────────────────────────────────────────────────────
export const PURCHASE_ORDER = {
  getSupplier: {
    name: 'Purchase Order - Get Supplier',
    apiKey: 'transaction.read.dataList.supplyChain.getSupplier',
    data: { SQLStatement: { pick: null, sort: null, filter: null, paging: null } },
  },
  getPaymentTerm: {
    name: 'Purchase Order - Get Payment Term',
    apiKey: 'transaction.read.dataList.master.getPaymentTerm',
    data: { SQLStatement: { pick: null, sort: null, filter: null, paging: null } },
  },
  getVAT: {
    name: 'Purchase Order - Get VAT',
    apiKey: 'transaction.read.dataList.taxation.getVat',
    data: { SQLStatement: { pick: null, sort: null, filter: null, paging: null } },
  },
  getList: {
    name: 'Purchase Order - Get List',
    apiKey: 'transaction.read.dataList.supplyChain.getPurchaseOrderDetail',
    data: { SQLStatement: { pick: null, sort: null, filter: null, paging: null } },
  },
};

// ─── Account Payable Form ─────────────────────────────────────────────────────
export const ACCOUNT_PAYABLE = {
  getChartOfAccount: {
    name: 'Account Payable - Chart of Account',
    apiKey: 'dataPickList.accounting.getChartOfAccount',
    data: {},
  },
  getAssetCategory: {
    name: 'Account Payable - Asset Category',
    apiKey: 'dataPickList.accounting.getAssetCategory',
    data: {},
  },
  getDepreciationMethod: {
    name: 'Account Payable - Depreciation Method',
    apiKey: 'dataPickList.accounting.getDepreciationMethod',
    data: {},
  },
  getPickList: {
    name: 'Account Payable - PickList',
    apiKey: 'dataPickList.finance.getPaymentInstruction',
    data: {},
  },
};

// ─── Delivery Order Form ──────────────────────────────────────────────────────
export const DELIVERY_ORDER = {
  getTransporter: {
    name: 'Delivery Order - Get Transporter',
    apiKey: 'dataPickList.supplyChain.getTransporter',
    data: {},
  },
  getStockDetail: {
    name: 'Delivery Order - Get Stock Detail',
    apiKey: 'transaction.read.dataList.supplyChain.getStockDetail',
    data: { SQLStatement: { pick: null, sort: null, filter: null, paging: null } },
  },
  getPickList: {
    name: 'Delivery Order - PickList',
    apiKey: 'dataPickList.supplyChain.getDeliveryOrder',
    data: {},
  },
};

// ─── Material Receive Form ────────────────────────────────────────────────────
export const MATERIAL_RECEIVE = {
  getPickList: {
    name: 'Material Receive - PickList',
    apiKey: 'dataPickList.supplyChain.getWarehouseInboundOrder',
    data: {},
  },
};

// ─── Business Trip Request Form ───────────────────────────────────────────────
export const BUSINESS_TRIP_REQUEST = {
  getDetail: {
    name: 'Business Trip Request - Get Detail',
    apiKey: 'transaction.read.dataList.humanResource.getPersonBusinessTripDetail',
    data: {
      parameter: { personBusinessTrip_RefID: null },
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
};

// ─── Business Trip Settlement Form ───────────────────────────────────────────
export const BUSINESS_TRIP_SETTLEMENT = {
  getPickList: {
    name: 'Business Trip Settlement - PickList',
    apiKey: 'dataPickList.humanResource.getPersonBusinessTripSettlement',
    data: {},
  },
  getDetail: {
    name: 'Business Trip Settlement - Get Detail',
    apiKey: 'transaction.read.dataList.humanResource.getPersonBusinessTripSettlementDetail',
    data: {
      parameter: { personBusinessTripSettlement_RefID: null },
      SQLStatement: { pick: null, sort: null, filter: null, paging: null },
    },
  },
};

// ─── Flat read-only endpoint pool for load/soak rotation ─────────────────────
// Only includes endpoints with concrete reference IDs or no required parameters.
// Endpoints with null required IDs (worker_RefID, bank_RefID, etc.) are omitted
// here to avoid expected failures polluting sustained-load error rates.
export const ALL_READ_ENDPOINTS = [
  PRIVILEGE.getMenu,
  PRIVILEGE.getRole,
  PRIVILEGE.getBranch,
  MENU.getMenuLayout,
  ADVANCE_REQUEST.getBudgetPickList,
  ADVANCE_REQUEST.getNewSite,
  ADVANCE_REQUEST.getBank,
  ADVANCE_REQUEST.getBudgetDetail,
  ADVANCE_REQUEST.getWorkflow,
  ADVANCE_REQUEST.getAdvancePickList,
  ADVANCE_REQUEST.getDetail,
  ADVANCE_SETTLEMENT.getPickList,
  ADVANCE_SETTLEMENT.getDetail,
  PURCHASE_REQUEST.getWarehousePickList,
  PURCHASE_REQUEST.getPurchaseRequisitionPickList,
  PURCHASE_REQUEST.getDetail,
  PURCHASE_ORDER.getSupplier,
  PURCHASE_ORDER.getPaymentTerm,
  PURCHASE_ORDER.getVAT,
  PURCHASE_ORDER.getList,
  ACCOUNT_PAYABLE.getChartOfAccount,
  ACCOUNT_PAYABLE.getAssetCategory,
  ACCOUNT_PAYABLE.getDepreciationMethod,
  ACCOUNT_PAYABLE.getPickList,
  DELIVERY_ORDER.getTransporter,
  DELIVERY_ORDER.getStockDetail,
  DELIVERY_ORDER.getPickList,
  MATERIAL_RECEIVE.getPickList,
  BUSINESS_TRIP_SETTLEMENT.getPickList,
];
