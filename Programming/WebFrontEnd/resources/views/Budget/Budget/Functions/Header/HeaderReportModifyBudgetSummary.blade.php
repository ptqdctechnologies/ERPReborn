<div class="card">
    <form method="post" action="{{ route('Budget.ReportModifyBudgetSummaryStore') }}">
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
            <div class="col-md-3">
                <div class="form-group">
                    <table>
                        <tr>
                            <th style="padding-top: 7px;"><label>Sub&nbsp;Budget&nbsp;</label></th>
                            <td>
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
            <div class="col-md-3">
                <div class="form-group">
                    <table>
                        <tr>
                            <th style="padding-top: 7px;"><label>Start&nbsp;Date&nbsp;</label></th>
                            <td>
                                <div class="input-group date" id="startDate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="eventStartDate" id="eventStartDate" data-target="#startDate" style="height: auto;" />
                                    <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
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
                            <th style="padding-top: 7px;"><label>End&nbsp;Date&nbsp;</label></th>
                            <td>
                                <div class="input-group date" id="finishDate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="eventFinishDate" id="eventFinishDate" data-target="#finishDate" style="height: auto;" />
                                    <div class="input-group-append" data-target="#finishDate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3 mt-2">
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

                            <form method="post" action="{{ route('Budget.PrintExportReportModifyBudgetSummary') }}">
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