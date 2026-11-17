<script>
    function getBudgetCode() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("Budget.BudgetPickList") !!}',
        })
            .done(function (response) {
                let data = (response.status == 200 && response.data[0]) ? response.data : [];

                $('#table_budget_code').DataTable({
                    destroy: true,
                    data: data,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },
                        {
                            data: 'code',
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: 'name',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);
            })
            .always(function () {
                $("#budget_code_list_loading_table").hide();
            });
    }

    $(document).ready(function () {
        getBudgetCode();
    });
</script>