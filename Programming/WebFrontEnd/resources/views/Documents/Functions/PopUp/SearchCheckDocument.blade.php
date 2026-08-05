<div class="modal fade" id="mySearchCheckDocument" tabindex="-1" aria-labelledby="mySearchCheckDocumentLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySearchCheckDocumentLabel"
                    style="font-size: 15px; font-weight:bold; text-align: center;">
                    Choose Transactions
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group d-flex align-items-center" style="gap: 1rem;">
                            <label class="mb-0">Transaction</label>
                            <div class="input-group">
                                <select class="form-control select2" id="DocumentType"
                                    onchange="getListDocumentType(this);" style="width: 100%;">
                                    <option disabled selected>Select a Document Type</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" style="margin-top:10px;">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="min-height: 400px;">
                                <table class="table table-head-fixed w-100" id="TableCheckDocument">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Budget Code</th>
                                            <th>Site Code</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetCheckDocument">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
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
                                        <tr class="errorModalCheckDocumentMessageContainerSecond">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalCheckDocumentMessageSecond" class="mt-3 text-red"
                                                        style="font-size: 1rem; font-weight: 700;"></div>
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