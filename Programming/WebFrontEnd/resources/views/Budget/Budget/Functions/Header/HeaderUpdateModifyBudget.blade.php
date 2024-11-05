<div class="row py-3 justify-content-between" style="gap: 15px;">
    <div class="col-md-12 col-lg-5">
        <div class="row">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget Code</label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                <div>
                    <input id="project_id" hidden name="project_id" value="{{ $budgetID }}">
                    <input id="project_code" style="border-radius:0; width: 60px;" name="project_code" class="form-control myProject" value="{{ $budgetCode }}" readonly>
                </div>
                <div>
                    <span style="border-radius:0;" class="input-group-text form-control">
                        <a href="#" id="project_code_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                    </span>
                </div>
                <div style="flex: 100%;">
                    <div class="input-group">
                        <input id="project_name" style="border-radius:0;" class="form-control" name="project_name" value="{{ $budgetName }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-5">
        <div class="row">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Sub Budget Code</label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                <div>
                    <input id="site_id" hidden name="site_id" value="{{ request('subBudgetID') }}">
                    <input id="site_code" style="border-radius:0; width: 60px;" name="site_code" class="form-control" value="{{ request('subBudgetCode') }}" readonly>
                </div>
                <div>
                    <span style="border-radius:0;" class="input-group-text form-control">
                        <a href="#" id="site_code_popup" data-toggle="modal" data-target="#mySiteCode" class="mySiteCode">
                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                        </a>
                    </span>
                </div>
                <div style="flex: 100%;">
                    <div class="input-group">
                        <input id="site_name" style="border-radius:0;" class="form-control" name="site_name" value="{{ request('subBudgetName') }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>