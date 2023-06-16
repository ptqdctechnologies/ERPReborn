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
        url: '{!! route("MyDocument.MyDocumentListData") !!}',
        success: function(data) {
            var no = 1;
            $.each(data.data, function(key, val) {
                keys += 1;
                var html = '<tr>' +

                    '<td><span style="position:relative;left:10px;">' + no++ + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + val.documentNumber + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + val.combinedBudgetCode + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td>' +
                    '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td>' +

                    '<input id="sys_ID' + keys + '" value="' + val.sys_ID + '" type="hidden">' +
                    '<input id="businessDocument_RefID' + keys + '" value="' + val.businessDocument_RefID + '" type="hidden">' +
                    '<input id="TransactionMenu' + keys + '" value="' + val.businessDocument_RefID + '" type="hidden">' +
                    '<input id="linkReportTransaction' + keys + '" value="' + val.businessDocument_RefID + '" type="hidden">' +

                    '</tr>';
                $('table.TableMyDocument tbody').append(html);

            });
            $("#loading").hide();
            $(".loader").hide();
        }
    });
</script>

<script>
    $('#TableMyDocument tbody').on('click', 'tr', function() {

        var id = $(this).find("td:nth-child(1)").text();
        var documentNumber = $(this).find("td:nth-child(2)").text();
        var sys_ID = $('#sys_ID' + id).val();
        var businessDocument_RefID = $('#businessDocument_RefID' + id).val();
        var TransactionMenu = $('#TransactionMenu' + id).val();
        var linkReportTransaction = $('#linkReportTransaction' + id).val();

        $("#loading").show();
        $(".loader").show();

        window.location.href = '/ShowDocumentByID?sys_id=' + sys_ID + '&document_number=' + documentNumber + '&businessDocument_RefID=' + businessDocument_RefID + '&linkReportTransaction=' + "report.form.documentForm.finance.getAdvance" + '&TransactionMenu=' + "Advance";

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
                            '<td><span style="position:relative;left:10px;">' + val.documentNumber + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + val.combinedBudgetCode + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td>' +
                            '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td>' +

                            '<input id="sys_ID' + keys + '" value="' + val.sys_ID + '" type="hidden">' +
                            '<input id="businessDocument_RefID' + keys + '" value="' + val.businessDocument_RefID + '" type="hidden">' +
                            '<input id="TransactionMenu' + keys + '" value="' + val.businessDocument_RefID + '" type="hidden">' +
                            '<input id="linkReportTransaction' + keys + '" value="' + val.businessDocument_RefID + '" type="hidden">' +

                            '</tr>';
                        $('table.TableMyDocument tbody').append(html);

                    });

                    $("#loading").hide();
                    $(".loader").hide();
                }
            })
        });
    });
</script>

<script>
    $('#tableGetProject tbody').on('click', 'tr', function() {
        $("#myProject").modal('toggle');
        var row = $(this).closest("tr");
        var sys_id = row.find("td:nth-child(4)").text();
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