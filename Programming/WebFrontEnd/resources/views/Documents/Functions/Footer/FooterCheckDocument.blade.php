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
                        '<tbody><tr><input id="sys_id' + keys + '" value="' + val.sys_ID + '" type="hidden"><input id="businessDocument_RefID' + keys + '" value="' + val.businessDocument_RefID + '" type="hidden"><input id="TransactionMenu' + keys + '" value="' + data.TransactionMenu + '" type="hidden"><input id="linkReportTransaction' + keys + '" value="' + data.linkReportTransaction + '" type="hidden"><td><span style="position:relative;left:10px;">' + no++ + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.documentNumber + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.combinedBudgetCode + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td></tr></tbody>',
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
        var documentNumber = row.find("td:nth-child(2)").text();
        var sys_id = $('#sys_id' + id).val();
        var businessDocument_RefID = $('#businessDocument_RefID' + id).val();
        var TransactionMenu = $('#TransactionMenu' + id).val();
        var linkReportTransaction = $('#linkReportTransaction' + id).val();

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