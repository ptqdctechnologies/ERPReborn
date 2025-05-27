@if (request()->is('BusinessTripRequest') || request()->is('ReportBusinessTripRequestSummary') || request()->is('ReportBusinessTripSettlementSummary') || request()->is('ReportAdvanceSettlementSummary') || request()->is('AdvanceRequest'))
    <!-- BENEFICIARY SECOND (MODIFIED) -->
    <div id="myBeneficiarySecond" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="card-title">Select Beneficiary</label>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive p-0" style="height: 400px;">
                                    <table class="table table-head-fixed text-nowrap" id="tableGetBeneficiarySecond">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tfoot>
                                            <tr class="loadingGetBeneficiarySecond">
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
                                            <tr class="errorBeneficiaryMessageContainerSecond">
                                                <td colspan="4" class="p-0" style="height: 22rem;">
                                                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                        <div id="errorBeneficiaryMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
        $(".errorBeneficiaryMessageContainerSecond").hide();

        function getBeneficiary() {
            $('#tableGetBeneficiarySecond tbody').empty();
            $(".loadingGetBeneficiarySecond").show();
            $(".errorBeneficiaryMessageContainerSecond").hide();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var keys = 0;
            $.ajax({
                type: 'GET',
                url: '{!! route("getWorker") !!}',
                success: function(data) {
                    $(".loadingGetBeneficiarySecond").hide();

                    var no = 1;
                    var table = $('#tableGetBeneficiarySecond').DataTable();
                    table.clear();

                    if (Array.isArray(data) && data.length > 0) {
                        $.each(data, function(key, val) {
                            keys += 1;
                            table.row.add([
                                '<input id="sys_id_beneficiary_second' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_beneficiary_second" type="hidden">' + '<input id="person_ref_id_beneficiary_second' + keys + '" value="' + val.person_RefID + '" data-trigger="person_ref_id_beneficiary_second" type="hidden">' + no++,
                                val.personName || '-',
                                val.organizationalJobPositionName || '-',
                            ]).draw();
                        });

                        $("#tableGetBeneficiarySecond_length").show();
                        $("#tableGetBeneficiarySecond_filter").show();
                        $("#tableGetBeneficiarySecond_info").show();
                        $("#tableGetBeneficiarySecond_paginate").show();
                    } else {
                        $('#tableGetBeneficiarySecond tbody').empty();

                        $(".errorBeneficiaryMessageContainerSecond").show();
                        $("#errorBeneficiaryMessageSecond").text(`Data not found.`);

                        $("#tableGetBeneficiarySecond_length").hide();
                        $("#tableGetBeneficiarySecond_filter").hide();
                        $("#tableGetBeneficiarySecond_info").hide();
                        $("#tableGetBeneficiarySecond_paginate").hide();
                    }
                },
                error: function (textStatus, errorThrown) {
                    $('#tableGetBeneficiarySecond tbody').empty();
                    $(".loadingGetBeneficiarySecond").hide();
                    $(".errorBeneficiaryMessageContainerSecond").show();
                    $("#errorBeneficiaryMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
                }
            });
        }

        $(window).one('load', function(e) {
            getBeneficiary();
        });

        $('#tableGetBeneficiarySecond').on('click', 'tbody tr', function() {
            var sysId           = $(this).find('input[data-trigger="sys_id_beneficiary_second"]').val();
            var personRefId     = $(this).find('input[data-trigger="person_ref_id_beneficiary_second"]').val();
            var personName      = $(this).find('td:nth-child(2)').text();
            var personPosition  = $(this).find('td:nth-child(3)').text();

            $("#beneficiary_second_id").val(sysId);
            $("#beneficiary_second_person_ref_id").val(personRefId);
            $("#beneficiary_second_person_name").val(personName);
            $("#beneficiary_second_person_position").val(personPosition);

            // adjustInputSize(document.getElementById("beneficiary_second_person_position"), "string");

            $('#myBeneficiarySecond').modal('hide');
        });
    </script>
@else 
    <!-- BENEFICIARY DEFAULT -->
    <div id="myBeneficiary" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="card-title">Select Beneficiary</label>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive p-0" style="height: 425px;">
                                    <table class="table table-head-fixed text-nowrap" id="tableGetBeneficiary">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Position</th>
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
        $(function() {
            $('.myBeneficiary').one('click', function(e) {
                e.preventDefault();
                // ShowLoading();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var keys = 0;
                
                $.ajax({
                    type: 'GET',
                    url: '{!! route("getWorker") !!}',
                    success: function(data) {
                        var no = 1;
                        var t = $('#tableGetBeneficiary').DataTable();
                        t.clear();
                        $.each(data, function(key, val) {
                            keys += 1;
                            t.row.add([
                                '<tbody><tr><input id="sys_id_beneficiary' + keys + '" value="' + val.sys_ID + '" type="hidden"><input id="person_refID' + keys + '" value="' + val.person_RefID + '" type="hidden"><td>' + no++ + '</td>',
                                '<td>' + val.personName + '</td>',
                                '<td>' + val.organizationalJobPositionName + '</td></tr></tbody>',
                            ]).draw();
                        });

                        // HideLoading();
                    }
                });
            });
        });
    </script>

    <script>
        $('#tableGetBeneficiary tbody').on('click', 'tr', function() {

            $("#myBeneficiary").modal('toggle');

            var row = $(this).closest("tr");  
            var id = row.find("td:nth-child(1)").text();  
            var sys_id_beneficiary = $('#sys_id_beneficiary' + id).val();
            var person_refID = $('#person_refID' + id).val();
            var name = row.find("td:nth-child(2)").text();
            var position = row.find("td:nth-child(3)").text();

            $("#beneficiary_id").val(sys_id_beneficiary);
            $("#beneficiary").val(name);
            $("#beneficiary_detail").val(position);

            adjustInputSize(document.getElementById("beneficiary_detail"), "string");

            $("#person_refID").val(person_refID);

            $("#bank_code").val("");
            $("#bank_name").val("");
            $("#bank_name_detail").val("");
            $("#bank_account").val("");
            $("#bank_account_detail").val("");

            $('#tableGetBank').find('tbody').empty();
            $('#tableGetEntityBankAccount').find('tbody').empty();

            $("#bank_name_popup").prop("disabled", false);

            MandatoryFormFunctionFalse("#beneficiary", "#beneficiary_detail");


            $.ajax({
                type: 'GET',
                url: '{!! route("getBank") !!}?person_refID=' + person_refID,
                success: function(data) {

                    if(data.length == 1){

                        $("#bank_code").val(data[0].Bank_RefID);
                        $("#bank_name").val(data[0].BankAcronym);
                        $("#bank_name_detail").val(data[0].BankName);

                        adjustInputSize(document.getElementById("bank_name"), "string");

                        MandatoryFormFunctionFalse("#bank_name", "#bank_name_detail");

                        $.ajax({
                            type: 'GET',
                            url: '{!! route("getEntityBankAccount") !!}?person_refID=' + person_refID + '&Bank_RefID=' + data[0].Bank_RefID,
                            success: function(data) {

                                if(data.length == 1){
                                    $("#bank_account_id").val(data[0].Sys_ID);
                                    $("#bank_account").val(data[0].AccountNumber);
                                    $("#bank_account_detail").val(data[0].AccountName);

                                    adjustInputSize(document.getElementById("bank_account"), "string");
                                    
                                    MandatoryFormFunctionFalse("#bank_account", "#bank_account_detail");
                                }

                            }
                        });
                    }
                        
                }
            });

        });
    </script>
@endif