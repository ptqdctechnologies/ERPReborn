<div class="card-body">
  <div class="row">

    <div class="col-md-8">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top:12px;"><label>Delivery Order Request</label></td>
            <td>
              <div class="input-group">
                <input id="delivery_order_request_id" style="border-radius:0;" name="delivery_order_request_id" class="form-control" type="hidden">
                <input id="delivery_order_request" style="border-radius:0;" name="delivery_order_request" class="form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a id="delivery_order_request2" data-toggle="modal" data-target="#mySearDeliveryOrderRequest" class="mySearDeliveryOrderRequest"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <table>
          <tr class="budgetDetail">
            <td style="padding-top:8px;"><label>Transporter</label></td>
            <td>
              <div class="input-group">
                <input name="transporter_id" id="transporter_id" style="border-radius:0;" type="text" class="form-control" disabled hidden>
                <input name="transporter" id="transporter" style="border-radius:0;" type="text" class="form-control" disabled>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#" id="transporter2" data-toggle="modal" data-target="#myTransporter" class="myTransporter"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>