<div id="myPopUpDoRevision" class="modal fade" role="dialog" aria-hidden="true" style="margin-top: 180px;margin-left:6px;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="width:90%;">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:25%;font-weight:bold;">DELIVERY ORDER REVISION</span><br><br><br>
                    <form action="{{ route('DeliveryOrder.RevisionDeliveryOrderIndex') }}" method="post">
                        @csrf
                        <div class="card" style="margin-left: 8%;">
                            <div class="card-body">
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <td><label>Revision Number&nbsp;</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="do_RefID" style="border-radius:0;" name="do_RefID" type="hidden" class="form-control" hidden>
                                                    <input id="do_number" style="border-radius:0;" name="do_number" class="form-control" readonly>
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a data-toggle="modal" data-target="#PopUpTableDoRevision">
                                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm" style="margin-left: 38%;background-color:#e9ecef;border:1px solid #ced4da;">
                            <img src="{{ asset('AdminLTE-master/dist/img/edit.png') }}" width="13" alt="" title="Edit"> Edit
                        </button>
                        <button type="reset" class="btn btn-sm" style="background-color:#e9ecef;border:1px solid #ced4da;">
                            <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Edit"> Cancel
                        </button>
                    </form>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>

<div id="PopUpTableDoRevision" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Delivery Order</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="TableSearchDeliveryOrder">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetDeliveryOrder">
                                            <td colspan="2" class="p-0" style="height: 22rem;">
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
                                        <tr class="errorDeliveryOrderMessageContainer">
                                            <td colspan="2" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorDeliveryOrderMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorDeliveryOrderMessageContainer").hide();

    function getDOList() {
        $('#TableSearchDeliveryOrder tbody').empty();
        $(".loadingGetDeliveryOrder").show();
        $(".errorDeliveryOrderMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getDeliveryOrderList") !!}',
            success: function(data) {
                console.log('data', data);
                
                $(".loadingGetDeliveryOrder").hide();

                var no = 1;
                var table = $('#TableSearchDeliveryOrder').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_do_revision' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_do_revision" type="hidden">' + no++,
                            val.documentNumber || '-',
                        ]).draw();
                    });

                    $("#TableSearchDeliveryOrder_length").show();
                    $("#TableSearchDeliveryOrder_filter").show();
                    $("#TableSearchDeliveryOrder_info").show();
                    $("#TableSearchDeliveryOrder_paginate").show();
                } else {
                    $(".errorDeliveryOrderMessageContainer").show();
                    $("#errorDeliveryOrderMessage").text(`Data not found.`);

                    $("#TableSearchDeliveryOrder_length").hide();
                    $("#TableSearchDeliveryOrder_filter").hide();
                    $("#TableSearchDeliveryOrder_info").hide();
                    $("#TableSearchDeliveryOrder_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#TableSearchDeliveryOrder tbody').empty();
                $(".loadingGetDeliveryOrder").hide();
                $(".errorDeliveryOrderMessageContainer").show();
                $("#errorDeliveryOrderMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }
    
    $(window).one('load', function(e) {
        getDOList();
    });

    $('#TableSearchDeliveryOrder tbody').on('click', 'tr', function() {
        var sysId       = $(this).find('input[data-trigger="sys_id_do_revision"]').val();
        var projectName = $(this).find('td:nth-child(2)').text();

        $("#do_RefID").val(sysId);
        $("#do_number").val(projectName);

        $('#PopUpTableDoRevision').modal('hide');
    });
</script>