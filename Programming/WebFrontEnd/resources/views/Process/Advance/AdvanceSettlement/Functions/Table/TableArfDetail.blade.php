<div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
    <table class="table table-head-fixed text-nowrap table-sm" id="tableAdvanceDetail">
      <thead style="position: sticky;top: 0px;z-index: 10;background: white;">
        <tr>
          <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">Transaction Number</th>
          <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">Sub Budget</th>
          <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">Product Code</th>
          <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">Product Name</th>
          <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">UOM</th>
          <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">Currency</th>
          <th colspan="4" rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">Request</th>
          <th colspan="6" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color: #4B586A;color:white;">Settlement</th>
          <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle; padding-right: 0px;background-color: #4B586A;color:white;">Balance</th>
        </tr>
        <tr>
          <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color: #4B586A;color:white;">
            Expense Claim
          </th>
          <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color: #4B586A;color:white;">
            Amount To The Company
          </th>
        </tr>
        <tr>
          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">Qty</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">Price</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">Total</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">Balance</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color: #4B586A;color:white;">Qty</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color: #4B586A;color:white;">Price</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color: #4B586A;color:white;">Total</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color: #4B586A;color:white;">Qty</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color: #4B586A;color:white;">Price</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color: #4B586A;color:white;">Total</th>
        </tr>
      </thead>
      <tbody></tbody>
      <tfoot>
        <tr class="loadingAdvanceSettlementTable">
          <td colspan="16" class="p-0" style="height: 12.3rem;">
            <div class="d-flex flex-column justify-content-center align-items-center py-3">
              <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                Loading...
              </div>
            </div>
          </td>
        </tr>
        <tr class="errorAdvanceSettlementTable">
          <td colspan="16" class="p-0" style="height: 12.3rem;;">
            <div class="d-flex flex-column justify-content-center align-items-center py-3">
              <div id="errorAdvanceSettlementMessageTable" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;">Error</div>
            </div>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>