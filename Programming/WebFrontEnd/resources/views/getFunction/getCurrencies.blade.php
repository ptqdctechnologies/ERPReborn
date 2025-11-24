<div id="myCurrencies" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Currency</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableCurrencies">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingCurrencies">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                                        Loading...
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="errorCurrenciesMessageContainer" style="display: none;">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorCurrenciesMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
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
    function getCurrencies() {
        $('#tableCurrencies tbody').empty();
        $(".loadingCurrencies").show();
        $(".errorCurrenciesMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;

        $.ajax({
            type: 'GET',
            url: '{!! route("getCurrency") !!}',
            success: function(data) {
                $(".loadingCurrencies").hide();

                var no = 1;
                var table = $('#tableCurrencies').DataTable();
                table.clear();

                if (Array.isArray(data.data) && data.data.length > 0) {
                    $.each(data.data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_currencies' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_currencies" type="hidden">' + no++,
                            val.ISOCode || '-',
                            val.name || '-',
                        ]).draw();
                    });

                    $("#tableCurrencies_length").show();
                    $("#tableCurrencies_filter").show();
                    $("#tableCurrencies_info").show();
                    $("#tableCurrencies_paginate").show();
                } else {
                    $(".errorCurrenciesMessageContainer").show();
                    $("#errorCurrenciesMessage").text(`Data not found.`);

                    $("#tableCurrencies_length").hide();
                    $("#tableCurrencies_filter").hide();
                    $("#tableCurrencies_info").hide();
                    $("#tableCurrencies_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableCurrencies tbody').empty();
                $(".loadingCurrencies").hide();
                $(".errorCurrenciesMessageContainer").show();
                $("#errorCurrenciesMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getCurrencies();
    });
</script>