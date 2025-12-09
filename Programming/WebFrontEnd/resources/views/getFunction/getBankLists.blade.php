<!-- DEFAULT MODAL -->
<div id="myGetBankList" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
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
                                <table class="table table-head-fixed text-nowrap" id="tableGetBankList">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Full Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="loadingGetBankName">
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
                                        <tr class="errorMessageContainer">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorMessageContainer").hide();
    $(".errorMessageContainerSecond").hide();

    function getBankNameList(source) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        let keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getBankList") !!}',
            success: function(data) {
                $(".loadingGetBankName").hide();

                let no = 1;
                let table = $('#tableGetBankList').DataTable();
                table.clear();

                if (Array.isArray(data.data) && data.data.length > 0) {
                    // $.each(data.data, function(key, val) {
                    //     keys += 1;
                    //     table.row.add([
                    //         '<input id="sys_id_bank_list' + keys + '" value="' + val.sys_ID + '" type="hidden">' + no++,
                    //         val.acronym || '-',
                    //         val.name || '-'
                    //     ]).draw();
                    // });

                    // $("#tableGetBankList_length").show();
                    // $("#tableGetBankList_filter").show();
                    // $("#tableGetBankList_info").show();
                    // $("#tableGetBankList_paginate").show();

                    $('#tableGetBankList').DataTable({
                        destroy: true,
                        data: data.data,
                        deferRender: true,
                        scrollCollapse: true,
                        scroller: true,
                        columns: [
                            {
                                data: null,
                                render: function (data, type, row, meta) {
                                    return '<td class="align-middle text-center">' +
                                        '<input id="sys_id_bank_list' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_bank_list" type="hidden">' +
                                        (meta.row + 1) +
                                    '</td>';
                                }
                            },
                            {
                                data: 'acronym',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'name',
                                defaultContent: '-',
                                className: "align-middle"
                            }
                        ]
                    });

                    $('#tableGetBankList').css("width", "100%");
                } else {
                    $(".errorMessageContainer").show();
                    $("#errorMessage").text(`Data not found.`);

                    $("#tableGetBankList_length").hide();
                    $("#tableGetBankList_filter").hide();
                    $("#tableGetBankList_info").hide();
                    $("#tableGetBankList_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetBankList tbody').empty();
                $(".loadingGetBankName").hide();
                $(".errorMessageContainer").show();
                $("#errorMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    // PILIH BANK PADA MODAL BANK NAME
    // $('#tableGetBankList').on('click', 'tbody tr', function() {
        // var sysId = $(this).find('input[type="hidden"]').val();
        // var bankAcronym = $(this).find('td:nth-child(2)').text();
        // var bankFullName = $(this).find('td:nth-child(3)').text();

    //     $('#bank_list_name').val(bankAcronym);
    //     $('#bank_list_code').val(sysId);
    //     $('#bank_list_detail').val(bankFullName);

    //     adjustInputSize(document.getElementById("bank_list_name"), "string");

    //     $('#myGetBankList').modal('hide');
    // });

    $(window).one('load', function(e) {
        getBankNameList();
    });
</script>