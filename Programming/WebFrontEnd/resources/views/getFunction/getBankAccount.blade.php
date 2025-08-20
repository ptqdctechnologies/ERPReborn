@if (request()->is('RevisionReimbursement') || request()->is('AdvanceRequest') || request()->is('Reimbursement'))
    <!-- DEFAULT MODAL -->
    <div id="myBankAccount" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable">
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
                                    <table class="table table-head-fixed text-nowrap" id="tableGetBankAccount">
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
                                            <tr class="loadingGetBankAccount">
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
                                            <tr class="errorMessageContainer">
                                                <td colspan="4" class="p-0" style="height: 22rem;">
                                                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                        <div id="errorMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;">
                                                            
                                                        </div>
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

        // HIT API
        function getBankAccountData(bank_RefID, person_RefID) {
            $('#tableGetBankAccount tbody').empty();
            $(".loadingGetBankAccount").show();
            $(".errorMessageContainer").hide();

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
                    $(".loadingGetBankAccount").hide();

                    var no = 1;
                    var tableBankAccount = $('#tableGetBankAccount').DataTable();
                        
                    tableBankAccount.clear();

                    if (Array.isArray(data) && data.length > 0) {
                        $.each(data, function(key, val) {
                            if (data.length === 1) {
                                $("#bank_accounts").val(val.accountNumber);
                                $("#bank_accounts_id").val(val.sys_ID);
                                $("#bank_accounts_detail").val(val.accountName);
                            }
                            
                            keys += 1;
                            tableBankAccount.row.add([
                                no++,
                                '<input id="sys_id_bank_account' + keys + '" value="' + val.sys_ID + '" type="hidden">' + val.bankAcronym || '-',
                                val.accountNumber || '-',
                                val.accountName || '-',
                            ]).draw();
                        });

                        $("#tableGetBankAccount_length").show();
                        $("#tableGetBankAccount_filter").show();
                        $("#tableGetBankAccount_info").show();
                        $("#tableGetBankAccount_paginate").show();
                    } else {
                        $(".errorMessageContainer").show();
                        $("#errorMessage").text(`Data not found.`);

                        $("#tableGetBankAccount_length").hide();
                        $("#tableGetBankAccount_filter").hide();
                        $("#tableGetBankAccount_info").hide();
                        $("#tableGetBankAccount_paginate").hide();
                    }
                },
                error: function (textStatus, errorThrown) {
                    $('#tableGetBankAccount tbody').empty();
                    $(".loadingGetBankAccount").hide();
                    $(".errorMessageContainer").show();
                    $("#errorMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
                }
            });
        }

        $('#tableGetBankAccount').on('click', 'tbody tr', function() {
            var sysID       = $(this).find('input[type="hidden"]').val();
            var bankName    = $(this).find('td:nth-child(2)').text();
            var bankAccount = $(this).find('td:nth-child(3)').text();
            var accountName = $(this).find('td:nth-child(4)').text();

            $("#bank_accounts").val(bankAccount);
            $("#bank_accounts_id").val(sysID);
            $("#bank_accounts_detail").val(accountName);

            $('#myBankAccount').modal('hide');
            adjustInputSize(document.getElementById("bank_accounts"));
        });

        // GET DATA KETIKA HALAMAN BERHASIL DI LOAD
        // $(window).one('load', function(e) {
        //     TAMPILKAN SEMUA DATA PADA DEFAULT MODAL
        //     getBankAccountData('','');
        // });
    </script>
@else
    <!-- DEFAULT MODAL -->
    <div id="myBankAccount" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable">
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
                                    <table class="table table-head-fixed text-nowrap" id="tableGetBankAccount">
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
                                            <tr class="loadingGetBankAccount">
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
                                            <tr class="errorMessageContainer">
                                                <td colspan="4" class="p-0" style="height: 22rem;">
                                                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                        <div id="errorMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;">
                                                            
                                                        </div>
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

    <!-- SECOND MODAL -->
    <div id="myBankAccountSecond" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable">
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
                                    <table class="table table-head-fixed text-nowrap" id="tableGetBankAccountSecond">
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
                                            <tr class="loadingGetBankAccountSecond">
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
                                            <tr class="errorMessageContainerSecond">
                                                <td colspan="4" class="p-0" style="height: 22rem;">
                                                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                        <div id="errorMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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

    <!-- THIRD MODAL -->
    <div id="myBankAccountThird" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable">
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
                                    <table class="table table-head-fixed text-nowrap" id="tableGetBankAccountThird">
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
                                            <tr class="loadingGetBankAccountThird">
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
                                            <tr class="errorMessageContainerThird">
                                                <td colspan="4" class="p-0" style="height: 22rem;">
                                                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                        <div id="errorMessageThird" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
        $(".errorMessageContainerThird").hide();

        // HIT API
        function getBankAccountData(bank_RefID, source, person_RefID) {
            if (source === "second_modal") {
                $('#tableGetBankAccountSecond tbody').empty();
                $(".loadingGetBankAccountSecond").show();
                $(".errorMessageContainerSecond").hide();
            } else if (source === "third_modal") {
                $('#tableGetBankAccountThird tbody').empty();
                $(".loadingGetBankAccountThird").show();
                $(".errorMessageContainerThird").hide();
            } else {
                $('#tableGetBankAccount tbody').empty();
                $(".loadingGetBankAccount").show();
                $(".errorMessageContainer").hide();
            }

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
                    if (source === "second_modal") {
                        $(".loadingGetBankAccountSecond").hide();

                        var no = 1;
                        var tableBankAccount = $('#tableGetBankAccountSecond').DataTable();
                        
                        tableBankAccount.clear();

                        if (Array.isArray(data) && data.length > 0) {
                            $.each(data, function(key, val) {
                                keys += 1;
                                tableBankAccount.row.add([
                                    no++,
                                    '<input id="sys_id_bank_account_second' + keys + '" value="' + val.sys_ID + '" type="hidden">' + val.bankAcronym || '-',
                                    val.accountNumber || '-',
                                    val.accountName || '-',
                                ]).draw();
                            });

                            $("#tableGetBankAccountSecond_length").show();
                            $("#tableGetBankAccountSecond_filter").show();
                            $("#tableGetBankAccountSecond_info").show();
                            $("#tableGetBankAccountSecond_paginate").show();
                        } else {
                            $(".errorMessageContainerSecond").show();
                            $("#errorMessageSecond").text(`Data not found.`);

                            $("#tableGetBankAccountSecond_length").hide();
                            $("#tableGetBankAccountSecond_filter").hide();
                            $("#tableGetBankAccountSecond_info").hide();
                            $("#tableGetBankAccountSecond_paginate").hide();
                        }
                    } else if (source === "third_modal") {
                        $(".loadingGetBankAccountThird").hide();

                        var no = 1;
                        var tableBankAccount = $('#tableGetBankAccountThird').DataTable();
                        
                        tableBankAccount.clear();

                        if (Array.isArray(data) && data.length > 0) {
                            $.each(data, function(key, val) {
                                keys += 1;
                                tableBankAccount.row.add([
                                    no++,
                                    '<input id="sys_id_bank_account_third' + keys + '" value="' + val.sys_ID + '" type="hidden">' + val.bankAcronym || '-',
                                    val.accountNumber || '-',
                                    val.accountName || '-',
                                ]).draw();
                            });

                            if (Array.isArray(data) && data.length === 1) {
                                $("#bank_accounts_third").val(data[0].accountNumber);
                                $("#bank_accounts_third_id").val(data[0].sys_PID);
                                $("#bank_accounts_third_detail").val(data[0].accountName);
                                adjustInputSize(document.getElementById("bank_accounts_third"), "string");
                            }

                            $("#tableGetBankAccountThird_length").show();
                            $("#tableGetBankAccountThird_filter").show();
                            $("#tableGetBankAccountThird_info").show();
                            $("#tableGetBankAccountThird_paginate").show();
                        } else {
                            $(".errorMessageContainerThird").show();
                            $("#errorMessageThird").text(`Data not found.`);

                            $("#tableGetBankAccountThird_length").hide();
                            $("#tableGetBankAccountThird_filter").hide();
                            $("#tableGetBankAccountThird_info").hide();
                            $("#tableGetBankAccountThird_paginate").hide();
                        }
                    } else {
                        $(".loadingGetBankAccount").hide();

                        var no = 1;
                        var tableBankAccount = $('#tableGetBankAccount').DataTable();
                        
                        tableBankAccount.clear();

                        if (Array.isArray(data) && data.length > 0) {
                            $.each(data, function(key, val) {
                                keys += 1;
                                tableBankAccount.row.add([
                                    no++,
                                    '<input id="sys_id_bank_account' + keys + '" value="' + val.sys_ID + '" type="hidden">' + val.bankAcronym || '-',
                                    val.accountNumber || '-',
                                    val.accountName || '-',
                                ]).draw();
                            });

                            $("#tableGetBankAccount_length").show();
                            $("#tableGetBankAccount_filter").show();
                            $("#tableGetBankAccount_info").show();
                            $("#tableGetBankAccount_paginate").show();
                        } else {
                            $(".errorMessageContainer").show();
                            $("#errorMessage").text(`Data not found.`);

                            $("#tableGetBankAccount_length").hide();
                            $("#tableGetBankAccount_filter").hide();
                            $("#tableGetBankAccount_info").hide();
                            $("#tableGetBankAccount_paginate").hide();
                        }
                    }
                },
                error: function (textStatus, errorThrown) {
                    if (source === "second_modal") {
                        $('#tableGetBankAccountSecond tbody').empty();
                        $(".loadingGetBankAccountSecond").hide();
                        $(".errorMessageContainerSecond").show();
                        $("#errorMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
                    } else if (source === "third_modal") {
                        $('#tableGetBankAccountThird tbody').empty();
                        $(".loadingGetBankAccountThird").hide();
                        $(".errorMessageContainerThird").show();
                        $("#errorMessageThird").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
                    } else {
                        $('#tableGetBankAccount tbody').empty();
                        $(".loadingGetBankAccount").hide();
                        $(".errorMessageContainer").show();
                        $("#errorMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
                    }
                }
            });
        }

        $('#tableGetBankAccount').on('click', 'tbody tr', function() {
            var sysID       = $(this).find('input[type="hidden"]').val();
            var bankName    = $(this).find('td:nth-child(2)').text();
            var bankAccount = $(this).find('td:nth-child(3)').text();
            var accountName = $(this).find('td:nth-child(4)').text();

            $("#bank_accounts").val(bankAccount);
            $("#bank_accounts_id").val(sysID);
            $("#bank_accounts_detail").val(accountName);

            $('#myBankAccount').modal('hide');
            adjustInputSize(document.getElementById("bank_accounts"));
        });

        $('#tableGetBankAccountSecond').on('click', 'tbody tr', function() {
            var sysID       = $(this).find('input[type="hidden"]').val();
            var bankName    = $(this).find('td:nth-child(2)').text();
            var bankAccount = $(this).find('td:nth-child(3)').text();
            var accountName = $(this).find('td:nth-child(4)').text();

            $('#bank_accounts_second').val(bankAccount);
            $('#bank_accounts_id_second').val(sysID);
            $('#bank_accounts_detail_second').val(accountName);

            $('#myBankAccountSecond').modal('hide');
            adjustInputSize(document.getElementById("bank_accounts_second"));
        });

        $('#tableGetBankAccountThird').on('click', 'tbody tr', function() {
            var sysID       = $(this).find('input[type="hidden"]').val();
            var bankName    = $(this).find('td:nth-child(2)').text();
            var bankAccount = $(this).find('td:nth-child(3)').text();
            var accountName = $(this).find('td:nth-child(4)').text();

            $('#bank_accounts_third').val(bankAccount);
            $('#bank_accounts_third_id').val(sysID);
            $('#bank_accounts_third_detail').val(accountName);

            $('#myBankAccountThird').modal('hide');
            adjustInputSize(document.getElementById("bank_accounts_third"));
        });

        // GET DATA KETIKA HALAMAN BERHASIL DI LOAD
        $(window).one('load', function(e) {
            // TAMPILKAN SEMUA DATA PADA DEFAULT MODAL
            getBankAccountData('','');

            // TAMPILKAN SEMUA DATA PADA SECOND MODAL
            getBankAccountData('','second_modal');

            // TAMPILKAN SEMUA DATA PADA THIRD MODAL
            getBankAccountData('','third_modal');
        });
    </script>
@endif
