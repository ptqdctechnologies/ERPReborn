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

<div class="content-wrapper" style="position:relative;bottom:12px;">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
          <div class="col-sm-6" style="height:30px;">
            <label style="font-size:15px;position:relative;top:7px;color:white;">Advance Settlement</label>
          </div>
      </div>
      @include('Advance.Advance.Functions.Menu.menuAsf')
      @if($var == 0)
      <div class="card" style="position:relative;bottom:10px;">
        <form method="post" enctype="multipart/form-data" action="{{ route('AdvanceSettlement.store') }}" name="formArf1">
        @csrf
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
                        Create New Settlement
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
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <label class="card-title">
                      Detail Settlement
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body table-responsive p-0" id="detailASF">
                      <table class="table" style="text-align: center;">
                        <thead>
                          <tr>
                              <th rowspan="2" style="padding-bottom:25px;border:1px solid #e9ecef;"> ARF Number</th>
                              <th rowspan="2" style="padding-bottom:30px;border:1px solid #e9ecef;"> ARF Date</th>
                              <th colspan="6" style="border:1px solid #e9ecef;">Expense Claim</th>
                              <th colspan="6" style="border:1px solid #e9ecef;">Amount due To Company</th>
                              <th rowspan="2" colspan="2" style="padding-bottom:30px;border:1px solid #e9ecef;"> Balance</th>
                          </tr>
                          <tr>
                              <th colspan="2" style="border:1px solid #e9ecef;"> Qty</th>
                              <th colspan="2" style="border:1px solid #e9ecef;"> Price</th>
                              <th colspan="2" style="border:1px solid #e9ecef;"> Total</th>

                              <th colspan="2" style="border:1px solid #e9ecef;"> Qty</th>
                              <th colspan="2" style="border:1px solid #e9ecef;"> Price</th>
                              <th colspan="2" style="border:1px solid #e9ecef;"> Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              &nbsp;<input readonly name="var_arf_number" id="arf_number" style="border-radius:0;width:85px;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;width:90px;">
                            <div class="input-group">
                              <input readonly name="var_arf_date" id="arf_date" style="border-radius:0;width:80px;" type="text" class="form-control">
                            </div>
                          </td>

                          <input readonly name="" id="productIdHide" style="border-radius:0;" type="hidden" class="form-control">
                          <input readonly name="" id="nameMaterialHide" style="border-radius:0;" type="hidden" class="form-control">
                          <input readonly name="" id="uomHide" style="border-radius:0;" type="hidden" class="form-control">
                          <input readonly name="" id="descriptionHide" style="border-radius:0;" type="hidden" class="form-control">
                      
                          <td style="border:1px solid #e9ecef;width:75px;">
                            <div class="input-group">
                              <input id="qty_expense" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;width:65px;">
                            <div class="input-group">
                              <input readonly id="qty_expense2" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;width:110px;">
                            <div class="input-group">
                              <input id="price_expense" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;width:65px;">
                            <div class="input-group">
                              <input readonly id="price_expense2" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;width:110px;">
                            <div class="input-group">
                              <input readonly id="total_expense" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;width:65px;">
                            <div class="input-group">
                              <input readonly id="total_expense2" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;width:75px;">
                            <div class="input-group">
                              <input id="qty_amount" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;width:65px;">
                            <div class="input-group">
                              <input readonly id="qty_amount2" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;width:110px;">
                            <div class="input-group">
                              <input id="price_amount" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;width:65px;">
                            <div class="input-group">
                              <input readonly id="price_amount2" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;width:120px;">
                            <div class="input-group">
                              <input readonly id="total_amount" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;width:65px;">
                            <div class="input-group">
                              <input readonly id="total_amount2" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>

                          <td style="border:1px solid #e9ecef;width:110px;">
                            <div class="input-group">
                              <input readonly name="balance" id="balance" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;width:65px;">
                            <div class="input-group">
                              <input readonly name="balance2" id="balance2" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                        </tbody>
                        <!-- <tbody>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              &nbsp;<input readonly name="var_arf_number" id="arf_number" style="border-radius:0;width:85px;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input readonly name="var_arf_date" id="arf_date" style="border-radius:0;width:80px;" type="text" class="form-control">
                            </div>
                          </td>

                          <input readonly name="" id="productIdHide" style="border-radius:0;" type="hidden" class="form-control">
                          <input readonly name="" id="nameMaterialHide" style="border-radius:0;" type="hidden" class="form-control">
                          <input readonly name="" id="uomHide" style="border-radius:0;" type="hidden" class="form-control">
                          <input readonly name="" id="descriptionHide" style="border-radius:0;" type="hidden" class="form-control">
                      
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input id="qty_expense" style="border-radius:0;width:75px;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input readonly id="qty_expense2" style="border-radius:0;width:65px;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input id="price_expense" style="border-radius:0;width:110px;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input readonly id="price_expense2" style="border-radius:0;width:65px;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input readonly id="total_expense" style="border-radius:0;width:110px;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input readonly id="total_expense2" style="border-radius:0;width:65px;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input id="qty_amount" style="border-radius:0;width:75px;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input readonly id="qty_amount2" style="border-radius:0;width:65px;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input id="price_amount" style="border-radius:0;width:110px;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input readonly id="price_amount2" style="border-radius:0;width:65px;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input readonly id="total_amount" style="border-radius:0;width:120px;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input readonly id="total_amount2" style="border-radius:0;width:65px;" type="text" class="form-control">
                            </div>
                          </td>

                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input readonly name="balance" id="balance" style="border-radius:0;width:110px;" type="text" class="form-control">
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              <input readonly name="balance2" id="balance2" style="border-radius:0;width:65px;" type="text" class="form-control">
                            </div>
                          </td>
                        </tbody> -->
                      </table>
                      <br>
                      <div style="padding-right:10px;">
                        <button type="reset" class="btn btn-default btn-sm float-right detailSettlement" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right: 5px;">
                          <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel to Add Advance List Cart"> Cancel
                        </button>
                        <a class="btn btn-default btn-sm float-right" id="addAsfListCart" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                          <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                        </a>
                      </div>
                      <br><br><br>
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
                            <th>UOM</th>
                            <th>Qty</th>
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
                            <th>Qty</th>
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

            
            <button type="reset" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
              <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
            </button>
            <button class="btn btn-default btn-sm float-right" type="submit" id="saveAsfList" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
              <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
            </button>

            <!-- <a onclick="cancelAdvance();" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
              <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
            </a>

            <button class="btn btn-default btn-sm float-right" type="submit" id="submitArf" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
              <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
            </button> -->

            
          </div>
        </form>
      </div>
      @endif
    </div>
  </section>
</div>
@include('Partials.footer')
@include('Advance.Advance.Functions.Footer.footerAsf')
@endsection