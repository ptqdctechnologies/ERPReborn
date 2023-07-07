<div class="row" style="position:relative;bottom:1px;">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <label class="card-title">
                    <ul class="navbar-nav ml-auto left">
                        <li class="nav-item dropdown user-menu">
                            <form action="{{ route('CheckDocument.ShowDocument') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <td style="position:relative;top:3px;"><label>Document Number</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input required="" id="sys_id" style="border-radius:0;" name="sys_id" type="text" class="form-control" hidden value="{{ $sys_id }}">
                                                    <input required="" id="linkReportTransaction" style="border-radius:0;" name="linkReportTransaction" type="text" class="form-control" hidden value="{{ $linkReportTransaction }}">
                                                    <input required="" id="businessDocument_RefID" style="border-radius:0;" name="businessDocument_RefID" type="text" class="form-control" hidden value="{{ $businessDocument_RefID }}">
                                                    <input required="" id="TransactionMenu" style="border-radius:0;" name="TransactionMenu" type="text" class="form-control" hidden value="{{ $TransactionMenu }}">
                                                    <input required="" id="document_number" style="border-radius:0;" name="document_number" type="text" class="form-control" value="{{ $document_number }}">
                                                    
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a class="nav-link mySearchCheckDocument" data-toggle="modal" data-target="#mySearchCheckDocument"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="padding-left: 20px;;">
                                                <div class="input-group">
                                                    <button class="btn btn-default btn-sm float-right" type="submit">
                                                        <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="13" alt="" title="Show"> &nbsp; Show
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </li>
                    </ul>
                </label>
            </div>
        </div>
    </div>
</div>