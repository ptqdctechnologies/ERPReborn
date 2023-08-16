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
        url: '{!! route("MyDocument.ShowDocumentListData") !!}',
        success: function(data) {
            var no = 1;
            $.each(data.data, function(key, val) {
                var date = dateFormat(val.entities.businessDocumentDateTimeTZ, 'MM-dd-yyyy');
                keys += 1;
                var html = '<tr>' +

                    '<td><span style="position:relative;left:10px;">' + no++ + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + val.entities.businessDocumentNumber + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + val.entities.combinedBudgetCode + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + val.entities.businessDocumentTypeName + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + date + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + val.entities.businessDocumentTypeName + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + val.entities.businessDocumentTypeName + '</span></td>' +

                    '<input id="sys_ID' + keys + '" value="' + val.entities.businessDocument_RefID + '" type="hidden">' +

                    '</tr>';

                $('table.TableMyDocument tbody').append(html);

            });
            $("#TotalData").html(keys);
            $("#loading").hide();
            $(".loader").hide();
        }
    });
</script>

<script>
    $('#TableMyDocument tbody').on('click', 'tr', function() {

        var id = $(this).find("td:nth-child(1)").text();
        var sys_ID = $('#sys_ID' + id).val();

        $("#loading").show();
        $(".loader").show();

        window.location.href = '/ShowDocumentByID?sys_id=' + sys_ID;

    });
</script>

<script>
    $(function() {
        $("#FormSubmitMyDocument").on("submit", function(e) { //id of form 
            e.preventDefault();

            var action = $(this).attr("action"); //get submit action from form
            var method = $(this).attr("method"); // get submit method
            var form_data = new FormData($(this)[0]); // convert form into formdata 
            var form = $(this);

            $("#loading").show();
            $(".loader").show();

            $('#TableMyDocument').find('tbody').empty();

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
                    var no = 1;
                    $.each(data.data, function(key, val) {
                        keys += 1;
                        var html = '<tr>' +
                            '<td><span style="position:relative;left:10px;">' + no++ + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + val.entities.businessDocumentNumber + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + val.entities.combinedBudgetCode[0] + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + val.entities.businessDocumentTypeName + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + val.entities.businessDocumentDateTimeTZ + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + val.entities.businessDocumentTypeName + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + val.entities.businessDocumentTypeName + '</span></td>' +
                            '</tr>';

                        $('table.TableMyDocument tbody').append(html);

                    });

                    $("#loading").hide();
                    $(".loader").hide();
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

<script type="text/javascript">
    function ResetFilter() {
        $("#trano").val("");
        $("#document_type").val("");
        $("#projectid").val("");
        $("#projectcode").val("");
    }
</script>