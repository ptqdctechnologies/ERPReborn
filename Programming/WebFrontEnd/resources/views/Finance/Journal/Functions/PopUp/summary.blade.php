<div class="modal fade" id="journal_summary_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document"
        style="min-height: calc(100vh - 3.5rem); display: flex; align-items: center;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="journal_summary_title" style="margin: 0px;font-weight:bold;">
                    Are you sure you want to save this data?
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="wrapper-budget card-body table-responsive p-0" style="max-height:200px;">
                    <table class="table table-head-fixed text-nowrap table-sm" id="journal_summary_table"
                        style="border: 1px solid #dee2e6; width: 100%;">
                        <tbody></tbody>
                    </table>
                </div>
                <div class="card-body d-none">
                    <div class="row">
                        <div class="col text-right p-0" style="font-size: 0.77rem; color: #212529; font-weight: 600;">
                            Total : <span id="journal_summary_total_table">0.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer preview-modal" style="display: none;">
                <button type="button" class="btn btn-default btn-sm"
                    onclick="cancelForm('{{ route('Journal.index', ['var' => 1]) }}')"
                    style="background-color:#e9ecef;border:1px solid #ced4da;">
                    OK
                </button>
            </div>
            <div class="modal-footer summary-modal">
                <button type="button" id="cancel_summary" class="btn btn-default btn-sm" data-dismiss="modal"
                    aria-label="close_sumamry" style="background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="cancel-summary"
                        title="Cancel Summary" /> No, cancel
                </button>
                <button type="button" id="submit_summary" class="btn btn-default btn-sm" onclick="commentWorkflow()"
                    style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="submit-summary"
                        title="Save Summary" />
                    Yes, save it
                </button>
            </div>
        </div>
    </div>
</div>