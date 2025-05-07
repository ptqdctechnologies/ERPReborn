<!-- BODY -->
<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <!-- LEFT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <!-- PR NUMBER -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          PR Number
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="pr_number" style="border-radius:0;" class="form-control" size="20" readonly>
            <input id="pr_id" style="border-radius:0;" name="pr_id" class="form-control" hidden>
            <input id="pr_detail_id" style="border-radius:0;" name="pr_detail_id" class="form-control" hidden>
          </div>
          <div class="input-group-append invisible">
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="referenceNumberTrigger" style="display: block;">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="doNumberTrigger">
              </a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- <div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <!-- BUDGET CODE -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget Code</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="project_code_second" style="border-radius:0;" class="form-control" size="17" readonly value="{{ $header['budgetCode']; }}">
            <input id="project_id_second" name="project_id_second" style="border-radius:0;" class="form-control" hidden value="{{ $header['budgetID']; }}">
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myProjectSecondTrigger" data-toggle="modal" data-target="#myProjectSecond" style="display: block;">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectSecondTrigger">
              </a>

              <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                <span class="sr-only">Loading...</span>
              </div>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="project_name_second" style="border-radius:0;" class="form-control" readonly value="{{ $header['budgetName']; }}">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- SUB BUDGET CODE -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Sub Budget Code</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="site_code_second" style="border-radius:0;" class="form-control" size="17" readonly value="{{ $header['subBudgetCode']; }}">
            <input id="site_id_second" style="border-radius:0;" name="site_id_second" class="form-control" hidden value="{{ $header['subBudgetID']; }}">
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="mySiteCodeSecondTrigger" data-toggle="modal" data-target="#mySiteCodeSecond">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecondTrigger">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="site_name_second" style="border-radius:0;" class="form-control" readonly value="{{ $header['subBudgetName']; }}">
            </div>
          </div>
      </div>
      </div>
    </div>
  </div>
</div> --}}