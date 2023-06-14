<script type="text/javascript">
    $("#loading").show();
    $(".loader").show();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',
        url: '{!! route("MyDocument.MyDocumentListData") !!}',
        success: function(data) {
            console.log(data);
            var no = 1;
            t = $('#TableMyDocument').DataTable();
            t.clear();
            $.each(data.data, function(key, val) {
                t.row.add([
                    '<tbody><tr><td><span style="position:relative;left:10px;">' + val.documentNumber + '</span></td>',
                    '<td><span style="position:relative;left:10px;">' + val.combinedBudgetCode + '</span></td>',
                    '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td>',
                    '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td>',
                    '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td>',
                    '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td>',
                    '<span style="display:none;"><td">' + val.businessDocument_RefID + '</span></td>',
                    '<span style="display:none;"><td">' + val.sys_ID + '</span></td>',
                    '<span style="display:none;"><td">' + val.businessDocument_RefID + '</span></td>',
                    '<span style="display:none;"><td">' + val.businessDocument_RefID + '</td></span></tr></tbody>'
                ]).draw();
            });


            $("#loading").hide();
            $(".loader").hide();
        }
    });
</script>

<script>
    $('#TableMyDocument tbody').on('click', 'tr', function() {

        var row = $(this).closest("tr");
        var sys_ID = row.find("td:nth-child(8)").text();
        var documentNumber = row.find("td:nth-child(1)").text();
        var linkReportTransaction = row.find("td:nth-child(10)").text();
        var TransactionMenu = row.find("td:nth-child(9)").text();
        var businessDocument_RefID = row.find("td:nth-child(7)").text();

        window.location.href = '/ShowDocumentByID?sys_id=' + sys_ID + '&document_number=' + documentNumber + '&businessDocument_RefID=' + businessDocument_RefID + '&linkReportTransaction=' + "report.form.documentForm.finance.getAdvance" + '&TransactionMenu=' + "Advance";

    });
</script>