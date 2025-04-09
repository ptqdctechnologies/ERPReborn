<script>
    var sourceData = document.getElementById('sourceData');

    if (sourceData.value == 1) {
        $(".ShowDocumentList").show();
        $(".InternalNotes").show();
        $(".FileAttachment").show();
        $(".ApprovalHistory").show();
        $(".ViewDocument").hide();
        $(".DocumentWorkflow").hide();
    } else {
        $(".ShowDocumentList").hide();
        $(".InternalNotes").hide();
        $(".FileAttachment").hide();
        $(".ApprovalHistory").hide();
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
                let result = [];

                if (DocumentTypeName === "Delivery Order Form") {
                    result = [
                        {
                            CombinedBudgetCode: "Q000062",
                            CombinedBudgetName: "XL Microcell 2007",
                            CombinedBudgetSectionCode: "Q000062 ► 235",
                            CombinedBudgetSectionName: "Q000062 ► Ampang Kuranji - Padang",
                            DocumentNumber: "DO/QDC/2025/000029",
                            Sys_ID: 180000000000038
                        },
                        {
                            CombinedBudgetCode: "Q000062",
                            CombinedBudgetName: "XL Microcell 2007",
                            CombinedBudgetSectionCode: "Q000062 ► 235",
                            CombinedBudgetSectionName: "Q000062 ► Ampang Kuranji - Padang",
                            DocumentNumber: "DO/QDC/2025/000028",
                            Sys_ID: 180000000000037
                        },
                        {
                            CombinedBudgetCode: "Q000062",
                            CombinedBudgetName: "XL Microcell 2007",
                            CombinedBudgetSectionCode: "Q000062 ► 235",
                            CombinedBudgetSectionName: "Q000062 ► Ampang Kuranji - Padang",
                            DocumentNumber: "DO/QDC/2025/000027",
                            Sys_ID: 180000000000036
                        },
                    ];
                } else {
                    result = data.data;
                }
                
                $(".loadingGetCheckDocument").hide();

                var no = 1;
                var table = $('#TableCheckDocument').DataTable();
                table.clear();

                if (Array.isArray(result) && result.length > 0) {
                    $.each(result, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_check_document' + keys + '" value="' + val.Sys_ID + '" data-trigger="sys_id_check_document" type="hidden">' + no++,
                            '<input id="sys_document_type_name' + keys + '" value="' + DocumentTypeName + '" data-trigger="sys_document_type_name" type="hidden">' + val.DocumentNumber || '-',
                            val.CombinedBudgetCode || '-',
                            val.CombinedBudgetSectionCode || '-',
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
                        $('#DocumentType').append('<option value="' + document.Sys_ID + '" data-name="' + document.Name + '">' + document.Name + '</option>');
                    });
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

    $('#TableCheckDocument').on('click', 'tbody tr', function() {
        var sysId       = $(this).find('input[data-trigger="sys_id_check_document"]').val();
        var docTypeName = $(this).find('input[data-trigger="sys_document_type_name"]').val();
        var trano       = $(this).find('td:nth-child(2)').text();

        $("#businessDocument_RefID").val(sysId);
        $("#businessDocumentType_Name").val(docTypeName);
        $("#businessDocumentNumber").val(trano);

        $('#mySearchCheckDocument').modal('hide');
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