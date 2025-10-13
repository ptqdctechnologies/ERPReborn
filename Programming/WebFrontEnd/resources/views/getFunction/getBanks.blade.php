<!-- GET BANK SECOND -->
<div id="myBanks" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
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
                                <table class="table table-head-fixed text-nowrap" id="tableBanks">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Full Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingBanks">
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
                                        <tr class="errorBanksMessageContainer">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorBanksMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorBanksMessageContainer").hide();

    function getBanks(person_refID, transactionType) {
        $('#tableBanks tbody').empty();
        $(".loadingBanks").show();
        $(".errorBanksMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getBank") !!}?person_refID=' + person_refID,
            success: function(data) {
                $(".loadingBanks").hide();

                var no = 1;
                var table = $('#tableBanks').DataTable();
                table.clear();

                $.each(data, function(key, val) {
                    keys += 1;
                    table.row.add([
                        '<input id="sys_id_banks' + keys + '" value="' + val.Bank_RefID + '" data-trigger="sys_id_banks" type="hidden">' + '<input id="sys_id_bank_account' + keys + '" value="' + person_refID + '" data-trigger="sys_id_bank_account" type="hidden">' + no++,
                        val.BankAcronym || '-',
                        val.BankName || '-',
                    ]).draw();
                });

                if (Array.isArray(data) && data.length === 1) {
                    $("#bank_name_second_id").val(data[0].Bank_RefID);
                    $("#bank_name_second_name").val(data[0].BankAcronym);
                    $("#bank_name_second_detail").val(`${data[0].BankAcronym} - ${data[0].BankName}`);

                    $("#bank_accounts_third").val(data[0].AccountNumber);
                    $("#bank_accounts_third_id").val(data[0].Sys_PID);
                    $("#bank_accounts_third_detail").val(data[0].AccountName);
                    
                    if (transactionType == "AdvanceRequest") {
                        $("#myBanksAccountTrigger").prop("disabled", false);
                        $("#bank_name_second_detail").css({"background-color":"#e9ecef"});
                        getBanksAccount(data[0].Bank_RefID, person_refID);
                    }
                } else {
                    $("#bank_accounts_third_popup").prop("disabled", true);
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableBanks tbody').empty();
                $(".loadingBanks").hide();
                $(".errorBanksMessageContainer").show();
                $("#errorBanksMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }
</script>