<div id="myBanksAccount" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Bank Account</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableBanksAccount">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bank Name</th>
                                            <th>Bank Account</th>
                                            <th>Account Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="loadingBanksAccount">
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
                                        <tr class="errorBanksAccountMessageContainer">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorBanksAccountMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorBanksAccountMessageContainer").hide();

    function getBanksAccount(bank_RefID, person_RefID) {
        $('#tableBanksAccount tbody').empty();
        $(".loadingBanksAccount").show();
        $(".errorBanksAccountMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getBankAccount") !!}?bank_RefID=' + bank_RefID + '&person_RefID=' + person_RefID,
            success: function(data) {
                $(".loadingBanksAccount").hide();

                var no = 1;
                var tableBankAccount = $('#tableBanksAccount').DataTable();

                tableBankAccount.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {                      
                        keys += 1;
                        tableBankAccount.row.add([
                            no++,
                            '<input id="sys_id_banks_account' + keys + '" value="' + val.sys_ID + '" type="hidden">' + val.bankAcronym || '-',
                            val.accountNumber || '-',
                            val.accountName || '-',
                        ]).draw();
                    });

                    if (data.length === 1) {
                        $("#bank_accounts").val(data[0].accountNumber);
                        $("#bank_accounts_id").val(data[0].sys_ID);
                        $("#bank_accounts_detail").val(`${data[0].accountNumber} - ${data[0].accountName}`);
                        $("#bank_accounts_detail").css({"background-color":"#e9ecef"});
                    }

                    $("#tableBanksAccount_length").show();
                    $("#tableBanksAccount_filter").show();
                    $("#tableBanksAccount_info").show();
                    $("#tableBanksAccount_paginate").show();
                } else {
                    $(".errorBanksAccountMessageContainer").show();
                    $("#errorBanksAccountMessage").text(`Data not found.`);

                    $("#tableBanksAccount_length").hide();
                    $("#tableBanksAccount_filter").hide();
                    $("#tableBanksAccount_info").hide();
                    $("#tableBanksAccount_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableBanksAccount tbody').empty();
                $(".loadingBanksAccount").hide();
                $(".errorBanksAccountMessageContainer").show();
                $("#errorBanksAccountMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    // $('#tableBanksAccount').on('click', 'tbody tr', function() {
    //     var sysID       = $(this).find('input[type="hidden"]').val();
    //     var bankName    = $(this).find('td:nth-child(2)').text();
    //     var bankAccount = $(this).find('td:nth-child(3)').text();
    //     var accountName = $(this).find('td:nth-child(4)').text();

    //     $("#bank_accounts").val(bankAccount);
    //     $("#bank_accounts_id").val(sysID);
    //     $("#bank_accounts_detail").val(accountName);

    //     $('#myBankAccount').modal('hide');
    //     adjustInputSize(document.getElementById("bank_accounts"));
    // });
</script>