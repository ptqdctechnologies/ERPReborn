<div id="myCurrency" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Currency</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center loading">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <h3 class="pt-3">
                                Loading...
                            </h3>
                        </div>

                        <div class="card tableCurrency">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap" id="tableGetCurrency">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
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

    // $(function() {
        $(window).one('load', function(e) {
        // $('.myCurrency').one('click', function(e) {
            e.preventDefault();

            var keys = 0;

            $('.tableCurrency').hide();

            $.ajax({
                type: 'GET',
                url: '{!! route("getCurrency") !!}',
                success: function(data) {
                    var no = 1;
                    var t = $('#tableGetCurrency').DataTable();
                    t.clear();
                    $.each(data.data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_currency' + keys + '" value="' + val.sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + val.ISOCode + '</td>',
                            '<td>' + val.name + '</td></span></tr></tbody>'
                        ]).draw();
                    });

                    $('.loading').hide();
                    $('.tableCurrency').show();
                }
            });

        });

    // });
</script>