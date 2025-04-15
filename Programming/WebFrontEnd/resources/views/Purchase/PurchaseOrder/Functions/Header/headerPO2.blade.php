<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 12px;"><label>MSR Number</label></td>
            <td>
              <div class="input-group">
                <input id="modal_purchase_requisition_document_number" style="border-radius:0;" name="modal_purchase_requisition_document_number" class="form-control" readonly>
                <input id="modal_purchase_requisition_id" style="border-radius:0;" name="modal_purchase_requisition_id" class="form-control" hidden>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="javascript:;" id="purchaseRequisitionTrigger" data-toggle="modal" data-target="#purchaseRequisitionModal" style="display: block;">
                      <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="purchaseRequisitionTrigger">
                    </a>
                  </span>
                </div>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 12px;"><label>Delivery To</label></td>
            <td style="border:1px solid #e9ecef;">
              <div class="input-group">
                <textarea name="delivery_to" id="delivery_to" cols="30" rows="4" class="form-control"></textarea>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>