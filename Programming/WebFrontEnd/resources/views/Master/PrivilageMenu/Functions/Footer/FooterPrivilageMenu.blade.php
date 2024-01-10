<!-- SHOW DATA FOR FIRST LOADING  -->
<!-- <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var keys = 0;

    $.ajax({
        type: 'GET',
        url: '{!! route("getPrivilageMenu") !!}',
        success: function(data) {
            $('#TablePrivilageMenu').find('tbody').empty();
            var keys = 0;
            var no = 1;
            var t = $('.TablePrivilageMenu').DataTable();
            t.clear().draw();
            $.each(data, function(key, val) {
                const date = dateFns.format(
                    dateFns.parse(val.businessDocumentDateTimeTZ, "yyyy-MM-dd hh:mm:ss"),
                    'DD-MM-YYYY HH:mm');

                var remark = val.workFlowPathSubmitterRemarks;
                if (val.workFlowPathSubmitterRemarks == null) {
                    remark = "-";
                }

                keys += 1;
                t.row.add([
                    '<tbody><tr><input class="businessDocument_RefID' + keys + '" value="' + val.formDocumentNumber_RefID + '" type="hidden"><td><span style="position:relative;left:10px;">' + no++ + '</span></td>',
                    '<td><span style="position:relative;left:10px;">' + val.businessDocumentNumber + '</span></td>',
                    '<td><span style="position:relative;left:10px;">' + val.combinedBudgetCode + '</span></td>',
                    '<td><span style="position:relative;left:10px;">' + val.previousWorkFlowPathApproverName + '</span></td>',
                    '<td><span style="position:relative;left:10px;">' + date + '</span></td>',
                    '<td><span style="position:relative;left:10px;">' + val.previousWorkFlowPathActionName + '</span></td>',
                    '<td><span style="position:relative;left:10px;white-space: pre-line">' + remark + '</span></td></tr></tbody>',
                ]).draw();
            });

            HideLoading();
        },
        error: function(response) {
            // CALL FUNCTION ERROR NOTIFICATION
            ErrorNotif("Data Not Found !");
        },
    });
</script> -->