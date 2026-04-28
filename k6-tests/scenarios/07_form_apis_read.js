/**
 * SCENARIO 07 — Form Group Read APIs
 * ────────────────────────────────────
 * What it measures:
 *   - Latency across all 10 form group read endpoints defined in api_mapping.js
 *   - Covers: Menu, Advance Request, Advance Settlement, Purchase Request,
 *     Purchase Order, Account Payable, Delivery Order, Material Receive,
 *     Business Trip Request, Business Trip Settlement
 *   - Read-only: no DB mutations. Safe to run against production.
 *   - Per-group Trend metrics make it easy to compare which module is slowest.
 *
 * Run:
 *   k6 run scenarios/07_form_apis_read.js
 *   k6 run --out json=reports/07_form_apis.json scenarios/07_form_apis_read.js
 */

import http       from 'k6/http';
import { group, sleep } from 'k6';
import { Trend, Rate }  from 'k6/metrics';
import { ENV }    from '../config/env.js';
import { login, gatewayBody } from '../helpers/auth.js';
import { buildHeaders }       from '../helpers/headers.js';
import { checkSuccess, recordDBLatency } from '../helpers/checks.js';
import {
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
} from '../api_mapping.js';

// ─── Per-group latency metrics ────────────────────────────────────────────────
const menuDuration           = new Trend('form_menu_duration',              true);
const advanceReqDuration     = new Trend('form_advance_request_duration',   true);
const advanceSettleDuration  = new Trend('form_advance_settle_duration',    true);
const purchaseReqDuration    = new Trend('form_purchase_request_duration',  true);
const purchaseOrderDuration  = new Trend('form_purchase_order_duration',    true);
const accountPayDuration     = new Trend('form_account_payable_duration',   true);
const deliveryOrderDuration  = new Trend('form_delivery_order_duration',    true);
const materialRecvDuration   = new Trend('form_material_receive_duration',  true);
const bizTripReqDuration     = new Trend('form_biz_trip_request_duration',  true);
const bizTripSettleDuration  = new Trend('form_biz_trip_settle_duration',   true);
const formErrorRate          = new Rate('form_error_rate');

// ─── Test options ─────────────────────────────────────────────────────────────
export const options = {
  scenarios: {
    form_apis_read: {
      executor: 'ramping-vus',
      startVUs: 1,
      stages: [
        { duration: '30s', target: 3  },  // gentle ramp — many endpoints per iteration
        { duration: '2m',  target: 5  },  // steady measurement
        { duration: '30s', target: 10 },  // mild stress
        { duration: '30s', target: 0  },
      ],
    },
  },
  thresholds: {
    'form_menu_duration':             [`p(95)<${ENV.THRESHOLD_P95_MS * 2}`],
    'form_advance_request_duration':  [`p(95)<${ENV.THRESHOLD_P95_MS * 2}`],
    'form_purchase_request_duration': [`p(95)<${ENV.THRESHOLD_P95_MS * 2}`],
    'form_purchase_order_duration':   [`p(95)<${ENV.THRESHOLD_P95_MS * 2}`],
    'form_error_rate':                [`rate<${ENV.THRESHOLD_ERROR_RATE}`],
    'http_req_duration':              [`p(95)<${ENV.THRESHOLD_P95_MS * 2}`],
  },
};

// ─── Setup ────────────────────────────────────────────────────────────────────
export function setup() {
  return { token: login() };
}

// ─── Helper: gateway POST with group metric ───────────────────────────────────
function gw(ep, token, groupTrend) {
  const body = gatewayBody(ep.apiKey, ep.data);
  const res  = http.post(
    `${ENV.BASE_URL}/api/gateway`,
    body,
    {
      headers: buildHeaders(body, token),
      tags:    { endpoint: ep.apiKey },
    },
  );

  const ok = checkSuccess(res, ep.name);
  formErrorRate.add(!ok);
  groupTrend.add(res.timings.duration);
  recordDBLatency(res);
  return res;
}

// ─── Test function ────────────────────────────────────────────────────────────
export default function ({ token }) {

  // ── Menu ───────────────────────────────────────────────────────────────────
  group('Menu', () => {
    gw(MENU.getMenuLayout, token, menuDuration);
    sleep(0.3);
  });

  // ── Advance Request Form ───────────────────────────────────────────────────
  group('Advance Request Form', () => {
    gw(ADVANCE_REQUEST.getBudgetPickList,  token, advanceReqDuration);
    gw(ADVANCE_REQUEST.getNewSite,         token, advanceReqDuration);
    gw(ADVANCE_REQUEST.getRequester,       token, advanceReqDuration);
    gw(ADVANCE_REQUEST.getBeneficiary,     token, advanceReqDuration);
    gw(ADVANCE_REQUEST.getBank,            token, advanceReqDuration);
    gw(ADVANCE_REQUEST.getBankAccount,     token, advanceReqDuration);
    gw(ADVANCE_REQUEST.getBudgetDetail,    token, advanceReqDuration);
    gw(ADVANCE_REQUEST.getWorkflow,        token, advanceReqDuration);
    gw(ADVANCE_REQUEST.getAdvancePickList, token, advanceReqDuration);
    gw(ADVANCE_REQUEST.getDetail,          token, advanceReqDuration);
    sleep(0.5);
  });

  // ── Advance Settlement Form ────────────────────────────────────────────────
  group('Advance Settlement Form', () => {
    gw(ADVANCE_SETTLEMENT.getPickList, token, advanceSettleDuration);
    gw(ADVANCE_SETTLEMENT.getDetail,   token, advanceSettleDuration);
    sleep(0.3);
  });

  // ── Purchase Request Form ──────────────────────────────────────────────────
  group('Purchase Request Form', () => {
    gw(PURCHASE_REQUEST.getWarehousePickList,          token, purchaseReqDuration);
    gw(PURCHASE_REQUEST.getPurchaseRequisitionPickList, token, purchaseReqDuration);
    gw(PURCHASE_REQUEST.getDetail,                     token, purchaseReqDuration);
    sleep(0.3);
  });

  // ── Purchase Order Form ────────────────────────────────────────────────────
  group('Purchase Order Form', () => {
    gw(PURCHASE_ORDER.getSupplier,    token, purchaseOrderDuration);
    gw(PURCHASE_ORDER.getPaymentTerm, token, purchaseOrderDuration);
    gw(PURCHASE_ORDER.getVAT,         token, purchaseOrderDuration);
    gw(PURCHASE_ORDER.getList,        token, purchaseOrderDuration);
    sleep(0.3);
  });

  // ── Account Payable Form ───────────────────────────────────────────────────
  group('Account Payable Form', () => {
    gw(ACCOUNT_PAYABLE.getChartOfAccount,     token, accountPayDuration);
    gw(ACCOUNT_PAYABLE.getAssetCategory,      token, accountPayDuration);
    gw(ACCOUNT_PAYABLE.getDepreciationMethod, token, accountPayDuration);
    gw(ACCOUNT_PAYABLE.getPickList,           token, accountPayDuration);
    sleep(0.3);
  });

  // ── Delivery Order Form ────────────────────────────────────────────────────
  group('Delivery Order Form', () => {
    gw(DELIVERY_ORDER.getTransporter, token, deliveryOrderDuration);
    gw(DELIVERY_ORDER.getStockDetail, token, deliveryOrderDuration);
    gw(DELIVERY_ORDER.getPickList,    token, deliveryOrderDuration);
    sleep(0.3);
  });

  // ── Material Receive Form ──────────────────────────────────────────────────
  group('Material Receive Form', () => {
    gw(MATERIAL_RECEIVE.getPickList, token, materialRecvDuration);
    sleep(0.2);
  });

  // ── Business Trip Request Form ─────────────────────────────────────────────
  group('Business Trip Request Form', () => {
    gw(BUSINESS_TRIP_REQUEST.getDetail, token, bizTripReqDuration);
    sleep(0.2);
  });

  // ── Business Trip Settlement Form ──────────────────────────────────────────
  group('Business Trip Settlement Form', () => {
    gw(BUSINESS_TRIP_SETTLEMENT.getPickList, token, bizTripSettleDuration);
    gw(BUSINESS_TRIP_SETTLEMENT.getDetail,   token, bizTripSettleDuration);
    sleep(0.2);
  });

  sleep(1);
}

// ─── Summary ──────────────────────────────────────────────────────────────────
export function handleSummary(data) {
  const groups = [
    ['form_menu_duration',              'Menu'],
    ['form_advance_request_duration',   'Advance Request'],
    ['form_advance_settle_duration',    'Advance Settlement'],
    ['form_purchase_request_duration',  'Purchase Request'],
    ['form_purchase_order_duration',    'Purchase Order'],
    ['form_account_payable_duration',   'Account Payable'],
    ['form_delivery_order_duration',    'Delivery Order'],
    ['form_material_receive_duration',  'Material Receive'],
    ['form_biz_trip_request_duration',  'Business Trip Request'],
    ['form_biz_trip_settle_duration',   'Business Trip Settlement'],
  ];

  console.log('\n─── Form APIs Read Latency Summary ───');
  groups.forEach(([metric, label]) => {
    const v = data.metrics[metric]?.values;
    if (!v) return;
    console.log(`\n  [${label}]`);
    console.log(`    avg : ${v.avg?.toFixed(1)} ms`);
    console.log(`    p95 : ${v['p(95)']?.toFixed(1)} ms`);
    console.log(`    p99 : ${v['p(99)']?.toFixed(1)} ms`);
    console.log(`    max : ${v.max?.toFixed(1)} ms`);
  });

  const e = data.metrics['form_error_rate']?.values;
  if (e) console.log(`\n  Error rate: ${(e.rate * 100).toFixed(2)}%`);

  return {
    'reports/07_form_apis_summary.json': JSON.stringify(data, null, 2),
  };
}
