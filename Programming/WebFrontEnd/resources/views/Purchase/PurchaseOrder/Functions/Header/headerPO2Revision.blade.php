<div class="card-body">
  <div class="row">
    <div class="col-md-8">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 12px;"><label>MSR Number</label></td>
            <td>
              <div class="input-group">
                <input id="pr_number" style="border-radius:0;" name="pr_number" class="form-control" value="{{$purchaseOrder_number}}" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a id="pr_number2" data-toggle="modal" data-target="#mySearchPR" class="mySearchPR"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
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