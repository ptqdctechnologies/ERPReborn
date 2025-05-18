<div class="card">
    <form method="post" action="{{ route('Inventory.ReportMatReturnSummaryStore') }}" id="FormSubmitReportMaterialReturnSummary">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <table>
                        <tr>
                            <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                            <td>
                                <div class="input-group">
                                    <input id="project_id_second" style="border-radius:0;" class="form-control" name="budget_id" type="hidden">
                                    <input id="project_name_second" style="border-radius:0;" class="form-control" name="budget_name" type="hidden">
                                    <input id="project_code_second" style="border-radius:0;background-color:white;" class="form-control myProject" name="budget" readonly data-toggle="modal" data-target="#myProjectSecond">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#" id="budget_popup" data-toggle="modal" data-target="#myProjectSecond" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <table>
                        <tr>
                            <th style="padding-top: 7px;"><label style="text-wrap-mode: nowrap;">Source Warehouse&nbsp;</label></th>
                            <td>
                                <div class="input-group">
                                    <input id="warehouse_id" style="border-radius:0;" class="form-control" name="sub_budget_id" type="hidden">
                                    <input id="warehouse_address" style="border-radius:0;" class="form-control" name="sub_budget_address" type="hidden">
                                    <input id="warehouse_name" style="border-radius:0;background-color:white;" class="form-control myGetWarehouse" name="sub_budget" readonly data-toggle="modal" data-target="#myGetWarehouse">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#" id="sub_budget_popup" data-toggle="modal" data-target="#myGetWarehouse" class="myGetWarehouse"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <table>
                        <tr>
                            <th style="padding-top: 7px;"><label style="text-wrap-mode: nowrap;">Destination Warehouse&nbsp;</label></th>
                            <td>
                                <div class="input-group">
                                    <input id="warehouse_id2" style="border-radius:0;" class="form-control" name="sub_budget_id" type="hidden">
                                    <input id="warehouse_address2" style="border-radius:0;" class="form-control" name="sub_budget_id" type="hidden">
                                    <input id="warehouse_name2" style="border-radius:0;background-color:white;" class="form-control myGetWarehouse2" name="sub_budget" readonly data-toggle="modal" data-target="#myGetWarehouse2">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#" id="sub_budget_popup" data-toggle="modal" data-target="#myGetWarehouse2" class="myGetWarehouse2"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <table>
                        <tr>
                            <td>
                                <button class="btn btn-default btn-sm" type="submit">
                                    <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="" title="Show"> Show
                                </button>
                                &nbsp;&nbsp;&nbsp;
                            </td>
                            </form>

                            <form method="post" action="{{ route('Inventory.PrintExportReportMatReturnSummary') }}" id="FormSubmitReportMaterialReturnSummary">
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