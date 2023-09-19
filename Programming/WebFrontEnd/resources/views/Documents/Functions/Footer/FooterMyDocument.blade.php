<!-- SELECT FOR FILTER BY BUDGET  -->
<script>
    $('#tableGetProject tbody').on('click', 'tr', function() {
        $("#myProject").modal('toggle');
        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_budget' + id).val();
        var code = row.find("td:nth-child(2)").text();
        $("#projectid").val(sys_id);
        $("#projectcode").val(code);
    });
</script>

<!-- SELECT FOR FILTER BY DOCUMENT TYPE  -->
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

<!-- SELECT FOR FILTER BY DOCUMENT TYPE  -->
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

<!-- LOADING DATA MY DOCUMENT -->
<script>
    function SuccessDataMyDocument(data){
        var no = 1;
        var t = $('.TableMyDocument').DataTable();
        t.clear();
        $.each(data.data, function(key, val) {
            
            const date = dateFns.format(
                dateFns.parse(val.entities.businessDocumentDateTimeTZ, "yyyy-MM-dd hh:mm:ss"),
                'DD-MM-YYYY HH:mm');

            var remark = val.entities.workFlowPathSubmitterRemarks;
            if (val.entities.workFlowPathSubmitterRemarks == null) {
                remark = "-";
            }

            keys += 1;

            t.row.add([
                '<tbody><tr><input id="businessDocument_RefID' + keys + '" value="' + val.entities.formDocumentNumber_RefID + '" type="hidden"><td><span style="position:relative;left:10px;">' + no++ + '</span></td>',
                '<td><span style="position:relative;left:10px;">' + val.entities.businessDocumentNumber + '</span></td>',
                '<td><span style="position:relative;left:10px;">' + val.entities.combinedBudgetCode + '</span></td>',
                '<td><span style="position:relative;left:10px;">' + val.entities.previousWorkFlowPathApproverName + '</span></td>',
                '<td><span style="position:relative;left:10px;">' + date + '</span></td>',
                '<td><span style="position:relative;left:10px;">' + val.entities.previousWorkFlowPathActionName + '</span></td>',
                '<td><span style="position:relative;left:10px;">' + remark + '</span></td></tr></tbody>',
            ]).draw();
        });

        $("#loading").hide();
        $(".loader").hide();
    }
</script>

<!-- SHOW DATA FOR FIRST LOADING  -->
<script type="text/javascript">
    $("#loading").show();
    $(".loader").show();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var keys = 0;

    $.ajax({
        type: 'GET',
        url: '{!! route("MyDocument.ShowMyDocumentListData") !!}',
        success: function(data) {
            SuccessDataMyDocument(data);
        },
        error: function(response) {
            $("#loading").hide();
            $(".loader").hide();
            Swal.fire("Cancelled", "Data Not Found !", "error");
        },
    });
</script>

<!-- SUBMIT FILTER  -->
<script>
    $(function() {
        $("#FormSubmitMyDocument").on("submit", function(e) {
            e.preventDefault();

            var action = $(this).attr("action");
            var method = $(this).attr("method");
            var form_data = new FormData($(this)[0]);
            var form = $(this);

            $("#loading").show();
            $(".loader").show();

            $('.TableMyDocument').find('tbody').empty();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var keys = 0;

            $.ajax({
                url: action,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: method,
                success: function(data) {
                    SuccessDataMyDocument(data);
                },
                error: function(response) {
                    $("#loading").hide();
                    $(".loader").hide();
                    Swal.fire("Cancelled", "Data Not Found !", "error");
                },
            })
        });
    });
</script>

<!-- RESET FILTER  -->
<script type="text/javascript">
    function ResetFilter() {
        $("#trano").val("");
        $(".DocumentType").empty();
        $("#projectid").val("");
        $("#projectcode").val("");
    }
</script>

<!-- SELECT DATA FOR SHOW DETAIL  -->
<script>
    $('.TableMyDocument tbody').on('click', 'tr', function() {

        var id = $(this).find("td:nth-child(1)").text();
        var businessDocument_RefID = $('#businessDocument_RefID' + id).val();

        $("#loading").show();
        $(".loader").show();

        window.location.href = '/ShowDocumentByID?businessDocument_RefID=' + businessDocument_RefID;

    });
</script>

<!-- HIDE SEARCHING PLUGIN FROM DATATABLE -->
<script>
    $(document).ready(function() {
        $('.TableMyDocument').DataTable({
            "searching": false,
        });
    });
</script>