<div class="col-sm-12 col-md-12 col-lg-4">
    <form method="post" action="{{ route('Budget.ReportModifyBudgetDetailStore') }}" id="FormSubmitReportDODetail">
        @csrf
        <!-- MODIFY NUMBER -->
        <div class="row p-0 align-items-center">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Modify Number</label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <input id="advance_RefID" name="advance_RefID" hidden>
                    <input id="advance_number" style="border-radius:0;background-color:white;" data-toggle="modal" data-target="#PopUpTableAdvanceRevision" class="PopUpTableAdvanceRevision form-control" name="advance_number" value="" readonly>
                </div>
                <div>
                    <span style="border-radius:0;" class="input-group-text form-control">
                        <a href="#" id="advance_popup" data-toggle="modal" data-target="#PopUpTableAdvanceRevision" class="PopUpTableAdvanceRevision">
                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                        </a>
                    </span>
                </div>
                <div></div>
            </div>
        </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-4">
        <div class="row">
            <div class="col-2 p-0">
                <button class="btn btn-default btn-sm" type="submit">
                    <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="show" title="Show">
                    Show
                </button>
            </div>
    </form>
    <form method="post" action="{{ route('Budget.PrintExportReportModifyBudgetDetail') }}" id="FormSubmitReportDODetail">
        @csrf
            <div class="col">
                <div class="align-items-center justify-content-sm-end justify-content-md-end justify-content-lg-start d-flex p-0" style="gap: 0.5rem;">
                    <div>
                        <select name="print_type" id="print_type" class="form-control">
                            <option value="PDF">Export PDF</option>
                            <option value="Excel">Export Excel</option>
                        </select>
                    </div>
                    <button class="btn btn-default btn-sm" type="submit">
                        <span>
                            <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="" />
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>