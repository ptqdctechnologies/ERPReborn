<script>
    $(".ShowTableReportAdvanceSummary").hide();
</script>
<!-- SUBMIT FILTER  -->
<script>
    $(function() {
        $("#FormSubmitReportAdvanceSummary").on("submit", function(e) {
            e.preventDefault();
            
            $(".ShowTableReportAdvanceSummary").show();

            var action = $(this).attr("action");
            var method = $(this).attr("method");
            var form_data = new FormData($(this)[0]);
            var form = $(this);

            ShowLoading();

            $('.TableReportAdvanceSummary').find('tbody').empty();

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
                    var no = 1; t = $('#TableReportAdvanceSummary').DataTable();
                    t.clear();
                    $.each(data.data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><td>' + no++ + '</td>',
                            '<td><a href="ReportAdvanceSummaryDetail/'+ + val.sys_ID  +'">' + val.documentNumber + '</a></td>',
                            '<td>' + val.documentDateTimeTZ + '</td>',
                            '<td>' + val.advancePurpose + '</td>',
                            '<td>' + val.currencyName + '</td>',
                            '<td>' + val.totalAdvance + '</td>',
                            '<td>' + val.beneficiaryWorkerName + '</td></tr></tbody>'
                        ]).draw();

                    });

                    HideLoading();
                },
                error: function(response) {
                    HideLoading();
                    // CALL FUNCTION ERROR NOTIFICATION
                    ErrorNotif("Data Not Found !");
                },
            })
        });
    });
</script>