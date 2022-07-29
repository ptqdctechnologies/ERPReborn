@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getManager')
@include('getFunction.getFinanceStaff')
@include('getFunction.getCurrency')
@include('Purchase.PurchaseOrder.Functions.PopUp.searchPO')


<div class="content-wrapper" style="position:relative;bottom:12px;">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Purchase Order</label>
        </div>
      </div>
      @include('Purchase.PurchaseOrder.Functions.Menu.MenuPurchaseOrder')
      @if($var == 0)
      <div class="card" style="position:relative;bottom:10px;">
        <form method="post" enctype="multipart/form-data" action="{{ route('PurchaseOrder.store') }}" name="formPO">
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="row">
              @csrf
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Add New Purchase Order
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  @include('Purchase.PurchaseOrder.Functions.Header.headerPO2')
                </div>
              </div>
            </div>

            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <label class="card-title">
                        Create New Purchase Order
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>
                    @include('Purchase.PurchaseOrder.Functions.Header.headerPO')
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      PR Detail
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  @include('Purchase.PurchaseOrder.Functions.Table.tablePRDetail')
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Detail Transaction Request & Balance
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  <div class="card-body" id="detailTransAvail">
                    <div class="row">
                      <table class="table table-head-fixed text-nowrap">
                        <thead>
                          <tr>
                            <th>PR Number</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>PPN</th>
                            <th>PPN (%)</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>UOM</th>
                            <th>Total</th>
                            <th>Remark</th>
                            <th>Balance</th>
                          </tr>
                        </thead>
                        <tbody>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input readonly name="var_arf_number" id="arf_number" style="border-radius:0;width:85px;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input readonly name="var_product_id" id="product_id" style="border-radius:0;width:85px;" type="text" class="form-control">
                              <div class="input-group-append">
                                <span style="border-radius:0;" class="input-group-text form-control">
                                  <a href="#"><i id="product_id2" data-toggle="modal" data-target="#myProductArf" class="fas fa-gift" style="color:grey;"></i></a>
                                </span>
                              </div>
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input readonly name="var_product_name" id="product_name" style="border-radius:0;width:85px;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <select class="form-control select2bs4" style="width: 50px; border-radius:0;">
                                <option> No </option>
                                <option> Yes </option>
                              </select>
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <select class="form-control select2bs4" style="width: 80px; border-radius:0;">
                                <option selected="selected">Select Tax</option>
                                <option>1%</option>
                                <option>11%</option>
                              </select>
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <input name="qtyCek" id="qtyCek" style="border-radius:0;width:100px;" type="number" class="form-control ChangeQty quantity" value="0" autocomplete="off">
                            <span id="putQtybyId"></span>
                            <input name="qty2" id="putQty" style="border-radius:0;" type="hidden" class="form-control">
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <input name="price" id="priceCek" style="border-radius:0;width:100px;" type="text" class="form-control ChangePrice uang" value="0" autocomplete="off">
                            <input name="price2" id="putPrice" style="border-radius:0;" type="hidden" class="form-control">
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input readonly name="uom" id="uom" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <input name="total" id="totalPO" style="border-radius:0;" type="text" class="form-control" readonly="">
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <textarea name="remarks" id="putRemark" rows="1" cols="30" class="form-control"></textarea>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input readonly name="balance" id="balance" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                        </tbody>
                      </table>
                    </div>
                    <a class="btn btn-outline btn-danger btn-sm float-right cancelDetailPO">
                      <i class="fa fa-times" aria-hidden="true" title="Cancel to Add Advance List Cart" style="color: white;">Cancel</i>
                    </a>
                    <a class="btn btn-outline btn-success btn-sm float-right" id="addPOListCart" style="margin-right: 5px;">
                      <i class="fa fa-plus" aria-hidden="true" title="Add to Advance List" style="color: white;">Add</i>
                    </a>

                  </div>
                </div>

              </div>
            </div>
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active idExpense" id="product-comments-tab" data-toggle="tab" href="#expense" role="tab" aria-controls="product-comments" aria-selected="true"><span style="font-weight:bold;padding:40px;color:#212529;">Price History</span></a>&nbsp&nbsp&nbsp
                <a class="nav-item nav-link idAmount" id="product-desc-tab" data-toggle="tab" href="#amountdueto" role="tab" aria-controls="product-desc" aria-selected="false"><span style="font-weight:bold;padding:40px;color:#212529;">PO Shopping Chart</span></a>
              </div><br>
            </nav>
            <div class="tab-pane fade show active" id="expense" role="tabpanel" aria-labelledby="product-comments-tab">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <label class="card-title">
                        PO Shopping Cart
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>

                    <div class="card-body table-responsive p-0" id="detailPPMList">
                      <table class="table table-head-fixed text-nowrap tablePR">
                        <thead>
                          <tr>
                            <th>Delete</th>
                            <th>PR Number</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Uom</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>PPN Value</th>
                            <th>Total</th>
                            <th>Remark</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                  <a class="btn btn-outline btn-danger btn-sm float-right remove-arf-list">
                    <i class="fa fa-times" aria-hidden="true" title="Cancel Advance List Cart">Cancel</i>
                  </a>
                  <button class="btn btn-outline btn-success btn-sm float-right" type="submit" style="margin-right: 5px;color:white;" id="submitPPM">
                    <i class="fas fa-save" aria-hidden="true" title="Submit to Advance">Submit</i>
                  </button>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="amountdueto" role="tabpanel" aria-labelledby="product-desc-tab">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <label class="card-title">
                        Price History
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>

                    <div class="card-body table-responsive p-0" id="detailPPMList">
                      <table class="table table-head-fixed text-nowrap tablePR">
                        <thead>
                          <tr>
                            <th>Delete</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Uom</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Remark</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                  <a href="{{ route('PurchaseOrder.index') }}" class="btn btn-outline btn-danger btn-sm float-right remove-arf-list">
                    <i class="fa fa-times" aria-hidden="true" title="Cancel Advance List Cart">Cancel</i>
                  </a>
                  <button class="btn btn-outline btn-success btn-sm float-right" type="submit" style="margin-right: 5px;color:white;" id="submitPO">
                    <i class="fas fa-save" aria-hidden="true" title="Submit to Advance">Submit</i>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="amountdueto" role="tabpanel" aria-labelledby="product-desc-tab">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      PO Shopping Chart
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  <div class="card-body table-responsive p-0" id="amountCompanyCart">
                    <table class="table table-head-fixed text-nowrap table-striped tableAmountDueto">
                      <thead>
                        <tr>
                          <th>Action</th>
                          <th>Trano</th>
                          <th>Product ID</th>
                          <th>Name Material</th>
                          <th>UOM</th>
                          <th>Qty</th>
                          <th>Unit Price</th>
                          <th>PPN Value</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      @endif
    </div>
  </section>
</div>
@include('Partials.footer')
@include('Purchase.PurchaseOrder.Functions.Footer.footerPO')
@endsection