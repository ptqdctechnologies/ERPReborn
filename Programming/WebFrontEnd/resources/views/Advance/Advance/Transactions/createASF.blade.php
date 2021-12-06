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

<form method="post" enctype="multipart/form-data" action="{{ route('ASF.submitData') }}" name="formArf1">
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
                      Add New Settlement
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  @include('Advance.Advance.Functions.Header.headerAsf2')
                </div>
              </div>
            </div>
          


          <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Create New Settelement
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  @include('Advance.Advance.Functions.Header.headerAsf')
                </div>
              </div>
            </div>
          </div>

          <!-- <form action="" name="formAsf1"> -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      ARF Detail
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  @include('Advance.Advance.Functions.Table.tableArfDetail')
                </div>
              </div>
            </div>
          <!-- </form> -->

          <!-- <form action="" name="formAsf1"> -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Detail Settelement
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body detailASF">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <table>
                            <tr>
                              <td><label>ARF Number</label></td>
                              <td>
                                <div class="input-group">
                                  <input readonly name="var_arf_number" id="arf_number" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>ARF Date</label></td>
                              <td>
                                <div class="input-group">
                                  <input readonly name="var_arf_date" id="arf_date" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>

                            <tr>
                              <td>
                                <div class="input-group">
                                  <input readonly name="" id="productIdHide" style="border-radius:0;" type="hidden" class="form-control">
                                  <input readonly name="" id="nameMaterialHide" style="border-radius:0;" type="hidden" class="form-control">
                                  <input readonly name="" id="uomHide" style="border-radius:0;" type="hidden" class="form-control">
                                  <input readonly name="" id="descriptionHide" style="border-radius:0;" type="hidden" class="form-control">
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title" style="border:5px solid #DCDCDC;width:100%;">
                              <p style="position:relative;text-align:center;top:7px;">Balance</p>
                            </div>
                            <div class="card-body table-responsive p-0 available" style="height:100px;">
                              <table>
                                <tbody>
                                  <tr>
                                    <br>
                                    <td><label>Total ARF</label></td>
                                    <td>
                                      <div class="input-group">
                                        <input readonly name="total_arf" id="total_arf" style="border-radius:0;" type="text" class="form-control">
                                      </div>
                                    </td>
                                    <td>
                                      <div class="input-group">
                                        <input readonly name="total_arf2" id="total_arf2" style="border-radius:0;" type="text" class="form-control">
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><label>Total Settelement</label></td>
                                    <td>
                                      <div class="input-group">
                                        <input readonly name="total_asf" id="total_asf" style="border-radius:0;" type="text" class="form-control">
                                      </div>
                                    </td>
                                    <td>
                                      <div class="input-group">
                                        <input readonly name="total_asf2" id="total_asf2" style="border-radius:0;" type="text" class="form-control">
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><label>Balance</label></td>
                                    <td>
                                      <div class="input-group">
                                        <input readonly name="balance" id="balance" style="border-radius:0;" type="text" class="form-control">
                                      </div>
                                    </td>
                                    <td>
                                      <div class="input-group">
                                        <input readonly name="balance2" id="balance2" style="border-radius:0;" type="text" class="form-control">
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card-body detailASF">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <table>
                            <tr>
                              <div>
                                <label>
                                  <strong>Expense Claim</strong><br>
                                </label>
                              </div>
                            </tr>
                            <tr>
                              <td><label>QTY</label></td>
                              <td>
                                <div class="input-group" style="padding-left: 43px;">
                                  <input id="qty_expense" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input readonly id="qty_expense2" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div id="iconQtyExpense" style="color: red;margin-left:5px;"></div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Price</label></td>
                              <td>
                                <div class="input-group" style="padding-left: 43px;">
                                  <input id="price_expense" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input readonly id="price_expense2" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div id="iconPriceExpense" style="color: red;margin-left:5px;"></div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Total</label></td>
                              <td>
                                <div class="input-group" style="padding-left: 43px;">
                                  <input readonly id="total_expense" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input readonly id="total_expense2" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <table>

                            <tr>
                              <div>
                                <label>
                                  <strong>Amount Due to Company</strong><br>
                                </label>
                              </div>
                            </tr>
                            <tr>
                              <td><label>QTY</label></td>
                              <td>
                                <div class="input-group" style="padding-left: 23px;">
                                  <input id="qty_amount" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input readonly id="qty_amount2" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div id="iconQtyAmount" style="color: red;margin-left:5px;"></div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Price</label></td>
                              <td>
                                <div class="input-group" style="padding-left: 23px;">
                                  <input id="price_amount" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input readonly id="price_amount2" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div id="iconPriceAmount" style="color: red;margin-left:5px;"></div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Total</label></td>
                              <td>
                                <div class="input-group" style="padding-left: 23px;">
                                  <input readonly id="total_amount" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input readonly id="total_amount2" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                        <br>
                        <button type="reset" class="btn btn-outline btn-danger btn-sm float-right detailSettlement">
                          <i class="fa fa-times" aria-hidden="true" title="Cancel to Add Advance List Cart">Cancel</i>
                        </button>

                        <a class="btn btn-outline btn-success btn-sm float-right" id="addAsfListCart" style="margin-right: 5px;">
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
              <a class="nav-item nav-link active idExpense" id="product-comments-tab" data-toggle="tab" href="#expense" role="tab" aria-controls="product-comments" aria-selected="true"><span style="font-weight:bold;padding:40px;color:#212529;">Expense Claim Cart</span></a>&nbsp&nbsp&nbsp
              <a class="nav-item nav-link idAmount" id="product-desc-tab" data-toggle="tab" href="#amountdueto" role="tab" aria-controls="product-desc" aria-selected="false"><span style="font-weight:bold;padding:40px;color:#212529;">Amount Due to Company Cart</span></a>
            </div><br>
          </nav>

          <div class="tab-pane fade show active" id="expense" role="tabpanel" aria-labelledby="product-comments-tab">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Expense Claim Cart
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
                          <th>Action</th>
                          <th>Trano</th>
                          <th>Product ID</th>
                          <th>Name Material</th>
                          <th>Unit</th>
                          <th>QTY</th>
                          <th>Unit Price</th>
                          <th>Total</th>
                          <th>Description</th>
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
                      Amount Due to Company Cart
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
                          <th>QTY</th>
                          <th>Unit Price</th>
                          <th>Total</th>
                          <th>Description</th>
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
          <button class="btn btn-outline btn-success btn-sm float-right" type="submit" style="margin-right: 5px;color:white;" id="saveAsfList">
            <i class="fas fa-save" aria-hidden="true" title="Submit to Advance">Submit</i>
          </button>
        </div>
      </div>
    </div>
  </section>
</div>
</form>
@include('Partials.footer')
@include('Advance.Advance.Functions.Footer.footerAsf')
@endsection