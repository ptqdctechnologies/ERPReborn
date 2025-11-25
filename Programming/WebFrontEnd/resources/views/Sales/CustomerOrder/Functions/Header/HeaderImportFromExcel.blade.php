<div class="card-body">
  <div class="row py-3" style="gap: 1rem;">
    <!-- CO FILE -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">CO File</label>
        <div class="col-5 d-flex">
          <div onclick="convertSubBudgetToVariable()">
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
        <a href="{{ route('CustomerOrder.Download') }}" class="col">
          Download Template
        </a>
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
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Value</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Notes</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>