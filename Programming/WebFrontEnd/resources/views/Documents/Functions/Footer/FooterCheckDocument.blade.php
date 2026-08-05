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
        let DocumentTypeID = params.value;
        let selectedOption = $(params).find('option:selected');
        let DocumentTypeName = selectedOption.data('name');

        let table = $('#TableCheckDocument').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            info: true,
            paging: true,
            searching: true,
            lengthChange: true,
            pageLength: 10,
            ajax: {
                url: '{!! route("CheckDocument.ShowDocumentListData") !!}',
                type: 'GET',
                data: function (d) {
                    d.DocumentTypeID = DocumentTypeID;
                    d.DocumentTypeName = DocumentTypeName;

                    return d;
                },
                beforeSend: function () {
                    $('#TableCheckDocument tbody').empty();
                    $(".loadingGetCheckDocument").show();
                    $(".errorModalCheckDocumentMessageContainerSecond").hide();
                    $("#TableCheckDocument_length").hide();
                    $("#TableCheckDocument_filter").hide();
                    $("#TableCheckDocument_info").hide();
                    $("#TableCheckDocument_paginate").hide();
                },
                complete: function () {
                    $(".loadingGetCheckDocument").hide();
                    $("#TableCheckDocument_length").show();
                    $("#TableCheckDocument_filter").show();
                    $("#TableCheckDocument_info").show();
                    $("#TableCheckDocument_paginate").show();
                },
                error: function (xhr, error, thrown) {
                    $("#loadingGetCheckDocument").hide();
                }
            },
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return (
                            '<input id="sys_id_check_document' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_check_document" type="hidden">' +
                            '<input id="sys_document_type_name' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + DocumentTypeName + '" data-trigger="sys_document_type_name" type="hidden">' +
                            '<input id="sys_id_combined_budget' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + params.value + '" data-trigger="sys_id_combined_budget" type="hidden">' +
                            '<input id="sys_id_document_type' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.additionalData.combinedBudget_RefID + '" data-trigger="sys_id_document_type" type="hidden">' +
                            (meta.row + meta.settings._iDisplayStart + 1)
                        )
                    }
                },
                {
                    data: 'sys_Text',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-nowrap text-center",
                    render: function (data, type, row, meta) {
                        return `${data.additionalData.combinedBudgetCode || '-'}`
                        // return `${data.additionalData.combinedBudgetCode} - ${data.additionalData.combinedBudgetName}`
                    }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-nowrap text-center",
                    render: function (data, type, row, meta) {
                        return `${data.additionalData.combinedBudgetSectionCode || '-'}`
                        // return `${data.additionalData.combinedBudgetSectionCode} - ${data.additionalData.combinedBudgetSectionName}`
                    }
                }
            ],
            initComplete: function () {
                let api = this.api();

                let $filter = $('#TableCheckDocument_filter');
                let $searchLabel = $filter.find('label');
                let $searchInput = $filter.find('input');

                $searchLabel.css('margin-bottom', '0');
                $searchInput
                    .attr('placeholder', 'Search...')
                    .off('.DT')
                    .on('keypress', function (e) {
                        if (e.which === 13) {
                            api.search(this.value).draw();
                        }
                    });

                if ($('#searchHintDocument').length === 0) {
                    $filter.append(
                        '<small id="searchHintDocument" class="form-text text-muted" style="margin-bottom: .5rem;">' +
                        'Press <strong>Enter</strong> to start searching.' +
                        '</small>'
                    );
                }

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
            success: function (data) {
                if (data && Array.isArray(data)) {
                    $('#DocumentType').empty();
                    $('#DocumentType').append('<option disabled selected>Select a Project Code</option>');

                    data.forEach(function (document) {
                        $('#DocumentType').append('<option value="' + document.sys_ID + '" data-name="' + document.name + '">' + document.name + '</option>');
                    });

                    $('#DocumentType').append('<option value="' + 67812345 + '" data-name="General Journal Form">General Journal Form</option>');
                    // $('#DocumentType').append('<option value="' + 34567812 + '" data-name="Loan Form">Loan Form</option>');
                    // $('#DocumentType').append('<option value="' + 45678123 + '" data-name="Loan Settlement Form">Loan Settlement Form</option>');
                    // $('#DocumentType').append('<option value="' + 56781234 + '" data-name="Modify Budget Form">Modify Budget Form</option>');
                    // $('#DocumentType').append('<option value="' + 78912345 + '" data-name="Product Form">Product Form</option>');
                    $('#DocumentType').append('<option value="' + 12345678 + '" data-name="Sallary Allocation Form">Sallary Allocation Form</option>');
                    $('#DocumentType').append('<option value="' + 23456781 + '" data-name="Supplier Form">Supplier Form</option>');
                    $('#DocumentType').append('<option value="' + 23456781 + '" data-name="Tax Recon Form">Tax Recon Form</option>');
                } else {
                    console.log('Data document type not found.');
                }
            },
            error: function (response) {
                console.log('error: ', response);

                ErrorNotif("Error getDocumentType!");
            }
        });
    }

    $('#TableCheckDocument').on('click', 'tbody tr', async function () {
        var sysId = $(this).find('input[data-trigger="sys_id_check_document"]').val();
        var docTypeName = $(this).find('input[data-trigger="sys_document_type_name"]').val();
        var trano = $(this).find('td:nth-child(2)').text();
        var sysIdCombinedBudget = $(this).find('input[data-trigger="sys_id_combined_budget"]').val();
        var sysIdDocumentType = $(this).find('input[data-trigger="sys_id_document_type"]').val();

        $('#mySearchCheckDocument').modal('hide');

        if (sysIdDocumentType != "null" && sysIdCombinedBudget != "null") {
            // $('#loadingDocTracking').show();
            // $('.mySearchCheckDocument').hide();
            $("#businessDocument_RefID").val("");
            $("#businessDocumentType_Name").val("");
            $("#businessDocumentNumber").val("");

            // const validate = await checkingWorkflow(sysIdDocumentType, sysIdCombinedBudget);
            // if (validate) {
            $('.mySearchCheckDocument').show();
            $('#loadingDocTracking').hide();

            $("#businessDocument_RefID").val(sysId);
            $("#businessDocumentType_Name").val(docTypeName);
            $("#businessDocumentNumber").val(trano);
            // } else {
            //     $('.mySearchCheckDocument').show();
            //     $('#loadingDocTracking').hide();
            // }
        } else {
            $("#businessDocument_RefID").val(sysId);
            $("#businessDocumentType_Name").val(docTypeName);
            $("#businessDocumentNumber").val(trano);
        }
    });

    $('.ViewDocument').on('click', function () {
        $(".DocumentWorkflow").hide();
        $(".ShowDocumentList").show();
        $(".InternalNotes").show();
        $(".FileAttachment").show();
        $(".ApprovalHistory").show();
        $(".ViewDocument").hide();
    });

    $(document).ready(function () {
        $(".loadingGetCheckDocument").hide();
        $(".errorModalCheckDocumentMessageContainerSecond").hide();

        getDocumentType();
    });
</script>