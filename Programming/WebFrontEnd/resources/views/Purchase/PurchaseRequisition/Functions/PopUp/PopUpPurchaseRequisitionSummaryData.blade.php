<div class="modal fade" id="purchaseRequestFormModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document" style="min-height: calc(100vh - 3.5rem); display: flex; align-items: center;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="margin: 0px;font-weight:bold;">Are you sure you want to save this data?</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="wrapper-budget card-body table-responsive p-0" style="max-height:200px;">
          <table class="table table-head-fixed text-nowrap table-sm" id="tablePurchaseRequisitionList" style="border: 1px solid #dee2e6;">
            <tbody></tbody>
          </table>
        </div>
        <div class="card-body">
          <table style="float:right;">
            <tr>
              <th id="GrandTotal"></th>
            </tr>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" onclick="SubmitForm('CANCEL');" style="background-color:#e9ecef;border:1px solid #ced4da;">
          <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Purchase Request"> No, cancel
        </button>

        <button type="button" id="submitPR" class="btn btn-default btn-sm" onclick="SubmitForm('SUBMIT');" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
          <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit Purchase Request"> Yes, save it
        </button>
      </div>
    </div>
  </div>
</div>