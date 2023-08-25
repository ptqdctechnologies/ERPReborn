<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',
        url: '{!! route("getDocumentType") !!}',
        success: function(data) {
            var len = data.length;
            $(".DocumentType").empty();
            for (var i = 0; i < len; i++) {
                var ids = data[i].sys_ID;
                var names = data[i].name;
                var option = "<option value='" + ids + "'>" + names + "</option>";
                $(".DocumentType").append(option);
            }
        }
    });
</script>

<script type="text/javascript">
    $("#loading").show();
    $(".loader").show();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var keys = 0;

    $.ajax({
        type: 'GET',
        url: '{!! route("MyDocument.ShowMyDocumentListData") !!}',
        success: function(data) {
            var no = 1;
            $.each(data.data, function(key, val) {

                const date = dateFns.format(
                    dateFns.parse(val.entities.businessDocumentDateTimeTZ, "yyyy-MM-dd hh:mm:ss"),
                    'DD-MM-YYYY HH:mm');

                var remark = val.entities.workFlowPathSubmitterRemarks;
                if (val.entities.workFlowPathSubmitterRemarks == null) {
                    remark = "-";
                }

                keys += 1;
                var html = '<tr>' +

                    '<td><span style="position:relative;left:10px;">' + no++ + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + val.entities.businessDocumentNumber + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + val.entities.combinedBudgetCode + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + val.entities.previousWorkFlowPathApproverName + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + date + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + val.entities.previousWorkFlowPathActionName + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + remark + '</span></td>' +

                    '<input id="businessDocument_RefID' + keys + '" value="' + val.entities.businessDocument_RefID + '" type="hidden">' +

                    '</tr>';

                $('table.TableMyDocument tbody').append(html);

            });
            $("#TotalData").html(keys);
            $("#loading").hide();
            $(".loader").hide();
        }
    });
</script>

<script>
    $(function() {
        $("#FormSubmitMyDocument").on("submit", function(e) { //id of form 
            e.preventDefault();

            var action = $(this).attr("action"); //get submit action from form
            var method = $(this).attr("method"); // get submit method
            var form_data = new FormData($(this)[0]); // convert form into formdata 
            var form = $(this);

            $("#loading").show();
            $(".loader").show();

            $('#TableMyDocument').find('tbody').empty();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var keys = 0;

            $.ajax({
                url: action,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: method,
                success: function(data) {
                    var no = 1;
                    $.each(data.data, function(key, val) {

                        const date = dateFns.format(
                            dateFns.parse(val.entities.businessDocumentDateTimeTZ, "yyyy-MM-dd hh:mm:ss"),
                            'DD-MM-YYYY HH:mm');

                        var remark = val.entities.workFlowPathSubmitterRemarks;
                        if (val.entities.workFlowPathSubmitterRemarks == null) {
                            remark = "-";
                        }

                        keys += 1;
                        var html = '<tr>' +

                            '<td><span style="position:relative;left:10px;">' + no++ + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + val.entities.businessDocumentNumber + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + val.entities.combinedBudgetCode + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + val.entities.previousWorkFlowPathApproverName + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + date + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + val.entities.previousWorkFlowPathActionName + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + remark + '</span></td>' +

                            '<input id="businessDocument_RefID' + keys + '" value="' + val.entities.businessDocument_RefID + '" type="hidden">' +

                            '</tr>';

                        $('table.TableMyDocument tbody').append(html);

                    });

                    $("#loading").hide();
                    $(".loader").hide();
                },
                error: function(response) {
                    $("#loading").hide();
                    $(".loader").hide();
                    Swal.fire("Cancelled", "Data Not Found !", "error");
                },
            })
        });
    });
</script>

<script>
    $('#TableMyDocument tbody').on('click', 'tr', function() {

        var id = $(this).find("td:nth-child(1)").text();
        var businessDocument_RefID = $('#businessDocument_RefID' + id).val();

        $("#loading").show();
        $(".loader").show();

        window.location.href = '/ShowDocumentByID?businessDocument_RefID=' + businessDocument_RefID;

    });
</script>

<script>
    $('#tableGetProject tbody').on('click', 'tr', function() {
        $("#myProject").modal('toggle');
        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_budget' + id).val();
        var code = row.find("td:nth-child(2)").text();
        $("#projectid").val(sys_id);
        $("#projectcode").val(code);
    });
</script>

<script type="text/javascript">
    function ResetFilter() {
        $("#trano").val("");
        $("#document_type").val("");
        $("#projectid").val("");
        $("#projectcode").val("");
    }
</script>