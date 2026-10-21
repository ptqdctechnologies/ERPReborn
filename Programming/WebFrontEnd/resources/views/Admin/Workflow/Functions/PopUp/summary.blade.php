<div class="modal fade" id="workflow_summary_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document"
        style="min-height: calc(100vh - 3.5rem); display: flex; align-items: center;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="margin: 0px;font-weight:bold;">
                    Confirmation
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size: 1.0rem; line-height: normal;">
                Are you sure all the information you entered is correct? Please review your data carefully before
                proceeding.
            </div>
            <div class="modal-footer">
                <button type="button" id="cancel_summary" class="btn btn-default btn-sm" data-dismiss="modal"
                    aria-label="close_sumamry" style="background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="cancel-summary"
                        title="Cancel Summary" /> No, cancel
                </button>
                <button type="button" id="submit_summary" class="btn btn-default btn-sm" data-dismiss="modal"
                    onclick="commentWorkflow()"
                    style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="submit-summary"
                        title="Save Summary" />
                    Yes, save it
                </button>
            </div>
        </div>
    </div>
</div>