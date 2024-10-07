<div class="card">
    <form method="post" action="{{ route('PurchaseOrder.ReportPurchaseOrderDetailStore') }}" id="FormSubmitReportPurchaseOrderSummary">
    @csrf
    <div class="card-body">
        <div class="row">
            <!-- BUDGET -->
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="form-group">
                    <table style="width: 100%;">
                        <tr>
                            <th class="col-3 pl-0" style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                            <td class="col-9 p-0">
                                <div class="input-group">
                                    <input id="budget_id" style="border-radius:0;" class="form-control" name="budget_id" type="hidden">
                                    <input id="budget" style="border-radius:0;background-color:white;" class="form-control myProject" name="budget" readonly data-toggle="modal" data-target="#myProject">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#" id="budget_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- SUB BUDGET -->
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="form-group">
                    <table style="width: 100%;">
                        <tr>
                            <th class="col-3 pl-0" style="padding-top: 7px;"><label>Sub&nbsp;Budget&nbsp;</label></th>
                            <td class="col-9 p-0">
                                <div class="input-group">
                                    <input id="sub_budget_id" style="border-radius:0;" class="form-control" name="sub_budget_id" type="hidden">
                                    <input id="sub_budget" style="border-radius:0;background-color:white;" class="form-control mySiteCode" name="sub_budget" readonly data-toggle="modal" data-target="#mySiteCode">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#" id="sub_budget_popup" data-toggle="modal" data-target="#mySiteCode" class="mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- SUPPLIER -->
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="form-group">
                    <table style="width: 100%;">
                        <tr>
                            <th class="col-3 pl-0" style="padding-top: 7px;"><label>Supplier&nbsp;</label></th>
                            <td class="col-9 p-0">
                                <div class="input-group">
                                    <input id="project_id" name="project_id" value="" hidden>
                                    <input id="site_id" name="site_id" value="" hidden>
                                    <input id="advance_RefID" name="advance_RefID" hidden>
                                    <input id="advance_number" style="border-radius:0;background-color:white;" data-toggle="modal" data-target="#PopUpTableAdvanceRevision" class="PopUpTableAdvanceRevision form-control" name="advance_number" value="" readonly>
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="advance_popup" data-toggle="modal" data-target="#PopUpTableAdvanceRevision" class="PopUpTableAdvanceRevision"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                        </span>
                                    </div>
                                </div>
                                <!-- <div class="input-group">
                                    <input id="work_id" style="border-radius:0;" class="form-control" name="work_id" type="hidden">
                                    <input id="work" style="border-radius:0;background-color:white;" class="form-control myProject" name="work_id" readonly data-toggle="modal" data-target="#myProject">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#" id="work_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                        </span>
                                    </div>
                                </div> -->
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- BUTTON -->
            <div class="col-sm-12 col-md-12 col-lg-3 mt-sm-0 mt-md-2 mt-lg-0 d-md-flex justify-content-md-end d-lg-block justify-content-lg-start">
                <div class="form-group mt-3 mt-sm-3 mt-md-0 d-flex d-sm-flex d-md-block justify-content-end justify-content-sm-end">
                    <table>
                        <tr>
                            <td>
                                <button class="btn btn-default btn-sm" type="submit">
                                    <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="" title="Show"> Show
                                </button>
                                &nbsp;&nbsp;&nbsp;
                            </td>
                            </form>

                            <form method="post" action="{{ route('PurchaseOrder.PrintExportReportPurchaseOrderDetail') }}" id="FormSubmitReportPurchaseOrderSummary">
                            @csrf
                                <td>
                                    <select name="print_type" id="print_type" class="form-control">
                                        <option value="PDF">Export PDF</option>
                                        <option value="Excel">Export Excel</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn btn-default btn-sm" type="submit">
                                        <span><img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt=""></span>
                                    </button>
                                </td>
                            </form>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>