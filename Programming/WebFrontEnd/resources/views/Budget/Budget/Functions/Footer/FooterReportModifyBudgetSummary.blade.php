<script>
    $("#warehouse_from").prop("disabled", true);
    $("#warehouse_from_2").prop("disabled", true);

    $("#sub_budget_popup").prop("disabled", true);

    $(document).ready(function () {
        $('#startDate').datetimepicker({
            format: 'L'
        });

        $('#finishDate').datetimepicker({
            format: 'L'
        });
    });

    $('#tableGetProject tbody').on('click', 'tr', function() {
        $("#myProject").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_budget' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#budget_id").val(sys_id);
        $("#budget_name").val(name);
        $("#budget").val(code);

        $("#sub_budget").prop("disabled", false);
        $("#sub_budget_popup").prop("disabled", false);
        $("#sub_budget_id").val("");
        $("#sub_budget").val("");

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
                        '<tbody><tr><input id="sys_id_site' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                        '<td>' + val.Code + '</td>',
                        '<td>' + val.Name + '</td></tr></tbody>'
                    ]).draw();
                });
            }
        });
    });

    $('#tableGetSite tbody').on('click', 'tr', function() {
        $("#mySiteCode").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_site' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#sub_budget_id").val(sys_id);
        $("#sub_budget").val(code);
        $("#sub_budget_name").val(name);
    });
</script>