<div class="card-body">
  <div class="row py-3" style="gap: 1rem;">
    <!-- CO FILE -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">CO File</label>
        <div class="col-5 d-flex">
          <div>
            <span class="input-group-text form-control" style="border-radius: 0;">
              <label id="uploadCOFile" style="display: block;margin-bottom: 0; cursor: pointer;">
                <i class="fas fa-paperclip"></i>
                <input type="file" id="excel_file" accept=".xls,.xlsx" style="display:none;">
              </label>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input type="text" id="excel_name" class="form-control" readonly style="border-radius:0; background-color: white;">
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top: .3rem;">
        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
        <a href="{{ route('CustomerOrder.Download') }}" class="col" style="max-width: fit-content;">
          Download Template
        </a>
      </div>
      <div class="row" id="co_file_message" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
        <div class="col text-red">
          CO File cannot be empty.
        </div>
      </div>
    </div>

    <!-- GENERATE EXCEL -->
    <div class="col-12">
      <div class="row">
        <div class="wrapper-budget card-body table-responsive p-0" style="height: 230px; border: 1px solid #e9ecef;">
          <table class="table table-head-fixed text-nowrap table-sm" id="table_import_from_excel">
            <thead>
              <tr>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;border-left:1px solid #e9ecef;text-align: center;">Sub Budget</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;width:150px;">Value</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Notes</th>
              </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
              <tr class="loading_import" style="display: none;">
                <td colspan="3" class="p-0" style="border: 0px; height: 150px;">
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
                <td colspan="3" class="p-0" style="border: 0px;">
                  <div class="d-flex flex-column justify-content-center align-items-center py-3">
                    <div id="error_message_import" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- FOOTER -->
<div class="card-body">
  <div class="row">
    <div class="col">
      <div class="text-red" id="import_message" style="display: none;">
        Please review your selected item.
      </div>
    </div>
    <div class="col text-right" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
      Total : <span id="import_total">0.00</span>
    </div>
  </div>
</div>