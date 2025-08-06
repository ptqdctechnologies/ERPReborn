<div class="col-12 ShowDocument">
    <div class="card">
        <form method="post" enctype="multipart/form-data" action="{{ route('CreditNote.ReportCreditNoteDetailStore') }}" >
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                        <table>
                            <tr>
                            <th style="padding-top: 7px;"><label>Credit Note&nbsp;Number&nbsp;</label></th>
                            <td>
                                <div class="input-group">
                                <input id="do_refID" style="border-radius:0;background-color:white;" name="do_refID" type="hidden" class="form-control" readonly>
                                <input id="do_number" style="border-radius:0;background-color:white;" name="do_number" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                    <a id="do_number2" data-toggle="modal" data-target="#getCreditNote" class="getCreditNote"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>
                                </div>
                            </td>
                            </tr>
                        </table>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <table>
                            <tr>
                                <td>
                                    <button class="btn btn-default btn-sm" type="submit">
                                        <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="" title="Show"> Show
                                    </button>
                                </td>
                                </form>

                            <form method="post" enctype="multipart/form-data" action="{{ route('CreditNote.PrintExportReportCreditNoteDetail') }}">
                                @csrf
                                <td>
                                <select name="print_type" id="print_type" class="form-control">
                                    <option value="PDF">PDF</option>
                                    <option value="Excel">Excel</option>
                                </select>
                                </td>
                                <td>

                                <button class="btn btn-default btn-sm" type="submit">
                                    <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="" title="Print">
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
    </div>