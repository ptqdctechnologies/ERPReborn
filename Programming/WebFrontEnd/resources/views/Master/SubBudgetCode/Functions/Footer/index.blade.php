<script>
    function getSubBudgetCode() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getNewSite") !!}',
        })
            .done(function (response) {
                let data = Array.isArray(response) && response.length > 0 ? response : [];

                console.log('data', data);

                $('#table_sub_budget_code').DataTable({
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
                            data: 'Code',
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: 'Name',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);
            })
            .always(function () {
                $("#loading-table").hide();
            });
    }

    $(document).ready(function () {
        getSubBudgetCode();
    });
</script>