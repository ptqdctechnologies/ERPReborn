<script>
    $(".ShowTableReportAdvanceSummary").hide();
    $("#site_code").prop("disabled", true);
    $("#site_code_popup").prop("disabled", true);
</script>


<script>
    $('#tableGetProject tbody').on('click', 'tr', function() {


        $("#myProject").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_budget' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#project_id").val(sys_id);
        $("#project_code").val(code);
        $("#site_code").prop("disabled", false);
        $("#site_code_popup").prop("disabled", false);
        $("#site_id").val("");
        $("#site_code").val("");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getSite") !!}?project_code=' + sys_id,
            success: function(data) {

                var no = 1;
                var t = $('#tableGetSite').DataTable();
                t.clear();
                $.each(data, function(key, val) {
                    keys += 1;
                    t.row.add([
                        '<tbody><tr><input id="sys_id_site' + keys + '" value="' + val.sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                        '<td>' + val.code + '</td>',
                        '<td>' + val.name + '</td></tr></tbody>'
                    ]).draw();
                });
            }
        });
    });
</script>

<script>
    $('#tableGetSite tbody').on('click', 'tr', function() {

        $("#mySiteCode").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_site' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#site_id").val(sys_id);
        $("#site_code").val(code);

    });
</script>


<!-- SUBMIT FILTER  -->
<script>
    $(function() {
        $("#FormSubmitReportAdvanceSummary").on("submit", function(e) {
            e.preventDefault();
            
            $(".ShowTableReportAdvanceSummary").show();

            var action = $(this).attr("action");
            var method = $(this).attr("method");
            var form_data = new FormData($(this)[0]);
            var form = $(this);

            ShowLoading();

            $('.TableReportAdvanceSummary').find('tbody').empty();

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
                    var no = 1; t = $('#TableReportAdvanceSummary').DataTable();
                    t.clear();
                    $.each(data.data, function(key, val) {

                        if(val.advancePurpose == null){
                            advancePurpose = "";
                        }
                        else{
                            advancePurpose = val.advancePurpose;
                        }
                        if(val.beneficiaryWorkerName == null){
                            beneficiaryWorkerName = "";
                        }
                        else{
                            beneficiaryWorkerName = val.beneficiaryWorkerName;
                        }
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><td>' + no++ + '</td>',
                            '<td><a href="ReportAdvanceSummaryDetail/'+ + val.sys_ID  +'">' + val.documentNumber + '</a></td>',
                            '<td>' + val.documentDateTimeTZ + '</td>',
                            '<td>' + advancePurpose + '</td>',
                            '<td>' + val.currencyName + '</td>',
                            '<td>' + currencyTotal(val.totalAdvance) + '</td>',
                            '<td>' + beneficiaryWorkerName + '</td>',
                            '<td>' + val.remark + '</td></tr></tbody>'
                        ]).draw();

                    });

                    HideLoading();
                },
                error: function(response) {
                    HideLoading();
                    // CALL FUNCTION ERROR NOTIFICATION
                    ErrorNotif("Data Not Found !");
                },
            })
        });
    });
</script>