<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <label class="card-title">
                    <ul class="navbar-nav ml-auto left">
                        <li class="nav-item dropdown user-menu">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" style="color:#4B586A;font-size:12px;height:12px;">
                                <span style="position:relative;bottom:5px;"><img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="25" alt="" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"> SELECT ACTION </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-left" style="padding: 10px;font-size:14px;background-color:#4B586A;margin-top:8px;">
                                @if(in_array("Module.HumanResource.PersonBusinessTrip.Transaction.Create", $privilageMenu, TRUE))
                                <li class="nav-item">
                                    <a href="{{ route('BusinessTripRequest.index') }}" class="nav-link" style="color:white;padding-bottom:10px;">
                                        <i class="far fa-file nav-icon-sm"> Create Business Trip Request</i>
                                    </a>
                                </li>
                                @endif
                                @if(in_array("Module.HumanResource.PersonBusinessTripSettlement.Transaction.Create", $privilageMenu, TRUE))
                                <li class="nav-item">
                                    <a class="nav-link myPopUpBusinessTripRevision" data-toggle="modal" data-target="#myPopUpBusinessTripRevision" style="color:white;padding-bottom:10px;">
                                        <i class="far fa-file nav-icon-sm"> Revision Business Trip Request</i>
                                    </a>
                                </li>
                                @endif
                            </ul>
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
        $('.myPopUpBusinessTripRevision').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'GET',
                url: '{!! route("BusinessTripRequest.BusinessTripRequestListData") !!}',
                success: function(data) {
                    var no = 1; t = $('#TableSearchBusinessTripRevision').DataTable();
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