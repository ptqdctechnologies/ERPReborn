<div id="myWorkflows" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Workflows</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableWorkflows">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
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
    function getWorkflows(value) {
        $('#tableWorkflows').DataTable({
            destroy: true,
            data: value,
            deferRender: true,
            scrollCollapse: true,
            scroller: true,
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return '<td class="align-middle text-center">' +
                            '<input id="sys_id_approver' + (meta.row + 1) + '" value="' + data.entities.approverEntity_RefID + '" data-trigger="sys_id_approver" type="hidden">' +
                            (meta.row + 1) +
                        '</td>';
                    }
                },
                {
                    data: 'entities.approverEntityName',
                    defaultContent: '-',
                    className: "align-middle"
                },
                {
                    data: 'entities.approverOrganizationalJobPositionName',
                    defaultContent: '-',
                    className: "align-middle"
                }
            ]
        });

        $('#tableWorkflows').css("width", "100%");
    }
</script>