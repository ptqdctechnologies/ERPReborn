<script type="text/javascript">
    $(".ShowDocumentList").hide();
    $(".InternalNotes").hide();
    $(".FileAttachment").hide();
    $(".ApprovalHistory").hide();
</script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        $('.mySearchCheckDocument').on('click', function(e) {
            e.preventDefault();

            // ShowLoading();

            var keys = 0;

            $.ajax({
                type: 'GET',
                url: '{!! route("CheckDocument.ShowDocumentListData") !!}?DocumentType=' + "",
                success: function(data) {
                    var no = 1;
                    t = $('#TableCheckDocument').DataTable();
                    t.clear();
                    $.each(data.data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><td><input id="businessDocument_RefID' + keys + '" value="' + val.entities.formDocumentNumber_RefID + '" type="hidden">' + no++ + '</span></td>',
                            '<td><span style="position:relative;left:10px;">' + val.entities.businessDocumentNumber + '</span></td>',
                            '<td><span style="position:relative;left:10px;">' + val.entities.combinedBudgetCode + '</span></td>',
                            '<td><span style="position:relative;left:10px;">' + val.entities.combinedBudgetSectionCode + '</span></td></tr></tbody>',
                        ]).draw();
                    });

                    HideLoading();
                }
            });

        });

    });
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',
        url: '{!! route("getDocumentType") !!}',
        success: function(data) {
            $(".DocumentType").empty();

            var option = "<option value='" + '' + "'>" + 'Select Document Type' + "</option>";
            $(".DocumentType").append(option);

            var len = data.length;
            for (var i = 0; i < len; i++) {
                var ids = data[i].sys_ID;
                var names = data[i].name;
                var option2 = "<option value='" + ids + "'>" + names + "</option>";
                $(".DocumentType").append(option2);
            }
        }
    });
</script>

<script>
    $('#DocumentType').on("select2:select", function(e) {

        ShowLoading();

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
                    keys += 1;
                    t.row.add([
                        '<tbody><tr><td><input id="businessDocument_RefID' + keys + '" value="' + val.entities.formDocumentNumber_RefID + '" type="hidden">' + no++ + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.entities.businessDocumentNumber + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.entities.combinedBudgetCode + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.entities.combinedBudgetSectionCode + '</span></td></tr></tbody>',
                    ]).draw();
                });

                HideLoading();
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
        var businessDocument_RefID = $('#businessDocument_RefID' + id).val();
        
        $("#businessDocument_RefID").val(businessDocument_RefID);
        $("#businessDocumentNumber").val(documentNumber);
    });
</script>

<script>
    $(".ViewWorkflow").hide();

    $('.ViewDocument').on('click', function() {
        $(".ShowDocument").hide();
        $(".ShowDocumentList").show();
        $(".InternalNotes").show();
        $(".FileAttachment").show();
        $(".ApprovalHistory").show();

        $(".ViewDocument").hide();
        $(".ViewWorkflow").show();
    });

    $('.ViewWorkflow').on('click', function() {
        $(".ShowDocument").show();
        $(".ShowDocumentList").hide();
        $(".InternalNotes").hide();
        $(".FileAttachment").hide();
        $(".ApprovalHistory").hide();

        $(".ViewDocument").show();
        $(".ViewWorkflow").hide();
    });
</script>