<div class="card-body">
  <div class="row">
    <table class="table table-head-fixed text-nowrap">
      <thead>
        <tr>
          <th>Product Id</th>
          <th>Product Name</th>
          <th>Qty</th>
          <th>Uom</th>
          <th>Unit Price</th>
          <th>Currency</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <td>
          <div class="input-group">
            <input id="productIdRem" style="border-radius:0;width:100px;" name="productIdRem" class="form-control" readonly>
            <div class="input-group-append">
              <span style="border-radius:0;" class="input-group-text form-control">
                <a href="#"><i id="productIdRemPopUp" data-toggle="modal" data-target="#myProductArf" class="fas fa-gift" style="color:grey;"></i></a>
              </span>
            </div>
          </div>
        </td>
        <td>
          <input name="productNameRem" id="productNameRem" style="border-radius:0;" type="text" class="form-control" readonly="">
        </td>
        <td>
          <div class="input-group">
            <input name="qtyRem" id="qtyRem" style="border-radius:0;" type="number" class="form-control">
          </div>
        </td>
        <td>
          <div class="input-group">
            <input id="qtyNameRem" style="border-radius:0;" class="form-control" name="qtyNameRem" readonly>
          </div>
        </td>
        <td>
          <div class="input-group">
            <input name="unitPriceRem" id="unitPriceRem" style="border-radius:0;" type="text" class="form-control unitPriceRem uang">
          </div>
        </td>
        <td>
          <div class="input-group">
            <input id="unitPriceNameRem" style="border-radius:0;" class="form-control" name="unitPriceNameRem" readonly>
          </div>
        </td>
        <td>
          <div class="input-group">
            <input name="totalRem" id="totalRem" style="border-radius:0;" type="text" class="form-control" readonly>
          </div>
        </td>

      </tbody>
    </table>
    </div>
    <a type="reset" class="btn btn-outline btn-danger btn-sm float-right cancelRem">
      <i class="fa fa-times" aria-hidden="true" title="Cancel to Add Rem List Cart" style="color:white;">Cancel</i>
    </a>
    <a class="btn btn-outline btn-success btn-sm float-right" id="addFromDetailtoCart" style="margin-right: 5px;">
      <i class="fa fa-plus" aria-hidden="true" title="Add to Advance List" style="color: white;">Add</i>
    </a>
</div>
