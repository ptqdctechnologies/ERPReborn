<script>
    var sourceData = document.getElementById('sourceData');

    if (sourceData.value == 1) {
        $(".ShowDocumentList").show();
        // $(".InternalNotes").show();
        // $(".FileAttachment").show();
        // $(".ApprovalHistory").show();
        $(".ViewDocument").hide();
        $(".DocumentWorkflow").hide();
    } else {
        // $(".ShowDocumentList").hide();
        // $(".InternalNotes").hide();
        // $(".FileAttachment").hide();
        // $(".ApprovalHistory").hide();
    }

    function backButton() {
        // ShowLoading();
        window.location.href = '/CheckDocument?var=1';
    }

    function showLoading() {
        ShowLoading();
    }

    function getListDocumentType(params) {
        var keys                = 0;
        var DocumentTypeID      = params.value;
        var selectedOption      = $(params).find('option:selected');
        var DocumentTypeName    = selectedOption.data('name');

        $('#TableCheckDocument tbody').empty();
        $(".loadingGetCheckDocument").show();
        $(".errorModalCheckDocumentMessageContainerSecond").hide();
        $("#TableCheckDocument_length").hide();
        $("#TableCheckDocument_filter").hide();
        $("#TableCheckDocument_info").hide();
        $("#TableCheckDocument_paginate").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("CheckDocument.ShowDocumentListData") !!}?DocumentTypeID=' + DocumentTypeID + '&DocumentTypeName=' + DocumentTypeName,
            success: function(data) {
                $(".loadingGetCheckDocument").hide();

                var no = 1;
                var table = $('#TableCheckDocument').DataTable();
                table.clear();

                if (Array.isArray(data.data) && data.data.length > 0) {
                    $.each(data.data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_check_document' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_check_document" type="hidden">' + no++,
                            '<input id="sys_document_type_name' + keys + '" value="' + DocumentTypeName + '" data-trigger="sys_document_type_name" type="hidden">' + val.sys_Text || '-',
                            '<input id="sys_id_combined_budget' + keys + '" value="' + params.value + '" data-trigger="sys_id_combined_budget" type="hidden">' + val.combinedBudgetCode || '-',
                            '<input id="sys_id_document_type' + keys + '" value="' + val.combinedBudget_RefID + '" data-trigger="sys_id_document_type" type="hidden">' + val.combinedBudgetSectionCode || '-',
                        ]).draw();
                    });

                    $("#TableCheckDocument_length").show();
                    $("#TableCheckDocument_filter").show();
                    $("#TableCheckDocument_info").show();
                    $("#TableCheckDocument_paginate").show();
                } else {
                    $(".errorModalCheckDocumentMessageContainerSecond").show();
                    $("#errorModalCheckDocumentMessageSecond").text(`Data not found.`);

                    $("#TableCheckDocument_length").hide();
                    $("#TableCheckDocument_filter").hide();
                    $("#TableCheckDocument_info").hide();
                    $("#TableCheckDocument_paginate").hide();
                }
            },
            error: function(textStatus, errorThrown) {
                $('#TableCheckDocument tbody').empty();
                $(".loadingGetCheckDocument").hide();
                $(".errorModalCheckDocumentMessageContainerSecond").show();
                $("#errorModalCheckDocumentMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    function getDocumentType() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getDocumentType") !!}',
            success: function(data) {
                if (data && Array.isArray(data)) {
                    $('#DocumentType').empty();
                    $('#DocumentType').append('<option disabled selected>Select a Project Code</option>');

                    data.forEach(function(document) {
                        $('#DocumentType').append('<option value="' + document.sys_ID + '" data-name="' + document.name + '">' + document.name + '</option>');
                    });

                    $('#DocumentType').append('<option value="' + 73910456 + '" data-name="Account Payable">Account Payable</option>');
                    $('#DocumentType').append('<option value="' + 78123456 + '" data-name="DO From Internal Use">DO From Internal Use</option>');
                    $('#DocumentType').append('<option value="' + 67812345 + '" data-name="DO From Stock Movement">DO From Stock Movement</option>');
                    $('#DocumentType').append('<option value="' + 34567812 + '" data-name="Loan Form">Loan Form</option>');
                    $('#DocumentType').append('<option value="' + 45678123 + '" data-name="Loan Settlement Form">Loan Settlement Form</option>');
                    $('#DocumentType').append('<option value="' + 56781234 + '" data-name="Modify Budget Form">Modify Budget Form</option>');
                    $('#DocumentType').append('<option value="' + 12345678 + '" data-name="Sallary Allocation Form">Sallary Allocation Form</option>');
                } else {
                    console.log('Data document type not found.');
                }
            },
            error: function(response) {
                console.log('error: ', response);
                
                ErrorNotif("Error getDocumentType!");
            }
        });
    }

    $('#TableCheckDocument').on('click', 'tbody tr', async function() {
        var sysId               = $(this).find('input[data-trigger="sys_id_check_document"]').val();
        var docTypeName         = $(this).find('input[data-trigger="sys_document_type_name"]').val();
        var trano               = $(this).find('td:nth-child(2)').text();
        var sysIdCombinedBudget = $(this).find('input[data-trigger="sys_id_combined_budget"]').val();
        var sysIdDocumentType   = $(this).find('input[data-trigger="sys_id_document_type"]').val();

        $('#mySearchCheckDocument').modal('hide');

        if (sysIdDocumentType != "null" && sysIdCombinedBudget != "null") {
            $('#loadingDocTracking').show();
            $('.mySearchCheckDocument').hide();
            $("#businessDocument_RefID").val("");
            $("#businessDocumentType_Name").val("");
            $("#businessDocumentNumber").val("");

            const validate = await checkingWorkflow(sysIdDocumentType, sysIdCombinedBudget);
            if (!validate) {
                $('.mySearchCheckDocument').show();
                $('#loadingDocTracking').hide();

                $("#businessDocument_RefID").val(sysId);
                $("#businessDocumentType_Name").val(docTypeName);
                $("#businessDocumentNumber").val(trano);
            } else {
                $('.mySearchCheckDocument').show();
                $('#loadingDocTracking').hide();
            }
        } else {
            $("#businessDocument_RefID").val(sysId);
            $("#businessDocumentType_Name").val(docTypeName);
            $("#businessDocumentNumber").val(trano);
        }
    });

    $('.ViewDocument').on('click', function() {
        $(".DocumentWorkflow").hide();
        $(".ShowDocumentList").show();
        $(".InternalNotes").show();
        $(".FileAttachment").show();
        $(".ApprovalHistory").show();
        $(".ViewDocument").hide();
    });

    $(window).one('load', function(e) {
        $(".loadingGetCheckDocument").hide();
        $(".errorModalCheckDocumentMessageContainerSecond").hide();

        getDocumentType();
    });
</script>