<div class="row" style="position:relative;bottom:1px;">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <label class="card-title">
                    <ul class="navbar-nav ml-auto left">
                        <li class="nav-item dropdown user-menu">
                            <form action="{{ route('PurchaseRequisition.RevisionPrIndex') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <td style="position:relative;top:3px;"><label>Document Number</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input required="" id="document_number" style="border-radius:0;" name="document_number" type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a class="nav-link mySearchDocument" data-toggle="modal" data-target="#mySearchDocument"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="padding-left: 20px;;">
                                                <div class="input-group">
                                                    <button class="btn btn-default btn-sm float-right" type="submit">
                                                        <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="13" alt="" title="Submit to Purchase Requisition"> &nbsp; Show
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


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        $('.mySearchDocument').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'GET',
                url: '{!! route("PurchaseRequisition.PurchaseRequisitionListData") !!}',
                success: function(data) {
                    var no = 1; t = $('#TableSearchProcReqRevision').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        t.row.add([
                            '<tbody><tr><td>' + no++ + '</td>',
                            '<td>' + val.documentNumber + '</td>',
                            '<td>' + val.combinedBudgetCode + '</td>',
                            '<td>' + val.combinedBudgetName + '</td>',
                            '<td>' + val.combinedBudgetSectionCode + '</td>',
                            '<td>' + val.combinedBudgetSectionName + '</td>',
                            '<span style="display:none;"><td">' + val.sys_ID + '</td></span></tr></tbody>'
                        ]).draw();

                    });
                }
            });
        });

    });
</script>