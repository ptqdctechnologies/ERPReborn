<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',
        url: '{!! route("MyDocument.MyDocumentListData") !!}',
        success: function(data) {
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
                    '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td></tr></tbody>'
                ]).draw();

            });
        }
    });

</script>