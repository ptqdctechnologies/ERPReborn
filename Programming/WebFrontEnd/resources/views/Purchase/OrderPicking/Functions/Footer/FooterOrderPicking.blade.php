<script>
    $('#tableGetProject tbody').on('click', 'tr', function() {

        $("#myProject").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_budget' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#project_code").val(code);
        $("#project_code_detail").val(name);
        $("#site_code_popup").prop("disabled", false);


        var documentTypeID = $("#DocumentTypeID").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // $.ajax({
        //     type: 'GET',
        //     url: '{!! route("CheckingWorkflow") !!}?combinedBudget_RefID=' + sys_id + '&documentTypeID=' + documentTypeID,
        //     success: function(data) {
        //         if (data > 0) {

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

        //         } else {
        //             $("#project_code").val("");
        //             $("#project_code_detail").val("");
        //             Swal.fire("Error", "User Has Not Workflow For This Project", "error");
        //         }
        //     },
        //     error: function(jqXHR, textStatus, errorThrown) {
        //         Swal.fire("Error", "Data Error", "error");
        //     }
        // });
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

        $("#site_code").val(code);
        $("#site_code_detail").val(name);
    });
</script>