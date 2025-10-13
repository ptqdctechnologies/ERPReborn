<div id="myBeneficiaries" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
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
                                <table class="table table-head-fixed text-nowrap" id="tableBeneficiaries">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingBeneficiaries">
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
                                        <tr class="errorBeneficiariesMessageContainer">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorBeneficiariesMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorBeneficiariesMessageContainer").hide();

    function getBeneficiaries() {
        $('#tableBeneficiaries tbody').empty();
        $(".loadingBeneficiaries").show();
        $(".errorBeneficiariesMessageContainer").hide();

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
                $(".loadingBeneficiaries").hide();

                var no = 1;
                var table = $('#tableBeneficiaries').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_beneficiaries' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_beneficiaries" type="hidden">' + '<input id="person_ref_id_beneficiaries' + keys + '" value="' + val.person_RefID + '" data-trigger="person_ref_id_beneficiaries" type="hidden">' + no++,
                            val.personName || '-',
                            val.organizationalJobPositionName || '-',
                        ]).draw();
                    });

                    $("#tableBeneficiaries_length").show();
                    $("#tableBeneficiaries_filter").show();
                    $("#tableBeneficiaries_info").show();
                    $("#tableBeneficiaries_paginate").show();
                } else {
                    $('#tableBeneficiaries tbody').empty();

                    $(".errorBeneficiariesMessageContainer").show();
                    $("#errorBeneficiariesMessage").text(`Data not found.`);

                    $("#tableBeneficiaries_length").hide();
                    $("#tableBeneficiaries_filter").hide();
                    $("#tableBeneficiaries_info").hide();
                    $("#tableBeneficiaries_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableBeneficiaries tbody').empty();
                $(".loadingBeneficiaries").hide();
                $(".errorBeneficiariesMessageContainer").show();
                $("#errorBeneficiariesMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getBeneficiaries();
    });
</script>