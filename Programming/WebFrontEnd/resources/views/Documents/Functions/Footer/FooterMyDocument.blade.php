<script>
    $(".errorMessageMyDocumentContainer").hide();    

    // SELECT FOR FILTER BY BUDGET
    $('#tableGetProject tbody').on('click', 'tr', function() {
        $("#myProject").modal('toggle');
        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_budget' + id).val();
        var code = row.find("td:nth-child(2)").text();
        $("#projectid").val(sys_id);
        $("#projectcode").val(code);
    });

    // SELECT FOR FILTER BY DOCUMENT TYPE
    function optionDocumentType() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getDocumentType") !!}',
            success: function(data) {
                $(".DocumentType").empty();

                var option = "<option value='" + '' + "'>" + 'Select Document Type' + "</option>";
                $(".DocumentType").append(option);

                var len = data.length;
                for (var i = 0; i < len; i++) {
                    var ids = data[i].Sys_ID;
                    var names = data[i].Name;
                    var option2 = "<option value='" + ids + "'>" + names + "</option>";
                    $(".DocumentType").append(option2);
                }
            }
        });
    }

    // MY DOCUMENT SHOW DATA TABLE
    function successDataMyDocument(data) {
        $('#TableMyDocument').find('tbody').empty();
        $(".loadingGetMyDocument").hide();
        
        var keys = 0;
        var no = 1;
        var tableMyDocument = $('.TableMyDocument').DataTable();
        tableMyDocument.clear();

        $.each(data, function(key, val) {
            const dateMyDocument = dateFns.format(dateFns.parse(val.entities.businessDocumentDateTimeTZ, "yyyy-MM-dd hh:mm:ss"), 'DD-MM-YYYY HH:mm');
            const statusMyDocument = val.entities.previousWorkFlowPathActionName == "Rejection To Resubmit" ? "Reject" : val.entities.previousWorkFlowPathActionName;
            const workFlowPathSubmitterRemarks = val.entities.workFlowPathSubmitterRemarks == "undefined" || !val.entities.workFlowPathSubmitterRemarks ? '-' : val.entities.workFlowPathSubmitterRemarks;

            keys += 1;
            tableMyDocument.row.add([
                no++,
                `<form method="POST" action="{{ route('CheckDocument.ShowDocumentByID') }}" style="display:inline;">
                    @csrf
                    <input type="hidden" name="formDocumentNumber_RefID" value="${val.entities.formDocumentNumber_RefID}">
                    <input type="hidden" name="businessDocumentTypeName" value="${val.entities.businessDocumentTypeName}">
                    <input type="hidden" name="businessDocument_RefID" value="${val.entities.businessDocument_RefID}">
                    <a href="javascript:;" onclick="ShowLoading(); this.closest('form').submit();" style="color: blue; text-decoration: underline; cursor: pointer;">${val.entities.businessDocumentNumber}</a>
                </form>`,
                val.entities.combinedBudgetCode[0],
                val.entities.previousWorkFlowPathApproverName || '-',
                dateMyDocument,
                statusMyDocument,
                '<div style="text-wrap: wrap;">' + workFlowPathSubmitterRemarks || '-' + '</div>',
            ]).draw();
        });

        $("#TableMyDocument_filter").hide();
    }

    // GET DATA MY DOCUMENT
    function getDataMyDocument() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("MyDocument.ShowMyDocumentListData") !!}',
            success: function(data) {
                if (Array.isArray(data) && data.length > 0) {
                    successDataMyDocument(data);
                } else {
                    $('#TableMyDocument').find('tbody').empty();
                    $(".loadingGetMyDocument").hide();
                    $(".errorMessageMyDocumentContainer").show();
                    $("#errorMessageMyDocument").text('No data available in table');
                }
            },
            error: function(response) {
                $('#TableMyDocument').find('tbody').empty();
                $(".loadingGetMyDocument").hide();

                ErrorNotif("Error!");
            },
        });
    }

    // ON LOAD PAGE
    $(window).one('load', function(e) {
        optionDocumentType();
        getDataMyDocument();
    });
</script>