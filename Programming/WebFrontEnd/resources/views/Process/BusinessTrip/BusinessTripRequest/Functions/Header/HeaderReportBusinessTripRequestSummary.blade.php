<div class="col-sm-12 col-md-12 col-lg-4">
    <!-- BUDGET -->
    <div class="row p-0" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Budget</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div style="flex: 100%;">
                <input id="project_code" style="border-radius:0;" name="project_code" class="form-control" size="17" readonly>
                <input id="project_id" style="border-radius:0;" name="project_id" class="form-control" readonly hidden>
            </div>
            <div>
                <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="javascript:;" id="myProjectSecond" data-toggle="modal" data-target="#myProjectSecond">
                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectSecond">
                    </a>
                </span>
            </div>
        </div>
    </div>

    <!-- SUB BUDGET -->
    <div class="row p-0">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Sub Budget</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div style="flex: 100%;">
                <input id="site_code" style="border-radius:0;" name="site_code" class="form-control" size="17" readonly>
                <input id="site_id" style="border-radius:0;" name="site_id" class="form-control" readonly hidden>
            </div>
            <div>
                <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="javascript:;" id="mySiteCodeSecond" data-toggle="modal" data-target="#mySiteCodeSecond">
                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecond">
                    </a>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-4">
    <!-- REQUESTER -->
    <div class="row p-0" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Requester</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div style="flex: 100%;">
                <input id="requester_name" style="border-radius:0;" name="requester_name" class="form-control" size="17" readonly>
                <input id="requester_id" style="border-radius:0;" name="requester_id" class="form-control" readonly hidden>
            </div>
            <div>
                <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="javascript:;" id="myRequesterSecond" data-toggle="modal" data-target="#myRequesterSecond">
                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myRequesterSecond">
                    </a>
                </span>
            </div>
        </div>
    </div>

    <!-- BENEFICIARY -->
    <div class="row p-0">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Beneficiary</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div style="flex: 100%;">
                <input id="beneficiary_name" style="border-radius:0;" name="beneficiary_name" class="form-control" size="17" readonly>
                <input id="beneficiary_id" style="border-radius:0;" name="beneficiary_id" class="form-control" readonly hidden>
            </div>
            <div>
                <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="javascript:;" id="myBeneficiarySecond" data-toggle="modal" data-target="#myBeneficiarySecond">
                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                    </a>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-4">
    <!-- EXPORT -->
    <div class="justify-content-sm-end justify-content-md-end justify-content-lg-start row align-items-center p-0" style="margin-bottom: 1rem; gap: 0.5rem;">
        <select name="print_type" id="print_type" class="form-control" style="width: max-content;">
            <option value="PDF">Export PDF</option>
            <option value="Excel">Export Excel</option>
        </select>
        <button class="btn btn-default btn-sm" type="submit">
            <span>
                <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="">
            </span>
        </button>
    </div>

    <!-- SUBMIT -->
    <div class="justify-content-sm-end justify-content-md-end justify-content-lg-start row p-0">
        <button class="btn btn-default btn-sm" type="submit" style="margin-top: -5px;">
            <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="" title="Show">
            Show
        </button>
    </div>
</div>