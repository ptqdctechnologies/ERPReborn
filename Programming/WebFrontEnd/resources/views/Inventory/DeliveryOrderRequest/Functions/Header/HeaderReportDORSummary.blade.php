<div class="card">
    <form method="post" action="{{ route('Inventory.ReportDORequestSummaryStore') }}" id="FormSubmitReportDORSummary">
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
                                    <input id="budget_name" style="border-radius:0;" class="form-control" name="budget_name" type="hidden">
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

            <!-- WAREHOUSE -->
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="form-group">
                    <table style="width: 100%;">
                        <tr>
                            <th class="col-3 pl-0" style="padding-top: 7px;"><label>Warehouse&nbsp;</label></th>
                            <td class="col-9 p-0">
                                <div class="input-group">
                                    <input 
                                        id="warehouse_from_id" 
                                        style="border-radius:0;" 
                                        name="warehouse_from_id" 
                                        class="form-control" 
                                        hidden
                                    >
                                    <input 
                                        id="warehouse_from" 
                                        style="border-radius:0;" 
                                        name="warehouse_from" 
                                        class="form-control"
                                    >
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#"><i id="warehouse_from_2" data-toggle="modal" data-target="#myGetWarehouse" class="fas fa-gift myGetWarehouseFrom" style="color:grey;"></i></a>
                                        </span>
                                    </div>
                                </div>
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

                            <form method="post" action="{{ route('Inventory.PrintExportReportDORequestSummary') }}" id="FormPrintReportDORSummary">
                                @csrf
                                <td>
                                    <select name="print_type" id="print_type" class="form-control p-0">
                                        <option value="PDF">Export PDF</option>
                                        <option value="Excel">Export Excel</option>
                                    </select>
                                </td>

                                <td class="align-middle">
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