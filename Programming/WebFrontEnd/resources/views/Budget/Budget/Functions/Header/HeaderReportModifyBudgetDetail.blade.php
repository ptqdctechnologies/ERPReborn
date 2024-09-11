<div class="card">
    <form method="post" action="{{ route('Budget.ReportModifyBudgetDetailStore') }}" id="FormSubmitReportDODetail">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <table>
                        <tr>
                            <th style="padding-top: 10px;"><label>Modify Number&nbsp;</label></th>
                            <td>
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
            <div class="col-md-4">
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
                            
                            <form method="post" action="{{ route('Budget.PrintExportReportModifyBudgetDetail') }}" id="FormSubmitReportDODetail">
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