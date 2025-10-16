<div id="mySuppliers" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Supplier</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableSuppliers">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Supplier Code</th>
                                            <th>Supplier Name</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="loadingSuppliers">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
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
                                        <tr class="errorSuppliersMessageContainer">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorSuppliersMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorSuppliersMessageContainer").hide();

    function getSuppliers() {
        $('#tableSuppliers tbody').empty();
        $(".loadingSuppliers").show();
        $(".errorSuppliersMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getSupplier") !!}',
            success: function(data) {
                $(".loadingSuppliers").hide();

                var no = 1;
                var table = $('#tableSuppliers').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_supplier' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_supplier" type="hidden">' + no++,
                            val.code || '-',
                            val.name || '-',
                            val.address || '-',
                        ]).draw();
                    });

                    $("#tableSuppliers_length").show();
                    $("#tableSuppliers_filter").show();
                    $("#tableSuppliers_info").show();
                    $("#tableSuppliers_paginate").show();
                } else {
                    $(".errorSuppliersMessageContainer").show();
                    $("#errorSuppliersMessage").text(`Data not found.`);

                    $("#tableSuppliers_length").hide();
                    $("#tableSuppliers_filter").hide();
                    $("#tableSuppliers_info").hide();
                    $("#tableSuppliers_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableSuppliers tbody').empty();
                $(".loadingSuppliers").hide();
                $(".errorSuppliersMessageContainer").show();
                $("#errorSuppliersMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getSuppliers();
    });
</script>