<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 12px;"><label>PO Number</label></td>
            <td>
              <div class="input-group">
                <input id="modal_purchase_requisition_document_number" style="border-radius:0;" name="modal_purchase_requisition_document_number" class="form-control" readonly value="<?= $header['poNumber']; ?>">
                <input id="modal_purchase_requisition_id" style="border-radius:0;" name="modal_purchase_requisition_id" class="form-control" hidden value="<?= $header['poNumberID']; ?>">
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
              <input id="delivery_to_id" style="border-radius:0;" name="delivery_to_id" class="form-control" hidden value="<?= $header['deliveryToID']; ?>">
              <div class="input-group">
                <textarea name="delivery_to" id="delivery_to" cols="30" rows="4" class="form-control"><?= $header['deliveryTo']; ?></textarea>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>