<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <label class="card-title">
                    <ul class="navbar-nav ml-auto left">
                        <li class="nav-item dropdown user-menu">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" style="color:#4B586A;font-size:12px; padding: 2px;">
                                <span style="position:relative;cursor:pointer;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="25" alt="" style="border: 1px solid #ced4da;padding: 2px 4px;border-radius:3px;"> 
                                    SELECT ACTION 
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-left" style="padding: 10px;font-size:14px;background-color:#4B586A;margin-top:8px;">
                                <li class="nav-item">
                                    <a href="{{ route('BusinessTripRequest.index') }}" class="nav-link" style="color:white;padding-bottom:10px;">
                                        <i class="far fa-file nav-icon-sm"> Create Business Trip Request</i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link myPopUpBusinessTripRevision" data-toggle="modal" data-target="#myPopUpBusinessTripRevision" style="color:white;padding-bottom:10px;cursor:pointer">
                                        <i class="far fa-file nav-icon-sm"> Revision Business Trip Request</i>
                                    </a>
                                </li>
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

            var keys = 0;
            $.ajax({
                type: 'GET',
                url: '{!! route("BusinessTripRequest.BusinessTripRequestListData") !!}',
                success: function(data) {
                    var no = 1;

                    t = $('#TableSearchBusinessTripRevision').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_brf_revision' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + val.DocumentNumber + '</td>',
                            '<td>' + val.CombinedBudgetCode + '</td>',
                            '<td>' + val.CombinedBudgetName + '</td>',
                            '<td>' + val.CombinedBudgetSectionCode + '</td>',
                            '<td>' + val.CombinedBudgetSectionName + '</td></tr></tbody>'
                        ]).draw();
                    });
                }
            });
        });
    });
</script>