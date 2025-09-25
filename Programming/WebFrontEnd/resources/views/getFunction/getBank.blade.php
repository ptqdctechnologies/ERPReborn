@if (request()->is('Loan') ||request()->is('RevisionReimbursement') || request()->is('Reimbursement') || request()->is('BusinessTripRequest') || request()->is('AdvanceRequest'))
    <!-- GET BANK SECOND -->
    <div id="myGetBankSecond" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
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
                                    <table class="table table-head-fixed text-nowrap" id="tableGetBankSecond">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Full Name</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tfoot>
                                            <tr class="loadingGetBankSecond">
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
                                            <tr class="errorBankMessageContainerSecond">
                                                <td colspan="4" class="p-0" style="height: 22rem;">
                                                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                        <div id="errorBankMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
        let currentURL = window.location.href;
        $(".errorBankMessageContainerSecond").hide();

        function getBankSecond(person_refID) {
            $('#tableGetBankSecond tbody').empty();
            $(".loadingGetBankSecond").show();
            $(".errorBankMessageContainerSecond").hide();

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
                    $(".loadingGetBankSecond").hide();

                    var no = 1;
                    var table = $('#tableGetBankSecond').DataTable();
                    table.clear();

                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_bank_second' + keys + '" value="' + val.Bank_RefID + '" data-trigger="sys_id_bank_second" type="hidden">' + '<input id="sys_id_bank_account_second' + keys + '" value="' + val.Bank_RefID + '" data-trigger="sys_id_bank_account_second" type="hidden">' + no++,
                            val.BankAcronym || '-',
                            val.BankName || '-',
                        ]).draw();
                    });

                    if (Array.isArray(data) && data.length === 1) {
                        $("#bank_name_second_id").val(data[0].Bank_RefID);
                        $("#bank_name_second_name").val(data[0].BankAcronym);
                        $("#bank_name_second_detail").val(data[0].BankName);
                        adjustInputSize(document.getElementById("bank_name_second_name"), "string");

                        $("#bank_accounts_third").val(data[0].AccountNumber);
                        $("#bank_accounts_third_id").val(data[0].Sys_PID);
                        $("#bank_accounts_third_detail").val(data[0].AccountName);

                        if (!currentURL.includes("AdvanceRequest") && !currentURL.includes("Reimbursement")) {
                            adjustInputSize(document.getElementById("bank_accounts_third"), "string");
                        }

                        if (currentURL.includes("AdvanceRequest") || currentURL.includes("Reimbursement")) {
                            getBankAccountData(data[0].Bank_RefID, person_refID);
                        } else {
                            getBankAccountData(data[0].Bank_RefID, "third_modal", person_refID);
                        }
                    } else {
                        $("#bank_accounts_third_popup").prop("disabled", true);
                    }
                },
                error: function (textStatus, errorThrown) {
                    $('#tableGetBankSecond tbody').empty();
                    $(".loadingGetBankSecond").hide();
                    $(".errorBankMessageContainerSecond").show();
                    $("#errorBankMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
                }
            });
        }

        $('#tableGetBankSecond').on('click', 'tbody tr', function() {
            var sysId       = $(this).find('input[data-trigger="sys_id_bank_second"]').val();
            var bankAcronym = $(this).find('td:nth-child(2)').text();
            var bankName    = $(this).find('td:nth-child(3)').text();

            $("#bank_name_second_id").val(sysId);
            $("#bank_name_second_name").val(bankAcronym);
            $("#bank_name_second_detail").val(bankName);

            adjustInputSize(document.getElementById("bank_name_second_name"), "string");

            $('#myGetBankSecond').modal('hide');
        });
    </script>
@else
    <!-- GET BANK DEFAULT -->
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

                var person_refID = $("#person_refID").val();

                var keys = 0;

                $.ajax({
                    type: 'GET',
                    url: '{!! route("getBank") !!}?person_refID=' + person_refID,
                    success: function(data) {
                        var no = 1;
                        t = $('#tableGetBank').DataTable();
                        t.clear();
                        $.each(data, function(key, val) {
                            keys += 1;
                            t.row.add([

                                '<tbody><tr><input id="sys_id_bank' + keys + '" value="' + val.Bank_RefID + '" type="hidden"><td>' + no++ + '</td>',
                                '<td>' + val.BankAcronym + '</td>',
                                '<td>' + val.BankName + '</td></span></tr></tbody>'

                            ]).draw();

                        });
                    }
                });

                MandatoryFormFunctionFalse("#bank_name", "#bank_name_detail");

            });

        });
    </script>
@endif