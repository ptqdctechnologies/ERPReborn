<div id="myInstitutionBankAccount" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Account Number</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableInstitutionBankAccount">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bank Name</th>
                                            <th>Account Number</th>
                                            <th>Account Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="loadingInstitutionBankAccount">
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
                                        <tr class="errorInstitutionBankAccountMessageContainer">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorInstitutionBankAccountMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorInstitutionBankAccountMessageContainer").hide();

    function getInstitutionBankAccount() {
        $('#tableInstitutionBankAccount tbody').empty();
        $(".loadingInstitutionBankAccount").show();
        $(".errorInstitutionBankAccountMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getInstitutionBankAccount") !!}',
            success: function(data) {
                $(".loadingInstitutionBankAccount").hide();

                let tableBankAccount = $('#tableInstitutionBankAccount').DataTable();
                tableBankAccount.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $('#tableInstitutionBankAccount').DataTable({
                        destroy: true,
                        data: data,
                        deferRender: true,
                        scrollCollapse: true,
                        scroller: true,
                        columns: [
                            {
                                data: null,
                                render: function (data, type, row, meta) {
                                    return '<td class="align-middle text-center">' +
                                        '<input id="sys_id_bank_account_list' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_bank_account_list" type="hidden">' +
                                        (meta.row + 1) +
                                    '</td>';
                                }
                            },
                            {
                                data: 'bankAcronym',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'accountNumber',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'accountName',
                                defaultContent: '-',
                                className: "align-middle"
                            }
                        ]
                    });

                    $('#tableInstitutionBankAccount').css("width", "100%");
                } else {
                    $(".errorInstitutionBankAccountMessageContainer").show();
                    $("#errorInstitutionBankAccountMessage").text(`Data not found.`);

                    $("#tableInstitutionBankAccount_length").hide();
                    $("#tableInstitutionBankAccount_filter").hide();
                    $("#tableInstitutionBankAccount_info").hide();
                    $("#tableInstitutionBankAccount_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableInstitutionBankAccount tbody').empty();
                $(".loadingInstitutionBankAccount").hide();
                $(".errorInstitutionBankAccountMessageContainer").show();
                $("#errorInstitutionBankAccountMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }
</script>