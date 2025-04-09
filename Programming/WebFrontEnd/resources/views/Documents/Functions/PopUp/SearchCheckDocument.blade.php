<div id="mySearchCheckDocument" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Document</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <table>
                            <tr>
                                <td style="padding-top: 10px;"><label>Transaction</label></td>
                                <td>
                                    <div class="input-group">
                                        <select class="form-control select2" id="DocumentType" onchange="getListDocumentType(this);" style="width: 100%;">
                                            <option disabled selected>Select a Document Type</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-12" style="margin-top:10px;">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 430px;">
                                <table class="table table-head-fixed text-nowrap TableCheckDocument" id="TableCheckDocument">
                                    <thead>
                                        <tr>
                                            <th style="position:relative;left:10px;">No</th>
                                            <th style="position:relative;left:10px;">Trano</th>
                                            <th style="position:relative;left:10px;">Project Code</th>
                                            <th style="position:relative;left:10px;">Site Code</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetCheckDocument">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
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
                                        <tr class="errorModalCheckDocumentMessageContainerSecond">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalCheckDocumentMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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