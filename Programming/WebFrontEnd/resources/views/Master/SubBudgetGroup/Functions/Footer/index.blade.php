<script>
    function getSubBudgetGroup() {
        let data = [
            {
                id: 0,
                code: 101,
                name: 'Salaries'
            },
            {
                id: 1,
                code: 102,
                name: 'Personal Insurance'
            },
            {
                id: 2,
                code: 104,
                name: 'Bonus Provision'
            },
            {
                id: 3,
                code: 106,
                name: 'Personal Income Tax'
            },
            {
                id: 4,
                code: 107,
                name: 'Medical Cost'
            },
            {
                id: 5,
                code: 108,
                name: 'Staff Amenities'
            },
            {
                id: 6,
                code: 112,
                name: 'Site Office Utilities'
            },
            {
                id: 7,
                code: 114,
                name: 'Site Office / Warehouse Rent Repair'
            },
            {
                id: 8,
                code: 118,
                name: 'Site Office Furniture'
            },
            {
                id: 9,
                code: 120,
                name: 'Communication'
            },
            {
                id: 10,
                code: 122,
                name: 'Vehicles Rent Repair'
            }
        ];

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
    }

    $(document).ready(function () {
        getSubBudgetGroup();
    });
</script>