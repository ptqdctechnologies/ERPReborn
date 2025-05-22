<!-- GET ADVANCE SETTLEMENT -->
<div id="myGetModalAdvanceSettlement" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Advance Settlement</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetModalAdvanceSettlement">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalAdvanceSettlement">
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
                                        <tr class="errorModalAdvanceSettlementMessageContainerSecond">
                                            <td colspan="2" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalAdvanceSettlementMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorModalAdvanceSettlementMessageContainerSecond").hide();

    function getModalAdvanceSettlement() {
        $('#tableGetModalAdvanceSettlement tbody').empty();
        $(".loadingGetModalAdvanceSettlement").show();
        $(".errorModalAdvanceSettlementMessageContainerSecond").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getAdvanceSettlement") !!}',
            success: function(data) {
                $(".loadingGetModalAdvanceSettlement").hide();

                var no = 1;
                var table = $('#tableGetModalAdvanceSettlement').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_modal_advance_settlement' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_modal_advance_settlement" type="hidden">' + no++,
                            val.sys_Text || '-',
                        ]).draw();
                    });

                    $("#tableGetModalAdvanceSettlement_length").show();
                    $("#tableGetModalAdvanceSettlement_filter").show();
                    $("#tableGetModalAdvanceSettlement_info").show();
                    $("#tableGetModalAdvanceSettlement_paginate").show();
                } else {
                    $(".errorModalAdvanceSettlementMessageContainerSecond").show();
                    $("#errorModalAdvanceSettlementMessageSecond").text(`Data not found.`);

                    $("#tableGetModalAdvanceSettlement_length").hide();
                    $("#tableGetModalAdvanceSettlement_filter").hide();
                    $("#tableGetModalAdvanceSettlement_info").hide();
                    $("#tableGetModalAdvanceSettlement_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetModalAdvanceSettlement tbody').empty();
                $(".loadingGetModalAdvanceSettlement").hide();
                $(".errorModalAdvanceSettlementMessageContainerSecond").show();
                $("#errorModalAdvanceSettlementMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getModalAdvanceSettlement();
    });

    $('#tableGetModalAdvanceSettlement').on('click', 'tbody tr', function() {
        var sysId           = $(this).find('input[data-trigger="sys_id_modal_advance_settlement"]').val();
        var trano           = $(this).find('td:nth-child(2)').text();

        $("#advance_settlement_id").val(sysId);
        $("#advance_settlement_number").val(trano);

        $('#myGetModalAdvanceSettlement').modal('hide');
    });
</script>