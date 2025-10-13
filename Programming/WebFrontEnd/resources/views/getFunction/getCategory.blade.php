<div id="myGetCategory" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Category</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetCategory">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalCategory">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                                        Loading...
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="errorModalCategoryMessageContainer" style="display: none;">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalCategoryMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    function getModalCategory() {
        $(".loadingGetModalCategory").hide();

        const data = [
            {
                id: 0,
                code: 'CTG - 001',
                name: 'Category 1'
            },
            {
                id: 1,
                code: 'CTG - 002',
                name: 'Category 2'
            },
            {
                id: 2,
                code: 'CTG - 003',
                name: 'Category 3'
            },
            {
                id: 3,
                code: 'CTG - 004',
                name: 'Category 4'
            },
            {
                id: 4,
                code: 'CTG - 005',
                name: 'Category 5'
            },
            {
                id: 5,
                code: 'CTG - 006',
                name: 'Category 6'
            },
            {
                id: 6,
                code: 'CTG - 007',
                name: 'Category 7'
            },
            {
                id: 7,
                code: 'CTG - 008',
                name: 'Category 8'
            },
            {
                id: 8,
                code: 'CTG - Non Permanen',
                name: 'Non Permanen'
            },
            {
                id: 9,
                code: 'CTG - Permanen',
                name: 'Permanen'
            },
        ];

        let no = 1;
        let table = $('#tableGetCategory').DataTable();
        table.clear();

        $.each(data, function(key, val) {
            table.row.add([
                no++,
                val.code || '-',
                val.name || '-',
            ]).draw();
        });
    }

    $(window).one('load', function(e) {
        getModalCategory();
    });
</script>