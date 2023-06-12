<div id="myGetBank" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Bank</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetBank">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Full Name</th>
                                            <th style="display:none;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
        $('.myGetBank').on('click', function(e) {
            e.preventDefault();
            
            var sys_ID = $("#beneficiary_name_id").val();

            $.ajax({
                type: 'GET',
                url: '{!! route("getBank") !!}?sys_ID=' + sys_ID,
                success: function(data) {
                    console.log(data);
                    var no = 1; t = $('#tableGetBank').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        
                        t.row.add([

                            '<tbody><tr><td>' + no++ + '</td>',
                            '<td>' + val.bankAcronym + '</td>',
                            '<td>' + val.bankName + '</td>',
                            '<span style="display:none;"><td>' + val.bank_RefID + '</td></span></tr></tbody>'

                        ]).draw();

                    });
                }
            });
        });

    });
</script>