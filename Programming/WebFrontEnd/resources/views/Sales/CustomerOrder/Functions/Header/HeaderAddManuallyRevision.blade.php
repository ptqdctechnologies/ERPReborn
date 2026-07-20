<div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
  <table class="table table-head-fixed text-nowrap table-sm" id="table_add_manually">
    <thead>
      <tr>
        <th
          style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;width: 70px;">
          Action
        </th>
        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
          Sub Budget
        </th>
        <th class="productField"
          style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; display: none;">
          Work ID
        </th>
        <th class="productField"
          style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; display: none;">
          Product
        </th>
        <th class="productField"
          style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; display: none;">
          UOM
        </th>
        <th class="productField"
          style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; display: none;">
          Qty
        </th>
        <th class="productField"
          style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; display: none;">
          Price
        </th>
        <th class="productField"
          style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; display: none;">
          Total
        </th>
        <th class="subBudgetField"
          style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;width: 180px;">
          Total
        </th>
        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
          Notes
        </th>
      </tr>
    </thead>
    <tbody id="table_tbody_add_manually"></tbody>
    <tfoot>
      <tr class="loading_import" style="display: none;">
        <td colspan="4" class="p-0" style="border: 0px; height: 150px;">
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

      <tr class="error_message_import_container" style="display: none;">
        <td colspan="4" class="p-0" style="border: 0px;">
          <div class="d-flex flex-column justify-content-center align-items-center py-3">
            <div id="error_message_import" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
          </div>
        </td>
      </tr>
    </tfoot>
  </table>
</div>

<!-- FOOTER -->
<div class="card-body">
  <div class="row">
    <div class="col">
      <div class="text-red" id="manually_message" style="margin-bottom: .5rem;display: none;">
        Please input at least one item.
      </div>
      <div class="d-flex" style="gap: 1rem;align-items: center;">
        <div class="d-flex" id="ppn_container" style="gap: 8px; align-items: center;">
          <label style="margin-bottom: 0;">VAT</label>
          <select type="text" id="ppn_option" class="form-control" name="ppn_value" onchange="selectVAT(this)"
            style="border-radius:0;width:auto;">
            <option value="NO" <?= $header['vatStatus'] == "NO" ? 'selected' : '' ?>>No</option>
            <option value="YES" <?= $header['vatStatus'] == "YES" ? 'selected' : '' ?>>Yes</option>
          </select>
        </div>
        <div id="ppn_percentage_container"
          style="gap: 8px; align-items: center; display: <?= $header['vatStatus'] == "NO" ? 'none' : 'flex' ?>;">
          <label style="margin-bottom: 0;">VAT (%)</label>
          <select type="text" id="ppn_percentage_option" class="form-control" name="ppn_percentage_value"
            onchange="selectPercentageVAT(this)" style="border-radius:0;width:auto;">
          </select>
        </div>
      </div>
    </div>
    <div class="col text-right" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
      <div>
        Total : <span id="table_total">0.00</span>
      </div>
      <div style="margin-top: .5rem;">
        Total VAT : <span id="table_total_vat">0.00</span>
      </div>
      <div style="margin-top: .5rem;">
        Grand Total : <span id="table_grand_total">0.00</span>
      </div>
    </div>
  </div>
</div>