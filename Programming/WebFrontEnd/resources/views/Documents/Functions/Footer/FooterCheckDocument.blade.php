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

        $.ajax({
            type: 'GET',
            url: url.value,
            success: function(data) {
                var no = 1;
                t = $('#TableCheckDocument').DataTable();
                t.clear();
                $.each(data.data, function(key, val) {
                    t.row.add([
                        '<tbody><tr><td><span style="position:relative;left:10px;">' + val.documentNumber + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.combinedBudgetCode + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td>',
                        '<span style="display:none;"><td">' + val.businessDocument_RefID + '</span></td>',
                        '<span style="display:none;"><td">' + val.sys_ID + '</span></td>',
                        '<span style="display:none;"><td">' + data.TransactionMenu + '</span></td>',
                        '<span style="display:none;"><td">' + data.linkReportTransaction + '</td></span></tr></tbody>'
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
        var documentNumber = row.find("td:nth-child(1)").text();
        var businessDocument_RefID = row.find("td:nth-child(4)").text();
        var sys_id = row.find("td:nth-child(5)").text();
        var TransactionMenu = row.find("td:nth-child(6)").text();
        var linkReportTransaction = row.find("td:nth-child(7)").text();
        console.log(linkReportTransaction);

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