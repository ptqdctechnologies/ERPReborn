@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getManager')
@include('getFunction.getFinanceStaff')
@include('getFunction.getCurrency')
@include('Advance.Advance.Functions.PopUp.searchArf')

<form method="post" enctype="multipart/form-data" action="{{ route('PO.submitData') }}" name="formArf1">
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="card">
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

          <!-- <form action="" name="formPO1"> -->
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
                  @include('Purchase.PurchaseOrder.Functions.Table.tableArfDetail')
                </div>
              </div>
            </div>
          <!-- </form> -->
          <!-- <form action="" name="formPO1"> -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Detail Purchase Order
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body detailPO">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <table>
                            <tr>
                              <td><label>PR Number</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="pr_number" id="putprnumber" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Project Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="project_code" id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Site Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="site_code" id="sitecode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Work Id</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="work_id" id="putworkid" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Product Id</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="product_id" id="putprojectid" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>PPN</label></td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="checkboxPrimary1" checked>
                                  <label for="checkboxPrimary1">
                                    Yes
                                  </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="checkboxPrimary2">
                                  <label for="checkboxPrimary2">
                                    No
                                  </label>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>PPN Value</label></td>
                              <td>
                                <div class="input-group">
                                  <select class="form-control select2bs4" style="width: 100%; border-radius:0;">
                                    <option selected="selected">Select Tax</option>
                                    <option>1%</option>
                                    <option>2%</option>
                                    <option>3%</option>
                                    <option>4%</option>
                                    <option>5%</option>
                                    <option>6%</option>
                                    <option>7%</option>
                                    <option>8%</option>
                                    <option>9%</option>
                                    <option>10%</option>
                                  </select>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label></label></td>
                              <td>
                                <div class="input-group">
                                  <input id="requestcode" style="border-radius:0;" type= "text" class="form-control">
                                  <input type="checkbox" id="checkboxPrimary2" class="form-control">
                                  <label for="checkboxPrimary3">
                                      Edit
                                  </label>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Qty Request</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="qty_request" id="putqtyrequest" style="border-radius:0;" type="text" class="form-control">
                                  <input name="qty_request" id="putqtyrequest" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Unit Price</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="unit_price" id="putunitprice" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Total Price</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="total_price" id="puttotalprice" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Item Remark</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="item_remark" id="putitemremark" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <table>
                            <tr>
                              <td><label>No</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="unit_price" id="putunitprice" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Project Name</label></td>
                              <td>
                                <div class="input-group">
                                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input style="border-radius:0;" type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Site Name</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="site_name" id="putsitename" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Product Name</label></td>
                              <td>
                                <div class="input-group">
                                  <textarea name="" id="" cols="50" rows="7" class="form-control"></textarea>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Qty Request For Supplier</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="qty_request" id="putqtyrequest" style="border-radius:0;" type="text" class="form-control">
                                  <input name="qty_request" id="putqtyrequest" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Unit Price For Supplier</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="qty_request" id="putqtyrequest" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Total For Supplier</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="qty_request" id="putqtyrequest" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title" style="border:5px solid #DCDCDC;width:100%;">
                              <p style="position:relative;text-align:center;top:7px;">Balance</p>
                            </div>
                            <div class="card-body table-responsive p-0 available" style="height:100px;">
                              <table>
                                <tbody>
                                  <br>
                                  <tr>
                                    <td><label>Total Requested</label></td>
                                    <td>:</td>
                                    <td style="font-weight:bold;">
                                      <input name="price" id="totalRequester" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control" readonly="">
                                    </td>
                                    <td>IDR</td>
                                  </tr>
                                  <tr>
                                    <td><label>Total Qty Requested</label></td>
                                    <td>:</td>
                                    <td style="font-weight:bold;">
                                      <input name="price" id="totalRequester" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control" readonly="">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><label>Balance</label></td>
                                    <td>:</td>
                                    <td style="font-weight:bold;color:red;">
                                      <input name="price" id="totalBalance" style="border-radius:0;background-color:white;border:1px solid white;color:red;" type="text" class="form-control" readonly="">
                                    </td>
                                    <td>IDR</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <button type="reset" class="btn btn-outline btn-danger btn-sm float-right detailTransaction">
                          <i class="fa fa-times" aria-hidden="true" title="Cancel to Add Advance List Cart">Cancel</i>
                        </button>
                        <a class="btn btn-outline btn-success btn-sm float-right" id="addFromDetailtoCart" style="margin-right: 5px;">
                          <i class="fa fa-plus" aria-hidden="true" title="Add to Advance List" style="color: white;">Add</i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- </form> -->

          <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
              <a class="nav-item nav-link active idExpense" id="product-comments-tab" data-toggle="tab" href="#expense" role="tab" aria-controls="product-comments" aria-selected="true"><span style="font-weight:bold;padding:40px;color:#212529;">Price History</span></a>&nbsp&nbsp&nbsp
              <a class="nav-item nav-link idAmount" id="product-desc-tab" data-toggle="tab" href="#amountdueto" role="tab" aria-controls="product-desc" aria-selected="false"><span style="font-weight:bold;padding:40px;color:#212529;">PO Shopping Cart</span></a>
            </div><br>
          </nav>

          <div class="tab-pane fade show active" id="expense" role="tabpanel" aria-labelledby="product-comments-tab">
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

                  <div class="card-body table-responsive p-0" id="expenseCompanyCart">
                    <table class="table table-head-fixed text-nowrap table-striped tableExpenseClaim">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Project ID</th>
                          <th>Project Name</th>
                          <th>Site Code</th>
                          <th>Site Name</th>
                          <th>PIC</th>
                          <th>Price</th>
                          <th>Currency</th>
                          <th>Supplier Code</th>
                          <th>Supplier Name</th>
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

          <div class="tab-pane fade" id="amountdueto" role="tabpanel" aria-labelledby="product-desc-tab">
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

                  <div class="card-body table-responsive p-0" id="amountCompanyCart">
                    <table class="table table-head-fixed text-nowrap table-striped tableAmountDueto">
                      <thead>
                        <tr>
                          <th>Action</th>
                          <th>PR Number</th>
                          <th>Project Id</th>
                          <th>Site Code</th>
                          <th>Work Id</th>
                          <th>Work Name</th>
                          <th>Product Id</th>
                          <th>Product Name</th>
                          <th>Qty</th>
                          <th>Uom</th>
                          <th>Price</th>
                          <th>PPN</th>
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

          
          <button type="reset" class="btn btn-danger btn-sm float-right">
            <i class="fa fa-times" aria-hidden="true"></i>
            Cancel
          </button>
          <button class="btn btn-outline btn-success btn-sm float-right" type="submit" style="margin-right: 5px;color:white;" id="savePOList">
            <i class="fas fa-save" aria-hidden="true" title="Submit to Advance">Submit</i>
          </button>
        </div>
      </div>
    </div>
  </section>
</div>
</form>
@include('Partials.footer')
@include('Purchase.PurchaseOrder.Functions.Footer.footerPO')
@endsection