<script type="text/javascript">
    $(".ShowDocumentList").hide();
    $(".InternalNotes").hide();
    $(".FileAttachment").hide();
    $(".ApprovalHistory").hide();
</script>

<script>
    $('#DocumentType').on("select2:select", function(e) {

        $("#loading").show();
        $(".loader").show();

        $('#TableCheckDocument').find('tbody').empty();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;

        $.ajax({
            type: 'GET',
            url: '{!! route("CheckDocument.ShowDocumentListData") !!}?DocumentType=' + $('#DocumentType').val(),
            success: function(data) {
                var no = 1;
                t = $('#TableCheckDocument').DataTable();
                t.clear();
                $.each(data.data, function(key, val) {
                    console.log(val);
                    keys += 1;
                    t.row.add([
                        '<tbody><tr><td><input id="sys_id' + keys + '" value="' + val.entities.businessDocument_RefID + '" type="hidden">' + no++ + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.entities.businessDocumentNumber + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.entities.combinedBudgetCode + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.entities.combinedBudgetSectionCode + '</span></td></tr></tbody>',
                    ]).draw();
                });
                $("#loading").hide();
                $(".loader").hide();
            }
        });
    });
</script>

<script>
    $('#TableCheckDocument tbody').on('click', 'tr', function() {

        $("#mySearchCheckDocument").modal('toggle');

        var row = $(this).closest("tr");
        var documentNumber = row.find("td:nth-child(2)").text();
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id' + id).val();
        $("#sys_id").val(sys_id);
        $("#document_number").val(documentNumber);
    });
</script>

<script>
    $('.ViewDocument').on('click', function() {
        $(".ShowDocument").hide();
        $(".ShowDocumentList").show();
        $(".InternalNotes").show();
        $(".FileAttachment").show();
        $(".ApprovalHistory").show();

    });
</script>