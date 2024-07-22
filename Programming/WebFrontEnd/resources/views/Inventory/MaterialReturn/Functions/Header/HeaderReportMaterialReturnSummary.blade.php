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
            <div class="col-md-3">
                <div class="form-group">
                    <table>
                        <tr>
                            <th style="padding-top: 7px;"><label>Sub&nbsp;Budget&nbsp;</label></th>
                            <td>
                                <!-- <div class="input-group">
                                    <input id="sub_budget_id" style="border-radius:0;" class="form-control" name="sub_budget_id" type="hidden">
                                    <input id="sub_budget" style="border-radius:0;background-color:white;" class="form-control mySiteCode" name="sub_budget" readonly data-toggle="modal" data-target="#mySiteCode">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#" id="sub_budget_popup" data-toggle="modal" data-target="#mySiteCode" class="mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                        </span>
                                    </div>
                                </div> -->

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

                            <form method="post" action="" id="FormSubmitReportMaterialReturnSummary">
                            @csrf
                                <td>
                                    <select name="" id="" class="form-control">
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