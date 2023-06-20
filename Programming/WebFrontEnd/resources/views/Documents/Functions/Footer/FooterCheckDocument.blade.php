<script type="text/javascript">
    $(".ShowDocumentList").hide();
    $(".InternalNotes").hide();
    $(".FileAttachment").hide();
    $(".ApprovalHistory").hide();
</script>

<script>
    function CheckDocument(url) {

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
            url: url.value,
            success: function(data) {
                var no = 1;
                t = $('#TableCheckDocument').DataTable();
                t.clear();
                $.each(data.data, function(key, val) {
                    keys += 1;
                    t.row.add([
                        '<tbody><tr>',
                        '<input id="sys_ID' + keys + '" value="' + val.sys_ID + '" type="hidden">',
                        '<td><span style="position:relative;left:10px;">' + no++ + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.combinedBudgetCode + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td>',
                        '</tr></tbody>',
                    ]).draw();

                });
                $("#loading").hide();
                $(".loader").hide();
            }
        });
    }
</script>

<script>
    $('#TableCheckDocument tbody').on('click', 'tr', function() {

        $("#mySearchCheckDocument").modal('toggle');

        var row = $(this).closest("tr");
        
        var id = row.find("td:nth-child(1)").text();
        var sys_ID = $('#sys_ID' + id).val();
        console.log(sys_ID);

        var documentNumber = row.find("td:nth-child(1)").text();
        var businessDocument_RefID = row.find("td:nth-child(4)").text();
        var sys_id = row.find("td:nth-child(5)").text();
        var TransactionMenu = row.find("td:nth-child(6)").text();
        var linkReportTransaction = row.find("td:nth-child(7)").text();





        $("#sys_id").val(sys_id);
        $("#document_number").val(documentNumber);
        $("#linkReportTransaction").val(linkReportTransaction);
        $("#TransactionMenu").val(TransactionMenu);
        $("#businessDocument_RefID").val(businessDocument_RefID);
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