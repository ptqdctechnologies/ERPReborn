<!-- MODAL -->
<div class="modal fade" id="sub_budget_group_modal" tabindex="-1" aria-labelledby="sub_budget_group_modal_label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sub_budget_group_modal_label"
                    style="font-size: 15px; font-weight:bold; text-align: center;">
                    Choose Sub Budget Group
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed w-100" id="sub_budget_group_list_table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr id="sub_budget_group_list_loading_table" class="d-none">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                                        Loading...
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

        $('#sub_budget_group_list_table').DataTable({
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
                    className: "align-middle text-wrap"
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

        $('#sub_budget_group_modal').on('hide.bs.modal', function () {
            if (document.activeElement && this.contains(document.activeElement)) {
                document.activeElement.blur();
            }
        });
    });
</script>